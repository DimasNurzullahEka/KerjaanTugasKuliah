<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataDokter extends Model
{
    use HasFactory;
    protected $table = 'data_dokters';

    protected $fillable = ['nama', 'spesialisasi'];

    public function pasien()
    {
        return $this->hasMany(dataPasien::class);
    }
}
