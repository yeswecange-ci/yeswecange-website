<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqItemController extends Controller
{
    public function index(): View
    {
        return view('admin.faq-items.index', [
            'faqItems' => FaqItem::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.faq-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        FaqItem::create($this->validated($request));

        return redirect()->route('admin.faq-items.index')->with('status', 'faq-item-created');
    }

    public function edit(FaqItem $faqItem): View
    {
        return view('admin.faq-items.edit', ['faqItem' => $faqItem]);
    }

    public function update(Request $request, FaqItem $faqItem): RedirectResponse
    {
        $faqItem->update($this->validated($request));

        return redirect()->route('admin.faq-items.index')->with('status', 'faq-item-updated');
    }

    public function destroy(FaqItem $faqItem): RedirectResponse
    {
        $faqItem->delete();

        return redirect()->route('admin.faq-items.index')->with('status', 'faq-item-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'question_fr' => ['required', 'string', 'max:200'],
            'question_en' => ['required', 'string', 'max:200'],
            'answer_fr' => ['required', 'string', 'max:1000'],
            'answer_en' => ['required', 'string', 'max:1000'],
        ]);

        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }
}
