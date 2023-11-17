<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peserta(){
        return $this->belongsTo(Peserta::class,'peserta_id','id');
    }
}
