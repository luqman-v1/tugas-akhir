<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rawat_Jalan;
use App\Rawat_Inap;
use App\Rawat_IGD;
use App\PelayananRJ;
use Alert;
use DateTime;
use PDF;
use DB;
use App\PelayananIGD;
use App\Pasien;
use App\Diagnosis;
use App\PelayananRI;
use \Carbon\Carbon;
use App\role_user;
use App\ICD;
use App\tbl_icd10nama;
use App\ICD9;
class PelaporanController extends Controller
{
    public function getFormRegister(){

    	return view('pelaporan.register');
    }

    public function getFormLihatRegister(Request $request){
    	// return $request->dariTanggal;
		$this->validate($request, [
			'dariTanggal' => 'required',
			'sampaiTanggal' => 'required',
		]);

        if ($request->register == 'RJ') {
            
             $register = PelayananRJ::join('rawat_jalan','id_RJ','rawat_jalan.id')
                ->join('pasien','id_pasien','pasien.id')
            ->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])
            ->orderBy('pelayanan_rawatjalan.id','desc')
            ->get();
            $nama = 'Rawat Jalan';

        return view('pelaporan.viewRegister')->with(compact('register','nama'));

        }elseif($request->register == 'RI'){

              $register = PelayananRI::join('rawat_inap','id_RI','rawat_inap.id')
                ->join('pasien','id_pasien','pasien.id')
            ->whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])
            ->orderBy('pelayanan_rawatinap.id','desc')
            ->get();
            $nama = 'Rawat Inap';
            
        return view('pelaporan.viewRegister')->with(compact('register','nama'));

        }else{
             $inap = PelayananRI::join('rawat_inap','id_RI','rawat_inap.id')
                ->join('pasien','id_pasien','pasien.id')
            ->whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])
            ->orderBy('pelayanan_rawatinap.id','desc')
            ->get();

             $jalan = PelayananRJ::join('rawat_jalan','id_RJ','rawat_jalan.id')
                ->join('pasien','id_pasien','pasien.id')
            ->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])
            ->orderBy('pelayanan_rawatjalan.id','desc')
            ->get();

            $igd =  PelayananIGD::join('rawat_igd','id_IGD','rawat_igd.id')
                ->join('pasien','id_pasien','pasien.id')
            ->whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])
            ->orderBy('pelayanan_rawatigd.id','desc')
            ->get();

            return view('pelaporan.kunjunganRumahSakit')->with(compact('inap','jalan','igd'));
        }

		

    }

    public function tes(){
    	$data = ['nama','oke'];
    	$pdf = PDF::loadView('pelaporan.tes', $data);
    	// return PDF::loadFile('localhost/lara54/public')->inline('lara.pdf');
		return $pdf->stream();
    }

    public function getFormEksternal(){

        return view('pelaporan.eksternal');
    }

    public function getFormLihatEksternal(Request $request){
        $this->validate($request, [
            'dariTanggal' => 'required',
            'sampaiTanggal' => 'required',
        ]);

            $dateValue = strtotime($request->dariTanggal);                     

            $year = date("Y", $dateValue) ." "; 
            $mon = date("m", $dateValue); 
            $now = Carbon::now();
            
            $month_name = date("F", mktime(0, 0, 0, $mon, 10));

        if ($request->rl == 51) {
        
        $getPasienBaru = Pasien::whereBetween('tglMasuk', [$request->dariTanggal,$request->sampaiTanggal])->count();
          
          $getPasienRJ = Rawat_Jalan::whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
          
          $getPasienRI = Rawat_Inap::whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])->count();
          
          $getPasienIGD = Rawat_IGD::whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])->count();
        
        $jumlah = $getPasienRJ+$getPasienRI+$getPasienIGD;
      
        $month_name = date("F", mktime(0, 0, 0, $mon, 10));
        $tanggal = $now->toFormattedDateString();
        // $pdf = PDF::loadView('pelaporan.extR1', compact('getPasienBaru','jumlah','month_name','year'));
        
        // return $pdf->download("RL 5.1 - $tanggal.pdf");
        return view('pelaporan.extR1')->with(compact('getPasienBaru','jumlah','month_name','year'));
        
        }elseif ($request->rl == 52) {
    
            $bedahUmum = Rawat_Jalan::where('klinikTujuan','Umum')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
           
            $Digestive = Rawat_Jalan::where('klinikTujuan','Digestive')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
            
            $BedahThroraks = Rawat_Jalan::where('klinikTujuan','Throraks')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
           
            $Orthopedi = Rawat_Jalan::where('klinikTujuan','Orthopedi')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
           
            $Urologi = Rawat_Jalan::where('klinikTujuan','Urologi')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
            
            $BedahPlastik = Rawat_Jalan::where('klinikTujuan','Bedah Plastik dan Estetik')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();

      
        $month_name = date("F", mktime(0, 0, 0, $mon, 10));
        $tanggal = $now->toFormattedDateString();
        $tanggal = $now->toFormattedDateString();
        $pdf = PDF::loadView('pelaporan.extR2', compact('bedahUmum','Digestive','BedahThroraks','Orthopedi','Urologi','BedahPlastik','month_name','year'));
        
        // return $pdf->download("RL 5.2 - $tanggal.pdf");
        return view('pelaporan.extR2')->with(compact('bedahUmum','Digestive','BedahThroraks','Orthopedi','Urologi','BedahPlastik','month_name','year'));

         }elseif ($request->rl == 53) {
            
            $extR3 = Pasien::join('rawat_inap','pasien.id','id_pasien')
                        ->join('pelayanan_rawatinap','rawat_inap.id','id_RI')
                        ->join('diagnosis','pelayanan_rawatinap.id','id_pelayananinap')
                        ->join('tbl_icd10','diagnosis.kode','tbl_icd10.id')
                        ->whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])
                        ->select('tbl_icd10.kode',DB::raw('
                            count(diagnosis.kode) as jumlah,
                             (SELECT COUNT(jenisKelamin) FROM pasien right join rawat_inap on pasien.id = rawat_inap.id_pasien INNER join pelayanan_rawatinap on pelayanan_rawatinap.id_RI = rawat_inap.id  WHERE jenisKelamin="Laki-Laki" and not keadaanKeluar="Meninggal" ) 
                                as lakiHidup,
                        (SELECT COUNT(jenisKelamin) FROM pasien right join rawat_inap on pasien.id = rawat_inap.id_pasien INNER join pelayanan_rawatinap on pelayanan_rawatinap.id_RI = rawat_inap.id  WHERE jenisKelamin="Perempuan" and not keadaanKeluar="Meninggal") 
                        as PerempuanHidup ,
                        (SELECT COUNT(jenisKelamin) FROM pasien right join rawat_inap on pasien.id = rawat_inap.id_pasien INNER join pelayanan_rawatinap on pelayanan_rawatinap.id_RI = rawat_inap.id  WHERE jenisKelamin="Laki-Laki" and keadaanKeluar="Meninggal" ) 
                        as lakiMati,
                        (SELECT COUNT(jenisKelamin) FROM pasien right join rawat_inap on pasien.id = rawat_inap.id_pasien INNER join pelayanan_rawatinap on pelayanan_rawatinap.id_RI = rawat_inap.id  WHERE jenisKelamin="Perempuan" and keadaanKeluar="Meninggal") 
                        as PerempuanMati ,
                            (SELECT COUNT(lakiHidup+PerempuanHidup+lakiMati+PerempuanMati)  FROM pasien right join rawat_inap on pasien.id = rawat_inap.id_pasien INNER join pelayanan_rawatinap on pelayanan_rawatinap.id_RI = rawat_inap.id ) 
                            as total
                            '))
                        ->whereNotNull('id_pelayananinap')
                        ->whereNull('diagnosis.deleted_at')
                        ->groupBy('diagnosis.kode')
                        ->orderBy('jumlah','desc')
                        ->limit(10)
                        ->get();

             return view('pelaporan.extR3')->with(compact('extR3','month_name','year'));
         }else{
              $extR4 = Pasien::join('rawat_jalan','pasien.id','id_pasien')
                        ->join('pelayanan_rawatjalan','rawat_jalan.id','id_RJ')
                        ->join('diagnosis','pelayanan_rawatjalan.id','id_pelayananjalan')
                        ->join('tbl_icd10','diagnosis.kode','tbl_icd10.id')
                        ->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])
                        ->select('tbl_icd10.kode',DB::raw('
                            count(diagnosis.kode) as jumlah,
                            count(tglKunjungan) as  kunjungan
                            '))
                        ->whereNotNull('id_pelayananjalan')
                        ->whereNull('diagnosis.deleted_at')
                        ->groupBy('diagnosis.kode')
                        ->orderBy('jumlah','desc')
                        ->limit(10)
                        ->get();
            return view('pelaporan.extr4')->with(compact('extR4','month_name','year'));
         }   
    }

    public function formIndex(){

        return view('pelaporan.index');
    }

    public function formIndexCek(Request $request){
        // return $request->all();

        if ($request->index == "penyakit") {
            # code...
        }elseif ($request->index == "tindakan") {
              $ri = Pasien::join('rawat_inap','pasien.id','id_pasien')
                        ->join('pelayanan_rawatinap','rawat_inap.id','id_RI')
                         ->join('tindakan','pelayanan_rawatinap.id','tindakan.id_pelayananinap')
                        ->join('tbl_icd9','tindakan.kode','tbl_icd9.id')
                        ->select('pasien.nama as namaPasien','pasien.*','pelayanan_rawatinap.*','rawat_inap.*','tindakan.*','tbl_icd9.*')
                        ->whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])
                        ->where('tindakan.kode',$request->list)
                        ->groupBy('pelayanan_rawatinap.id')
                        ->get();
                      $tindakan  = $request->list;
            return view('pelaporan.indexTindakan')->with(compact('ri','tindakan'));  

        }elseif ($request->index == "dokter") {

             $ri = Pasien::join('rawat_inap','pasien.id','id_pasien')
                        ->join('pelayanan_rawatinap','rawat_inap.id','id_RI')
                        ->join('diagnosis','pelayanan_rawatinap.id','id_pelayananinap')
                        ->whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])
                        ->where('namaDokterPj',$request->list)
                        ->groupBy('pelayanan_rawatinap.id')
                        ->get();
          
            
            $dokter = $request->list;

            return view('pelaporan.indexDokter')->with(compact('ri','dokter'));

        }else{

        }

      
    }

    public function dokter(){
        $dokter = role_user::join('users','user_id','id')->where('role_id',6)->pluck("name","id");

        return $dokter;
    }
    public function penyakit(){

        $penyakit = tbl_icd10nama::join('tbl_icd10','id_tblicd10','tbl_icd10.id')->orderBy('nama','asc')->pluck("nama","id_tblicd10");

        return $penyakit;
    }

    public function tindakan(){
        $tindakan = ICD9::orderBy('nama','asc')->pluck("nama","id");

        return $tindakan;

    }
}
