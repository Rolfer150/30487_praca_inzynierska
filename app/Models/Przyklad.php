<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Przyklad extends Model
{
    public function modyfikacjaDanych()
    {
        return $this->pole_tekstowe = $this->pole_tekstowe . '+ dodana część do oryginału';
    }
}
