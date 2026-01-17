<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Project;
use App\Models\Slider;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'sliders' => Slider::count(),
            'categories' => ProductCategory::count(),
            'products' => Product::count(),
            'projects' => Project::count(),
            'certificates' => Certificate::count(),
        ];

        $recentProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        $recentProjects = Project::latest()
            ->take(5)
            ->get();

        return view('admin.pages.dashboard.index', compact('stats', 'recentProducts', 'recentProjects'));
    }
}
