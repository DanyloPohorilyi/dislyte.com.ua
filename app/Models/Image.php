<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'alt',
        'title',
        'caption',
    ];

    /**
     * Store and optionally resize an image.
     *
     * @param string $path The uploaded image file
     * @param string $destination The destination directory where the image should be saved
     * @param string|null $alt The alt text for the image (optional)
     * @param string|null $title The title attribute for the image (optional)
     * @param string|null $caption The caption for the image (optional)
     * @param int|null $height The desired height of the image (optional)
     * @param int|null $width The desired width of the image (optional)
     * @return string The path to the saved image
     */
    public static function storeImage($path, $destination, $alt = null, $title = null, $caption = null, $height = null, $width = null)
    {
        // Generate a unique filename
        $filename = uniqid() . '.' . pathinfo($path, PATHINFO_EXTENSION);

        // Store the image in the specified destination directory
        $storedPath = Storage::putFileAs('public/' . $destination, $path, $filename);

        // Optionally resize the image
        if ($height && $width) {
            $resizedPath = self::resizeImage(storage_path('app/' . $storedPath), $height, $width);
        }

        // Return the path to the saved image
        return $storedPath;
    }

    /**
     * Resize an image to the specified dimensions.
     *
     * @param string $path The path to the image file
     * @param int $height The desired height of the image
     * @param int $width The desired width of the image
     * @return string The path to the resized image
     */
    private static function resizeImage($path, $height, $width)
    {
        // Load the image using Intervention Image
        $image = InterventionImage::make($path);

        // Resize the image to the specified dimensions
        $image->resize($width, $height);

        // Save the resized image
        $resizedPath = $path . '_resized'; // Define a new path for the resized image
        $image->save($resizedPath);

        // Return the path to the resized image
        return $resizedPath;
    }
}
