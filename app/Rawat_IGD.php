<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawat_IGD extends Model
{
    protected $table = 'rawat_igd';

    protected $fillable = ['tanggal_masuk','jam_masuk','alasan','pengantar','alamatPengantar','caraDatang','rujukan','caraBayar','kendaraan','penyebab','tempatKejadian','dokterJaga','perawat'
    ];

      public function getPasien()
    {
        return $this->belongsTo('App\Pasien');
    }

      public function getPelayananIGD()
    {
        return $this->hasMany('App\PelayananIGD');
    }
}
