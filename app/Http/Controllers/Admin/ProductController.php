<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::with('section')->get();
        return view('admin.products.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('admin.products.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'proname' => 'required|string|max:255',
                'proprice' => 'required|numeric|min:0',
                'section_id' => 'required|exists:sections,id',
                'prodescription' => 'nullable|string',
                'prosize' => 'nullable|string',
                'prounv' => 'nullable|string',
                'proimg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = [
                'proname' => $request->proname,
                'proprice' => $request->proprice,
                'section_id' => $request->section_id,
                'prodescription' => $request->prodescription,
                'prosize' => $request->prosize,
                'prounv' => $request->prounv,
            ];

            // Handle image upload
            if ($request->hasFile('proimg')) {
                $image = $request->file('proimg');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $imageName);
                $data['proimg'] = $imageName;
            }

            Product::create($data);

            return redirect()->route('products.index')->with('success', __('app.Product_created_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('app.Error') . ': ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $sections = Section::all();
        return view('admin.products.create', compact('product', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'proname' => 'required|string|max:255',
                'proprice' => 'required|numeric|min:0',
                'section_id' => 'required|exists:sections,id',
                'prodescription' => 'nullable|string',
                'prosize' => 'nullable|string',
                'prounv' => 'nullable|string',
                'proimg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = [
                'proname' => $request->proname,
                'proprice' => $request->proprice,
                'section_id' => $request->section_id,
                'prodescription' => $request->prodescription,
                'prosize' => $request->prosize,
                'prounv' => $request->prounv,
            ];

            // Handle image upload
            if ($request->hasFile('proimg')) {
                // Delete old image if exists
                if ($product->proimg && file_exists(public_path('uploads/products/' . $product->proimg))) {
                    unlink(public_path('uploads/products/' . $product->proimg));
                }

                $image = $request->file('proimg');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products'), $imageName);
                $data['proimg'] = $imageName;
            }

            $product->update($data);

            return redirect()->route('products.index')->with('success', __('app.Product_updated_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('app.Error') . ': ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // Delete image if exists
            if ($product->proimg && file_exists(public_path('uploads/products/' . $product->proimg))) {
                unlink(public_path('uploads/products/' . $product->proimg));
            }

            $product->delete();

            return redirect()->route('products.index')->with('success', __('app.Product_deleted_successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('app.Error') . ': ' . $e->getMessage());
        }
    }
}
