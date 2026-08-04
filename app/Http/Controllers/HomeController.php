<?php

namespace App\Http\Controllers;

use App\Models\ChatbotChannel;
use App\Models\OfficeLocation;
use App\Models\SiteText;
use App\Models\Stat;
use App\Models\Testimonial;
use App\Models\TrustChip;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'trustChips' => TrustChip::orderBy('order_column')->get(),
            'stats' => Stat::orderBy('order_column')->get(),
            'chatbotChannels' => ChatbotChannel::orderBy('order_column')->get(),
            'testimonials' => Testimonial::orderBy('order_column')->get(),
            'officeLocations' => OfficeLocation::orderBy('order_column')->get(),
            'texts' => SiteText::where('group', 'home')->get()->keyBy('key'),
        ]);
    }
}
