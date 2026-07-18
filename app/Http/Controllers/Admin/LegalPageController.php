<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use App\Support\HtmlSanitizer;
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

        // Le corps est rendu en HTML brut ({!! !!}) : on purge tout script/attribut
        // dangereux avant stockage pour éviter tout XSS stocké.
        $data['body_fr'] = HtmlSanitizer::clean($data['body_fr']);
        $data['body_en'] = HtmlSanitizer::clean($data['body_en']);

        $legalPage->update($data);

        return redirect()->route('admin.legal.edit', $legalPage)->with('status', 'legal-updated');
    }
}
