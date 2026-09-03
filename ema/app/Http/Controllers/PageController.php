<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::asArray();
        $services = Service::query()->where('is_active', true)->orderBy('sort_order')->get();

        return view('index', ['settings' => $settings, 'services' => $services, 'page' => Page::where('slug', 'home')->first()]);
    }

    public function login()
    {
        return view('login', ['page' => Page::where('slug', 'login')->first()]);
    }

    public function forgotPassword()
    {
        return view('forgotpassword', ['page' => Page::where('slug', 'forgotpassword')->first()]);
    }

    public function services()
    {
        $settings = SiteSetting::asArray();
        $services = Service::query()->where('is_active', true)->orderBy('sort_order')->get();

        return view('services', ['settings' => $settings, 'services' => $services, 'page' => Page::where('slug', 'services')->first()]);
    }

    public function about()
    {
        $settings = SiteSetting::asArray();

        return view('about', ['settings' => $settings, 'page' => Page::where('slug', 'about')->first()]);
    }

    public function contact()
    {
        $settings = SiteSetting::asArray();

        return view('contact', ['settings' => $settings, 'page' => Page::where('slug', 'contact')->first()]);
    }

    public function serviceDetails()
    {
        return view('service-details', ['page' => Page::where('slug', 'service-details')->first()]);
    }

    public function starterPage()
    {
        return view('starter-page', ['page' => Page::where('slug', 'starter-page')->first()]);
    }

    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        return response('OK');
    }

    public function newsletterForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        return response('OK');
    }
}
