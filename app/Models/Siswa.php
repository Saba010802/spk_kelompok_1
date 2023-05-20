<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    //protected $primaryKey = 'id';

    protected $fillable = [
        'nama', 'jenis_kelamin', 'kelas', 'jurusan'
    ];

    // public function nilaiSiswa()
    // {
    //     return $this->hasMany(NilaiSiswa::class, 'id_siswa', 'id');
    // }
}
