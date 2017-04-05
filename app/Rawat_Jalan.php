<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawat_Jalan extends Model
{
    protected $table = 'rawat_jalan';
    
    protected $fillable = ['tglLahir','tahun','bulan','hari','tglKunjungan','caraDatang','rujukan','caraBayar','klinikTujuan','DokterPJ'];

    public function getPasien()
    {
        return $this->belongsTo('App\Pasien');
    }
     public function getPelayananRJ()
    {
        return $this->hasMany('App\PelayananRJ');
    }

}
