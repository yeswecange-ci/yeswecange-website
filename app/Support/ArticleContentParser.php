<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use Illuminate\Support\Str;

/**
 * Analyse le HTML (déjà nettoyé par HtmlSanitizer) d'un article de blog pour en
 * extraire, à l'affichage :
 *  - l'intro (paragraphes avant le premier <h2>), pour qu'elle reste au-dessus
 *    des encarts ci-dessous ;
 *  - un encart "points clés" quand l'article contient, en tête, un <h2>
 *    immédiatement suivi d'un <ul> (ex. "Ce qu'il faut retenir" / "Key takeaways") ;
 *  - un sommaire (table des matières) construit à partir des <h2> restants,
 *    avec des ancres injectées dans le HTML pour permettre la navigation.
 */
class ArticleContentParser
{
    /**
     * @return array{intro: string, html: string, toc: array<int, array{id: string, label: string}>, takeaways: ?array{title: string, items: array<int, string>}}
     */
    public static function parse(string $html): array
    {
        if (trim($html) === '') {
            return ['intro' => '', 'html' => '', 'toc' => [], 'takeaways' => null];
        }

        $dom = new DOMDocument;
        $previous = libxml_use_internal_errors(true);
        $loaded = $dom->loadHTML(
            '<?xml encoding="UTF-8"?><div id="__ywc_article">'.$html.'</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $wrapper = $loaded ? $dom->getElementById('__ywc_article') : null;

        if (! $wrapper) {
            return ['intro' => '', 'html' => $html, 'toc' => [], 'takeaways' => null];
        }

        $takeaways = self::extractLeadingTakeaways($dom, $wrapper);
        $intro = self::extractLeadingIntro($dom, $wrapper);
        $toc = self::injectHeadingAnchors($dom, $wrapper);

        $out = '';
        foreach (iterator_to_array($wrapper->childNodes) as $child) {
            $out .= $dom->saveHTML($child);
        }

        return ['intro' => trim($intro), 'html' => trim($out), 'toc' => $toc, 'takeaways' => $takeaways];
    }

    /**
     * Retire et sérialise les nœuds de tête (paragraphes d'intro...) qui précèdent
     * le premier <h2> restant, pour qu'ils s'affichent avant les encarts.
     */
    private static function extractLeadingIntro(DOMDocument $dom, DOMElement $wrapper): string
    {
        $leading = [];

        foreach (iterator_to_array($wrapper->childNodes) as $child) {
            if ($child instanceof DOMElement && strtolower($child->nodeName) === 'h2') {
                break;
            }

            $leading[] = $child;
        }

        $out = '';
        foreach ($leading as $node) {
            $out .= $dom->saveHTML($node);
            $wrapper->removeChild($node);
        }

        return $out;
    }

    /**
     * @return ?array{title: string, items: array<int, string>}
     */
    private static function extractLeadingTakeaways(DOMDocument $dom, DOMElement $wrapper): ?array
    {
        // Le "premier h2" du document — pas forcément le tout premier enfant,
        // l'article peut commencer par un ou deux paragraphes d'intro avant lui.
        $first = null;
        foreach ($wrapper->childNodes as $child) {
            if ($child instanceof DOMElement && strtolower($child->nodeName) === 'h2') {
                $first = $child;

                break;
            }
        }

        if (! $first instanceof DOMElement) {
            return null;
        }

        $second = $first->nextSibling;
        while ($second && ! ($second instanceof DOMElement)) {
            $second = $second->nextSibling;
        }

        if (! $second instanceof DOMElement || strtolower($second->nodeName) !== 'ul') {
            return null;
        }

        $title = trim($first->textContent);
        $items = [];
        foreach ($second->getElementsByTagName('li') as $li) {
            $text = trim($li->textContent);
            if ($text !== '') {
                $items[] = $text;
            }
        }

        if ($items === []) {
            return null;
        }

        $wrapper->removeChild($first);
        $wrapper->removeChild($second);

        return ['title' => $title, 'items' => $items];
    }

    /**
     * @return array<int, array{id: string, label: string}>
     */
    private static function injectHeadingAnchors(DOMDocument $dom, DOMElement $wrapper): array
    {
        $toc = [];
        $used = [];

        foreach (iterator_to_array($wrapper->getElementsByTagName('h2')) as $h2) {
            if (! $h2 instanceof DOMElement) {
                continue;
            }

            $label = trim($h2->textContent);
            if ($label === '') {
                continue;
            }

            $base = Str::slug($label) ?: 'section';
            $id = 'toc-'.$base;
            $i = 2;
            while (isset($used[$id])) {
                $id = 'toc-'.$base.'-'.$i;
                $i++;
            }
            $used[$id] = true;

            $h2->setAttribute('id', $id);
            $toc[] = ['id' => $id, 'label' => $label];
        }

        return $toc;
    }
}
