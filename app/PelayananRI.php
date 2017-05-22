<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PelayananRI extends Model
{
	  use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'pelayanan_rawatinap';

    protected $fillable = ['diagnosisMasuk','namaPerawat','namaPetugasTpp','namaDokterPj','caraKeluar','keadaanKeluar','tglMeninggal','jamMeninggal','tglKeluar','jamKeluar','diagnosisUtama','kodeDiagnosisUtama','diagnosisLain','kodeDiagnosisLain','komplikasi','penyebabLuarCedera','operasiTindakan','kodeOperasiTindakan','golonganOperasiTindakan','tanggal_operasiTindakan','infeksiNosokomial','penyebabInfeksiNosokomial','imunisasi','pengobatanRadio','transfusiDarah','sebabKematian','dokterMemulangkan'];

     public function getRawatInaps(){
        return $this->belongsTo('App\Rawat_Inap');
    }

}
