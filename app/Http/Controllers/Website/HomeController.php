<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Package;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index() {
        $services = Cache::remember('services', 31536000, function() {
            return Service::get();
        });

        $contacts = Cache::remember('contacts', 31536000, function () {
            return Contact::first();
        });
        $mediasocials = Cache::remember('mediasocials', 31536000, function () {
            return  MediaSocial::all();
        });

        $portfolios = Cache::remember('portfolios', 2592000, function () {
            return Portfolio::get();
        });

        $articles = Cache::remember('home_articles', 3600, function () {
            return Article::where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get(['id', 'title', 'category', 'excerpt', 'featured_image', 'published_at', 'slug']);
        });


        $testimonials = Cache::remember('testimonials_home', 3600, function () {
            return Testimonial::where('status', 'active')
                ->orderBy('id', 'desc')
                ->take(10)
                ->get();
        });

         $service = Cache::remember('service_1_with_packages', 3600, function () {
            return Service::with(['packages' => function ($q) {
                $q->where('status', 'active');
            }])->find(1);
        });

        return view('website.pages.home', compact(
            'contacts',
            'mediasocials',
            'portfolios',
            'articles',
            'testimonials',
            'services',
            'service'
        ));
    }
}
