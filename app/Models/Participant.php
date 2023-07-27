<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $attributes = [
        'status' => 'Tidak Aktif',
    ];

    public function diklat()
    {
        return $this->belongsTo(Diklat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
