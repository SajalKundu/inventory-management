<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Gallery;
use App\Models\Home_Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $homeSliders =Home_Slider::where('status', 1)->where('status', 1)->get();
        $contact = ContactUs::first();
        $galleris = Gallery::where('status', 1)->get();
        // dd($homeSliders);
        return view('frontend.layouts.index', compact('homeSliders', 'contact', 'galleris'));
    }
}
