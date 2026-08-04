<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrustChip;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TrustChipController extends Controller
{
    public function index(): View
    {
        return view('admin.trust-chips.index', [
            'trustChips' => TrustChip::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.trust-chips.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        $this->save(fn () => TrustChip::create($data), $data);

        return redirect()->route('admin.trust-chips.index')->with('status', 'trust-chip-created');
    }

    public function edit(TrustChip $trustChip): View
    {
        return view('admin.trust-chips.edit', ['trustChip' => $trustChip]);
    }

    public function update(Request $request, TrustChip $trustChip): RedirectResponse
    {
        $data = $this->validated($request);

        $this->save(fn () => $trustChip->update($data), $data);

        return redirect()->route('admin.trust-chips.index')->with('status', 'trust-chip-updated');
    }

    public function destroy(TrustChip $trustChip): RedirectResponse
    {
        $trustChip->delete();

        return redirect()->route('admin.trust-chips.index')->with('status', 'trust-chip-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'key' => ['required', 'string', 'max:50'],
            'label_fr' => ['required', 'string', 'max:60'],
            'label_en' => ['required', 'string', 'max:60'],
            'text_fr' => ['required', 'string', 'max:500'],
            'text_en' => ['required', 'string', 'max:500'],
            'is_default' => ['nullable', 'boolean'],
        ]);

        $data['is_default'] = $request->boolean('is_default');
        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }

    /**
     * Un seul chip actif par défaut à la fois : on démote les autres avant
     * d'enregistrer celui-ci si l'admin l'a marqué comme actif.
     */
    private function save(\Closure $persist, array $data): void
    {
        DB::transaction(function () use ($persist, $data) {
            if ($data['is_default']) {
                TrustChip::query()->update(['is_default' => false]);
            }

            $persist();
        });
    }
}
