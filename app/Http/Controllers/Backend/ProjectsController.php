<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Projects;
use App\Models\AccessLog;

use Validator;
use Auth;
use File;
use Image;
use DB;

class ProjectsController extends Controller
{


    public function index()
    {
        $getProjects = Projects::get();

        return view('backend.projects.index', compact('getProjects'));
    }

    public function add()
    {
        return view('backend.projects.add');
    }

    public function store(Request $request)
    {
        $message = [
          'name.required' => 'This field required',
          'name.max' => 'Too Long, Max 25 Char',
          'name.unique' => 'This Project Has Been Created',
          'location.required' => 'This field required',
          'location.max' => 'Too Long',
          'scope.required' => 'This field required',
          'scope.max' => 'Too Long',
          'img_large.required' => 'This field required',
          'img_large.dimensions' => 'Must size 600px x 600px',
          'img_large.image' => 'Image Format Not Valid',
          'img_large.max' => 'File Size Too Big',
          'img_thumb.required' => 'This field required',
          'img_thumb.image' => 'Image Format Not Valid',
          'img_thumb.max' => 'File Size Too Big',
          'img_thumb.dimensions' => 'Must Size 600px x 600px',
          'post_date.required' => 'This field required',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required|unique:amd_projects|max:25',
          'location' => 'required|max:300',
          'scope' => 'required|max:500',
          'img_large' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=600,max_height=600',
          'img_thumb' => 'required|image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=600,max_height=600',
          'post_date' => 'required'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('projects.add')->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request) {
          $salt = str_random(4);

          $image = $request->file('img_large');
          $img_large = str_slug($request->name,'-').'-main-'.$salt. '.' . $image->getClientOriginalExtension();
          $upload1 = Image::make($image)->save('amadeo/images/projects/'. $img_large);

          $image_kanan = $request->file('img_thumb');
          $img_thumb = str_slug($request->name,'-').'-thumb-'.$salt. '.' . $image_kanan->getClientOriginalExtension();
          $upload2 = Image::make($image_kanan)->save('amadeo/images/projects/'. $img_thumb);

  				$save = new Projects;

  				$save->name = $request->name;
  				$save->location = $request->location;
  				$save->scope     = $request->scope;
          $save->img_large = $img_large;
          $save->img_large_alt = str_slug($request->name,'-');
          $save->img_thumb = $img_thumb;
          $save->img_thumb_alt = str_slug($request->name,'-');
          $save->post_date = $request->post_date;
          $save->flag_publish = $request->flag_publish or 'N';
          $save->slug = str_slug($request->name,'-');
  				$save->save();

          $log = new AccessLog;
          $log->actor = Auth::user()->id;
          $log->action = 'Add New Projects '.$request->name;
          $log->save();
  			});

        return redirect()->route('projects.index')->with('berhasil', 'Your data has been successfully saved, '.$request->nama_produk);

    }

    public function edit($slug)
    {
        $findProjects = Projects::where('slug', $slug)->first();

        if(!$findProjects)
        {
          return view('backend.errors.404');
        }

        return view('backend.projects.edit', compact('findProjects'));
    }

    public function update(Request $request)
    {
        $message = [
          'name.required' => 'This field required',
          'name.max' => 'Too Long, Max 25 Char',
          'location.required' => 'This field required',
          'location.max' => 'Too Long',
          'scope.required' => 'This field required',
          'scope.max' => 'Too Long',
          'img_large.dimensions' => 'Must size 600px x 600px',
          'img_large.image' => 'Image Format Not Valid',
          'img_large.max' => 'File Size Too Big',
          'img_thumb.image' => 'Image Format Not Valid',
          'img_thumb.max' => 'File Size Too Big',
          'img_thumb.dimensions' => 'Must Size 600px x 600px',
          'post_date.required' => 'This field required',
        ];

        $validator = Validator::make($request->all(), [
          'name' => 'required|max:25',
          'location' => 'required|max:300',
          'scope' => 'required|max:500',
          'img_large' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=600,max_height=600',
          'img_thumb' => 'image|mimes:jpeg,bmp,png|max:2000|dimensions:max_width=600,max_height=600',
          'post_date' => 'required'
        ], $message);


        if($validator->fails())
        {
          return redirect()->route('projects.add')->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request) {
          $salt = str_random(4);

          $update = Projects::find($request->id);
          $update->name = $request->name;
          $update->location = $request->location;
          $update->scope     = $request->scope;
          if($request->has('img_large'))
          {
            $image = $request->file('img_large');
            $img_large = str_slug($request->name,'-').'-main-'.$salt. '.' . $image->getClientOriginalExtension();
            $upload1 = Image::make($image)->save('amadeo/images/projects/'. $img_large);

            $update->img_large = $img_large;
          }
          $update->img_large_alt = str_slug($request->name,'-');
          if($request->has('img_thumb'))
          {
            $image_kanan = $request->file('img_thumb');
            $img_thumb = str_slug($request->name,'-').'-thumb-'.$salt. '.' . $image_kanan->getClientOriginalExtension();
            $upload2 = Image::make($image_kanan)->save('amadeo/images/projects/'. $img_thumb);

            $update->img_thumb = $img_thumb;
          }
          $update->img_thumb_alt = str_slug($request->name,'-');
          $update->post_date = $request->post_date;
          $update->flag_publish = $request->flag_publish or 'N';
          $update->slug = str_slug($request->name,'-');
          $update->update();

          $log = new AccessLog;
          $log->actor = Auth::user()->id;
          $log->action = 'Edit Projects '.$request->name;
          $log->save();
        });

        return redirect()->route('projects.index')->with('berhasil', 'Your data has been successfully updated, '.$request->nama_produk);

    }

    public function publish($id)
    {
        $set = Projects::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        if ($set->flag_publish == "Y") {
          $set->flag_publish = "N";
          $set->update();

          $log = new AccessLog;
          $log->actor = Auth::user()->id;
          $log->action = 'Unpublish Project '.$set->name;
          $log->save();

          return redirect()->route('projects.index')->with('berhasil', 'Successfully unpublished project '.$set->name);
        }else{
          $set->flag_publish = "Y";
          $set->update();

          $log = new AccessLog;
          $log->actor = Auth::user()->id;
          $log->action = 'Publish Data Project '.$set->name;
          $log->save();

          return redirect()->route('projects.index')->with('berhasil', 'Successfully published '.$set->name);
        }
    }

    public function delete($id)
    {
        $set = Projects::find($id);

        if(!$set){
          return view('backend.errors.404');
        }

        DB::transaction(function() use($set){
          File::delete('amadeo/images/projects/' .$set->img_large);
          File::delete('amadeo/images/projects/' .$set->img_thumb);
          $set->delete();

          $log = new AccessLog;
          $log->actor = Auth::user()->id;
          $log->action = 'Delete Project '.$set->name;
          $log->save();
        });

        return redirect()->route('projects.index')->with('berhasil', 'Successfully deleted project '.$set->name);
    }

}
