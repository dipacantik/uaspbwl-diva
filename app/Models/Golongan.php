<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;

    protected $table = 'golongan';

    // field yang tidak boleh di isi
    protected $guarded = [
        'id'
    ];

    public function pelanggan()
    {
        return $this->hasMany(Golongan::class);
    }
}
