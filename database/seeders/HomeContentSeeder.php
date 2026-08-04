<?php

namespace Database\Seeders;

use App\Models\ChatbotChannel;
use App\Models\OfficeLocation;
use App\Models\SiteText;
use App\Models\Stat;
use App\Models\Testimonial;
use App\Models\TrustChip;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    /**
     * Reprend tel quel le contenu précédemment codé en dur dans resources/views/welcome.blade.php,
     * pour que la page d'accueil reste identique une fois rendue éditable depuis l'admin.
     */
    public function run(): void
    {
        $this->seedTrustChips();
        $this->seedStats();
        $this->seedChatbotChannels();
        $this->seedTestimonials();
        $this->seedOfficeLocations();
        $this->seedSiteTexts();
    }

    private function seedTrustChips(): void
    {
        $rows = [
            [
                'key' => 'strategy',
                'label_fr' => 'Stratégie',
                'label_en' => 'Strategy',
                'text_fr' => "Positionnement, message, audiences et plan d'action — chaque décision guidée par vos objectifs business.",
                'text_en' => 'Positioning, message, audiences and action plan — every decision guided by your business goals.',
                'is_default' => false,
            ],
            [
                'key' => 'social',
                'label_fr' => 'Social Media',
                'label_en' => 'Social Media',
                'text_fr' => 'Des contenus qui font réagir, déclinés sur tous les canaux. On anime vos communautés et orchestre vos campagnes.',
                'text_en' => 'Content that sparks reactions, adapted to every channel. We run your communities and orchestrate your campaigns.',
                'is_default' => false,
            ],
            [
                'key' => 'data',
                'label_fr' => 'Data Mining',
                'label_en' => 'Data Mining',
                'text_fr' => 'On transforme la donnée en décisions : audiences ciblées, KPIs et leads qualifiés.',
                'text_en' => 'We turn data into decisions: targeted audiences, KPIs and qualified leads.',
                'is_default' => false,
            ],
            [
                'key' => 'chatbots',
                'label_fr' => 'Chatbots',
                'label_en' => 'Chatbots',
                'text_fr' => 'Automatisez la conversation 24/7 sur WhatsApp, web, Messenger et SMS — qualification de leads et support.',
                'text_en' => 'Automate conversation 24/7 on WhatsApp, web, Messenger and SMS — lead qualification and support.',
                'is_default' => true,
            ],
            [
                'key' => 'seo',
                'label_fr' => 'SEO',
                'label_en' => 'SEO',
                'text_fr' => 'Soyez trouvé au bon moment par les bonnes personnes : référencement naturel, campagnes payantes et optimisation.',
                'text_en' => 'Be found at the right time by the right people: organic search, paid campaigns and optimisation.',
                'is_default' => false,
            ],
            [
                'key' => 'branding',
                'label_fr' => 'Branding',
                'label_en' => 'Branding',
                'text_fr' => "Une marque qui crée l'émotion et marque les esprits : identité, design et expérience cohérents partout.",
                'text_en' => 'A brand that creates emotion and leaves a mark: consistent identity, design and experience everywhere.',
                'is_default' => false,
            ],
            [
                'key' => 'training',
                'label_fr' => 'Formation',
                'label_en' => 'Training',
                'text_fr' => 'On vous donne les clés du digital, en pratique — ateliers sur-mesure pour rendre vos équipes autonomes.',
                'text_en' => 'We hand you the keys to digital, in practice — tailored workshops to make your teams self-sufficient.',
                'is_default' => false,
            ],
            [
                'key' => 'ouisnap',
                'label_fr' => 'OuiSnap',
                'label_en' => 'OuiSnap',
                'text_fr' => 'OuiSnap — description à venir.',
                'text_en' => 'OuiSnap — description coming soon.',
                'is_default' => false,
            ],
        ];

        foreach ($rows as $i => $row) {
            TrustChip::updateOrCreate(
                ['key' => $row['key']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }

    private function seedStats(): void
    {
        $rows = [
            ['value' => '+120', 'label_fr' => 'projets livrés', 'label_en' => 'projects delivered'],
            ['value' => '2', 'label_fr' => 'continents', 'label_en' => 'continents'],
            ['value' => '94%', 'label_fr' => 'de clients fidèles', 'label_en' => 'client retention'],
        ];

        foreach ($rows as $i => $row) {
            Stat::updateOrCreate(
                ['value' => $row['value']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }

    private function seedChatbotChannels(): void
    {
        $rows = [
            ['label_fr' => 'Chaîne WhatsApp', 'label_en' => 'WhatsApp Broadcast'],
            ['label_fr' => 'Assistant web', 'label_en' => 'Web assistant'],
            ['label_fr' => 'Messenger', 'label_en' => 'Messenger'],
            ['label_fr' => 'Call & SMS Bot', 'label_en' => 'Call & SMS Bot'],
            ['label_fr' => 'Data Mining', 'label_en' => 'Data Mining'],
            ['label_fr' => 'Gamification', 'label_en' => 'Gamification'],
        ];

        foreach ($rows as $i => $row) {
            ChatbotChannel::updateOrCreate(
                ['label_en' => $row['label_en']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }

    private function seedTestimonials(): void
    {
        $rows = [
            [
                'author_name' => 'Awa K.',
                'initials' => 'AK',
                'role_fr' => 'Directrice marketing · Retail',
                'role_en' => 'Marketing Director · Retail',
                'quote_fr' => 'YesWeCange a transformé notre relation client : le chatbot WhatsApp qualifie nos leads 24/7 et notre équipe ne perd plus une seule demande.',
                'quote_en' => "YesWeCange transformed our customer relationship: the WhatsApp chatbot qualifies our leads 24/7 and our team never misses a single request.",
            ],
            [
                'author_name' => 'Julien M.',
                'initials' => 'JM',
                'role_fr' => 'CEO · Startup SaaS',
                'role_en' => 'CEO · SaaS startup',
                'quote_fr' => "Une équipe qui comprend autant l'Europe que l'Afrique. Nos campagnes ont enfin une vraie cohérence sur les deux marchés.",
                'quote_en' => 'A team that understands Europe as much as Africa. Our campaigns finally have real consistency across both markets.',
            ],
            [
                'author_name' => 'Fatou D.',
                'initials' => 'FD',
                'role_fr' => 'Responsable digital · PME',
                'role_en' => 'Digital Manager · SMB',
                'quote_fr' => 'Du branding à la data, tout est piloté par les résultats. +38% de leads qualifiés en un trimestre. On recommande les yeux fermés.',
                'quote_en' => 'From branding to data, everything is driven by results. +38% qualified leads in one quarter. We recommend them with full confidence.',
            ],
        ];

        foreach ($rows as $i => $row) {
            Testimonial::updateOrCreate(
                ['author_name' => $row['author_name']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }

    private function seedOfficeLocations(): void
    {
        $rows = [
            [
                'slug' => 'paris',
                'eyebrow' => 'Paris',
                'title_fr' => 'Agence de Paris',
                'title_en' => 'Paris office',
                'address' => "176 avenue Charles de Gaulle\n92200 Neuilly-sur-Seine",
                'phone' => '+33 1 71 04 07 21',
                'cta_label_fr' => "Ici c'est Paris",
                'cta_label_en' => 'This is Paris',
                'is_dark' => false,
            ],
            [
                'slug' => 'abidjan',
                'eyebrow' => 'Abidjan · « babi »',
                'title_fr' => "Agence d'Abidjan",
                'title_en' => 'Abidjan office',
                'address' => "Cocody, II Plateaux Vallons\nRue Des Jardins",
                'phone' => '+225 58 46 79 51',
                'cta_label_fr' => "Ici c'est Babi",
                'cta_label_en' => 'This is Babi',
                'is_dark' => true,
            ],
        ];

        foreach ($rows as $i => $row) {
            OfficeLocation::updateOrCreate(
                ['slug' => $row['slug']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }

    private function seedSiteTexts(): void
    {
        $rows = [
            [
                'key' => 'home.seo.title',
                'label' => "Titre SEO (affiché après « YesWeCange — »)",
                'value_fr' => 'Accélérer votre croissance.',
                'value_en' => 'Stand out.',
            ],
            [
                'key' => 'home.seo.meta_description',
                'label' => 'Meta description SEO',
                'value_fr' => "YesWeCange, l'agence digitale 360° qui vous démarque : stratégie, social media, data mining, chatbots WhatsApp, SEO/SEA et branding — entre Paris et Abidjan.",
                'value_en' => 'YesWeCange is the 360° digital agency that makes you stand out: strategy, social media, data mining, WhatsApp chatbots, SEO/SEA and branding — between Paris and Abidjan.',
            ],
            [
                'key' => 'home.hero.title',
                'label' => 'Titre principal (hero) — une ligne par retour à la ligne, la dernière ligne est mise en valeur',
                'value_fr' => "Ne suivez pas\nle troupeau.\nDémarquez-vous.",
                'value_en' => "Don't follow\nthe flock.\nStand out.",
            ],
            [
                'key' => 'home.hero.subtitle',
                'label' => 'Sous-titre (hero)',
                'value_fr' => "Bien plus qu'une présence en ligne : nous façonnons votre identité digitale pour vous démarquer et surclasser votre concurrence. Le digital à 360° pour dominer votre marché.",
                'value_en' => 'Much more than an online presence: we shape your digital identity to help you stand out and outperform your competition. 360° digital to dominate your market.',
            ],
            [
                'key' => 'home.hero.cta_primary',
                'label' => 'Bouton principal (hero)',
                'value_fr' => 'Lancer mon projet →',
                'value_en' => 'Start my project →',
            ],
            [
                'key' => 'home.hero.cta_secondary',
                'label' => 'Bouton secondaire (hero)',
                'value_fr' => 'Voir la plateforme chatbot',
                'value_en' => 'See the chatbot platform',
            ],
            [
                'key' => 'home.trust.eyebrow',
                'label' => 'Sur-titre (section « confiance »)',
                'value_fr' => 'Ils nous font confiance',
                'value_en' => 'Trusted by',
            ],
            [
                'key' => 'home.trust.title',
                'label' => 'Titre (section « confiance »)',
                'value_fr' => 'Des marques qui ont choisi de se démarquer',
                'value_en' => 'Brands that chose to stand out',
            ],
            [
                'key' => 'home.trust.intro',
                'label' => 'Texte d\'intro (section « confiance »)',
                'value_fr' => 'Startups, PME et grands comptes — en Europe et en Afrique — nous confient leur visibilité, leur contenu et leur relation client.',
                'value_en' => 'Startups, SMBs and large accounts — across Europe and Africa — trust us with their visibility, content and customer relationships.',
            ],
            [
                'key' => 'home.services.eyebrow',
                'label' => 'Sur-titre (section services)',
                'value_fr' => 'Nos expertises',
                'value_en' => 'Our expertise',
            ],
            [
                'key' => 'home.services.title',
                'label' => 'Titre (section services)',
                'value_fr' => "Un partenaire unique pour votre stratégie d'acquisition et de retention client",
                'value_en' => 'A single partner for your entire strategy',
            ],
            [
                'key' => 'home.services.cta_label',
                'label' => 'Bouton (section services)',
                'value_fr' => 'Voir tous nos services →',
                'value_en' => 'See all our services →',
            ],
            [
                'key' => 'home.chatbots.eyebrow',
                'label' => 'Sur-titre (section chatbots)',
                'value_fr' => 'La plateforme conversationnelle',
                'value_en' => 'The conversational platform',
            ],
            [
                'key' => 'home.chatbots.title',
                'label' => 'Titre (section chatbots) — une ligne par retour à la ligne, la dernière ligne est mise en valeur',
                'value_fr' => "Une conversation,\nsix canaux,\nzéro pause.",
                'value_en' => "One conversation,\nsix channels,\nzero pause.",
            ],
            [
                'key' => 'home.chatbots.paragraph',
                'label' => 'Texte (section chatbots)',
                'value_fr' => 'On automatise la relation client là où elle se joue : WhatsApp, web, Messenger, SMS. Chaque échange nourrit votre data et qualifie vos leads.',
                'value_en' => 'We automate the customer relationship wherever it happens: WhatsApp, web, Messenger, SMS. Every exchange feeds your data and qualifies your leads.',
            ],
            [
                'key' => 'home.testimonials.eyebrow',
                'label' => 'Sur-titre (section témoignages)',
                'value_fr' => 'Témoignages',
                'value_en' => 'Testimonials',
            ],
            [
                'key' => 'home.testimonials.title',
                'label' => 'Titre (section témoignages)',
                'value_fr' => 'Ils ont osé se démarquer',
                'value_en' => 'They dared to stand out',
            ],
            [
                'key' => 'home.offices.eyebrow',
                'label' => 'Sur-titre (section agences)',
                'value_fr' => 'Nos agences',
                'value_en' => 'Our offices',
            ],
            [
                'key' => 'home.offices.title',
                'label' => 'Titre (section agences)',
                'value_fr' => 'Deux agences, une seule ambition',
                'value_en' => 'Two offices, one ambition',
            ],
        ];

        foreach ($rows as $i => $row) {
            SiteText::updateOrCreate(
                ['key' => $row['key']],
                array_merge($row, ['group' => 'home', 'order_column' => $i + 1])
            );
        }
    }
}
