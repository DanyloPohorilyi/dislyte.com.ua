<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_id',
    ];

    /**
     * Get the image associated with the element.
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
