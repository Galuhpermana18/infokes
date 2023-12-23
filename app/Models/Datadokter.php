<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datadokter extends Model
{
    protected $table = 'datadokters';
    protected $guarded = ['id'];
    public function getFotoDokterAttribute(){
        return $this->foto == ''? 'https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg':asset('foto_dokter/'.$this->foto);
    }
}
