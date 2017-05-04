<?php

namespace App\Http\Controllers;
use Alert;
use DateTime;
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
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    	$totalPasien = Pasien::count();

    	return view('dashboard.home')->with(compact('totalPasien'));
    }
}
