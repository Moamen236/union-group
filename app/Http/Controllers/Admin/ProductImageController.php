<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductImageRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProductImage::with(['product', 'color']);

        if ($request->filled('product')) {
            $query->where('product_id', $request->product);
        }

        if ($request->filled('is_main')) {
            $query->where('is_main', $request->is_main);
        }

        $images = $query->ordered()->paginate(12)->withQueryString();
        $products = Product::active()->ordered()->get();

        return view('admin.pages.product-images.index', compact('images', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $products = Product::with('colors')->active()->ordered()->get();
        $selectedProduct = $request->product_id;

        $colors = [];
        if ($selectedProduct) {
            $colors = ProductColor::where('product_id', $selectedProduct)->active()->get();
        }

        return view('admin.pages.product-images.create', compact('products', 'selectedProduct', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImageRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product-images', 'public');
        }

        $data['is_main'] = $request->boolean('is_main', false);
        $data['is_hover'] = $request->boolean('is_hover', false);
        $data['order'] = $data['order'] ?? ProductImage::where('product_id', $data['product_id'])->max('order') + 1;

        // If this is set as main, remove main from other images of the same product
        if ($data['is_main']) {
            ProductImage::where('product_id', $data['product_id'])
                ->update(['is_main' => false]);
        }
        // If this is set as hover, remove hover from other images of the same product
        if ($data['is_hover']) {
            ProductImage::where('product_id', $data['product_id'])
                ->update(['is_hover' => false]);
        }

        ProductImage::create($data);

        return redirect()
            ->route('admin.product-images.index', ['product' => $data['product_id']])
            ->with('success', 'Image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        $productImage->load(['product', 'color']);
        return view('admin.pages.product-images.show', compact('productImage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productImage)
    {
        $products = Product::with('colors')->active()->ordered()->get();
        $colors = ProductColor::where('product_id', $productImage->product_id)->active()->get();

        return view('admin.pages.product-images.edit', compact('productImage', 'products', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductImageRequest $request, ProductImage $productImage)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($productImage->image);
            $data['image'] = $request->file('image')->store('product-images', 'public');
        }

        $data['is_main'] = $request->boolean('is_main', false);
        $data['is_hover'] = $request->boolean('is_hover', false);

        // If this is set as main, remove main from other images of the same product
        if ($data['is_main']) {
            ProductImage::where('product_id', $data['product_id'])
                ->where('id', '!=', $productImage->id)
                ->update(['is_main' => false]);
        }
        // If this is set as hover, remove hover from other images of the same product
        if ($data['is_hover']) {
            ProductImage::where('product_id', $data['product_id'])
                ->where('id', '!=', $productImage->id)
                ->update(['is_hover' => false]);
        }

        $productImage->update($data);

        return redirect()
            ->route('admin.product-images.index', ['product' => $data['product_id']])
            ->with('success', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        $productId = $productImage->product_id;

        Storage::disk('public')->delete($productImage->image);
        $productImage->delete();

        return redirect()
            ->route('admin.product-images.index', ['product' => $productId])
            ->with('success', 'Image deleted successfully.');
    }

    /**
     * Set image as main.
     */
    public function setMain(ProductImage $productImage)
    {
        // Remove main from other images
        ProductImage::where('product_id', $productImage->product_id)
            ->update(['is_main' => false]);

        $productImage->update(['is_main' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Main image set successfully.',
        ]);
    }

    /**
     * Set image as hover (image shown on product hover on the frontend).
     */
    public function setHover(ProductImage $productImage)
    {
        // Remove hover from other images of the same product
        ProductImage::where('product_id', $productImage->product_id)
            ->update(['is_hover' => false]);

        $productImage->update(['is_hover' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Hover image set successfully.',
        ]);
    }

    /**
     * Update images order.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:product_images,id',
            'items.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            ProductImage::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully.',
        ]);
    }

    /**
     * Get colors for a product (AJAX).
     */
    public function getColors(Product $product)
    {
        $colors = $product->colors()->active()->ordered()->get();

        return response()->json([
            'success' => true,
            'colors' => $colors,
        ]);
    }
}
