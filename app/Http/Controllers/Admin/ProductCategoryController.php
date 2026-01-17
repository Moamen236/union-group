<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProductCategory::withCount('products');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $categories = $query->ordered()->paginate(10)->withQueryString();

        return view('admin.pages.product-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product-categories', 'public');
        }

        $data['slug'] = $data['slug'] ?? Str::slug($data['name_en']);
        $data['status'] = $request->boolean('status', true);
        $data['order'] = $data['order'] ?? ProductCategory::max('order') + 1;

        ProductCategory::create($data);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        $productCategory->load('products');
        return view('admin.pages.product-categories.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.pages.product-categories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($productCategory->image) {
                Storage::disk('public')->delete($productCategory->image);
            }
            $data['image'] = $request->file('image')->store('product-categories', 'public');
        }

        if (!empty($data['slug'])) {
            $data['slug'] = Str::slug($data['slug']);
        }

        $data['status'] = $request->boolean('status', false);

        $productCategory->update($data);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        if ($productCategory->products()->count() > 0) {
            return redirect()
                ->route('admin.product-categories.index')
                ->with('error', 'Cannot delete category with existing products.');
        }

        if ($productCategory->image) {
            Storage::disk('public')->delete($productCategory->image);
        }

        $productCategory->delete();

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    /**
     * Toggle category status.
     */
    public function toggleStatus(ProductCategory $productCategory)
    {
        $productCategory->update(['status' => !$productCategory->status]);

        return response()->json([
            'success' => true,
            'status' => $productCategory->status,
            'message' => 'Status updated successfully.',
        ]);
    }
}
