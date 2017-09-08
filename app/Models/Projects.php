<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'amd_projects';

    protected $fillable = ['name','location','scope','img_large','img_large_alt','img_thumb','img_thumb_alt','post_date','flag_publish'];
}
