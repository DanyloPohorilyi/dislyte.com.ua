<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_id',
        'number_sets',
    ];

    /**
     * Get the image associated with the equipment.
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
