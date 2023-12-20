<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datadokter extends Model
{
    protected $table = 'datadokters';
    protected $guarded = ['id'];
    public function getFotoDokterAttribute(){
        return $this->foto == null?'':asset('foto_dokter/'.$this->foto);
    }
}
