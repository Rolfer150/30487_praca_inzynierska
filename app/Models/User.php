<?php

namespace App\Models;

use App\Enums\EducationalStage;
use Carbon\Carbon;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug', 'name', 'surname', 'image_path', 'email', 'password', 'birth_date', 'phone_number', 'education', 'school',
        'short_description', 'description', 'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'education' => EducationalStage::class,
        'address' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function questionnaires(): HasMany
    {
        return $this->hasMany(Questionnaire::class);
    }

    public function offerApplications(): HasMany
    {
        return $this->hasMany(OfferApplication::class);
    }
    public function applicationFiles(): HasMany
    {
        return $this->hasMany(ApplicationFile::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('admin');
    }

    public function getURLImage()
    {
        if (str_starts_with($this->image_path, 'http')) return $this->image_path;

        return '/storage/' . $this->image_path;
    }

    public function getAge(): int
    {
        return Carbon::parse($this->birth_date)->age;
    }

    public function getAddress(string $column)
    {
        return $this->address == null ? null : $this->address[$column];
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function scopeSearch($query, $value)
    {
        $query
            ->where('name', 'like', "%{$value}%");
//            ->orWhere('data', 'like', "%{$value}%");
    }
}
