<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Paints & Coatings
            [
                'category_slug' => 'paints-coatings',
                'name_en' => 'Premium Interior Emulsion',
                'name_ar' => 'إيمولشن داخلي ممتاز',
                'code' => 'PIE-001',
                'description_en' => 'A premium quality interior emulsion paint with excellent coverage and durability. Features low VOC formula and is available in a wide range of colors. Perfect for living rooms, bedrooms, and offices.',
                'description_ar' => 'دهان إيمولشن داخلي عالي الجودة مع تغطية ومتانة ممتازة. يتميز بتركيبة منخفضة المركبات العضوية المتطايرة ومتوفر بمجموعة واسعة من الألوان. مثالي لغرف المعيشة وغرف النوم والمكاتب.',
                'features_en' => "• Excellent coverage - up to 12 sq.m per liter\n• Low VOC formula\n• Washable finish\n• Anti-bacterial properties\n• 5-year warranty",
                'features_ar' => "• تغطية ممتازة - حتى 12 متر مربع لكل لتر\n• تركيبة منخفضة المركبات العضوية المتطايرة\n• سطح قابل للغسل\n• خصائص مضادة للبكتيريا\n• ضمان 5 سنوات",
                'is_favorite' => true,
                'order' => 1,
            ],
            [
                'category_slug' => 'paints-coatings',
                'name_en' => 'Weather Shield Exterior',
                'name_ar' => 'درع الطقس الخارجي',
                'code' => 'WSE-002',
                'description_en' => 'Advanced exterior paint formulated to withstand harsh weather conditions. UV resistant and water repellent, ensuring long-lasting color retention.',
                'description_ar' => 'دهان خارجي متطور مصمم لتحمل الظروف الجوية القاسية. مقاوم للأشعة فوق البنفسجية وطارد للماء، مما يضمن الحفاظ على اللون لفترة طويلة.',
                'features_en' => "• UV resistant formula\n• Water repellent\n• Crack resistant\n• Self-cleaning technology\n• 10-year warranty",
                'features_ar' => "• تركيبة مقاومة للأشعة فوق البنفسجية\n• طارد للماء\n• مقاوم للتشققات\n• تقنية التنظيف الذاتي\n• ضمان 10 سنوات",
                'is_favorite' => true,
                'order' => 2,
            ],
            [
                'category_slug' => 'paints-coatings',
                'name_en' => 'Silk Finish Matt',
                'name_ar' => 'لمسة حريرية مطفية',
                'code' => 'SFM-003',
                'description_en' => 'Luxurious silk finish paint that provides a sophisticated matt appearance with a subtle sheen. Ideal for feature walls and elegant spaces.',
                'description_ar' => 'دهان بلمسة حريرية فاخرة يوفر مظهرًا مطفيًا راقيًا مع لمعان خفيف. مثالي للجدران المميزة والمساحات الأنيقة.',
                'features_en' => "• Elegant silk finish\n• Superior washability\n• Stain resistant\n• Easy application\n• Wide color range",
                'features_ar' => "• لمسة حريرية أنيقة\n• قابلية غسل فائقة\n• مقاوم للبقع\n• سهولة التطبيق\n• مجموعة ألوان واسعة",
                'is_favorite' => false,
                'order' => 3,
            ],

            // Wood Finishes
            [
                'category_slug' => 'wood-finishes',
                'name_en' => 'Natural Wood Stain',
                'name_ar' => 'صبغة الخشب الطبيعية',
                'code' => 'NWS-001',
                'description_en' => 'Premium wood stain that penetrates deep into the wood grain, enhancing its natural beauty while providing excellent protection.',
                'description_ar' => 'صبغة خشب فاخرة تتغلغل عميقًا في ألياف الخشب، مما يعزز جماله الطبيعي مع توفير حماية ممتازة.',
                'features_en' => "• Deep penetration\n• Enhances wood grain\n• UV protection\n• Water resistant\n• Available in 12 shades",
                'features_ar' => "• تغلغل عميق\n• يعزز ألياف الخشب\n• حماية من الأشعة فوق البنفسجية\n• مقاوم للماء\n• متوفر بـ 12 درجة لونية",
                'is_favorite' => true,
                'order' => 1,
            ],
            [
                'category_slug' => 'wood-finishes',
                'name_en' => 'Clear Polyurethane Varnish',
                'name_ar' => 'ورنيش البولي يوريثان الشفاف',
                'code' => 'CPV-002',
                'description_en' => 'Crystal clear polyurethane varnish providing superior protection and a beautiful finish for all wood surfaces.',
                'description_ar' => 'ورنيش بولي يوريثان شفاف تمامًا يوفر حماية فائقة ولمسة نهائية جميلة لجميع الأسطح الخشبية.',
                'features_en' => "• Crystal clear finish\n• Scratch resistant\n• Heat resistant\n• Easy to apply\n• Gloss or satin finish",
                'features_ar' => "• لمسة نهائية شفافة تمامًا\n• مقاوم للخدش\n• مقاوم للحرارة\n• سهل التطبيق\n• لامع أو ساتان",
                'is_favorite' => false,
                'order' => 2,
            ],

            // Waterproofing
            [
                'category_slug' => 'waterproofing',
                'name_en' => 'Roof Seal Pro',
                'name_ar' => 'سيل السطح المحترف',
                'code' => 'RSP-001',
                'description_en' => 'Professional-grade roof waterproofing membrane that provides complete protection against water penetration and thermal expansion.',
                'description_ar' => 'غشاء عزل مائي للأسطح بدرجة احترافية يوفر حماية كاملة ضد تسرب المياه والتمدد الحراري.',
                'features_en' => "• 100% waterproof\n• Thermal resistant\n• Flexible membrane\n• UV stable\n• 15-year guarantee",
                'features_ar' => "• عزل مائي 100%\n• مقاوم للحرارة\n• غشاء مرن\n• مستقر ضد الأشعة فوق البنفسجية\n• ضمان 15 سنة",
                'is_favorite' => true,
                'order' => 1,
            ],
            [
                'category_slug' => 'waterproofing',
                'name_en' => 'Basement Guard',
                'name_ar' => 'حارس القبو',
                'code' => 'BG-002',
                'description_en' => 'Specialized basement waterproofing solution designed to prevent water seepage and dampness in underground structures.',
                'description_ar' => 'حل عزل مائي متخصص للأقبية مصمم لمنع تسرب المياه والرطوبة في الهياكل تحت الأرض.',
                'features_en' => "• Negative side waterproofing\n• Crystalline technology\n• Self-healing properties\n• Breathable\n• Permanent protection",
                'features_ar' => "• عزل مائي سلبي\n• تقنية بلورية\n• خصائص ذاتية الإصلاح\n• قابل للتنفس\n• حماية دائمة",
                'is_favorite' => false,
                'order' => 2,
            ],

            // Industrial Coatings
            [
                'category_slug' => 'industrial-coatings',
                'name_en' => 'Epoxy Floor Coating',
                'name_ar' => 'طلاء الأرضيات الإيبوكسي',
                'code' => 'EFC-001',
                'description_en' => 'Heavy-duty epoxy floor coating for industrial facilities, warehouses, and commercial spaces requiring maximum durability.',
                'description_ar' => 'طلاء أرضيات إيبوكسي شديد التحمل للمنشآت الصناعية والمستودعات والمساحات التجارية التي تتطلب أقصى متانة.',
                'features_en' => "• Chemical resistant\n• Abrasion resistant\n• Seamless finish\n• Easy to clean\n• Anti-slip options available",
                'features_ar' => "• مقاوم للمواد الكيميائية\n• مقاوم للتآكل\n• لمسة نهائية سلسة\n• سهل التنظيف\n• خيارات مضادة للانزلاق متوفرة",
                'is_favorite' => true,
                'order' => 1,
            ],
            [
                'category_slug' => 'industrial-coatings',
                'name_en' => 'Anti-Corrosion Primer',
                'name_ar' => 'برايمر مضاد للتآكل',
                'code' => 'ACP-002',
                'description_en' => 'High-performance anti-corrosion primer for metal surfaces exposed to harsh industrial environments.',
                'description_ar' => 'برايمر عالي الأداء مضاد للتآكل للأسطح المعدنية المعرضة للبيئات الصناعية القاسية.',
                'features_en' => "• Zinc-rich formula\n• Excellent adhesion\n• Fast drying\n• Over-coatable\n• Salt spray resistant",
                'features_ar' => "• تركيبة غنية بالزنك\n• التصاق ممتاز\n• سريع الجفاف\n• قابل للطلاء\n• مقاوم لرذاذ الملح",
                'is_favorite' => false,
                'order' => 2,
            ],

            // Decorative Finishes
            [
                'category_slug' => 'decorative-finishes',
                'name_en' => 'Venetian Plaster',
                'name_ar' => 'الجص الفينيسي',
                'code' => 'VP-001',
                'description_en' => 'Authentic Venetian plaster finish that creates a luxurious marble-like appearance with depth and character.',
                'description_ar' => 'لمسة نهائية من الجص الفينيسي الأصيل تخلق مظهرًا فاخرًا يشبه الرخام مع العمق والشخصية.',
                'features_en' => "• Marble-like finish\n• Customizable colors\n• Durable surface\n• Eco-friendly\n• Unique patterns",
                'features_ar' => "• لمسة نهائية تشبه الرخام\n• ألوان قابلة للتخصيص\n• سطح متين\n• صديق للبيئة\n• أنماط فريدة",
                'is_favorite' => true,
                'order' => 1,
            ],
            [
                'category_slug' => 'decorative-finishes',
                'name_en' => 'Metallic Effect Paint',
                'name_ar' => 'دهان التأثير المعدني',
                'code' => 'MEP-002',
                'description_en' => 'Stunning metallic effect paint that adds glamour and sophistication to any interior space.',
                'description_ar' => 'دهان بتأثير معدني مذهل يضيف البريق والرقي إلى أي مساحة داخلية.',
                'features_en' => "• Real metallic shimmer\n• Multiple metal tones\n• Easy application\n• Washable\n• Long-lasting shine",
                'features_ar' => "• لمعان معدني حقيقي\n• درجات معدنية متعددة\n• سهولة التطبيق\n• قابل للغسل\n• لمعان طويل الأمد",
                'is_favorite' => false,
                'order' => 2,
            ],

            // Primers & Sealers
            [
                'category_slug' => 'primers-sealers',
                'name_en' => 'Universal Primer',
                'name_ar' => 'برايمر شامل',
                'code' => 'UP-001',
                'description_en' => 'Multi-surface primer suitable for wood, metal, plaster, and previously painted surfaces. Ensures excellent topcoat adhesion.',
                'description_ar' => 'برايمر متعدد الأسطح مناسب للخشب والمعدن والجص والأسطح المطلية مسبقًا. يضمن التصاقًا ممتازًا للطبقة العلوية.',
                'features_en' => "• Multi-surface use\n• Blocks stains\n• Quick drying\n• Low odor\n• Excellent coverage",
                'features_ar' => "• استخدام متعدد الأسطح\n• يحجب البقع\n• سريع الجفاف\n• رائحة منخفضة\n• تغطية ممتازة",
                'is_favorite' => false,
                'order' => 1,
            ],
            [
                'category_slug' => 'primers-sealers',
                'name_en' => 'Damp Proof Sealer',
                'name_ar' => 'سيلر مقاوم للرطوبة',
                'code' => 'DPS-002',
                'description_en' => 'Specialized sealer for damp walls that creates a barrier against moisture while allowing the surface to breathe.',
                'description_ar' => 'سيلر متخصص للجدران الرطبة يخلق حاجزًا ضد الرطوبة مع السماح للسطح بالتنفس.',
                'features_en' => "• Moisture barrier\n• Breathable\n• Prevents efflorescence\n• Long-lasting\n• Easy application",
                'features_ar' => "• حاجز للرطوبة\n• قابل للتنفس\n• يمنع التزهر\n• طويل الأمد\n• سهل التطبيق",
                'is_favorite' => false,
                'order' => 2,
            ],
        ];

        foreach ($products as $productData) {
            $categorySlug = $productData['category_slug'];
            unset($productData['category_slug']);

            $category = ProductCategory::where('slug', $categorySlug)->first();

            if ($category) {
                Product::updateOrCreate(
                    ['code' => $productData['code']],
                    array_merge($productData, [
                        'category_id' => $category->id,
                        'slug' => Str::slug($productData['name_en']),
                        'status' => true,
                    ])
                );
            }
        }
    }
}
