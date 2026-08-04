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
            'leadsTrend' => $this->leadsTrend(),
            'leadsByStatus' => $this->leadsByStatus(),
        ]);
    }

    /**
     * Nombre de leads créés par jour sur les 30 derniers jours (0 pour les jours sans lead).
     *
     * @return array<int, array{date: string, count: int}>
     */
    private function leadsTrend(): array
    {
        $start = now()->subDays(29)->startOfDay();

        $counts = Lead::where('created_at', '>=', $start)
            ->get()
            ->groupBy(fn (Lead $lead) => $lead->created_at->format('Y-m-d'))
            ->map->count();

        return collect(range(0, 29))
            ->map(function (int $i) use ($start, $counts) {
                $date = $start->copy()->addDays($i);

                return [
                    'date' => $date->translatedFormat('d M'),
                    'count' => $counts->get($date->format('Y-m-d'), 0),
                ];
            })
            ->all();
    }

    /**
     * @return array<string, int>
     */
    private function leadsByStatus(): array
    {
        $labels = [
            Lead::STATUS_NEW => 'Nouveau',
            Lead::STATUS_IN_PROGRESS => 'En cours',
            Lead::STATUS_WON => 'Gagné',
            Lead::STATUS_LOST => 'Perdu',
            Lead::STATUS_ARCHIVED => 'Archivé',
        ];

        $counts = Lead::query()
            ->selectRaw('status, count(*) as aggregate')
            ->groupBy('status')
            ->pluck('aggregate', 'status');

        return collect($labels)
            ->mapWithKeys(fn (string $label, string $status) => [$label => (int) ($counts[$status] ?? 0)])
            ->all();
    }
}
