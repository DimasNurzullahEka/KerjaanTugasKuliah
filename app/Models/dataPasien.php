<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPasien extends Model
{
    use HasFactory;
    protected $table = 'data_pasiens';

    protected $fillable = ['nama', 'riwayat_penyakit', 'dokter_id', 'jadwal_kunjungan'];

    public function dokter()
    {
        return $this->belongsTo(dataDokter::class);
    }
}
