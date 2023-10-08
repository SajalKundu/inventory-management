<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class ContactUsController extends Controller
{
    public function index()
    {
        $contact_us = ContactUs::first();
        return view('admin.contact-us.index', compact('contact_us'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string',
            'details'       => 'nullable|string',
            'about_company' => 'nullable|string',
            'address'       => 'required|string|max:255',
            'email'         => 'nullable|email',
            'phone'         => 'nullable|string',
            'mobile'        => 'nullable|string',
            'fax'           => 'nullable|string',
            'map'           => 'nullable|string',
            'banner'        => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp',
        ]);

        $contact_us = ContactUs::findOrFail($id);
        $path = 'assets/contact/';

        if($request->hasFile('banner')){
            $banner = $request->file('banner');
            $banner_name = time() . '_banner_' . $banner->getClientOriginalName();
            $img_banner = Image::make($banner->getRealPath())->resize(1920, 768);
            $img_banner->save($path.$banner_name);
            if($contact_us->banner != null){
                $old_banner_path = $path.$contact_us->banner;
                if(file_exists($old_banner_path)){
                    unlink($old_banner_path);
                }
            }
            $contact_us->banner = $banner_name;
        }elseif($request->del_banner == 1){
            if($contact_us->banner != null){
                $old_banner_path = $path.$contact_us->banner;
                if(file_exists($old_banner_path)){
                    unlink($old_banner_path);
                }
            }
            $contact_us->banner = null;
        }else{
            $contact_us->banner = $contact_us->banner;
        }

        $contact_us->title         = $request->title;
        $contact_us->about_company = $request->about_company;
        $contact_us->address  = $request->address;
        $contact_us->phone       = $request->phone;
        $contact_us->mobile= $request->mobile;
        $contact_us->email      = $request->email;
        $contact_us->fax= $request->fax;
        $contact_us->details        = $request->details;
        $contact_us->map        = $request->map;
        $contact_us->banner_path   = $path;

        if($contact_us->save())

        return redirect()->route('contacts.contact-us.index')->with('msg', 'Contact Us updated successfully.');

    }
}
