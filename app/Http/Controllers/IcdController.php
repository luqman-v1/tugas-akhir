<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icd;
class IcdController extends Controller
{
    public function form(){
    	$icd = Icd::orderBy('nama','asc')->get();
    	return view('pelaporan.icd')->with('icd',$icd);
    }

    public function simpan(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'kode' => 'required',
            ]);


    	$icd =new ICD();
    	$icd->nama = $request->nama;
    	$icd->kode = $request->kode;
    	$icd->save();

    	return $icd;

    }

    public function hapus($id){
    	$hapus = Icd::find($id);
    	$hapus->delete();

    	return $hapus;

    }
    public function ubah(Request $request){
          $this->validate($request,[
            'nama' => 'required',
            'kode' => 'required',
            ]);
    	$icd = Icd::find($request->id);
    	$icd->kode = $request->kode;
    	$icd->nama = $request->nama;
    	$icd->save();
    	
    	return $icd;
    }
}
