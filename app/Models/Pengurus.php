<?php
// ==========================================
// app/Models/Pengurus.php
// ==========================================
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    protected $table = 'pengurus';

    protected $fillable = [
        'nama', 'jabatan', 'periode', 'bidang_id',
        'tipe', 'foto', 'quote', 'asal_kampus',
        'urutan', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function getTipeLabelAttribute(): string
    {
        return match($this->tipe) {
            'ketua_umum'    => 'Ketua Umum',
            'pengurus_inti' => 'Pengurus Inti',
            'admin_bidang'  => 'Admin Bidang',
            default         => $this->tipe,
        };
    }
}
