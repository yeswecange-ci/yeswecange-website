<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioItemController extends Controller
{
    public function index(): View
    {
        return view('admin.portfolio-items.index', [
            'portfolioItems' => PortfolioItem::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.portfolio-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = Storage::disk('public')->putFile('portfolio', $request->file('image'));

        PortfolioItem::create($data);

        return redirect()->route('admin.portfolio-items.index')->with('status', 'portfolio-item-created');
    }

    public function edit(PortfolioItem $portfolioItem): View
    {
        return view('admin.portfolio-items.edit', ['portfolioItem' => $portfolioItem]);
    }

    public function update(Request $request, PortfolioItem $portfolioItem): RedirectResponse
    {
        $data = $this->validated($request, $portfolioItem);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($portfolioItem->image);
            $data['image'] = Storage::disk('public')->putFile('portfolio', $request->file('image'));
        }

        $portfolioItem->update($data);

        return redirect()->route('admin.portfolio-items.index')->with('status', 'portfolio-item-updated');
    }

    public function destroy(PortfolioItem $portfolioItem): RedirectResponse
    {
        Storage::disk('public')->delete($portfolioItem->image);
        $portfolioItem->delete();

        return redirect()->route('admin.portfolio-items.index')->with('status', 'portfolio-item-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request, ?PortfolioItem $portfolioItem = null): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'title_fr' => ['required', 'string', 'max:100'],
            'title_en' => ['required', 'string', 'max:100'],
            'description_fr' => ['required', 'string', 'max:150'],
            'description_en' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'in:'.implode(',', PortfolioItem::CATEGORIES)],
            'size' => ['required', 'string', 'in:'.implode(',', PortfolioItem::SIZES)],
            'image' => [$portfolioItem ? 'nullable' : 'required', 'image', 'max:4096'],
        ]);

        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }
}
