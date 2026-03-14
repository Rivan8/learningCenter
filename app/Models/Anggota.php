<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = ['nomor_anggota','namalengkap', 'email', 'nomor_hp', 'alamat', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'foto'];
}
