<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }
}
