<?php

/*
|--------------------------------------------------------------------------
| Pages stratégiques contenu éditorial
|--------------------------------------------------------------------------
|
| Source de vérité éditoriale : Repository_MotsCles_Etape2_YesWeCange.xlsx,
| onglet « Pages éditoriales » (mot-clé principal, variantes, FAQ, preuve
| client, CTA de conversion) + Specifications_Developpeur_Pages_YesWeCange.docx
| (URL, H1, priorité, Schema.org).
|
| Une seule vue gabarit (resources/views/pages/strategic.blade.php) et un
| seul contrôleur (App\Http\Controllers\StrategicPageController) consomment
| ce fichier pour générer toutes les pages Expertise / Locales / Secteurs :
| ajouter une page = ajouter une entrée ici, aucun Blade à dupliquer.
|
| Champs marqués "TODO contenu manquant dans le repository" : la donnée
| n'existe pas dans le repository à la date de génération. Ne pas inventer
| de chiffre, de résultat client ou de témoignage pour les combler.
|
*/

return [

    // -----------------------------------------------------------------
    // Pages cœur (Accueil, Services) uniquement le bloc FAQ, le reste
    // du contenu de ces deux pages existe déjà et n'est pas dupliqué ici.
    // -----------------------------------------------------------------
    'core' => [
        'home' => [
            'faq' => [
                ['q' => "Qu'est-ce qu'une agence digitale à service complet ?", 'a' => "Une agence qui couvre stratégie, contenu, publicité, data et technique sous un même toit, pour éviter de multiplier les prestataires."],
                ['q' => "Quelles zones YesWeCange couvre-t-elle en Afrique ?", 'a' => "L'agence est basée à Abidjan (Cocody) et intervient dans plusieurs marchés francophones (Côte d'Ivoire, Sénégal, RDC), avec un bureau complémentaire à Neuilly-sur-Seine."],
                ['q' => "Quels types d'entreprises accompagnez-vous ?", 'a' => "Grands comptes (télécom, distribution), PME et startups, sur des besoins de visibilité, d'acquisition ou de structuration digitale."],
                ['q' => "Comment démarrer un projet avec YesWeCange ?", 'a' => "Par un premier échange de cadrage, suivi d'un audit gratuit qui sert de base à la proposition."],
            ],
        ],
        'services' => [
            'faq' => [
                ['q' => "Quels services propose YesWeCange ?", 'a' => "10 services couvrant stratégie omnicanale, production de contenu, data/analytics, publicité mobile, vidéo, SEO/IA search, digitalisation IA, développement IT et chatbot WhatsApp."],
                ['q' => "Comment se déroule une collaboration ?", 'a' => "Cadrage des objectifs, proposition sur-mesure, puis exécution avec points de suivi réguliers et reporting."],
                ['q' => "Puis-je ne prendre qu'un seul service ?", 'a' => "Oui, chaque service peut être mobilisé seul ou combiné dans une stratégie globale."],
            ],
        ],
    ],

    // -----------------------------------------------------------------
    // Pages piliers Expertise · /expertise/{slug}
    // -----------------------------------------------------------------
    'expertise' => [

        'growth-performance-marketing-afrique' => [
            'eyebrow' => 'Expertise',
            'h1' => 'Growth & Performance Marketing : une croissance mesurable, pas un plan figé',
            'hero_chart' => 'growth',
            'meta_title' => 'Agence Growth & Performance Marketing en Afrique | YesWeCange',
            'meta_description' => "Growth marketing orienté résultats pour entreprises en Afrique francophone : acquisition, tests rapides, canaux mobiles et WhatsApp. Audit gratuit.",
            'keyword' => 'agence Growth Marketing Afrique',
            'variants' => ['agence Performance Marketing Afrique', 'acquisition clients Afrique', 'growth hacking Afrique'],
            'intro' => "Le growth marketing est une approche qui priorise les tests rapides et les données plutôt qu'un plan marketing figé sur plusieurs mois. En Afrique francophone, cela veut dire s'appuyer sur les canaux réellement utilisés WhatsApp, réseaux sociaux, recherche mobile pour générer des résultats mesurables en quelques semaines.",
            'content' => [
                [
                    'type' => 'text',
                    'heading' => 'Qu\'est-ce que le growth marketing ?',
                    'body' => "Growth marketing : une méthode qui combine expérimentation continue, données et itération rapide pour trouver les leviers de croissance qui fonctionnent réellement pour une entreprise donnée par opposition à un plan de communication classique appliqué sans ajustement.",
                ],
                [
                    'type' => 'list',
                    'heading' => 'Notre méthode en 4 étapes',
                    'items' => [
                        'Audit des données existantes (trafic, conversions, canaux actuels)',
                        'Tests rapides sur 2 à 3 canaux prioritaires',
                        'Scaling des canaux qui fonctionnent, arrêt de ceux qui ne fonctionnent pas',
                        'Optimisation continue basée sur les résultats mesurés',
                    ],
                ],
                [
                    'type' => 'table',
                    'heading' => 'Growth marketing vs marketing traditionnel',
                    'columns' => ['Critère', 'Growth marketing', 'Marketing traditionnel'],
                    'rows' => [
                        ['Rythme', 'Itération toutes les 2 à 4 semaines', 'Plan figé sur 6 à 12 mois'],
                        ['Décision', 'Basée sur les données mesurées', 'Basée sur des hypothèses initiales'],
                        ['Budget', 'Réparti progressivement vers ce qui marche', 'Fixé par canal dès le départ'],
                    ],
                ],
            ],
            'client_proof' => "Campagne Orange Côte d'Ivoire Mondial 2026 (visibilité et trafic)",
            'client_proof_case_study' => null,
            'cta_label' => 'Réserver un audit de croissance gratuit',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'Google Ads & Meta Ads en Afrique', 'href' => '/expertise/google-ads-meta-ads-afrique'],
                ['label' => 'Tracking, Data & GTM server-side', 'href' => '/expertise/tracking-data-ga4-gtm'],
            ],
        ],

        'ia-marketing-automatisation' => [
            'eyebrow' => 'Expertise',
            'h1' => 'IA Marketing & Automatisation : gagner du temps sans perdre en personnalisation',
            'hero_chart' => 'automation',
            'meta_title' => 'Agence IA Marketing & Automatisation en Afrique | YesWeCange',
            'meta_description' => "Marketing automation propulsé par l'IA : qualification de leads, contenu, reporting. Une agence qui applique l'IA à son propre référencement. Audit gratuit.",
            'keyword' => 'agence IA Marketing Afrique',
            'variants' => ['IA marketing', 'marketing automation IA', 'digitalisation IA / process'],
            'intro' => "Le marketing automation propulsé par l'IA permet d'automatiser la qualification des leads, les réponses client et la production de contenu, tout en gardant un message personnalisé. YesWeCange accompagne des PME et grandes entreprises africaines dans la mise en place progressive de ces outils, sans infrastructure lourde ni changement brutal des habitudes.",
            'content' => [
                [
                    'type' => 'list',
                    'heading' => "Ce que l'IA peut digitaliser dans votre marketing",
                    'items' => [
                        'Qualification des leads entrants (scoring automatique)',
                        'Réponses aux questions fréquentes des clients (chatbot, WhatsApp)',
                        'Production de premiers jets de contenu (articles, descriptions produits)',
                        'Reporting et analyse de la performance des campagnes',
                    ],
                ],
                [
                    'type' => 'text',
                    'heading' => 'Est-ce adapté à une PME africaine ?',
                    'body' => "Oui : les outils actuels permettent un déploiement progressif et abordable, sans infrastructure lourde. L'automatisation démarre souvent par un seul processus (les réponses WhatsApp, par exemple) avant de s'étendre une fois les premiers résultats validés.",
                ],
                [
                    'type' => 'text',
                    'heading' => 'Notre propre méthode, appliquée à nous-mêmes',
                    'body' => "YesWeCange applique cette logique en interne : l'audit SEO/GEO/AEO complet mené sur yeswecange.com (indexation, données structurées, compatibilité avec les robots IA) sert lui-même de démonstration de méthode pour nos clients.",
                ],
            ],
            'client_proof' => "Stratégie de contenu IT Foundation « La Tech à Visage Humain » et audit SEO/GEO/AEO mené par YesWeCange sur son propre site.",
            'client_proof_case_study' => null,
            'cta_label' => 'Télécharger le guide IA marketing en Afrique',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'Référencement SEO, GEO & AEO', 'href' => '/expertise/seo-geo-aeo'],
                ['label' => 'WhatsApp Business API pour entreprises', 'href' => '/expertise/whatsapp-business-api'],
            ],
        ],

        'whatsapp-business-api' => [
            'eyebrow' => 'Expertise',
            'h1' => 'WhatsApp Business API : transformez votre canal de contact préféré en outil de vente',
            'hero_chart' => 'chat',
            'meta_title' => 'WhatsApp Business API pour Entreprises en Afrique | YesWeCange',
            'meta_description' => "Automatisez votre relation client sur WhatsApp : SAV, prise de commande, notifications. Mise en place de l'API WhatsApp Business en 2 à 4 semaines.",
            'keyword' => 'WhatsApp Business API Afrique',
            'variants' => ['chatbot WhatsApp', 'automatisation WhatsApp entreprise', 'WhatsApp Business Afrique'],
            'intro' => "WhatsApp est le canal de contact le plus utilisé par les clients en Afrique francophone. L'API WhatsApp Business permet de gérer plusieurs agents, d'automatiser les réponses courantes et de connecter WhatsApp à votre CRM bien au-delà de ce que permet l'application gratuite. YesWeCange met en place cette solution en 2 à 4 semaines.",
            'content' => [
                [
                    'type' => 'table',
                    'heading' => 'Application WhatsApp Business ou API : quelle différence ?',
                    'columns' => ['Critère', 'Application (gratuite)', 'API WhatsApp Business'],
                    'rows' => [
                        ["Nombre d'agents", '1 seul', 'Plusieurs, simultanés'],
                        ['Automatisation', 'Réponses limitées', 'Chatbot et scénarios complets'],
                        ['Intégration CRM', 'Non', 'Oui'],
                        ['Public visé', 'Très petites structures', 'PME et grandes entreprises'],
                    ],
                ],
                [
                    'type' => 'list',
                    'heading' => "Cas d'usage les plus fréquents",
                    'items' => [
                        'Service après-vente automatisé (FAQ, suivi de commande)',
                        'Prise de commande directement dans la conversation',
                        'Notifications de livraison ou de rendez-vous',
                        'Qualification de leads avant transfert à un commercial',
                    ],
                ],
            ],
            'client_proof' => 'À construire aucun cas client WhatsApp Business formalisé à ce jour ; à documenter en priorité avec un premier projet pilote.',
            'client_proof_case_study' => null,
            'cta_label' => 'Demander un audit WhatsApp Business gratuit',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'Agence IA Marketing & Automatisation', 'href' => '/expertise/ia-marketing-automatisation'],
            ],
        ],

        'google-ads-meta-ads-afrique' => [
            'eyebrow' => 'Expertise',
            'h1' => 'Agence Google Ads & Meta Ads en Afrique',
            'hero_chart' => 'ads',
            'meta_title' => 'Google Ads Afrique Agence Google & Meta Ads | YesWeCange',
            'meta_description' => "YesWeCange gère vos campagnes Google Ads Afrique et Meta Ads Afrique : publicité digitale Afrique pilotée par la donnée, du budget test au scaling.",
            'keyword' => 'Google Ads Afrique',
            'variants' => ['Meta Ads Afrique', 'publicité digitale Afrique', 'gestion campagnes publicitaires Afrique'],
            'intro' => "YesWeCange conçoit et pilote vos campagnes Google Ads Afrique et Meta Ads Afrique pour capter une demande existante et créer de la demande là où elle n'est pas encore exprimée.",
            'content' => [
                [
                    'heading' => "Google Ads Afrique et Meta Ads Afrique : deux leviers complémentaires",
                    'body' => "Google Ads capte une intention de recherche déjà présente : l'utilisateur cherche activement une solution. Meta Ads Afrique permet à l'inverse de créer la demande par un ciblage fin, avant même que le besoin ne soit formulé sous forme de recherche. En pratique, une stratégie de publicité digitale Afrique efficace combine souvent les deux leviers plutôt que de choisir l'un contre l'autre, en fonction du cycle d'achat et du niveau de maturité de votre marché.",
                ],
                [
                    'heading' => "Notre gestion des campagnes publicitaires en Afrique",
                    'body' => "Nous recommandons généralement un budget test sur le premier mois avant tout scaling, le temps de valider les audiences et les messages qui convertissent. La gestion des campagnes publicitaires Afrique s'appuie ensuite sur un tracking GA4/GTM propre, aligné sur vos objectifs business (leads, ventes, notoriété). Si vous disposez déjà de comptes publicitaires actifs, un audit précède systématiquement toute reprise en gestion, pour repartir sur des bases saines.",
                ],
            ],
            'client_proof' => 'À documenter capitaliser sur les premières créations publicitaires réalisées pour Biofar/Biophare.',
            'client_proof_case_study' => null,
            'cta_label' => null,
            'cta_is_fallback' => true,
            'schema_type' => 'Service',
            'priority' => 'Moyenne',
            'internal_links' => [
                ['label' => 'Agence Growth & Performance Marketing', 'href' => '/expertise/growth-performance-marketing-afrique'],
                ['label' => 'Tracking, Data & GTM server-side', 'href' => '/expertise/tracking-data-ga4-gtm'],
            ],
        ],

        'tracking-data-ga4-gtm' => [
            'eyebrow' => 'Expertise',
            'h1' => 'Tracking & Data : mesurez ce qui se passe vraiment sur votre site',
            'hero_chart' => 'tracking',
            'meta_title' => 'Tracking, Data & GTM Server-Side en Afrique | YesWeCange',
            'meta_description' => "Audit de tagging GTM/GA4, mise en place du tracking server-side : données plus fiables, conformité RGPD. Références : Winpart CI, La Clé des Châteaux.",
            'keyword' => 'GTM server-side',
            'variants' => ['tracking GA4', 'audit tagging Google Tag Manager', 'mise en place Google Analytics 4'],
            'intro' => "Le tracking server-side fait transiter les données via un serveur intermédiaire plutôt que le seul navigateur, ce qui les rend plus fiables face aux bloqueurs de publicité et plus conformes au RGPD. YesWeCange audite et met en place ce type de tracking avec Google Tag Manager et Google Analytics 4 pour des entreprises en Côte d'Ivoire et en RDC.",
            'content' => [
                [
                    'type' => 'table',
                    'heading' => 'Tracking classique vs tracking server-side',
                    'columns' => ['Critère', 'Tracking classique (client-side)', 'Tracking server-side'],
                    'rows' => [
                        ['Fiabilité des données', 'Impactée par les bloqueurs de publicité', 'Préservée'],
                        ['Vitesse de la page', 'Plusieurs scripts côté navigateur', "Un seul point d'entrée serveur"],
                        ['Conformité RGPD', 'Plus complexe à garantir', 'Plus simple à maîtriser'],
                    ],
                ],
                [
                    'type' => 'list',
                    'heading' => "Notre méthode d'audit en 4 étapes",
                    'items' => [
                        'Inventaire des outils de tracking déjà en place',
                        'Vérification des événements clés (formulaires, achats, appels)',
                        'Correction des écarts et doublons',
                        'Mise en place ou migration vers GA4 et GTM server-side',
                    ],
                ],
            ],
            'client_proof' => "Winpart Côte d'Ivoire (tagging GTM/GA4 + rapport analytics) et La Clé des Châteaux, Kinshasa (plan de tagging GTM/GA4/Meta Pixel).",
            'client_proof_case_study' => null,
            'cta_label' => 'Demander un audit de tracking gratuit',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'Référencement SEO, GEO & AEO', 'href' => '/expertise/seo-geo-aeo'],
            ],
        ],

        'seo-geo-aeo' => [
            'eyebrow' => 'Expertise',
            'h1' => 'SEO, GEO & AEO : être visible sur Google et cité par les IA génératives',
            'hero_chart' => 'seo',
            'meta_title' => 'Agence SEO, GEO & AEO en Afrique Francophone | YesWeCange',
            'meta_description' => "Référencement Google et visibilité dans les IA génératives (ChatGPT, Claude, Perplexity). Audit technique complet et déploiement Schema.org.",
            'keyword' => 'Référencement SEO & IA Search (GEO/AEO)',
            'variants' => ['agence SEO Abidjan', 'audit SEO technique', 'optimisation contenu IA search'],
            'intro' => "Le SEO classique optimise votre visibilité sur Google. Le GEO (Generative Engine Optimization) et l'AEO (Answer Engine Optimization) optimisent votre visibilité dans les réponses des IA génératives comme ChatGPT, Claude ou Perplexity. YesWeCange applique les deux approches, y compris sur son propre site, avec un audit technique complet en préalable.",
            'content' => [
                [
                    'type' => 'table',
                    'heading' => 'SEO, GEO, AEO : quelles différences ?',
                    'columns' => ['Approche', 'Objectif', 'Exemple de levier'],
                    'rows' => [
                        ['SEO', 'Être bien classé sur Google', 'Vitesse du site, maillage interne, sitemap'],
                        ['GEO', 'Être compris et repris par les IA génératives', 'Contenu structuré, données Schema.org'],
                        ['AEO', 'Être cité comme réponse directe', 'Format question/réponse, FAQ balisées'],
                    ],
                ],
                [
                    'type' => 'list',
                    'heading' => "Ce que couvre un audit technique",
                    'items' => [
                        'Indexation des pages et sitemap.xml',
                        'Core Web Vitals et performance mobile',
                        'Redirections et maillage interne',
                        'Accessibilité aux robots IA (GPTBot, ClaudeBot, PerplexityBot...)',
                        'Données structurées Schema.org',
                    ],
                ],
            ],
            'client_proof' => "Étude de cas interne : l'audit SEO/GEO/AEO complet mené par YesWeCange sur son propre site yeswecange.com.",
            'client_proof_case_study' => null,
            'cta_label' => 'Recevoir mon audit SEO/GEO/AEO gratuit',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'Tracking, Data & GTM server-side', 'href' => '/expertise/tracking-data-ga4-gtm'],
                ['label' => 'Agence IA Marketing & Automatisation', 'href' => '/expertise/ia-marketing-automatisation'],
                ['label' => 'Agence digitale à Abidjan', 'href' => '/agence-digitale-abidjan'],
            ],
        ],

    ],

    // -----------------------------------------------------------------
    // Pages locales · /agence-digitale-{ville}
    // -----------------------------------------------------------------
    'local' => [

        'abidjan' => [
            'eyebrow' => 'Agence locale',
            'h1' => 'Agence digitale à Abidjan : votre partenaire de croissance basé à Cocody',
            'meta_title' => 'Agence Digitale à Abidjan (Cocody) YesWeCange',
            'meta_description' => "Agence digitale basée à Cocody, Abidjan. Stratégie, publicité et data pour entreprises ivoiriennes. Références : Orange CI, Winpart CI. RDV possible.",
            'keyword' => 'agence digitale Abidjan',
            'variants' => ['agence marketing digital Abidjan', "agence webmarketing Côte d'Ivoire", 'meilleure agence marketing digital Abidjan'],
            'intro' => "YesWeCange est une agence digitale basée à Cocody, Abidjan, qui accompagne des entreprises ivoiriennes de toutes tailles sur leur stratégie digitale, leur publicité et leur visibilité en ligne. L'équipe intervient en présentiel comme à distance, avec une bonne connaissance des usages et des médias locaux.",
            'content' => [
                [
                    'type' => 'table',
                    'heading' => 'Pourquoi choisir une agence basée à Abidjan',
                    'columns' => ['Critère', 'Agence locale (YesWeCange)'],
                    'rows' => [
                        ['Connaissance du marché', 'Usages, médias et concurrence locaux déjà maîtrisés'],
                        ['Rencontres', 'Possibles à notre bureau de Cocody'],
                        ['Réseau', 'Fournisseurs et partenaires locaux déjà identifiés'],
                        ['Réactivité', 'Même fuseau horaire, pas de décalage'],
                    ],
                ],
                [
                    'type' => 'list',
                    'heading' => 'Secteurs accompagnés à Abidjan',
                    'items' => [
                        'Télécom visibilité, contenu éditorial et campagnes évènementielles',
                        'Distribution & e-commerce tagging, analytics et référencement produit',
                        'Institutionnels image de marque et contenu digital',
                        'PME structuration digitale et premières campagnes publicitaires',
                    ],
                ],
            ],
            'client_proof' => "Orange Côte d'Ivoire, Winpart Côte d'Ivoire, Bracongo, Seigneurie MIA Côte d'Ivoire.",
            'client_proof_case_study' => null,
            'cta_label' => 'Prendre rendez-vous à notre bureau de Cocody',
            'cta_is_fallback' => false,
            'schema_type' => 'LocalBusiness',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'Agence digitale à Dakar', 'href' => '/agence-digitale-dakar'],
                ['label' => 'Agence digitale à Kinshasa', 'href' => '/agence-digitale-kinshasa'],
                ['label' => 'Référencement SEO, GEO & AEO', 'href' => '/expertise/seo-geo-aeo'],
            ],
        ],

        'dakar' => [
            'eyebrow' => 'Agence locale',
            'h1' => 'Agence digitale à Dakar YesWeCange',
            'meta_title' => 'Agence digitale à Dakar | YesWeCange',
            'meta_description' => "YesWeCange accompagne les entreprises sénégalaises en marketing digital : stratégie digitale entreprise Dakar, pilotée depuis notre bureau d'Abidjan.",
            'keyword' => 'agence digitale Dakar',
            'variants' => ['agence marketing digital Sénégal', 'agence webmarketing Sénégal', 'stratégie digitale entreprise Dakar'],
            'intro' => "YesWeCange accompagne les entreprises de Dakar et du Sénégal en agence marketing digital Sénégal, avec un suivi de projet régulier en visioconférence depuis notre bureau d'Abidjan.",
            'content' => [
                [
                    'heading' => "Une agence digitale Dakar pilotée depuis Abidjan",
                    'body' => "En tant qu'agence digitale Dakar, notre accompagnement se fait principalement à distance depuis Abidjan, avec des points de suivi réguliers en visioconférence. Cette organisation nous permet de proposer une stratégie digitale entreprise Dakar au même niveau d'exigence que sur notre marché historique ivoirien, sans les coûts d'une structure locale permanente un délai moyen de démarrage de projet de une à deux semaines après le premier échange de cadrage.",
                ],
                [
                    'heading' => "Une agence webmarketing Sénégal en développement",
                    'body' => "Le marché sénégalais est en développement pour YesWeCange : en tant qu'agence webmarketing Sénégal, nous appliquons les mêmes secteurs prioritaires que sur notre marché ivoirien télécom, distribution, institutionnels en nous appuyant sur les méthodes et les outils déjà éprouvés à Abidjan.",
                ],
            ],
            'client_proof' => 'À construire marché en développement, aucun client sénégalais documenté à ce jour',
            'client_proof_case_study' => null,
            'cta_label' => 'Réserver un premier échange (visio)',
            'cta_is_fallback' => false,
            'schema_type' => 'Organization',
            'priority' => 'Moyenne',
            'internal_links' => [
                ['label' => 'Agence digitale à Abidjan', 'href' => '/agence-digitale-abidjan'],
                ['label' => 'Agence digitale à Kinshasa', 'href' => '/agence-digitale-kinshasa'],
            ],
        ],

        'kinshasa' => [
            'eyebrow' => 'Agence locale',
            'h1' => 'Agence digitale à Kinshasa YesWeCange',
            'meta_title' => 'Agence digitale à Kinshasa | YesWeCange',
            'meta_description' => "YesWeCange accompagne les entreprises de la RDC en marketing digital : stratégie digitale entreprise Kinshasa, tagging analytics et SEO, depuis Abidjan.",
            'keyword' => 'agence digitale Kinshasa',
            'variants' => ['agence marketing digital RDC', 'agence webmarketing Kinshasa', 'stratégie digitale entreprise Kinshasa'],
            'intro' => "YesWeCange est une agence marketing digital RDC qui accompagne les entreprises de Kinshasa à distance depuis Abidjan, avec un suivi de projet régulier en visioconférence.",
            'content' => [
                [
                    'heading' => "Une agence digitale Kinshasa au service des entreprises de la RDC",
                    'body' => "En tant qu'agence digitale Kinshasa, notre accompagnement se fait à distance depuis Abidjan, avec un suivi de projet régulier en visioconférence. Cette proximité méthodologique, sans présence physique permanente, nous permet de proposer une stratégie digitale entreprise Kinshasa réactive, avec un délai moyen de démarrage de projet de une à deux semaines après le premier échange de cadrage.",
                ],
                [
                    'heading' => "Une agence webmarketing Kinshasa expérimentée en tagging et SEO",
                    'body' => "Comme agence webmarketing Kinshasa, nous avons mené des projets de tagging analytics, de stratégie SEO et d'implémentation technique WooCommerce/WordPress pour des clients des secteurs du tourisme et de l'événementiel en République Démocratique du Congo. Cette expérience technique constitue une bonne opportunité de visibilité rapide sur un marché où peu d'agences digitales francophones spécialisées sont aujourd'hui visibles.",
                ],
            ],
            'client_proof' => 'La Clé des Châteaux (Kinshasa) tagging GTM/GA4/Meta Pixel, stratégie SEO complète, implémentation technique WooCommerce/WordPress',
            'client_proof_case_study' => null,
            'cta_label' => 'Réserver un premier échange (visio)',
            'cta_is_fallback' => false,
            'schema_type' => 'Organization',
            'priority' => 'Moyenne',
            'internal_links' => [
                ['label' => 'Agence digitale à Abidjan', 'href' => '/agence-digitale-abidjan'],
                ['label' => 'Agence digitale à Dakar', 'href' => '/agence-digitale-dakar'],
            ],
        ],

    ],

    // -----------------------------------------------------------------
    // Pages sectorielles · /secteurs/{slug}
    // -----------------------------------------------------------------
    'secteur' => [

        'banque' => [
            'eyebrow' => 'Secteur',
            'h1' => 'Marketing digital pour le secteur bancaire : générer des leads qualifiés dans un cadre réglementé',
            'meta_title' => 'Marketing Digital pour le Secteur Bancaire en Afrique | YesWeCange',
            'meta_description' => "Acquisition de clients bancaires en ligne, dans le respect des contraintes réglementaires du secteur. Stratégie digitale sur-mesure pour banques africaines.",
            'keyword' => 'marketing digital banque',
            'variants' => ['acquisition clients bancaires digital', 'stratégie digitale banque Afrique', 'publicité digitale institution financière'],
            'intro' => "Le secteur bancaire impose des contraintes spécifiques (mentions légales, conformité) qui rendent une stratégie marketing générique risquée. YesWeCange conçoit des campagnes et des contenus qui respectent ces exigences tout en captant une intention de recherche déjà présente sur des requêtes précises.",
            'content' => [
                [
                    'type' => 'list',
                    'heading' => 'Les enjeux spécifiques au secteur bancaire',
                    'items' => [
                        'Respecter les mentions légales et la conformité réglementaire',
                        'Construire la confiance avant de générer un lead',
                        'Adapter le discours aux différents segments (particuliers, PME, institutionnels)',
                    ],
                ],
                [
                    'type' => 'text',
                    'heading' => 'Nos leviers pour ce secteur',
                    'body' => "Une combinaison de référencement transactionnel (capter une intention déjà présente sur Google), de contenu pédagogique rassurant, et de campagnes publicitaires ciblées par segment de clientèle.",
                ],
            ],
            'client_proof' => 'À construire pas encore de client bancaire dans le portefeuille ; un premier partenariat sectoriel est en recherche active.',
            'client_proof_case_study' => null,
            'cta_label' => 'Demander un audit sectoriel banque',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'Marketing digital pour la fintech', 'href' => '/secteurs/fintech'],
                ['label' => 'Google Ads & Meta Ads en Afrique', 'href' => '/expertise/google-ads-meta-ads-afrique'],
            ],
        ],

        'telecom' => [
            'eyebrow' => 'Secteur',
            'h1' => 'Marketing digital pour le secteur télécom en Afrique',
            'meta_title' => 'Marketing digital télécom en Afrique | YesWeCange',
            'meta_description' => "YesWeCange accompagne les opérateurs télécom en Afrique : publicité digitale opérateur télécom, SEO produit et acquisition d'abonnés mobile.",
            'keyword' => 'marketing digital télécom',
            'variants' => ['publicité digitale opérateur télécom', 'acquisition abonnés mobile Afrique', 'stratégie SEO télécom'],
            'intro' => "Le marketing digital télécom demande des campagnes réactives, alignées sur les temps forts de l'actualité et les cycles de renouvellement d'abonnement. YesWeCange accompagne déjà un opérateur télécom en Afrique francophone.",
            'content' => [
                [
                    'heading' => "Publicité digitale opérateur télécom : SEO et contenu éditorial",
                    'body' => "Pour un opérateur télécom, la publicité digitale opérateur télécom s'appuie sur trois piliers complémentaires : le SEO produit pour les pages boutique, le contenu éditorial (actualités, offres) et des campagnes de visibilité construites autour des temps forts comme les grandes compétitions sportives suivies par une audience mobile massive. Cette combinaison permet de capter à la fois une intention d'achat immédiate et une audience plus large en phase de notoriété.",
                ],
                [
                    'heading' => "Acquisition abonnés mobile Afrique : une stratégie SEO télécom dédiée",
                    'body' => "L'acquisition abonnés mobile Afrique passe par une stratégie SEO télécom qui structure les pages produit et service autour des requêtes réellement tapées par les utilisateurs forfaits, recharge, offres data. Nous travaillons déjà avec Orange Côte d'Ivoire sur plusieurs volets de cette stratégie, de la boutique en ligne aux campagnes éditoriales liées à de grands événements sportifs.",
                ],
            ],
            'client_proof' => 'Orange Côte d\'Ivoire Boutique en ligne (BEL) et campagne éditoriale Mondial 2026',
            'client_proof_case_study' => null,
            'cta_label' => 'Demander un audit sectoriel télécom',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Moyenne',
            'internal_links' => [
                ['label' => 'Marketing digital pour la fintech', 'href' => '/secteurs/fintech'],
                ['label' => 'Agence Growth & Performance Marketing', 'href' => '/expertise/growth-performance-marketing-afrique'],
            ],
        ],

        'fintech' => [
            'eyebrow' => 'Secteur',
            'h1' => 'Marketing digital pour la fintech : capter des utilisateurs sur un marché encore jeune',
            'meta_title' => 'Marketing Digital pour le Secteur Fintech en Afrique | YesWeCange',
            'meta_description' => "Mobile money, néobanques, paiement digital : stratégies marketing pour capter et rassurer les utilisateurs fintech en Afrique francophone.",
            'keyword' => 'marketing digital fintech',
            'variants' => ['marketing digital mobile money', 'acquisition utilisateurs fintech Afrique', 'marketing digital néobanque Afrique'],
            'intro' => "L'usage du mobile money et des solutions de paiement digital progresse très rapidement en Afrique francophone, mais l'offre marketing spécialisée reste rare. YesWeCange combine contenu pédagogique, WhatsApp Business et campagnes de confiance pour accompagner la croissance des acteurs fintech.",
            'content' => [
                [
                    'type' => 'list',
                    'heading' => 'Pourquoi la fintech est un secteur à part',
                    'items' => [
                        "Confiance à construire avant l'usage (sécurité, fiabilité)",
                        "Cycle d'adoption rapide mais volatile",
                        'Concurrence internationale croissante sur les mêmes usages',
                    ],
                ],
                [
                    'type' => 'text',
                    'heading' => 'Nos leviers pour ce secteur',
                    'body' => "Contenu pédagogique pour rassurer sur la sécurité et l'usage, WhatsApp Business pour l'accompagnement client en temps réel, et campagnes de preuve sociale pour installer la confiance dans un marché encore jeune.",
                ],
            ],
            'client_proof' => 'À construire pas encore de client fintech dans le portefeuille ; un premier partenariat sectoriel est en recherche active.',
            'client_proof_case_study' => null,
            'cta_label' => 'Demander un audit sectoriel fintech',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Haute',
            'internal_links' => [
                ['label' => 'WhatsApp Business API pour entreprises', 'href' => '/expertise/whatsapp-business-api'],
                ['label' => 'Marketing digital pour le secteur bancaire', 'href' => '/secteurs/banque'],
            ],
        ],

        'assurance' => [
            'eyebrow' => 'Secteur',
            'h1' => "Marketing digital pour le secteur de l'assurance en Afrique",
            'meta_title' => 'Marketing digital assurance en Afrique | YesWeCange',
            'meta_description' => "YesWeCange accompagne les assureurs en Afrique francophone : acquisition leads assurance digital et stratégie contenu assurance pour installer la confiance.",
            'keyword' => 'marketing digital assurance',
            'variants' => ['acquisition leads assurance digital', 'publicité digitale assureur Afrique', 'stratégie contenu assurance'],
            'intro' => "Le marketing digital assurance repose avant tout sur la confiance. YesWeCange construit une stratégie contenu assurance pédagogique pour générer des leads qualifiés en Afrique francophone.",
            'content' => [
                [
                    'heading' => "Acquisition leads assurance digital : la confiance avant la conversion",
                    'body' => "Pour l'acquisition leads assurance digital, un contenu pédagogique rassurant associé à des campagnes de recherche captant une intention déjà présente donne de meilleurs résultats qu'une communication purement promotionnelle. Le secteur de l'assurance partage avec la banque une dynamique concurrentielle comparable : un cycle de décision plus long, où la crédibilité prime sur l'urgence.",
                ],
                [
                    'heading' => "Stratégie contenu assurance : formats qui installent la confiance",
                    'body' => "Une stratégie contenu assurance efficace s'appuie sur des articles explicatifs, des simulateurs et des témoignages clients pour installer la confiance. C'est un secteur en cours de développement pour YesWeCange, où nous appliquons les mêmes standards éditoriaux et techniques que sur nos marchés télécom et bancaire, en adaptant les formats aux spécificités de la publicité digitale assureur Afrique.",
                ],
            ],
            'client_proof' => 'À documenter',
            'client_proof_case_study' => null,
            'cta_label' => 'Demander un audit sectoriel assurance',
            'cta_is_fallback' => false,
            'schema_type' => 'Service',
            'priority' => 'Moyenne',
            'internal_links' => [
                ['label' => 'Marketing digital pour le secteur bancaire', 'href' => '/secteurs/banque'],
                ['label' => 'Marketing digital pour la fintech', 'href' => '/secteurs/fintech'],
            ],
        ],

    ],

    // -----------------------------------------------------------------
    // FAQ des 13 pages ci-dessus (repository, onglet « Pages éditoriales »)
    // Séparé du bloc principal ci-dessus pour lisibilité du fichier ;
    // fusionné avec chaque page par StrategicPageController::faqFor().
    // -----------------------------------------------------------------
    'faq' => [
        'expertise.growth-performance-marketing-afrique' => [
            ['q' => "Qu'est-ce que le growth marketing appliqué au marché africain ?", 'a' => "Une approche orientée résultats qui combine expérimentation rapide, données et canaux d'acquisition adaptés aux usages locaux (mobile, WhatsApp, réseaux sociaux)."],
            ['q' => "Growth marketing et marketing traditionnel : quelle différence ?", 'a' => "Le growth marketing priorise les tests mesurables et l'itération continue plutôt qu'un plan figé sur plusieurs mois."],
            ['q' => "Quels canaux fonctionnent le mieux en Afrique francophone ?", 'a' => "Cela dépend du secteur, mais WhatsApp, les réseaux sociaux et la recherche mobile dominent largement les parcours clients."],
            ['q' => "Combien de temps avant de voir des résultats ?", 'a' => "Les premiers signaux (trafic, leads) apparaissent souvent en 4 à 8 semaines ; la croissance durable se construit sur 2 à 3 trimestres."],
        ],
        'expertise.ia-marketing-automatisation' => [
            ['q' => "Qu'est-ce que le marketing automation propulsé par l'IA ?", 'a' => "L'utilisation de l'intelligence artificielle pour personnaliser, automatiser et optimiser les actions marketing (contenu, ciblage, relance client)."],
            ['q' => "Quels processus peut-on digitaliser avec l'IA ?", 'a' => "Qualification de leads, réponses client, production de contenu et reporting sont les premiers cas d'usage à fort ROI."],
            ['q' => "Est-ce adapté aux PME africaines ?", 'a' => "Oui : les outils actuels permettent un déploiement progressif et abordable, sans infrastructure lourde."],
            ['q' => "Quels outils utilisez-vous ?", 'a' => "Une combinaison d'outils IA générative, de plateformes d'automatisation et des données propriétaires du client."],
        ],
        'expertise.whatsapp-business-api' => [
            ['q' => "Quelle différence entre l'app WhatsApp Business et l'API ?", 'a' => "L'application gratuite convient aux petites structures ; l'API permet plusieurs agents, l'automatisation et l'intégration à un CRM."],
            ['q' => "Combien coûte l'intégration ?", 'a' => "Le coût dépend du volume de conversations et du fournisseur (BSP) choisi ; un devis est établi après audit des besoins."],
            ['q' => "Quels cas d'usage sont les plus fréquents ?", 'a' => "Service après-vente automatisé, prise de commande, notifications de livraison et qualification de leads."],
            ['q' => "Quel est le délai de mise en place ?", 'a' => "En général 2 à 4 semaines, validation Meta comprise."],
        ],
        'expertise.google-ads-meta-ads-afrique' => [
            ['q' => "Quel budget minimum pour démarrer une campagne ?", 'a' => "Cela dépend du secteur et de l'objectif, mais un budget test est généralement recommandé sur le premier mois avant scaling."],
            ['q' => "Google Ads ou Meta Ads : lequel choisir ?", 'a' => "Google Ads capte une intention de recherche déjà présente ; Meta Ads permet de créer la demande par le ciblage. Les deux sont souvent complémentaires."],
            ['q' => "Comment mesurez-vous le retour sur investissement ?", 'a' => "Via un tracking GA4/GTM propre, aligné sur les objectifs business définis en amont (leads, ventes, notoriété)."],
            ['q' => "Gérez-vous des comptes publicitaires déjà existants ?", 'a' => "Oui, un audit du compte existant précède toujours la reprise en gestion."],
        ],
        'expertise.tracking-data-ga4-gtm' => [
            ['q' => "Qu'est-ce que le tracking server-side et pourquoi l'adopter ?", 'a' => "Le tracking passe par un serveur intermédiaire plutôt que le seul navigateur : données plus fiables, moins d'impact des bloqueurs de publicité, meilleure conformité RGPD."],
            ['q' => "GA4 est-il obligatoire ?", 'a' => "GA4 a remplacé Universal Analytics ; c'est aujourd'hui le standard pour tout site qui veut mesurer correctement son trafic."],
            ['q' => "Combien de temps pour un audit de tagging complet ?", 'a' => "En général 1 à 2 semaines selon la complexité du site et le nombre d'outils déjà en place."],
            ['q' => "Travaillez-vous avec des CMS comme WordPress ou WooCommerce ?", 'a' => "Oui, ce sont des environnements déjà pris en charge dans nos déploiements clients."],
        ],
        'expertise.seo-geo-aeo' => [
            ['q' => "Qu'est-ce que le GEO/AEO, en plus du SEO classique ?", 'a' => "Le GEO (Generative Engine Optimization) et l'AEO (Answer Engine Optimization) visent à rendre un site compréhensible et citable par les IA génératives (ChatGPT, Claude, Perplexity), en complément du référencement Google classique."],
            ['q' => "En quoi consiste un audit technique SEO ?", 'a' => "Vérification de l'indexation, du sitemap, du robots.txt, des Core Web Vitals, des redirections, du maillage interne et de la compatibilité avec les robots IA."],
            ['q' => "Pourquoi les données structurées Schema.org sont-elles importantes ?", 'a' => "Elles permettent aux moteurs de recherche et aux IA de comprendre précisément le contenu d'une page, au-delà du texte brut."],
            ['q' => "Proposez-vous ce service pour d'autres sites que le vôtre ?", 'a' => "Oui l'audit technique mené sur yeswecange.com sert justement de démonstration de méthode pour nos clients."],
        ],
        'local.abidjan' => [
            ['q' => "Pourquoi choisir une agence locale basée à Abidjan ?", 'a' => "Une meilleure connaissance des usages, des médias et des contraintes du marché ivoirien, avec un accompagnement possible en présentiel."],
            ['q' => "Quels secteurs accompagnez-vous à Abidjan ?", 'a' => "Télécom, distribution, institutionnels et PME, avec des références vérifiables sur le marché ivoirien."],
            ['q' => "Travaillez-vous avec des grandes entreprises comme avec des PME ?", 'a' => "Oui, les deux profils sont accompagnés, avec des offres adaptées à chaque taille de structure."],
            ['q' => "Proposez-vous un accompagnement en présentiel ?", 'a' => "Oui, à notre bureau de Cocody, en complément du suivi à distance."],
        ],
        'local.dakar' => [
            ['q' => "Intervenez-vous à distance ou avez-vous une présence à Dakar ?", 'a' => "L'accompagnement se fait principalement à distance depuis Abidjan, avec des points de suivi réguliers en visio."],
            ['q' => "Quels secteurs accompagnez-vous au Sénégal ?", 'a' => "Le marché sénégalais est en développement pour YesWeCange ; les secteurs prioritaires suivent la même logique que la Côte d'Ivoire (télécom, distribution, institutionnels)."],
            ['q' => "Quel est le délai moyen de démarrage d'un projet ?", 'a' => "Généralement 1 à 2 semaines après le premier échange de cadrage."],
        ],
        'local.kinshasa' => [
            ['q' => "Intervenez-vous directement à Kinshasa ?", 'a' => "L'accompagnement se fait à distance depuis Abidjan, avec un suivi de projet régulier en visio."],
            ['q' => "Quels types de projets avez-vous menés en RDC ?", 'a' => "Tagging analytics, stratégie SEO et implémentation technique WooCommerce/WordPress pour des clients du secteur du tourisme et de l'événementiel."],
            ['q' => "Quel est le délai moyen de démarrage d'un projet ?", 'a' => "Généralement 1 à 2 semaines après le premier échange de cadrage."],
        ],
        'secteur.banque' => [
            ['q' => "Comment respecter les contraintes réglementaires du secteur bancaire dans vos campagnes ?", 'a' => "En adaptant les messages et les mentions légales aux exigences du secteur, en lien avec les équipes conformité du client."],
            ['q' => "Quels canaux fonctionnent le mieux pour capter des leads bancaires qualifiés ?", 'a' => "La recherche Google (intention forte) et les réseaux sociaux pour la notoriété amont, combinés à un tunnel de conversion clair."],
            ['q' => "Travaillez-vous avec des banques déjà présentes en Afrique francophone ?", 'a' => "C'est un secteur en cours de développement pour YesWeCange ; un premier partenariat sectoriel est en recherche active."],
        ],
        'secteur.telecom' => [
            ['q' => "Quels types de campagnes menez-vous pour les opérateurs télécom ?", 'a' => "SEO produit, contenu éditorial (actualités sportives, offres), et campagnes de visibilité autour de temps forts (ex. compétitions sportives)."],
            ['q' => "Travaillez-vous déjà avec un opérateur télécom en Afrique ?", 'a' => "Oui, avec Orange Côte d'Ivoire sur plusieurs volets."],
        ],
        'secteur.fintech' => [
            ['q' => "Pourquoi le secteur fintech est-il stratégique en Afrique francophone ?", 'a' => "L'usage du mobile money et des solutions de paiement digital progresse très rapidement, avec encore peu d'offres marketing spécialisées."],
            ['q' => "Quels leviers fonctionnent le mieux pour acquérir des utilisateurs fintech ?", 'a' => "Contenu pédagogique, WhatsApp Business et campagnes de confiance (preuve sociale, sécurité) sont particulièrement efficaces sur ce secteur."],
            ['q' => "Avez-vous une expertise sur les problématiques de paiement digital ?", 'a' => "L'équipe a une bonne compréhension des enjeux du secteur au travers de projets connexes (moyens de paiement, portefeuilles multi-supports)."],
        ],
        'secteur.assurance' => [
            ['q' => "Comment générer des leads qualifiés dans le secteur de l'assurance ?", 'a' => "Par un contenu pédagogique rassurant, associé à des campagnes de recherche captant une intention déjà présente."],
            ['q' => "Quels formats fonctionnent le mieux pour ce secteur ?", 'a' => "Articles explicatifs, simulateurs et témoignages clients sont particulièrement efficaces pour installer la confiance."],
            ['q' => "Travaillez-vous déjà avec des assureurs en Afrique francophone ?", 'a' => "C'est un secteur en cours de développement pour YesWeCange."],
        ],
    ],

];
