<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'konten_id',
        'file_path',
        'file_name',
        'mime_type',
        'tipe',
        'ukuran',
        'urutan',
    ];

    public function konten()
    {
        return $this->belongsTo(Konten::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }

    public function isVideo(): bool
    {
        return $this->tipe === 'video';
    }

    public function isFoto(): bool
    {
        return $this->tipe === 'foto';
    }
}
