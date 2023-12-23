<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekammedis extends Model
{
    use HasFactory;
    protected $table = 'rekammedis';
    protected $guarded = ['id'];
    public function pasien()
    {
        return $this->belongsTo(Datapasien::class, 'pasien_id', 'id');
    }
    public function obat()
    {
        return $this->belongsTo(Dataobat::class, 'obat_id', 'id');
    }
    public function dokter()
    {
        return $this->belongsTo(Datadokter::class, 'dokter_id', 'id');
    }
    public function ruangan()
    {
        return $this->belongsTo(Dataruangan::class, 'ruangan_id', 'id');
    }
}
