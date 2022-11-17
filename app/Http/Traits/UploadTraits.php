<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait UploadTraits
{

    public function uploadFile($file, $path, $fileName,  $oldFile = null)
    {
        $file->storeAs($path, $fileName, 'public');
        // $file->move(public_path('/'.$path), $fileName);

        if ($oldFile) {

            File::delete($oldFile);
        }
    }

    public function uploadFileInS3($file, $path,  $oldFile = null)
    {

        $path = $file->storePublicly($path, 's3');
        Storage::disk('s3')->url($path);
        $fileData = explode('/', $path);
        $fileName = end($fileData);


        if (!is_null($oldFile)) {
            if (Storage::disk('s3')->exists($path . '/' . $oldFile)) {
                Storage::disk('s3')->delete($path . '/' . $oldFile);
            }
        }
        return $fileName;
    }

    public function deleteFile($path)
    {
        if (File::exists($path)) {
            File::deleteDirectory($path);
        }
    }

    public function deleteFileInS3($fileUrl)
    {

        if (Storage::disk('s3')->exists($fileUrl)) {
            Storage::disk('s3')->delete($fileUrl);
        }
    }
}
