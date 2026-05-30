<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Konten extends Model
{
    use HasFactory;

    protected $fillable = [
        'bidang_id',
        'user_id',
        'jenis',
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'thumbnail',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi',
        'status',
        'is_featured',
        'views',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($konten) {
            if (empty($konten->slug)) {
                $konten->slug = Str::slug($konten->judul) . '-' . uniqid();
            }
        });
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function medias()
    {
        return $this->hasMany(Media::class)->orderBy('urutan');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeByJenis($query, $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    public function getJenisLabelAttribute(): string
    {
        return match($this->jenis) {
            'berita' => 'Berita',
            'kegiatan' => 'Kegiatan',
            'program_kerja' => 'Program Kerja',
            default => $this->jenis,
        };
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
