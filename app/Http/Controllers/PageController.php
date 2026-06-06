<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\PageContent;

class PageController extends Controller
{
    public function home()
    {
        $content = PageContent::where('page', 'home')->where('is_active', true)->orderBy('order')->get();
        return view('home', compact('content'));
    }

    public function about()
    {
        $content = PageContent::where('page', 'about')->where('is_active', true)->orderBy('order')->get();
        return view('about', compact('content'));
    }

    public function services()
    {
        $content = PageContent::where('page', 'services')->where('is_active', true)->orderBy('order')->get();
        return view('services', compact('content'));
    }

    public function specialities()
    {
        $specialities = Speciality::where('status', 'active')->orderBy('order')->get();
        return view('specialities', compact('specialities'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function rcm()
    {
        $content = PageContent::where('page', 'rcm')->where('is_active', true)->orderBy('order')->get();
        return view('rcm', compact('content'));
    }
}
