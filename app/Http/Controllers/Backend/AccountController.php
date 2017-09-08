<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

use Auth;
use DB;
use Hash;
use Mail;
use Validator;

class AccountController extends Controller
{
    


    // User Profile
    public function profile()
    {
        $getProfile = User::find(Auth::user()->id);

        return view('backend.profile.index', compact('getProfile'));
    }

    public function changeProfile(Request $request)
    {
      $message = [
          'name.required' => 'This field is required',
          // 'email.unique' => 'Email ini sudah digunakan',
          // 'email.email' => 'Format harus Email',
          'avatar.image' => 'Format Gambar Tidak Sesuai',
          'avatar.max' => 'File Size Terlalu Besar',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required',
          // 'email' => 'required|email|unique:amd_users,email,'.$request->id,
          'avatar' => 'image|mimes:jpeg,bmp,png|max:1000',
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('account.profile')->withErrors($validator)->withInput();
        }


        $image = $request->file('avatar');

        if (!$image) {
          $update = User::find($request->id);
          $update->name = $request->name;
          $update->email = $request->email;
          $update->update();
        }else{
          $img_url = str_slug($request->name,'-'). '.' . $image->getClientOriginalExtension();
          Image::make($image)->fit(250,250)->save('backend/images/profile/'. $img_url);

          $update = User::find($request->id);
          $update->name = $request->name;
          $update->email = $request->email;
          $update->avatar  = $img_url;
          $update->update();
        }

        return redirect()->route('account.profile')->with('berhasil', 'Your Profile Has Been Changes');
    }

    public function changePassword(Request $request)
    {
        $getUser = User::find($request->id);

        $messages = [
          'oldpass.required' => "This field is required",
          'newpass.required' => "This field is required",
          'newpass.min' => "Too Short",
          'newpass_confirmation.required' => "This field is required",
          'newpass_confirmation.confirmed' => "Password did not match",
        ];

        $validator = Validator::make($request->all(), [
          'oldpass' => 'required',
          'newpass' => 'required|min:8',
          'newpass_confirmation' => 'required|same:newpass'
        ], $messages);

        if ($validator->fails()) {
          return redirect()->route('account.profile')->withErrors($validator)->withInput();
        }

        if(Hash::check($request->oldpass, $getUser->password))
        {
          $getUser->password = Hash::make($request->newpass);
          $getUser->save();

          return redirect()->route('account.profile')->with('berhasil', 'Your password has been changed');
        }
        else {
          return redirect()->route('account.profile')->with('erroroldpass', 'Your current password did not match');
        }
    }
}
