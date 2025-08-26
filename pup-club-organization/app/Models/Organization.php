<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'email',
        'facebook_page',
        'logo_path',
        'banner_path',
        'category_id',
        'is_active',
        'is_recognized',
        'established_date',
        'mission',
        'vision'
    ];

    /**
     * Get the category that owns the organization.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the news for the organization.
     */
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
