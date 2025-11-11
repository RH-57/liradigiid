<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Drivers\Gd\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

class ServiceController extends Controller
{
    public function index() {
        $services = Cache::remember('services', 3600, function () {
            return Service::get();
        });

        return view('admin.services.index', compact('services'));
    }

    public function create() {
        return view('admin.services.create');
    }

    public function store(Request $request) {
         $request->validate([
            'name'              => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug',
            'description'       => 'required|string',
            'status'            => 'required|in:active,inactive',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_image'        => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
        ]);

        $baseSlug = Str::slug($request->name);
        $slug = $baseSlug;
        $counter = 1;
        while (Service::withTrashed()->where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }


        $manager = new ImageManager(new Driver());

        $metaImagePath = null;
        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $meta = $manager->read($file->getPathname());
            $encoded = $meta->encode(new WebpEncoder(quality: 75));
            $filename = uniqid() . '.webp';
            $path = 'services/meta/' . $filename;
            Storage::disk('public')->put($path, (string) $encoded);
            $metaImagePath = $path;
        }

        Service::create([
            'name'             => $request->name,
            'slug'              => $slug,
            'description'       => $request->description,
            'status'            => $request->status,
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
            'meta_image'        => $metaImagePath,
        ]);

        Cache::forget('services');

        return redirect()->route('services.index')->with('success', 'Service berhasil dibuat');
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name'              => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description'       => 'required|string',
            'status'            => 'required|in:active,inactive',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_image'        => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096',
        ]);

        // Slug Handling
        $baseSlug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $slug = $baseSlug;
        $counter = 1;
        while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        $manager = new ImageManager(new Driver());
        $metaImagePath = $service->meta_image;

        // Jika ada upload gambar baru
        if ($request->hasFile('meta_image')) {
            // Hapus gambar lama jika ada
            if ($service->meta_image && Storage::disk('public')->exists($service->meta_image)) {
                Storage::disk('public')->delete($service->meta_image);
            }

            $file = $request->file('meta_image');
            $meta = $manager->read($file->getPathname());
            $encoded = $meta->encode(new WebpEncoder(quality: 75));
            $filename = uniqid() . '.webp';
            $path = 'services/meta/' . $filename;
            Storage::disk('public')->put($path, (string) $encoded);
            $metaImagePath = $path;
        }

        $service->update([
            'name'             => $request->name,
            'slug'              => $slug,
            'description'       => $request->description,
            'status'            => $request->status,
            'meta_title'        => $request->meta_title,
            'meta_keywords'      => $request->meta_keywords,
            'meta_description'  => $request->meta_description,
            'meta_image'        => $metaImagePath,
        ]);

        Cache::forget('services');

        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Hapus gambar jika ada
        if ($service->meta_image && Storage::disk('public')->exists($service->meta_image)) {
            Storage::disk('public')->delete($service->meta_image);
        }

        $service->delete();

        Cache::forget('services');

        return redirect()->route('services.index')->with('success', 'Service berhasil dihapus');
    }

}
