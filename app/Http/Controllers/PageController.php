<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Person;
use App\Models\ProductionCompany;
use App\Models\StreamingPlatform;
use App\Models\Title;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * About Us & Editorial Mission Page (Essential for Google E-E-A-T)
     */
    public function about(): View
    {
        $stats = [
            'titles' => Title::count(),
            'people' => Person::count(),
            'genres' => Genre::count(),
            'platforms' => StreamingPlatform::count(),
        ];

        return view('pages.about', compact('stats'));
    }

    /**
     * Contact & Editorial Inquiries Page
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Process Contact / Feedback Form
     */
    public function contactSubmit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'category' => 'required|string|in:general,editorial_correction,copyright,partnership,press',
            'message' => 'required|string|min:15|max:3000',
        ]);

        return back()->with('success', 'Thank you for reaching out! Our editorial and support team will review your inquiry within 24-48 business hours.');
    }

    /**
     * Editorial Guidelines & Rating Methodology (Google Review Guidelines Compliance)
     */
    public function editorialGuidelines(): View
    {
        return view('pages.editorial-guidelines');
    }

    /**
     * Frequently Asked Questions & Entertainment Help (Schema FAQPage)
     */
    public function faq(): View
    {
        return view('pages.faq');
    }

    /**
     * Privacy Policy (GDPR / CCPA Compliant)
     */
    public function privacy(): View
    {
        return view('pages.privacy');
    }

    /**
     * Terms of Service & DMCA / Copyright Policy
     */
    public function terms(): View
    {
        return view('pages.terms');
    }

    /**
     * HTML Sitemap Directory (Deep Internal Linking & Search Bot Crawlability)
     */
    public function sitemapDirectory(): View
    {
        $topMovies = Title::where('type', 'movie')
            ->orderByDesc('rating')
            ->take(18)
            ->get(['id', 'title', 'slug', 'release_date', 'rating', 'poster_path']);

        $topSeries = Title::where('type', 'tv_series')
            ->orderByDesc('rating')
            ->take(18)
            ->get(['id', 'title', 'slug', 'release_date', 'rating', 'poster_path']);

        $genres = Genre::orderBy('name')->get();
        $platforms = StreamingPlatform::where('is_active', true)->orderBy('name')->get();
        $featuredTalent = Person::where('status', 'active')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->take(16)
            ->get();
        if ($featuredTalent->isEmpty()) {
            $featuredTalent = Person::where('status', 'active')
                ->where('is_active', true)
                ->orderBy('name')
                ->take(16)
                ->get();
        }
        $studios = ProductionCompany::orderBy('name')->take(12)->get();

        return view('pages.sitemap-directory', compact(
            'topMovies',
            'topSeries',
            'genres',
            'platforms',
            'featuredTalent',
            'studios'
        ));
    }
}
