<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image_path', 'description', 'salary', 'min_salary', 'max_salary', 'vacancy',
        'active', 'published_at', 'user_id', 'category_id', 'employment_id', 'employmentcontract_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function employment(): BelongsTo
    {
        return $this->belongsTo(Employment::class);
    }

    public function employmentcontract(): BelongsTo
    {
        return $this->BelongsTo(EmploymentContract::class);
    }
    public function payment(): BelongsTo
    {
        return $this->BelongsTo(Payment::class);
    }

    public function getURLImage()
    {
        if (str_starts_with($this->image_path, 'http'))
        {
            return $this->image_path;
        }
        return '/storage/' . $this->image_path;
    }

    public function shortDescription(): string
    {
        return Str::words(strip_tags($this->description), 15);
    }
}
