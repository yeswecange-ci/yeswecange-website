<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        return view('admin.testimonials.index', [
            'testimonials' => Testimonial::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Testimonial::create($this->validated($request));

        return redirect()->route('admin.testimonials.index')->with('status', 'testimonial-created');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($this->validated($request));

        return redirect()->route('admin.testimonials.index')->with('status', 'testimonial-updated');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('status', 'testimonial-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'quote_fr' => ['required', 'string', 'max:600'],
            'quote_en' => ['required', 'string', 'max:600'],
            'author_name' => ['required', 'string', 'max:100'],
            'role_fr' => ['required', 'string', 'max:120'],
            'role_en' => ['required', 'string', 'max:120'],
            'initials' => ['required', 'string', 'max:4'],
        ]);

        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }
}
