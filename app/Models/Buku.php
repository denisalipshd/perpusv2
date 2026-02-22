<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['judul', 'pengarang', 'tahun_terbit', 'jumlah_buku', 'cover'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
