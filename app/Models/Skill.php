<?php

namespace App\Models;

use App\Enums\ProgrammingSkills;
use App\Enums\SkillLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 'skill', 'skill_level'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'skill' => ProgrammingSkills::class,
        'skill_level' => SkillLevel::class,
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
