<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'unreadCount' => Lead::unread()->count(),
            'newQuotesCount' => Lead::quotes()->where('status', Lead::STATUS_NEW)->count(),
            'totalLeads' => Lead::count(),
            'leadsThisWeek' => Lead::where('created_at', '>=', now()->startOfWeek())->count(),
            'recentLeads' => Lead::latest()->take(6)->get(),
            'upcomingAppointments' => Lead::whereNotNull('appointment_at')
                ->where('appointment_at', '>=', now())
                ->orderBy('appointment_at')
                ->take(5)
                ->get(),
        ]);
    }
}
