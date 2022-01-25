<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZipArchive;

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

    public function getFileCountAttribute() {
        $directory = public_path() . "/module_files/" .$this->id . "/";

        $filecount = 0;

        $files2 = glob($directory . "*");

        if($files2) {
            $filecount = count($files2);
        }

        return $filecount==1 ? "$filecount file" : "$filecount files";
    }

    public function pack() {
        $path = public_path() . "/module_files/$this->id/";
        $zipcreated = $path . "/" . $this->subject->course_no . "_" . $this->title . ".zip";

        unlink($zipcreated);

        $zip = new ZipArchive;

        if($zip -> open($zipcreated, ZipArchive::CREATE) == TRUE) {
            $dir = opendir($path);
            while($file = readdir($dir)) {
                if(is_file($path.$file)) {
                    $zip->addFile($path.$file, $file);
                }
            }
            $zip->close();
        }
    }
}
