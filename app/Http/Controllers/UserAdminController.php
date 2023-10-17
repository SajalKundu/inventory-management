<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class UserAdminController extends Controller
{

       /*---------------------------- user View  -----------------------------*/

    public function userlist()
    {
        $user = DB::table('users')->paginate(10);
        return view('admin.user.userlist', ['user' => $user]);
    }

      /*---------------------- user add --------------------*/

    public function userAdd(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.user.userAdd');

        } elseif ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'status' => 'required|integer',
                'image' => 'mimes:jpeg,bmp,png,jpg,gif,webp,svg',
                'password' => 'required|string|min:6|confirmed',
            ]);

            try {
                $postdata['name'] = $request->input('name');
                $postdata['email'] = $request->input('email');
                $postdata['status'] = $request->input('status');
                $postdata['password'] = bcrypt($request->input('password'));
                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    $imagename = time() . '_' . $image->getClientOriginalname();
                    $thumb = 'thumb_' . $imagename;

                    $path = 'assets/user/';
                    $img = Image::make($image->getRealPath())->resize(150, 150);

                    $img->save($path . '/' . $thumb);
                    $image->move($path, $imagename);
                    $postdata['image'] = $imagename;
                    $postdata['thumb'] = $thumb;
                    $postdata['image_path'] = 'assets/user/';
                }

                $result = DB::table('users')->insert($postdata);
                $request->session()->flash('msg', 'User Insert was Successful!');
                return redirect()->route('a_userlist');
            } catch (Exception $e) {
                $request->session()->flash('emsg', $e->errorInfo[2]);
                return redirect()->route('a_userAdd');
            }
        } else {
            return view('auth.login');
        }
    }
      /*---------------------------- user Edit  ------------------------------*/
    public function userEdit(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            if ($id) {
                $user = DB::table('users')->where('id', $id)->first();
                return view('admin.user.userEdit', ['user' => $user]);
            } else {
                $this->userlist();
            }
        } elseif ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'status' => 'required|integer',
                'image' => 'mimes:jpeg,bmp,png,jpg,gif,webp',
            ]);

            if ($request->input('password')) {
                $request->validate([
                    'password' => 'required|string|min:6|confirmed',
                ]);
            }

            try {
                $postdata['name'] = $request->input('name');
                $postdata['email'] = $request->input('email');
                $postdata['status'] = $request->input('status');

                if ($request->input('password')) {
                    $postdata['password'] = bcrypt($request->input('password'));
                }

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $input['imagename'] = time() . '_' . $image->getClientOriginalname();
                    $path = 'assets/user/';
                    $img = Image::make($image->getRealPath())->resize(150, 150);

                    $thumb = 'thumb_' . $input['imagename'];
                    $img->save($path . '/' . $thumb);
                    $image->move($path, $input['imagename']);
                    $postdata['image'] = $input['imagename'];
                    $postdata['thumb'] = $thumb;
                    $postdata['image_path'] = $path;

                    $result = DB::table('users')->select('image', 'thumb', 'image_path')->where('id', $id)->first();

                    $image = $result->image_path . $result->image;
                    $thumb = $result->image_path . $result->thumb;
                    if (File::exists($image)) {
                        unlink($image);
                    }
                    if (File::exists($thumb)) {
                        unlink($thumb);
                    }

                }
                $result = DB::table('users')->where('id', $id)->update($postdata);
                $request->session()->flash('msg', 'User Successfully updated!');
                return redirect()->route('a_userlist');
            } catch (Exception $e) {
                $request->session()->flash('emsg', $e->errorInfo[2]);
                return redirect()->route('a_userEdit', ['id' => $id]);
            }
        } else {
            return view('auth.login');
        }
    }

        /*------------------------- user delete --------------------------*/

    public function userDelete(Request $request, $id)
    {
        try {
            $result = DB::table('users')->select('image', 'image_path', 'thumb')->where('id', $id)->first();
            $delete = DB::table('users')->where('id', $id)->delete();

            $image = $result->image_path . $result->image;
            $thumb = $result->image_path . $result->thumb;
            if (File::exists($image)&& $result->image) {
                unlink($image);
            }

            if (File::exists($thumb)&& $result->thumb) {
                unlink($thumb);
            }

            $request->session()->flash('msg', 'User Successfully Deleted!');
            return redirect()->route('a_userlist');

        } catch (Exception $e) {
            $request->session()->flash('emsg', $e->errorInfo[2]);
            return redirect()->route('a_userlist');

        }
    }

    /*---------------------- user status change ---------------*/

    public function userStatus(Request $request, $id, $value)
    {
        if ($value) {
            $result = $this->statusChange('users', $id, '0');
        } else {
            $result = $this->statusChange('users', $id, '1');
        }
        if ($result) {
            $request->session()->flash('msg', 'Status Successfully Changed!');
            return redirect()->route('a_userlist');
        } else {
            $request->session()->flash('msg', 'Status Change was Un-Successful!');
            return redirect()->route('a_userlist');
        }
    }

    /*---------------------- status change main function ---------------*/

    public function statusChange($table, $id, $value)
    {
        $postdata['status'] = $value;
        $result = DB::table($table)->where('id', $id)->update($postdata);
        if ($result) {
            return '1';
        } else {
            return '0';
        }
    }

    /*----------------------- User Password change -------------*/
    public function userPassword(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('admin.user.userPassword');
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);

            try {
                $id = Auth::user()->id;

                $postdata['password'] = bcrypt($request->input('password'));

                $result = DB::table('users')->where('id', $id)->update($postdata);

                $request->session()->flash('msg', 'User Password Successfully Changed!');
                return redirect()->route('a_userlist');
            } catch (Exception $e) {
                $request->session()->flash('emsg', $e->errorInfo[2]);
                return redirect()->route('a_userlist');

            }
        }
    }

}
