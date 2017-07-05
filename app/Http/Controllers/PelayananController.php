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
use App\Ruangan\No_Kamar;
class PelayananController extends Controller
{
    public function indexLrj(){

        $lrj = Tindakan::join('pelayanan_rawatjalan','tindakan.id_pelayananjalan','pelayanan_rawatjalan.id')
       ->join('rawat_jalan','id_RJ','rawat_jalan.id')
       ->join('pasien','id_pasien','pasien.id')
       ->orderBy('pelayanan_rawatjalan.id','asc')
       // ->Where('tindakan.kode',null)
       ->where('status',1)   
       ->select('pelayanan_rawatjalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatjalan.*')
       ->get();

       $histori = Tindakan::rightjoin('pelayanan_rawatjalan','tindakan.id_pelayananjalan','pelayanan_rawatjalan.id')
       ->join('rawat_jalan','id_RJ','rawat_jalan.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatjalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatjalan.*')
       ->orderBy('pelayanan_rawatjalan.id','desc')
       ->whereNotNull('anamnesa')
       // ->whereNotNull('kode')
       ->where('status',0)   
       ->groupBy('id_pelayananjalan')
       ->get();

       $antrian = PelayananRj::join('rawat_jalan','id_RJ','rawat_jalan.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatjalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatjalan.*')
       ->orderBy('pelayanan_rawatjalan.id','asc')
       ->where('anamnesa',Null)->whereNull('rawat_jalan.deleted_at')
       ->get();

        return view('pelayanan.indexLRJ')->with('lrj',$lrj)->with('histori',$histori)->with('antrian',$antrian);
    }

    public function indexLrjDetail($id){
        $data = PelayananRj::find($id);

        return $data;
    }

    public function indexLrjSimpan(Request $request){

          $this->validate($request, [
            'tensi' => 'required',
            'rr' => 'required',
            'nadi' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'suhu' => 'required',
            'anamnesa' => 'required',
            'riwayatAlergi'=>'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            ]);

        $input = $request->all();
        $data = PelayananRj::find($request->id);
        $data->tensi = $request->tensi;
        $data->rr = $request->rr;
        $data->nadi = $request->nadi;
        $data->bb = $request->bb;
        $data->tb = $request->tb;
        $data->suhu = $request->suhu;
        $data->anamnesa = $request->anamnesa;
        $data->riwayatAlergi = $request->riwayatAlergi;
        $data->diagnosa = $request->diagnosa;
        $data->tindakan = $request->tindakan;
        $data->save();

        Alert::success('Berhasil', 'data telah di update');
        return back();
    }

    public function indexDeleteLrj($id){
        $data = PelayananRj::find($id);
        $data->delete();
        $tindakan = Tindakan::where('id_pelayananjalan',$id)->first();
        $tindakan->delete();

        return $data;

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
        
        Alert::error('data Harus Diisi !','Oops...');
        return back();
    }else{

        Diagnosis::where('id_pelayananjalan',$id)->forceDelete();
        Tindakan::where('id_pelayananjalan',$id)->forceDelete();

         foreach ($request->kodeTindakan as $data) {
            $tindakan = new Tindakan();
            $tindakan->id_pelayananjalan = $id;
            $tindakan->kode  = $data;
            $tindakan->save(); 
        }
          if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }

          $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis;
            $diagnosa->sub_kode = $request->namaDiagnosis;
            $diagnosa->save();

            $change = PelayananRj::find($id);
            $change->status = 0;
            $change->Save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis1;
            $diagnosa->sub_kode = $request->namaDiagnosis1;
            $diagnosa->save();

            $change = PelayananRj::find($id);
            $change->status = 0;
            $change->Save();

            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis2;
            $diagnosa->sub_kode = $request->namaDiagnosis2;
            $diagnosa->save();
            
            $change = PelayananRj::find($id);
            $change->status = 0;
            $change->Save();

            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis3;
            $diagnosa->sub_kode = $request->namaDiagnosis3;
            $diagnosa->save();

            $change = PelayananRj::find($id);
            $change->status = 0;
            $change->Save();
            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis4;
            $diagnosa->sub_kode = $request->namaDiagnosis4;
            $diagnosa->save();
            
            $change = PelayananRj::find($id);
            $change->status = 0;
            $change->Save();

        Alert::success('Berhasil', 'data telah ditambahkan');
        return redirect('lrj');
    }
    
    }

    

    public function lrj($id){

        $icd = Icd::join('tbl_icd10nama','tbl_icd10.id','id_tblicd10')->get();
        $icd9 = Icd9::all();

         $lrj = PelayananRj::join('rawat_jalan','id_RJ','rawat_jalan.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatjalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatjalan.*')
       ->where('pelayanan_rawatjalan.id',$id)
       ->first();

       $lastcek = PelayananRj::join('rawat_jalan','id_RJ','rawat_jalan.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatjalan.*')
       ->where('noRM',$lrj->noRm)
       ->orderBy('pelayanan_rawatjalan.id','desc')
       ->skip(1)
       ->first();


        $biday = new DateTime($lrj->tglLahir);
              $today = new DateTime();
            $diff = $today->diff($biday);
            //bikin array baru 
            $lrj['tahun'] = $diff->y;
            $lrj['bulan'] = $diff->m;
            $lrj['hari'] = $diff->d;
       
    	return view('pelayanan.LRJ')->with('icd',$icd)->with('icd9',$icd9)->with('lrj',$lrj)->with('lastcek',$lastcek);
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
            'diagnosa' => 'required',
            'tindakan' => 'required',
              'tensi' => 'required',
            'rr' => 'required',
            'nadi' => 'required',
            'bb' => 'required',
            'tb' => 'required',
            'suhu' => 'required',
            ]);

        $pasien = Pasien::where('noRm',$request->noRm)->first();
         $pasien->riwayatAlergi = $request->riwayatAlergi;
         $pasien->Save();

    	$prj = PelayananRj::find($request->id);
        $prj->anamnesa = $request->anamnesa;
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
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }  
    
             $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis;
            $diagnosa->nama = $request->namaDiagnosis;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis1;
            $diagnosa->nama = $request->namaDiagnosis1;
            $diagnosa->save();

            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis2;
            $diagnosa->nama = $request->namaDiagnosis2;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis3;
            $diagnosa->nama = $request->namaDiagnosis3;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('lrj');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananjalan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis4;
            $diagnosa->nama = $request->namaDiagnosis4;
            $diagnosa->save();

            
    	Alert::success('Berhasil', 'Data Pelayanan Rawat Jalan telah ditambahkan');
         return back();
    	
    }
    public function selesaiRJ($id){
    
    $change = PelayananRj::find($id);
     $change->status = 0;
     $change->Save();
      Alert::success('Berhasil', 'Pelayanan telah selesai');
     return redirect('/rawat-inap');
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

        $diagnosa = tbl_icd10nama::where('id_tblicd10',$id)->pluck('nama','sub_kode');

        return json_encode($diagnosa);
    }
//================================================= PELAYANAN RAWAT JALAN END ======================================//
    
//================================================= PELAYANAN INAP Start ======================================//
    public function rmk($id){
         $icd = Icd::join('tbl_icd10nama','tbl_icd10.id','id_tblicd10')->get();
        $icd9 = Icd9::all();
        $dokter = role_user::join('users','user_id','users.id')->where('role_id',6)->orderBy('users.name','asc')->get();
        $perawat = role_user::join('users','user_id','users.id')->where('role_id',3)->orderBy('users.name','asc')->get();
        $rekmed = role_user::join('users','user_id','users.id')->where('role_id',2)->orderBy('users.name','asc')->get();
        $rmk = PelayananRI::join('rawat_inap','id_RI','rawat_inap.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatinap.id as idp','pasien.*','rawat_inap.*','pelayanan_rawatinap.*')
       ->orderBy('pelayanan_rawatinap.id','desc')
       ->where('pelayanan_rawatinap.id',$id)
       ->first();

        $lastcek = PelayananRI::join('rawat_inap','id_RI','rawat_inap.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatinap.*')
       ->where('noRM',$rmk->noRm)
       ->orderBy('pelayanan_rawatinap.id','desc')
       ->skip(1)
       ->first();

        $biday = new DateTime($rmk->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $rmk['tahun'] = $diff->y;
        $rmk['bulan'] = $diff->m;
        $rmk['hari'] = $diff->d;

    	return view('pelayanan.RMK')->with(compact('icd','icd9','dokter','perawat','rekmed','rmk','lastcek'));
    }
    public function indexDetail($id){
        $data = PelayananRI::find($id);

        return $data;

    }
    public function indexSave(Request $request){

        $this->validate($request, [
            'diagnosisMasuk' => 'required',
            'namaPerawat' => 'required',
            'namaPetugasTpp' => 'required',
            'namaDokterPj' =>'required',
            'caraKeluar' => 'required',
            'keadaanKeluar' => 'required',
            'tglKeluar' => 'required',
            'jamKeluar' => 'required',
            'diagnosisUtama' => 'required',
            'operasiTindakan' => 'required',
            'golonganOperasiTindakan' => 'required',
            'tanggal_operasiTindakan' => 'required',
            'imunisasi' => 'required',
            'dokterMemulangkan' => 'required',
            ]);
        if($request->keadaanKeluar == "Meninggal" and $request->tglMeninggal == null and $request->jamMeninggal == null){
            Alert::error('Opps..', 'Tanggal Meninggal dan Jam Meninggal Harus di masukan');
            return back();
        }

        $input = $request->all();
        $data = PelayananRI::find($request->id);
        $data->update($input);

        Alert::success('Berhasil', 'Data Pelayanan Rawat Inap telah diubah');
        return back();

    }

    public function indexDeleteRmk($id){

        $data = PelayananRI::find($id);
        $data->delete();
        $tindakan = Tindakan::where('id_pelayananinap',$id)->first();
        $tindakan->delete();
        return $data;

    }

    public function indexRmk(){
         $dokter = role_user::join('users','user_id','users.id')->where('role_id',6)->get();
        $perawat = role_user::join('users','user_id','users.id')->where('role_id',3)->get();
        $rekmed = role_user::join('users','user_id','users.id')->where('role_id',2)->get();
        
         $rmk  = Tindakan::join('pelayanan_rawatinap','tindakan.id_pelayananinap','pelayanan_rawatinap.id')
       ->join('rawat_inap','id_RI','rawat_inap.id')
       ->join('pasien','id_pasien','pasien.id')
       ->orderBy('pelayanan_rawatinap.id','asc')
       ->Where('tindakan.kode',null)
       // ->where('status',1)   
       ->select('pelayanan_rawatinap.id as idp','pasien.*','rawat_inap.*','pelayanan_rawatinap.*')
       ->get();

         $histori  = Tindakan::join('pelayanan_rawatinap','tindakan.id_pelayananinap','pelayanan_rawatinap.id')
       ->join('rawat_inap','id_RI','rawat_inap.id')
       ->join('pasien','id_pasien','pasien.id')
       ->orderBy('pelayanan_rawatinap.id','desc')
       ->select('pelayanan_rawatinap.id as idp','pasien.*','rawat_inap.*','pelayanan_rawatinap.*')
       ->whereNotNull('diagnosisMasuk')
       ->whereNotNull('kode')
       // ->where('status',0)   
       ->groupBy('id_pelayananinap')
       ->get();

       $antrian = PelayananRI::join('rawat_inap','id_RI','rawat_inap.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatinap.id as idp','pasien.*','rawat_inap.*','pelayanan_rawatinap.*')
       ->orderBy('pelayanan_rawatinap.id','asc')
       ->where('diagnosisMasuk',Null)->whereNull('rawat_inap.deleted_at')
       ->get();

        return view('pelayanan.indexRMK')
                                ->with('rmk',$rmk)
                                ->with('dokter',$dokter)
                                ->with('perawat',$perawat)
                                ->with('rekmed',$rekmed)
                                ->with('antrian',$antrian)
                                ->with('histori',$histori);
    }

    public function rmkSimpan(Request $request){
        // return $request->all();
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
            'operasiTindakan' => 'required',
            'golonganOperasiTindakan' => 'required',
            'tanggal_operasiTindakan' => 'required',
            'imunisasi' => 'required',
            'dokterMemulangkan' => 'required',
            ]);
          if ($request->keadaanKeluar == "Meninggal" and $request->sebabKematian == null) {
                Alert::error('Opps .. ','Sebab Kematian Harus Diisi');
              return back();
          }
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

    	$rmk = PelayananRI::find($request->id);
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

        $carirj = PelayananRI::find($request->id)->id_RI;
        $rawatInap = Rawat_Inap::find($carirj)->kamar;
        $kamar = No_Kamar::where('kamar_no',$rawatInap)->first();
        $kamar->status = 0;
        $kamar->no_pasien = Null;
        $kamar->save();




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
            $diagnosa->save();
        }
        $kodeKomplikasi = $request->kodeDiagnosis;
        $namaKomplikasi = $request->namaDiagnosis;

        foreach ($kodeKomplikasi as $index => $kode) {
            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $rmk->id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = $kode;
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
        $cek = PelayananRI::find($id);

        if ($cek->komplikasi == null) {
              if ($request->kodeTindakan == null or $request->namaDiagnosis == null or $request->kodeDiagnosis == null or $request->kodeKomplikasi != null or $request->kodeKomplikasi != null ) {
        
        Alert::error('Periksa Kembali data inputan','Oops...');
        return back();
    }else{

        Diagnosis::where('id_pelayananinap',$id)->forceDelete();
        Tindakan::where('id_pelayananinap',$id)->forceDelete();


        foreach ($request->kodeTindakan as $data) {
        $tindakan = new Tindakan();
        $tindakan->id_pelayananinap = $id;
        $tindakan->kode  = $data;
        $tindakan->save(); 
        }

         if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

        $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis;
            $diagnosa->sub_kode = $request->namaDiagnosis;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis1;
            $diagnosa->sub_kode = $request->namaDiagnosis1;
            $diagnosa->save();


            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis2;
            $diagnosa->sub_kode = $request->namaDiagnosis2;
            $diagnosa->save();

            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null ) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis3;
            $diagnosa->sub_kode = $request->namaDiagnosis3;
            $diagnosa->save();

          
            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null ) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis4;
            $diagnosa->sub_kode = $request->namaDiagnosis4;
            $diagnosa->save();

          

        Alert::success('Berhasil', 'data Pelayanan Rawat Inap telah ditambahkan');

        return redirect('rmk');
    }
        }


         if ($request->kodeTindakan == null or $request->namaDiagnosis == null or $request->kodeDiagnosis == null or $request->kodeKomplikasi == null or $request->kodeKomplikasi == null ) {
        
        Alert::error('data Harus Diisi !','Oops...');
        return back();
    }else{

        Diagnosis::where('id_pelayananinap',$id)->forceDelete();
        Tindakan::where('id_pelayananinap',$id)->forceDelete();


        foreach ($request->kodeTindakan as $data) {
        $tindakan = new Tindakan();
        $tindakan->id_pelayananinap = $id;
        $tindakan->kode  = $data;
        $tindakan->save(); 
        }

         if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null OR $request->kodeKomplikasi == null OR $request->namaKomplikasi == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

        $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis;
            $diagnosa->sub_kode = $request->namaDiagnosis;
            $diagnosa->save();

          $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = $request->kodeKomplikasi;
            $diagnosa->sub_kode = $request->namaKomplikasi;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null OR $request->kodeKomplikasi1 == null OR $request->namaKomplikasi1 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis1;
            $diagnosa->sub_kode = $request->namaDiagnosis1;
            $diagnosa->save();

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = $request->kodeKomplikasi1;
            $diagnosa->sub_kode = $request->namaKomplikasi1;
            $diagnosa->save();


            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null OR $request->kodeKomplikasi2 == null OR $request->namaKomplikasi2 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis2;
            $diagnosa->sub_kode = $request->namaDiagnosis2;
            $diagnosa->save();

              $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = $request->kodeKomplikasi2;
            $diagnosa->sub_kode = $request->namaKomplikasi2;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null OR $request->kodeKomplikasi3 == null OR $request->namaKomplikasi3 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis3;
            $diagnosa->sub_kode = $request->namaDiagnosis3;
            $diagnosa->save();

             $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode =$request->kodeKomplikasi3;
            $diagnosa->sub_kode = $request->namaKomplikasi3;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null OR $request->kodeKomplikasi4 == null OR $request->namaKomplikasi4 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('rmk');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis4;
            $diagnosa->sub_kode = $request->namaDiagnosis4;
            $diagnosa->save();

             $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananinap = $id;
            $diagnosa->diagnosa_komplikasi = 'komplikasi';
            $diagnosa->kode = $request->kodeKomplikasi4;
            $diagnosa->sub_kode = $request->namaKomplikasi4;
            $diagnosa->save();


        Alert::success('Berhasil', 'data Pelayanan Rawat Inap telah ditambahkan');

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
       ->orderBy('pelayanan_rawatigd.id','asc')
       // ->whereNull('kode')
       ->where('status',1)    
       ->select('pelayanan_rawatigd.id as idp','pasien.*','rawat_igd.*','pelayanan_rawatigd.*')
       ->get();


      $histori = Tindakan::rightjoin('pelayanan_rawatigd','tindakan.id_pelayananigd','pelayanan_rawatigd.id')
       ->join('rawat_igd','id_IGD','rawat_igd.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatigd.id as idp','pasien.*','rawat_igd.*','pelayanan_rawatigd.*')
       ->orderBy('pelayanan_rawatigd.id','desc')
       ->whereNotNull('anamnesis')
       ->where('status',0)
       // ->whereNotNull('kode')    
       ->groupBy('pelayanan_rawatigd.id')
       ->get();

       $antrian = PelayananIGD::join('rawat_igd','id_IGD','rawat_igd.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatigd.id as idp','pasien.*','rawat_igd.*','pelayanan_rawatigd.*')
       ->orderBy('pelayanan_rawatigd.id','asc')
       ->where('anamnesis',Null)->whereNull('rawat_igd.deleted_at')
       ->get();

    return view('pelayanan.indexLGD')
                            ->with('igd',$igd)
                            ->with('histori',$histori)
                            ->with('antrian',$antrian);
    }
    public function IndexlgdDetail($id){
        $data = PelayananIGD::find($id);

        return $data;

    }

    public function IndexlgdSave(Request $request){
         $this->validate($request, [
            'jenisKasus' => 'required',
            'tindakanResuitasi' => 'required',
            'cramsScore' => 'required',
            'anamnesis' =>'required',
            'pemeriksaanFisik' => 'required',
            'pemeriksaanStatus' => 'required',
            'diagonosisAwal' => 'required',
            'terapiTindakan' => 'required',
            'diagnosisAkhir' => 'required',
            'tindakanLanjut' => 'required',
            ]);
         if ($request->tindakanLanjut == "Dirujuk" and $request->dirujuk== null) {
             Alert::error('Opps..', 'Rujukan tidak Boleh Kosong');
             return back();
         }elseif ($request->tindakanLanjut =="Meninggal" and $request->tglMeninggal==null and $request->jamMeninggal==null) {
             Alert::error('Opps..', 'tanggal dan Jam Meninggal tidak Boleh Kosong');
             return back();
         }
        $input = $request->all();
        $data = PelayananIGD::find($request->id);
        $data->pemeriksaanFisik = $request->pemeriksaanFisik;
        $data->anamnesis = $request->anamnesis;
        $data->Save();
        $data->update($input);

     Alert::success('Berhasil', 'data telah diubah');
        return back(); 
    }
     public function indexDeleteIgd($id){
        $data = PelayananIGD::find($id);
        $data->delete();
        $tindakan = Tindakan::where('id_pelayananigd',$id)->first();
        $tindakan->delete();
        return $data;

    }

    public function lgd($id){
         $icd = Icd::join('tbl_icd10nama','tbl_icd10.id','id_tblicd10')->get();
        $icd9 = Icd9::all();

        $igd = PelayananIGD::join('rawat_igd','id_IGD','rawat_igd.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatigd.id as idp','pasien.*','rawat_igd.*','pelayanan_rawatigd.*')
       ->where('pelayanan_rawatigd.id',$id)
       ->first();

        $lastcek =  PelayananIGD::join('rawat_igd','id_IGD','rawat_igd.id')
       ->join('pasien','id_pasien','pasien.id')
        ->select('pelayanan_rawatigd.*')
       ->where('noRM',$igd->noRm)
       ->orderBy('pelayanan_rawatigd.id','desc')
       ->skip(1)
       ->first();

       $biday = new DateTime($igd->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $igd['tahun'] = $diff->y;
        $igd['bulan'] = $diff->m;
        $igd['hari'] = $diff->d;

    	return view('pelayanan.LGD')
                        ->with('icd',$icd)
                        ->with('icd9',$icd9)
                        ->with('lastcek',$lastcek)
                        ->with('igd',$igd);
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
            'cramsScore' => 'required|numeric',
            'anamnesis' =>'required',
            'pemeriksaanFisik' => 'required|numeric',
            'pemeriksaanStatus' => 'required',
            'diagonosisAwal' => 'required',
            'terapiTindakan' => 'required',
            'diagnosisAkhir' => 'required',
            'tindakanLanjut' => 'required',
            ]);
         if ($request->tindakanLanjut == "Dirawat") {
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

        $igd = PelayananIGD::find($request->id);
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
        $igd->status = 0;
        $igd->save();

        Alert::success('Berhasil', 'Data Pelayanan Rawat IGD telah ditambahkan');
        return redirect('rawat-inap');
         }

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

    	$igd = PelayananIGD::find($request->id);
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
                  Alert::success('Berhasil', 'data telah ditambahkan');
                 return redirect('pelayanan-igd');  
            }
            
       $diagnosa = new Diagnosis();
            $diagnosa->id_pelayanan = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis)->kode;
            $diagnosa->nama = $request->namaDiagnosis;
            $diagnosa->save();

          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis1)->kode;
            $diagnosa->nama = $request->namaDiagnosis1;
            $diagnosa->save();

            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis2)->kode;
            $diagnosa->nama = $request->namaDiagnosis2;
            $diagnosa->save();
            
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = Icd::find($request->kodeDiagnosis3)->kode;
            $diagnosa->nama = $request->namaDiagnosis3;
            $diagnosa->save();

            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
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
        
        Alert::error('data Harus Diisi !','Oops...');
        return back();
    }else{

        Diagnosis::where('id_pelayananigd',$id)->forceDelete();
        Tindakan::where('id_pelayananigd',$id)->forceDelete();

         foreach ($request->kodeTindakan as $data) {
            $tindakan = new Tindakan();
            $tindakan->id_pelayananigd = $id;
            $tindakan->kode  = $data;
            $tindakan->save(); 
        }
        
         if ($request->kodeDiagnosis == null OR $request->namaDiagnosis == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

        $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis;
            $diagnosa->sub_kode = $request->namaDiagnosis;
            $diagnosa->save();

            $change = PelayananIGD::find($id);
            $change->status = 0;
            $change->Save();
          if ($request->kodeDiagnosis1 == null OR $request->namaDiagnosis1 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }  

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis1;
            $diagnosa->sub_kode = $request->namaDiagnosis1;
            $diagnosa->save();

            $change = PelayananIGD::find($id);
            $change->status = 0;
            $change->Save();
            if ($request->kodeDiagnosis2 == null OR $request->namaDiagnosis2 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis2;
            $diagnosa->sub_kode = $request->namaDiagnosis2;
            $diagnosa->save();
            
            $change = PelayananIGD::find($id);
            $change->status = 0;
            $change->Save();
            if ($request->kodeDiagnosis3 == null OR $request->namaDiagnosis3 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode =$request->kodeDiagnosis3;
            $diagnosa->sub_kode = $request->namaDiagnosis3;
            $diagnosa->save();

            $change = PelayananIGD::find($id);
            $change->status = 0;
            $change->Save();
            if ($request->kodeDiagnosis4 == null OR $request->namaDiagnosis4 == null) {
                  Alert::success('Berhasil', 'data telah ditambahkan');
                  return redirect('pelayanan-igd');  
            }

            $diagnosa = new Diagnosis();
            $diagnosa->id_pelayananigd = $id;
            $diagnosa->diagnosa_komplikasi = 'diagnosa';
            $diagnosa->kode = $request->kodeDiagnosis4;
            $diagnosa->sub_kode = $request->namaDiagnosis4;
            $diagnosa->save();
            
            $change = PelayananIGD::find($id);
            $change->status = 0;
            $change->Save();
        Alert::success('Berhasil', 'data telah ditambahkan');

        return redirect('pelayanan-igd');
    }
}
    public function selesaiIGD($id){
    
    $change = PelayananIGD::find($id);
     $change->status = 0;
     $change->Save();
      Alert::success('Berhasil', 'Pelayanan telah selesai');
     return redirect('/rawat-inap');
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
