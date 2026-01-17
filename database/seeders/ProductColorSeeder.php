<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Seeder;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample paint colors
        $paintColors = [
            ['name_en' => 'Pure White', 'name_ar' => 'أبيض نقي', 'hex_code' => '#FFFFFF'],
            ['name_en' => 'Classic Cream', 'name_ar' => 'كريمي كلاسيكي', 'hex_code' => '#FFFDD0'],
            ['name_en' => 'Soft Gray', 'name_ar' => 'رمادي ناعم', 'hex_code' => '#B0B0B0'],
            ['name_en' => 'Warm Beige', 'name_ar' => 'بيج دافئ', 'hex_code' => '#D4C4A8'],
            ['name_en' => 'Sky Blue', 'name_ar' => 'أزرق سماوي', 'hex_code' => '#87CEEB'],
            ['name_en' => 'Sage Green', 'name_ar' => 'أخضر حكيم', 'hex_code' => '#9CAF88'],
            ['name_en' => 'Terracotta', 'name_ar' => 'تيراكوتا', 'hex_code' => '#E2725B'],
            ['name_en' => 'Navy Blue', 'name_ar' => 'أزرق داكن', 'hex_code' => '#000080'],
            ['name_en' => 'Charcoal', 'name_ar' => 'فحمي', 'hex_code' => '#36454F'],
            ['name_en' => 'Dusty Rose', 'name_ar' => 'وردي باهت', 'hex_code' => '#DCAE96'],
        ];

        // Wood stain colors
        $woodColors = [
            ['name_en' => 'Natural Oak', 'name_ar' => 'بلوط طبيعي', 'hex_code' => '#C4A570'],
            ['name_en' => 'Walnut', 'name_ar' => 'جوز', 'hex_code' => '#5C4033'],
            ['name_en' => 'Mahogany', 'name_ar' => 'ماهوجني', 'hex_code' => '#C04000'],
            ['name_en' => 'Ebony', 'name_ar' => 'أبنوس', 'hex_code' => '#3C3024'],
            ['name_en' => 'Golden Pine', 'name_ar' => 'صنوبر ذهبي', 'hex_code' => '#DAA520'],
            ['name_en' => 'Cherry', 'name_ar' => 'كرز', 'hex_code' => '#7B3F00'],
        ];

        // Industrial coating colors
        $industrialColors = [
            ['name_en' => 'Safety Yellow', 'name_ar' => 'أصفر أمان', 'hex_code' => '#FFD700'],
            ['name_en' => 'Industrial Gray', 'name_ar' => 'رمادي صناعي', 'hex_code' => '#708090'],
            ['name_en' => 'Safety Orange', 'name_ar' => 'برتقالي أمان', 'hex_code' => '#FF6600'],
            ['name_en' => 'Green', 'name_ar' => 'أخضر', 'hex_code' => '#228B22'],
            ['name_en' => 'Red', 'name_ar' => 'أحمر', 'hex_code' => '#DC143C'],
            ['name_en' => 'Blue', 'name_ar' => 'أزرق', 'hex_code' => '#0066CC'],
        ];

        // Get products by category and add colors
        $paintProducts = Product::whereHas('category', function ($q) {
            $q->whereIn('slug', ['paints-coatings', 'decorative-finishes']);
        })->get();

        $woodProducts = Product::whereHas('category', function ($q) {
            $q->where('slug', 'wood-finishes');
        })->get();

        $industrialProducts = Product::whereHas('category', function ($q) {
            $q->whereIn('slug', ['industrial-coatings', 'waterproofing', 'primers-sealers']);
        })->get();

        // Add colors to paint products
        foreach ($paintProducts as $product) {
            foreach ($paintColors as $order => $color) {
                ProductColor::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'hex_code' => $color['hex_code'],
                    ],
                    array_merge($color, [
                        'order' => $order + 1,
                        'status' => true,
                    ])
                );
            }
        }

        // Add colors to wood products
        foreach ($woodProducts as $product) {
            foreach ($woodColors as $order => $color) {
                ProductColor::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'hex_code' => $color['hex_code'],
                    ],
                    array_merge($color, [
                        'order' => $order + 1,
                        'status' => true,
                    ])
                );
            }
        }

        // Add colors to industrial products
        foreach ($industrialProducts as $product) {
            foreach ($industrialColors as $order => $color) {
                ProductColor::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'hex_code' => $color['hex_code'],
                    ],
                    array_merge($color, [
                        'order' => $order + 1,
                        'status' => true,
                    ])
                );
            }
        }
    }
}
