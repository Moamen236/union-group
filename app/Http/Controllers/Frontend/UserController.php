<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\ContactMessage;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Home page
     */
    public function index()
    {
        // Get active sliders
        $sliders = Slider::active()
            ->ordered()
            ->get();

        // Get featured/favorite products
        $featuredProducts = Product::with(['category', 'images'])
            ->active()
            ->favorite()
            ->ordered()
            ->take(8)
            ->get();

        // Get latest products for the slider
        $latestProducts = Product::with(['category', 'images'])
            ->active()
            ->ordered()
            ->take(4)
            ->get();

        // Get active categories
        $categories = ProductCategory::active()
            ->ordered()
            ->get();

        // Get featured projects
        // $projects = Project::active()
        //     ->ordered()
        //     ->take(4)
        //     ->get();

        // Get certificates for credibility section
        $certificates = Certificate::active()
            ->ordered()
            ->take(6)
            ->get();

        return view('user.pages.index', [
            'title' => __('Home'),
            'sliders' => $sliders,
            'featuredProducts' => $featuredProducts,
            'latestProducts' => $latestProducts,
            'categories' => $categories,
            // 'projects' => $projects,
            'certificates' => $certificates,
        ]);
    }

    /**
     * Shop page with product listing
     */
    public function shop(Request $request)
    {
        $query = Product::with(['category', 'images'])->active();

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('search')) {
            $query->where('name_en', 'like', '%' . $request->search . '%')
                ->orWhere('name_ar', 'like', '%' . $request->search . '%')
                ->orWhere('code', 'like', '%' . $request->search . '%');
        }

        // Sort products
        $sort = $request->get('sort', 'order');
        switch ($sort) {
            case 'name_asc':
                $query->orderBy('name_en', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name_en', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->ordered();
        }

        $products = $query->paginate(12);

        // Get all active categories for filter
        $categories = ProductCategory::active()
            ->ordered()
            ->withCount(['products' => function ($q) {
                $q->active();
            }])
            ->get();

        $currentCategory = $request->category
            ? ProductCategory::where('slug', $request->category)->first()
            : null;

        return view('user.pages.shop', [
            'title' => $currentCategory ? $currentCategory->name : __('Shop'),
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
            'currentSort' => $sort,
        ]);
    }

    /**
     * Product detail page
     */
    public function productDetail($slug = null)
    {
        if (!$slug) {
            return redirect()->route('user.shop');
        }

        $product = Product::with(['category', 'images', 'colors'])
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        // Get related products from same category
        $relatedProducts = Product::with(['category', 'images'])
            ->active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->ordered()
            ->take(4)
            ->get();

        return view('user.pages.product-detail', [
            'title' => $product->name,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    /**
     * About page
     */
    public function about()
    {
        // Get featured projects
        $projects = Project::active()
            ->ordered()
            ->take(4)
            ->get();

        // Get featured certificates
        $certificates = Certificate::active()
            ->ordered()
            ->take(6)
            ->get();

        return view('user.pages.about', [
            'title' => __('About Us'),
            'projects' => $projects,
            'certificates' => $certificates,
        ]);
    }

    /**
     * Projects page
     */
    public function projects()
    {
        $projects = Project::active()
            ->ordered()
            ->paginate(12);

        return view('user.pages.projects', [
            'title' => __('Our Projects'),
            'projects' => $projects,
        ]);
    }

    /**
     * Certificates page
     */
    public function certificates()
    {
        $certificates = Certificate::active()
            ->ordered()
            ->paginate(12);

        return view('user.pages.certificates', [
            'title' => __('Our Certificates'),
            'certificates' => $certificates,
        ]);
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('user.pages.contact', [
            'title' => __('Contact Us'),
        ]);
    }

    /**
     * Handle contact form submission
     */
    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Store the contact message in the database
        ContactMessage::create($validated);

        return redirect()->route('user.contact')
            ->with('success', __('Thank you for your message. We will get back to you soon!'));
    }
}
