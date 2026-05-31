<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komisariat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'singkatan', 'kampus', 'basis',
        'deskripsi', 'logo', 'warna_gradient', 'emoji',
        'jumlah_kader', 'jumlah_proker',
        'kontak_wa', 'instagram',
        'urutan', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getBasisLabelAttribute(): string
    {
        return match($this->basis) {
            'ums'       => 'Berbasis UMS',
            'pesantren' => 'Berbasis Pesantren',
            default     => 'Lainnya',
        };
    }
}
