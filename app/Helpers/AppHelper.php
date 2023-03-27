<?php

namespace App\Helpers;


class AppHelper
{
    public static function instance()
    {
        return new AppHelper();
    }
    
    public function add_image($path, $imageName, $request)
    {
        if (!\File::exists(public_path($path))) {

            \File::makeDirectory(public_path($path), $mode = 0777, true, true);
        }
        $fileName = time() . $imageName->getClientOriginalName();
        $request->file('image')->move(public_path($path), $fileName);

        return $fileName;
    }
    public function delete_image($path)
    {
        if (\File::exists($path)) {
            \File::delete($path);
        }
        return true ;
    }
}
