<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use App\Support\ValueIcons;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ValueController extends Controller
{
    public function index(): View
    {
        return view('admin.values.index', [
            'values' => CompanyValue::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.values.create', ['icons' => ValueIcons::options()]);
    }

    public function store(Request $request): RedirectResponse
    {
        CompanyValue::create($this->validated($request));

        return redirect()->route('admin.values.index')->with('status', 'value-created');
    }

    public function edit(CompanyValue $value): View
    {
        return view('admin.values.edit', ['value' => $value, 'icons' => ValueIcons::options()]);
    }

    public function update(Request $request, CompanyValue $value): RedirectResponse
    {
        $value->update($this->validated($request));

        return redirect()->route('admin.values.index')->with('status', 'value-updated');
    }

    public function destroy(CompanyValue $value): RedirectResponse
    {
        $value->delete();

        return redirect()->route('admin.values.index')->with('status', 'value-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'icon_key' => ['required', 'string', 'in:' . implode(',', array_keys(ValueIcons::all()))],
            'title_fr' => ['required', 'string', 'max:160'],
            'title_en' => ['required', 'string', 'max:160'],
            'description_fr' => ['required', 'string', 'max:1000'],
            'description_en' => ['required', 'string', 'max:1000'],
        ]);

        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }
}
