<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManagerStatic as Image;

class FileManager extends Model
{
    /**
     * Getting All The Files From Specified Location
     * @param String $dir Location String
     *
     */
    protected static function files($dir){
        $files = array();
        $fileList = Storage::allFiles($dir);

       foreach($fileList as $file){
            $url = Storage::url($file);
            $time = Storage::lastModified($file);
            $imgFile = [
                'time' => $time,
                'url' => $url,
                'name' => $file
            ];
        array_push($files,$imgFile);
       }

       $sortedFiles = FileManager::sortFiles($files);

        return $sortedFiles;
    }

    /**
     * Sort The File Array By Time
     * @param Array $files
     *
     */
    private static function sortFiles(array $files){
        $files_length = count($files);
        $fileArray = $files;

        do{
            $swapped = false;

            for($i = 0;$i < $files_length - 1;$i++){
                if($fileArray[$i]['time'] < $fileArray[$i + 1]['time']){
                    $temp = $fileArray[$i];
                    $fileArray[$i] = $fileArray[$i + 1];
                    $fileArray[$i + 1] = $temp;

                    $swapped = true;
                }
            }
        }while($swapped);

        return $fileArray;
    }

    protected static function upload($path,$file){
        $file = $file;
        $fileName = $file->getClientOriginalName();
        $uniqueID = time();
        $newFileName = $uniqueID.$fileName;
        /**
         * Upload Image Thumbnail
         *
         */
        $imageResize = Image::make($file->getRealPath());
        $imageResize->resize(400,400);
        $imageResize->save(public_path().'/storage/images/thumb/'.$newFileName);

        /**
         * Store Original Image
         *
         */
        $file->storeAs($path,$newFileName,'local');
    }

    /**
     * Delete Image And Image Thumbnail Files
     */
    protected static function deleteFiles(array $files){
        $thumbArray = $files;
        $imgArray = array();

        foreach($thumbArray as $thumb){
            $img = str_replace('/thumb/','/',$thumb);
            array_push($imgArray,$img);

            Storage::delete($thumb);
        }

        foreach($imgArray as $img){
            Storage::delete($img);
        }

        return $msg = "success";
    }

    /**
     * Ajax Search Result
     *
     */
    protected static function search($query,$dir){
        $files = self::files($dir);
        $imagesArray = array();

        foreach($files as $file){
            $name = str_replace('-',' ',$file['name']);
            if(strpos($name,$query) != false){
                array_push($imagesArray,$file);
            }
        }

        if(count($imagesArray) > 0){
            return $imagesArray;
        }else{
            return 0;
        }
    }
}
