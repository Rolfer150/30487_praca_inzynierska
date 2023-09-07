<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Workmode extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeWorkmodeFilter($query)
    {
        return $query
            ->join('offers', 'workmodes.id', '=', 'offers.workmode_id')
            ->where('offers.active', '=', 1)
            ->select('workmodes.id', 'workmodes.name', DB::raw('count(*) as workmodeSum'))
            ->groupBy('workmodes.id')
            ->get();
    }
}
