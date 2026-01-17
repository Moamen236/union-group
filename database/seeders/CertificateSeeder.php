<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = [
            [
                'name_en' => 'ISO 9001:2015 Quality Management',
                'name_ar' => 'أيزو 9001:2015 إدارة الجودة',
                'type' => 'image',
                'issuer_en' => 'International Organization for Standardization',
                'issuer_ar' => 'المنظمة الدولية للتوحيد القياسي',
                'issue_date' => '2022-03-15',
                'expiry_date' => '2025-03-14',
                'order' => 1,
            ],
            [
                'name_en' => 'ISO 14001:2015 Environmental Management',
                'name_ar' => 'أيزو 14001:2015 الإدارة البيئية',
                'type' => 'image',
                'issuer_en' => 'International Organization for Standardization',
                'issuer_ar' => 'المنظمة الدولية للتوحيد القياسي',
                'issue_date' => '2022-03-15',
                'expiry_date' => '2025-03-14',
                'order' => 2,
            ],
            [
                'name_en' => 'OHSAS 18001 Occupational Health & Safety',
                'name_ar' => 'أوساس 18001 الصحة والسلامة المهنية',
                'type' => 'image',
                'issuer_en' => 'British Standards Institution',
                'issuer_ar' => 'معهد المعايير البريطانية',
                'issue_date' => '2021-07-01',
                'expiry_date' => '2024-06-30',
                'order' => 3,
            ],
            [
                'name_en' => 'Saudi Quality Mark',
                'name_ar' => 'علامة الجودة السعودية',
                'type' => 'image',
                'issuer_en' => 'Saudi Standards, Metrology and Quality Organization',
                'issuer_ar' => 'الهيئة السعودية للمواصفات والمقاييس والجودة',
                'issue_date' => '2023-01-10',
                'expiry_date' => '2026-01-09',
                'order' => 4,
            ],
            [
                'name_en' => 'Green Building Compliance Certificate',
                'name_ar' => 'شهادة المباني الخضراء',
                'type' => 'pdf',
                'issuer_en' => 'UAE Green Building Council',
                'issuer_ar' => 'مجلس الإمارات للأبنية الخضراء',
                'issue_date' => '2023-05-20',
                'expiry_date' => '2026-05-19',
                'order' => 5,
            ],
            [
                'name_en' => 'Low VOC Certification',
                'name_ar' => 'شهادة المركبات العضوية المتطايرة المنخفضة',
                'type' => 'image',
                'issuer_en' => 'GreenGuard Environmental Institute',
                'issuer_ar' => 'معهد جرين جارد البيئي',
                'issue_date' => '2022-11-05',
                'expiry_date' => '2025-11-04',
                'order' => 6,
            ],
            [
                'name_en' => 'Fire Safety Compliance',
                'name_ar' => 'شهادة الامتثال للسلامة من الحرائق',
                'type' => 'pdf',
                'issuer_en' => 'Saudi Civil Defense',
                'issuer_ar' => 'الدفاع المدني السعودي',
                'issue_date' => '2023-08-12',
                'expiry_date' => '2024-08-11',
                'order' => 7,
            ],
            [
                'name_en' => 'Industrial Excellence Award 2023',
                'name_ar' => 'جائزة التميز الصناعي 2023',
                'type' => 'image',
                'issuer_en' => 'Saudi Industrial Development Fund',
                'issuer_ar' => 'صندوق التنمية الصناعية السعودي',
                'issue_date' => '2023-12-01',
                'expiry_date' => null,
                'order' => 8,
            ],
            [
                'name_en' => 'Supplier Quality Certification',
                'name_ar' => 'شهادة جودة المورد',
                'type' => 'pdf',
                'issuer_en' => 'Saudi Aramco',
                'issuer_ar' => 'أرامكو السعودية',
                'issue_date' => '2022-06-15',
                'expiry_date' => '2025-06-14',
                'order' => 9,
            ],
            [
                'name_en' => 'Export Quality Certificate',
                'name_ar' => 'شهادة جودة التصدير',
                'type' => 'image',
                'issuer_en' => 'Saudi Export Development Authority',
                'issuer_ar' => 'هيئة تنمية الصادرات السعودية',
                'issue_date' => '2023-04-01',
                'expiry_date' => '2026-03-31',
                'order' => 10,
            ],
        ];

        foreach ($certificates as $certificateData) {
            // Generate a placeholder file path (in production, you'd upload actual files)
            $fileName = 'certificate-' . $certificateData['order'] . '.' . ($certificateData['type'] === 'pdf' ? 'pdf' : 'jpg');

            Certificate::updateOrCreate(
                [
                    'name_en' => $certificateData['name_en'],
                ],
                array_merge($certificateData, [
                    'file' => 'certificates/' . $fileName,
                    'status' => true,
                ])
            );
        }
    }
}
