<?php
namespace App\Services;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ImageService
{
    public function uploadAndResize($image, $folder = 'uploads', $width = 400, $height = 400)
    {
        // Crear un nombre único para la imagen
        $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

        // Redimensionar la imagen
        $manager = new ImageManager(new Driver());
        $serverImage = $manager->read($image);
        $serverImage->resize($width,$height);

        $imagePath = public_path('uploads') . '/' . $imageName;
        $serverImage->save($imagePath);

        return $imageName;
    }
}
