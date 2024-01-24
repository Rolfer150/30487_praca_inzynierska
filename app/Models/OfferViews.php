<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferViews extends Model
{
    protected $fillable = ['ip_address, user_agent, offer_id, user_id'];
}
