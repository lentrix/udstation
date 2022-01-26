<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ZipArchive;

class Activity extends Model
{
    protected $fillable = ['module_id', 'title', 'description'];

    public function module() {
        return $this->belongsTo('App\Models\Module');
    }

    public function pack() {
        $path = public_path() . "/activity_files/$this->id/";
        $zipcreated = $path . "/" . $this->module->subject->course_no . "_" . $this->title . ".zip";

        if(file_exists($zipcreated))
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

        return $zipcreated;
    }

    public function getFileCountAttribute() {
        $directory = public_path() . "/activity_files/" .$this->id . "/";

        $filecount = 0;

        $files2 = glob($directory . "*");

        if($files2) {
            $filecount = count($files2);
        }

        // if($filecount>0) $filecount--;

        return $filecount==1 ? "$filecount file" : "$filecount files";
    }
}
