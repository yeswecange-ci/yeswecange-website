<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('admin.services.index', [
            'services' => Service::orderBy('order_column')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->putFile('services', $request->file('image'));
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('status', 'service-created');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', ['service' => $service]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = Storage::disk('public')->putFile('services', $request->file('image'));
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('status', 'service-updated');
    }

    public function destroy(Service $service): RedirectResponse
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('status', 'service-deleted');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'order_column' => ['nullable', 'integer'],
            'icon' => ['nullable', 'string', 'max:10'],
            'image' => ['nullable', 'image', 'max:2048'],
            'title_fr' => ['required', 'string', 'max:160'],
            'title_en' => ['required', 'string', 'max:160'],
            'description_fr' => ['required', 'string', 'max:2000'],
            'description_en' => ['required', 'string', 'max:2000'],
            'tags_fr' => ['nullable', 'string', 'max:255'],
            'tags_en' => ['nullable', 'string', 'max:255'],
            'feature' => ['nullable', 'boolean'],
        ]);

        $data['tags_fr'] = $this->splitTags($data['tags_fr'] ?? null);
        $data['tags_en'] = $this->splitTags($data['tags_en'] ?? null);
        $data['feature'] = $request->boolean('feature');
        $data['order_column'] = $data['order_column'] ?? 0;

        return $data;
    }

    /**
     * @return array<int, string>
     */
    private function splitTags(?string $tags): array
    {
        return collect(explode(',', (string) $tags))
            ->map(fn ($tag) => trim($tag))
            ->filter()
            ->values()
            ->all();
    }
}
