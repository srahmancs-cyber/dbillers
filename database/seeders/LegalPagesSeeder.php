<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalPagesSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Privacy Page
            ['page' => 'privacy', 'section' => 'hero', 'title' => 'Privacy Policy', 'subtitle' => 'Last updated: April 17, 2026', 'order' => 1, 'content' => null],
            ['page' => 'privacy', 'section' => 'information_collect', 'title' => '1. Information We Collect', 'content' => '<p>We collect information you provide directly to us, including name, email address, phone number, and message content when you contact us through our forms.</p>', 'order' => 2],
            ['page' => 'privacy', 'section' => 'how_we_use', 'title' => '2. How We Use Your Information', 'content' => '<p>We use the information to respond to inquiries, provide medical billing services, and improve our website.</p>', 'order' => 3],
            ['page' => 'privacy', 'section' => 'data_protection', 'title' => '3. Data Protection', 'content' => '<p>We implement industry-standard security measures to protect your personal information.</p>', 'order' => 4],
            ['page' => 'privacy', 'section' => 'sharing', 'title' => '4. Sharing Your Information', 'content' => '<p>We do not sell or share your personal information with third parties except as required by law.</p>', 'order' => 5],
            ['page' => 'privacy', 'section' => 'contact', 'title' => '5. Contact Us', 'content' => '<p>If you have questions about this Privacy Policy, contact us at info@dbillers.com.</p>', 'order' => 6],
            
            // Terms Page
            ['page' => 'terms', 'section' => 'hero', 'title' => 'Terms of Service', 'subtitle' => 'Last updated: April 17, 2026', 'order' => 1, 'content' => null],
            ['page' => 'terms', 'section' => 'acceptance', 'title' => '1. Acceptance of Terms', 'content' => '<p>By accessing our website, you agree to be bound by these Terms of Service.</p>', 'order' => 2],
            ['page' => 'terms', 'section' => 'services', 'title' => '2. Our Services', 'content' => '<p>DBillers provides medical billing services subject to separate service agreements.</p>', 'order' => 3],
            ['page' => 'terms', 'section' => 'user_obligations', 'title' => '3. User Obligations', 'content' => '<p>You agree to provide accurate information and comply with applicable laws.</p>', 'order' => 4],
            ['page' => 'terms', 'section' => 'limitation', 'title' => '4. Limitation of Liability', 'content' => '<p>DBillers is not liable for indirect damages arising from use of this website.</p>', 'order' => 5],
            ['page' => 'terms', 'section' => 'governing_law', 'title' => '5. Governing Law', 'content' => '<p>These terms are governed by the laws of the jurisdiction where DBillers operates.</p>', 'order' => 6],
        ];

        foreach ($contents as $content) {
            DB::table('page_contents')->updateOrInsert(
                ['page' => $content['page'], 'section' => $content['section']],
                [
                    'title' => $content['title'],
                    'subtitle' => $content['subtitle'] ?? null,
                    'content' => $content['content'],
                    'order' => $content['order'],
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
