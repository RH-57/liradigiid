<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index() {
        $contacts = Cache::remember('contacts', 31536000, function () {
            return Contact::first();
        });
        $mediasocials = Cache::remember('mediasocials', 31536000, function () {
            return  MediaSocial::all();
        });

        $portfolios = Cache::remember('portfolios', 2592000, function () {
            return Portfolio::get();
        });

        $articles = Cache::remember('articles_home', 3600, function () {
            return Article::where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get(['id', 'title', 'category', 'excerpt', 'featured_image', 'published_at']);
        });

        return view('website.pages.home', compact(
            'contacts',
            'mediasocials',
            'portfolios',
            'articles',
        ));
    }
}
