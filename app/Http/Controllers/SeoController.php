<?php

namespace App\Http\Controllers;

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
            ['name' => 'about', 'priority' => '0.7', 'freq' => 'monthly', 'view' => 'pages/about.blade.php'],
            ['name' => 'faq', 'priority' => '0.6', 'freq' => 'monthly', 'view' => 'pages/faq.blade.php'],
            ['name' => 'contact', 'priority' => '0.7', 'freq' => 'yearly', 'view' => 'pages/contact.blade.php'],
            ['name' => 'quote', 'priority' => '0.8', 'freq' => 'yearly', 'view' => 'pages/quote.blade.php'],
            ['name' => 'legal.mentions', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/mentions.blade.php'],
            ['name' => 'legal.privacy', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/privacy.blade.php'],
            ['name' => 'legal.terms', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/terms.blade.php'],
            ['name' => 'legal.cookies', 'priority' => '0.2', 'freq' => 'yearly', 'view' => 'pages/legal/cookies.blade.php'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($routes as $route) {
            $viewPath = resource_path('views/' . $route['view']);
            $lastmod = is_file($viewPath) ? date('Y-m-d', filemtime($viewPath)) : null;

            $xml .= "  <url>\n";
            $xml .= '    <loc>' . e(route($route['name'])) . "</loc>\n";
            if ($lastmod) {
                $xml .= '    <lastmod>' . $lastmod . "</lastmod>\n";
            }
            $xml .= '    <changefreq>' . $route['freq'] . "</changefreq>\n";
            $xml .= '    <priority>' . $route['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /locale/\n\n";
        $content .= 'Sitemap: ' . route('sitemap') . "\n";

        return response($content, 200, ['Content-Type' => 'text/plain']);
    }
}
