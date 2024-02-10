<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentAdvice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'set_four_id',
        'set_two_id',
        'description',
        'stats_to_upgrade',
    ];

    /**
     * Get the equipment for the advice set of four.
     */
    public function fourRelics()
    {
        return $this->belongsTo(Equipment::class, 'set_four_id');
    }

    /**
     * Get the equipment for the advice set of two.
     */
    public function twoRelics()
    {
        return $this->belongsTo(Equipment::class, 'set_two_id');
    }

    /**
     * Accessor for stats_to_upgrade attribute.
     * Convert JSON string to associative array.
     */
    public function getStatsToUpgradeAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for stats_to_upgrade attribute.
     * Convert array to JSON string.
     */
    public function setStatsToUpgradeAttribute($value)
    {
        $this->attributes['stats_to_upgrade'] = json_encode($value);
    }
}
