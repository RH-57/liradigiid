<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contact;
use App\Models\MediaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        // Cache untuk data statis
        $contacts = Cache::remember('contacts', 31536000, fn() => Contact::first());
        $mediasocials = Cache::remember('mediasocials', 31536000, fn() => MediaSocial::all());

        $page = $request->get('page', 1);
        $cacheKey = "articles_page_{$page}";

        $data = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            $highlightArticle = Article::orderByDesc('views')
                ->orderByDesc('created_at')
                ->first();

            if (!$highlightArticle) {
                $highlightArticle = Article::orderByDesc('created_at')->first();
            }

            $articles = Article::where('id', '!=', optional($highlightArticle)->id)
                ->orderByDesc('created_at')
                ->paginate(3);

            return [
                'highlightArticle' => $highlightArticle,
                'articles' => $articles,
            ];
        });

        return view('website.pages.article', [
            'contacts' => $contacts,
            'mediasocials' => $mediasocials,
            'highlightArticle' => $data['highlightArticle'],
            'articles' => $data['articles'],
        ]);
    }
}
