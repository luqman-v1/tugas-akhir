<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
    	'noRm','nama','provinsi','kabupaten','kecamatan','kelurahan','dukuh','rt','rw','tglLahir','tmptLahir','jenisKelamin','agama','statusPerkawinan','pendidikanPasien','pekerjaanPasien','kewarganegaraan','namaOrtu','namaSuami_istri','noHp','tglMasuk','caraDatang','rujukan','caraBayar','noPesertaJKN','noAsuransiLain'
    ];

    public function getIGD()
    {
        return $this->hasMany('App\Rawat_IGD');
    }

    public function getRawatInap()
    {
        return $this->hasMany('App\Rawat_Inap');
    }

    public function getRawatJalan()
    {
        return $this->hasMany('App\Rawat_Jalan');
    }
}
