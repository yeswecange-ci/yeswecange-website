<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LegalPageController extends Controller
{
    public function index(): View
    {
        return view('admin.legal.index', [
            'pages' => LegalPage::orderBy('slug')->get(),
        ]);
    }

    public function edit(LegalPage $legalPage): View
    {
        return view('admin.legal.edit', ['page' => $legalPage]);
    }

    public function update(Request $request, LegalPage $legalPage): RedirectResponse
    {
        $data = $request->validate([
            'title_fr' => ['required', 'string', 'max:160'],
            'title_en' => ['required', 'string', 'max:160'],
            'body_fr' => ['required', 'string'],
            'body_en' => ['required', 'string'],
        ]);

        $legalPage->update($data);

        return redirect()->route('admin.legal.edit', $legalPage)->with('status', 'legal-updated');
    }
}
