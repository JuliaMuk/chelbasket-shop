<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'path_img',
        'keywords',
        'meta_description'
    ];

    public function getPathImgUrlAttribute(): ?string
    {
        if (blank($this->path_img)) {
            return null;
        }

        $path = $this->path_img;

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return asset($path);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
