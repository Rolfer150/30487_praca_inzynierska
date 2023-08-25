<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeEmploymentFilter($query)
    {
        return $query
            ->join('offers', 'employments.id', '=', 'offers.employment_id')
            ->select('employments.name', DB::raw('count(*) as employmentSum'))
            ->groupBy('employments.id')
            ->get();
    }
}
