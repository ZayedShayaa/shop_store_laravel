<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Section::all();
        return view('admin.sections.index', ['data' => $data])->with('success', 'Section created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            Section::create([
                'name' => $request->name,
            ]);

            return redirect()->route('sections.index')->with('success', __('app.Section_created_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'حدث خطأ أثناء الحفظ: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(Section $section)
    // {
    //     return view('admin.sections.show', compact('section'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return view('admin.sections.create', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $section->update([
            'name' => $request->name,
        ]);

        return redirect()->route('sections.index')->with('success', __('app.Section_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $data = Product::where('section_id', $section->id)->first();
        if ($data) {
            return redirect()->back()->with('error', 'لا يمكن حذف هذا القسم لأنه يحتوي على منتجات.');
        }
        $section->delete();

        return redirect()->route('sections.index')->with('success', __('app.Section_deleted_successfully'));
    }
}
