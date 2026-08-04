<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteText;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteTextController extends Controller
{
    /**
     * Route publique correspondante à chaque groupe, pour le lien "Voir la page".
     */
    private const PUBLIC_ROUTES = [
        'home' => 'home',
        'services' => 'services',
        'certifications' => 'certifications',
        'about' => 'about',
        'faq' => 'faq',
        'realisations' => 'realisations',
        'quote' => 'quote',
        'contact' => 'contact',
    ];

    public function edit(string $group): View
    {
        $texts = SiteText::where('group', $group)->orderBy('order_column')->get();

        abort_if($texts->isEmpty(), 404);

        return view('admin.site-texts.edit', [
            'group' => $group,
            'sections' => $texts->groupBy(fn (SiteText $text) => $text->sectionLabel()),
            'publicUrl' => isset(self::PUBLIC_ROUTES[$group]) ? route(self::PUBLIC_ROUTES[$group]) : null,
        ]);
    }

    public function update(Request $request, string $group): RedirectResponse
    {
        $data = $request->validate([
            'texts' => ['required', 'array'],
            'texts.*.value_fr' => ['required', 'string'],
            'texts.*.value_en' => ['required', 'string'],
        ]);

        // On ne touche qu'aux lignes du groupe demandé : un id étranger soumis
        // dans le payload est silencieusement ignoré (pas de mise à jour croisée).
        $rows = SiteText::where('group', $group)->get()->keyBy('id');

        foreach ($data['texts'] as $id => $values) {
            $rows->get((int) $id)?->update($values);
        }

        return redirect()->route('admin.site-texts.edit', $group)->with('status', 'site-texts-updated');
    }
}
