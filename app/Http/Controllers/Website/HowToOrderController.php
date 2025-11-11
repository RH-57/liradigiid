<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HowToOrderController extends Controller
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

        return view('website.pages.how-to-order', compact('contacts', 'mediasocials', 'services'));
    }
}
