<?php

namespace App\Support;

class ValueIcons
{
    /**
     * Icônes disponibles pour les "valeurs" de la page À propos.
     * Repris tel quel des SVG précédemment codés en dur dans pages/about.blade.php.
     *
     * @return array<string, array{label: string, svg: string}>
     */
    public static function all(): array
    {
        $attrs = 'width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"';

        return [
            'target' => [
                'label' => 'Cible',
                'svg' => "<svg $attrs><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><circle cx=\"12\" cy=\"12\" r=\"6\"></circle><circle cx=\"12\" cy=\"12\" r=\"2\"></circle></svg>",
            ],
            'chart' => [
                'label' => 'Graphique',
                'svg' => "<svg $attrs><line x1=\"18\" y1=\"20\" x2=\"18\" y2=\"10\"></line><line x1=\"12\" y1=\"20\" x2=\"12\" y2=\"4\"></line><line x1=\"6\" y1=\"20\" x2=\"6\" y2=\"14\"></line></svg>",
            ],
            'users' => [
                'label' => 'Équipe',
                'svg' => "<svg $attrs><path d=\"M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2\"></path><circle cx=\"9\" cy=\"7\" r=\"4\"></circle><path d=\"M23 21v-2a4 4 0 0 0-3-3.87\"></path><path d=\"M16 3.13a4 4 0 0 1 0 7.75\"></path></svg>",
            ],
            'zap' => [
                'label' => 'Éclair',
                'svg' => "<svg $attrs><polygon points=\"13 2 3 14 12 14 11 22 21 10 12 10 13 2\"></polygon></svg>",
            ],
            'globe' => [
                'label' => 'Globe',
                'svg' => "<svg $attrs><circle cx=\"12\" cy=\"12\" r=\"10\"></circle><line x1=\"2\" y1=\"12\" x2=\"22\" y2=\"12\"></line><path d=\"M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z\"></path></svg>",
            ],
            'rocket' => [
                'label' => 'Fusée',
                'svg' => "<svg $attrs><path d=\"M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z\"></path><path d=\"M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z\"></path><path d=\"M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0\"></path><path d=\"M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5\"></path></svg>",
            ],
        ];
    }

    public static function svg(string $key): string
    {
        return self::all()[$key]['svg'] ?? '';
    }

    /**
     * @return array<string, string> key => label, pour un <select>.
     */
    public static function options(): array
    {
        return collect(self::all())->map(fn ($icon) => $icon['label'])->all();
    }
}
