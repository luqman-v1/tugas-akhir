<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelayananIGD extends Model
{
    protected $table = 'pelayanan_rawatigd';

    protected $fillable = ['jenisKasus','tindakanResuitasi','cramsScore','anamnesis
pemeriksaanFisik','pemeriksaanStatus','pemeriksaanLaboratorium','pemeriksaanRadiologi','diagonosisAwal','terapiTindakan','diagnosisAkhir','tindakanLanjut'];

	 public function getRawatIGDs(){
        return $this->belongsTo('App\Rawat_IGD');
    }
}
