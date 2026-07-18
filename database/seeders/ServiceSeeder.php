<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Reprend tel quel le contenu précédemment codé en dur dans resources/views/services.blade.php.
     */
    public function run(): void
    {
        $rows = [
            [
                'icon' => '🎯',
                'title_en' => 'Strategy & Design',
                'title_fr' => 'Stratégie omnicale',
                'description_en' => 'Positioning, message, audiences and action plan. Every decision guided by your business goals.',
                'description_fr' => "Positionnement, message, audiences et plan d'action. Chaque décision guidée par vos objectifs business.",
                'tags_en' => ['Positioning', 'Audit', 'Roadmap'],
                'tags_fr' => ['Positionnement', 'Audit', 'Roadmap'],
                'feature' => false,
            ],
            [
                'icon' => null,
                'title_en' => 'Social Media & 360° Communication',
                'title_fr' => 'Production des kits global',
                'description_en' => 'Content that sparks reactions, adapted to every channel. We run your communities and orchestrate your campaigns.',
                'description_fr' => 'Des contenus qui font réagir, déclinés sur tous les canaux. On anime vos communautés et orchestre vos campagnes.',
                'tags_en' => ['Community management', 'Content', 'Campaigns'],
                'tags_fr' => ['Community management', 'Contenu', 'Campagnes'],
                'feature' => false,
            ],
            [
                'icon' => '📊',
                'title_en' => 'Marketing Intelligence',
                'title_fr' => 'Publicité Mobile',
                'description_en' => 'We turn data into decisions. Monitoring, social listening and performance-driven management.',
                'description_fr' => 'On transforme la donnée en décisions. Veille, social listening et pilotage par la performance.',
                'tags_en' => ['Social listening', 'KPIs', 'Reporting'],
                'tags_fr' => ['Social listening', 'KPIs', 'Reporting'],
                'feature' => false,
            ],
            [
                'icon' => null,
                'title_en' => 'Web & Mobile Development',
                'title_fr' => 'Referencement SEO & IA search',
                'description_en' => 'Custom sites, apps and platforms designed for performance and user experience.',
                'description_fr' => "Sites, applications et plateformes sur-mesure, pensés pour la performance et l'expérience utilisateur.",
                'tags_en' => ['Websites', 'Applications', 'UX/UI'],
                'tags_fr' => ['Sites web', 'Applications', 'UX/UI'],
                'feature' => false,
            ],
            [
                'icon' => null,
                'title_en' => 'Chatbots & WhatsApp',
                'title_fr' => 'Digitalisation IA / process',
                'description_en' => 'Automate conversation 24/7 on WhatsApp, web, Messenger and SMS. Lead qualification and support.',
                'description_fr' => 'Automatisez la conversation 24/7 sur WhatsApp, web, Messenger et SMS. Qualification de leads et support.',
                'tags_en' => ['WhatsApp', 'Web assistant', 'Messenger'],
                'tags_fr' => ['WhatsApp', 'Assistant web', 'Messenger'],
                'feature' => true,
            ],
            [
                'icon' => null,
                'title_en' => 'Search (SEO/SEA)',
                'title_fr' => 'Developpement IT',
                'description_en' => 'Be found at the right time by the right people. Organic search, paid campaigns and optimisation.',
                'description_fr' => 'Soyez trouvé au bon moment par les bonnes personnes. Référencement naturel, campagnes payantes et optimisation.',
                'tags_en' => ['SEO', 'Google Ads', 'Social Ads'],
                'tags_fr' => ['SEO', 'Google Ads', 'Social Ads'],
                'feature' => false,
            ],
            [
                'icon' => '🎨',
                'title_en' => 'Branding & Lean Marketing',
                'title_fr' => 'DATA analytics',
                'description_en' => 'A brand that creates emotion and leaves a mark. Consistent identity, design and experience everywhere.',
                'description_fr' => "Une marque qui crée l'émotion et marque les esprits. Identité, design et expérience cohérents partout.",
                'tags_en' => ['Visual identity', 'Art direction', 'Print'],
                'tags_fr' => ['Identité visuelle', 'Direction artistique', 'Print'],
                'feature' => false,
            ],
            [
                'icon' => '🎓',
                'title_en' => 'Training',
                'title_fr' => 'Chatbot Whatsapp',
                'description_en' => 'We hand you the keys to digital, in practice. Tailored workshops to make your teams self-sufficient.',
                'description_fr' => 'On vous donne les clés du digital, en pratique. Ateliers sur-mesure pour rendre vos équipes autonomes.',
                'tags_en' => ['Social media', 'Tools', 'Workshops'],
                'tags_fr' => ['Social media', 'Outils', 'Ateliers'],
                'feature' => false,
            ],
        ];

        foreach ($rows as $i => $row) {
            Service::updateOrCreate(
                ['title_fr' => $row['title_fr']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }
}
