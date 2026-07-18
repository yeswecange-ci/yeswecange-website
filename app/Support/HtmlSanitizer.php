<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;

/**
 * Nettoyeur HTML minimaliste et sans dépendance (basé sur ext-dom).
 *
 * Utilisé pour le contenu riche saisi dans le back-office (pages légales) afin
 * de neutraliser toute injection de script (XSS stocké) : seules quelques
 * balises de mise en forme sont conservées, tous les attributs sont supprimés
 * sauf `href`/`title` sur les liens, dont le schéma d'URL est validé.
 */
class HtmlSanitizer
{
    /** Balises de mise en forme autorisées. */
    private const ALLOWED_TAGS = [
        'h2', 'h3', 'h4', 'p', 'ul', 'ol', 'li', 'a', 'strong', 'em', 'b', 'i',
        'u', 'br', 'hr', 'blockquote', 'span', 'div', 'table', 'thead', 'tbody',
        'tr', 'th', 'td',
    ];

    /** Balises dont le contenu doit être entièrement supprimé (pas seulement déballé). */
    private const DROP_TAGS = ['script', 'style', 'iframe', 'object', 'embed', 'form', 'input', 'link', 'meta'];

    public static function clean(?string $html): string
    {
        $html = (string) $html;

        if (trim($html) === '') {
            return '';
        }

        $dom = new DOMDocument;
        $previous = libxml_use_internal_errors(true);
        $loaded = $dom->loadHTML(
            '<?xml encoding="UTF-8"?><div id="__ywc_root">'.$html.'</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $wrapper = $dom->getElementById('__ywc_root');

        if (! $loaded || ! $wrapper) {
            // Repli défensif : on retire toute balise non autorisée.
            return trim(strip_tags($html, array_map(fn ($t) => "<{$t}>", self::ALLOWED_TAGS)));
        }

        self::cleanNode($wrapper);

        $out = '';
        foreach (iterator_to_array($wrapper->childNodes) as $child) {
            $out .= $dom->saveHTML($child);
        }

        return trim($out);
    }

    private static function cleanNode(DOMNode $node): void
    {
        foreach (iterator_to_array($node->childNodes) as $child) {
            if (! $child instanceof DOMElement) {
                continue; // les nœuds texte sont conservés (échappés à la sérialisation)
            }

            $tag = strtolower($child->nodeName);

            if (in_array($tag, self::DROP_TAGS, true)) {
                $node->removeChild($child);

                continue;
            }

            if (! in_array($tag, self::ALLOWED_TAGS, true)) {
                // Balise inconnue : on la « déballe » en conservant son contenu nettoyé.
                self::cleanNode($child);
                while ($child->firstChild) {
                    $node->insertBefore($child->firstChild, $child);
                }
                $node->removeChild($child);

                continue;
            }

            self::cleanAttributes($child, $tag);
            self::cleanNode($child);
        }
    }

    private static function cleanAttributes(DOMElement $el, string $tag): void
    {
        foreach (iterator_to_array($el->attributes) as $attr) {
            $name = strtolower($attr->name);

            if ($tag === 'a' && in_array($name, ['href', 'title'], true)) {
                if ($name === 'href' && ! self::safeUrl($attr->value)) {
                    $el->removeAttribute($attr->name);
                }

                continue;
            }

            $el->removeAttribute($attr->name);
        }

        if ($tag === 'a' && $el->hasAttribute('href')) {
            $el->setAttribute('rel', 'noopener nofollow');
        }
    }

    private static function safeUrl(string $url): bool
    {
        $url = trim($url);

        if ($url === '') {
            return false;
        }

        // Autorise explicitement http(s), mailto, tel, ancres et liens relatifs.
        if (preg_match('#^(https?:|mailto:|tel:|/|\#)#i', $url)) {
            return true;
        }

        // Rejette tout autre schéma (javascript:, data:, vbscript:, …).
        return ! preg_match('#^[a-z][a-z0-9+.\-]*:#i', $url);
    }
}
