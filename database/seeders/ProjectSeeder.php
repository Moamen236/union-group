<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name_en' => 'Kingdom Tower Facade',
                'name_ar' => 'واجهة برج المملكة',
                'description_en' => 'Complete exterior coating solution for the iconic Kingdom Tower in Riyadh. We provided weather-resistant coatings that maintain the building\'s pristine appearance while protecting against extreme temperatures and UV exposure. The project included specialized primers, base coats, and a premium topcoat system.',
                'description_ar' => 'حل طلاء خارجي كامل لبرج المملكة الأيقوني في الرياض. قدمنا طلاءات مقاومة للطقس تحافظ على المظهر النقي للمبنى مع الحماية من درجات الحرارة القصوى والتعرض للأشعة فوق البنفسجية. شمل المشروع برايمر متخصص وطبقات أساسية ونظام طلاء علوي ممتاز.',
                'location_en' => 'Riyadh, Saudi Arabia',
                'location_ar' => 'الرياض، المملكة العربية السعودية',
                'client' => 'Kingdom Holding Company',
                'completion_date' => '2023-06-15',
                'order' => 1,
            ],
            [
                'name_en' => 'Dubai Marina Residential Complex',
                'name_ar' => 'مجمع دبي مارينا السكني',
                'description_en' => 'Interior and exterior painting project for a luxury residential complex featuring 450 units. Our team delivered premium emulsion paints for interiors and marine-grade coatings for exteriors to withstand the coastal environment.',
                'description_ar' => 'مشروع طلاء داخلي وخارجي لمجمع سكني فاخر يضم 450 وحدة. قدم فريقنا دهانات إيمولشن فاخرة للداخل وطلاءات بحرية للخارج لتحمل البيئة الساحلية.',
                'location_en' => 'Dubai, UAE',
                'location_ar' => 'دبي، الإمارات العربية المتحدة',
                'client' => 'Emaar Properties',
                'completion_date' => '2023-09-20',
                'order' => 2,
            ],
            [
                'name_en' => 'Jeddah Industrial Park',
                'name_ar' => 'مدينة جدة الصناعية',
                'description_en' => 'Large-scale industrial coating project covering 50,000 square meters of factory floors and structural steel. We applied heavy-duty epoxy floor coatings and anti-corrosion systems for maximum durability in harsh industrial conditions.',
                'description_ar' => 'مشروع طلاء صناعي واسع النطاق يغطي 50,000 متر مربع من أرضيات المصانع والصلب الهيكلي. قمنا بتطبيق طلاءات أرضيات إيبوكسي شديدة التحمل وأنظمة مقاومة للتآكل لأقصى متانة في الظروف الصناعية القاسية.',
                'location_en' => 'Jeddah, Saudi Arabia',
                'location_ar' => 'جدة، المملكة العربية السعودية',
                'client' => 'Saudi Industrial Development',
                'completion_date' => '2023-03-10',
                'order' => 3,
            ],
            [
                'name_en' => 'Abu Dhabi Grand Mosque Restoration',
                'name_ar' => 'ترميم مسجد أبوظبي الكبير',
                'description_en' => 'Delicate restoration project for the exterior surfaces of a historic mosque. We used specialized heritage-approved coatings that match the original aesthetic while providing modern protection against environmental factors.',
                'description_ar' => 'مشروع ترميم دقيق للأسطح الخارجية لمسجد تاريخي. استخدمنا طلاءات متخصصة معتمدة للتراث تتوافق مع الجمالية الأصلية مع توفير حماية حديثة ضد العوامل البيئية.',
                'location_en' => 'Abu Dhabi, UAE',
                'location_ar' => 'أبوظبي، الإمارات العربية المتحدة',
                'client' => 'Abu Dhabi Tourism Authority',
                'completion_date' => '2024-01-05',
                'order' => 4,
            ],
            [
                'name_en' => 'NEOM Residential District',
                'name_ar' => 'الحي السكني في نيوم',
                'description_en' => 'Flagship project for the futuristic NEOM city development. We provided eco-friendly, sustainable coating solutions including solar-reflective exterior paints and low-VOC interior finishes for 200 smart homes.',
                'description_ar' => 'مشروع رائد لتطوير مدينة نيوم المستقبلية. قدمنا حلول طلاء صديقة للبيئة ومستدامة تشمل دهانات خارجية عاكسة للشمس وتشطيبات داخلية منخفضة المركبات العضوية المتطايرة لـ 200 منزل ذكي.',
                'location_en' => 'NEOM, Saudi Arabia',
                'location_ar' => 'نيوم، المملكة العربية السعودية',
                'client' => 'NEOM Company',
                'completion_date' => '2024-06-30',
                'order' => 5,
            ],
            [
                'name_en' => 'Qatar World Cup Stadium',
                'name_ar' => 'ستاد كأس العالم قطر',
                'description_en' => 'High-profile project providing specialized coatings for one of the Qatar World Cup stadiums. Our solutions included heat-reflective roof coatings, anti-graffiti finishes, and durable floor markings.',
                'description_ar' => 'مشروع بارز يوفر طلاءات متخصصة لأحد ملاعب كأس العالم في قطر. شملت حلولنا طلاءات سقف عاكسة للحرارة وتشطيبات مضادة للكتابة على الجدران وعلامات أرضية متينة.',
                'location_en' => 'Doha, Qatar',
                'location_ar' => 'الدوحة، قطر',
                'client' => 'Qatar Supreme Committee',
                'completion_date' => '2022-10-15',
                'order' => 6,
            ],
            [
                'name_en' => 'Bahrain Financial Harbor',
                'name_ar' => 'ميناء البحرين المالي',
                'description_en' => 'Premium coating solutions for the twin towers of Bahrain Financial Harbor. We delivered fire-retardant coatings, luxury interior finishes, and waterproofing systems for underground parking.',
                'description_ar' => 'حلول طلاء فاخرة للبرجين التوأمين لميناء البحرين المالي. قدمنا طلاءات مثبطة للحريق وتشطيبات داخلية فاخرة وأنظمة عزل مائي لمواقف السيارات تحت الأرض.',
                'location_en' => 'Manama, Bahrain',
                'location_ar' => 'المنامة، البحرين',
                'client' => 'Bahrain Financial Harbor',
                'completion_date' => '2023-12-01',
                'order' => 7,
            ],
            [
                'name_en' => 'Kuwait Oil Refinery',
                'name_ar' => 'مصفاة النفط الكويتية',
                'description_en' => 'Comprehensive industrial coating project for Kuwait\'s largest oil refinery. We applied high-temperature resistant coatings, chemical-resistant floor systems, and specialized pipeline coatings.',
                'description_ar' => 'مشروع طلاء صناعي شامل لأكبر مصفاة نفط في الكويت. قمنا بتطبيق طلاءات مقاومة لدرجات الحرارة العالية وأنظمة أرضيات مقاومة للمواد الكيميائية وطلاءات متخصصة لخطوط الأنابيب.',
                'location_en' => 'Ahmadi, Kuwait',
                'location_ar' => 'الأحمدي، الكويت',
                'client' => 'Kuwait National Petroleum',
                'completion_date' => '2023-08-25',
                'order' => 8,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::updateOrCreate(
                ['slug' => Str::slug($projectData['name_en'])],
                array_merge($projectData, [
                    'slug' => Str::slug($projectData['name_en']),
                    'status' => true,
                ])
            );
        }
    }
}
