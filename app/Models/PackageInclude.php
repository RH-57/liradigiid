<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageInclude extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'feature',
    ];

    /**
     * Relasi ke model Package
     * Satu include hanya milik satu package.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
