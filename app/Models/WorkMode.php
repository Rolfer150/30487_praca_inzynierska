<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class WorkMode extends Model
{
    protected $fillable = ['name'];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeWorkModeFilter($query)
    {
        return $query
            ->join('offers', 'work_modes.id', '=', 'offers.work_mode_id')
            ->where('offers.active', '=', 1)
            ->select('work_modes.id', 'work_modes.name', DB::raw('count(*) as workModeSum'))
            ->groupBy('work_modes.id')
            ->get();
    }
}
