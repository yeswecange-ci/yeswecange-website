<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatController extends Controller
{
    public function index(): View
    {
        return view('admin.stats.index', [
            'stats' => Stat::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.stats.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Stat::create($this->validated($request));

        return redirect()->route('admin.stats.index')->with('status', 'stat-created');
    }

    public function edit(Stat $stat): View
    {
        return view('admin.stats.edit', ['stat' => $stat]);
    }

    public function update(Request $request, Stat $stat): RedirectResponse
    {
        $stat->update($this->validated($request));

        return redirect()->route('admin.stats.index')->with('status', 'stat-updated');
    }

    public function destroy(Stat $stat): RedirectResponse
    {
        $stat->delete();

        return redirect()->route('admin.stats.index')->with('status', 'stat-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'value' => ['required', 'string', 'max:20'],
            'label_fr' => ['required', 'string', 'max:60'],
            'label_en' => ['required', 'string', 'max:60'],
        ]);

        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }
}
