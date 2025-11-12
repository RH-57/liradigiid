<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Cache::remember('packages', 3600, function () {
            return Package::with('service')->latest()->get();
        });

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $services = Cache::remember('services', 3600, function () {
            return Service::select('id', 'name')->where('status', 'active')->get();
        });

        return view('admin.packages.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'is_popular' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'includes' => 'nullable|array',
            'includes.*' => 'nullable|string|max:255',
            'excludes' => 'nullable|array',
            'excludes.*' => 'nullable|string|max:255',
        ]);

        $metaImagePath = null;
        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '-' . time() . '.' . $file->getClientOriginalExtension();
            $metaImagePath = $file->storeAs('uploads/packages/meta', $filename, 'public');
        }

        $package = Package::create([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'is_popular' => $request->boolean('is_popular'),
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_image' => $metaImagePath,
        ]);

        if ($request->filled('includes')) {
            foreach ($request->includes as $include) {
                if (!empty($include)) {
                    $package->includes()->create(['feature' => trim($include)]);
                }
            }
        }

        if ($request->filled('excludes')) {
            foreach ($request->excludes as $exclude) {
                if (!empty($exclude)) {
                    $package->excludes()->create(['feature' => trim($exclude)]);
                }
            }
        }

        Cache::forget('packages');

        return redirect()->route('packages.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Ambil data package + relasi include & exclude
        $package = Package::with(['includes', 'excludes', 'service'])->findOrFail($id);

        // Kirim ke view
        return view('admin.packages.show', compact('package'));
    }

    public function edit($id)
    {
        $package = Package::with(['includes', 'excludes'])->findOrFail($id);
        $services = Service::select('id', 'name')->where('status', 'active')->get();

        return view('admin.packages.edit', compact('package', 'services'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::with(['includes', 'excludes'])->findOrFail($id);

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'is_popular' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'includes' => 'nullable|array',
            'includes.*' => 'nullable|string|max:255',
            'excludes' => 'nullable|array',
            'excludes.*' => 'nullable|string|max:255',
        ]);

        // Handle meta image update
        if ($request->hasFile('meta_image')) {
            if ($package->meta_image && Storage::disk('public')->exists($package->meta_image)) {
                Storage::disk('public')->delete($package->meta_image);
            }

            $file = $request->file('meta_image');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '-' . time() . '.' . $file->getClientOriginalExtension();
            $metaImagePath = $file->storeAs('uploads/packages/meta', $filename, 'public');
            $package->meta_image = $metaImagePath;
        }

        $package->update([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'is_popular' => $request->boolean('is_popular'),
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        // Update includes
        $package->includes()->delete();
        if ($request->filled('includes')) {
            foreach ($request->includes as $include) {
                if (!empty($include)) {
                    $package->includes()->create(['feature' => trim($include)]);
                }
            }
        }

        // Update excludes
        $package->excludes()->delete();
        if ($request->filled('excludes')) {
            foreach ($request->excludes as $exclude) {
                if (!empty($exclude)) {
                    $package->excludes()->create(['feature' => trim($exclude)]);
                }
            }
        }

        Cache::forget('packages');

        return redirect()->route('packages.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);

        if ($package->meta_image && Storage::disk('public')->exists($package->meta_image)) {
            Storage::disk('public')->delete($package->meta_image);
        }

        $package->includes()->delete();
        $package->excludes()->delete();
        $package->delete();

        Cache::forget('packages');

        return redirect()->route('packages.index')->with('success', 'Paket berhasil dihapus.');
    }
}
