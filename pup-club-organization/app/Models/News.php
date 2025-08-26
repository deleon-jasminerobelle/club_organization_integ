<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'organization_id',
        'user_id',
        'featured_image',
        'type',
        'is_published',
        'published_at',
        'view_count'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    
    public function incrementViewCount()
    {
        $this->increment('view_count');
        $this->save();
    }
}
