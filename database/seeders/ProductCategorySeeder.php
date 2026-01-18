<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Available local images in storage/app/public/images/categories/
        $categories = [
            [
                'name_en' => 'Paints & Coatings',
                'name_ar' => 'الدهانات والطلاءات',
                'description_en' => 'High-quality paints and coatings for interior and exterior applications. Our range includes emulsion paints, enamel paints, and specialized coatings.',
                'description_ar' => 'دهانات وطلاءات عالية الجودة للتطبيقات الداخلية والخارجية. تشمل مجموعتنا دهانات الإيمولشن ودهانات المينا والطلاءات المتخصصة.',
                'order' => 1,
                'local_image' => '1.jpg',
            ],
            [
                'name_en' => 'Wood Finishes',
                'name_ar' => 'تشطيبات الخشب',
                'description_en' => 'Premium wood stains, varnishes, and lacquers to protect and enhance the natural beauty of wood surfaces.',
                'description_ar' => 'صبغات الخشب الفاخرة والورنيش واللاكيه لحماية وتعزيز الجمال الطبيعي لأسطح الخشب.',
                'order' => 2,
                'local_image' => '2.jpg',
            ],
            [
                'name_en' => 'Waterproofing',
                'name_ar' => 'العزل المائي',
                'description_en' => 'Advanced waterproofing solutions for roofs, basements, and wet areas. Protect your structures from water damage.',
                'description_ar' => 'حلول عزل مائي متقدمة للأسطح والأقبية والمناطق الرطبة. احمِ مبانيك من أضرار المياه.',
                'order' => 3,
                'local_image' => '3.jpg',
            ],
            [
                'name_en' => 'Industrial Coatings',
                'name_ar' => 'الطلاءات الصناعية',
                'description_en' => 'Heavy-duty industrial coatings for machinery, pipelines, and industrial structures requiring maximum protection.',
                'description_ar' => 'طلاءات صناعية شديدة التحمل للآلات وخطوط الأنابيب والهياكل الصناعية التي تتطلب أقصى حماية.',
                'order' => 4,
                'local_image' => '4.jpg',
            ],
            [
                'name_en' => 'Decorative Finishes',
                'name_ar' => 'التشطيبات الديكورية',
                'description_en' => 'Unique decorative finishes including textured paints, metallic effects, and specialty coatings for stunning interiors.',
                'description_ar' => 'تشطيبات ديكورية فريدة تشمل الدهانات المحببة والتأثيرات المعدنية والطلاءات الخاصة للديكورات الداخلية المذهلة.',
                'order' => 5,
                'local_image' => '5.jpg',
            ],
            [
                'name_en' => 'Primers & Sealers',
                'name_ar' => 'البرايمر والسيلر',
                'description_en' => 'Essential primers and sealers for proper surface preparation, ensuring optimal paint adhesion and longevity.',
                'description_ar' => 'البرايمر والسيلر الأساسي لإعداد السطح بشكل صحيح، مما يضمن التصاق الطلاء الأمثل وطول العمر.',
                'order' => 6,
                'local_image' => '6.jpg',
            ],
        ];

        // Ensure the directory exists
        Storage::disk('public')->makeDirectory('categories');

        foreach ($categories as $category) {
            $localImage = $category['local_image'];
            unset($category['local_image']);

            $slug = Str::slug($category['name_en']);
            $extension = pathinfo($localImage, PATHINFO_EXTENSION);
            $imagePath = "categories/{$slug}.{$extension}";

            // Copy local image to categories folder
            $this->copyLocalImage($localImage, $imagePath);

            ProductCategory::updateOrCreate(
                ['slug' => $slug],
                array_merge($category, [
                    'slug' => $slug,
                    'image' => $imagePath,
                    'status' => true,
                ])
            );
        }
    }

    /**
     * Copy local image from images/categories folder to destination
     */
    private function copyLocalImage(string $sourceImage, string $destPath): void
    {
        try {
            $sourcePath = "images/categories/{$sourceImage}";
            if (Storage::disk('public')->exists($sourcePath)) {
                $imageContent = Storage::disk('public')->get($sourcePath);
                Storage::disk('public')->put($destPath, $imageContent);
            }
        } catch (\Exception $e) {
            // Silently fail - image will just be missing
        }
    }
}
