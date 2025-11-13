<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Cache::remember('articles', 3600, function () {
            return Article::latest()->get();
        });

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'category'          => 'required|in:tutorial,insight',
            'content'           => 'required|string',
            'excerpt'           => 'nullable|string',
            'featured_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string',
            'og_title'          => 'nullable|string|max:255',
            'og_description'    => 'nullable|string',
            'canonical_url'     => 'nullable|string|max:255',
            'robots'            => 'nullable|string|max:255',
            'schema_json'       => 'nullable',
            'status'            => 'required|in:draft,published',
            'published_at'      => 'nullable|date',
        ]);

        $slug = Str::slug($request->title);
        $category = $request->category;
        $canonicalUrl = url('artikel/' . $category . '/' . $slug);
        $publishedAt = $request->status === 'published' ? now() : null;

        $featuredImagePath = null;
        $metaImagePath = null;

        $manager = new ImageManager(new Driver());

        // ✅ Featured Image Upload
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $image = $manager->read($file->getPathname());
            $image->cover(1200, 800);
            $encoded = $image->encode(new WebpEncoder(quality: 80));

            $filename = uniqid() . '.webp';
            $path = 'articles/images/' . $filename;

            Storage::disk('public')->put($path, (string) $encoded);
            $featuredImagePath = $path;
        }

        // ✅ Meta Image Upload
        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $image = $manager->read($file->getPathname());
            $image->cover(1200, 630);
            $encoded = $image->encode(new WebpEncoder(quality: 80));

            $filename = uniqid() . '.webp';
            $metaPath = 'articles/meta/' . $filename;

            Storage::disk('public')->put($metaPath, (string) $encoded);
            $metaImagePath = $metaPath;
        }



        Article::create([
            'user_id'           => Auth::id(),
            'category'          => $request->category,
            'title'             => $request->title,
            'slug'              => $slug,
            'excerpt'           => $request->excerpt,
            'content'           => $request->content,
            'featured_image'    => $featuredImagePath,
            'meta_image'        => $metaImagePath,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
            'og_title'          => $request->og_title,
            'og_description'    => $request->og_description,
            'canonical_url'     => $canonicalUrl,
            'robots'            => $request->robots ?? 'index, follow',
            'schema_json'       => $request->schema_json,
            'status'            => $request->status,
            'published_at'      => $publishedAt,
            'views'             => 0,
        ]);

        Cache::forget('articles_count_active');
        Cache::forget('home_articles');
        Cache::forget('articles');
        for ($i = 1; $i <= 20; $i++) {
            Cache::forget("articles_page_{$i}");
        }


        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title'             => 'required|string|max:255',
            'category'          => 'required|in:tutorial,insight',
            'content'           => 'required|string',
            'excerpt'           => 'nullable|string',
            'featured_image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string',
            'og_title'          => 'nullable|string|max:255',
            'og_description'    => 'nullable|string',
            'canonical_url'     => 'nullable|string|max:255',
            'robots'            => 'nullable|string|max:255',
            'schema_json'       => 'nullable',
            'status'            => 'required|in:draft,published',
            'published_at'      => 'nullable|date',
        ]);

        $slugNew = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
            if (Article::where('slug', $slugNew)->where('id', '!=', $article->id)->exists()) {
                $slugNew .= '-' . substr(uniqid(), -5);
            }

        $oldCanonical = $article->canonical_url;
        $autoCanonicalOld = url('artikel/' . $article->category . '/' . $article->slug);
        $autoCanonicalNew = url('artikel/' . $request->category . '/' . $slugNew);

        // Jika canonical lama sama dengan versi auto sebelumnya, update otomatis
        if ($oldCanonical === $autoCanonicalOld) {
            $canonicalUrl = $autoCanonicalNew;
        } else {
            $canonicalUrl = $request->canonical_url ?: $autoCanonicalNew;
        }

        $publishedAt = $request->status === 'published'
            ? ($article->published_at ?? now()) // hanya isi jika belum pernah publish
            : null;

        $featuredImagePath = $article->featured_image;
        $metaImagePath = $article->meta_image;

        $manager = new ImageManager(new Driver());

        // ✅ Update featured image
        if ($request->hasFile('featured_image')) {
            if ($featuredImagePath && Storage::disk('public')->exists($featuredImagePath)) {
                Storage::disk('public')->delete($featuredImagePath);
            }

            $file = $request->file('featured_image');
            $image = $manager->read($file->getPathname());
            $image->cover(1200, 800);
            $encoded = $image->encode(new WebpEncoder(quality: 80));

            $filename = uniqid() . '.webp';
            $path = 'articles/images/' . $filename;

            Storage::disk('public')->put($path, (string) $encoded);
            $featuredImagePath = $path;
        }

        // ✅ Update meta image
        if ($request->hasFile('meta_image')) {
            if ($metaImagePath && Storage::disk('public')->exists($metaImagePath)) {
                Storage::disk('public')->delete($metaImagePath);
            }

            $file = $request->file('meta_image');
            $image = $manager->read($file->getPathname());
            $image->cover(1200, 630);
            $encoded = $image->encode(new WebpEncoder(quality: 80));

            $filename = uniqid() . '.webp';
            $metaPath = 'articles/meta/' . $filename;

            Storage::disk('public')->put($metaPath, (string) $encoded);
            $metaImagePath = $metaPath;
        }

        $article->update([
            'category'          => $request->category,
            'title'             => $request->title,
            'slug'              => $slugNew,
            'excerpt'           => $request->excerpt,
            'content'           => $request->content,
            'featured_image'    => $featuredImagePath,
            'meta_image'        => $metaImagePath,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
            'og_title'          => $request->og_title,
            'og_description'    => $request->og_description,
            'canonical_url'     => $canonicalUrl,
            'robots'            => $request->robots,
            'schema_json'       => $request->schema_json,
            'status'            => $request->status,
            'published_at'      => $publishedAt,
        ]);


        Cache::forget('articles_count_active');
        Cache::forget('home_articles');
        Cache::forget('articles');
        for ($i = 1; $i <= 20; $i++) {
            Cache::forget("articles_page_{$i}");
        }


        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Hapus featured image
        if ($article->featured_image && Storage::disk('public')->exists($article->featured_image)) {
            Storage::disk('public')->delete($article->featured_image);
        }

        // Hapus meta image
        if ($article->meta_image && Storage::disk('public')->exists($article->meta_image)) {
            Storage::disk('public')->delete($article->meta_image);
        }

        $article->delete();

         Cache::forget('articles_count_active');
        Cache::forget('home_articles');
        Cache::forget('articles');
        for ($i = 1; $i <= 20; $i++) {
            Cache::forget("articles_page_{$i}");
        }

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus');
    }
}
