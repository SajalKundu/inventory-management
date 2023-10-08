<?php

namespace App\Http\Controllers;

use App\Models\Home_Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $homeSliders =Home_Slider::where('status', 1)->where('status', 1)->get();
        // dd($homeSliders);
        return view('frontend.layouts.index', compact('homeSliders'));
    }
}
