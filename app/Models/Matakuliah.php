<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliahs';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester'
    ];

    /**
     * Relasi: Satu Matakuliah memiliki banyak Mahasiswa
     */
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'matakuliah_id');
    }
}