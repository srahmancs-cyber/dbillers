<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RcmPageSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'section'  => 'hero',
                'title'    => 'Healthcare Revenue Cycle Management Services',
                'subtitle' => 'Complete RCM Solutions for US Healthcare Providers',
                'content'  => '<p>DBillers Medical Revenue Service generates and collects payments for the services a provider delivers to their patients. It is a complete RCM solution managing end-to-end RCM operations such as patient registration, insurance verification, coding, billing, and collections. Our RCM billing company optimizes the revenue cycle for better financial outcomes for any physician\'s medical center.</p>',
                'image_url'=> null,
                'metadata' => json_encode([
                    'meta_title'       => 'Healthcare Revenue Cycle Management (RCM) Services | DBillers',
                    'meta_description' => 'DBillers offers complete end-to-end Revenue Cycle Management (RCM) services — billing, coding, denial management, and AR recovery for US healthcare providers. Get a free RCM audit.',
                    'meta_keywords'    => 'revenue cycle management, RCM services, medical billing RCM, healthcare RCM company, RCM billing company, end to end RCM',
                    'og_title'         => 'Healthcare Revenue Cycle Management | DBillers',
                    'og_description'   => 'Complete RCM solutions for US healthcare providers. Billing, coding, collections, and denial management starting at 2% of collections.',
                ]),
                'order'    => 1,
            ],
            [
                'section'  => 'why_choose',
                'title'    => 'Importance of Choosing DBillers Revenue Cycle Management Service in Medical Billing',
                'subtitle' => null,
                'content'  => '<p>Managing a medical practice\'s finances is complex. Between evolving regulations, strict insurance policies, and patients with ever-increasing expectations, it is a recipe for revenue leakage, cash flow problems, and operational chaos.</p><p>Luckily, the medical revenue cycle management (RCM) experts at DBillers can restore your practice to full financial health. Our certified coders ensure accurate billing and coding to stop revenue leakage. Our enrollment specialists secure contracts with top commercial payers to expand your patient pool. And our billing experts work diligently to collect every dollar your practice earns.</p><p>So don\'t let medical finances frustrate you. DBillers Medical Revenue Service has the cure for what ails your practice\'s finances. Contact us today to experience how we align a provider\'s whole revenue cycle process to maximize collections while delighting patients.</p>',
                'image_url'=> null,
                'metadata' => json_encode([
                    'badges' => ['Certified Coders', 'HIPAA Compliant', 'US-Based Team', '99% Clean Claim Rate', 'Pay-For-Paid Model'],
                ]),
                'order'    => 2,
            ],
            [
                'section'  => 'audit_cta',
                'title'    => 'You are a professional in your field. But are you getting paid like one?',
                'subtitle' => 'We help practices achieve record revenue growth of up to 30%. Claim your FREE practice audit to learn more.',
                'content'  => null,
                'image_url'=> null,
                'metadata' => null,
                'order'    => 3,
            ],
            [
                'section'  => 'billing_core',
                'title'    => 'DBillers offers revenue cycle care, with billing at its core',
                'subtitle' => null,
                'content'  => '<p>Our unique approach to medical billing is how DBillers RCM Service delivers measurable improvements to the revenue cycle process. The SmartClaim system we developed in-house analyzes billing codes and clinical documentation to catch issues before claim submission. This technology achieves first-time acceptance rates upwards of 98%, putting money back in our providers\' pockets faster.</p>',
                'image_url'=> null,
                'metadata' => null,
                'order'    => 4,
            ],
            [
                'section'  => 'coding',
                'title'    => 'Achieve revenue cycle success via DBillers coding excellence',
                'subtitle' => null,
                'content'  => '<p>DBillers\' medical revenue service boosts revenue cycles through expert medical coding. Our acclaimed DBCoding technology reviews medical charts and identifies high-value codes. Our coders, armed with CPC certifications, then examine each chart to find revenue escalation opportunities that algorithms miss. Through this man-machine symbiosis, DBillers delivers an RCM solution that promises more revenue for your healthcare facility.</p>',
                'image_url'=> null,
                'metadata' => null,
                'order'    => 5,
            ],
            [
                'section'  => 'audit_insight',
                'title'    => "Optimize your revenue via DBillers' audit and insight",
                'subtitle' => null,
                'content'  => '<p>Our audit specialists utilize the DBillers Revenue Integrity process to analyze your current revenue cycle, uncovering exactly where coding and billing improvements will have the biggest impact. Our billing consultants then design targeted solutions to resolve those defects. We treat your revenue cycle as a whole and prescribe the best healthcare revenue cycle management remedies to make it stronger.</p>',
                'image_url'=> null,
                'metadata' => null,
                'order'    => 6,
            ],
            [
                'section'  => 'roi_case_study',
                'title'    => 'RCM ROI Case Study',
                'subtitle' => 'Real Numbers: What DBillers RCM Delivers vs. In-House Billing',
                'content'  => null,
                'image_url'=> null,
                'metadata' => null,
                'order'    => 7,
            ],
            [
                'section'  => 'features',
                'title'    => 'End-to-End RCM Service Features by DBillers',
                'subtitle' => 'You have nothing to lose and everything to gain with DBillers Medical Revenue Cycle Management features.',
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'features' => [
                        ['icon'=>'fa-file-invoice','title'=>'Charge Entry','items'=>['Claim creation, validation, and transmission','Entering valid super-bill information','Claim approval confirmation','Claim status tracking']],
                        ['icon'=>'fa-money-bill-transfer','title'=>'Remittance Processing','items'=>['Processing of payments from the payers','Processing of adjustments and denials','Reconciling payments to the provider\'s claims']],
                        ['icon'=>'fa-phone','title'=>'Insurance Follow-Up','items'=>['Following up with payers for unpaid claims','Following up with payers for underpaid claims','Contacting payers on a provider\'s behalf','Negotiating and resolving claim disputes']],
                        ['icon'=>'fa-chart-bar','title'=>'KPI Reporting & Analytics','items'=>['Monitors your key performance indicators','Analyzes days in accounts receivable','Analyzes claim denial rate and collection rate','Advanced data visualization tools']],
                        ['icon'=>'fa-users','title'=>'Patient Collections','items'=>['Collecting patient payments','Managing initial statement and final notice','Sending clean bills and reminders to patients','Convenient payment options for patients']],
                        ['icon'=>'fa-clock-rotate-left','title'=>'A/R Management','items'=>['Reduces the aging of outstanding A/R','A/R workflow optimization','Claim approval confirmation','Collecting A/R collections from payers and patients']],
                        ['icon'=>'fa-code','title'=>'Coding and Documentation','items'=>['Coding provider\'s services compliantly','Using the latest coding standards and guidelines','Capturing relevant details that support claims','Performing medical bill audits']],
                        ['icon'=>'fa-circle-dollar-to-slot','title'=>'Charge Capture Feature','items'=>['Capturing and validating service charges','Leveraging charge sheets and EHRs','Ensuring charges are consistent with coding','Reconciling charges with contractual agreements']],
                        ['icon'=>'fa-file-contract','title'=>'Contract Management','items'=>['Managing contractual agreements with payers','Reviewing and negotiating your contracts','Monitoring contract compliance','Analyzing contract performance metrics']],
                    ],
                ]),
                'order'    => 8,
            ],
            [
                'section'  => 'seal_cracks',
                'title'    => 'Let DBillers RCM Service seal cracks in your revenue cycle',
                'subtitle' => null,
                'content'  => 'We identify opportunities to boost your revenue through enhanced billing, coding, denial management, and more.',
                'image_url'=> null,
                'metadata' => null,
                'order'    => 9,
            ],
            [
                'section'  => 'solutions',
                'title'    => "DBillers RCM Medical Billing Has Got The Solutions For Providers' Revenue Growth",
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'solutions' => [
                        ['problem'=>'Poor Cash Flow','solution'=>'DBillers reduces bad debt and underpayments by ensuring accurate and timely claim submission and follow-up.'],
                        ['problem'=>'Mishandled A/R','solution'=>'Our healthcare RCM solution provides visibility into A/R performance, such as days in A/R, A/R aging, and A/R turnover.'],
                        ['problem'=>'Misaligned Payer Compatibility','solution'=>'Our flexible and scalable RCM platform adapts to changing payer requirements and maximizes provider reimbursements.'],
                        ['problem'=>'High Denial Rates','solution'=>'Our proactive and preventive approach resolves the root causes of denials to boost denial recovery rates and revenue integrity.'],
                        ['problem'=>'More Admin Workload','solution'=>'Our RCM experts and EHR platform automate manual work and perform claim submission with utmost accuracy.'],
                        ['problem'=>'Unsatisfied Patients','solution'=>'Our RCM service offers a patient-centric platform to improve the patient-payer relationship via telehealth features.'],
                        ['problem'=>'Complicated Patient Management','solution'=>'Our medical billing platform automatically estimates and communicates the patient\'s out-of-pocket costs before the service.'],
                    ],
                ]),
                'order'    => 10,
            ],
            [
                'section'  => 'reporting',
                'title'    => 'Choose DBillers RCM Billing Company For Complete RCM Reporting',
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'features' => [
                        ['icon'=>'fa-chart-pie','title'=>'Data Insights','desc'=>'See key metrics and trends of the revenue billing process in a comprehensive and interactive analytics dashboard. You can compare your performance with industry benchmarks and identify areas for improvement.'],
                        ['icon'=>'fa-comments','title'=>'Quick Feedback','desc'=>'Communicate with our RCM experts, your patients, and insurance payers instantly through an integrated chat system. You can ask questions, share feedback, and resolve issues in real time.'],
                        ['icon'=>'fa-file-lines','title'=>'Detailed Reports','desc'=>'Drill down into the details of your revenue cycle with customizable and granular reports. You can filter, sort, and export your medical billing data according to your needs and preferences.'],
                        ['icon'=>'fa-hospital','title'=>'Multi-Specialty Support','desc'=>'Manage multiple facilities and locations with our RCM reporting dashboard. You can view and compare data from different sites and groups in one place with a dedicated dashboard for each specialty.'],
                        ['icon'=>'fa-shield-halved','title'=>'Data Security','desc'=>'You can rest assured that your data is safe and secure. We use the latest encryption and authentication technologies to protect your data from unauthorized access and breaches.'],
                        ['icon'=>'fa-plug','title'=>'Data Integration','desc'=>'Integrate your data with other systems and platforms using DBillers\' RCM reporting dashboard. We support various formats and standards to ensure seamless data exchange and interoperability.'],
                    ],
                ]),
                'order'    => 11,
            ],
            [
                'section'  => 'testimonials',
                'title'    => 'What Healthcare Providers Say About Us',
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'testimonials' => [
                        ['stars'=>5,'text'=>'I would like to send out a heartfelt appreciation for all of your hard work in helping my health counseling clinic take care of our billing and credentialing needs. You have made my job as a practice owner much easier.','author'=>'Dr. Julia Will','role'=>'Licensed Professional Counselor'],
                        ['stars'=>5,'text'=>'We are more than satisfied with DBillers and would highly recommend them to anyone searching for an efficient billing company. Working with DBillers has felt effortless and we are vastly thankful for their services.','author'=>'Dr. Gennaya Matt***','role'=>'Plastic Surgeon'],
                        ['stars'=>5,'text'=>'DBillers has been a phenomenal asset to our company. Assisting with billing, credentialing and enrollment, DBillers has been consistently reliable from the first day of our relationship.','author'=>'Dr. Mike Lan***','role'=>'Internal Medicine Specialist'],
                    ],
                ]),
                'order'    => 12,
            ],
            [
                'section'  => 'specialties',
                'title'    => 'Specialties We Serve',
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'specialties' => [
                        'Cardiology','Dermatology','Family Medicine','Hematology','Nephrology',
                        'Neurology','Gynecology','Ophthalmology','Orthopedics','Pediatrics',
                        'Psychiatry','Pulmonology','Radiology','Surgery','Urology',
                    ],
                ]),
                'order'    => 13,
            ],
            [
                'section'  => 'faq',
                'title'    => 'Frequently Asked Questions',
                'subtitle' => null,
                'content'  => null,
                'image_url'=> null,
                'metadata' => json_encode([
                    'faqs' => [
                        ['q'=>'What is revenue cycle management (RCM)?','a'=>'Revenue cycle management is the process of managing the financial aspects of a healthcare provider\'s or facility\'s operations. It involves billing, coding, collecting, and reconciling payments from patients and insurance companies.'],
                        ['q'=>'Why do I need RCM services?','a'=>'Without a robust RCM process, practices lose revenue to claim denials, coding errors, slow collections, and underpayments. DBillers RCM services ensure every dollar earned is collected efficiently.'],
                        ['q'=>'How do you handle claim denials and appeals?','a'=>'Our denial management team identifies root causes, corrects errors, and resubmits claims promptly. We also file formal appeals with detailed supporting documentation to maximize recovery.'],
                        ['q'=>'How do you charge for your RCM services?','a'=>'We work on a pay-for-paid model — a percentage of collections starting as low as 2% depending on your monthly collections volume. No flat fees, no hidden charges.'],
                        ['q'=>'How do you ensure the security and privacy of my data?','a'=>'We sign HIPAA-compliant Business Associate Agreements (BAA) with all clients and use industry-standard encryption and access controls to protect all protected health information (PHI).'],
                        ['q'=>'How do you measure and improve your RCM performance?','a'=>'We provide real-time KPI dashboards tracking clean claim rate, days in A/R, denial rate, and collection rate. Monthly reviews identify areas for further optimization.'],
                        ['q'=>'How can your medical billing company help me with RCM?','a'=>'DBillers is a full-service medical billing company that handles every aspect of your billing process — from coding and claims to payment and follow-up — across any specialty.'],
                    ],
                ]),
                'order'    => 14,
            ],
        ];

        foreach ($rows as $row) {
            DB::table('page_contents')->updateOrInsert(
                ['page' => 'rcm', 'section' => $row['section']],
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
