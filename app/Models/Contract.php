<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function scopeContractFilter($query)
    {
        return $query
            ->join('offers', 'contracts.id', '=', 'offers.contract_id')
            ->select('contracts.name', DB::raw('count(*) as contractSum'))
            ->groupBy('contracts.id')
            ->get();
    }
}
