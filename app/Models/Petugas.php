<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'petugas';

    protected $fillable = ['nama', 'username', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class);
    }
}
