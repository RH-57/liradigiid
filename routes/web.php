<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediaSocialController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Website\ArticleController as WebsiteArticleController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\HowToOrderController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Website\PortfolioController as WebsitePortfolioController;
use App\Http\Controllers\Website\ServiceController as WebsiteServiceController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Article;
use App\Models\Service;

// ========================
// SITEMAP ROUTE
// ========================
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create('/')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(1.0))
        ->add(Url::create('/portfolio')->setChangeFrequency('monthly'))
        ->add(Url::create('/artikel')->setChangeFrequency('daily'))
        ->add(Url::create('/cara-order')->setChangeFrequency('monthly')->setPriority(0.7));

    // Tambahkan semua artikel
    Article::latest()->get()->each(function ($article) use ($sitemap) {
        $sitemap->add(
            Url::create(url('/artikel/' . $article->slug))
                ->setLastModificationDate($article->updated_at)
                ->setChangeFrequency('weekly')
                ->setPriority(0.8)
        );
    });

    Service::latest()->get()->each(function ($service) use ($sitemap) {
        $sitemap->add(
            Url::create(url('/' . $service->slug)) // <-- misalnya /paket-seo
                ->setLastModificationDate($service->updated_at)
                ->setChangeFrequency('monthly')
                ->setPriority(0.8)
        );
    });

    // Simpan ke file public/sitemap.xml agar bisa diakses oleh Google
    $sitemap->writeToFile(public_path('sitemap.xml'));

    // Tampilkan hasil langsung di browser
    return response()->file(public_path('sitemap.xml'));
});


Route::get('/manage-cms', [AuthController::class, 'showLoginForm'])->name('manage');
Route::post('/manage-cms', [AuthController::class, 'login'])->name('manage.attempt')->middleware('throttle:login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('web.home');
Route::get('/portfolio', [WebsitePortfolioController::class, 'index'])->name('web.portfolios');
Route::get('/artikel', [WebsiteArticleController::class, 'index'])->name('web.articles');
Route::get('/artikel/{category}/{slug}', [WebsiteArticleController::class, 'show'])->name('web.articles.show');
Route::get('/cara-order', [HowToOrderController::class, 'index'])->name('web.howtoorder');
Route::get('/{slug}', [WebsiteServiceController::class, 'show'])->name('web.service.detail');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/generate-sitemap', [SitemapController::class, 'generate'])->name('sitemap.generate');
    Route::get('/dashboards', [DashboardController::class, 'index'])->name('dashboards.index');
    Route::get('/settings/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/settings/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::resource('/settings/mediasocial', MediaSocialController::class);

    Route::resource('/portfolios', PortfolioController::class);
    Route::resource('/testimonials', TestimonialController::class);
    Route::resource('/articles', ArticleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/faqs', FaqController::class);
    Route::resource('/packages', PackageController::class);
});
