<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rawat_Inap extends Model
{
    protected $table = 'rawat_inap';

    protected $fillable = ['tanggal_masuk','jam_masuk','caraDatang','rujukan','caraBayar','caraMasuk','bangsal','kelas','kamar'
    ];

    public function getPasien()
    {
        return $this->belongsTo('App\Pasien');
    }
     public function getPelayananRI()
    {
        return $this->hasMany('App\PelayananRI');
    }
}
