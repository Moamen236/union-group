<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Available local images in storage/app/public/images/sliders/
        $sliders = [
            [
                'title_en' => 'UNION GROUP',
                'title_ar' => 'مجموعة يونيون',
                'subtitle_en' => 'Premium Paints & Coatings',
                'subtitle_ar' => 'دهانات وطلاءات ممتازة',
                'button_text_en' => 'EXPLORE PRODUCTS',
                'button_text_ar' => 'استكشف المنتجات',
                'button_url' => '/shop',
                'order' => 1,
                'local_image' => '1.jpg',
            ],
            [
                'title_en' => 'INDUSTRIAL COATINGS',
                'title_ar' => 'الطلاءات الصناعية',
                'subtitle_en' => 'Quality You Can Trust',
                'subtitle_ar' => 'جودة يمكنك الوثوق بها',
                'button_text_en' => 'VIEW CATALOG',
                'button_text_ar' => 'عرض الكتالوج',
                'button_url' => '/shop',
                'order' => 2,
                'local_image' => '2.jpg',
            ],
            [
                'title_en' => 'WOOD FINISHES',
                'title_ar' => 'تشطيبات الخشب',
                'subtitle_en' => 'Protect & Beautify',
                'subtitle_ar' => 'حماية وتجميل',
                'button_text_en' => 'LEARN MORE',
                'button_text_ar' => 'اعرف المزيد',
                'button_url' => '/shop?category=wood-finishes',
                'order' => 3,
                'local_image' => '3.jpg',
            ],
        ];

        // Ensure the directory exists
        Storage::disk('public')->makeDirectory('sliders');

        foreach ($sliders as $sliderData) {
            $localImage = $sliderData['local_image'];
            unset($sliderData['local_image']);

            $imagePath = "sliders/slide-{$sliderData['order']}.jpg";

            // Copy local image to sliders folder
            $this->copyLocalImage($localImage, $imagePath);

            Slider::updateOrCreate(
                ['order' => $sliderData['order']],
                array_merge($sliderData, [
                    'image' => $imagePath,
                    'status' => true,
                ])
            );
        }
    }

    /**
     * Copy local image from images/sliders folder to destination
     */
    private function copyLocalImage(string $sourceImage, string $destPath): void
    {
        try {
            $sourcePath = "images/sliders/{$sourceImage}";
            if (Storage::disk('public')->exists($sourcePath)) {
                $imageContent = Storage::disk('public')->get($sourcePath);
                Storage::disk('public')->put($destPath, $imageContent);
            }
        } catch (\Exception $e) {
            // Silently fail - image will just be missing
        }
    }
}
