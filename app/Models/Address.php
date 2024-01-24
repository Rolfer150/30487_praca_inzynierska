<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    protected $fillable = ['city', 'street', 'home_nr', 'flat_nr', 'zip_code', 'latitude', 'longitude'];

    public function addresses(): HasOne
    {
        return $this->hasOne(Company::class);
    }
}
