<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductColorRequest;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProductColor::with('product');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%")
                  ->orWhere('hex_code', 'like', "%{$search}%");
            });
        }

        if ($request->filled('product')) {
            $query->where('product_id', $request->product);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $colors = $query->ordered()->paginate(10)->withQueryString();
        $products = Product::active()->ordered()->get();

        return view('admin.pages.product-colors.index', compact('colors', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $products = Product::active()->ordered()->get();
        $selectedProduct = $request->product_id;
        return view('admin.pages.product-colors.create', compact('products', 'selectedProduct'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductColorRequest $request)
    {
        $data = $request->validated();

        $data['status'] = $request->boolean('status', true);
        $data['order'] = $data['order'] ?? ProductColor::where('product_id', $data['product_id'])->max('order') + 1;

        ProductColor::create($data);

        return redirect()
            ->route('admin.product-colors.index')
            ->with('success', 'Color created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductColor $productColor)
    {
        $productColor->load(['product', 'images']);
        return view('admin.pages.product-colors.show', compact('productColor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductColor $productColor)
    {
        $products = Product::active()->ordered()->get();
        return view('admin.pages.product-colors.edit', compact('productColor', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductColorRequest $request, ProductColor $productColor)
    {
        $data = $request->validated();
        $data['status'] = $request->boolean('status', false);

        $productColor->update($data);

        return redirect()
            ->route('admin.product-colors.index')
            ->with('success', 'Color updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductColor $productColor)
    {
        // Set color_id to null for related images instead of deleting them
        $productColor->images()->update(['color_id' => null]);

        $productColor->delete();

        return redirect()
            ->route('admin.product-colors.index')
            ->with('success', 'Color deleted successfully.');
    }

    /**
     * Toggle color status.
     */
    public function toggleStatus(ProductColor $productColor)
    {
        $productColor->update(['status' => !$productColor->status]);

        return response()->json([
            'success' => true,
            'status' => $productColor->status,
            'message' => 'Status updated successfully.',
        ]);
    }
}
