<?php

namespace App\Http\Controllers;

use Alert;
use DateTime;
use Illuminate\Http\Request;
use App\PelayananRj;
use App\Rawat_Jalan;
use App\Pasien;
use App\PelayananRI;
use App\Rawat_Inap;
use App\Rawat_IGD;
use App\PelayananIGD;
use App\Icd;
use App\Icd9;
use App\tbl_icd10nama;
use App\Diagnosis;
use App\Tindakan;
use App\role_user;
class PelayananController extends Controller
{
    public function indexLrj(){

        $lrj = Tindakan::join('pelayanan_rawatjalan','tindakan.id_pelayananjalan','pelayanan_rawatjalan.id')
       ->join('rawat_jalan','id_RJ','rawat_jalan.id')
       ->join('pasien','id_pasien','pasien.id')
       ->orderBy('pelayanan_rawatjalan.id','desc')
       ->Where('tindakan.kode',null)
       ->select('pelayanan_rawatjalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatjalan.*')
       ->get();

        return view('pelayanan.indexLRJ')->with('lrj',$lrj);
    }
    public function lrjUbah($id){
        $edit = PelayananRj::where('pelayanan_rawatjalan.id',$id)->join('rawat_jalan','id_RJ','Rawat_jalan.id')
       ->join('pasien','id_pasien','pasien.id')
       ->select('pelayanan_rawatjalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatjalan.*')
       ->first();
        
        $edit->tglLahir;
        $biday = new DateTime($edit->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $edit['tahun'] = $diff->y;
        $edit['bulan'] = $diff->m;
        $edit['hari'] = $diff->d;

        $icd = Icd::distinct()->orderBy('kode','asc')->get();
        $icd9 = Icd9::orderBy('kode','asc')->get();
       
        return view('pelayanan.editLRJ')->with('edit',$edit)->with('icd',$icd)->with('icd9',$icd9);
    }

    public function lrjUbahSimpan(Request $request,$id){
      
    if ($request->kodeTindakan == [null] or $request->namaDiagnosis == null or $request->kodeDiagnosis == null) {
        
        Alert::error('Kode ICD Harus Diisi !','Oops...');
        return back();
    }else{

        Diagnosis::where('id_pelayananjalan',$id)->delete();
        Tindakan::where('id_pelayananjalan',$id)->delete();

         foreach ($request->kodeTindakan as $data) {
            $tindakan = new Tindakan();
            $tindakan->id_pelayananjalan = $id;
            $tindakan->kode  = $data;
            $tindakan->save(); 
        }
          if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }

          $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis)->sub_kode;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis1)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis1)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis1)->sub_kode;
            $diagnosa->save();

            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis2)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis2)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis2)->sub_kode;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis3)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis3)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis3)->sub_kode;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis4)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis4)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis4)->sub_kode;
            $diagnosa->save();
        
        Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
        return redirect('lrj');
    }
    
    }

    

    public function lrj(){
        $icd = Icd::join('tbl_icd10nama','tbl_icd10.id','id_tblicd10')->get();
        $icd9 = Icd9::all();
       
    	return view('pelayanan.LRJ')->with('icd',$icd)->with('icd9',$icd9);
    }

    public function lrjSimpan(Request $request){

    	  $this->validate($request, [
    	  	'noRm' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabupaten' =>'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tglLahir' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'hari' => 'required',
            'anamnesa' => 'required',
            'riwayatAlergi'=>'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            ]);

    	$rawatJalan = Pasien::where('noRm',$request->noRm)
    	->join('rawat_jalan','pasien.id','id_pasien')
    	->orderBy('rawat_jalan.id','desc')
    	->first();

    	$prj = new PelayananRj();
    	$prj->id_RJ = $rawatJalan->id;
        $prj->anamnesa = $request->anamnesa;
        $prj->riwayatAlergi = $request->riwayatAlergi;
        $prj->tensi = $request->tensi;
        $prj->rr = $request->rr;
        $prj->nadi = $request->nadi;
        $prj->bb = $request->bb;
        $prj->tb = $request->tb;
        $prj->suhu = $request->suhu;
    	$prj->diagnosa = $request->diagnosa;
    	$prj->tindakan = $request->tindakan;
    	$prj->save();

       
        $id = $prj->id;

        foreach ($request->kodeTindakan as $data) {
        $tindakan = new Tindakan();
        $tindakan->id_pelayananjalan = $id;
        $tindakan->kode  = $data;
        $tindakan->save(); 
        }

        if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }  
    
             $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis)->kode;
            $diagnosa->nama = $request->namaDiagnosis;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis1)->kode;
            $diagnosa->nama = $request->namaDiagnosis1;
            $diagnosa->save();

            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis2)->kode;
            $diagnosa->nama = $request->namaDiagnosis2;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis3)->kode;
            $diagnosa->nama = $request->namaDiagnosis3;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis4)->kode;
            $diagnosa->nama = $request->namaDiagnosis4;
            $diagnosa->save();

            
    	Alert::success('Berhasil', 'Data Pelayanan Rawat Jalan telah ditambahkan');
         return back();
    	
    }

    public function AjaxCariRawatJalan($id){

    	$rawatJalan = Pasien::where('noRm',$id)
    	->join('rawat_jalan','pasien.id','id_pasien')
    	->orderBy('rawat_jalan.id','desc')
    	->first();


        $biday = new DateTime($rawatJalan->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $rawatJalan['tahun'] = $diff->y;
        $rawatJalan['bulan'] = $diff->m;
        $rawatJalan['hari'] = $diff->d;

    	return $rawatJalan;
    }

    public function AjaxCariDiagnosa($id){

        $diagnosa = tbl_icd10nama::where('id_tblicd10',$id)->pluck('nama','id');

        return json_encode($diagnosa);
    }
//================================================= PELAYANAN RAWAT JALAN END ======================================//
    
//================================================= PELAYANAN INAP Start ======================================//
    public function rmk(){

         $icd = Icd::join('tbl_icd10nama','tbl_icd10.id','id_tblicd10')->get();
        $icd9 = Icd9::all();

        $dokter = role_user::join('users','user_id','users.id')->where('role_id',6)->get();
        $perawat = role_user::join('users','user_id','users.id')->where('role_id',3)->get();
        $rekmed = role_user::join('users','user_id','users.id')->where('role_id',2)->get();

    	return view('pelayanan.RMK')->with(compact('icd','icd9','dokter','perawat','rekmed'));
    }

    public function indexRmk(){

         $rmk  = Tindakan::join('pelayanan_rawatinap','tindakan.id_pelayananinap','pelayanan_rawatinap.id')
       ->join('rawat_inap','id_RI','rawat_inap.id')
       ->join('pasien','id_pasien','pasien.id')
       ->orderBy('pelayanan_rawatinap.id','desc')
       ->Where('tindakan.kode',null)
       ->select('pelayanan_rawatinap.id as idp','pasien.*','rawat_inap.*','pelayanan_rawatinap.*')
       ->get();
        return view('pelayanan.indexRMK')->with('rmk',$rmk);
    }

    public function rmkSimpan(Request $request){

    	  $this->validate($request, [
    	  	'noRm' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabupaten' =>'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tglLahir' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'hari' => 'required',
            'diagnosisMasuk' => 'required',
            'namaPerawat' => 'required',
            'namaPetugasTpp' => 'required',
            'namaDokterPj' =>'required',
            'caraKeluar' => 'required',
            'keadaanKeluar' => 'required',
            'tglKeluar' => 'required',
            'jamKeluar' => 'required',
            'diagnosisUtama' => 'required',
            'komplikasi' => 'required',
            'penyebabLuarCedera' => 'required',
            'operasiTindakan' => 'required',
            'golonganOperasiTindakan' => 'required',
            'tanggal_operasiTindakan' => 'required',
            'infeksiNosokomial' => 'required',
            'penyebabInfeksiNosokomial' => 'required',
            'imunisasi' => 'required',
            'pengobatanRadio' => 'required',
            'transfusiDarah' => 'required',
            'sebabKematian' => 'required',
            'dokterMemulangkan' => 'required',
            ]);

    	 $rawatInap = Pasien::where('noRm',$request->noRm)
    	->join('rawat_inap','pasien.id','id_pasien')
    	->orderBy('rawat_inap.id','desc')
    	->first();

            if ($request->keadaanKeluar != "Meninggal") {
            $tglMeninggal = $request->tglMeninggal = null;
            $jamMeninggal = $request->jamMeninggal = null;
        }else{
            $tglMeninggal = $request->tglMeninggal;
            $jamMeninggal = $request->jamMeninggal;
        }

    	$rmk = new PelayananRI();
    	$rmk->id_RI = $rawatInap->id;
    	$rmk->diagnosisMasuk = $request->diagnosisMasuk;
    	$rmk->namaPerawat = $request->namaPerawat;
    	$rmk->namaPetugasTpp = $request->namaPetugasTpp;
    	$rmk->namaDokterPj = $request->namaDokterPj;
        $rmk->caraKeluar = $request->caraKeluar;
    	$rmk->keadaanKeluar = $request->keadaanKeluar;
        $rmk->tglMeninggal = $tglMeninggal;
        $rmk->jamMeninggal = $jamMeninggal;
    	$rmk->tglKeluar = $request->tglKeluar;
    	$rmk->jamKeluar = $request->jamKeluar;
    	$rmk->diagnosisUtama = $request->diagnosisUtama;
    	$rmk->komplikasi = $request->komplikasi;
    	$rmk->penyebabLuarCedera = $request->penyebabLuarCedera;
    	$rmk->operasiTindakan = $request->operasiTindakan;
    	$rmk->golonganOperasiTindakan = $request->golonganOperasiTindakan;
    	$rmk->tanggal_operasiTindakan = $request->tanggal_operasiTindakan;
    	$rmk->infeksiNosokomial = $request->infeksiNosokomial;
    	$rmk->penyebabInfeksiNosokomial = $request->penyebabInfeksiNosokomial;
    	$rmk->imunisasi = $request->imunisasi;
    	$rmk->pengobatanRadio = $request->pengobatanRadio;
    	$rmk->transfusiDarah = $request->transfusiDarah;
    	$rmk->sebabKematian = $request->sebabKematian;
        $rmk->dokterMemulangkan = $request->dokterMemulangkan;
    	$rmk->save();


        foreach ($request->kodeTindakan as $data) {
        $tindakan = new Tindakan();
        $tindakan->id_pelayananinap = $rmk->id;
        $tindakan->kode  = $data;
        $tindakan->save(); 
        }

        $kodeDiagnosis = $request->kodeDiagnosis;
        $namaDiagnosis = $request->namaDiagnosis;

        foreach ($kodeDiagnosis as $index => $kode) {
            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $rmk->id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $kode;
            $diagnosa->nama = $namaDiagnosis[$index];
            $diagnosa->save();
        }
        $kodeKomplikasi = $request->kodeDiagnosis;
        $namaKomplikasi = $request->namaDiagnosis;

        foreach ($kodeKomplikasi as $index => $kode) {
            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $rmk->id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = $kode;
            $diagnosa->nama = $namaKomplikasi[$index];
            $diagnosa->save();
        }

    	Alert::success('Berhasil', 'Data Pelayanan Rawat Inap telah ditambahkan');
         return redirect('rmk');
    }

    public function rmkUbah($id){
        $edit = PelayananRI::where('pelayanan_rawatinap.id',$id)->join('rawat_inap','id_RI','rawat_inap.id')
       ->join('pasien','id_pasien','pasien.id')
       ->select('pelayanan_rawatinap.id as idp','pasien.*','rawat_inap.*','pelayanan_rawatinap.*')
       ->first();
        
        $edit->tglLahir;
        $biday = new DateTime($edit->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $edit['tahun'] = $diff->y;
        $edit['bulan'] = $diff->m;
        $edit['hari'] = $diff->d;

        $icd = Icd::distinct()->orderBy('kode','asc')->get();
        $icd9 = Icd9::orderBy('kode','asc')->get();

        return view('pelayanan.editRMK')->with('icd',$icd)->with('icd9',$icd9)->with('edit',$edit);
    }

    public function rmkUbahSimpan(Request $request,$id){
        
         if ($request->kodeTindakan == null or $request->namaDiagnosis == null or $request->kodeDiagnosis == null or $request->kodeKomplikasi == null or $request->kodeKomplikasi == null ) {
        
        Alert::error('Kode ICD Harus Diisi !','Oops...');
        return back();
    }else{

        Diagnosis::where('id_pelayananinap',$id)->delete();
        Tindakan::where('id_pelayananinap',$id)->delete();


        foreach ($request->kodeTindakan as $data) {
        $tindakan = new Tindakan();
        $tindakan->id_pelayananinap = $id;
        $tindakan->kode  = $data;
        $tindakan->save(); 
        }

         if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null OR $request->kodeKomplikasi == null OR $request->namaKomplikasi == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('rmk');  
            }

        $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis)->sub_kode;
            $diagnosa->save();

          $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = Icd::find($request->kodeKomplikasi)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaKomplikasi)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaKomplikasi)->sub_kode;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null OR $request->kodeKomplikasi1 == null OR $request->namaKomplikasi1 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('rmk');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis1)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis1)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis1)->sub_kode;
            $diagnosa->save();

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = Icd::find($request->kodeKomplikasi1)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaKomplikasi1)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaKomplikasi1)->sub_kode;
            $diagnosa->save();


            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null OR $request->kodeKomplikasi2 == null OR $request->namaKomplikasi2 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis2)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis2)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis2)->sub_kode;
            $diagnosa->save();

              $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = Icd::find($request->kodeKomplikasi2)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaKomplikasi2)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaKomplikasi2)->sub_kode;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null OR $request->kodeKomplikasi3 == null OR $request->namaKomplikasi3 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis3)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis3)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis3)->sub_kode;
            $diagnosa->save();

             $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = Icd::find($request->kodeKomplikasi3)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaKomplikasi3)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaKomplikasi3)->sub_kode;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null OR $request->kodeKomplikasi4 == null OR $request->namaKomplikasi4 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis4)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis4)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis4)->sub_kode;
            $diagnosa->save();

             $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = Icd::find($request->kodeKomplikasi4)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaKomplikasi4)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaKomplikasi4)->sub_kode;
            $diagnosa->save();


        Alert::success('Berhasil', 'Kode ICD Pelayanan Rawat Inap telah ditambahkan');

        return redirect('rmk');
    }
    }

    public function AjaxCariRawatInap($id){
    	$rawatInap = Pasien::where('noRm',$id)
    	->join('rawat_inap','pasien.id','id_pasien')
    	->orderBy('rawat_inap.id','desc')
    	->first();

        $biday = new DateTime($rawatInap->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $rawatInap['tahun'] = $diff->y;
        $rawatInap['bulan'] = $diff->m;
        $rawatInap['hari'] = $diff->d;

    	return $rawatInap;
    }

//================================================= PELAYANAN INAP END ======================================//

//================================================= PELAYANAN IGD Start ======================================//

    public function Indexlgd(){
          $igd  = Tindakan::join('pelayanan_rawatigd','tindakan.id_pelayananigd','pelayanan_rawatigd.id')
       ->join('rawat_igd','id_IGD','rawat_igd.id')
       ->join('pasien','id_pasien','pasien.id')
       ->orderBy('pelayanan_rawatigd.id','desc')
       ->Where('tindakan.kode',null)
       ->select('pelayanan_rawatigd.id as idp','pasien.*','rawat_igd.*','pelayanan_rawatigd.*')
       ->get();

    return view('pelayanan.indexLGD')->with('igd',$igd);
    }

    public function lgd(){
         $icd = Icd::join('tbl_icd10nama','tbl_icd10.id','id_tblicd10')->get();
        $icd9 = Icd9::all();

    	return view('pelayanan.LGD')->with('icd',$icd)->with('icd9',$icd9);
    }

    public function lgdSimpan(Request $request){

    	 $this->validate($request, [
    	  	'noRm' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabupaten' =>'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'dukuh' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'tglLahir' => 'required',
            'tahun' => 'required',
            'bulan' => 'required',
            'hari' => 'required',
            'jenisKasus' => 'required',
            'tindakanResuitasi' => 'required',
            'cramsScore' => 'required',
            'anamnesis' =>'required',
            'pemeriksaanFisik' => 'required',
            'pemeriksaanStatus' => 'required',
            'pemeriksaanLaboratorium' => 'required',
            'pemeriksaanRadiologi' => 'required',
            'diagonosisAwal' => 'required',
            'terapiTindakan' => 'required',
            'diagnosisAkhir' => 'required',
            'tindakanLanjut' => 'required',
            ]);

    	 $rawatIGD = Pasien::where('noRm',$request->noRm)
    	->join('rawat_igd','pasien.id','id_pasien')
    	->orderBy('rawat_igd.id','desc')
    	->first();
          if ($request->tindakanLanjut != "Meninggal") {
            $tglMeninggal = $request->tglMeninggal = null;
            $jamMeninggal = $request->jamMeninggal = null;
        }else{
            $tglMeninggal = $request->tglMeninggal;
            $jamMeninggal = $request->jamMeninggal;
        }

    	$igd = new PelayananIGD();
    	$igd->id_IGD = $rawatIGD->id;
    	$igd->jenisKasus = $request->jenisKasus;
    	$igd->tindakanResuitasi = $request->tindakanResuitasi;
    	$igd->cramsScore = $request->cramsScore;
    	$igd->anamnesis = $request->anamnesis;
    	$igd->pemeriksaanFisik = $request->pemeriksaanFisik;
    	$igd->pemeriksaanStatus = $request->pemeriksaanStatus;
    	$igd->pemeriksaanLaboratorium = $request->pemeriksaanLaboratorium;
    	$igd->pemeriksaanRadiologi = $request->pemeriksaanRadiologi;
    	$igd->diagonosisAwal = $request->diagonosisAwal;
    	$igd->terapiTindakan = $request->terapiTindakan;
    	$igd->diagnosisAkhir = $request->diagnosisAkhir;
        $igd->tindakanLanjut = $request->tindakanLanjut;
        $igd->tglMeninggal = $tglMeninggal;
        $igd->jamMeninggal = $jamMeninggal;
    	$igd->dirujuk = $request->dirujuk;
    	$igd->save();

         $id = $igd->id;
       
        foreach ($request->kodeTindakan as $data) {
        $tindakan = new Tindakan();
        $tindakan->id_pelayananigd = $id;
        $tindakan->kode  = $data;
        $tindakan->save(); 
        }

          if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                 return redirect('pelayanan-igd');  
            }
            
       $diagnosa = new Diagnosis();
            $diagnosa->id_pelayanan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis)->kode;
            $diagnosa->nama = $request->namaDiagnosis;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis1)->kode;
            $diagnosa->nama = $request->namaDiagnosis1;
            $diagnosa->save();

            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis2)->kode;
            $diagnosa->nama = $request->namaDiagnosis2;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis3)->kode;
            $diagnosa->nama = $request->namaDiagnosis3;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis4)->kode;
            $diagnosa->nama = $request->namaDiagnosis4;
            $diagnosa->save();

    	Alert::success('Berhasil', 'Data Pelayanan Rawat IGD telah ditambahkan');
         return redirect('pelayanan-igd');
    }

    public function lgdUbah($id){
           $edit = PelayananIGD::where('pelayanan_rawatigd.id',$id)->join('rawat_igd','id_IGD','rawat_igd.id')
       ->join('pasien','id_pasien','pasien.id')
       ->select('pelayanan_rawatigd.id as idp','pasien.*','rawat_igd.*','pelayanan_rawatigd.*')
       ->first();
        
        $edit->tglLahir;
        $biday = new DateTime($edit->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $edit['tahun'] = $diff->y;
        $edit['bulan'] = $diff->m;
        $edit['hari'] = $diff->d;

        $icd = Icd::distinct()->orderBy('kode','asc')->get();
        $icd9 = Icd9::orderBy('kode','asc')->get();

        return view('pelayanan.editLGD')->with('icd',$icd)->with('icd9',$icd9)->with('edit',$edit);
    }

    public function lgdUbahSimpan(Request $request,$id){
        if ($request->kodeTindakan == [null] or $request->namaDiagnosis == [null] or $request->kodeDiagnosis == [null]) {
        
        Alert::error('Kode ICD Harus Diisi !','Oops...');
        return back();
    }else{

        Diagnosis::where('id_pelayananigd',$id)->delete();
        Tindakan::where('id_pelayananigd',$id)->delete();

         foreach ($request->kodeTindakan as $data) {
            $tindakan = new Tindakan();
            $tindakan->id_pelayananigd = $id;
            $tindakan->kode  = $data;
            $tindakan->save(); 
        }
        
         if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

        $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis)->sub_kode;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis1)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis1)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis1)->sub_kode;
            $diagnosa->save();

            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis2)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis2)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis2)->sub_kode;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis3)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis3)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis3)->sub_kode;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'Kode ICD telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis4)->kode;
            $diagnosa->nama = tbl_icd10nama::find($request->namaDiagnosis4)->nama;
            $diagnosa->sub_kode = tbl_icd10nama::find($request->namaDiagnosis4)->sub_kode;
            $diagnosa->save();
        
        Alert::success('Berhasil', 'Kode ICD telah ditambahkan');

        return redirect('pelayanan-igd');
    }
}

    public function AjaxCarilgd($id){
    		$rawatIGD = Pasien::where('noRm',$id)
    	->join('rawat_igd','pasien.id','id_pasien')
    	->orderBy('rawat_igd.id','desc')
    	->first();

    	 $biday = new DateTime($rawatIGD->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $rawatIGD['tahun'] = $diff->y;
        $rawatIGD['bulan'] = $diff->m;
        $rawatIGD['hari'] = $diff->d;

    	return $rawatIGD;

    }
}
