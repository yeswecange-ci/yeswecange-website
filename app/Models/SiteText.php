<?php

namespace App\Models;

use App\Support\Concerns\HasLocalizedContent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SiteText extends Model
{
    use HasLocalizedContent;

    /**
     * Libellés FR des sections détectées dans les clés (ex. "home.hero.title" → "hero").
     * Une clé sans section reconnue retombe sur son slug mis en forme.
     */
    private const SECTION_LABELS = [
        'seo' => 'Référencement (SEO)',
        'hero' => 'Hero',
        'trust' => 'Section confiance',
        'services' => 'Aperçu des services',
        'chatbots' => 'Section chatbots',
        'testimonials' => 'Témoignages',
        'offices' => 'Agences',
        'header' => 'En-tête de page',
        'method' => 'Notre méthode',
        'featured' => 'Bloc à la une',
        'cta' => 'Bannière finale',
        'section' => 'Grille des certifications',
        'manifesto' => 'Manifeste',
        'stats' => 'Chiffres clés',
        'loyalty' => 'Fidélité',
        'values' => 'Nos valeurs',
        'case_study' => 'Étude de cas',
        'intro' => 'Introduction',
        'perks' => 'Arguments',
        'steps' => 'Étapes',
    ];

    protected $fillable = [
        'group',
        'key',
        'label',
        'order_column',
        'value_fr',
        'value_en',
    ];

    /**
     * Slug de section dérivé de la clé (ex. "home.hero.title" → "hero",
     * "quote.perks.perk1_title" → "perks"). Sert uniquement à regrouper
     * visuellement les champs dans l'admin.
     */
    public function section(): string
    {
        $rest = Str::after($this->key, $this->group.'.');
        $segments = explode('.', $rest);

        return $segments[0];
    }

    public function sectionLabel(): string
    {
        $slug = $this->section();

        return self::SECTION_LABELS[$slug] ?? ucfirst(str_replace('_', ' ', $slug));
    }
}
