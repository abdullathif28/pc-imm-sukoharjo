<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'label', 'group', 'tipe'];

    /**
     * Helper statis: ambil nilai setting berdasarkan key
     * Contoh: Setting::get('nama_organisasi')
     */
    public static function get(string $key, string $default = ''): string
    {
        $setting = static::where('key', $key)->first();
        return $setting?->value ?? $default;
    }
}
