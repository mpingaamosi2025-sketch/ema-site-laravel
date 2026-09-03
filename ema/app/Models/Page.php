<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'content',
        'image_path',
        'is_published',
    ];

    protected $casts = [
        'content' => 'array',
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function value(string $key, mixed $default = null): mixed
    {
        return data_get($this->content, $key, $default);
    }

    public function visualOverrides(): array
    {
        return $this->value('visual_overrides', []);
    }
}
