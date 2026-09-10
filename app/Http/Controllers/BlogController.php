<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Support\ArticleContentParser;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('pages.blog.index', [
            'articles' => Article::published()->orderByDesc('published_at')->paginate(9),
        ]);
    }

    public function show(Article $article): View
    {
        abort_unless($article->is_published && (! $article->published_at || $article->published_at->isPast()), 404);

        $related = Article::published()
            ->where('id', '!=', $article->id)
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        $parsed = ArticleContentParser::parse($article->localized('content'));

        return view('pages.blog.show', [
            'article' => $article,
            'related' => $related,
            'articleIntro' => $parsed['intro'],
            'articleHtml' => $parsed['html'],
            'toc' => $parsed['toc'],
            'takeaways' => $parsed['takeaways'],
        ]);
    }
}
