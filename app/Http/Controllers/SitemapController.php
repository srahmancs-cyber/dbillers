<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Models\Speciality;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = [];
        
        // Static pages (unique)
        $staticPages = [
            ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => '/services', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => '/specialities', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => '/privacy-policy', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => '/terms-of-service', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];
        
        $pages = $staticPages;
        
        // Specialities detail pages (if you have slug routes)
        $specialities = Speciality::where('status', 'active')->get();
        foreach ($specialities as $speciality) {
            $pages[] = [
                'loc' => '/specialities/' . $speciality->slug,
                'priority' => '0.7',
                'changefreq' => 'monthly',
            ];
        }
        
        // Generate XML
        $xml = $this->generateXml($pages);
        
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
    
    private function generateXml($pages)
    {
        $lastmod = Carbon::now()->toDateString();
        
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        foreach ($pages as $page) {
            $xml .= '    <url>' . "\n";
            $xml .= '        <loc>https://dbillers.com' . $page['loc'] . '</loc>' . "\n";
            $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";
            $xml .= '        <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";
            $xml .= '        <priority>' . $page['priority'] . '</priority>' . "\n";
            $xml .= '    </url>' . "\n";
        }
        
        $xml .= '</urlset>';
        
        return $xml;
    }
}
