@extends('layouts.index')
@section('title') Lembar Gawat Darurat @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{url('/plugins/select2/select2.min.css')}}">


@endsection
@section('content')

<section class="content-header">
  <h1>
      Pelayanan Pasien
      <small>Pelayanan Lembar Gawat Darurat</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/')}}">Pelayanan</a></li>
    <li class="active">Baru</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Lembar Gawat Darurat</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="form_validation" method="post" action="{{url('pelayanan-igd')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $igd->id }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis</label>
                                                        <input class="form-control" id="noRm" name="noRm" value="{{ $igd->noRm }}" readonly="" type="text" placeholder="Nomor Rekam Medis" onkeyup="
                                                        var noRm = this.value;
                                                        if (noRm.match(/^\d{2}$/) !== null) {
                                                           this.value = noRm + '-';
                                                       } else if (noRm.match(/^\d{2}\-\d{2}$/) !== null) {
                                                           this.value = noRm + '-';
                                                       }" maxlength="8">

                                                       @if ($errors->has('noRm'))
                                                       <span class="help-block">
                                                        <strong>{{ $errors->first('noRm') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                

                                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                                    <label for="nama">Nama Pasien</label>
                                                    <input class="form-control" type="text" readonly="" value="{{ $igd->nama }}"  id="nama" name="nama" placeholder="Nama Pasien">
                                                    @if ($errors->has('nama'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('nama') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <hr>
                                                <center><label for="title">Alamat Lengkap :</label></center>
                                                <div class="form-group">
                                                    <label for="title">Provinsi :</label>
                                                    <input class="form-control" readonly="" id="provinsi" type="text" value="{{ $igd->provinsi }}" name="provinsi" placeholder="Provinsi" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kabupaten/Kota :</label>
                                                    <input class="form-control" readonly="" id="kabupaten" type="text" value="{{ $igd->kabupaten }}" name="kabupaten" placeholder="Kabupaten/Kota" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kecamatan :</label>
                                                    <input class="form-control" readonly="" id="kecamatan" type="text" value="{{ $igd->kecamatan }}" name="kecamatan" placeholder="Kecamatan" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kelurahan/Desa :</label>
                                                    <input class="form-control" readonly="" id="kelurahan" type="text" value="{{ $igd->kelurahan }}" name="kelurahan" placeholder="Kelurahan/Desa" style="width:350px">
                                                </div>

                                                <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                    <label for="dukuh">Dukuh</label>
                                                    <input class="form-control" readonly="" id="dukuh" type="text" value="{{ $igd->dukuh }}" name="dukuh" placeholder="Dukuh">
                                                    @if ($errors->has('dukuh'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('dukuh') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group{{ $errors->has('rt') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="RT">RT</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="RT" readonly="" type='text' value="{{ $igd->rt }}" name="rt" class="form-control" id="rt" >
                                                            </div>
                                                            @if ($errors->has('RT'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('RT') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="rw">RW</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="rw" readonly="" type='text' value="{{ $igd->rw }}" name="rw" class="form-control" id="rw" >
                                                            </div>
                                                            @if ($errors->has('rw'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('rw') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div> 
                                                </div>
                                                <hr>
                                                
                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group{{ $errors->has('tglLahir') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="tglLahir"> Tanggal Lahir</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="Tanggal Lahir" readonly="" type='text' value="{{ $igd->tglLahir }}" name="tglLahir" class="form-control" >
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                            @if ($errors->has('tglLahir'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tglLahir') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group {{ $errors->has('tahun') ? ' has-error' : '' }}">
                                                            <label class="control-label "  for="tahun"> Tahun</label><br>
                                                            <div class="input-group date">
                                                                <input placeholder="tahun" readonly="" type='text' value="{{ $igd->tahun }}" name="tahun" class="form-control" id='tahun' />
                                                                
                                                            </div>
                                                            @if ($errors->has('tahun'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tahun') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group {{ $errors->has('bulan') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="bulan"> Bulan</label><br>
                                                            <div class="input-group date">
                                                                <input placeholder="bulan" readonly="" type='text' value="{{ $igd->bulan }}" name="bulan" class="form-control" id='bulan' />
                                                                
                                                            </div>
                                                            @if ($errors->has('bulan'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bulan') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group {{ $errors->has('hari') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="hari"> Hari</label><br>
                                                            <div class="input-group date">
                                                                <input placeholder="hari" readonly="" type='text' value="{{ $igd->hari }}" name="hari" class="form-control" id='hari' />
                                                                
                                                            </div>
                                                            @if ($errors->has('hari'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('hari') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group {{ $errors->has('jenisKasus') ? 'has-error' : ''}}">
                                                           <label class="control-label " for="jenisKasus">Jenis Kasus</label>
                                                               <select name="jenisKasus" required id="jenisKasus" class="form-control">
                                                               <option value="">pilih</option>
                                                                 <option value="Bedah">Bedah</option>
                                                                 <option value="Obsgin">Obsgin</option>
                                                                 <option value="Interna">Interna</option>
                                                             </select>
                                                             <span class="help-block">
                                                                <strong>{{ $errors->first('jenisKasus') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
 
                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('tindakanResuitasi') ? 'has-error' : ''}}">
                                                       <label class="control-label " for="tindakanResuitasi">Tindakan Resusitasi</label>
                                                           <select name="tindakanResuitasi" required id="tindakanResuitasi" class="form-control">
                                                             <option value="">pilih</option>
                                                             <option value="Ya">Ya</option>
                                                             <option value="Tidak">Tidak</option>
                                                         </select>
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('tindakanResuitasi') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>

                                            <div class="col-md-6">  
                                                <div class="form-group {{ $errors->has('cramsScore') ? 'has-error' : ''}}">
                                                   <label class="control-label " for="cramsScore">Crams Score/ GCS</label>
                                                       <input placeholder="Crams Score/ GCS" type='number' required value="{{old('cramsScore')}}" name="cramsScore" class="form-control" id="cramsScore">
                                                     <span class="help-block">
                                                        <strong>{{ $errors->first('cramsScore') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
  
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('anamnesis') ? 'has-error' : ''}}">
                                               <label class="control-label " for="anamnesis">Anamnesis</label>    
                                                  <input placeholder="Anamnesis" required type='text' value="{{old('anamnesis')}}" name="anamnesis" class="form-control" id="anamnesis">
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('anamnesis') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('pemeriksaanFisik') ? ' has-error' : '' }}">
                                            <label class="control-label " for="pemeriksaanFisik">Pemeriksaan Fisik</label><br>
                                               <select class="form-control" required name="pemeriksaanFisik">
                                               <option value="">pilih</option>
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                               </select>
                                            </div>
                                            @if ($errors->has('pemeriksaanFisik'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pemeriksaanFisik') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    <div class="col-md-6">
                                       <div class="bootstrap-timepicker">
                                        <div class="form-group{{ $errors->has('pemeriksaanStatus') ? ' has-error' : '' }}">
                                            <label class="control-label" for="jam_masuk">Pemeriksaan Status Nyeri</label><br>
                                             <input placeholder="Pemeriksaan Status Nyeri" required type='number' value="{{old('pemeriksaanStatus')}}" name="pemeriksaanStatus" class="form-control" id="pemeriksaanStatus">
                                          </div>
                                          @if ($errors->has('pemeriksaanStatus'))
                                          <span class="help-block">
                                            <strong>{{ $errors->first('pemeriksaanStatus') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                        </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('pemeriksaanLaboratorium') ? 'has-error' : ''}}">
                                            <label class="control-label " for="pemeriksaanLaboratorium">Pemeriksaan Laboratorium</label>
                                                       <input type="text" class="form-control"  name="pemeriksaanLaboratorium" value="{{old('pemeriksaanLaboratorium')}}" placeholder="Pemeriksaan Laboratorium">
                                                       <span class="help-block">
                                                        <strong>{{ $errors->first('pemeriksaanLaboratorium') }}</strong>
                                                    </span>
                                                </div>
                                        </div>
                          

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('pemeriksaanRadiologi') ? 'has-error' : ''}}">
                                         <label class="control-label " for="pemeriksaanRadiologi">Pemeriksaan Radiologi</label>
                                               <input type="text" class="form-control" value="{{old('pemeriksaanRadiologi')}}" name="pemeriksaanRadiologi" placeholder="Pemeriksaan Radiologi">
                                               <span class="help-block">
                                                <strong>{{ $errors->first('pemeriksaanRadiologi') }}</strong>
                                            </span>
                                         </div>
                                    </div>
                           

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diagonosisAwal') ? 'has-error' : ''}}">
                                 <label class="control-label " for="diagonosisAwal">Diagnosis Awal</label>
                                
                                       <input type="text" class="form-control" required data-role="tagsinput" name="diagonosisAwal" value="{{old('diagonosisAwal')}}" placeholder="Diagnosis ">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('diagonosisAwal') }}</strong>
                                    </span>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diagnosisAkhir') ? 'has-error' : ''}}">
                                 <label class="control-label " for="diagnosisAkhir">Diagnosis Akhir </label>
                                       <input type="text" class="form-control" required data-role="tagsinput" name="diagnosisAkhir" value="{{old('diagnosisAkhir')}}" placeholder="Diagnosis ">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('diagnosisAkhir') }}</strong>
                                    </span>
                                </div>
                            </div>
               

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('terapiTindakan') ? 'has-error' : ''}}">
                         <label class="control-label " for="terapiTindakan">Terapi/Tindakan di IGD</label>
                               <input type="text" class="form-control" required data-role="tagsinput" value="{{old('terapiTindakan')}}" name="terapiTindakan" placeholder="Terapi/Tindakan di IGD">
                               <span class="help-block">
                                <strong>{{ $errors->first('terapiTindakan') }}</strong>
                            </span>
                            </div>
                         </div>
                 

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tindakanLanjut') ? 'has-error' : ''}}">
                         <label class="control-label" for="tindakanLanjut">Tindak Lanjut</label>
                               <select name="tindakanLanjut" id="tindakanLanjut" required class="form-control">
                                                             <option value="">pilih</option>
                                                             <option value="Pulang">Pulang</option>
                                                             <option value="Dirujuk">Dirujuk</option>
                                                             <option value="Dirawat">Dirawat</option>
                                                             <option value="Meninggal">Meninggal</option>
                                                             <option value="Menolak Dirawat">Menolak Dirawat</option>
                                                         </select>
                               <span class="help-block">
                                <strong>{{ $errors->first('tindakanLanjut') }}</strong>
                            </span>
                                </div>
                         </div>
               

                    <div id="dirujuk" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('dirujuk') ? 'has-error' : ''}}">
                                 <label class="control-label " for="dirujuk">Dirujuk Ke</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control"  name="dirujuk" value="{{old('dirujuk')}}" placeholder="Dirujuk Ke">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('dirujuk') }}</strong>
                                    </span>
                                </div>
                            </div>
                    </div>

                     <div id="tglMeninggal" style="display:none;" class="col-md-6">
                                        <div class="form-group{{ $errors->has('tglMeninggal') ? ' has-error' : '' }}">
                                            <label class="control-label " for="tglMeninggal">Tanggal Meninggal</label><br>
                                            <div class='input-group date'>
                                                <input placeholder="tglMeninggal" type='text' value="<?php echo date("Y-m-d"); ?>" name="tglMeninggal" class="form-control" id="tanggal_masuk">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            @if ($errors->has('tglMeninggal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tglMeninggal') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="jamMeninggal" style="display:none;" class="col-md-6">
                                       <div class="bootstrap-timepicker">
                                        <div class="form-group{{ $errors->has('jamMeninggal') ? ' has-error' : '' }}">
                                            <label class="control-label " for="jamMeninggal">Jam Meninggal</label><br>
                                            <div class="input-group">
                                                <input type="text" id="valJam" name="jamMeninggal" value="{{old('jamMeninggal')}}" class="form-control timepicker">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-clock-o"></i>
                                              </div>
                                          </div>
                                          @if ($errors->has('jamMeninggal'))
                                          <span class="help-block">
                                            <strong>{{ $errors->first('jamMeninggal') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                             <div style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Diagnosis</label>     
                                       <div class='input-group date'>
                                           <select name="kodeDiagnosis" class="form-control select2">
                                            <option value="">pilih kode diagnosis</option>
                                            @foreach($icd as $data)
                                            <option value="{{$data->id}}">{{$data->kode}}</option>
                                            @endforeach                           
                                        </select>
                                        <span class="input-group-addon"></span>
                                    </div>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kodeDiagnosis') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Diagnosis</label>
                                   <div class='input-group date'>
                                     <select name="namaDiagnosis" class="form-control">
                                        <option value="">pilih nama diagnosis</option>                           
                                    </select>
                                    <span class="add_field_button input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                                </div><br>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        
                        <div id="kodediag" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Diagnosis</label>     
                                       <div class='input-group date'>
                                           <select name="kodeDiagnosis1" class="form-control select2">
                                            <option value="">pilih kode diagnosis</option>
                                            @foreach($icd as $data)
                                            <option value="{{$data->id}}">{{$data->kode}}</option>
                                            @endforeach                           
                                        </select>
                                    </div>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kodeDiagnosis') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div id="namadiag" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Diagnosis</label>
                                   <div class='input-group date'>
                                     <select name="namaDiagnosis1" class="form-control">
                                        <option value="">pilih nama diagnosis</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div id="kodediag1" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Diagnosis</label>     
                                       <div class='input-group date'>
                                           <select name="kodeDiagnosis2" class="form-control select2">
                                            <option value="">pilih kode diagnosis</option>
                                            @foreach($icd as $data)
                                            <option value="{{$data->id}}">{{$data->kode}}</option>
                                            @endforeach                           
                                        </select>
                                        
                                    </div>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kodeDiagnosis') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div id="namadiag1" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Diagnosis</label>
                                   <div class='input-group date'>
                                     <select name="namaDiagnosis2" class="form-control">
                                        <option value="">pilih nama diagnosis</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div id="kodediag2" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Diagnosis</label>     
                                       <div class='input-group date'>
                                           <select name="kodeDiagnosis3" class="form-control select2">
                                            <option value="">pilih kode diagnosis</option>
                                            @foreach($icd as $data)
                                            <option value="{{$data->id}}">{{$data->kode}}</option>
                                            @endforeach                           
                                        </select>
                                        
                                    </div>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kodeDiagnosis') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div id="namadiag2" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Diagnosis</label>
                                   <div class='input-group date'>
                                     <select name="namaDiagnosis3" class="form-control">
                                        <option value="">pilih nama diagnosis</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div id="kodediag3" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Diagnosis</label>     
                                       <div class='input-group date'>
                                           <select name="kodeDiagnosis4" class="form-control select2">
                                            <option value="">pilih kode diagnosis</option>
                                            @foreach($icd as $data)
                                            <option value="{{$data->id}}">{{$data->kode}}</option>
                                            @endforeach                           
                                        </select>
                                        
                                    </div>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kodeDiagnosis') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div id="namadiag3" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Diagnosis</label>
                                   <div class='input-group date'>
                                     <select name="namaDiagnosis4" class="form-control">
                                        <option value="">pilih nama diagnosis</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div style="display:none;" class="col-md-6">
                            <div class="form-group {{ $errors->has('kodeTindakan') ? 'has-error' : ''}}">
                               <label class="control-label " for="kodeTindakan">Kode Tindakan</label>
                               <div class='input-group date'>
                                 <select name="kodeTindakan[]" class="form-control select2">
                                     <option value="">pilih kode tindakan</option>
                                     @foreach($icd9 as $data)
                                     <option value="{{$data->kode}}">{{$data->kode}}</option>
                                     @endforeach      
                                 </select>
                                 <span class="add_field_button2 input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                             </div>
                             <span class="help-block">
                                <strong>{{ $errors->first('kodeTindakan') }}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="input_fields_wrap2"></div>
                </div>

            </div>
            <div class="col-md-12">
                <br><br><br><br><br>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
            </div>
        </form>
        <!-- /.row (nested) -->
    </div>
    <!--End Advanced Tables -->
</div>
</div>

</div>
<!-- /. PAGE INNER  -->
</div>
</div>
<!-- /.box-body -->
</form>
</div>
<!-- /.box -->


</div>
</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->

@endsection

@section('js')
<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{url('/plugins/select2/select2.full.min.js')}}"></script>


<script>
  $(function () {
   $(".select2").select2();
     //Date picker
     $('#tglLahir').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });
   //Date picker
   $('#tanggal_masuk').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });

     //Timepicker
     $(".timepicker").timepicker({
        showInputs: false,
        minuteStep: 1,
        locale: 'id',
        showMeridian :false,
        use24hours: true

    });
     
 });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tindakanLanjut').on('change',function(e){
           var tindakLanjut =  $(this).val();
           // console.log(tindakLanjut);
            if(tindakLanjut == 'Dirujuk'){
                $('#jamMeninggal').hide();
                $('#tglMeninggal').hide();
                $('#dirujuk').show();
            }else if(tindakLanjut == 'Meninggal'){
                $('#jamMeninggal').show();
                $('#tglMeninggal').show();
                $('#dirujuk').hide();
            }else{
                 $('#jamMeninggal').hide();
                $('#tglMeninggal').hide();
                $('#dirujuk').hide();
            }
        });
    });

    $(document).ready(function() {
        $('#noRm').on('keyup', function(e) {
            var cariID = $(this).val();
            if(cariID) {
                $.ajax({
                    url: '{{url('pelayanan-igd/norm/')}}/'+cariID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                        var pasien = jQuery.parseJSON(JSON.stringify(data));
                        var nama = document.getElementById("nama").value =pasien['nama'];
                        var provinsi = document.getElementById("provinsi").value =pasien['provinsi'];
                        var kabupaten = document.getElementById("kabupaten").value =pasien['kabupaten'];
                        var kecamatan = document.getElementById("kecamatan").value =pasien['kecamatan'];
                        var kelurahan = document.getElementById("kelurahan").value =pasien['kelurahan'];
                        var dukuh = document.getElementById("dukuh").value =pasien['dukuh'];
                        var rt = document.getElementById("rt").value =pasien['rt'];
                        var rw = document.getElementById("rw").value =pasien['rw'];
                        var tglLahir = document.getElementById("tglLahir").value =pasien['tglLahir'];
                        var umur = document.getElementById("tahun").value =pasien['tahun'];
                        var umur = document.getElementById("bulan").value =pasien['bulan'];
                        var umur = document.getElementById("hari").value =pasien['hari'];
                        
                    },
                    error:function(exception){
                     var nama = document.getElementById("nama").value ='Tidak DItemukan';
                     var provinsi = document.getElementById("provinsi").value ='Tidak DItemukan';
                     var kabupaten = document.getElementById("kabupaten").value ='Tidak DItemukan';
                     var kecamatan = document.getElementById("kecamatan").value ='Tidak DItemukan';
                     var kelurahan = document.getElementById("kelurahan").value ='Tidak DItemukan';
                     var dukuh = document.getElementById("dukuh").value ='Tidak DItemukan';
                     var rt = document.getElementById("rt").value ='Tidak DItemukan';
                     var rw = document.getElementById("rw").value ='Tidak DItemukan';
                     var tglLahir = document.getElementById("tglLahir").value ='Tidak DItemukan';
                     var umur = document.getElementById("tahun").value ='Tidak DItemukan';
                     var umur = document.getElementById("bulan").value ='Tidak DItemukan';
                     var umur = document.getElementById("hari").value ='Tidak DItemukan';
                 }
             });
            }else{
                var nama = document.getElementById("nama").value ='';
                var provinsi = document.getElementById("provinsi").value ='';
                var kabupaten = document.getElementById("kabupaten").value ='';
                var kecamatan = document.getElementById("kecamatan").value ='';
                var kelurahan = document.getElementById("kelurahan").value ='';
                var dukuh = document.getElementById("dukuh").value ='';
                var rt = document.getElementById("rt").value ='';
                var rw = document.getElementById("rw").value ='';
                var tglLahir = document.getElementById("tglLahir").value ='';
                var umur = document.getElementById("tahun").value ='';
                var umur = document.getElementById("bulan").value ='';
                var umur = document.getElementById("hari").value ='';
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
           // console.log(x);

            if (x == 1){
                $('#kodediag').show();
                $('#namadiag').show();

            }else if(x==2){
                $('#kodediag1').show();
                $('#namadiag1').show();
            }else if(x==3){
                $('#kodediag2').show();
                $('#namadiag2').show();
            }else if(x==4){
                $('#kodediag3').show();
                $('#namadiag3').show();
            }else{
                $('#kodediag4').show();
                $('#namadiag4').show();
            }

            x++; //text box increment
        
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button2"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            
            $(wrapper).append('<div class="col-md-6"><div class="form-group"><label class="control-label " for="kodeTindakan"></label><div class="input-group date"><select name="kodeTindakan[]" class="form-control select2"><option value="">pilih kode tindakan</option> @foreach($icd9 as $data) <option value="{{$data->kode}}">{{$data->kode}}</option> @endforeach </select><a href="#" class="remove_field">Remove</a></div><br><span class="help-block"><strong></strong></span></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kodeDiagnosis"]').on('change', function() {
            var diagnosisID = $(this).val();
            // console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="namaDiagnosis"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaDiagnosis"]').empty();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kodeDiagnosis1"]').on('change', function() {
            var diagnosisID = $(this).val();
            // console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="namaDiagnosis1"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis1"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaDiagnosis1"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('select[name="kodeDiagnosis2"]').on('change', function() {
            var diagnosisID = $(this).val();
            // console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="namaDiagnosis2"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis2"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaDiagnosis2"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('select[name="kodeDiagnosis3"]').on('change', function() {
            var diagnosisID = $(this).val();
            // console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="namaDiagnosis3"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis3"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaDiagnosis3"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('select[name="kodeDiagnosis4"]').on('change', function() {
            var diagnosisID = $(this).val();
            // console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="namaDiagnosis4"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis4"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaDiagnosis4"]').empty();
            }
        });
    });


</script>


@endsection

