<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;
    protected $table = "jenis_surats";
    protected $fillable = [
        'name',
    ];

    public function surat_masuk()
    {
        return $this->hasMany(SuratMasuk::class, 'jenis_id');
    }

    public function surat_keluar()
    {
        return $this->hasMany(SuratKeluar::class, 'jenis_id');
    }
}
