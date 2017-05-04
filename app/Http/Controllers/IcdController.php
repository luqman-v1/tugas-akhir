<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icd;
use App\Icd9;
use App\tbl_icd10nama;
use Alert;

class IcdController extends Controller
{
    public function form(){
    	
        $icd = Icd::join('tbl_icd10nama','tbl_icd10.id','id_tblicd10')
        ->orderBy('kode','asc')->get();

    	return view('pelaporan.icd')->with('icd',$icd);
    }

    public function simpan(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'kode' => 'required',
            ]);


    	$icd =new ICD();
    	$icd->kode = $request->kode;
    	$icd->save();
        
         $lastIcd = $icd->id;
        
        $nama = $request->nama;
        $i=1;
        foreach ($nama as $name) {
            if ($name == null) {

                Alert::success('Berhasil', 'Data diagnosis telah ditambahkan');
                return back();
            }
        $icdNama = new tbl_icd10nama();
        $icdNama->id_tblicd10 = $lastIcd;
        $icdNama->sub_kode = $i;
        $icdNama->nama = $name;

        $icdNama->save();
          $i++;  
        }
        Alert::success('Berhasil', 'Data diagnosis telah ditambahkan');
    	return back();

    }

    public function hapus($id){
    	$hapus = tbl_icd10nama::find($id);
    	$hapus->delete();

    	return $hapus;

    }
    public function ubah(Request $request){
          $this->validate($request,[
            'nama_edit' => 'required',
            'kode_edit' => 'required',
            ]);

    	$icd = tbl_icd10nama::find($request->id);
    	// $icd->kode = $request->kode;
    	$icd->nama = $request->nama_edit;
    	$icd->save();

        Alert::success('Berhasil', 'Data diagnosis telah diperbaruhi');
    	return back();
    }


// icd 9

    public function formicd9(){

         $icd = Icd9::orderBy('nama','asc')->get();
        return view('pelaporan.icd9')->with('icd',$icd);
    }

    public function simpanIcd9(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'kode' => 'required|numeric',
            ]);


        $icd =new ICD9();
        $icd->nama = $request->nama;
        $icd->kode = $request->kode;
        $icd->save();

       Alert::success('Berhasil', 'Data diagnosis telah ditambahkan');
        return back();

    }

    public function hapusIcd9($id){
        $hapus = Icd9::find($id);
        $hapus->delete();

        return $hapus;

    }
    public function ubahIcd9(Request $request){

          $this->validate($request,[
            'nama_edit' => 'required',
            'kode_edit' => 'required',
            ]);

        $icd = Icd9::find($request->id);
        $icd->kode = $request->kode_edit;
        $icd->nama = $request->nama_edit;
        $icd->save();
        
       Alert::success('Berhasil', 'Data diagnosis telah diperbaruhi');
        return back();
    }

}
