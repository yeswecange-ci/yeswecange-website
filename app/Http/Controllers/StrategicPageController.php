<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/**
 * Sert toutes les pages Expertise / Locales / Secteurs à partir d'un seul
 * gabarit (resources/views/pages/strategic.blade.php) et du contenu
 * centralisé dans config/strategic_pages.php (source : repository de
 * mots-clés, onglet « Pages éditoriales »).
 *
 * Ajouter une page = ajouter une entrée dans config/strategic_pages.php,
 * aucune modification de contrôleur ou de vue n'est nécessaire.
 */
class StrategicPageController extends Controller
{
    public function expertise(string $slug): View
    {
        return $this->render('expertise', $slug, '/expertise/'.$slug);
    }

    public function local(string $ville): View
    {
        return $this->render('local', $ville, '/agence-digitale-'.$ville);
    }

    public function secteur(string $slug): View
    {
        return $this->render('secteur', $slug, '/secteurs/'.$slug);
    }

    private function render(string $branch, string $slug, string $url): View
    {
        $page = config("strategic_pages.{$branch}.{$slug}");

        abort_unless($page, 404);

        $faqMap = config('strategic_pages.faq', []);
        $page['faq'] = $faqMap["{$branch}.{$slug}"] ?? [];
        $page['url'] = $url;

        $ctaFallback = $page['cta_is_fallback'] ?? false;
        $page['cta'] = [
            'label' => $ctaFallback || empty($page['cta_label']) ? 'Demander un audit gratuit' : $page['cta_label'],
            'href' => route('quote'),
        ];

        $page['client_proof_href'] = null;
        if (! empty($page['client_proof_case_study']) && Route::has('case-study.show')) {
            $page['client_proof_href'] = route('case-study.show', $page['client_proof_case_study']);
        }

        // Les pages locales ont chacune une vue dédiée (design propre par ville) ;
        // Expertise et Secteurs continuent de partager le gabarit générique.
        $view = $branch === 'local' && view()->exists("pages.local.{$slug}")
            ? "pages.local.{$slug}"
            : 'pages.strategic';

        return view($view, [
            'branch' => $branch,
            'slug' => $slug,
            'page' => $page,
        ]);
    }
}
