<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.index', ['pages' => Page::orderBy('name')->get()]);
    }

    public function edit(Page $page): View
    {
        return view('admin.pages.form', compact('page'));
    }

    public function visual(Page $page): View
    {
        return view('admin.pages.visual', compact('page'));
    }

    public function updateVisual(Request $request, Page $page): JsonResponse
    {
        if ($request->input('action') === 'override-element') {
            $validated = $request->validate([
                'selector' => ['required', 'string', 'max:1000'],
                'text' => ['nullable', 'string'],
                'placeholder' => ['nullable', 'string', 'max:255'],
                'image' => ['nullable', 'image', 'max:5120'],
                'background_color' => ['nullable', 'regex:/^#[0-9a-fA-F]{6}$/'],
                'text_color' => ['nullable', 'regex:/^#[0-9a-fA-F]{6}$/'],
            ]);
            $content = $page->content ?? [];
            $overrides = collect($content['visual_overrides'] ?? []);
            $override = $overrides->firstWhere('selector', $validated['selector']) ?? ['selector' => $validated['selector']];

            if ($request->hasFile('image')) {
                if (! empty($override['image_path'])) {
                    Storage::disk('public')->delete($override['image_path']);
                }
                $override['image_path'] = $request->file('image')->store('pages/'.$page->slug.'/visual', 'public');
            }
            foreach (['text', 'placeholder', 'background_color', 'text_color'] as $property) {
                if ($request->has($property)) {
                    $override[$property] = $validated[$property] ?? '';
                }
            }

            $content['visual_overrides'] = $overrides
                ->reject(fn (array $item): bool => $item['selector'] === $validated['selector'])
                ->push($override)
                ->values()
                ->all();
            $page->update(['content' => $content]);

            return response()->json(['saved' => true]);
        }

        if ($request->input('action') === 'add-section') {
            $validated = $request->validate([
                'title' => ['nullable', 'string', 'max:255'],
                'body' => ['nullable', 'string'],
            ]);
            $content = $page->content ?? [];
            $sections = $content['custom_sections'] ?? [];
            $sections[] = [
                'id' => (string) str()->uuid(),
                'title' => $validated['title'] ?? '',
                'body' => $validated['body'] ?? '',
            ];
            $content['custom_sections'] = $sections;
            $page->update(['content' => $content]);

            return response()->json(['saved' => true]);
        }

        if ($request->input('action') === 'delete-section') {
            $validated = $request->validate(['section_id' => ['required', 'string', 'max:255']]);
            $content = $page->content ?? [];
            $content['custom_sections'] = collect($content['custom_sections'] ?? [])
                ->reject(fn (array $section): bool => ($section['id'] ?? '') === $validated['section_id'])
                ->values()
                ->all();
            $page->update(['content' => $content]);

            return response()->json(['saved' => true]);
        }

        if ($request->input('action') === 'update-section') {
            $validated = $request->validate([
                'section_id' => ['required', 'string', 'max:255'],
                'title' => ['nullable', 'string', 'max:255'],
                'body' => ['nullable', 'string'],
            ]);
            $content = $page->content ?? [];
            $content['custom_sections'] = collect($content['custom_sections'] ?? [])
                ->map(function (array $section) use ($validated): array {
                    if (($section['id'] ?? '') !== $validated['section_id']) {
                        return $section;
                    }

                    return [
                        ...$section,
                        'title' => $validated['title'] ?? '',
                        'body' => $validated['body'] ?? '',
                    ];
                })
                ->all();
            $page->update(['content' => $content]);

            return response()->json(['saved' => true]);
        }

        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255'],
            'value' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        $key = $validated['key'];
        $value = $validated['value'] ?? '';
        $settings = [
            'setting.site_name', 'setting.home_primary_button_text', 'setting.home_primary_button_url',
            'setting.home_hero_title', 'setting.home_hero_description', 'setting.about_title',
            'setting.about_description', 'setting.contact_address', 'setting.contact_phone',
            'setting.contact_email',
        ];

        if ($request->hasFile('image') && $key === 'page.'.$page->slug.'.image') {
            if ($page->image_path) {
                Storage::disk('public')->delete($page->image_path);
            }
            $page->update(['image_path' => $request->file('image')->store('pages/'.$page->slug, 'public')]);
        } elseif (in_array($key, $settings, true)) {
            SiteSetting::set(substr($key, 8), $value, 'content');
        } elseif (str_starts_with($key, 'page.')) {
            $content = $page->content ?? [];
            data_set($content, substr($key, strlen('page.'.$page->slug.'.')), $value);
            $page->update(['content' => $content]);
        } else {
            abort(422, 'This element is not editable.');
        }

        return response()->json(['saved' => true, 'value' => $value]);
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'intro' => ['nullable', 'string'],
            'body' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:2048'],
            'image' => ['nullable', 'image', 'max:5120'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $content = [
            ...($page->content ?? []),
            'title' => $validated['title'],
            'intro' => $validated['intro'] ?? '',
            'body' => $validated['body'] ?? '',
            'button_text' => $validated['button_text'] ?? '',
            'button_url' => $validated['button_url'] ?? '',
        ];

        $imagePath = $page->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('pages/'.$page->slug, 'public');
        }

        $page->update([
            'content' => $content,
            'image_path' => $imagePath,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.pages.edit', $page)->with('success', 'Page content updated successfully.');
    }
}
