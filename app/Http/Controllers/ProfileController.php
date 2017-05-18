<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function pelayanan(){

    	return view('Profile.jadwalPelayanan');
    }
    public function spesialis(){

    	return view('Profile.dokterSpesialis');
    }
    public function jaga(){

    	return view('Profile.dokterJaga');
    }
    public function kesehatan(){

    	return view('Profile.jaminanKesehatan');
    }
    public function formulir(){

    	return view('Profile.stokFormulir');
    }

}
