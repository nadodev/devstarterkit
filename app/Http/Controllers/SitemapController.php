<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $courses = Course::all();
        
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $sitemap .= '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
        
        // Home Page
        $sitemap .= $this->addUrl(url('/'), now()->format('Y-m-d'), 'weekly', '1.0');
        
        // Landing Page
        $sitemap .= $this->addUrl(url('/landing'), now()->format('Y-m-d'), 'weekly', '0.9');
        
        // About Page
        $sitemap .= $this->addUrl(url('/about'), now()->format('Y-m-d'), 'monthly', '0.7');
        
        // Courses Pages
        $sitemap .= $this->addUrl(url('/courses'), now()->format('Y-m-d'), 'weekly', '0.8');
        
        // Products Pages
        $sitemap .= $this->addUrl(url('/products'), now()->format('Y-m-d'), 'weekly', '0.8');
        
        // Individual Product Pages
        foreach ($products as $product) {
            $sitemap .= $this->addUrl(
                url('/products/' . $product->slug), 
                $product->updated_at->format('Y-m-d'), 
                'monthly', 
                '0.6',
                $product->image ? asset('storage/' . $product->image) : null,
                $product->name,
                $product->short_description
            );
        }
        
        // Individual Course Pages
        foreach ($courses as $course) {
            $sitemap .= $this->addUrl(
                url('/courses/' . $course->id), 
                $course->updated_at->format('Y-m-d'), 
                'monthly', 
                '0.6'
            );
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
    private function addUrl($url, $lastmod, $changefreq, $priority, $image = null, $imageTitle = null, $imageCaption = null)
    {
        $urlXml = '    <url>' . "\n";
        $urlXml .= '        <loc>' . $url . '</loc>' . "\n";
        $urlXml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";
        $urlXml .= '        <changefreq>' . $changefreq . '</changefreq>' . "\n";
        $urlXml .= '        <priority>' . $priority . '</priority>' . "\n";
        
        if ($image) {
            $urlXml .= '        <image:image>' . "\n";
            $urlXml .= '            <image:loc>' . $image . '</image:loc>' . "\n";
            if ($imageTitle) {
                $urlXml .= '            <image:title>' . htmlspecialchars($imageTitle) . '</image:title>' . "\n";
            }
            if ($imageCaption) {
                $urlXml .= '            <image:caption>' . htmlspecialchars($imageCaption) . '</image:caption>' . "\n";
            }
            $urlXml .= '        </image:image>' . "\n";
        }
        
        $urlXml .= '    </url>' . "\n";
        
        return $urlXml;
    }
}