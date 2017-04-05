<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PelayananRI extends Model
{
    protected $table = 'pelayanan_rawatinap';

    protected $fillable = ['diagnosisMasuk','namaPerawat','namaPetugasTpp','namaDokterPj','caraKeluar','tglKeluar','jamKeluar','diagnosisUtama','kodeDiagnosisUtama','diagnosisLain','kodeDiagnosisLain','komplikasi','penyebabLuarCedera','operasiTindakan','kodeOperasiTindakan','golonganOperasiTindakan','tanggal_operasiTindakan','infeksiNosokomial','penyebabInfeksiNosokomial','imunisasi','pengobatanRadio','transfusiDarah','sebabKematian','dokterMemulangkan'];

     public function getRawatInaps(){
        return $this->belongsTo('App\Rawat_Inap');
    }

}
