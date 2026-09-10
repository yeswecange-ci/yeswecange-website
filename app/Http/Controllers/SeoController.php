<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /**
     * Génère le sitemap XML à partir des routes publiques indexables.
     */
    public function sitemap(): Response
    {
        $routes = [
            ['name' => 'home', 'priority' => '1.0', 'freq' => 'weekly', 'view' => 'welcome.blade.php'],
            ['name' => 'services', 'priority' => '0.9', 'freq' => 'monthly', 'view' => 'services.blade.php'],
            ['name' => 'realisations', 'priority' => '0.9', 'freq' => 'monthly', 'view' => 'realisations.blade.php'],
            ['name' => 'blog.index', 'priority' => '0.7', 'freq' => 'weekly', 'view' => 'pages/blog/index.blade.php'],
            ['name' => 'about', 'priority' => '0.7', 'freq' => 'monthly', 'view' => 'pages/about.blade.php'],
            ['name' => 'faq', 'priority' => '0.6', 'freq' => 'monthly', 'view' => 'pages/faq.blade.php'],
            ['name' => 'contact', 'priority' => '0.7', 'freq' => 'yearly', 'view' => 'pages/contact.blade.php'],
            ['name' => 'quote', 'priority' => '0.8', 'freq' => 'yearly', 'view' => 'pages/quote.blade.php'],
            ['name' => 'legal.mentions', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/mentions.blade.php'],
            ['name' => 'legal.privacy', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/privacy.blade.php'],
            ['name' => 'legal.terms', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/terms.blade.php'],
            ['name' => 'legal.cookies', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/cookies.blade.php'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        foreach ($routes as $route) {
            $viewPath = resource_path('views/'.$route['view']);
            $lastmod = is_file($viewPath) ? date('Y-m-d', filemtime($viewPath)) : null;

            $xml .= "  <url>\n";
            $xml .= '    <loc>'.e(route($route['name']))."</loc>\n";
            if ($lastmod) {
                $xml .= '    <lastmod>'.$lastmod."</lastmod>\n";
            }
            $xml .= '    <changefreq>'.$route['freq']."</changefreq>\n";
            $xml .= '    <priority>'.$route['priority']."</priority>\n";
            $xml .= "  </url>\n";
        }

        $strategicViewPath = resource_path('views/pages/strategic.blade.php');
        $strategicLastmod = is_file($strategicViewPath) ? date('Y-m-d', filemtime($strategicViewPath)) : null;

        foreach ($this->strategicPageUrls() as $url => $priorityLabel) {
            $priority = $priorityLabel === 'Haute' ? '0.8' : '0.6';

            $xml .= "  <url>\n";
            $xml .= '    <loc>'.e(url($url))."</loc>\n";
            if ($strategicLastmod) {
                $xml .= '    <lastmod>'.$strategicLastmod."</lastmod>\n";
            }
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= '    <priority>'.$priority."</priority>\n";
            $xml .= "  </url>\n";
        }

        foreach (Article::published()->orderByDesc('published_at')->get() as $article) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>'.e(route('blog.show', $article))."</loc>\n";
            $xml .= '    <lastmod>'.$article->updated_at->format('Y-m-d')."</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.6</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    /**
     * URL => priorité ("Haute"/"Moyenne") pour toutes les pages stratégiques
     * (Expertise / Locales / Secteurs) définies dans config/strategic_pages.php.
     *
     * @return array<string, string>
     */
    private function strategicPageUrls(): array
    {
        $urls = [];

        foreach (config('strategic_pages.expertise', []) as $slug => $page) {
            $urls['/expertise/'.$slug] = $page['priority'];
        }

        foreach (config('strategic_pages.local', []) as $slug => $page) {
            $urls['/agence-digitale-'.$slug] = $page['priority'];
        }

        foreach (config('strategic_pages.secteur', []) as $slug => $page) {
            $urls['/secteurs/'.$slug] = $page['priority'];
        }

        return $urls;
    }

    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /locale/\n\n";
        $content .= 'Sitemap: '.route('sitemap')."\n";

        return response($content, 200, ['Content-Type' => 'text/plain']);
    }
}
