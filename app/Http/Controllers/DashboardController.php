<?php

namespace App\Http\Controllers;
use Alert;
use DateTime;
use App\Rawat_Jalan;
use App\Pasien;
use App\Rawat_Inap;
use App\Rawat_IGD;
use App\tbl_icd10nama;
use App\Diagnosis;
use App\Tindakan;
use Illuminate\Http\Request;
use App\PelayananIGD;
use App\PelayananRI;
use App\PelayananRJ;
use App\User;
use App\Icd9;
use App\Icd;
use DB;
use Auth;
class DashboardController extends Controller
{

    // public function index(){
   
    // 	 if (Auth::user()->hasRole('admin') OR Auth::user()->hasRole('rekmed')) {
    //     return redirect('/dashboard')->with('success', 'Selamat datang '.Auth::user()->name);
    //     }elseif(Auth::user()->hasRole('dokter') OR Auth::user()->hasRole('perawat')) {
    //       return redirect('lrj')->with('success', 'Selamat datang '.Auth::user()->name);
    //   }
    // }

    public function index(){
      if(Auth::user()->hasRole('dokter') OR Auth::user()->hasRole('perawat')) {
          return redirect('lrj')->with('success', 'Selamat datang '.Auth::user()->name);
      }
      $totalPasien = Pasien::count();
      $tahun = date('Y');
       $rj = Rawat_Jalan::select(DB::raw('MONTHNAME(tglKunjungan) AS bulan'),DB::raw('count(*) AS jumlah'))
       ->whereYear('tglKunjungan',$tahun)
       ->orderBy('tglKunjungan','asc')
       ->groupBy('bulan')
       ->get();

       $ri = Rawat_Inap::select(DB::raw('MONTHNAME(tanggal_masuk) AS bulan'),DB::raw('count(*) AS jumlah'))
       ->whereYear('tanggal_masuk',$tahun)
       ->orderBy('tanggal_masuk','asc')
       ->groupBy('bulan')
       ->get();

       $igd = Rawat_IGD::select(DB::raw('MONTHNAME(tanggal_masuk) AS bulan'),DB::raw('count(*) AS jumlah'))
       ->whereYear('tanggal_masuk',$tahun)
       ->orderBy('tanggal_masuk','asc')
       ->groupBy('bulan')
       ->get();


      $besar = Pasien::select(DB::raw('count(kecamatan) as jumlah'),'kecamatan')
     ->groupBy('kecamatan')
     ->orderBy('jumlah','desc')
     ->limit(3)
     ->get();

     $pegawai = User::count();

     $icd10 = Icd::count();
     $icd9 = Icd9::count();

    

       $pasien = Pasien::select(DB::raw('MONTHNAME(tglMasuk) AS bulan'),DB::raw('count(*) AS jumlah'))
       ->whereYear('tglMasuk',$tahun)
       ->orderBy('tglMasuk','asc')
       ->groupBy('bulan')
       ->get();

       $laki = Pasien::where('jenisKelamin','Laki-Laki')->count();
       $perempuan = Pasien::where('jenisKelamin','Perempuan')->count();

      return view('dashboard.home')->with(compact('totalPasien','rj','ri','igd','tahun','besar','pegawai','icd10','icd9','laki','perempuan','pasien'));
    }
}
