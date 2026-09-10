<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Support\HtmlSanitizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('admin.articles.index', [
            'articles' => Article::orderByDesc('published_at')->orderByDesc('created_at')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.articles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug(($data['slug'] ?? '') ?: $data['title_fr']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = Storage::disk('public')->putFile('articles', $request->file('cover_image'));
        }

        $article = Article::create($data);

        return redirect()->route('admin.articles.edit', $article)->with('status', 'article-created');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validated($request, $article);

        $slug = ($data['slug'] ?? '') ?: $article->slug;
        if ($slug !== $article->slug) {
            $slug = $this->uniqueSlug($slug, $article->id);
        }
        $data['slug'] = $slug;

        if ($request->hasFile('cover_image')) {
            if ($article->cover_image) {
                Storage::disk('public')->delete($article->cover_image);
            }
            $data['cover_image'] = Storage::disk('public')->putFile('articles', $request->file('cover_image'));
        }

        $article->update($data);

        return redirect()->route('admin.articles.edit', $article)->with('status', 'article-updated');
    }

    public function destroy(Article $article): RedirectResponse
    {
        if ($article->cover_image) {
            Storage::disk('public')->delete($article->cover_image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')->with('status', 'article-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?Article $article = null): array
    {
        $data = $request->validate([
            'slug' => ['nullable', 'string', 'max:160', 'alpha_dash'],
            'title_fr' => ['required', 'string', 'max:160'],
            'title_en' => ['required', 'string', 'max:160'],
            'excerpt_fr' => ['required', 'string', 'max:220'],
            'excerpt_en' => ['required', 'string', 'max:220'],
            'content_fr' => ['required', 'string'],
            'content_en' => ['required', 'string'],
            'is_published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['is_published'] = $request->boolean('is_published');
        $data['content_fr'] = HtmlSanitizer::clean($data['content_fr']);
        $data['content_en'] = HtmlSanitizer::clean($data['content_en']);

        unset($data['cover_image']);

        return $data;
    }

    private function uniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $base = Str::slug($source);
        $slug = $base;
        $i = 2;

        while (Article::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
