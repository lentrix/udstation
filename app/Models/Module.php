<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    // use HasFactory;

    protected $casts = [
        'date_from' => 'datetime',
        'date_to' => 'datetime',
    ];

    protected $fillable = ['subject_id','title','date_from','date_to'];

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function getFolderPathAttribute() {
        return "to follow...";
    }
}
