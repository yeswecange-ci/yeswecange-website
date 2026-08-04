<?php

namespace Database\Seeders;

use App\Models\FaqItem;
use App\Models\PortfolioItem;
use App\Models\SiteText;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PagesContentSeeder extends Seeder
{
    /**
     * Reprend tel quel le contenu précédemment codé en dur dans les pages publiques
     * (services, certifications, à propos, FAQ, réalisations, devis, contact), pour
     * que ces pages restent identiques une fois rendues éditables depuis l'admin.
     */
    public function run(): void
    {
        $this->seedServicesTexts();
        $this->seedCertificationsTexts();
        $this->seedAboutTexts();
        $this->seedFaq();
        $this->seedRealisations();
        $this->seedQuoteTexts();
        $this->seedContactTexts();
    }

    /**
     * @param  array<int, array{key: string, label: string, value_fr: string, value_en: string}>  $rows
     */
    private function seedTexts(string $group, array $rows): void
    {
        foreach ($rows as $i => $row) {
            SiteText::updateOrCreate(
                ['key' => $row['key']],
                array_merge($row, ['group' => $group, 'order_column' => $i + 1])
            );
        }
    }

    private function seedServicesTexts(): void
    {
        $this->seedTexts('services', [
            [
                'key' => 'services.header.eyebrow',
                'label' => 'Sur-titre (en-tête de page)',
                'value_fr' => 'Nos services',
                'value_en' => 'Our services',
            ],
            [
                'key' => 'services.header.title',
                'label' => 'Titre (en-tête de page, HTML simple autorisé)',
                'value_fr' => 'Un partenaire unique pour <span class="text-ywc-blue">toute</span> votre stratégie digitale.',
                'value_en' => 'A single partner for <span class="text-ywc-blue">your entire</span> digital strategy.',
            ],
            [
                'key' => 'services.header.lead',
                'label' => 'Texte d\'intro (en-tête de page)',
                'value_fr' => "De la stratégie à l'exécution, on couvre les 360° de votre communication. Une équipe, un cap, des résultats mesurables — à Paris comme à Abidjan.",
                'value_en' => 'From strategy to execution, we cover all 360° of your communication. One team, one direction, measurable results — in Paris as in Abidjan.',
            ],
            [
                'key' => 'services.header.stat1_label',
                'label' => 'Légende du chiffre "08" (en-tête)',
                'value_fr' => "domaines d'expertise",
                'value_en' => 'areas of expertise',
            ],
            [
                'key' => 'services.header.stat2_label',
                'label' => 'Légende du chiffre "360°" (en-tête)',
                'value_fr' => 'stratégie → exécution',
                'value_en' => 'strategy → execution',
            ],
            [
                'key' => 'services.header.stat3_label',
                'label' => 'Légende du chiffre "24/7" (en-tête)',
                'value_fr' => 'chatbots & relation client',
                'value_en' => 'chatbots & customer care',
            ],
            [
                'key' => 'services.method.eyebrow',
                'label' => 'Sur-titre (section méthode)',
                'value_fr' => 'Notre méthode',
                'value_en' => 'Our method',
            ],
            [
                'key' => 'services.method.title',
                'label' => 'Titre (section méthode)',
                'value_fr' => 'Quatre étapes, zéro improvisation.',
                'value_en' => 'Four steps, zero improvisation.',
            ],
            [
                'key' => 'services.method.step1_title',
                'label' => 'Étape 1 — titre',
                'value_fr' => 'Écoute & diagnostic',
                'value_en' => 'Listen & diagnose',
            ],
            [
                'key' => 'services.method.step1_desc',
                'label' => 'Étape 1 — texte',
                'value_fr' => 'On comprend votre marché, vos objectifs et vos contraintes.',
                'value_en' => 'We understand your market, goals and constraints.',
            ],
            [
                'key' => 'services.method.step2_title',
                'label' => 'Étape 2 — titre',
                'value_fr' => 'Stratégie sur-mesure',
                'value_en' => 'Tailored strategy',
            ],
            [
                'key' => 'services.method.step2_desc',
                'label' => 'Étape 2 — texte',
                'value_fr' => 'On définit le cap, les canaux et les indicateurs de succès.',
                'value_en' => 'We set the direction, channels and success metrics.',
            ],
            [
                'key' => 'services.method.step3_title',
                'label' => 'Étape 3 — titre',
                'value_fr' => 'Production & déploiement',
                'value_en' => 'Production & rollout',
            ],
            [
                'key' => 'services.method.step3_desc',
                'label' => 'Étape 3 — texte',
                'value_fr' => 'Contenus, campagnes et bots livrés avec exigence.',
                'value_en' => 'Content, campaigns and bots delivered with rigour.',
            ],
            [
                'key' => 'services.method.step4_title',
                'label' => 'Étape 4 — titre',
                'value_fr' => 'Mesure & optimisation',
                'value_en' => 'Measure & optimise',
            ],
            [
                'key' => 'services.method.step4_desc',
                'label' => 'Étape 4 — texte',
                'value_fr' => 'On analyse, on ajuste, on amplifie ce qui marche.',
                'value_en' => 'We analyse, adjust and amplify what works.',
            ],
            [
                'key' => 'services.featured.eyebrow',
                'label' => 'Sur-titre (bloc chatbots à la une)',
                'value_fr' => 'À la une · Chatbots',
                'value_en' => 'Featured · Chatbots',
            ],
            [
                'key' => 'services.featured.title',
                'label' => 'Titre (bloc chatbots à la une)',
                'value_fr' => 'La conversation, automatisée sur 6 canaux.',
                'value_en' => 'Conversation, automated across 6 channels.',
            ],
            [
                'key' => 'services.featured.paragraph',
                'label' => 'Texte (bloc chatbots à la une)',
                'value_fr' => "WhatsApp, web, Messenger, SMS… On déploie des assistants qui qualifient vos leads, répondent 24/7 et nourrissent votre data — sans jamais dormir.",
                'value_en' => 'WhatsApp, web, Messenger, SMS… We deploy assistants that qualify your leads, reply 24/7 and feed your data — and never sleep.',
            ],
            [
                'key' => 'services.featured.cta_label',
                'label' => 'Bouton (bloc chatbots à la une)',
                'value_fr' => 'Découvrir la plateforme →',
                'value_en' => 'Discover the platform →',
            ],
            [
                'key' => 'services.cta.title',
                'label' => 'Titre (bannière finale)',
                'value_fr' => 'Un projet en tête ? Démarquons-le ensemble.',
                'value_en' => 'Got a project in mind? Let’s make it stand out together.',
            ],
            [
                'key' => 'services.cta.lead',
                'label' => 'Texte (bannière finale)',
                'value_fr' => 'Audit gratuit, réponse sous 24h. Dites-nous où vous voulez aller, on trace le chemin.',
                'value_en' => 'Free audit, reply within 24h. Tell us where you want to go, we’ll map the way.',
            ],
            [
                'key' => 'services.cta.cta_label',
                'label' => 'Bouton (bannière finale)',
                'value_fr' => 'Demander un audit →',
                'value_en' => 'Request an audit →',
            ],
        ]);
    }

    private function seedCertificationsTexts(): void
    {
        $this->seedTexts('certifications', [
            [
                'key' => 'certifications.header.eyebrow',
                'label' => 'Sur-titre (en-tête de page)',
                'value_fr' => 'Certifications',
                'value_en' => 'Certifications',
            ],
            [
                'key' => 'certifications.header.title',
                'label' => 'Titre (en-tête de page, HTML simple autorisé)',
                'value_fr' => 'Une expertise<br><span class="text-ywc-blue">vérifiable.</span>',
                'value_en' => 'Expertise you can<br><span class="text-ywc-blue">verify.</span>',
            ],
            [
                'key' => 'certifications.header.lead',
                'label' => 'Texte d\'intro (en-tête de page)',
                'value_fr' => 'Les certifications et partenariats qui garantissent la façon dont nous travaillons.',
                'value_en' => 'The certifications and partnerships that back up the way we work.',
            ],
            [
                'key' => 'certifications.section.eyebrow',
                'label' => 'Sur-titre (grille des certifications)',
                'value_fr' => 'Nos accréditations',
                'value_en' => 'Our credentials',
            ],
            [
                'key' => 'certifications.section.title',
                'label' => 'Titre (grille des certifications)',
                'value_fr' => 'Une expertise reconnue',
                'value_en' => 'Recognised expertise',
            ],
            [
                'key' => 'certifications.cta.title',
                'label' => 'Titre (bannière finale)',
                'value_fr' => 'Prêt à vous démarquer ?',
                'value_en' => 'Ready to stand out?',
            ],
            [
                'key' => 'certifications.cta.lead',
                'label' => 'Texte (bannière finale)',
                'value_fr' => 'Parlez-nous de votre projet — on vous répond sous 24h.',
                'value_en' => "Tell us about your project — we'll reply within 24h.",
            ],
            [
                'key' => 'certifications.cta.cta_label',
                'label' => 'Bouton (bannière finale)',
                'value_fr' => 'Démarrer un projet →',
                'value_en' => 'Start a project →',
            ],
        ]);
    }

    private function seedAboutTexts(): void
    {
        $this->seedTexts('about', [
            [
                'key' => 'about.header.eyebrow',
                'label' => 'Sur-titre (en-tête de page)',
                'value_fr' => 'À propos',
                'value_en' => 'About us',
            ],
            [
                'key' => 'about.header.title',
                'label' => 'Titre (en-tête de page, HTML simple autorisé)',
                'value_fr' => 'On ne vend pas du consensus.<br>On vend la <span class="text-ywc-blue">différence.</span>',
                'value_en' => 'We don\'t sell consensus.<br>We sell <span class="text-ywc-blue">difference.</span>',
            ],
            [
                'key' => 'about.header.lead',
                'label' => 'Texte d\'intro (en-tête de page)',
                'value_fr' => "YesWeCange existe pour une seule raison : la ressemblance tue les marques. Nous construisons des identités qui se remarquent, se retiennent et se préfèrent — entre Paris et Abidjan.",
                'value_en' => 'YesWeCange exists for one reason: sameness kills brands. We build identities that get noticed, remembered and chosen — between Paris and Abidjan.',
            ],
            [
                'key' => 'about.manifesto.eyebrow',
                'label' => 'Sur-titre (manifeste)',
                'value_fr' => 'Notre manifeste',
                'value_en' => 'Our manifesto',
            ],
            [
                'key' => 'about.manifesto.title',
                'label' => 'Titre (manifeste)',
                'value_fr' => 'Ne suivez pas le troupeau.',
                'value_en' => "Don't follow the flock.",
            ],
            [
                'key' => 'about.manifesto.paragraphs',
                'label' => 'Paragraphes (manifeste, séparés par une ligne vide)',
                'value_fr' => "On a vu trop de marques choisir la sécurité : la même palette, le même ton, la même promesse vue mille fois ailleurs. Résultat : personne ne s'en souvient.\n\nChez YesWeCange, on part du principe inverse. Une marque qui ne dérange jamais personne n'intéresse personne. Notre travail commence là où s'arrête le consensus.\n\nNées entre Paris et Abidjan, nos équipes combinent la rigueur du marketing européen à l'énergie des marchés africains — sans jamais diluer l'un dans l'autre.",
                'value_en' => "We've seen too many brands choose safety: the same palette, the same tone, the same promise seen a thousand times elsewhere. The result: nobody remembers them.\n\nAt YesWeCange, we start from the opposite principle. A brand that never bothers anyone interests no one. Our work begins where consensus ends.\n\nBorn between Paris and Abidjan, we combine the rigor of European marketing with the energy of African markets — without ever diluting one into the other.",
            ],
            [
                'key' => 'about.stats.stat1_label',
                'label' => 'Légende du chiffre "+120"',
                'value_fr' => 'marques qui ont arrêté de se fondre dans la masse',
                'value_en' => 'brands that stopped blending in',
            ],
            [
                'key' => 'about.stats.stat2_label',
                'label' => 'Légende du chiffre "2"',
                'value_fr' => 'continents, une seule équipe',
                'value_en' => 'continents, one team',
            ],
            [
                'key' => 'about.stats.stat3_label',
                'label' => 'Légende du chiffre "94%"',
                'value_fr' => 'ne repartent jamais ailleurs',
                'value_en' => 'never look elsewhere again',
            ],
            [
                'key' => 'about.stats.stat4_label',
                'label' => 'Légende du chiffre "6"',
                'value_fr' => 'canaux, une seule conversation',
                'value_en' => 'channels, one conversation',
            ],
            [
                'key' => 'about.loyalty.eyebrow',
                'label' => 'Sur-titre (section fidélité)',
                'value_fr' => 'La vraie différence',
                'value_en' => 'The real difference',
            ],
            [
                'key' => 'about.loyalty.title',
                'label' => 'Titre (section fidélité)',
                'value_fr' => 'Un client. Plus aucune arrière-pensée.',
                'value_en' => 'One client. No second thoughts.',
            ],
            [
                'key' => 'about.loyalty.painpoint1',
                'label' => '"Ailleurs" — point 1',
                'value_fr' => 'Un nouveau chef de projet à chaque renouvellement.',
                'value_en' => 'A new project manager every renewal.',
            ],
            [
                'key' => 'about.loyalty.painpoint2',
                'label' => '"Ailleurs" — point 2',
                'value_fr' => 'On réexplique la marque depuis le début.',
                'value_en' => 'You re-explain your brand from scratch.',
            ],
            [
                'key' => 'about.loyalty.painpoint3',
                'label' => '"Ailleurs" — point 3',
                'value_fr' => 'Silence radio entre deux missions.',
                'value_en' => 'Radio silence between two missions.',
            ],
            [
                'key' => 'about.loyalty.win1',
                'label' => '"Chez YesWeCange" — point 1',
                'value_fr' => 'La même équipe, qui connaît votre marque par cœur.',
                'value_en' => 'The same team, who knows your brand by heart.',
            ],
            [
                'key' => 'about.loyalty.win2',
                'label' => '"Chez YesWeCange" — point 2',
                'value_fr' => 'Zéro remise à zéro, zéro friction.',
                'value_en' => 'Zero reset, zero friction.',
            ],
            [
                'key' => 'about.loyalty.win3',
                'label' => '"Chez YesWeCange" — point 3',
                'value_fr' => 'On reste présents, même sans mission en cours.',
                'value_en' => 'We stay close, even between missions.',
            ],
            [
                'key' => 'about.loyalty.callout',
                'label' => 'Texte sous le "94%"',
                'value_fr' => "Une fois qu'un client travaille avec nous, il ne repart plus jamais ailleurs.",
                'value_en' => 'Once a client works with us, they never look elsewhere again.',
            ],
            [
                'key' => 'about.values.eyebrow',
                'label' => 'Sur-titre (section valeurs)',
                'value_fr' => 'Nos valeurs',
                'value_en' => 'Our values',
            ],
            [
                'key' => 'about.values.title',
                'label' => 'Titre (section valeurs)',
                'value_fr' => "Six lignes qu'on ne franchit jamais",
                'value_en' => 'Six non-negotiables',
            ],
            [
                'key' => 'about.cta.title',
                'label' => 'Titre (bannière finale)',
                'value_fr' => 'Prêt à vous démarquer ?',
                'value_en' => 'Ready to stand out?',
            ],
            [
                'key' => 'about.cta.lead',
                'label' => 'Texte (bannière finale)',
                'value_fr' => 'Parlez-nous de votre projet — on vous répond sous 24h.',
                'value_en' => "Tell us about your project — we'll reply within 24h.",
            ],
            [
                'key' => 'about.cta.cta_label',
                'label' => 'Bouton (bannière finale)',
                'value_fr' => 'Démarrer un projet →',
                'value_en' => 'Start a project →',
            ],
        ]);
    }

    private function seedFaq(): void
    {
        $this->seedTexts('faq', [
            [
                'key' => 'faq.header.eyebrow',
                'label' => 'Sur-titre (en-tête de page)',
                'value_fr' => 'FAQ',
                'value_en' => 'FAQ',
            ],
            [
                'key' => 'faq.header.title',
                'label' => 'Titre (en-tête de page, HTML simple autorisé)',
                'value_fr' => 'Questions<br><span class="text-ywc-blue">fréquentes</span>',
                'value_en' => 'Frequently asked<br><span class="text-ywc-blue">questions</span>',
            ],
            [
                'key' => 'faq.header.lead',
                'label' => 'Texte d\'intro (en-tête de page)',
                'value_fr' => "Tout ce qu'il faut savoir avant de démarrer un projet avec nous.",
                'value_en' => 'Everything you need to know before starting a project with us.',
            ],
            [
                'key' => 'faq.cta.title',
                'label' => 'Titre (bannière finale)',
                'value_fr' => 'Une autre question ?',
                'value_en' => 'Still have a question?',
            ],
            [
                'key' => 'faq.cta.lead',
                'label' => 'Texte (bannière finale)',
                'value_fr' => 'Écrivez-nous — notre équipe répond sous 24h.',
                'value_en' => 'Reach out — our team replies within 24h.',
            ],
            [
                'key' => 'faq.cta.cta_label',
                'label' => 'Bouton (bannière finale)',
                'value_fr' => 'Nous contacter →',
                'value_en' => 'Contact us →',
            ],
        ]);

        $rows = [
            [
                'question_fr' => 'Quels services proposez-vous ?',
                'question_en' => 'Which services do you offer?',
                'answer_fr' => "Stratégie, social media & communication 360°, data mining, chatbots WhatsApp & web, SEO/SEA, branding et formation. On peut piloter toute votre stratégie digitale ou un projet unique.",
                'answer_en' => 'Strategy, social media & 360° communication, data mining, WhatsApp & web chatbots, SEO/SEA, branding and training. We can handle your full digital strategy or a single project.',
            ],
            [
                'question_fr' => 'Combien coûte un projet ?',
                'question_en' => 'How much does a project cost?',
                'answer_fr' => "Chaque projet est unique. On vous envoie un devis sur-mesure après un échange découverte gratuit, selon vos objectifs et le périmètre. Demandez un devis, on répond sous 24h.",
                'answer_en' => 'Every project is unique. We send a tailored quote after a free discovery call, based on your goals and scope. Request a quote and we reply within 24h.',
            ],
            [
                'question_fr' => 'Quels sont les délais ?',
                'question_en' => 'How long does a project take?',
                'answer_fr' => "Un chatbot peut être lancé en 2 à 3 semaines ; un projet de branding ou de site complet prend généralement 4 à 10 semaines. On vous donne un planning clair dans le devis.",
                'answer_en' => 'A chatbot can go live in 2–3 weeks; a full branding or website project usually runs 4–10 weeks. We give you a clear timeline in the quote.',
            ],
            [
                'question_fr' => 'Travaillez-vous à distance ?',
                'question_en' => 'Do you work remotely?',
                'answer_fr' => "Oui. Avec des équipes à Paris et Abidjan, on travaille avec des clients en Europe, en Afrique et au-delà — 100% à distance ou sur site si besoin.",
                'answer_en' => 'Yes. With teams in Paris and Abidjan, we work with clients across Europe, Africa and beyond — fully remote or on site when needed.',
            ],
            [
                'question_fr' => "C'est quoi la plateforme chatbot YesWeCange ?",
                'question_en' => 'What is the YesWeCange chatbot platform?',
                'answer_fr' => "Une plateforme conversationnelle qui automatise la relation client sur 6 canaux (WhatsApp, web, Messenger, SMS…), qualifie vos leads 24/7 et nourrit votre data.",
                'answer_en' => 'A conversational platform that automates customer relationships across 6 channels (WhatsApp, web, Messenger, SMS…), qualifies leads 24/7 and feeds your data.',
            ],
            [
                'question_fr' => 'Comment démarre-t-on ?',
                'question_en' => 'How do we get started?',
                'answer_fr' => "Envoyez-nous votre projet via le formulaire de contact ou demandez un devis. On planifie un échange, on comprend vos besoins, et on vous envoie une proposition sur-mesure.",
                'answer_en' => 'Send us your project via the contact form or request a quote. We schedule a call, understand your needs, and send a tailored proposal.',
            ],
        ];

        foreach ($rows as $i => $row) {
            FaqItem::updateOrCreate(
                ['question_fr' => $row['question_fr']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }

    private function seedRealisations(): void
    {
        $this->seedTexts('realisations', [
            [
                'key' => 'realisations.header.eyebrow',
                'label' => 'Sur-titre (en-tête de page)',
                'value_fr' => 'Réalisations',
                'value_en' => 'Our work',
            ],
            [
                'key' => 'realisations.header.title',
                'label' => 'Titre (en-tête de page)',
                'value_fr' => 'On réalise tous vos projets avec passion.',
                'value_en' => 'We bring all your projects to life, with passion.',
            ],
            [
                'key' => 'realisations.header.lead',
                'label' => 'Texte d\'intro (en-tête de page)',
                'value_fr' => "Des marques qui ont choisi de se démarquer. Aperçu de campagnes, plateformes conversationnelles et identités que nous avons déployées — en Europe et en Afrique.",
                'value_en' => 'Brands that chose to stand out. A look at the campaigns, conversational platforms and identities we have deployed — across Europe and Africa.',
            ],
            [
                'key' => 'realisations.case_study.eyebrow',
                'label' => 'Sur-titre (étude de cas)',
                'value_fr' => 'Étude de cas · Chaîne WhatsApp',
                'value_en' => 'Case study · WhatsApp Broadcast',
            ],
            [
                'key' => 'realisations.case_study.title',
                'label' => 'Titre (étude de cas)',
                'value_fr' => 'Une marque qui parle à 50 000 clients, en 1:1.',
                'value_en' => 'A brand talking to 50,000 customers, 1:1.',
            ],
            [
                'key' => 'realisations.case_study.paragraph',
                'label' => 'Texte (étude de cas)',
                'value_fr' => "Déploiement d'une Chaîne WhatsApp + chatbot de qualification. Diffusion de masse, conversations personnalisées et collecte de data en continu.",
                'value_en' => 'Rollout of a WhatsApp Broadcast + qualification chatbot. Mass broadcast, personalised conversations and continuous data collection.',
            ],
            [
                'key' => 'realisations.case_study.stat1_label',
                'label' => 'Légende du chiffre "×3.2"',
                'value_fr' => "taux d'engagement",
                'value_en' => 'engagement rate',
            ],
            [
                'key' => 'realisations.case_study.stat2_label',
                'label' => 'Légende du chiffre "+38%"',
                'value_fr' => 'leads qualifiés',
                'value_en' => 'qualified leads',
            ],
            [
                'key' => 'realisations.case_study.stat3_label',
                'label' => 'Légende du chiffre "24/7"',
                'value_fr' => 'disponibilité',
                'value_en' => 'availability',
            ],
            [
                'key' => 'realisations.cta.title',
                'label' => 'Titre (bannière finale)',
                'value_fr' => 'Votre projet sera le prochain.',
                'value_en' => 'Your project could be next.',
            ],
            [
                'key' => 'realisations.cta.lead',
                'label' => 'Texte (bannière finale)',
                'value_fr' => 'Parlons de vos objectifs. Devis gratuit, réponse sous 24h.',
                'value_en' => "Let's talk about your goals. Free quote, reply within 24h.",
            ],
            [
                'key' => 'realisations.cta.cta_label',
                'label' => 'Bouton (bannière finale)',
                'value_fr' => 'Démarrer un projet →',
                'value_en' => 'Start a project →',
            ],
        ]);

        $rows = [
            ['file' => 'chainewhatsapp.webp', 'category' => 'chatbots', 'size' => 'wide', 'title_fr' => 'Chaîne WhatsApp', 'title_en' => 'WhatsApp Broadcast', 'description_fr' => 'Diffusion de masse & relation 1:1', 'description_en' => 'Mass broadcast & 1:1 relationship'],
            ['file' => 'com-digital.webp', 'category' => 'communication', 'size' => 'normal', 'title_fr' => 'Communication digitale', 'title_en' => 'Digital communication', 'description_fr' => 'Contenus & stratégie 360°', 'description_en' => 'Content & 360° strategy'],
            ['file' => 'chatbot2.webp', 'category' => 'chatbots', 'size' => 'normal', 'title_fr' => 'Chatbot Messenger', 'title_en' => 'Chatbot Messenger', 'description_fr' => 'Engagement automatisé 24/7', 'description_en' => '24/7 automated engagement'],
            ['file' => 'publicité.webp', 'category' => 'publicite', 'size' => 'normal', 'title_fr' => 'Publicité en ligne', 'title_en' => 'Online advertising', 'description_fr' => 'Acquisition & ROI mesurable', 'description_en' => 'Acquisition & measurable ROI'],
            ['file' => 'brand.png', 'category' => 'branding', 'size' => 'normal', 'title_fr' => 'Identité de marque', 'title_en' => 'Brand identity', 'description_fr' => 'Logo, charte & direction artistique', 'description_en' => 'Logo, guidelines & art direction'],
            ['file' => 'socialmedia.png', 'category' => 'social', 'size' => 'normal', 'title_fr' => 'Campagne social media', 'title_en' => 'Social media campaign', 'description_fr' => 'Community management & influence', 'description_en' => 'Community management & influence'],
            ['file' => 'datamining.png', 'category' => 'chatbots', 'size' => 'tall', 'title_fr' => 'Data Mining', 'title_en' => 'Data Mining', 'description_fr' => 'Audiences ciblées & leads qualifiés', 'description_en' => 'Targeted audiences & qualified leads'],
            ['file' => 'websiteredisign.png', 'category' => 'communication', 'size' => 'normal', 'title_fr' => 'Refonte de site', 'title_en' => 'Website redesign', 'description_fr' => 'UX/UI & développement', 'description_en' => 'UX/UI & development'],
            ['file' => 'gamification.png', 'category' => 'social', 'size' => 'normal', 'title_fr' => 'Gamification', 'title_en' => 'Gamification', 'description_fr' => 'Jeux concours & engagement', 'description_en' => 'Contests & engagement'],
        ];

        foreach ($rows as $i => $row) {
            $storagePath = 'portfolio/'.$row['file'];

            if (! Storage::disk('public')->exists($storagePath)) {
                $source = public_path('images/'.$row['file']);
                if (File::exists($source)) {
                    Storage::disk('public')->put($storagePath, File::get($source));
                }
            }

            PortfolioItem::updateOrCreate(
                ['title_fr' => $row['title_fr']],
                [
                    'order_column' => $i + 1,
                    'title_fr' => $row['title_fr'],
                    'title_en' => $row['title_en'],
                    'description_fr' => $row['description_fr'],
                    'description_en' => $row['description_en'],
                    'category' => $row['category'],
                    'size' => $row['size'],
                    'image' => $storagePath,
                ]
            );
        }
    }

    private function seedQuoteTexts(): void
    {
        $this->seedTexts('quote', [
            [
                'key' => 'quote.header.eyebrow',
                'label' => 'Sur-titre (en-tête de page)',
                'value_fr' => 'audit gratuit',
                'value_en' => 'Free audit',
            ],
            [
                'key' => 'quote.header.title',
                'label' => 'Titre (en-tête de page)',
                'value_fr' => 'Obtenez votre audit personnalisé',
                'value_en' => 'Get your personalised audit',
            ],
            [
                'key' => 'quote.header.lead',
                'label' => 'Texte d\'intro (en-tête de page)',
                'value_fr' => 'Décrivez votre projet en quelques lignes. Nous revenons vers vous avec une proposition sur-mesure sous 24h.',
                'value_en' => "Describe your project in a few lines. We'll get back to you with a custom proposal within 24 hours.",
            ],
            [
                'key' => 'quote.intro.title',
                'label' => 'Titre (colonne arguments)',
                'value_fr' => 'Une proposition sur-mesure, sans engagement.',
                'value_en' => 'A tailored proposal, no strings attached.',
            ],
            [
                'key' => 'quote.perks.perk1_title',
                'label' => 'Argument 1 — titre',
                'value_fr' => 'Gratuit & sans engagement',
                'value_en' => 'Free & no commitment',
            ],
            [
                'key' => 'quote.perks.perk1_desc',
                'label' => 'Argument 1 — texte',
                'value_fr' => 'Recevez un audit détaillé, sans frais.',
                'value_en' => 'Get a detailed audit at no cost.',
            ],
            [
                'key' => 'quote.perks.perk2_title',
                'label' => 'Argument 2 — titre',
                'value_fr' => 'Réponse sous 24h',
                'value_en' => 'Reply within 24h',
            ],
            [
                'key' => 'quote.perks.perk2_desc',
                'label' => 'Argument 2 — texte',
                'value_fr' => 'Un vrai humain vous recontacte, vite.',
                'value_en' => 'A real human gets back to you, fast.',
            ],
            [
                'key' => 'quote.perks.perk3_title',
                'label' => 'Argument 3 — titre',
                'value_fr' => 'Sur-mesure',
                'value_en' => 'Custom-built',
            ],
            [
                'key' => 'quote.perks.perk3_desc',
                'label' => 'Argument 3 — texte',
                'value_fr' => 'Calibré sur vos objectifs, budget et délais.',
                'value_en' => 'Scoped to your goals, budget and timeline.',
            ],
            [
                'key' => 'quote.perks.perk4_title',
                'label' => 'Argument 4 — titre',
                'value_fr' => 'Experts Paris × Abidjan',
                'value_en' => 'Paris × Abidjan experts',
            ],
            [
                'key' => 'quote.perks.perk4_desc',
                'label' => 'Argument 4 — texte',
                'value_fr' => 'Deux continents, une équipe dédiée.',
                'value_en' => 'Two continents, one dedicated team.',
            ],
            [
                'key' => 'quote.intro.trust_blurb',
                'label' => 'Texte à côté du logo',
                'value_fr' => '+120 projets livrés · 94% de clients fidèles sur 2 continents.',
                'value_en' => '+120 projects delivered · 94% client retention across 2 continents.',
            ],
            [
                'key' => 'quote.steps.eyebrow',
                'label' => 'Sur-titre (comment ça marche)',
                'value_fr' => 'Comment ça marche',
                'value_en' => 'How it works',
            ],
            [
                'key' => 'quote.steps.title',
                'label' => 'Titre (comment ça marche)',
                'value_fr' => 'Trois étapes vers votre audit',
                'value_en' => 'Three steps to your audit',
            ],
            [
                'key' => 'quote.steps.step1_title',
                'label' => 'Étape 1 — titre',
                'value_fr' => 'Vous décrivez votre projet',
                'value_en' => 'You describe your project',
            ],
            [
                'key' => 'quote.steps.step1_desc',
                'label' => 'Étape 1 — texte',
                'value_fr' => 'Remplissez le formulaire — quelques lignes suffisent pour démarrer.',
                'value_en' => 'Fill in the form — a few lines are enough to get started.',
            ],
            [
                'key' => 'quote.steps.step2_title',
                'label' => 'Étape 2 — titre',
                'value_fr' => 'On étudie & cadre',
                'value_en' => 'We study & scope it',
            ],
            [
                'key' => 'quote.steps.step2_desc',
                'label' => 'Étape 2 — texte',
                'value_fr' => 'Notre équipe analyse vos besoins et prépare une proposition sur-mesure.',
                'value_en' => 'Our team analyses your needs and prepares a tailored proposal.',
            ],
            [
                'key' => 'quote.steps.step3_title',
                'label' => 'Étape 3 — titre',
                'value_fr' => 'Vous recevez votre audit',
                'value_en' => 'You get your audit',
            ],
            [
                'key' => 'quote.steps.step3_desc',
                'label' => 'Étape 3 — texte',
                'value_fr' => 'Un audit clair et détaillé sous 24h. Sans engagement.',
                'value_en' => 'A clear, detailed audit within 24 hours. No commitment.',
            ],
        ]);
    }

    private function seedContactTexts(): void
    {
        $this->seedTexts('contact', [
            [
                'key' => 'contact.header.eyebrow',
                'label' => 'Sur-titre (en-tête de page)',
                'value_fr' => 'Parlons de votre projet',
                'value_en' => "Let's talk about your project",
            ],
            [
                'key' => 'contact.header.title',
                'label' => 'Titre (en-tête de page)',
                'value_fr' => 'Discutons de votre projet.',
                'value_en' => "Let's discuss your project.",
            ],
            [
                'key' => 'contact.header.lead',
                'label' => 'Texte d\'intro (en-tête de page)',
                'value_fr' => 'Contactez-nous dès maintenant pour un devis gratuit. On vous répond sous 24h.',
                'value_en' => 'Get in touch now for a free quote. We reply within 24 hours.',
            ],
        ]);
    }
}
