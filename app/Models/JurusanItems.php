<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Peserta;

class JurusanItems extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id','id');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id','id');
    }

}
