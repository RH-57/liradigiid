<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MediaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function index() {
        $contacts = Cache::remember('contacts', 31536000, function () {
            return Contact::first();
        });
        $mediasocials = Cache::remember('mediasocials', 31536000, function () {
            return  MediaSocial::all();
        });

        return view('admin.contact.index', compact('contacts', 'mediasocials'));
    }

    public function store(Request $request) {
        $request->validate([
            'address'   => 'required|string|max:255',
            'phone'     => 'required|string|max:15',
            'email'     => 'required|string|max:30',
            'maps'      => 'required|string',
        ]);

        $contacts = Contact::first();

        if ($contacts) {
            $contacts->update($request->only(['address','phone','email', 'maps']));
        } else {
            Contact::create($request->only(['address','phone','email', 'maps']));
        }

        Cache::forget('contacts');

        return redirect()->route('contacts.index')->with('success', 'Contacts updated successfully');
    }
}
