<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class GalleryController extends Controller
{
    //  //  /*--------------------------------- Slider Function ------------------------*/

     public function index()
     {
         $gallery = Gallery::all();
         return view('admin.home.gallery.index', ['gallery' => $gallery]);
     }

        public function Add()
     {

        return view('admin.home.gallery.create');
     }

        public function store(Request $request)
        {
            $request->validate([
                'rank' => 'required|integer',
                'title' => 'required|string|max:255',
                'image' => 'required|mimes:jpeg,bmp,png,jpg,gif,webp,svg',
                'status' => 'required|integer',
            ]);



         try {
            $path = 'assets/home/gallery/';



            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '_' . $image->getClientOriginalName();
                $img= Image::make($image->getRealPath())->resize(600, 400);
                $img->save($path.$name);
            }else{
                $name = null;
            }

            $postdata['rank'] = $request->input('rank');
            $postdata['title'] = $request->input('title');
            $postdata['status'] = $request->input('status');
            $postdata['image'] = $name;
            $postdata['image_path'] =  $path;

           Gallery::create($postdata);

            $request->session()->flash('msg', 'Gallery Successfully Added!');
            return redirect()->route('a_gallery.index');
        } catch (Exception $e) {
            $request->session()->flash('emsg', $e->getMessage());
            return redirect()->route('a_gallery.Add');
        }
    }


     public function edit(Request $request, $id)
     {
             $result = Gallery::where('id', $id)->first();
             return view('admin.home.gallery.edit', ['result' => $result]);
         }
            public function update(Request $request, $id){
             $request->validate([
                 'rank' => 'required|integer',
                 'title' => 'required|string|max:255',
                 'status' => 'required|integer',
                 'image' => 'mimes:jpeg,bmp,png,jpg,gif,webp,svg',
             ]);





             try {

                $path = 'assets/home/gallery/';

                $gallery = Gallery::find($id);

                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    $image_name = time() . '_' . $image->getClientOriginalName();
                    $img= Image::make($image->getRealPath())->resize(600, 400);
                    $img->save($path.$image_name);

                    if($gallery->image != null){

                        $old_path = $path.$gallery->image;

                        if(file_exists($old_path)){
                            unlink($old_path);
                        }
                    }
                    $gallery->image = $image_name;

                }elseif($request->del_image == 1){

                        if($gallery->image != null){

                            $old_path = $path.$gallery->image;

                            if(file_exists($old_path)){
                                unlink($old_path);
                            }
                        }
                        $gallery->image = null;

                }else{
                    $gallery->image = $gallery->image;
                }


                    $postdata['rank'] = $request->input('rank');
                    $postdata['title'] = $request->input('title');
                    $postdata['status'] = $request->input('status');
                    $postdata['image_path'] =  $path;


                    $gallery->update($postdata);
                 $request->session()->flash('msg', 'Gallery Successfully Updated!');
                 return redirect()->route('a_gallery.index');

             } catch (Exception $e) {
                 $request->session()->flash('emsg', $e->getMessage());
                 return redirect()->route('a_gallery.edit');

             }
         }


     public function destroy(Request $request, $id)
     {
         try {
             $result = Gallery::find($id);

             if ($result) {
                 $image_old = $result->image_path . $result->image;

                 if (File::exists($image_old) && $result->image) {
                     unlink($image_old);
                 }


                 $result->delete();
             }

             $request->session()->flash('msg', 'Gallery Successfully Deleted!');
             return redirect()->route('a_gallery.index');
         } catch (Exception $e) {
             $request->session()->flash('emsg', $e->getMessage());
             return redirect()->route('a_gallery.index');
         }
     }
     /*{Slider status change ( with hstatus)}*/

     public function sliderStatus(Request $request, $id, $value, $status)
 {
     try {
        $result = Gallery::where('id', $id)->first();

         if ($result) {
             if ($value) {
                 $result->$status = 0;
             } else {
                 $result->$status = 1;
             }

             $result->save();
         }

         $request->session()->flash('msg', $status . ' Successfully Changed!');
         return redirect()->route('a_gallery.index');
     } catch (Exception $e) {
         $request->session()->flash('emsg', $status . ' Change was Un-Successful!');
         return redirect()->route('a_gallery.index');
     }
 }
}
