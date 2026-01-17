<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Slider;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        $sliders = Slider::active()->ordered()->get();

        $categories = ProductCategory::active()
            ->ordered()
            ->withCount(['products' => function ($query) {
                $query->active();
            }])
            ->take(6)
            ->get();

        $featuredProducts = Product::active()
            ->favorite()
            ->with(['category', 'images' => function ($query) {
                $query->main();
            }])
            ->ordered()
            ->take(8)
            ->get();

        $projects = Project::active()
            ->ordered()
            ->take(6)
            ->get();

        $certificates = Certificate::active()
            ->ordered()
            ->take(4)
            ->get();

        return view('user.pages.index', compact(
            'sliders',
            'categories',
            'featuredProducts',
            'projects',
            'certificates'
        ));
    }

    /**
     * Display the shop page.
     */
    public function shop()
    {
        $categories = ProductCategory::active()
            ->ordered()
            ->withCount(['products' => function ($query) {
                $query->active();
            }])
            ->get();

        $products = Product::active()
            ->with(['category', 'images' => function ($query) {
                $query->main();
            }])
            ->ordered()
            ->paginate(12);

        return view('user.pages.shop', compact('categories', 'products'));
    }

    /**
     * Display a product detail page.
     */
    public function productDetail(string $slug)
    {
        $product = Product::where('slug', $slug)
            ->active()
            ->with(['category', 'images' => function ($query) {
                $query->ordered();
            }, 'colors' => function ($query) {
                $query->active()->ordered();
            }])
            ->firstOrFail();

        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with(['images' => function ($query) {
                $query->main();
            }])
            ->take(4)
            ->get();

        return view('user.pages.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        $certificates = Certificate::active()
            ->ordered()
            ->get();

        return view('user.pages.about', compact('certificates'));
    }

    /**
     * Display the projects page.
     */
    public function projects()
    {
        $projects = Project::active()
            ->ordered()
            ->paginate(12);

        return view('user.pages.projects', compact('projects'));
    }

    /**
     * Display a single project.
     */
    public function projectDetail(string $slug)
    {
        $project = Project::where('slug', $slug)
            ->active()
            ->firstOrFail();

        $relatedProjects = Project::active()
            ->where('id', '!=', $project->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('user.pages.project-detail', compact('project', 'relatedProjects'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('user.pages.contact');
    }
}
