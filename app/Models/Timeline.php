<?php
// ==========================================
// app/Models/Timeline.php
// ==========================================
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun', 'judul', 'deskripsi', 'urutan', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
