<?php
/**
 * @author Author Name: Md Morshadun Nur
 * @email  Email: morshadunnur@gmail.com
 */

namespace App\Traits;


use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

trait UploadFiles
{
    public function uploadSingle(UploadedFile $uploadedFile,string $folder = null,string $disk = 'public',bool $resize = false, int $resize_value = 120)
    {
        $temp_upload = app()->basePath('public/uploads/');

        $mime = Image::make($uploadedFile)->mime();
        switch ($mime) {
            case 'image/jpeg':
                $extension = '.jpg';
                break;
            case 'image/png':
                $extension = '.png';
                break;
            case 'image/gif':
                $extension = '.gif';
                break;
            default:
                $extension = 'jpg';
                break;
        }

        $file_name = pathinfo($uploadedFile->getClientOriginalName(),PATHINFO_FILENAME);

        // Remove unwanted characters
        $file_name = preg_replace("/[^A-Za-z0-9 ]/", '', $file_name);
        $file_name = preg_replace("/\s+/", '-', $file_name);
        $file_name = $file_name.'_'.time() . $extension;

        try {
            Image::make($uploadedFile)->orientate()->save($temp_upload . $file_name)->destroy();
            $path = app('filesystem')->disk($disk)
                ->putFileAs(
                    $folder,
                    new File($temp_upload . $file_name),
                    $file_name,
                    'public'
                );
            if ($resize){
                Image::make($uploadedFile)->orientate()->resize($resize_value, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($temp_upload . $file_name)->destroy();
                $resized_path = app('filesystem')->disk($disk)
                    ->putFileAs(
                        $folder.'/resized',
                        new File($temp_upload . $file_name),
                        $file_name,
                        'public'
                    );
            }

        } catch (\Exception $exception) {
            app('log')->debug('error occurred in ', []);
            return [];
        }
        if (!$path) {
            app('log')->debug('image was not uploaded. Local Space Err', []);
            return [];
        } else {
            unlink($temp_upload . $file_name);
            return [
                'full_path'    => $path,
                'resized_path' => $resize ? $resized_path : null,
                'file_name'    => $file_name,
                'uploaded_dir' => '/' . pathinfo($path, PATHINFO_DIRNAME)
            ];
        }
    }
}