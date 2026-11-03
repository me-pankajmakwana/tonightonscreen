<?php

use App\Http\Controllers\BoxOfficeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DebutController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OttReleaseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchAutocompleteController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TopRatedController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\WhatToWatchController;
use Illuminate\Support\Facades\Route;

// Primary Discovery & Entertainment Hubs
Route::get('/', HomeController::class)->name('home');
Route::get('/explore', ExploreController::class)->name('explore');
Route::get('/top-rated', [TopRatedController::class, 'index'])->name('top-rated');
Route::get('/trending', [TopRatedController::class, 'trending'])->name('trending');

// Interactive & High-Intent Discovery Hubs
Route::get('/what-to-watch', [WhatToWatchController::class, 'index'])->name('what-to-watch');
Route::get('/api/what-to-watch/recommend', [WhatToWatchController::class, 'recommend'])->name('what-to-watch.recommend');
Route::get('/ott-releases', [OttReleaseController::class, 'index'])->name('ott.releases');
Route::get('/box-office', [BoxOfficeController::class, 'index'])->name('box-office');
Route::get('/first-movies', [DebutController::class, 'index'])->name('first-movies');
Route::get('/debuts', [DebutController::class, 'index'])->name('debuts'); // Friendly alias

// Cinema Games Arcade
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/higher-lower', [GameController::class, 'higherLower'])->name('games.higher-lower');
Route::get('/api/games/higher-lower/next', [GameController::class, 'higherLowerNext'])->name('games.higher-lower.next');
Route::get('/games/cinele', [GameController::class, 'cinele'])->name('games.cinele');
Route::get('/api/games/cinele/guess', [GameController::class, 'cineleGuess'])->name('games.cinele.guess');

// Streaming Platforms Hub
Route::get('/platforms', [PlatformController::class, 'index'])->name('platforms.index');
Route::get('/platform/{slug}', [PlatformController::class, 'show'])->name('platforms.show');

// Genres
Route::get('/genres', [GenreController::class, 'index'])->name('genre.index');
Route::get('/genre/{slug}', [GenreController::class, 'show'])->name('genre.show');

// Titles & Reviews
Route::get('/title/{slug}', [TitleController::class, 'show'])->name('title.show');
Route::post('/title/{title}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/reviews/{review}/helpful', [ReviewController::class, 'helpful'])->name('reviews.helpful');

// Talent & Studios
Route::get('/people', [PersonController::class, 'index'])->name('person.index');
Route::get('/person/{slug}', [PersonController::class, 'show'])->name('person.show');
Route::get('/company/{slug}', [CompanyController::class, 'show'])->name('company.show');

// Search & Watchlist
Route::get('/search/autocomplete', SearchAutocompleteController::class)->name('search.autocomplete');
Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
Route::post('/watchlist/toggle', [WatchlistController::class, 'toggle'])->name('watchlist.toggle');
Route::post('/watchlist/clear', [WatchlistController::class, 'clear'])->name('watchlist.clear');

// Google E-E-A-T, Quality & Legal Trust Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/editorial-guidelines', [PageController::class, 'editorialGuidelines'])->name('editorial-guidelines');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/sitemap', [PageController::class, 'sitemapDirectory'])->name('sitemap.directory');

// Technical Search Engine Files & Multi-Sitemap Architecture
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/sitemap-main.xml', [SitemapController::class, 'main'])->name('sitemap.main');
Route::get('/sitemap-titles.xml', [SitemapController::class, 'titles'])->name('sitemap.titles');
Route::get('/sitemap-people.xml', [SitemapController::class, 'people'])->name('sitemap.people');
Route::get('/sitemap-companies.xml', [SitemapController::class, 'companies'])->name('sitemap.companies');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Production Webhook Sync Endpoints (Protected by VerifyWebhookSecret)
Route::prefix('api/webhooks')->middleware([\App\Http\Middleware\VerifyWebhookSecret::class])->group(function () {
    Route::get('/health', [\App\Http\Controllers\Api\WebhookSyncController::class, 'health']);
    Route::post('/sync', [\App\Http\Controllers\Api\WebhookSyncController::class, 'sync']);
    Route::post('/person', [\App\Http\Controllers\Api\WebhookSyncController::class, 'syncPerson']);
    Route::post('/title', [\App\Http\Controllers\Api\WebhookSyncController::class, 'syncTitle']);
});

Route::prefix('webhooks')->middleware([\App\Http\Middleware\VerifyWebhookSecret::class])->group(function () {
    Route::get('/health', [\App\Http\Controllers\Api\WebhookSyncController::class, 'health']);
    Route::post('/sync', [\App\Http\Controllers\Api\WebhookSyncController::class, 'sync']);
    Route::post('/person', [\App\Http\Controllers\Api\WebhookSyncController::class, 'syncPerson']);
    Route::post('/title', [\App\Http\Controllers\Api\WebhookSyncController::class, 'syncTitle']);
});


