<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{

    protected $fillable = [
        'id_siswa', 'id_mapel', 'nilai_mapel', 'nilai_keaktifan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function mapel()
    {
        return $this->belongsTo(SchoolSubject::class, 'subject_id', 'id');
    }
}
