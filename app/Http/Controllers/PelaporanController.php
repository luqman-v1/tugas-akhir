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
    
            $bedahUmum = Rawat_Jalan::where('klinikTujuan','Bedah Umum')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
           
            $Digestive = Rawat_Jalan::where('klinikTujuan','Bedah Saluran Cerna (Digestive)')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
            
            $BedahThroraks = Rawat_Jalan::where('klinikTujuan','Bedah Throraks')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
           
            $Orthopedi = Rawat_Jalan::where('klinikTujuan','Bedah Tulang dan Sendi (Orthopedi)')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
           
            $Urologi = Rawat_Jalan::where('klinikTujuan','Bedah Saluran Kencing (Urologi)')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
            
            $BedahPlastik = Rawat_Jalan::where('klinikTujuan','Bedah Plastik dan Estetik')->whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();

      
        $month_name = date("F", mktime(0, 0, 0, $mon, 10));
        $tanggal = $now->toFormattedDateString();
        $tanggal = $now->toFormattedDateString();
        $pdf = PDF::loadView('pelaporan.extR2', compact('bedahUmum','Digestive','BedahThroraks','Orthopedi','Urologi','BedahPlastik','month_name','year'));
        
        // return $pdf->download("RL 5.2 - $tanggal.pdf");
        return view('pelaporan.extR2')->with(compact('bedahUmum','Digestive','BedahThroraks','Orthopedi','Urologi','BedahPlastik','month_name','year'));

         }elseif ($request->rl == 53) {
                $extR3 = DB::table('diagnosis')
                ->join('pelayanan_rawatinap','id_pelayanan','pelayanan_rawatinap.id')
                ->join('rawat_inap','id_RI','rawat_inap.id')
                ->join('pasien','id_pasien','pasien.id')
                ->whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])
                ->select('kode','diagnosis.nama as aka',DB::raw('
                    (SELECT COUNT(jenisKelamin) FROM pasien  WHERE jenisKelamin="Laki-Laki"  AND NOT keadaanKeluar="Meninggal" ) 
                    as lakiHidup,
                    (SELECT COUNT(jenisKelamin) FROM pasien  WHERE jenisKelamin="Perempuan" AND NOT keadaanKeluar="Meninggal") 
                    as PerempuanHidup ,
                    (SELECT COUNT(jenisKelamin) FROM pasien  WHERE jenisKelamin="Laki-Laki"  AND keadaanKeluar="Meninggal" ) 
                    as lakiMati,
                    (SELECT COUNT(jenisKelamin) FROM pasien  WHERE jenisKelamin="Perempuan" AND keadaanKeluar="Meninggal") 
                    as PerempuanMati ,
                    (SELECT COUNT(jenisKelamin) FROM pasien  ) 
                    as total
                    ')
                )
              
                ->groupBy('kode')
                ->orderBy('total','asc')
                ->limit(10)
                ->get();

             
             return view('pelaporan.extR3')->with(compact('extR3','month_name','year'));
         }else{
            return view('pelaporan.extr4');
         }   
    }

    public function formIndex(){

        return view('pelaporan.index');
    }

    public function formIndexCek(){
        return view('');
    }
}
