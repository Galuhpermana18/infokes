<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekammedis extends Model
{
    use HasFactory;
    protected $table = 'rekammedis';
    protected $guarded = ['id'];
    public function pasien(){
        return $this->belongsTo(Datapasien::class,'id','pasien_id');
        
    }
}
