<?php

namespace App\Traits;

use Request;
use Intervention\Image\Facades\Image;
use ImageOptimizer;

trait ImageUploader
{

    public static function bootImageUploader()
    {

        static::deleting(function($model) {
            $directory = $model->getBaseDirectory() . $model->getRecordDirectory();
            $model->deleteImageDirectory($directory);
        });
    }

    private function getUploadDirectory($imageDir){
        return $this->getBaseDirectory() . $this->getRecordDirectory() . $imageDir . "/";
    }

    private function getBaseDirectory(){

        $basePath = "/uploads/" . $this->uploaderBaseDirectory;
        if(substr($basePath, -1) != "/"){
            $basePath = $basePath . "/";
        }
        return $basePath;
    }

    private function getRecordDirectory(){
        return $this->__get('id') . "/";
    }

    private function deleteImageDirectory($imageDir){
        \Illuminate\Support\Facades\File::deleteDirectory(public_path($imageDir));
    }

    public function uploadImage($inputname, $fieldname){

        $imageDir = $this->getUploadDirectory($fieldname);
        if(Request::has($inputname) && Request::get($inputname) != ""){

            $file = Request::file($inputname);

            $this->deleteImageDirectory($imageDir);
            if (!is_dir(public_path($imageDir))) {
                mkdir(public_path($imageDir), 0777, true);
            }
            $filename = uniqid() . "." . $file->getClientOriginalExtension();

            $file->move(public_path($imageDir), $filename);

            ImageOptimizer::optimize(public_path($imageDir) . $filename);

            return $imageDir . $filename;
        }

        return $this->__get($fieldname);

    }

    public function uploadDropzoneImage($inputname, $fieldname){

        $imageDir = $this->getUploadDirectory($fieldname);

        if(Request::has($inputname)){

            $this->deleteImageDirectory($imageDir);
            if (!is_dir(public_path($imageDir))) {
                mkdir(public_path($imageDir), 0777, true);
            }

            $resourceJson = json_decode(Request::get($inputname));

            $data = $resourceJson->data;
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $image = base64_decode($data);

            $base64 = $resourceJson->data;
            $filename = uniqid() . "." . $this->getImageExtension($base64);

            file_put_contents(public_path($imageDir) . $filename, $image);

            ImageOptimizer::optimize(public_path($imageDir) . $filename);

            return $imageDir . $filename;

        }else if(Request::has('image_removed') && Request::get('image_removed') == "true"){
            $this->deleteImageDirectory($imageDir);
            return null;
        }

        return $this->__get($fieldname);

    }

    private function getImageExtension($data){
        $image = Image::make($data);
        return mime2ext($image->mime);
    }

}
