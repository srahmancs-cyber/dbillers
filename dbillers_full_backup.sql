-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: dbillers_db
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3','i:1;',1776440243),('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1776440243;',1776440243);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_leads`
--

DROP TABLE IF EXISTS `contact_leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_leads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_leads`
--

LOCK TABLES `contact_leads` WRITE;
/*!40000 ALTER TABLE `contact_leads` DISABLE KEYS */;
INSERT INTO `contact_leads` VALUES (1,'testingname','testingemail@gmail.com','234242342','testingmessage','unread','2026-04-10 06:11:23','2026-04-10 06:11:23'),(2,'testingname','srahmancs@gmail.com','2342342342','testingmessage','read','2026-04-10 06:13:29','2026-04-10 06:19:29'),(3,'srahmancs@gmail.com','srahmancs@gmail.com','srahmancs@gmail.com','srahmancs@gmail.com','unread','2026-04-10 08:42:07','2026-04-10 08:42:07'),(4,'Testing','srahmancs@gmail.com','234234','testing message\n\n--- Selected Challenges ---\nInadequate follow-up on claims and payments\n• Accounts receivable aging past 90/120+ days','unread','2026-04-10 17:08:00','2026-04-10 17:08:00'),(5,'customer adeel','mehfoozbadwani@gmail.com','0343242342342','This is a testing message','unread','2026-04-10 17:20:40','2026-04-10 17:20:40'),(6,'srahmancs','srahmancs@gmail.com','23424','xpseiatioaf','unread','2026-04-10 18:30:42','2026-04-10 18:30:42'),(7,'shahid','srahmancs@gmail.com','2342342432','Specialty: practive name\r\n\r\nmessageis ehre','read','2026-04-10 18:35:31','2026-04-10 19:05:46');
/*!40000 ALTER TABLE `contact_leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_04_10_071900_create_page_contents_table',2),(5,'2026_04_10_071900_create_specialities_table',2),(6,'2026_04_10_071901_create_contact_leads_table',2),(7,'2026_04_10_071901_create_settings_table',2),(8,'2026_04_10_103252_add_role_to_users_table',3),(9,'2026_04_10_201342_add_metadata_to_page_contents_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_contents`
--

DROP TABLE IF EXISTS `page_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `title` text DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_contents`
--

LOCK TABLES `page_contents` WRITE;
/*!40000 ALTER TABLE `page_contents` DISABLE KEYS */;
INSERT INTO `page_contents` VALUES (21,'home','hero','DBillers | Smart Medical Billing for US Healthcare Providers','The Medical Billing Service Provider for USA Healthcare','DBillers is a top US medical billing firm – applying best practices in revenue cycle management and clinical coding. We help physicians outsource billing and coding to an expert third-party agency.',NULL,'{\"buttons\": [{\"text\": \"Book a Free Consultation\", \"url\": \"/contact\", \"icon\": \"fa-arrow-right\"}, {\"text\": \"Free Billing Demo\", \"url\": \"/contact\", \"icon\": \"fa-calendar-alt\"}], \"trust_badges\": [\"1500+ Satisfied Providers\", \"75+ Specialties Served\", \"1200+ Billing & Coding Experts\"], \"floating_icon\": \"fa-chart-line\", \"meta_title\": \"Medical Billing & RCM Services | DBillers for US Healthcare\", \"meta_description\": \"Maximize revenue with DBillers, the precision billing platform for modern medicine. Specialized RCM, coding, and denial management for US doctors. Get a free consultation.\", \"meta_keywords\": \"medical billing services, revenue cycle management, RCM company, claim denial management, medical coding services, healthcare billing solutions\", \"og_title\": \"Medical Billing & RCM Services | DBillers\", \"og_description\": \"Maximize your practice revenue with DBillers. Specialized medical billing and revenue cycle management for US healthcare providers.\"}',1,1,NULL,'2026-04-17 05:24:50'),(22,'home','services_overview','Overview of Medical Billing Services in the USA',NULL,'Medical billing services provide organized solutions that convert clinical data into billable insurance claims.',NULL,'{\"services\":[{\"title\":\"Medical Billing Consultation\",\"description\":\"Expert patient billers handle check-in/out, claims, payments, and denials.\",\"icon\":\"fa-headset\",\"link\":\"/contact\"},{\"title\":\"Medical Coding\",\"description\":\"Clinical coding officers translate patient services into ICD-10 and CPT codes.\",\"icon\":\"fa-code\",\"link\":\"/contact\"},{\"title\":\"Provider Credentialing\",\"description\":\"Credentialing specialists help providers join desirable payer networks.\",\"icon\":\"fa-id-card\",\"link\":\"/contact\"},{\"title\":\"Healthcare RCM\",\"description\":\"Specialty-specific revenue cycle management with a dedicated biller.\",\"icon\":\"fa-chart-pie\",\"link\":\"/contact\"}]}',2,1,NULL,NULL),(23,'home','medical_claims','We Boost Healthcare Income with Quick, Uncut Reimbursements','The Billing Firm That Does Medical Claims Processing','Claim management can be difficult when you need timely submissions and full payment.','https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=500&h=400&fit=crop','{\"features\":[{\"title\":\"Secure Claim Data Transmission\",\"description\":\"Safest digital encryption protects sensitive patient data.\",\"icon\":\"fa-shield-alt\"},{\"title\":\"Increase Revenue\",\"description\":\"Get full payments without unfair insurance network cuts.\",\"icon\":\"fa-chart-line\"},{\"title\":\"Instant Claim Submission\",\"description\":\"Electronic billing service files claims instantly.\",\"icon\":\"fa-bolt\"},{\"title\":\"Claim Follow-Up & Resolution\",\"description\":\"Denied claims are appealed and reprocessed successfully.\",\"icon\":\"fa-clock\"}],\"button_text\":\"Book Free Consultation\",\"button_link\":\"/contact\"}',3,1,NULL,NULL),(24,'home','specialized_agency','When \"Good Enough\" Isn\'t Enough, You Need a Specialized Medical Billing Agency',NULL,'As a leading billing provider, we extract every possible dollar from your claims through 24/7 billing cycle oversight.',NULL,'{\"button_text\":\"Yes, I Want a Free Billing Demo\",\"button_link\":\"/contact\"}',4,1,NULL,NULL),(25,'home','trust_ratings','Trust Your Billing to a Company Ranked Among the Best',NULL,'With a 4.8-star Trustpilot rating from 200+ reviews, a 4.8-star Google rating from 340+ reviews, and an A+ Better Business Bureau rating.',NULL,'{\"stats\":[{\"value\":\"Almost 99%\",\"label\":\"Clean Claim Ratio\"},{\"value\":\"About 97.35%\",\"label\":\"First Submission Pass Rate\"},{\"value\":\"Up to 30%\",\"label\":\"Revenue Increase\"}]}',5,1,NULL,NULL),(26,'home','tech_expertise','Medical Billing That Unites Technology & Expertise to Meet Every Doctor\'s Vision',NULL,'Our USA-based revenue cycle management company helps individual and institutional providers navigate patient billing and coding challenges.',NULL,'{\"tags\":[\"Patient Verification\",\"Claim Scrubbing\",\"Claim Submission\",\"Revenue Cycle Management\",\"A/R Recovery\",\"Fast Reimbursement\"],\"cards\":[{\"icon\":\"fa-smile\",\"value\":\"96%\",\"title\":\"Happiness Score\",\"description\":\"Based on 4.8-star rating from 350+ providers\"},{\"icon\":\"fa-users\",\"value\":\"1,200+\",\"title\":\"Billing Experts\",\"description\":\"CMRS, RHIA, CPB certified billers\"}],\"button_text\":\"About Us\",\"button_link\":\"/about\"}',6,1,NULL,NULL),(27,'home','pricing_offer','Experience Our Medical Billing Services for as Low as 2.49%',NULL,'Over 1,500 medical practices trust DBillers. Let\'s have a chat.',NULL,'{\"features\":[{\"icon\":\"fa-shield-alt\",\"text\":\"Patient insurance coverage verification on the spot\"},{\"icon\":\"fa-lock\",\"text\":\"HIPAA-compliant billing for data safety\"},{\"icon\":\"fa-clock\",\"text\":\"24/7 medical billing to handle every claim submission\"},{\"icon\":\"fa-chart-line\",\"text\":\"98% claim reimbursement rate for healthy cash flow\"}],\"button_text\":\"Book a Demo\",\"button_link\":\"/contact\"}',7,1,NULL,NULL),(28,'home','dedicated_team','Dedicated Accounts Managers & Expert Medical Billers for Health Centers',NULL,'Healthcare organizations are at the heart of our billing and collections team.','https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&h=400&fit=crop','{\"button_text\":\"Claim Free Practice Audit\",\"button_link\":\"/contact\"}',8,1,NULL,NULL),(29,'home','provider_challenges','Which of These Challenges Are You Facing as a Provider?',NULL,NULL,NULL,'{\"challenges\":[\"Inadequate follow-up on claims and payments\",\"Accounts receivable aging past 90/120+ days\",\"Rising patient balances causing financial strain\",\"Frustration due to lack of transparency and reporting\",\"Overall decline in collections impacting practice revenue\"]}',9,1,NULL,NULL),(30,'home','specialty_billing','Specialty Medical Billing',NULL,'Our tailored billing services boost reimbursements through specialty-focused teams.',NULL,'{\"specialties\":[\"Laboratory Billing\",\"Cardiology\",\"Behavioral Health\",\"Orthopedics\",\"Urgent Care\",\"Urology\"]}',10,1,NULL,NULL),(31,'home','nationwide','Nationwide Availability',NULL,'As a top medical billing company in the USA, DBillers helps providers succeed financially across all 50 states.',NULL,'{\"locations\":[\"Chicago\",\"Los Angeles\",\"Alabama\",\"California\",\"Indiana\",\"New York\"]}',11,1,NULL,NULL),(32,'home','pricing_comparison','Affordable Pricing vs. In-House Billing',NULL,'Save compared to internal billing with our affordable 2.49% collections rate.',NULL,'{\"included\":[\"Billing Software\",\"Denial Management\",\"Accounts Management\",\"Electronic Statements\",\"Clearinghouse Services\",\"1:1 Technical Support\"],\"button_text\":\"Get Instant Free Pricing Quote\",\"button_link\":\"/contact\"}',12,1,NULL,NULL),(33,'home','testimonials','See What Healthcare Providers Say About Us',NULL,NULL,NULL,'{\"testimonials\":[{\"stars\":4.5,\"text\":\"DBillers responds to my inquiries within hours, not days.\",\"author\":\"David J. Gel***\",\"role\":\"Chiropractor\"},{\"stars\":5,\"text\":\"We are more than satisfied with DBillers.\",\"author\":\"Dr. Gennaya Matt***\",\"role\":\"Plastic Surgeon\"},{\"stars\":5,\"text\":\"DBillers has been a phenomenal asset to our company.\",\"author\":\"Dr. Mike Lan***\",\"role\":\"Internal Medicine Specialist\"},{\"stars\":5,\"text\":\"My Behavioral Health practice has experienced great improvement.\",\"author\":\"Dr. Belen Bur***\",\"role\":\"Psychiatrist\"}],\"trust_badge\":\"Trusted by 300+ Verified Practices\",\"rating\":\"4.8/5\",\"reviews\":\"354\"}',13,1,NULL,NULL),(34,'home','faq','Frequently Asked Questions',NULL,NULL,NULL,'{\"faqs\":[{\"question\":\"What is a medical billing company?\",\"answer\":\"For a medical practice, billing services handle the logistical details of getting paid by insurance companies and patients.\"},{\"question\":\"What is a medical billing service?\",\"answer\":\"Medical billing services manage every financial touchpoint after a patient visit.\"},{\"question\":\"What services does your company offer?\",\"answer\":\"We offer provider enrollment, insurance verification, charge entry, claim submission, payment posting, accounts receivable management, denial management, appeal management, patient billing, reimbursement tracking, and collections.\"},{\"question\":\"How does your company handle claim reimbursement?\",\"answer\":\"Accurate claim submission is only the beginning. We communicate with payers to shepherd each claim to resolution.\"},{\"question\":\"Can I monitor the performance?\",\"answer\":\"Yes. DBillers lets providers track the caliber and results of their facility\'s billing.\"},{\"question\":\"Do you offer advanced medical billing services?\",\"answer\":\"Yes. We have the people and processes to provide specialized billing for Medicaid and Medicare patients.\"}]}',14,1,NULL,NULL),(35,'home','final_cta','Schedule a Free Demo','Sign up and book a free service demo',NULL,NULL,'{\"buttons\":[{\"text\":\"Free Demo\",\"link\":\"/contact\"},{\"text\":\"See Pricing Packages\",\"link\":\"/contact\"}]}',15,1,NULL,NULL),(36,'about','hero','About DBillers','Trusted Medical Billing Partner for Healthcare Providers Across America','We are a US-based medical billing company dedicated to helping physicians, clinics, and hospitals maximize revenue.',NULL,'{\"button_text\": \"Meet Our Team\", \"button_link\": \"#team\", \"meta_title\": \"About DBillers | Medical Billing Experts for US Healthcare Providers\", \"meta_description\": \"Learn about DBillers, a leading medical billing company helping healthcare providers maximize revenue with expert RCM services since 2015. Trusted by 1500+ providers.\", \"meta_keywords\": \"about DBillers, medical billing company, RCM services, healthcare billing experts, revenue cycle management company\", \"og_title\": \"About DBillers | Medical Billing Experts\", \"og_description\": \"Trusted medical billing experts helping US healthcare providers maximize revenue since 2015.\"}',1,1,NULL,NULL),(37,'about','our_story','Our Story',NULL,'DBillers was founded with a simple mission: help healthcare providers get paid fairly and quickly for the care they deliver.','https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&h=400&fit=crop','{\"stats\":[{\"value\":\"2015\",\"label\":\"Founded\"},{\"value\":\"1,200+\",\"label\":\"Billing Experts\"},{\"value\":\"1,500+\",\"label\":\"Providers\"}]}',2,1,NULL,NULL),(38,'about','mission','Our Mission & Values',NULL,'To empower healthcare providers with transparent, efficient, and results-driven medical billing.',NULL,'{\"values\":[{\"icon\":\"fa-shield-alt\",\"title\":\"Integrity\",\"description\":\"We bill honestly, communicate clearly, and never hide fees.\"},{\"icon\":\"fa-graduation-cap\",\"title\":\"Expertise\",\"description\":\"Continuous training ensures our team knows the latest coding rules.\"},{\"icon\":\"fa-chalkboard-user\",\"title\":\"Accountability\",\"description\":\"We take ownership of your revenue cycle.\"},{\"icon\":\"fa-handshake\",\"title\":\"Partnership\",\"description\":\"Your success is our success.\"}]}',3,1,NULL,NULL),(39,'about','team','The Experts Behind Your Billing',NULL,'Our team includes certified professionals who live and breathe medical billing.',NULL,'{\"stats\":[{\"value\":\"1,200+\",\"label\":\"Certified Billers\"},{\"value\":\"75+\",\"label\":\"Specialties\"},{\"value\":\"24/7\",\"label\":\"Support\"},{\"value\":\"98%\",\"label\":\"Retention\"}],\"button_text\":\"View Credentials\",\"button_link\":\"/contact\"}',4,1,NULL,NULL),(40,'about','why_choose','Why Over 1,500 Providers Trust Us',NULL,NULL,NULL,'{\"reasons\":[\"Pay-for-paid pricing model\",\"No long-term contracts\",\"Free EHR software included\",\"US-based support team\",\"99% clean claim ratio\",\"30% average revenue increase\",\"Dedicated account manager\",\"Transparent monthly reporting\"]}',5,1,NULL,NULL),(41,'about','approach','How We Work',NULL,NULL,NULL,'{\"steps\":[{\"number\":\"1\",\"title\":\"Onboarding\",\"description\":\"We learn your practice workflow, software, and specialty needs.\"},{\"number\":\"2\",\"title\":\"Integration\",\"description\":\"We connect with your EHR or provide our free billing software.\"},{\"number\":\"3\",\"title\":\"Execution\",\"description\":\"Our team handles coding, claims, follow-up, and denials daily.\"},{\"number\":\"4\",\"title\":\"Optimization\",\"description\":\"We review reports monthly and fine-tune for better results.\"}]}',6,1,NULL,NULL),(42,'about','certifications','Certifications & Industry Recognition','We maintain the highest standards in medical billing and data security.',NULL,NULL,'{\"badges\":[\"HIPAA Compliant\",\"A+ BBB Rated\",\"4.8/5 Google Rating\",\"4.8/5 Trustpilot Rating\"],\"trust_text\":\"⭐ Rated 4.8 stars by over 350 verified providers\"}',7,1,NULL,NULL),(43,'about','final_cta','Start Your Journey With DBillers Today','Join hundreds of providers who have improved their revenue cycle.',NULL,NULL,'{\"buttons\":[{\"text\":\"Schedule Free Demo\",\"link\":\"/contact\"},{\"text\":\"Contact Us\",\"link\":\"/contact\"}]}',8,1,NULL,NULL),(44,'services','hero','Medical Billing Services','Comprehensive Revenue Cycle Management for Healthcare Providers','We offer end-to-end medical billing and coding solutions for physicians, clinics, and hospitals across the USA.',NULL,'{\"button_text\": \"Book a Free Consultation\", \"button_link\": \"/contact\", \"meta_title\": \"Medical Billing & Coding Services | RCM Solutions | DBillers\", \"meta_description\": \"Comprehensive medical billing services including coding, claim submission, denial management, and RCM. Maximize your practice revenue with DBillers. Free consultation.\", \"meta_keywords\": \"medical billing services, medical coding, claim submission, denial management services, AR recovery specialists, RCM solutions\", \"og_title\": \"Medical Billing & Coding Services | DBillers\", \"og_description\": \"End-to-end RCM solutions: coding, claims, denial management, and AR recovery for US healthcare providers.\"}',1,1,NULL,NULL),(45,'services','core_services','What We Do',NULL,'Every practice is different. That\'s why we offer flexible, specialty-specific billing services.',NULL,'{\"services\":[{\"icon\":\"fa-chart-line\",\"title\":\"Medical Billing Consultation\",\"description\":\"Our expert billers manage the complete billing cycle for your practice.\",\"link\":\"/contact\"},{\"icon\":\"fa-code\",\"title\":\"Medical Coding\",\"description\":\"Certified clinical coders translate patient services into accurate ICD-10 and CPT codes.\",\"link\":\"/contact\"},{\"icon\":\"fa-id-card\",\"title\":\"Provider Credentialing\",\"description\":\"Getting enrolled with insurance networks can take months.\",\"link\":\"/contact\"},{\"icon\":\"fa-chart-pie\",\"title\":\"Healthcare Revenue Cycle Management\",\"description\":\"RCM is the big picture. We assign a dedicated biller to your practice.\",\"link\":\"/contact\"},{\"icon\":\"fa-file-invoice\",\"title\":\"Medical Claims Processing\",\"description\":\"Claims management is where most practices lose money.\",\"link\":\"/contact\"},{\"icon\":\"fa-envelope-open-text\",\"title\":\"Denial Management & A/R Recovery\",\"description\":\"Denied claims don\'t have to mean lost revenue.\",\"link\":\"/contact\"}]}',2,1,NULL,NULL),(46,'services','why_different','What Makes Our Billing Services Different',NULL,NULL,'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=500&h=400&fit=crop','{\"reasons\":[\"Pay-for-paid model – We only get paid when you get paid\",\"No long-term contracts – Month-to-month flexibility\",\"Free EHR software – Included with our billing services\",\"24/7 claim monitoring – We work round the clock\",\"US-based team – Local support, no offshore handoffs\",\"Transparent reporting – Real-time dashboard access\"]}',3,1,NULL,NULL),(47,'services','features','What\'s Included With Every Service',NULL,NULL,NULL,'{\"features\":[{\"icon\":\"fa-shield-alt\",\"title\":\"Secure Data Transmission\",\"description\":\"Safest digital encryption protects sensitive patient information.\"},{\"icon\":\"fa-bolt\",\"title\":\"Instant Claim Submission\",\"description\":\"Electronic billing files claims within hours, not days.\"},{\"icon\":\"fa-clock\",\"title\":\"Claim Follow-Up & Resolution\",\"description\":\"Denied claims are appealed and reprocessed successfully.\"},{\"icon\":\"fa-headset\",\"title\":\"Dedicated Account Manager\",\"description\":\"One point of contact who knows your practice inside out.\"}]}',4,1,NULL,NULL),(48,'services','pricing','Simple, Transparent Pricing','Our rates start as low as 2.49% of collections. No hidden fees.',NULL,NULL,'{\"savings_text\":\"Save 30-40%\",\"savings_subtext\":\"compared to in-house billing\",\"button_text\":\"Get Instant Pricing Quote\",\"button_link\":\"/contact\"}',5,1,NULL,NULL),(49,'services','final_cta','Ready to Improve Your Revenue Cycle?','Join over 1,500 providers who trust DBillers with their medical billing.',NULL,NULL,'{\"buttons\":[{\"text\":\"Schedule Free Demo\",\"link\":\"/contact\"},{\"text\":\"Contact Sales\",\"link\":\"/contact\"}]}',6,1,NULL,NULL),(50,'specialities','hero','Specialty-Focused Medical Billing','Medical Billing Specialties','We provide specialty-focused medical billing services across more than 75 medical specialties.',NULL,'{\"button_text\": \"Schedule Free Demo\", \"button_link\": \"/contact\", \"meta_title\": \"Multi-Specialty Medical Billing Services | 50+ Specialties | DBillers\", \"meta_description\": \"Expert medical billing for 50+ specialties including Cardiology, Orthopedics, Anesthesia, and Behavioral Health. Reduce denials and increase cash flow with DBillers.\", \"meta_keywords\": \"multi-specialty billing, cardiology billing services, orthopedic RCM, anesthesia billing company, behavioral health billing, dermatology billing\", \"og_title\": \"Multi-Specialty Medical Billing | DBillers\", \"og_description\": \"Specialized RCM for 50+ medical specialties. Cardiology, Orthopedics, Anesthesia, and more.\"}',1,1,NULL,NULL),(51,'specialities','popular_specialties','Our Popular Specialties',NULL,'From cardiology to urgent care, our billers are trained in specialty-specific revenue cycle management.',NULL,'{\"specialties\":[{\"icon\":\"fa-heartbeat\",\"name\":\"Cardiology\"},{\"icon\":\"fa-kidneys\",\"name\":\"Urology\"},{\"icon\":\"fa-bone\",\"name\":\"Orthopedics\"},{\"icon\":\"fa-brain\",\"name\":\"Behavioral Health\"},{\"icon\":\"fa-microscope\",\"name\":\"Laboratory Billing\"},{\"icon\":\"fa-truck-medical\",\"name\":\"Urgent Care\"},{\"icon\":\"fa-stethoscope\",\"name\":\"Primary Care\"},{\"icon\":\"fa-baby\",\"name\":\"Pediatrics\"},{\"icon\":\"fa-allergies\",\"name\":\"Dermatology\"},{\"icon\":\"fa-stomach\",\"name\":\"Gastroenterology\"},{\"icon\":\"fa-nerve\",\"name\":\"Neurology\"},{\"icon\":\"fa-female\",\"name\":\"OB/GYN\"}]}',2,1,NULL,NULL),(52,'specialities','not_listed','Couldn\'t Find Your Specialty Here?','Don\'t worry. We serve over 75 specialties. Drop your email below and our medical billing manager will contact you shortly.',NULL,NULL,'{\"button_text\":\"Contact Me\",\"button_link\":\"/contact\"}',3,1,NULL,NULL),(53,'specialities','final_cta','Schedule a Free Demo','Sign up and book a free service demo',NULL,NULL,'{\"buttons\":[{\"text\":\"Free Demo\",\"link\":\"/contact\"},{\"text\":\"See Pricing Packages\",\"link\":\"/contact\"}]}',4,1,NULL,NULL),(54,'contact','hero','Contact Us','We\'re Here to Help','Have questions about our medical billing services? Ready to schedule a free demo? Fill out the form below and our team will get back to you within 24 hours.',NULL,'{\"button_text\": \"Get Started\", \"button_link\": \"#contact-form\", \"meta_title\": \"Contact DBillers | Free Consultation | Medical Billing Experts\", \"meta_description\": \"Contact DBillers for expert medical billing services. Get a free consultation and discover how we can maximize your practice revenue. Call or email us today.\", \"meta_keywords\": \"contact medical billing, free consultation, medical billing company near me, RCM services quote\", \"og_title\": \"Contact DBillers | Free Consultation\", \"og_description\": \"Schedule your free consultation with DBillers medical billing experts today.\"}',1,1,NULL,NULL),(55,'contact','info','Get in Touch',NULL,NULL,NULL,'{\"phone\":\"(555) 123-4567\",\"email\":\"info@dbillers.com\",\"address\":\"123 Medical Center Drive, Suite 100, Los Angeles, CA 90001\",\"hours\":\"Monday - Friday: 9:00 AM - 6:00 PM EST\"}',2,1,NULL,NULL),(56,'privacy','hero','Privacy Policy','Last updated: April 17, 2026',NULL,NULL,'{\"meta_title\": \"Privacy Policy | DBillers Medical Billing\", \"meta_description\": \"Read DBillers privacy policy to understand how we collect, use, and protect your personal and practice information. HIPAA-compliant medical billing services.\", \"meta_keywords\": \"privacy policy, data protection, medical billing privacy, HIPAA compliance, healthcare data security\", \"og_title\": \"Privacy Policy | DBillers\", \"og_description\": \"DBillers privacy policy for medical billing services.\"}',1,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(57,'privacy','information_collect','1. Information We Collect',NULL,'<p>We collect information you provide directly to us, including name, email address, phone number, and message content when you contact us through our forms.</p>',NULL,NULL,2,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(58,'privacy','how_we_use','2. How We Use Your Information',NULL,'<p>We use the information to respond to inquiries, provide medical billing services, and improve our website.</p>',NULL,NULL,3,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(59,'privacy','data_protection','3. Data Protection',NULL,'<p>We implement industry-standard security measures to protect your personal information.</p>',NULL,NULL,4,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(60,'privacy','sharing','4. Sharing Your Information',NULL,'<p>We do not sell or share your personal information with third parties except as required by law.</p>',NULL,NULL,5,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(61,'privacy','contact','5. Contact Us',NULL,'<p>If you have questions about this Privacy Policy, contact us at info@dbillers.com.</p>',NULL,NULL,6,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(62,'terms','hero','Terms of Service','Last updated: April 17, 2026',NULL,NULL,'{\"meta_title\": \"Terms of Service | DBillers Medical Billing\", \"meta_description\": \"Read DBillers terms of service for using our website and medical billing services. Learn about our commitment to transparency and quality RCM.\", \"meta_keywords\": \"terms of service, terms and conditions, medical billing terms, legal agreement, RCM service terms\", \"og_title\": \"Terms of Service | DBillers\", \"og_description\": \"DBillers terms of service for medical billing and RCM services.\"}',1,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(63,'terms','acceptance','1. Acceptance of Terms',NULL,'<p>By accessing our website, you agree to be bound by these Terms of Service.</p>',NULL,NULL,2,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(64,'terms','services','2. Our Services',NULL,'<p>DBillers provides medical billing services subject to separate service agreements.</p>',NULL,NULL,3,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(65,'terms','user_obligations','3. User Obligations',NULL,'<p>You agree to provide accurate information and comply with applicable laws.</p>',NULL,NULL,4,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(66,'terms','limitation','4. Limitation of Liability',NULL,'<p>DBillers is not liable for indirect damages arising from use of this website.</p>',NULL,NULL,5,1,'2026-04-17 04:46:16','2026-04-17 04:46:16'),(67,'terms','governing_law','5. Governing Law',NULL,'<p>These terms are governed by the laws of the jurisdiction where DBillers operates.</p>',NULL,NULL,6,1,'2026-04-17 04:46:16','2026-04-17 04:46:16');
/*!40000 ALTER TABLE `page_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('8vQrlFayPGqwxUN1L4HHJ361QrRFHr0B9BvbcrZV',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZzVTcGZSZUlwYlpTU2JrQlpLdlZid2FsamJNbXVWcGxIcEsyNGx6YSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcGFnZS1jb250ZW50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRaNUVUZldyb053TUYwUUVsb0c0eE51NU5ZWTYvaGNjTFBSbE9CalRjMGlBQ0dkM1RUbVBtaSI7fQ==',1776440247),('cvYGu5RHR4qTHduVNjRZDcRoyMMGRf42L9qJmyX1',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOG9mSjJwRWVvSndGQ3JNbk16OXpRUEdhN05majBsY1kwT0JFMTFsWCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkWjVFVGZXcm9Od01GMFFFbG9HNHhOdTVOWVk2L2hjY0xQUmxPQmpUYzBpQUNHZDNUVG1QbWkiO30=',1776245221),('wN6UwXQZNSH9RjoyaO1DlB5DniASfVI22aL38URQ',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnEyRlZGRGJPQUwyY3F6ZWhyaDVZd1ZsSzhzdEJDdGVoTE0xa1FESCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1776370301),('YkNbbWf31p7waismVLnpZUrefTJQCxzXEEV1EPBm',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiN0tBTTR5WUtaNGFYRUpBYXF2ZGx3RUNDa1ZuSG9YQWw3QVd2YmNOSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wYWdlLWNvbnRlbnRzLzIxL2VkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJFo1RVRmV3JvTndNRjBRRWxvRzR4TnU1TllZNi9oY2NMUFJsT0JqVGMwaUFDR2QzVFRtUG1pIjtzOjg6ImZpbGFtZW50IjthOjA6e319',1776424275);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'company_name','DBillers',NULL,'2026-04-10 02:25:30'),(2,'company_email','billing@dbillers.com',NULL,'2026-04-10 19:16:35'),(3,'company_phone','+1 (555) 123-4567',NULL,'2026-04-10 02:25:30'),(4,'company_address','123 Medical District, New York, NY 10001',NULL,'2026-04-10 02:25:30'),(5,'facebook_url','https://facebook.com/dbillers',NULL,'2026-04-10 02:25:30'),(6,'twitter_url','https://twitter.com/dbillers',NULL,'2026-04-10 02:25:30'),(7,'linkedin_url','https://linkedin.com/company/dbillers',NULL,'2026-04-10 02:25:30'),(8,'site_title','DBillers - Smart Medical Billing for US Healthcare Providers','2026-04-17 05:49:13','2026-04-17 05:49:13'),(9,'site_description','DBillers is a top US medical billing firm - applying best practices in revenue cycle management and clinical coding. We help physicians outsource billing to experts.','2026-04-17 05:49:13','2026-04-17 05:49:13'),(10,'site_keywords','medical billing, revenue cycle management, medical coding, healthcare billing, claim processing, RCM services','2026-04-17 05:49:13','2026-04-17 05:49:13'),(11,'og_image','','2026-04-17 05:49:13','2026-04-17 05:49:13');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialities`
--

DROP TABLE IF EXISTS `specialities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `specialities_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialities`
--

LOCK TABLES `specialities` WRITE;
/*!40000 ALTER TABLE `specialities` DISABLE KEYS */;
INSERT INTO `specialities` VALUES (1,'Cardiology','cardiology','Specialized coding for cardiac procedures and diagnostics','specialities/01KNVNTZYVT1XC72BDXGCZFEAY.png','active',1,'2026-04-10 02:25:30','2026-04-10 07:28:35'),(2,'Orthopedics','orthopedics','Complete billing solutions for orthopedic surgeries',NULL,'active',2,'2026-04-10 02:25:30','2026-04-10 02:25:30'),(3,'Psychiatry','psychiatry','Mental health billing with insurance compliance',NULL,'active',3,'2026-04-10 02:25:30','2026-04-10 02:25:30'),(4,'Pediatrics','pediatrics','Well-child visits, immunizations, and screenings',NULL,'active',4,'2026-04-10 02:25:30','2026-04-10 02:25:30'),(5,'OB/GYN','obgyn','Maternity care and women\'s health billing',NULL,'active',5,'2026-04-10 02:25:30','2026-04-10 02:25:30'),(6,'Emergency Medicine','emergency-medicine','ER coding with facility and professional components',NULL,'active',6,'2026-04-10 02:25:30','2026-04-10 02:25:30');
/*!40000 ALTER TABLE `specialities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('super_admin','admin') NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','admin@dbillers.com',NULL,'$2y$12$Z5ETfWroNwMF0QEloG4xNu5NYY6/hccLPRlOBjTc0iACGd3TTmPmi','super_admin',NULL,'2026-04-10 02:15:55','2026-04-10 05:35:47'),(2,'Mahfooz','Mahfooz@dbillers.com',NULL,'$2y$12$HTVBBElFlI3hcFEODTgnHOsQA3o/GMrEBPZ8I4YdvS1DNT6OaYwly','admin',NULL,'2026-04-10 05:44:26','2026-04-10 05:44:26');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-17 20:47:09
