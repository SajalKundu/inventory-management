<?php

namespace App\Http\Controllers;

use App\Models\Home_Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class AdminSliderController extends Controller
{
     //  /*--------------------------------- Slider Function ------------------------*/

     public function index()
     {
         $sliders = Home_Slider::all();
         return view('admin.home.slider.index', ['sliders' => $sliders]);
     }

        public function Add()
     {

        return view('admin.home.slider.create');
     }

        public function store(Request $request)
        {
        $request->validate([
            'rank' => 'required|integer',
            'title' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,bmp,png,jpg,gif,webp',
            'status' => 'required|integer',
        ]);



        try {
            $postdata['rank'] = $request->input('rank');
            $postdata['title'] = $request->input('title');
            $postdata['morelink'] = $request->input('morelink');
            $postdata['details'] = $request->input('details');
            $postdata['status'] = $request->input('status');

        if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imagename = time() . '_' . $image->getClientOriginalname();
                $thumb = 'thumb_' . $imagename;
                $path = 'assets/home/slider';
                $img = Image::make($image->getRealPath())->resize(150, 150);
                $img->save($path . '/' . $thumb);
                $image->move($path, $imagename);
                $postdata['image'] = $imagename;
                $postdata['thumb'] = $thumb;
                $postdata['image_path'] = 'assets/home/slider/';

            }

            if ($request->hasFile('mobile_images')) {
                $image = $request->file('mobile_images');
                $path = $postdata['image_path'];
                $imagename = time() . '_' . $image->getClientOriginalname();
                $mobile = Image::make($image)->resize(700, 450);
                $mobile->save($path . '/' . $imagename);
                $postdata['mobile_images'] = $imagename;

            }

            Home_Slider::create($postdata);

            $request->session()->flash('msg', 'Slider Successfully added!');
            return redirect()->route('a_slider.index');
        } catch (Exception $e) {
            $request->session()->flash('emsg', $e->getMessage());
            return redirect()->route('a_slider.Add');
        }
    }


     public function edit(Request $request, $id)
     {
             $result = Home_Slider::where('id', $id)->first();
             return view('admin.home.slider.edit', ['slider' => $result]);
         }
            public function update(Request $request, $id){
             $request->validate([
                 'rank' => 'required|integer',
                 'title' => 'required|string|max:255',
                 'status' => 'required|integer',
                 'image' => 'mimes:jpeg,bmp,png,jpg,gif,webp',
             ]);



             try {
                 $postdata['rank'] = $request->input('rank');
                 $postdata['title'] = $request->input('title');
                 $postdata['morelink'] = $request->input('morelink');
                 $postdata['details'] = $request->input('details');
                 $postdata['status'] = $request->input('status');

                  $postdata['image_path'] = 'assets/home/slider/';


                 if ($request->hasFile('image')) {

                     $image = $request->file('image');
                     $imagename = time() . '_' . $image->getClientOriginalname();
                     $thumb = 'thumb_' . $imagename;
                     $path = 'assets/home/slider';
                     $img = Image::make($image->getRealPath())->resize(150, 150);
                     $img->save($path . '/' . $thumb);
                     $image->move($path, $imagename);
                     $postdata['image'] = $imagename;
                     $postdata['thumb'] = $thumb;

                     if ($request->input('old_image')) {
                         $delete1 = $postdata['image_path'] . $request->input('old_image');
                         $delete2 = $postdata['image_path'] . 'thumb_' . $request->input('old_image');
                         if (File::exists($delete1)) {
                             unlink($delete1);
                         }
                         if (File::exists($delete2)) {
                             unlink($delete2);
                         }
                     }
                 } elseif ($request->input('del_image')) {

                     if ($request->input('old_image')) {
                         $delete1 = $postdata['image_path'] . $request->input('old_image');
                         $delete2 = $postdata['image_path'] . 'thumb_' . $request->input('old_image');
                         if (File::exists($delete1)) {
                             unlink($delete1);
                         }
                         if (File::exists($delete2)) {
                             unlink($delete2);
                         }
                     }
                     $postdata['image'] = '';
                     $postdata['thumb'] = '';
                 }



                 if ($request->hasFile('mobile_images')) {

                     $image = $request->file('mobile_images');

                     $path = $postdata['image_path'];
                     $imagename = time() . '_' . $image->getClientOriginalname();
                     $mobile = Image::make($image)->resize(700, 450);

                     $mobile->save($path . '/' . $imagename);
                     $postdata['mobile_images'] = $imagename;

                     if ($request->input('old_mobile_images')) {
                         $delete1 = $postdata['image_path'] .$request->input('old_mobile_images');
                         if (File::exists($delete1)) {
                             unlink($delete1);
                         }
                     }
                 } elseif ($request->input('del_mobile_images')) {

                     if ($request->input('old_mobile_images')) {
                         $delete1 = $postdata['image_path'] . $request->input('old_mobile_images');
                         if (File::exists($delete1)) {
                             unlink($delete1);
                         }
                     }
                     $postdata['mobile_images'] = '';
                 }

                 $result = Home_Slider::where('id', $id)->update($postdata);
                 $request->session()->flash('msg', 'Slider Successfully updated!');
                 return redirect()->route('a_slider.index');

             } catch (Exception $e) {
                 $request->session()->flash('emsg', $e->getMessage());
                 return redirect()->route('a_slider.edit', ['id' => $id]);

             }
         }


     public function destroy(Request $request, $id)
     {
         try {
             $slider = Home_Slider::find($id);

             if ($slider) {
                 $image_old = $slider->image_path . $slider->image;
                 $thumb_old = $slider->image_path . $slider->thumb;
                 $mobile_images_old = $slider->image_path . $slider->mobile_images;

                 if (File::exists($image_old) && $slider->image) {
                     unlink($image_old);
                 }
                 if (File::exists($thumb_old) && $slider->thumb) {
                     unlink($thumb_old);
                 }
                 if (File::exists($mobile_images_old) && $slider->mobile_images) {
                     unlink($mobile_images_old);
                 }

                 $slider->delete();
             }

             $request->session()->flash('msg', 'Slider Successfully Deleted!');
             return redirect()->route('a_slider.index');
         } catch (Exception $e) {
             $request->session()->flash('emsg', $e->getMessage());
             return redirect()->route('a_slider.index');
         }
     }
     /*{Slider status change ( with hstatus)}*/

     public function sliderStatus(Request $request, $id, $value, $status)
 {
     try {
         $slider = Home_Slider::find($id); // Retrieve the slider record using the model

         if ($slider) {
             if ($value) {
                 $slider->$status = 0;
             } else {
                 $slider->$status = 1;
             }

             $slider->save();
         }

         $request->session()->flash('msg', $status . ' Successfully Changed!');
         return redirect()->route('a_slider.index');
     } catch (Exception $e) {
         $request->session()->flash('emsg', $status . ' Change was Un-Successful!');
         return redirect()->route('a_slider.index');
     }
 }
}
