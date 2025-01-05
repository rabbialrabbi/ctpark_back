<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

abstract class Controller
{
    public function storeFile($file,$module,$id=null)
    {
        $path = $module ;

        if($id){
            $path = $module . '/' . $id ;
        }
        $name = $module . '_' . mt_rand(1000,9999) . '.' .  $file->getClientOriginalExtension();


        $file->move('storage/'.$path,$name);

        $path = $path . '/' . $name ;

        return $path;
    }
}
