<?php

namespace Database\Seeders;

use App\Models\LegalPage;
use Illuminate\Database\Seeder;

class LegalPageSeeder extends Seeder
{
    /**
     * Reprend tel quel le contenu précédemment codé en dur dans
     * resources/views/pages/legal/mentions.blade.php et terms.blade.php.
     */
    public function run(): void
    {
        LegalPage::updateOrCreate(
            ['slug' => LegalPage::MENTIONS],
            [
                'title_fr' => 'Mentions légales',
                'title_en' => 'Legal notice',
                'body_en' => $this->mentionsEn(),
                'body_fr' => $this->mentionsFr(),
            ]
        );

        LegalPage::updateOrCreate(
            ['slug' => LegalPage::TERMS],
            [
                'title_fr' => 'Conditions générales de vente',
                'title_en' => 'Terms of sale',
                'body_en' => $this->termsEn(),
                'body_fr' => $this->termsFr(),
            ]
        );
    }

    private function mentionsEn(): string
    {
        return <<<HTML
            <h2>Site publisher</h2>
            <p>
                This site is published by <strong>YesWeCange</strong>, a digital communication agency.<br>
                Legal form: [TO BE COMPLETED — e.g. SAS]<br>
                Share capital: [TO BE COMPLETED]<br>
                Registered office: 176 avenue Charles de Gaulle, 92200 Neuilly-sur-Seine, France<br>
                Abidjan office: Cocody, II Plateaux Vallons, Rue Des Jardins, Abidjan, Côte d'Ivoire<br>
                SIRET / RCS: [TO BE COMPLETED]<br>
                Intra-community VAT number: [TO BE COMPLETED]<br>
                Phone: +33 1 71 04 07 21<br>
                E-mail: contact@yeswecange.com
            </p>

            <h2>Publication director</h2>
            <p>[TO BE COMPLETED — Name of the legal representative]</p>

            <h2>Hosting</h2>
            <p>
                This site is hosted by: [TO BE COMPLETED — host name]<br>
                Address: [TO BE COMPLETED]<br>
                Phone: [TO BE COMPLETED]
            </p>

            <h2>Intellectual property</h2>
            <p>
                All content on this site (text, images, logos, visual identity, code) is the exclusive property
                of YesWeCange, unless otherwise stated. Any reproduction, representation or distribution, in whole
                or in part, without prior written authorisation, is prohibited and would constitute an infringement
                sanctioned under the French Intellectual Property Code.
            </p>

            <h2>Liability</h2>
            <p>
                YesWeCange strives to ensure the accuracy of the information published on this site, but cannot be
                held responsible for errors, omissions or unavailability. Links to third-party sites do not engage
                YesWeCange's responsibility regarding their content.
            </p>

            <h2>Personal data & cookies</h2>
            <p>
                The processing of your personal data is described in our
                <a href="/politique-de-confidentialite">privacy policy</a> and our
                <a href="/politique-de-cookies">cookie policy</a>.
            </p>
            HTML;
    }

    private function mentionsFr(): string
    {
        return <<<HTML
            <h2>Éditeur du site</h2>
            <p>
                Le présent site est édité par <strong>YesWeCange</strong>, agence de communication digitale.<br>
                Forme juridique : [À COMPLÉTER — ex. SAS]<br>
                Capital social : [À COMPLÉTER]<br>
                Siège social : 176 avenue Charles de Gaulle, 92200 Neuilly-sur-Seine, France<br>
                Agence d'Abidjan : Cocody, II Plateaux Vallons, Rue Des Jardins, Abidjan, Côte d'Ivoire<br>
                SIRET / RCS : [À COMPLÉTER]<br>
                Numéro de TVA intracommunautaire : [À COMPLÉTER]<br>
                Téléphone : +33 1 71 04 07 21<br>
                E-mail : contact@yeswecange.com
            </p>

            <h2>Directeur de la publication</h2>
            <p>[À COMPLÉTER — Nom du représentant légal]</p>

            <h2>Hébergement</h2>
            <p>
                Le site est hébergé par : [À COMPLÉTER — nom de l'hébergeur]<br>
                Adresse : [À COMPLÉTER]<br>
                Téléphone : [À COMPLÉTER]
            </p>

            <h2>Propriété intellectuelle</h2>
            <p>
                L'ensemble des contenus présents sur ce site (textes, images, logos, charte graphique, code)
                sont la propriété exclusive de YesWeCange, sauf mention contraire. Toute reproduction,
                représentation ou diffusion, totale ou partielle, sans autorisation écrite préalable, est interdite
                et constituerait une contrefaçon sanctionnée par le Code de la propriété intellectuelle.
            </p>

            <h2>Responsabilité</h2>
            <p>
                YesWeCange s'efforce d'assurer l'exactitude des informations diffusées sur ce site, mais ne saurait
                être tenue responsable des erreurs, omissions ou indisponibilités. Les liens vers des sites tiers
                n'engagent pas la responsabilité de YesWeCange quant à leur contenu.
            </p>

            <h2>Données personnelles & cookies</h2>
            <p>
                Le traitement de vos données personnelles est décrit dans notre
                <a href="/politique-de-confidentialite">politique de confidentialité</a> et notre
                <a href="/politique-de-cookies">politique de cookies</a>.
            </p>
            HTML;
    }

    private function termsEn(): string
    {
        return <<<HTML
            <p>
                These general terms govern the services provided by YesWeCange to its clients. Any order implies
                unconditional acceptance of these terms. They may be supplemented by specific conditions set out in
                the signed quote or contract.
            </p>

            <h2>1. Purpose & services</h2>
            <p>
                YesWeCange provides digital strategy, communication, social media, data mining, chatbots, search
                optimisation, branding and training services, according to the scope defined in each quote.
            </p>

            <h2>2. Quotes & orders</h2>
            <p>
                Each service is the subject of a detailed quote. The quote is valid for 30 days. The order is
                confirmed upon receipt of the signed quote and, where applicable, the agreed deposit.
            </p>

            <h2>3. Pricing & payment</h2>
            <p>
                Prices are shown excluding tax; applicable VAT is added in accordance with current regulations.
                Unless otherwise stated, payment terms and the schedule are specified in the quote. Any late payment
                incurs penalties at the legal rate as well as the fixed recovery indemnity provided for by law.
            </p>

            <h2>4. Client obligations</h2>
            <p>
                The client undertakes to provide, in due time, all the elements, access and approvals necessary for
                the proper execution of the services. Delays attributable to the client may push back the schedule.
            </p>

            <h2>5. Intellectual property</h2>
            <p>
                Deliverables are only transferred to the client after full payment. YesWeCange retains the right to
                reference the work as a portfolio piece, unless otherwise agreed under a confidentiality clause.
            </p>

            <h2>6. Confidentiality & data</h2>
            <p>
                Each party undertakes to preserve the confidentiality of the information exchanged. The processing of
                personal data is governed by our
                <a href="/politique-de-confidentialite">privacy policy</a>.
            </p>

            <h2>7. Liability</h2>
            <p>
                YesWeCange is bound by a best-effort obligation. Its liability shall not exceed the amount actually
                received for the service in question.
            </p>

            <h2>8. Governing law & disputes</h2>
            <p>
                These terms are governed by French law. In the event of a dispute, an amicable solution will be
                sought before any legal action. Failing that, jurisdiction is granted to the courts of the district
                of YesWeCange's registered office.
            </p>

            <p><em>[TO BE COMPLETED: specific conditions, applicable withdrawal periods, consumer mediator where relevant.]</em></p>
            HTML;
    }

    private function termsFr(): string
    {
        return <<<HTML
            <p>
                Les présentes conditions générales régissent les prestations de services fournies par YesWeCange à ses
                clients. Toute commande implique l'acceptation sans réserve des présentes conditions. Elles peuvent être
                complétées par des conditions particulières figurant dans le devis ou le contrat signé.
            </p>

            <h2>1. Objet & prestations</h2>
            <p>
                YesWeCange fournit des prestations de stratégie digitale, communication, social media, data mining,
                chatbots, référencement, branding et formation, selon le périmètre défini dans chaque devis.
            </p>

            <h2>2. Devis & commande</h2>
            <p>
                Chaque prestation fait l'objet d'un devis détaillé. Le devis est valable 30 jours. La commande est
                ferme à réception du devis signé et, le cas échéant, de l'acompte prévu.
            </p>

            <h2>3. Tarifs & paiement</h2>
            <p>
                Les prix sont indiqués hors taxes ; la TVA applicable est ajoutée selon la réglementation en vigueur.
                Sauf mention contraire, les conditions de règlement et l'échéancier sont précisés au devis. Tout retard
                de paiement entraîne des pénalités au taux légal ainsi que l'indemnité forfaitaire de recouvrement
                prévue par la loi.
            </p>

            <h2>4. Obligations du client</h2>
            <p>
                Le client s'engage à fournir en temps utile l'ensemble des éléments, accès et validations nécessaires à
                la bonne exécution des prestations. Les retards qui lui sont imputables peuvent décaler le planning.
            </p>

            <h2>5. Propriété intellectuelle</h2>
            <p>
                Les livrables ne sont cédés au client qu'après paiement intégral. YesWeCange conserve le droit de
                mentionner les réalisations à titre de référence, sauf accord de confidentialité contraire.
            </p>

            <h2>6. Confidentialité & données</h2>
            <p>
                Chaque partie s'engage à préserver la confidentialité des informations échangées. Le traitement des
                données personnelles est régi par notre
                <a href="/politique-de-confidentialite">politique de confidentialité</a>.
            </p>

            <h2>7. Responsabilité</h2>
            <p>
                YesWeCange est tenue à une obligation de moyens. Sa responsabilité ne saurait excéder le montant des
                sommes effectivement perçues au titre de la prestation concernée.
            </p>

            <h2>8. Droit applicable & litiges</h2>
            <p>
                Les présentes conditions sont soumises au droit français. En cas de litige, une solution amiable sera
                recherchée avant toute action judiciaire. À défaut, compétence est attribuée aux tribunaux du ressort
                du siège social de YesWeCange.
            </p>

            <p><em>[À COMPLÉTER : conditions particulières, délais de rétractation éventuels, médiateur de la consommation le cas échéant.]</em></p>
            HTML;
    }
}
