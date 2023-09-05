<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pernyataan;
use App\Models\Peserta;
use App\Models\JurusanItems;

class PernyataanItems extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pernyataan()
    {
        return $this->belongsTo(Pernyataan::class, 'pernyataan_id','id');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id','id');
    }

}
