<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = ['nama'];

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
