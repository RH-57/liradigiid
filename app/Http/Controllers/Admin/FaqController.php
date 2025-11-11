<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FaqController extends Controller
{
    public function index() {
        $faqs = Cache::remember('faqs', 31536000, function () {
            return Faq::orderBy('order')->get();
        });

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create() {
        return view('admin.faqs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'question'  => 'required|string|max:255',
            'answer'    => 'required|string',
            'order'     => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        Faq::create([
            'question'  => $request->question,
            'answer'    => $request->answer,
            'order'     => $request->order,
            'is_active' => $request->is_active,
        ]);

        Cache::forget('faqs');

        return redirect()->route('faqs.index')->with('success', 'Faqs Added Successfully');
    }

    public function show($id) {
        $faq = Faq::findOrFail($id);

        return view('admin.faqs.show', compact('faq'));
    }

    public function edit($id) {
        $faq = Faq::findOrFail($id);

        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id) {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question'  => 'required|string|max:255',
            'answer'    => 'required|string',
            'order'     => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        $faq->update([
            'question'  => $request->question,
            'answer'    => $request->answer,
            'order'     => $request->order,
            'is_active' => $request->is_active,
        ]);

        Cache::forget('faqs');

        return redirect()->route('faqs.index')->with(['success' => 'Faqs Updated Successfully']);
    }

    public function destroy($id) {
        $faq = Faq::findOrFail($id);
        $faq->delete();

       Cache::forget('faqs');

        return redirect()->route('faqs.index')->with(['success' => 'FAQ deleted successfully']);
    }
}
