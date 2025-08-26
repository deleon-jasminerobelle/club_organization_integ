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
}
