<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = ['nama', 'alamat', 'no_telp'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
