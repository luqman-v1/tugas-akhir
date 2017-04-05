<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelayananRJ extends Model
{
    protected $table = 'pelayanan_rawatjalan';

    protected $fillable = ['anamnesa','pemeriksaanFisik','radiologi','laboratorium','diagnosa','tindakan','kodeDiagnosis','kodeTindakan'];

      public function getRawatJalans(){
        return $this->belongsTo('App\Rawat_Jalan');
    }
}
