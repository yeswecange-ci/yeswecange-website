<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $leads = Lead::query()
            ->when($request->filled('type'), fn ($q) => $q->where('type', $request->string('type')))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->string('search');
                $q->where(fn ($q) => $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%"));
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.leads.index', [
            'leads' => $leads,
            'filters' => $request->only(['type', 'status', 'search']),
        ]);
    }

    public function show(Lead $lead): View
    {
        if (! $lead->read_at) {
            $lead->update(['read_at' => now()]);
        }

        return view('admin.leads.show', ['lead' => $lead]);
    }

    public function update(Request $request, Lead $lead): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', [
                Lead::STATUS_NEW,
                Lead::STATUS_IN_PROGRESS,
                Lead::STATUS_WON,
                Lead::STATUS_LOST,
                Lead::STATUS_ARCHIVED,
            ])],
        ]);

        $lead->update($data);

        return back()->with('status', 'lead-updated');
    }
}
