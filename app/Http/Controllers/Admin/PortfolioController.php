<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class PortfolioController extends Controller
{
    public function index() {
        $portfolios = Cache::remember('portfolios', 3600, function () {
            return Portfolio::get();
        });

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create() {
        return view('admin.portfolios.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'          => 'required|string|max:50',
            'url'           => 'required|string|max:100',
            'description'   => 'required|string',
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->name);

        $imagePath = null;
        if($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $file = $request->file('image');
            $image = $manager->read($file->getPathname());

            // Resize untuk tampilan portfolio
            $image->cover(1024, 768); // proporsional dan cukup besar
            $encoded = $image->encode(new WebpEncoder(quality:80));

            $filename = uniqid() . '.webp';
            $path = 'portfolios/images/' . $filename;

            Storage::disk('public')->put($path, (string) $encoded);
            $imagePath = $path;
        }

        Portfolio::create([
            'name'              => $request->name,
            'slug'              => $slug,
            'url'               => $request->url,
            'image'             => $imagePath,
            'description'       => $request->description,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
        ]);

        Cache::forget('portfolios');

        return redirect()->route('portfolios.index')->with('success', 'Portfolio Berhasil Ditambah');
    }

    public function show($id) {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function edit($id) {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, $id) {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'name'              => 'required|string|max:50',
            'url'               => 'required|string|max:100',
            'description'       => 'required|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->name);
        $imagePath = $portfolio->image;

        // Jika ada file baru, hapus lama & upload baru
        if($request->hasFile('image')) {
            if($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $manager = new ImageManager(new Driver());
            $file = $request->file('image');
            $image = $manager->read($file->getPathname());
            $image->cover(1024, 768);
            $encoded = $image->encode(new WebpEncoder(quality:80));

            $filename = uniqid() . '.webp';
            $path = 'portfolios/images/' . $filename;

            Storage::disk('public')->put($path, (string) $encoded);
            $imagePath = $path;
        }

        $portfolio->update([
            'name'              => $request->name,
            'slug'              => $slug,
            'url'               => $request->url,
            'image'             => $imagePath,
            'description'       => $request->description,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
        ]);

        Cache::forget('portfolios');

        return redirect()->route('portfolios.index')->with('success', 'Portfolio Berhasil Diperbarui');
    }

    // ✅ Fungsi Destroy
    public function destroy($id) {
        $portfolio = Portfolio::findOrFail($id);

        // Hapus gambar jika ada
        if($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();
        Cache::forget('portfolios');

        return redirect()->route('portfolios.index')->with('success', 'Portfolio Berhasil Dihapus');
    }


}
