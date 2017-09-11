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

    // Account
    public function index()
    {
        $getUsers = User::get();

        return view('backend.account.index', compact('getUsers'));
    }

    public function store(Request $request)
    {
        $message = [
          'name.required' => 'This field is required',
          'name.unique' => 'The name has already taken',
          'email.required' => 'This field is required',
          'email.email' => 'Format email not supported',
          'email.unique' => 'Email has already taken',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required|unique:amd_users',
          'email' => 'required|email|unique:amd_users',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('account.index')->withErrors($validator)->withInput();
        }

        DB::transaction(function() use($request){

          $confirmation_code = str_random(30).time();
          $userSave = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(12345678),
            'confirmed' => 0,
            'login_count' => 0,
            'status' => 'N',
            'confirmation_code' => $confirmation_code,
          ]);

          $data = array([
            'name' => $request->name,
            'email' => $request->email,
            'confirmation_code' => $confirmation_code,
          ]);

          // try {
            Mail::send('backend.email.confirm', ['data' => $data], function($message) use ($data) {
              $message->from('administrator@tingkat.co.id', 'Administrator')
                      ->to($data[0]['email'], $data[0]['name'])
                      ->subject('Aktivasi Akun CMS Tingkat');
            });
          // } catch (\Exception $e) {
          //   return redirect()->route('account.index')->with('berhasil', 'New Account has been created, email '.$request->email.' cannot reached');
          // }

        });

        return redirect()->route('account.index')->with('berhasil', 'New Account has been created, check '.$request->email.' for verification');
    }

    public function verify($confirmation_code)
    {
        $getUser = User::where('confirmation_code', $confirmation_code)->first();

        if(!$getUser)
        {
          abort(404);
        }

        return view('backend.account.verify', compact('getUser'));
    }

    public function verifyStore(Request $request)
    {
        $message = [
          'password.required' => 'This field is required',
          'password.max' => 'Password Too Max',
          'password.min' => 'Password Too Short, Min 8',
        ];

        $validator = Validator::make($request->all(), [
          'password' => 'required|min:8|max:20',
        ], $message);

        if($validator->fails())
        {
          return redirect()->route('verify.index', ['confirmation_code' => $request->confirmation_code])->withErrors($validator)->withInput();
        }

        $user = User::where('confirmation_code', $request->confirmation_code)->first();

        if(!$user){
          abort(404);
        }

        $user->password = Hash::make($request->password);
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->login_count = 1;
        $user->update();

        auth()->login($user);

        return redirect()->route('account.profile')->with('berhasil', 'Welcome '.$user->name.' Please Change Your Password');

    }

    public function reset($id)
    {
        $getUser = User::find($id);

        if(!$getUser){
          abort('backend.errors.404');
        }

        $getUser->password = Hash::make(12345678);
        $getUser->status = 'N';
        $getUser->save();

        if($getUser->id == Auth::user()->id){
            auth()->logout();
        }

        $data = array([
          'name' => $getUser->name,
          'email' => $getUser->email,
          'password' => 12345678
        ]);

        Mail::send('backend.email.reset', ['data' => $data], function($message) use ($data) {
          $message->from('administrator@tingkat.co.id', 'Administrator')
                  ->to($data[0]['email'], $data[0]['name'])
                  ->subject('Reset Password Akun CMS Tingkat');
        });

        return redirect()->route('account.index')->with('berhasil', 'Password Successfully reset '.$getUser->name);
    }


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
          $getUser->status = 'Y';
          $getUser->save();

          return redirect()->route('account.profile')->with('berhasil', 'Your password has been changed');
        }
        else {
          return redirect()->route('account.profile')->with('erroroldpass', 'Your current password did not match');
        }
    }
}
