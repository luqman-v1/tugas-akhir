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
class PelayananController extends Controller
{
    public function indexLrj(){

        $lrj = PelayananRj::join('rawat_jalan','id_RJ','Rawat_Jalan.id')
       ->join('pasien','id_pasien','pasien.id')
       ->orderBy('pelayanan_rawatJalan.id','desc')
       ->where('kodeDiagnosis',null)->orWhere('kodeTindakan',null)
       ->select('pelayanan_rawatJalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatJalan.*')
       ->get();

        return view('pelayanan.indexLRJ')->with('lrj',$lrj);
    }
    public function lrjUbah($id){
        $edit = PelayananRj::where('pelayanan_rawatJalan.id',$id)->join('rawat_jalan','id_RJ','Rawat_Jalan.id')
       ->join('pasien','id_pasien','pasien.id')
       ->select('pelayanan_rawatJalan.id as idp','pasien.*','rawat_jalan.*','pelayanan_rawatJalan.*')
       ->first();
       $edit->tglLahir;
        $biday = new DateTime($edit->tglLahir);
        $today = new DateTime();
        $diff = $today->diff($biday);
          //bikin array baru 
        $edit['tahun'] = $diff->y;
        $edit['bulan'] = $diff->m;
        $edit['hari'] = $diff->d;

       $icd = Icd::all();
       
        return view('pelayanan.editLRJ')->with('edit',$edit)->with('icd',$icd);
    }

    public function lrjUbahSimpan(Request $request,$id){

        $this->validate($request, [
            'kodeDiagnosis' => 'required',
            'kodeTindakan' => 'required',
            ]);

        $edit = PelayananRj::find($id);
        $edit->kodeDiagnosis = $request->kodeDiagnosis;
        $edit->kodeTindakan = $request->kodeTindakan;
        $edit->save();
        
        Alert::success('Berhasil', 'Data diagnosis telah ditambahkan');
        return redirect('lrj');
    }

    public function lrj(){

    	return view('pelayanan.LRJ');
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
            'pemeriksaanFisik' => 'required',
            'radiologi' => 'required',
            'laboratorium' =>'required',
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
    	$prj->pemeriksaanFisik = $request->pemeriksaanFisik;
    	$prj->radiologi = $request->radiologi;
    	$prj->laboratorium = $request->laboratorium;
    	$prj->diagnosa = $request->diagnosa;
    	$prj->tindakan = $request->tindakan;
    	$prj->kodeDiagnosis = $request->kodeDiagnosis;
    	$prj->kodeTindakan = $request->kodeTindakan;
    	$prj->save();

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

    public function rmk(){

    	return view('pelayanan.RMK');
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
            'kodeDiagnosisUtama' => 'required',
            'diagnosisLain' => 'required',
            'kodeDiagnosisLain' => 'required',
            'komplikasi' => 'required',
            'penyebabLuarCedera' => 'required',
            'operasiTindakan' => 'required',
            'kodeOperasiTindakan' => 'required',
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
    	$rmk->kodeDiagnosisUtama = $request->kodeDiagnosisUtama;
    	$rmk->diagnosisLain = $request->diagnosisLain;
    	$rmk->kodeDiagnosisLain = $request->kodeDiagnosisLain;
    	$rmk->komplikasi = $request->komplikasi;
    	$rmk->penyebabLuarCedera = $request->penyebabLuarCedera;
    	$rmk->operasiTindakan = $request->operasiTindakan;
    	$rmk->kodeOperasiTindakan = $request->kodeOperasiTindakan;
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

    	Alert::success('Berhasil', 'Data Pelayanan Rawat Inap telah ditambahkan');
         return back();
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

    public function lgd(){

    	return view('pelayanan.LGD');
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

    	Alert::success('Berhasil', 'Data Pelayanan Rawat IGD telah ditambahkan');
         return back();
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
