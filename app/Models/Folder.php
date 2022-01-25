<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public static function delete_directory($dirname) {
        if (is_dir($dirname))
          $dir_handle = opendir($dirname);
        else
          return back()->with('Error',"Folder $dirname does not exists");

        if (!$dir_handle)
            return false;

        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
                else
                    static::delete_directory($dirname.'/'.$file);
            }
        }

        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
}
