<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employment extends Model
{
    protected $fillable = ['name'];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

//    public function scopeEmploymentFilter($query)
//    {
//        return $query
//            ->join('offers', 'employments.id', '=', 'offers.employment_id')
//            ->where('offers.active', '=', 1)
//            ->select('employments.id', 'employments.name', DB::raw('count(*) as employmentSum'))
//            ->groupBy('employments.id')
//            ->orderBy('employments.id')
//            ->get();
//    }
}
