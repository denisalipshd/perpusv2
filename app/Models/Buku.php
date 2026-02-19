<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = ['judul', 'pengarang', 'tahun_terbit', 'jumlah_buku', 'cover'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
