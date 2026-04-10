<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Home Page
            ['page' => 'home', 'section' => 'hero', 'title' => 'Precision Billing for Modern Medicine', 'subtitle' => 'Streamline your medical practice revenue cycle with DBillers', 'order' => 1],
            ['page' => 'home', 'section' => 'stat_1', 'title' => '98%', 'subtitle' => 'Claim Acceptance', 'order' => 2],
            ['page' => 'home', 'section' => 'stat_2', 'title' => '15 Days', 'subtitle' => 'Average Payment', 'order' => 3],
            ['page' => 'home', 'section' => 'stat_3', 'title' => '500+', 'subtitle' => 'Happy Providers', 'order' => 4],
            ['page' => 'home', 'section' => 'stat_4', 'title' => '24/7', 'subtitle' => 'Support', 'order' => 5],
            
            // About Page
            ['page' => 'about', 'section' => 'hero', 'title' => 'About DBillers', 'subtitle' => 'We\'re revolutionizing medical billing with precision, transparency, and technology.', 'order' => 1],
            ['page' => 'about', 'section' => 'mission', 'title' => 'Our Mission', 'content' => 'To provide accurate, transparent, and technology-driven medical billing services that maximize revenue for healthcare providers.', 'order' => 2],
            ['page' => 'about', 'section' => 'vision', 'title' => 'Our Vision', 'content' => 'To become the most trusted medical billing partner for modern medicine, setting new standards in precision and efficiency.', 'order' => 3],
            ['page' => 'about', 'section' => 'why_choose_1', 'title' => '99.9% Accuracy', 'content' => 'Double-checked claims before submission', 'order' => 4],
            ['page' => 'about', 'section' => 'why_choose_2', 'title' => 'Fast Turnaround', 'content' => 'Claims submitted within 24 hours', 'order' => 5],
            ['page' => 'about', 'section' => 'why_choose_3', 'title' => 'HIPAA Compliant', 'content' => 'Your data is always secure', 'order' => 6],
            
            // Services Page
            ['page' => 'services', 'section' => 'hero', 'title' => 'Our Services', 'subtitle' => 'Comprehensive medical billing solutions tailored to your practice', 'order' => 1],
            ['page' => 'services', 'section' => 'service_1', 'title' => 'Medical Coding', 'content' => 'Expert ICD-10, CPT, and HCPCS coding', 'order' => 2],
            ['page' => 'services', 'section' => 'service_2', 'title' => 'Revenue Cycle Management', 'content' => 'End-to-end RCM to optimize cash flow', 'order' => 3],
            ['page' => 'services', 'section' => 'service_3', 'title' => 'Denial Management', 'content' => 'Aggressive denial recovery and prevention', 'order' => 4],
            ['page' => 'services', 'section' => 'service_4', 'title' => 'AR Follow-up', 'content' => 'Systematic accounts receivable management', 'order' => 5],
            ['page' => 'services', 'section' => 'service_5', 'title' => 'Eligibility Verification', 'content' => 'Real-time insurance verification', 'order' => 6],
            ['page' => 'services', 'section' => 'service_6', 'title' => 'Reporting & Analytics', 'content' => 'Data-driven insights for your practice', 'order' => 7],
            
            // Specialities Page
            ['page' => 'specialities', 'section' => 'hero', 'title' => 'Medical Specialities', 'subtitle' => 'Expert billing solutions across all major medical specialities', 'order' => 1],
            
            // Contact Page
            ['page' => 'contact', 'section' => 'hero', 'title' => 'Contact Us', 'subtitle' => 'Get in touch with our billing experts', 'order' => 1],
        ];

        foreach ($contents as $content) {
            DB::table('page_contents')->insert([
                'page' => $content['page'],
                'section' => $content['section'],
                'title' => $content['title'] ?? null,
                'subtitle' => $content['subtitle'] ?? null,
                'content' => $content['content'] ?? null,
                'order' => $content['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
