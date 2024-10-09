<?php

namespace App\Trait;

use App\Interface\Sluggable;
use Illuminate\Support\Str;

trait HasSlug
{
    public function slugColumn(): string
    {
        return 'slug';
    }

    public static function generateUniqueSlug(string $attribute): string
    {
        $couter = 1;
        $slug = Str::slug($attribute);
        $originalSlug = $slug;

        while (self::where('slug', $slug)->exists()) {
            $slug = $originalSlug . "-" . $couter;
            $couter++;
        }

        return $slug;
    }

    protected static function bootHasSlug(): void
    {
        self::creating(function (Sluggable $model) {
            $model->{$model->slugColumn()} = static::generateUniqueSlug($model->{$model->slugAttribute()});
        });
    }
}
