<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PelayananIGD extends Model
{
	    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $table = 'pelayanan_rawatigd';

    protected $fillable = ['jenisKasus','tindakanResuitasi','cramsScore','anamnesis
pemeriksaanFisik','pemeriksaanStatus','pemeriksaanLaboratorium','pemeriksaanRadiologi','diagonosisAwal','terapiTindakan','diagnosisAkhir','tindakanLanjut','tglMeninggal','jamMeninggal','dirujuk'];

	 public function getRawatIGDs(){
        return $this->belongsTo('App\Rawat_IGD');
    }
}
