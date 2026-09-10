<?php

namespace Tests\Feature;

use Database\Seeders\HomeContentSeeder;
use Database\Seeders\PagesContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Le contenu des pages publiques vit en base (site_texts + entités éditables
     * depuis le back-office) : sans seeding, les vues n'ont rien à rendre.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([HomeContentSeeder::class, PagesContentSeeder::class]);
    }

    /**
     * Toutes les pages publiques doivent répondre 200. Ce test attrape notamment
     * les vues Blade qui ne compilent pas (ex. une clé JSON-LD "@context" prise
     * pour une directive Blade), qui se traduisent par une 500 en production.
     */
    #[DataProvider('publicPages')]
    public function test_public_pages_return_a_successful_response(string $url): void
    {
        $this->get($url)->assertStatus(200);
    }

    /**
     * @return array<string, array{string}>
     */
    public static function publicPages(): array
    {
        return [
            'accueil' => ['/'],
            'services' => ['/services'],
            'certifications' => ['/certifications'],
            'à propos' => ['/a-propos'],
            'réalisations' => ['/realisations'],
            'faq' => ['/faq'],
            'contact' => ['/contact'],
            'devis' => ['/devis'],
        ];
    }
}
