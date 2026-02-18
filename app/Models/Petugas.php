<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = ['nama', 'username', 'password'];

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
