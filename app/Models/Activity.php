<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['module_id', 'title', 'description'];

    public function module() {
        return $this->belongsTo('App\Models\Module');
    }
}
