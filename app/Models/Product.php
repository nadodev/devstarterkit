<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'discount_price',
        'image',
        'gallery',
        'type',
        'category',
        'features',
        'benefits',
        'is_active',
        'is_featured',
        'sort_order',
        'button_text',
        'button_url',
    ];

    protected $casts = [
        'gallery' => 'array',
        'features' => 'array',
        'benefits' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to only include products.
     */
    public function scopeProducts($query)
    {
        return $query->where('type', 'product');
    }

    /**
     * Scope a query to only include services.
     */
    public function scopeServices($query)
    {
        return $query->where('type', 'service');
    }

    /**
     * Get the formatted price.
     */
    public function getFormattedPriceAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    /**
     * Get the formatted discount price.
     */
    public function getFormattedDiscountPriceAttribute()
    {
        return $this->discount_price ? 'R$ ' . number_format($this->discount_price, 2, ',', '.') : null;
    }

    /**
     * Get the discount percentage.
     */
    public function getDiscountPercentageAttribute()
    {
        if ($this->discount_price && $this->discount_price < $this->price) {
            return round((($this->price - $this->discount_price) / $this->price) * 100);
        }
        return 0;
    }

    /**
     * Get the final price (discount price if available, otherwise regular price).
     */
    public function getFinalPriceAttribute()
    {
        return $this->discount_price ?: $this->price;
    }

    /**
     * Get the formatted final price.
     */
    public function getFormattedFinalPriceAttribute()
    {
        return 'R$ ' . number_format($this->final_price, 2, ',', '.');
    }
}