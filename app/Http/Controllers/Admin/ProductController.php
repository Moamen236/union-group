<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('category')->withCount('images', 'colors');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name_en', 'like', "%{$search}%")
                  ->orWhere('name_ar', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('is_favorite')) {
            $query->where('is_favorite', $request->is_favorite);
        }

        $products = $query->ordered()->paginate(10)->withQueryString();
        $categories = ProductCategory::active()->ordered()->get();

        return view('admin.pages.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource - Step 1: Basic Info.
     */
    public function create()
    {
        $categories = ProductCategory::active()->ordered()->get();
        return view('admin.pages.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = $data['slug'] ?? Str::slug($data['name_en']);
        $data['status'] = $request->boolean('status', true);
        $data['is_favorite'] = $request->boolean('is_favorite', false);
        $data['order'] = $data['order'] ?? Product::max('order') + 1;

        $product = Product::create($data);

        // Redirect to colors step
        return redirect()
            ->route('admin.products.colors', $product)
            ->with('success', 'Product created successfully. Now add colors.');
    }

    /**
     * Step 2: Manage product colors.
     */
    public function colors(Product $product)
    {
        $product->load('colors');
        return view('admin.pages.products.colors', compact('product'));
    }

    /**
     * Store a new color for the product.
     */
    public function storeColor(Request $request, Product $product)
    {
        $request->validate([
            'name_en' => 'required|string|max:100',
            'name_ar' => 'required|string|max:100',
            'hex_code' => 'required|string|regex:/^#[A-Fa-f0-9]{6}$/',
        ]);

        $product->colors()->create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'hex_code' => $request->hex_code,
            'order' => $product->colors()->max('order') + 1,
            'status' => true,
        ]);

        return back()->with('success', 'Color added successfully.');
    }

    /**
     * Delete a color from the product.
     */
    public function destroyColor(Product $product, ProductColor $color)
    {
        if ($color->product_id !== $product->id) {
            abort(403);
        }

        // Set color_id to null for related images
        $color->images()->update(['color_id' => null]);
        $color->delete();

        return back()->with('success', 'Color deleted successfully.');
    }

    /**
     * Step 3: Manage product images.
     */
    public function images(Product $product)
    {
        $product->load(['colors', 'images.color']);
        return view('admin.pages.products.images', compact('product'));
    }

    /**
     * Store a new image for the product.
     */
    public function storeImage(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'color_id' => 'nullable|exists:product_colors,id',
            'alt_en' => 'nullable|string|max:255',
            'alt_ar' => 'nullable|string|max:255',
            'is_main' => 'boolean',
        ]);

        $imagePath = $request->file('image')->store('product-images', 'public');

        $isMain = $request->boolean('is_main', false);

        // If this is set as main, remove main from other images
        if ($isMain) {
            $product->images()->update(['is_main' => false]);
        }

        // If this is the first image, make it main automatically
        if ($product->images()->count() === 0) {
            $isMain = true;
        }

        $product->images()->create([
            'image' => $imagePath,
            'color_id' => $request->color_id,
            'alt_en' => $request->alt_en,
            'alt_ar' => $request->alt_ar,
            'is_main' => $isMain,
            'order' => $product->images()->max('order') + 1,
        ]);

        return back()->with('success', 'Image uploaded successfully.');
    }

    /**
     * Delete an image from the product.
     */
    public function destroyImage(Product $product, ProductImage $image)
    {
        if ($image->product_id !== $product->id) {
            abort(403);
        }

        Storage::disk('public')->delete($image->image);
        $image->delete();

        // If deleted image was main, set first remaining image as main
        if ($image->is_main && $product->images()->count() > 0) {
            $product->images()->first()->update(['is_main' => true]);
        }

        return back()->with('success', 'Image deleted successfully.');
    }

    /**
     * Set an image as the main image.
     */
    public function setMainImage(Product $product, ProductImage $image)
    {
        if ($image->product_id !== $product->id) {
            return response()->json(['success' => false, 'message' => 'Invalid image'], 403);
        }

        $product->images()->update(['is_main' => false]);
        $image->update(['is_main' => true]);

        return response()->json(['success' => true, 'message' => 'Main image set successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['category', 'colors', 'images']);
        return view('admin.pages.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::active()->ordered()->get();
        return view('admin.pages.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if (!empty($data['slug'])) {
            $data['slug'] = Str::slug($data['slug']);
        }

        $data['status'] = $request->boolean('status', false);
        $data['is_favorite'] = $request->boolean('is_favorite', false);

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete all product images from storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Toggle product status.
     */
    public function toggleStatus(Product $product)
    {
        $product->update(['status' => !$product->status]);

        return response()->json([
            'success' => true,
            'status' => $product->status,
            'message' => 'Status updated successfully.',
        ]);
    }

    /**
     * Toggle product favorite status.
     */
    public function toggleFavorite(Product $product)
    {
        $product->update(['is_favorite' => !$product->is_favorite]);

        return response()->json([
            'success' => true,
            'is_favorite' => $product->is_favorite,
            'message' => 'Favorite status updated successfully.',
        ]);
    }
}
