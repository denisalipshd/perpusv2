<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengembalian extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'peminjaman_id', 'petugas_id', 
        'tgl_pengembalian', 'denda'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
