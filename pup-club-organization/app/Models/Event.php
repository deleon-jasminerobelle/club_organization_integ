<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'organization_id',
        'user_id',
        'location',
        'venue',
        'latitude',
        'longitude',
        'type',
        'is_public',
        'featured_image',
        'status',
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime',
        'is_public' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    protected $appends = [
        'featured_image_url',
    ];

    public function getFeaturedImageUrlAttribute()
    {
        if (empty($this->featured_image)) {
            return null;
        }

        // If it's already an absolute URL, return as-is
        if (preg_match('/^https?:\/\//i', $this->featured_image) === 1) {
            return $this->featured_image;
        }

        // Ensure a proper URL for the stored path
        return url($this->featured_image);
    }
}
