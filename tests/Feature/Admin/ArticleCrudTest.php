<?php

namespace Tests\Feature\Admin;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_edit_and_delete_an_article(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)->post('/admin/articles', [
            'title_fr' => 'Mon Premier Article !',
            'title_en' => 'My First Article!',
            'excerpt_fr' => 'Extrait fr',
            'excerpt_en' => 'Excerpt en',
            'content_fr' => '<h2>Ok</h2><p>Bonjour</p><script>alert(1)</script>',
            'content_en' => '<h2>Ok</h2><p>Hello</p>',
            'is_published' => '1',
        ])->assertRedirect();

        $article = Article::first();
        $this->assertNotNull($article);
        $this->assertSame('mon-premier-article', $article->slug);
        $this->assertStringNotContainsString('<script>', $article->content_fr);
        $this->assertTrue($article->is_published);

        // Slug uniqueness on a second article with the same title.
        $this->actingAs($admin)->post('/admin/articles', [
            'title_fr' => 'Mon Premier Article !',
            'title_en' => 'Another',
            'excerpt_fr' => 'x',
            'excerpt_en' => 'x',
            'content_fr' => '<p>x</p>',
            'content_en' => '<p>x</p>',
        ])->assertRedirect();

        $second = Article::where('id', '!=', $article->id)->first();
        $this->assertSame('mon-premier-article-2', $second->slug);
        $this->assertFalse($second->is_published);

        // Public page reachable when published.
        $this->get('/blog/'.$article->slug)->assertOk()->assertSee('Hello');

        // Public page 404s while unpublished.
        $this->get('/blog/'.$second->slug)->assertNotFound();

        // Update.
        $this->actingAs($admin)->put('/admin/articles/'.$article->id, [
            'title_fr' => 'Titre modifié',
            'title_en' => $article->title_en,
            'excerpt_fr' => $article->excerpt_fr,
            'excerpt_en' => $article->excerpt_en,
            'content_fr' => $article->content_fr,
            'content_en' => $article->content_en,
            'is_published' => '1',
        ])->assertRedirect();

        $article->refresh();
        $this->assertSame('Titre modifié', $article->title_fr);
        $this->assertSame('mon-premier-article', $article->slug, 'Slug should stay stable when not explicitly changed.');

        // Delete.
        $this->actingAs($admin)->delete('/admin/articles/'.$second->id)->assertRedirect('/admin/articles');
        $this->assertDatabaseMissing('articles', ['id' => $second->id]);
    }
}
