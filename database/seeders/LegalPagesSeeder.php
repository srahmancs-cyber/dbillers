<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalPagesSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [

            // ══════════════════════════════════════════
            // PRIVACY PAGE
            // ══════════════════════════════════════════
            [
                'page'    => 'privacy',
                'section' => 'hero',
                'title'   => 'Privacy Policy',
                'subtitle'=> 'Last updated: May 06, 2015',
                'content' => '<p><strong>DBillers Medical Billing Services Privacy Policy</strong></p><p>At <strong>DBillers</strong>, the \u201cD\u201d traditionally stands for \u201cthe,\u201d but in our identity, it represents <strong>\u201cDoctors\u201d</strong>\u2014reflecting our commitment to supporting healthcare providers through efficient and reliable billing services.&nbsp;</p><p><strong>Scope and Purpose</strong></p><p>This Privacy Policy explains how <strong>DBillers</strong> (\u201cwe,\u201d \u201cus,\u201d \u201cour\u201d) collects, uses, and protects information through <a href="http://www.dbillers.com"><strong>www.dbillers.com</strong></a> and related platforms, as well as offline interactions such as client communications and meetings.</p><p>This Policy does not apply to third-party websites or services, and we recommend reviewing their policies separately.</p><p><strong>HIPAA Compliance</strong></p><p>Dbillers works with healthcare providers and processes data under strict agreements, including <strong>HIPAA-compliant Business Associate Agreements (BAA)</strong> where required. Providers may have their own privacy practices, which we do not control.</p><p><strong>Our Services</strong></p><p>We provide:</p><ul><li>&nbsp;Medical Billing &amp; Coding&nbsp;</li><li>&nbsp;Revenue Cycle Management (RCM)&nbsp;</li><li>&nbsp;Insurance Verification &amp; Authorizations&nbsp;</li><li>&nbsp;Claims Submission &amp; Denial Management&nbsp;</li><li>&nbsp;Credentialing Services&nbsp;</li></ul><p><strong>Information We Collect</strong></p><ul><li>&nbsp;Contact and business information&nbsp;</li><li>&nbsp;Healthcare data (as required for billing)&nbsp;</li><li>&nbsp;Technical data (IP, device, browser)&nbsp;</li></ul><p><strong>How We Use Information</strong></p><ul><li>&nbsp;To deliver billing and RCM services&nbsp;</li><li>&nbsp;To communicate with clients&nbsp;</li><li>&nbsp;To meet legal and compliance requirements&nbsp;</li></ul><p><strong>Data Security</strong></p><p>We implement strong safeguards to protect sensitive data, including <strong>Protected Health Information (PHI)</strong>, in line with HIPAA standards.</p><p><strong>Contact Us</strong></p><p>&#128231; billing@dbillers.com</p><p>&#127760; <a href="http://www.dbillers.com"><span style="text-decoration: underline;">www.dbillers.com</span></a></p>',
                'metadata'=> '{"meta_title": "Privacy Policy | DBillers Medical Billing", "meta_description": "Read DBillers privacy policy to understand how we collect, use, and protect your personal and practice information. HIPAA-compliant medical billing services.", "meta_keywords": "privacy policy, data protection, medical billing privacy, HIPAA compliance, healthcare data security", "og_title": "Privacy Policy | DBillers", "og_description": "DBillers privacy policy for medical billing services."}',
                'order'   => 1,
            ],
            [
                'page'    => 'privacy',
                'section' => 'DBillers_Privacy_ Policy',
                'title'   => 'DBillers Medical Billing Services Privacy Policy',
                'subtitle'=> null,
                'content' => '<p>At <strong>DBillers</strong>, the \u201cD\u201d traditionally stands for \u201cthe,\u201d but in our identity, it represents <strong>\u201cDoctors\u201d - </strong>reflecting our commitment to supporting healthcare providers through efficient and reliable billing services.&nbsp;</p>',
                'metadata'=> null,
                'order'   => 2,
            ],
            [
                'page'    => 'privacy',
                'section' => 'Scope_Purpose',
                'title'   => 'Scope and Purpose',
                'subtitle'=> null,
                'content' => '<p>This Privacy Policy explains how <strong>DBillers</strong> (\u201cwe,\u201d \u201cus,\u201d \u201cour\u201d) collects, uses, and protects information through <a href="http://www.dbillers.com"><strong>www.dbillers.com</strong></a> and related platforms, as well as offline interactions such as client communications and meetings.</p><p>This Policy does not apply to third-party websites or services, and we recommend reviewing their policies separately.</p>',
                'metadata'=> null,
                'order'   => 3,
            ],
            [
                'page'    => 'privacy',
                'section' => 'HIPAA_Compliance',
                'title'   => 'HIPAA Compliance',
                'subtitle'=> null,
                'content' => '<p>Dbillers works with healthcare providers and processes data under strict agreements, including <strong>HIPAA-compliant Business Associate Agreements (BAA)</strong> where required. Providers may have their own privacy practices, which we do not control.</p>',
                'metadata'=> null,
                'order'   => 4,
            ],
            [
                'page'    => 'privacy',
                'section' => 'Our_Services',
                'title'   => 'Our Services',
                'subtitle'=> null,
                'content' => '<p>We provide:</p><ul><li>&nbsp;Medical Billing &amp; Coding&nbsp;</li><li>&nbsp;Revenue Cycle Management (RCM)&nbsp;</li><li>&nbsp;Insurance Verification &amp; Authorizations&nbsp;</li><li>&nbsp;Claims Submission &amp; Denial Management&nbsp;</li><li>&nbsp;Credentialing Services&nbsp;</li></ul>',
                'metadata'=> null,
                'order'   => 5,
            ],
            [
                'page'    => 'privacy',
                'section' => 'Information_ We_ Collect',
                'title'   => 'Information We Collect',
                'subtitle'=> null,
                'content' => '<p>Contact and business information&nbsp;</p><p>Healthcare data (as required for billing) &nbsp;</p><p>Technical data (IP, device, browser)&nbsp;</p>',
                'metadata'=> null,
                'order'   => 6,
            ],
            [
                'page'    => 'privacy',
                'section' => 'How_We_Use_Information',
                'title'   => 'How We Use Information',
                'subtitle'=> null,
                'content' => '<p>To deliver billing and RCM services&nbsp;</p><p>To communicate with clients&nbsp;</p><p>To meet legal and compliance requirements&nbsp;</p>',
                'metadata'=> null,
                'order'   => 7,
            ],
            [
                'page'    => 'privacy',
                'section' => 'Data_Security',
                'title'   => 'Data Security',
                'subtitle'=> null,
                'content' => '<p>We implement strong safeguards to protect sensitive data, including <strong>Protected Health Information (PHI)</strong>, in line with HIPAA standards.</p>',
                'metadata'=> null,
                'order'   => 8,
            ],
            [
                'page'    => 'privacy',
                'section' => 'Contact_Us',
                'title'   => 'Contact Us',
                'subtitle'=> null,
                'content' => '<p>&#128231; <a href="mailto:billing@dbillers.com"><span style="text-decoration: underline;">billing@dbillers.com</span></a></p><p>&#127760; <a href="http://www.dbillers.com"><span style="text-decoration: underline;">www.dbillers.com</span></a></p>',
                'metadata'=> null,
                'order'   => 9,
            ],

            // ══════════════════════════════════════════
            // TERMS PAGE
            // ══════════════════════════════════════════
            [
                'page'    => 'terms',
                'section' => 'hero',
                'title'   => 'Terms & Conditions',
                'subtitle'=> 'Last updated: May 06, 2026',
                'content' => '<h2><strong>Terms &amp; Conditions</strong></h2><p>Welcome to <strong>Dbillers Medical Billing Services</strong> (\u201cDbillers,\u201d \u201cwe,\u201d \u201cus,\u201d or \u201cour\u201d). By using our website or services, you agree to these terms. If anything here doesn\u2019t work for you, we recommend not using our services.</p><h2><strong>Who We Are</strong></h2><p>At <strong>Dbillers</strong>, the \u201cD\u201d stands for <strong>Doctors</strong>. Our goal is simple: help healthcare providers run smoother, get paid faster, and reduce billing headaches. We focus on building long-term, reliable partnerships.</p>',
                'metadata'=> '{"meta_title": "Terms of Service | DBillers Medical Billing", "meta_description": "Read DBillers terms of service for using our website and medical billing services. Learn about our commitment to transparency and quality RCM.", "meta_keywords": "terms of service, terms and conditions, medical billing terms, legal agreement, RCM service terms", "og_title": "Terms of Service | DBillers", "og_description": "DBillers terms of service for medical billing and RCM services."}',
                'order'   => 1,
            ],
            [
                'page'    => 'terms',
                'section' => 'acceptance',
                'title'   => null,
                'subtitle'=> null,
                'content' => '<p>Welcome to <strong>Dbillers Medical Billing Services</strong> (\u201cDbillers,\u201d \u201cwe,\u201d \u201cus,\u201d or \u201cour\u201d). By using our website or services, you agree to these terms. If anything here doesn\u2019t work for you, we recommend not using our services.</p>',
                'metadata'=> null,
                'order'   => 2,
            ],
            [
                'page'    => 'terms',
                'section' => 'services',
                'title'   => 'Who We Are',
                'subtitle'=> null,
                'content' => '<p>At <strong>Dbillers</strong>, the \u201cD\u201d stands for <strong>Doctors</strong>. Our goal is simple: help healthcare providers run smoother, get paid faster, and reduce billing headaches. We focus on building long-term, reliable partnerships.</p>',
                'metadata'=> null,
                'order'   => 3,
            ],
            [
                'page'    => 'terms',
                'section' => 'user_obligations',
                'title'   => 'Using Our Services',
                'subtitle'=> null,
                'content' => '<p>We provide medical billing and administrative support to healthcare providers. By working with us, you agree to:</p><ul><li>&nbsp;Use our services in a legal and professional way&nbsp;</li><li>&nbsp;Share accurate and complete information&nbsp;</li><li>&nbsp;Avoid any misuse or unauthorized access&nbsp;</li></ul><p>If these terms aren\u2019t followed, we may have to pause or stop services.</p>',
                'metadata'=> null,
                'order'   => 4,
            ],
            [
                'page'    => 'terms',
                'section' => 'limitation',
                'title'   => 'Accounts & Access',
                'subtitle'=> null,
                'content' => '<p>If we provide you with access to any system:</p><ul><li>&nbsp;Keep your login details secure&nbsp;</li><li>&nbsp;You\u2019re responsible for activity under your account&nbsp;</li><li>&nbsp;Let us know immediately if something seems off&nbsp;</li></ul>',
                'metadata'=> null,
                'order'   => 5,
            ],
            [
                'page'    => 'terms',
                'section' => 'governing_law',
                'title'   => 'What We Do',
                'subtitle'=> null,
                'content' => '<p>Our services include:</p><ul><li>&nbsp;Medical billing and coding&nbsp;</li><li>&nbsp;Revenue Cycle Management (RCM)&nbsp;</li><li>&nbsp;Insurance verification and authorizations&nbsp;</li><li>&nbsp;Denial management and AR follow-up&nbsp;</li><li>&nbsp;Credentialing and payer enrollment&nbsp;</li></ul><p>Every client is different, so exact services and timelines are always outlined in your agreement with us.</p>',
                'metadata'=> null,
                'order'   => 6,
            ],
            [
                'page'    => 'terms',
                'section' => 'Payments_Pricing',
                'title'   => 'Payments & Pricing',
                'subtitle'=> null,
                'content' => '<p>We keep things transparent:</p><ul><li>&nbsp;No hidden fees&nbsp;</li><li>&nbsp;Clear pricing before we start&nbsp;</li></ul><p>We may work on:</p><ul><li>&nbsp;A percentage of collections&nbsp;</li><li>&nbsp;Fixed or custom pricing&nbsp;</li></ul><p>Unless agreed otherwise, payments are non-refundable.</p>',
                'metadata'=> null,
                'order'   => 7,
            ],
            [
                'page'    => 'terms',
                'section' => 'DataProtection_HIPAA',
                'title'   => 'Data Protection & HIPAA',
                'subtitle'=> null,
                'content' => '<p>We understand how sensitive healthcare data is. Dbillers follows <strong>HIPAA-compliant practices</strong> where required and signs <strong>BAA agreements</strong> with clients.</p><p>We take data security seriously and only allow access to authorized team members.</p>',
                'metadata'=> null,
                'order'   => 8,
            ],
            [
                'page'    => 'terms',
                'section' => 'Working_with_other_plateforms',
                'title'   => 'Working with Other Platforms',
                'subtitle'=> null,
                'content' => '<p>Sometimes we use third-party tools (like clearinghouses or billing software) to get the job done. We choose reliable partners, but we can\u2019t control their systems or performance.</p>',
                'metadata'=> null,
                'order'   => 9,
            ],
            [
                'page'    => 'terms',
                'section' => 'Communication',
                'title'   => 'Communication (Including SMS)',
                'subtitle'=> null,
                'content' => '<p>To keep things running smoothly, we may contact you through:</p><ul><li>&nbsp;Email&nbsp;</li><li>&nbsp;Phone&nbsp;</li><li>&nbsp;SMS (for updates, alerts, or verification)&nbsp;</li></ul><p>Message frequency may vary, and standard charges may apply. You can opt out anytime by replying <strong>STOP</strong>.</p>',
                'metadata'=> null,
                'order'   => 10,
            ],
            [
                'page'    => 'terms',
                'section' => 'No_Guarantees',
                'title'   => 'No Guarantees',
                'subtitle'=> null,
                'content' => '<p>We always aim for the best results, but:</p><ul><li>&nbsp;Insurance payments depend on payers&nbsp;</li><li>&nbsp;Timelines can vary&nbsp;</li></ul><p>So while we work hard, we can\u2019t guarantee specific outcomes.</p>',
                'metadata'=> null,
                'order'   => 11,
            ],
            [
                'page'    => 'terms',
                'section' => 'Limitation_Liability',
                'title'   => 'Limitation of Liability',
                'subtitle'=> null,
                'content' => '<p>Dbillers won\u2019t be responsible for:</p><ul><li>&nbsp;Insurance denials or delays&nbsp;</li><li>&nbsp;Indirect or unexpected losses&nbsp;</li><li>&nbsp;Issues caused by third-party systems&nbsp;</li></ul>',
                'metadata'=> null,
                'order'   => 12,
            ],
            [
                'page'    => 'terms',
                'section' => 'Service_Suspension',
                'title'   => 'Service Suspension',
                'subtitle'=> null,
                'content' => '<p>If there\u2019s misuse, missing information, or non-compliance, we may pause or stop services. We\u2019ll always try to communicate first.</p>',
                'metadata'=> null,
                'order'   => 13,
            ],
            [
                'page'    => 'terms',
                'section' => 'Privacy_Matters',
                'title'   => 'Privacy Matters',
                'subtitle'=> null,
                'content' => '<p>We respect your trust:</p><ul><li>&nbsp;We don\u2019t sell your data&nbsp;</li><li>&nbsp;We protect your information&nbsp;</li></ul><p>For more details, please see our Privacy Policy.</p>',
                'metadata'=> null,
                'order'   => 14,
            ],
            [
                'page'    => 'terms',
                'section' => 'Need_Assistance?',
                'title'   => 'Need Assistance?',
                'subtitle'=> null,
                'content' => '<p>We\'re always here to support you.</p><p>&#128231; <a href="mailto:billing@dbillers.com">billing@dbillers.com</a><br> &#127760; <a href="http://www.dbillers.com"><span style="text-decoration: underline;">www.dbillers.com</span></a></p>',
                'metadata'=> null,
                'order'   => 15,
            ],
        ];

        foreach ($contents as $row) {
            DB::table('page_contents')->updateOrInsert(
                ['page' => $row['page'], 'section' => $row['section']],
                [
                    'title'     => $row['title'] ?? null,
                    'subtitle'  => $row['subtitle'] ?? null,
                    'content'   => $row['content'] ?? null,
                    'image_url' => $row['image_url'] ?? null,
                    'metadata'  => $row['metadata'] ?? null,
                    'order'     => $row['order'],
                    'is_active' => true,
                    'updated_at'=> now(),
                ]
            );
        }
    }
}
