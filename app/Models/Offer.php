<?php

namespace App\Models;

use App\Enums\PaymentType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'image_path', 'description', 'tasks', 'expectancies', 'additionals', 'assurances', 'payment',
        'salary', 'min_salary', 'max_salary', 'vacancy', 'active', 'published_at', 'user_id', 'category_id',
        'employment_id', 'contract_id', 'work_mode_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'tasks' => 'array',
        'expectancies' => 'array',
        'additionals' => 'array',
        'assurances' => 'array',
        'payment' => PaymentType::class
    ];

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

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

    public function contract(): BelongsTo
    {
        return $this->BelongsTo(Contract::class);
    }

    public function workMode(): BelongsTo
    {
        return $this->BelongsTo(WorkMode::class);
    }

    public function offerApplications(): HasMany
    {
        return $this->hasMany(OfferApplication::class);
    }

    public function questionnaire(): HasOne
    {
        return $this->hasOne(Questionnaire::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    public function userHasApplied(): bool
    {
        $offerApplication = $this->offerApplications();
        return auth()->user()->id == $offerApplication->value('user_id')
            && $this->id == $offerApplication->value('offer_id');
    }
    public function isUsersOffer(): bool
    {
        return auth()->user()->id == $this->user_id;
    }

    public function getURLImage()
    {
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }
        return '/storage/' . $this->image_path;
    }

    public function shortDescription(): string
    {
        return Str::words(strip_tags($this->description), 15);
    }

    public function formatedDate()
    {
        return $this->created_at->format('F h:i Y');
    }

    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }
}
