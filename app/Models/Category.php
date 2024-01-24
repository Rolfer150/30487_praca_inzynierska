<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
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
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeCategoryFilter($query)
    {
        return $query
            ->join('offers', 'categories.id', '=', 'offers.category_id')
            ->where('offers.active', '=', 1)
            ->select('categories.id', 'categories.name', DB::raw('count(*) as categorySum'))
            ->groupBy('categories.id')
            ->orderBy('categories.id')
            ->get();
    }
}
