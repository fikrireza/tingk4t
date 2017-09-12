<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Projects;
use App\Models\Inbox;
use DB;
use Mail;
use Validator;

class FrontendController extends Controller
{
  function singlePage() {
    $call = Projects::where('flag_publish', 'Y')
      ->orderBy('post_date', 'desc')
      ->get();
      
    return view('frontend.single-page', compact('call'));
  }

  function dekstop() {
	    return view('frontend.first-page.index');
	}

	function home() {
	    return view('frontend.home-page.index');
	}

	function aboutOurCommitment() {
	    return view('frontend.about-page.our-commitment');
	}

	function aboutFlowDesign() {
	    return view('frontend.about-page.flow-design');
	}

	function services() {
	    return view('frontend.services-page.index');
	}

	function projects() {
		$call = Projects::where('flag_publish', 'Y')
			->orderBy('post_date', 'desc')
			->get();

	    return view('frontend.project-page.index', compact('call'));
	}

	function contactView() {
	    return view('frontend.contact-page.index');
	}
	function contactStore(request $request) {
		$message = [
          'subject.required'=> 'required',
          'subject.min' 	=> 'to short',
          'name.required' 	=> 'required',
          'name.min' 		=> 'to short',
          'email.required'  => 'required',
          'email.email'  	=> 'invalid email',
          'telp.required' 	=> 'required',
          'telp.min' 		=> 'to short',
          'message.required'=> 'required',
          'message.min' 	=> 'to short',
          'g-recaptcha-response.required'  => 'required',
        ];

        $validator = Validator::make($request->all(), [
          'subject'	=> 'required|min:3',
          'name' 	=> 'required|min:3',
          'email' 	=> 'required|email',
          'telp' 	=> 'required|min:6',
          'message' => 'required|min:10',
          'g-recaptcha-response' => 'required',
        ], $message);

        if($validator->fails())
        {
          return redirect()
          	->route('frontend.contact')
          	->withErrors($validator)
          	->withInput()
          	->with('autofocus', true)
          	->with('info', 'infalid input...')
          	->with('alert', 'alert-danger');
        }

        DB::transaction(function() use($request){
          $save = new Inbox;
          $save->subject 	= $request->subject;
          $save->name 		= $request->name;
          $save->email 		= $request->email;
          $save->telp 		= $request->telp;
          $save->message 	= $request->message;
          $save->save();

        });

        return redirect()
        	->route('frontend.contact')
        	->with('autofocus', true)
        	->with('info', 'Data has been Submited')
        	->with('alert', 'alert-success');
	}

}
