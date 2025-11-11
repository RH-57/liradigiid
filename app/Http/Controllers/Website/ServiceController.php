<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\MediaSocial;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $faqs = Cache::remember('faqs', 31536000, function () {
            return Faq::orderBy('order')->get();
        });
        $services = Cache::remember('services', 31536000, function() {
            return Service::get();
        });
        $contacts = Cache::remember('contacts', 31536000, function () {
            return Contact::first();
        });
        $mediasocials = Cache::remember('mediasocials', 31536000, function () {
            return  MediaSocial::all();
        });
        // Ambil service berdasarkan slug
        $service = Service::where('slug', $slug)->firstOrFail();

        // Ambil semua package terkait
        $packages = $service->packages()->with(['includes', 'excludes'])->get();

        return view('website.pages.services-show', compact('service', 'packages', 'services', 'mediasocials', 'contacts', 'faqs'));
    }
}
