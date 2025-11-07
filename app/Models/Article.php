<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'meta_image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'og_title',
        'og_description',
        'canonical_url',
        'robots',
        'schema_json',
        'status',
        'views',
        'reading_time',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'views' => 'integer',
        'reading_time' => 'integer',
        'schema_json' => 'array',
    ];

    /**
     * RELATION: Article belongs to User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: Get only published articles
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /**
     * Accessors: Fallback OG data
     */
    public function getOgTitleAttribute($value)
    {
        return $value ?: $this->meta_title ?: $this->title;
    }

    public function getOgDescriptionAttribute($value)
    {
        return $value ?: $this->meta_description ?: Str::limit(strip_tags($this->content), 160);
    }

    /**
     * Increment article views
     */
    public function incrementViews()
    {
        $this->increment('views');
    }
}
