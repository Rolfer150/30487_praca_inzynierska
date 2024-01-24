<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    protected $fillable = ['name', 'slug'];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeBrandFilter($query)
    {
        return $query
            ->join('brand_company', 'brands.id', '=', 'brand_company.brand_id')
            ->select('brands.id', 'brands.name', DB::raw('count(*) as brandSum'))
            ->groupBy('brands.id')
            ->get();
    }
}
