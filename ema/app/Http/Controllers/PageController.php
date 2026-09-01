<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function services()
    {
        return view('services');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function serviceDetails()
    {
        return view('service-details');
    }

    public function starterPage()
    {
        return view('starter-page');
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
