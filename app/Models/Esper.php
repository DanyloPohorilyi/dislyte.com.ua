<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Esper extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'god',
        'rarity',
        'element_id',
        'role',
        'short_description',
        'quote',
        'age',
        'birthday',
        'height',
        'favorites',
        'identity',
        'affiliation',
        'game_advice',
        'equipment_advice1_id',
        'equipment_advice2_id',
        'equipment_advice3_id',
        'to_upgrade_stats',
        'sprite1_id',
        'sprite2_id',
        'icon_id',
        'resonance_img_id',
    ];

    /**
     * Get the element associated with the esper.
     */
    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class);
    }

    /**
     * Get the equipment advice 1 associated with the esper.
     */
    public function equipmentAdvice1(): BelongsTo
    {
        return $this->belongsTo(EquipmentAdvice::class, 'equipment_advice1_id');
    }

    /**
     * Get the equipment advice 2 associated with the esper.
     */
    public function equipmentAdvice2(): BelongsTo
    {
        return $this->belongsTo(EquipmentAdvice::class, 'equipment_advice2_id');
    }

    /**
     * Get the equipment advice 3 associated with the esper.
     */
    public function equipmentAdvice3(): BelongsTo
    {
        return $this->belongsTo(EquipmentAdvice::class, 'equipment_advice3_id');
    }

    /**
     * Get the sprite 1 associated with the esper.
     */
    public function sprite1(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'sprite1_id');
    }

    /**
     * Get the sprite 2 associated with the esper.
     */
    public function sprite2(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'sprite2_id');
    }

    /**
     * Get the icon associated with the esper.
     */
    public function icon(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'icon_id');
    }

    /**
     * Get the resonance image associated with the esper.
     */
    public function resonanceImg(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'resonance_img_id');
    }

    // Method to retrieve information about Esper (id, name, god, and path to the image)
    public static function getShortEsperInfo()
    {
        return self::with('icon:id,path')->get(['id', 'name', 'god', 'icon_id']);
    }
}
