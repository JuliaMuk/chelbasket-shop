<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'stock_quantity',
        'price',
        'sale_price',
        'characteristics',
        'is_new',
        'rating',
        'path_img',
        'extra_images',
        'keywords',
        'meta_description'

    ];

    protected $casts = [
        'characteristics' => 'array',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_new' => 'boolean',
        'rating' => 'decimal:1',
        'extra_images' => 'array'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function isAvailable()
    {
        return $this->stock_quantity > 0 ? true : false;
    }


    public function getPathImgUrlAttribute(): ?string
    {
        if (blank($this->path_img)) {
            return null;
        }

        $path = $this->path_img;

        // Если путь уже является URL — возвращаем как есть.
        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        // Если картинка лежит в storage/app/public — отдаем публичный URL.
        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        // Иначе считаем, что путь относится к папке public/ (как в вашем DatabaseSeeder).
        return asset($path);
    }


    public static function uniqueSlugFromName(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        if ($base === '') {
            $base = 'product';
        }

        $slug = $base;
        $suffix = 2;

        while (static::query()
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->where('slug', $slug)
            ->exists()
        ) {
            $slug = "{$base}-{$suffix}";
            $suffix++;
        }

        return $slug;
    }
}
