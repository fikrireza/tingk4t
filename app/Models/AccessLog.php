<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $table = 'amd_access_log';

    protected $fillable = ['actor','action'];

    public function actor()
    {
        return $this->belongsTo('App\Models\User', 'actor');
    }
}
