<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    // field yang tidak boleh di isi
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_gol');
    }
}
