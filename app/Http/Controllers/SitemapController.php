<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Article;
use App\Models\Service;

class SitemapController extends Controller
{
    public function generate()
    {
        // Lokasi penyimpanan ke public_html
        //$sitemapPath = base_path('../public_html/sitemap.xml');
        $sitemapPath = base_path('../public_html/sitemap.xml');

        // Buat instance sitemap baru
        $sitemap = Sitemap::create()
            ->add(Url::create('/')
                ->setLastModificationDate(now())
                ->setChangeFrequency('daily')
                ->setPriority(1.0))
            ->add(Url::create('/portfolio')->setChangeFrequency('monthly'))
            ->add(Url::create('/artikel')->setChangeFrequency('daily'))
            ->add(Url::create('/cara-order')->setChangeFrequency('monthly')->setPriority(0.7));

        // Tambahkan artikel
        Article::where('status', 'published')->latest()->get()->each(function ($article) use ($sitemap) {
            $sitemap->add(
                Url::create(url('/artikel/' . $article->category . '/' . $article->slug))
                    ->setLastModificationDate($article->updated_at ?? now())
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.8)
            );
        });

        // Tambahkan service
        Service::where('status', 1)->latest()->get()->each(function ($service) use ($sitemap) {
            $sitemap->add(
                Url::create(url('/' . $service->slug))
                    ->setLastModificationDate($service->updated_at ?? now())
                    ->setChangeFrequency('monthly')
                    ->setPriority(0.8)
            );
        });

        // Simpan ke public_html/sitemap.xml
        $sitemap->writeToFile($sitemapPath);

        return response()->json([
            'status' => 'success',
            'message' => 'Sitemap berhasil digenerate.',
            'path' => $sitemapPath,
        ]);
    }
}
