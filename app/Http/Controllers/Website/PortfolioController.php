<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PortfolioController extends Controller
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

        return view('website.pages.portfolio', compact(
            'contacts',
            'mediasocials',
            'portfolios',
        ));
    }
}
