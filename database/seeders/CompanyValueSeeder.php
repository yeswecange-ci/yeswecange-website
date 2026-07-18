<?php

namespace Database\Seeders;

use App\Models\CompanyValue;
use Illuminate\Database\Seeder;

class CompanyValueSeeder extends Seeder
{
    /**
     * Reprend tel quel le contenu précédemment codé en dur dans resources/views/pages/about.blade.php (section VALEURS).
     */
    public function run(): void
    {
        $rows = [
            [
                'icon_key' => 'target',
                'title_en' => 'Boldness',
                'title_fr' => 'Excellence',
                'description_en' => "The safe idea is the one we throw out first. If it looks like everyone else's, it's not ready.",
                'description_fr' => "offrir d'excellents produits numériques sur le plan du design, de la technologie et du contenu.",
            ],
            [
                'icon_key' => 'chart',
                'title_en' => 'Data-driven',
                'title_fr' => 'Adaptation culturelle et locale',
                'description_en' => 'Opinions are a starting point, not a decision. Every choice is checked against audiences, KPIs, results.',
                'description_fr' => 'contenu adapté à la culture locale et nous adaptons à votre marché.',
            ],
            [
                'icon_key' => 'users',
                'title_en' => 'Partnership',
                'title_fr' => "Création d'emplois locaux",
                'description_en' => "We're not a vendor you renew. We're a team you keep — that's the whole point.",
                'description_fr' => 'créer des emplois localement.',
            ],
            [
                'icon_key' => 'zap',
                'title_en' => 'Reactivity',
                'title_fr' => "Esprit d'entreprise positif",
                'description_en' => 'You get an answer within 24h, always. We move before you have to ask twice.',
                'description_fr' => "Une culture d'entreprise dynamique, humaine et motivante.",
            ],
            [
                'icon_key' => 'globe',
                'title_en' => 'Dual culture',
                'title_fr' => 'Innovation stratégique et technologique',
                'description_en' => "Paris sets the rigor, Abidjan sets the energy. Neither one waters down the other.",
                'description_fr' => 'savoir-faire à la fois stratégique et technologique.',
            ],
            [
                'icon_key' => 'rocket',
                'title_en' => 'Innovation',
                'title_fr' => 'Accompagnement personnalisé',
                'description_en' => 'Chatbots, AI, automation: we ship what others are still presenting in slide decks.',
                'description_fr' => 'suivi personnalisé avant, pendant et après la réalisation de votre projet.',
            ],
        ];

        foreach ($rows as $i => $row) {
            CompanyValue::updateOrCreate(
                ['title_fr' => $row['title_fr']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }
}
