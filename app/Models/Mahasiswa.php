<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;
use App\Models\User;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'matakuliah_id',
        'user_id' // tambahkan ini
    ];

    /**
     * Relasi: Mahasiswa belongsTo Matakuliah
     */
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    /**
     * Relasi: Mahasiswa belongsTo User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}