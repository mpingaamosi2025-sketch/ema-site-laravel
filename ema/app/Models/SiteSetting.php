<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    public $timestamps = false;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::query()->where('key', $key)->first();

        if (! $setting) {
            return $default;
        }

        $value = $setting->value;

        if (is_string($value) && preg_match('/^\s*\[.*\]|^\s*\{.*\}\s*$/s', $value)) {
            $decoded = json_decode($value, true);

            return json_last_error() === JSON_ERROR_NONE ? $decoded : $value;
        }

        return $value;
    }

    public static function set(string $key, mixed $value, ?string $group = 'general'): self
    {
        $payload = is_array($value) || is_object($value)
            ? json_encode($value, JSON_THROW_ON_ERROR)
            : (string) $value;

        $record = static::query()->where('key', $key)->first();

        if ($record) {
            $record->value = $payload;
            $record->group = $group ?? $record->group;
            $record->save();

            return $record;
        }

        return static::query()->create([
            'key' => $key,
            'value' => $payload,
            'group' => $group ?? 'general',
        ]);
    }

    public static function asArray(): array
    {
        return static::query()->pluck('value', 'key')->mapWithKeys(function ($value, $key) {
            return [$key => $value];
        })->all();
    }
}
