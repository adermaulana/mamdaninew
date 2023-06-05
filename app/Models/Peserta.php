<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD

class Peserta extends Authenticatable
{
    use HasFactory;
=======
class Peserta extends Authenticatable
{
    use HasFactory;

>>>>>>> 0a6ed4774898afc8e2843b30e53313f222c83898
    protected $guarded = ['id'];
}
