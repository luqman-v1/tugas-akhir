<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rawat_Jalan;
use App\Rawat_Inap;
use App\Rawat_IGD;
use Alert;
use DateTime;
use PDF;
use App\Pasien;
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


		$rj = Rawat_Jalan::whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->get();

    	return view('pelaporan.hasil')->with(compact('rj'));
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
        if ($request->rl == 51) {
        
        $getPasienBaru = Pasien::whereBetween('tglMasuk', [$request->dariTanggal,$request->sampaiTanggal])->count();
          
          $getPasienRJ = Rawat_Jalan::whereBetween('tglKunjungan', [$request->dariTanggal,$request->sampaiTanggal])->count();
          
          $getPasienRI = Rawat_Inap::whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])->count();
          
          $getPasienIGD = Rawat_IGD::whereBetween('tanggal_masuk', [$request->dariTanggal,$request->sampaiTanggal])->count();
        
        $jumlah = $getPasienRJ+$getPasienRI+$getPasienIGD;
      
        $month_name = date("F", mktime(0, 0, 0, $mon, 10));
        $tanggal = $now->toFormattedDateString();
        $pdf = PDF::loadView('pelaporan.extR1', compact('getPasienBaru','jumlah','month_name','year'));
        
        return $pdf->download("RL 5.1 - $tanggal.pdf");
        // return view('pelaporan.extR1')->with('getPasienBaru',$getPasienBaru)->with('jumlah',$jumlah);
        
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
        
        return $pdf->download("RL 5.2 - $tanggal.pdf");
         }

        
    }
}
