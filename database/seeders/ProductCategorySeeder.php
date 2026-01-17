<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_en' => 'Paints & Coatings',
                'name_ar' => 'الدهانات والطلاءات',
                'description_en' => 'High-quality paints and coatings for interior and exterior applications. Our range includes emulsion paints, enamel paints, and specialized coatings.',
                'description_ar' => 'دهانات وطلاءات عالية الجودة للتطبيقات الداخلية والخارجية. تشمل مجموعتنا دهانات الإيمولشن ودهانات المينا والطلاءات المتخصصة.',
                'order' => 1,
            ],
            [
                'name_en' => 'Wood Finishes',
                'name_ar' => 'تشطيبات الخشب',
                'description_en' => 'Premium wood stains, varnishes, and lacquers to protect and enhance the natural beauty of wood surfaces.',
                'description_ar' => 'صبغات الخشب الفاخرة والورنيش واللاكيه لحماية وتعزيز الجمال الطبيعي لأسطح الخشب.',
                'order' => 2,
            ],
            [
                'name_en' => 'Waterproofing',
                'name_ar' => 'العزل المائي',
                'description_en' => 'Advanced waterproofing solutions for roofs, basements, and wet areas. Protect your structures from water damage.',
                'description_ar' => 'حلول عزل مائي متقدمة للأسطح والأقبية والمناطق الرطبة. احمِ مبانيك من أضرار المياه.',
                'order' => 3,
            ],
            [
                'name_en' => 'Industrial Coatings',
                'name_ar' => 'الطلاءات الصناعية',
                'description_en' => 'Heavy-duty industrial coatings for machinery, pipelines, and industrial structures requiring maximum protection.',
                'description_ar' => 'طلاءات صناعية شديدة التحمل للآلات وخطوط الأنابيب والهياكل الصناعية التي تتطلب أقصى حماية.',
                'order' => 4,
            ],
            [
                'name_en' => 'Decorative Finishes',
                'name_ar' => 'التشطيبات الديكورية',
                'description_en' => 'Unique decorative finishes including textured paints, metallic effects, and specialty coatings for stunning interiors.',
                'description_ar' => 'تشطيبات ديكورية فريدة تشمل الدهانات المحببة والتأثيرات المعدنية والطلاءات الخاصة للديكورات الداخلية المذهلة.',
                'order' => 5,
            ],
            [
                'name_en' => 'Primers & Sealers',
                'name_ar' => 'البرايمر والسيلر',
                'description_en' => 'Essential primers and sealers for proper surface preparation, ensuring optimal paint adhesion and longevity.',
                'description_ar' => 'البرايمر والسيلر الأساسي لإعداد السطح بشكل صحيح، مما يضمن التصاق الطلاء الأمثل وطول العمر.',
                'order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['slug' => Str::slug($category['name_en'])],
                array_merge($category, [
                    'slug' => Str::slug($category['name_en']),
                    'status' => true,
                ])
            );
        }
    }
}
