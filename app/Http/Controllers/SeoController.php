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
            ['name' => 'home', 'priority' => '1.0', 'freq' => 'weekly'],
            ['name' => 'services', 'priority' => '0.9', 'freq' => 'monthly'],
            ['name' => 'realisations', 'priority' => '0.9', 'freq' => 'monthly'],
            ['name' => 'about', 'priority' => '0.7', 'freq' => 'monthly'],
            ['name' => 'faq', 'priority' => '0.6', 'freq' => 'monthly'],
            ['name' => 'contact', 'priority' => '0.7', 'freq' => 'yearly'],
            ['name' => 'quote', 'priority' => '0.8', 'freq' => 'yearly'],
            ['name' => 'legal.mentions', 'priority' => '0.2', 'freq' => 'yearly'],
            ['name' => 'legal.privacy', 'priority' => '0.2', 'freq' => 'yearly'],
            ['name' => 'legal.terms', 'priority' => '0.2', 'freq' => 'yearly'],
            ['name' => 'legal.cookies', 'priority' => '0.2', 'freq' => 'yearly'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($routes as $route) {
            $xml .= "  <url>\n";
            $xml .= '    <loc>' . e(route($route['name'])) . "</loc>\n";
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
