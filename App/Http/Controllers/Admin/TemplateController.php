<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::latest()->paginate(10);
        return view('admin.templates.index', compact('templates'));
    }

    public function create()
    {
        return view('admin.templates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'preview_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'default_font' => 'required|string',
            'default_color' => 'required|string',
            'background_color' => 'required|string',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('preview_image')) {
            $imagePath = $request->file('preview_image')->store('templates', 'public');
            $validated['preview_image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');

        Template::create($validated);

        return redirect()->route('admin.templates.index')->with('success', 'New template added successfully!');
    }

    public function edit(Template $template)
    {
        return view('admin.templates.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'default_font' => 'required|string',
            'default_color' => 'required|string',
            'background_color' => 'required|string',
        ]);

        if ($request->hasFile('preview_image')) {
            if ($template->preview_image) {
                Storage::disk('public')->delete($template->preview_image);
            }
            $imagePath = $request->file('preview_image')->store('templates', 'public');
            $validated['preview_image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');

        $template->update($validated);

        return redirect()->route('admin.templates.index')->with('success', 'Template updated successfully!');
    }

    public function destroy(Template $template)
    {
        if ($template->preview_image) {
            Storage::disk('public')->delete($template->preview_image);
        }

        $template->delete();

        return redirect()->route('admin.templates.index')->with('success', 'Template deleted successfully!');
    }
}