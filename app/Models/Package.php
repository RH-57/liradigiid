<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_id', 'name', 'description', 'price', 'original_price',
        'discount', 'is_popular', 'status',
    ];

    protected $casts = [
        'is_popular' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function includes()
    {
        return $this->hasMany(PackageInclude::class);
    }

    public function excludes()
    {
        return $this->hasMany(PackageExclude::class);
    }
}
