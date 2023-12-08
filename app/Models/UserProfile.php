<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'surname', 'image_path', 'birth_date', 'phone_number', 'education', 'school', 'short_description', 'description', 'address'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
