<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeLocation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfficeLocationController extends Controller
{
    public function index(): View
    {
        return view('admin.office-locations.index', [
            'officeLocations' => OfficeLocation::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.office-locations.create');
    }

    public function store(Request $request): RedirectResponse
    {
        OfficeLocation::create($this->validated($request));

        return redirect()->route('admin.office-locations.index')->with('status', 'office-location-created');
    }

    public function edit(OfficeLocation $officeLocation): View
    {
        return view('admin.office-locations.edit', ['officeLocation' => $officeLocation]);
    }

    public function update(Request $request, OfficeLocation $officeLocation): RedirectResponse
    {
        $officeLocation->update($this->validated($request, $officeLocation));

        return redirect()->route('admin.office-locations.index')->with('status', 'office-location-updated');
    }

    public function destroy(OfficeLocation $officeLocation): RedirectResponse
    {
        $officeLocation->delete();

        return redirect()->route('admin.office-locations.index')->with('status', 'office-location-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?OfficeLocation $officeLocation = null): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'slug' => ['required', 'string', 'max:50', 'unique:office_locations,slug,'.$officeLocation?->id],
            'eyebrow' => ['required', 'string', 'max:60'],
            'title_fr' => ['required', 'string', 'max:120'],
            'title_en' => ['required', 'string', 'max:120'],
            'address' => ['required', 'string', 'max:500'],
            'phone' => ['required', 'string', 'max:40'],
            'cta_label_fr' => ['required', 'string', 'max:60'],
            'cta_label_en' => ['required', 'string', 'max:60'],
            'is_dark' => ['nullable', 'boolean'],
        ]);

        $data['is_dark'] = $request->boolean('is_dark');
        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }
}
