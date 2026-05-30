<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'singkatan',
        'deskripsi',
        'foto',
        'warna',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function kontens()
    {
        return $this->hasMany(Konten::class);
    }

    public function berita()
    {
        return $this->hasMany(Konten::class)->where('jenis', 'berita');
    }

    public function kegiatan()
    {
        return $this->hasMany(Konten::class)->where('jenis', 'kegiatan');
    }

    public function programKerja()
    {
        return $this->hasMany(Konten::class)->where('jenis', 'program_kerja');
    }
}
