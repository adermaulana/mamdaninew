<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pernyataan;

class PernyataanItems extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pernyataan()
    {
        return $this->belongsTo(Pernyataan::class, 'pernyataan_id','id');
    }
}
