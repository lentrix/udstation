<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // use HasFactory;

    protected $fillable = ['user_id','course_no','description','schedule'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function modules() {
        return $this->hasMany('App\Models\Module')->orderBy('date_from');
    }

    public function getModuleCountAttribute() {
        return $this->modules->count();
    }
}
