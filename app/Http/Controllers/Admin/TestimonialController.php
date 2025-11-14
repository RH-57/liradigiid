<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Cache::remember('testimonials', 3600, function () {
            return Testimonial::orderBy('created_at', 'desc')->get();
        });

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'message' => 'required|string',
            'rating'  => 'nullable|integer|min:1|max:5',
            'status'  => 'required|in:active,inactive',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $manager = new ImageManager(new Driver());
            $file = $request->file('photo');
            $image = $manager->read($file->getPathname());

            $image->cover(180, 180);
            $encoded = $image->encode(new WebpEncoder(quality: 70));

            $filename = uniqid() . '.webp';
            $path = 'testimonials/photos/' . $filename;

            Storage::disk('public')->put($path, (string) $encoded);
            $photoPath = $path;
        }

        Testimonial::create([
            'name'    => $request->name,
            'company' => $request->company,
            'message' => $request->message,
            'rating'  => $request->rating ?? 5,
            'status'  => $request->status,
            'photo'   => $photoPath,
        ]);

        Cache::forget('testimonials', 'testimonials_home');

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'message' => 'required|string',
            'rating'  => 'nullable|integer|min:1|max:5',
            'status'  => 'required|in:active,inactive',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $photoPath = $testimonial->photo;

        if ($request->hasFile('photo')) {
            if ($testimonial->photo && Storage::disk('public')->exists($testimonial->photo)) {
                Storage::disk('public')->delete($testimonial->photo);
            }

            $manager = new ImageManager(new Driver());
            $file = $request->file('photo');
            $image = $manager->read($file->getPathname());
            $image->cover(180, 180);
            $encoded = $image->encode(new WebpEncoder(quality: 70));

            $filename = uniqid() . '.webp';
            $path = 'testimonials/photos/' . $filename;

            Storage::disk('public')->put($path, (string) $encoded);
            $photoPath = $path;
        }

        $testimonial->update([
            'name'    => $request->name,
            'company' => $request->company,
            'message' => $request->message,
            'rating'  => $request->rating ?? 5,
            'status'  => $request->status,
            'photo'   => $photoPath,
        ]);

        Cache::forget('testimonials', 'testimonials_home');

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->photo && Storage::disk('public')->exists($testimonial->photo)) {
            Storage::disk('public')->delete($testimonial->photo);
        }

        $testimonial->delete();
        Cache::forget('testimonials', 'testimonials_home');

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}
