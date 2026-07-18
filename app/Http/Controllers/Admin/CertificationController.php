<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CertificationController extends Controller
{
    public function index(): View
    {
        return view('admin.certifications.index', [
            'certifications' => Certification::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'name_fr' => ['required', 'string', 'max:160'],
            'name_en' => ['required', 'string', 'max:160'],
            'issuer_fr' => ['required', 'string', 'max:160'],
            'issuer_en' => ['required', 'string', 'max:160'],
            'logo' => ['required', 'image', 'max:2048'],
        ]);

        $data['logo'] = Storage::disk('public')->putFile('certifications', $request->file('logo'));
        $data['order_column'] = $data['order_column'] ?? 0;

        Certification::create($data);

        return redirect()->route('admin.certifications.index')->with('status', 'certification-created');
    }

    public function edit(Certification $certification): View
    {
        return view('admin.certifications.edit', ['certification' => $certification]);
    }

    public function update(Request $request, Certification $certification): RedirectResponse
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'name_fr' => ['required', 'string', 'max:160'],
            'name_en' => ['required', 'string', 'max:160'],
            'issuer_fr' => ['required', 'string', 'max:160'],
            'issuer_en' => ['required', 'string', 'max:160'],
            'logo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($certification->logo);
            $data['logo'] = Storage::disk('public')->putFile('certifications', $request->file('logo'));
        }

        $data['order_column'] = $data['order_column'] ?? 0;

        $certification->update($data);

        return redirect()->route('admin.certifications.index')->with('status', 'certification-updated');
    }

    public function destroy(Certification $certification): RedirectResponse
    {
        Storage::disk('public')->delete($certification->logo);
        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('status', 'certification-deleted');
    }
}
