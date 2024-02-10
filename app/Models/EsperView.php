<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class EsperView extends Model
{
    use HasFactory;

    protected $fillable = [
        'esper_id',
        'day',
        'month',
        'year',
        'count_views',
    ];

    // Define the relationship with the Esper model
    public function esper(): BelongsTo
    {
        return $this->belongsTo(Esper::class);
    }

    // Method to retrieve views data grouped by month
    public static function viewsByMonth(): Collection
    {
        return self::selectRaw('year, month, sum(count_views) as total_views')
            ->groupBy('year', 'month')
            ->get();
    }

    // Method to retrieve views data grouped by year
    public static function viewsByYear(): Collection
    {
        return self::selectRaw('year, sum(count_views) as total_views')
            ->groupBy('year')
            ->get();
    }
}
