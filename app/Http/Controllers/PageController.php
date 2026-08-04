<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use App\Models\PortfolioItem;
use App\Models\SiteText;
use Illuminate\View\View;

class PageController extends Controller
{
    public function services(): View
    {
        return view('services', [
            'texts' => SiteText::where('group', 'services')->get()->keyBy('key'),
        ]);
    }

    public function certifications(): View
    {
        return view('pages.certifications', [
            'texts' => SiteText::where('group', 'certifications')->get()->keyBy('key'),
        ]);
    }

    public function about(): View
    {
        return view('pages.about', [
            'texts' => SiteText::where('group', 'about')->get()->keyBy('key'),
        ]);
    }

    public function faq(): View
    {
        return view('pages.faq', [
            'texts' => SiteText::where('group', 'faq')->get()->keyBy('key'),
            'faqItems' => FaqItem::orderBy('order_column')->get(),
        ]);
    }

    public function realisations(): View
    {
        return view('realisations', [
            'texts' => SiteText::where('group', 'realisations')->get()->keyBy('key'),
            'portfolioItems' => PortfolioItem::orderBy('order_column')->get(),
        ]);
    }
}
