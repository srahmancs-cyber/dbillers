<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MbcPageSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'section'  => 'hero',
                'title'    => 'Medical Billing Consulting Service',
                'subtitle' => 'Expert Billing Consultants for Healthcare Providers Across the USA',
                'content'  => '<p>DBillers is a Medical Billing Help Company offering medical billing consulting services. Our professional billing consultants work side-by-side with healthcare providers to help them achieve billing success. We immerse ourselves in your practice to pinpoint opportunities for reducing denials and speeding up payments.</p><p>Our medical billing consulting group provides the strategic guidance and tactical support needed to optimize billing processes, technology, and staff skills. With our consultancy solutions, every practice is positioned to thrive through improved medical billing.</p>',
                'image_url'=> null,
                'metadata' => json_encode([
                    'meta_title'       => 'Medical Billing Consulting Services | Expert RCM Consultants | DBillers',
                    'meta_description' => 'DBillers offers expert medical billing consulting services to optimize your revenue cycle, reduce denials, and maximize reimbursements. Get a free consultation today.',
                    'meta_keywords'    => 'medical billing consulting, billing consultant, RCM consulting, medical billing help, billing advisory services',
                    'og_title'         => 'Medical Billing Consulting | DBillers',
                    'og_description'   => 'Expert medical billing consultants helping healthcare providers reduce denials and maximize revenue.',
                ]),
                'order' => 1,
            ],
            [
                'section'  => 'three_pillars',
                'title'    => 'What Our Consulting Delivers',
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'pillars' => [
                        [
                            'icon'        => 'fa-chart-line',
                            'title'       => 'Optimized RCM',
                            'description' => "DBillers' medical billing consultancy service optimizes the revenue cycle end-to-end to accelerate patient intake, expedite claims, and maximize collections. The result? More cash on hand, lower expenses, and happier patients.",
                        ],
                        [
                            'icon'        => 'fa-dollar-sign',
                            'title'       => 'Increased Revenue',
                            'description' => "DBillers' medical billing consultation group works closely with health centers to guarantee claims are submitted properly. With reimbursements coming in \"full\" and \"on time\", health facilities thrive. As consultants, we enable long-term revenue growth.",
                        ],
                        [
                            'icon'        => 'fa-bolt',
                            'title'       => 'Fast Claim Processing',
                            'description' => "DBillers' medical billing consulting solutions optimize doctor's cash flow. Our consultants identify issues delaying payments and provide electronic claim processing solutions for faster payouts.",
                        ],
                    ],
                ]),
                'order' => 2,
            ],
            [
                'section'  => 'why_choose',
                'title'    => "DBillers' Medical Billing Consulting Service Gets Doctors Paid On Time",
                'subtitle' => 'Why Choose Us',
                'content'  => '<p>DBillers medical billing consulting company has subject-matter experts for every specialty\'s billing and coding workflows. By leveraging efficient claim filing, precise coding, vigilant A/R follow-up, mastery of ICD-10 billing, and proper auditing – DBillers\' medical billing audit consultants help healthcare providers receive every dollar they\'ve earned when they\'ve earned it.</p><p>We assist practices large and small in overcoming lost, delayed, or underpaid claims. Engage our 24/7 medical billing and coding consultancy for the medical billing help your practice needs.</p>',
                'image_url'=> null,
                'metadata' => json_encode([
                    'reasons' => [
                        'Help providers get paid and provide better patient care',
                        'Improve cash flow by speeding up claims payments',
                        'Identify and resolve any billing issues that may be delaying payments',
                        'Reduce administrative burdens by automating claim processing',
                        'Avoid revenue leakage by identifying and correcting any errors in billing',
                        'Help practices meet compliance and regulatory requirements',
                        'Reduce claim processing time for quick reimbursements',
                        'Reduce the costs of hiring and training a medical biller',
                        'Zero out the cost of buying expensive medical billing software',
                    ],
                ]),
                'order' => 3,
            ],
            [
                'section'  => 'what_we_offer',
                'title'    => "DBillers' Top Rated Billing Consultancy Group Is Here for Medical Billing Help",
                'subtitle' => 'What Do We Offer',
                'content'  => '<p>Our billing teams are more than just billers. We are every USA provider\'s best-managed billing partner. Our medical billing advocates partner with physicians to improve their practice management and achieve sustainable growth.</p>',
                'image_url'=> null,
                'metadata' => json_encode([
                    'offerings' => [
                        [
                            'icon'  => 'fa-file-chart-column',
                            'title' => 'Detailed Analysis and Bill Reporting',
                            'items' => [
                                'Reporting on RVU to calculate the value of medical services',
                                'Clearing up hidden glitches for better revenue collection',
                                'Ensuring on-demand availability of latest billing reports',
                                'Providing detailed billing reports',
                            ],
                        ],
                        [
                            'icon'  => 'fa-handshake',
                            'title' => 'Proper Service Level Agreements',
                            'items' => [
                                'Dealing with payment posting for healthy cash flow',
                                'Doing charge entry for service payments',
                                'Reviewing denials with quick clear-ups',
                                'Creating specialty-specific SLA reports',
                                'Tracking accounts receivable aging',
                            ],
                        ],
                        [
                            'icon'  => 'fa-magnifying-glass-chart',
                            'title' => 'Revenue Leakage Fix',
                            'items' => [
                                'Identifying and resolving errors',
                                'Coding medical records',
                                'Benchmarking the coding',
                                'Auditing medical records',
                            ],
                        ],
                        [
                            'icon'  => 'fa-users',
                            'title' => 'Best Billing Associates',
                            'items' => [
                                'Modern technology for fast claim processing',
                                'Medical billing with 24/7 physician support',
                                'Ensuring correct patient billing',
                                'Maximizing Clean Billing Claims %',
                                'Appealing on denied claims',
                                'Keeping the provider in loop',
                            ],
                        ],
                        [
                            'icon'  => 'fa-stethoscope',
                            'title' => 'Specialty Specific Specialization',
                            'items' => [
                                'Staying updated on the latest changes in healthcare regulations',
                                'Offering tailor-made solutions to small and medium practices',
                                'Providing comprehensive services for improved bottom line',
                                'Resolving RCM-related challenges for every specialty',
                                'Supporting medical practitioners of all specialties',
                            ],
                        ],
                    ],
                ]),
                'order' => 4,
            ],
            [
                'section'  => 'smart_billing',
                'title'    => "Maximize Your Clinic's Revenue with DBillers' Smart Billing Advisory Services",
                'subtitle' => null,
                'content'  => '<p>Healthcare providers turn to DBillers for medical billing consulting mastery. Our consultancy helps clients gain control of their revenue cycle management, including patient billing, collections, denials management, and accounts receivable. DBillers guides you to revenue growth through its customized consulting services.</p>',
                'image_url'=> null,
                'metadata' => json_encode([
                    'services' => [
                        [
                            'icon'        => 'fa-hospital',
                            'title'       => 'Medicare Billing Services',
                            'description' => 'Medicare billing is complex, but profitability is simple with our consultants. We combine billing expertise with practice-specific revenue solutions. The result? Maximum, hassle-free Medicare reimbursements. Let us design a roadmap to financial success for your practice.',
                        ],
                        [
                            'icon'        => 'fa-id-card',
                            'title'       => 'Provider Enrollment Consultancy',
                            'description' => "DBillers' superior medical billing consulting service knows the difficulties of provider enrollment firsthand. We aid practices in joining insurance networks, steering applications, credentialing, and payor contract negotiations.",
                        ],
                        [
                            'icon'        => 'fa-file-invoice',
                            'title'       => 'Reimbursement Forms Filing Support',
                            'description' => 'File claims confidently with our CMS reimbursement consultants. Our billing experts provide personalized guidance on CMS 1500 and UB-04 forms, code auditing, and timely submission.',
                        ],
                        [
                            'icon'        => 'fa-laptop-medical',
                            'title'       => 'EHR Adoption and Integration',
                            'description' => "As certified EHR implementation specialists, DBillers' 24/7 medical billing consultants advise on system selection, data migration, and workflow redesign to facilitate seamless EHR adoption.",
                        ],
                    ],
                ]),
                'order' => 5,
            ],
            [
                'section'  => 'stats',
                'title'    => "DBillers' Medical Billing Consultancy Benefits",
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'stats' => [
                        ['value' => '97.35%', 'label' => 'Claim Approval'],
                        ['value' => '98.17%', 'label' => 'Fast Reimbursements'],
                        ['value' => '98.44%', 'label' => 'Payer-Provider-Patient Satisfaction'],
                        ['value' => '98.89%', 'label' => 'Overall Score'],
                    ],
                ]),
                'order' => 6,
            ],
            [
                'section'  => 'dedicated_consultant',
                'title'    => "Get a Dedicated Billing Consultant For Your Clinic's Revenue Cycle Management",
                'subtitle' => null,
                'content'  => "<p>Medical billing can be prone to errors, delays, and inefficiencies that affect your cash flow and profitability. DBillers' billing associates streamline your clinic's billing process by taking care of the entire RCM with real-time reports and analytics.</p>",
                'image_url'=> null,
                'metadata' => null,
                'order' => 7,
            ],
            [
                'section'  => 'benefits',
                'title'    => 'Benefits Of Choosing DBillers Medical Billing Consultation Service',
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'benefits' => [
                        ['icon' => 'fa-chart-bar',         'title' => 'KPI Dashboard',          'description' => 'Get visibility into key performance indicators such as copays collected and accounts receivable per payer.'],
                        ['icon' => 'fa-chart-line',        'title' => 'Revenue Monitoring',     'description' => "Track your practice's revenue by monitoring patient and insurance payments, as well as identify trends and track financial progress."],
                        ['icon' => 'fa-scale-balanced',    'title' => 'Patient Balancing',      'description' => 'Send reminder notices to patients with overdue payments and collect outstanding balances to reduce owed money.'],
                        ['icon' => 'fa-shield-check',      'title' => 'Automated Validation',   'description' => "The system checks a patient's insurance benefits at check-in to avoid billing surprises. Patients are prompted to pay co-pays at this time."],
                        ['icon' => 'fa-gauge-high',        'title' => 'Performance Metrics',    'description' => "Get a quick overview of your practice's financial performance and create performance initiatives to improve your practice at scale."],
                        ['icon' => 'fa-file-invoice-dollar','title' => 'Bills Collection',      'description' => 'Get a summary of your medical bills including status (paid, denied, in process, rejected). Our experts will follow up and provide one-click support.'],
                        ['icon' => 'fa-robot',             'title' => 'AI Workflow',            'description' => 'An AI-powered billing rules engine automatically detects and corrects errors in medical claims, ensuring faster payments and higher reimbursement rates.'],
                        ['icon' => 'fa-brain',             'title' => 'Intelligent Billing',    'description' => 'Smart billing with a well-defined charge coding means accurate and compliant superbills with zero chances of up/down coding.'],
                        ['icon' => 'fa-gavel',             'title' => 'Compliance Driven',      'description' => 'AI-charged algorithms recommend the appropriate E&M level, and identify and prevent medical fraud abuse to eliminate the need for a separate coder.'],
                    ],
                ]),
                'order' => 8,
            ],
            [
                'section'  => 'coding_consultants',
                'title'    => 'Hire Medical Coding Consultants and Avoid Unfair Medicare Reimbursement Cuts',
                'subtitle' => 'Get Fairly Paid Every Time',
                'content'  => '<p>Physicians can benefit from the medical coding consultation offered by DBillers. This is because our medical coding consultancy services improve coding accuracy, reduce denials, expedite reimbursement, and boost cash flow. We do this by focusing on customizing services for each practice and addressing pain points with tailored solutions.</p>',
                'image_url'=> null,
                'metadata' => json_encode([
                    'features' => [
                        [
                            'icon'        => 'fa-magnifying-glass',
                            'title'       => 'Proper Claim Scrubbing',
                            'description' => 'Certified clinical coders scrub codes to identify and correct errors in claims. Our proprietary tools analyze patient statements to identify areas where providers can improve their billing practices.',
                        ],
                        [
                            'icon'        => 'fa-database',
                            'title'       => 'Knowledge Base Automation (KBA)',
                            'description' => 'Our KBA systems are trained on a large knowledge of medical billing data, allowing them to automatically scrutinize medical bills for errors before they are sent to the payer.',
                        ],
                        [
                            'icon'        => 'fa-user-tie',
                            'title'       => 'Dedicated Account Management',
                            'description' => 'An organized collections policy ensures accurate billing processes. Our platform merges charting, billing, scheduling, and telehealth services in the cloud.',
                        ],
                    ],
                ]),
                'order' => 9,
            ],
            [
                'section'  => 'partners',
                'title'    => "We're your partners in success.",
                'subtitle' => null,
                'content'  => "<p>DBillers is here to help you achieve practice success. Our billing experts have deep knowledge of the medical billing and coding regulations for all specialties, and we use the latest technology to ensure accurate claim processing with quick payments.</p>",
                'image_url'=> null,
                'metadata' => json_encode([
                    'features' => [
                        [
                            'icon'        => 'fa-headset',
                            'title'       => '24/7 Medical Billers Support',
                            'description' => 'Our dedicated account managers are available 24/7 to provide you with personal attention and support. They work with you to ensure that your claims are processed correctly and on time.',
                        ],
                        [
                            'icon'        => 'fa-map-location-dot',
                            'title'       => 'Out of State Medicaid Billing',
                            'description' => 'We understand the complexities of billing out-of-state Medicaid and can help you navigate the process to ensure you get paid.',
                        ],
                        [
                            'icon'        => 'fa-network-wired',
                            'title'       => 'Clearinghouse Support',
                            'description' => 'Our medical coding consultants have engineered a high-performance clearinghouse connecting seamlessly to top insurers such as Aetna, UnitedHealthcare, and Blue Cross Blue Shield.',
                        ],
                    ],
                ]),
                'order' => 10,
            ],
            [
                'section'  => 'final_cta',
                'title'    => 'Reduce Billing Claim Denials and Boost Your Medical Revenue Up to 30%',
                'subtitle' => null,
                'content'  => "<p>Claim denials are a major source of lost revenue for healthcare providers. DBillers' medical billing consulting service prevents these errors by ensuring claim submission that's compliant with payer rules and regulations.</p>",
                'image_url'=> null,
                'metadata' => null,
                'order' => 11,
            ],
        ];

        foreach ($rows as $row) {
            DB::table('page_contents')->updateOrInsert(
                ['page' => 'mbc', 'section' => $row['section']],
                [
                    'title'      => $row['title'],
                    'subtitle'   => $row['subtitle'],
                    'content'    => $row['content'],
                    'image_url'  => $row['image_url'],
                    'metadata'   => $row['metadata'],
                    'order'      => $row['order'],
                    'is_active'  => true,
                    'updated_at' => now(),
                ]
            );
        }
    }
}
