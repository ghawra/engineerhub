<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class pelamar extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'alamat',
        'asal_kota',
        'cv',
        'ijazah',
        'kelamin',
        'pengalaman_kerja',
        'ktp',
        'foto_muka',
        'ska',
        'tanggal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
