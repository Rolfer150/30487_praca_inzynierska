<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workmode extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address, user_agent, offer_id, user_id'];
}
