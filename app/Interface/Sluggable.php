<?php

namespace App\Interface;

interface Sluggable
{
    public function slugColumn(): string;

    public function slugAttribute(): string;

    public static function generateUniqueSlug(string $attribute): string;
}

