<?php

namespace App\Traits;

use App\Jobs\ImageResizeJob;
use File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageResize
{

    public function prepareQueue()
    {

        $dir = 'MyImage';
        $publicPath = public_path(Storage::url($dir));
        $oneDay = 60 * 60 * 24;
        $directoryFiles = scandir($publicPath);
        $lastKey = "lastSeenIndex";
        // Cache::Set($lastKey, $oneDay, 0);
        $startIndex = Cache::remember($lastKey, $oneDay, function () use ($directoryFiles) {
            return array_key_first($directoryFiles);
        });
        $tenItems = 10;
        $endIndex = $startIndex + $tenItems;
        $endIndex = array_key_last($directoryFiles) > $endIndex ? $endIndex : array_key_last($directoryFiles);
        for ($index = $startIndex; $index < $endIndex; $index++) {
            if (preg_match('/.+\.(jpg|jpeg)/', $directoryFiles[$index])) {
                // ImageResizeJob::dispatch($publicPath . '/' . $directoryFiles[$index]);
                ImageResizeJob::dispatch($publicPath . '/' . $directoryFiles[$index])->delay(5);
            }
        }
        // echo $index;
        Cache::set($lastKey, $index);
        return true;
    }

    public function createDir(string $directory): void
    {
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }
    }

    public function ImageResize($file = '', $width = 100, $height = 100)
    {
        $publicPath = public_path(Storage::url(''));
        $savePath = $publicPath . 'resize/';
        $this->createDir($savePath);
        $extensionLocation = strrpos($file, '.');
        $extension = substr($file, $extensionLocation, strlen($file));
        $fileName = substr(
            $file,
            strrpos($file, '/') + 1,
            $extensionLocation - strrpos($file, '/') - 1
        );
        $fileName = $fileName . "_"  . $width . '*' . $height . $extension;
        $img = Image::make($file)->resize(
            $width,
            $height,
            function ($constraint) {
                $constraint->aspectRatio();
            }
        )->save($savePath . $fileName);
    }
}
