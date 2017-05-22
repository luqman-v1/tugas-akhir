<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PelayananRJ extends Model
{

	use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'pelayanan_rawatjalan';

    protected $fillable = ['anamnesa','pemeriksaanFisik','radiologi','laboratorium','diagnosa','tindakan','kodeDiagnosis','kodeTindakan'];

      public function getRawatJalans(){
        return $this->belongsTo('App\Rawat_Jalan');
    }
}
