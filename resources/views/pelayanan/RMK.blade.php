@extends('layouts.index')
@section('title') Ringkasan Masuk Keluar @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">

@endsection
@section('content')

<section class="content-header">
  <h1>
      Pelayanan Pasien
      <small>Pelayanan Ringkasan Masuk Keluar</small>
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
                    <h3 class="box-title">Form Ringkasan Masuk Keluar</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form" method="post" action="">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis</label>
                                                        <input class="form-control" id="noRm" name="noRm" value="{{old('noRm')}}" type="text" placeholder="Nomor Rekam Medis" onkeyup="
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
                                                    <input class="form-control" type="text" readonly="" value="{{old('nama')}}"  id="nama" name="nama" placeholder="Nama Pasien">
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
                                                    <input class="form-control" readonly="" id="provinsi" type="text" value="{{old('provinsi')}}" name="provinsi" placeholder="Provinsi" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kabupaten/Kota :</label>
                                                    <input class="form-control" readonly="" id="kabupaten" type="text" value="{{old('kabupaten')}}" name="kabupaten" placeholder="Kabupaten/Kota" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kecamatan :</label>
                                                    <input class="form-control" readonly="" id="kecamatan" type="text" value="{{old('kecamatan')}}" name="kecamatan" placeholder="Kecamatan" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kelurahan/Desa :</label>
                                                    <input class="form-control" readonly="" id="kelurahan" type="text" value="{{old('kelurahan')}}" name="kelurahan" placeholder="Kelurahan/Desa" style="width:350px">
                                                </div>

                                                <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                    <label for="dukuh">Dukuh</label>
                                                    <input class="form-control" readonly="" id="dukuh" type="text" value="{{old('dukuh')}}" name="dukuh" placeholder="Dukuh">
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
                                                                <input placeholder="RT" readonly="" type='text' value="{{old('rt')}}" name="rt" class="form-control" id="rt" >
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
                                                                <input placeholder="rw" readonly="" type='text' value="{{old('rw')}}" name="rw" class="form-control" id="rw" >
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group{{ $errors->has('tglLahir') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="tglLahir"> Tanggal Lahir</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="Tanggal Lahir" readonly="" type='text' value="{{old('tglLahir')}}" name="tglLahir" class="form-control" id="tglLahir" >
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
                                                                <input placeholder="tahun" readonly="" type='text' value="{{old('tahun')}}" name="tahun" class="form-control" id='tahun' />
                                                                
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
                                                                <input placeholder="bulan" readonly="" type='text' value="{{old('bulan')}}" name="bulan" class="form-control" id='bulan' />
                                                                
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
                                                                <input placeholder="hari" readonly="" type='text' value="{{old('hari')}}" name="hari" class="form-control" id='hari' />
                                                                
                                                            </div>
                                                            @if ($errors->has('hari'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('hari') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group {{ $errors->has('diagnosisMasuk') ? 'has-error' : ''}}">
                                                    <label for="diagnosisMasuk">Diagnosis Masuk</label>
                                                    <input class="form-control" name="diagnosisMasuk" id="diagnosisMasuk" value="{{old('diagnosisMasuk')}}" type="text" placeholder="Diagnosis Masuk">
                                                    @if ($errors->has('diagnosisMasuk'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('diagnosisMasuk') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-lg-6">  
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group {{ $errors->has('namaPerawat') ? 'has-error' : ''}}">
                                                           <label class="control-label " for="namaPerawat">Nama Perawat Ruangan yang Menerima</label>
                                                           <div class="form-group">
                                                               <select name="namaPerawat" id="namaPerawat" class="form-control">
                                                                 <option value="perawat 1">perawat 1</option>
                                                                 <option value="perawat 2">perawat 2</option>
                                                             </select>
                                                             <span class="help-block">
                                                                <strong>{{ $errors->first('namaPerawat') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('namaPetugasTpp') ? 'has-error' : ''}}">
                                                       <label class="control-label " for="namaPetugasTpp">Nama Petugas TPP RI</label>
                                                       <div class="form-group">
                                                           <select name="namaPetugasTpp" id="namaPetugasTpp" class="form-control">
                                                             <option value="petugas 1">petugas 1</option>
                                                             <option value="petugas 2">petugas 2</option>
                                                         </select>
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('namaPetugasTpp') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">  
                                                <div class="form-group {{ $errors->has('namaDokterPj') ? 'has-error' : ''}}">
                                                   <label class="control-label " for="namaDokterPj">Nama Dokter PJ Pelayanan</label>
                                                   <div class="form-group">
                                                       <select name="namaDokterPj" id="namaDokterPj" class="form-control">
                                                         <option value="dokter 1">dokter 1</option>
                                                         <option value="dokter 2">dokter 2</option>
                                                     </select>
                                                     <span class="help-block">
                                                        <strong>{{ $errors->first('namaDokterPj') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('caraKeluar') ? 'has-error' : ''}}">
                                               <label class="control-label " for="caraKeluar">Cara Keluar RS</label>
                                               <div class="form-group">
                                                   <select name="caraKeluar" id="caraKeluar" class="form-control">
                                                     <option value="Diizinkan">Diizinkan</option>
                                                     <option value="permintaan sendiri">permintaan sendiri</option>
                                                     <option value="lari">lari</option>
                                                     <option value="pindah/dirujuk rs lain">pindah/dirujuk rs lain</option>
                                                 </select>
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('caraKeluar') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                       <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('keadaanKeluar') ? 'has-error' : ''}}">
                                               <label class="control-label " for="keadaanKeluar">Keadaan Keluar RS</label>
                                               <div class="form-group">
                                                   <select name="keadaanKeluar" id="keadaanKeluar" class="form-control">
                                                     <option value="Sembuh">Sembuh</option>
                                                     <option value="Belum Sembuh">Belum Sembuh</option>
                                                     <option value="Meninggal">Meninggal</option>
                                                 </select>
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('keadaanKeluar') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                     <div id="tglMeninggal" style="display:none;" class="col-md-6">
                                        <div class="form-group{{ $errors->has('tglMeninggal') ? ' has-error' : '' }}">
                                            <label class="control-label " for="tglMeninggal">Tanggal Meninggal</label><br>
                                            <div class='input-group date'>
                                                <input placeholder="tglMeninggal"  type='text' value="<?php echo date("Y-m-d"); ?>" name="tglMeninggal" class="form-control" id="tglMeninggalID">
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
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('tglKeluar') ? ' has-error' : '' }}">
                                            <label class="control-label " for="tglKeluar">Tanggal Keluar</label><br>
                                            <div class='input-group date'>
                                                <input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="tglKeluar" class="form-control" id="tanggal_keluar">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            @if ($errors->has('tglKeluar'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tglKeluar') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="bootstrap-timepicker">
                                        <div class="form-group{{ $errors->has('jamKeluar') ? ' has-error' : '' }}">
                                            <label class="control-label " for="jamKeluar">Jam Keluar</label><br>
                                            <div class="input-group">
                                                <input type="text" name="jamKeluar" value="{{old('jamKeluar')}}" class="form-control timepicker">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-clock-o"></i>
                                              </div>
                                          </div>
                                          @if ($errors->has('jamKeluar'))
                                          <span class="help-block">
                                            <strong>{{ $errors->first('jamKeluar') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('diagnosisUtama') ? 'has-error' : ''}}">
                                            <label class="control-label " for="diagnosisUtama">Diagnosis Utama</label>
                                                 <div class="form-group">
                                                       <input type="text" class="form-control" name="diagnosisUtama" value="{{old('diagnosisUtama')}}" placeholder="Diagnosis Utama">
                                                       <span class="help-block">
                                                        <strong>{{ $errors->first('diagnosisUtama') }}</strong>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('kodeDiagnosisUtama') ? 'has-error' : ''}}">
                                         <label class="control-label " for="kodeDiagnosisUtama">Kode Diagnosis Utama</label>
                                            <div class="form-group">
                                               <input type="text" class="form-control" value="{{old('kodeDiagnosisUtama')}}" name="kodeDiagnosisUtama" placeholder="Kode Diagnosis Utama">
                                               <span class="help-block">
                                                <strong>{{ $errors->first('kodeDiagnosisUtama') }}</strong>
                                            </span>
                                         </div>
                                    </div>
                                </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diagnosalLain') ? 'has-error' : ''}}">
                                 <label class="control-label " for="diagnosisLain">Diagnosis Lain</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="diagnosisLain" value="{{old('diagnosisLain')}}" placeholder="Diagnosis Lain">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('diagnosisLain') }}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('kodeDiagnosisLain') ? 'has-error' : ''}}">
                         <label class="control-label " for="kodeDiagnosisLain">Kode Diagnosis Lain</label>
                            <div class="form-group">
                               <input type="text" class="form-control" value="{{old('kodeDiagnosisLain')}}" name="kodeDiagnosisLain" placeholder="Kode Diagnosis Lain">

                               <span class="help-block">
                                <strong>{{ $errors->first('kodeDiagnosisLain') }}</strong>
                            </span>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-6">
                                <div class="form-group {{ $errors->has('komplikasi') ? 'has-error' : ''}}">
                                 <label class="control-label " for="komplikasi">Komplikasi</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="komplikasi" value="{{old('komplikasi')}}" placeholder="Komplikasi">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('komplikasi') }}</strong>
                                    </span>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('penyebabLuarCedera') ? 'has-error' : ''}}">
                         <label class="control-label " for="penyebabLuarCedera">Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma</label>
                            <div class="form-group">
                               <input type="text" class="form-control" value="{{old('penyebabLuarCedera')}}" name="penyebabLuarCedera" placeholder="Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma">
                               <span class="help-block">
                                <strong>{{ $errors->first('penyebabLuarCedera') }}</strong>
                            </span>
                                </div>
                         </div>
                    </div>
                </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('operasiTindakan') ? 'has-error' : ''}}">
                         <label class="control-label " for="operasiTindakan">Operasi/tindakan</label>
                            <div class="form-group">
                               <input type="text" class="form-control" name="operasiTindakan" value="{{old('operasiTindakan')}}" placeholder="Operasi/Tindakan">
                               <span class="help-block">
                                <strong>{{ $errors->first('operasiTindakan') }}</strong>
                            </span>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('kodeOperasiTindakan') ? 'has-error' : ''}}">
                         <label class="control-label " for="kodeOperasiTindakan">Kode Operasi/tindakan</label>
                            <div class="form-group">
                               <input type="text" class="form-control" value="{{old('kodeOperasiTindakan')}}" name="kodeOperasiTindakan" placeholder="Kode Operasi/tindakan">

                               <span class="help-block">
                                <strong>{{ $errors->first('kodeOperasiTindakan') }}</strong>
                            </span>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('golonganOperasiTindakan') ? 'has-error' : ''}}">
                         <label class="control-label " for="kodeDiagnosis">Golongan Operasi/tindakan</label>
                            <div class="form-group">
                               <input type="text" class="form-control" name="golonganOperasiTindakan" value="{{old('golonganOperasiTindakan')}}" placeholder="Golongan Operasi/tindakan">
                               <span class="help-block">
                                <strong>{{ $errors->first('golonganOperasiTindakan') }}</strong>
                            </span>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tanggal_operasiTindakan') ? 'has-error' : ''}}">
                         <label class="control-label " for="tanggal_operasiTindakan">Tanggal Operasi/tindakan</label>
                            <div class='input-group date'>
                                <input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="tanggal_operasiTindakan" class="form-control" id="tanggal_operasiTindakan">
                                  <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                       </span>
                                  </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('infeksiNosokomial') ? 'has-error' : ''}}">
                         <label class="control-label " for="infeksiNosokomial">Infeksi Nosokomial</label>
                            <div class="form-group">
                               <input type="text" class="form-control" name="infeksiNosokomial" value="{{old('infeksiNosokomial')}}" placeholder="Infeksi Nosokomial">
                               <span class="help-block">
                                <strong>{{ $errors->first('infeksiNosokomial') }}</strong>
                            </span>
                    </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('penyebabInfeksiNosokomial') ? 'has-error' : ''}}">
                         <label class="control-label " for="penyebabInfeksiNosokomial">Penyebab Infeksi Nosokomial</label>
                            <div class="form-group">
                               <input type="text" class="form-control" value="{{old('penyebabInfeksiNosokomial')}}" name="penyebabInfeksiNosokomial" placeholder="Penyebab Infeksi Nosokomial">
                               <span class="help-block">
                                <strong>{{ $errors->first('penyebabInfeksiNosokomial') }}</strong>
                            </span>
                             </div>
                         </div>
                    </div>
                </div>
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group {{ $errors->has('imunisasi') ? 'has-error' : ''}}">
                                                           <label class="control-label " for="imunisasi">Imunisasi yang Pernah Didapat</label>
                                                           <div class="form-group">
                                                               <select name="imunisasi" id="imunisasi" class="form-control">
                                                                 <option value="Ya">BCG</option>
                                                                 <option value="Tidak">DT</option>
                                                                 <option value="Tidak">DPT</option>
                                                                 <option value="Tidak">POLIO</option>
                                                                 <option value="Tidak">TFT</option>
                                                                 <option value="Tidak">CAMPAK</option>
                                                                 <option value="Tidak">Lain-lain</option>
                                                             </select>
                                                             <span class="help-block">
                                                                <strong>{{ $errors->first('imunisasi') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>

                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has('pengobatanRadio/nuklir') ? 'has-error' : ''}}">
                         <label class="control-label " for="pengobatanRadio">Pengobatan Radioterapi/Nuklir</label>
                            <div class="form-group">
                               <input type="text" class="form-control" name="pengobatanRadio" value="{{old('pengobatanRadio')}}" placeholder="Pengobatan Radioterapi/Nuklir">
                               <span class="help-block">
                                <strong>{{ $errors->first('pengobatanRadio') }}</strong>
                            </span>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('transfusiDarah') ? 'has-error' : ''}}">
                         <label class="control-label " for="transfusiDarah">Transfusi Darah</label>
                            <div class="form-group">
                               <input type="text" class="form-control" value="{{old('transfusiDarah')}}" name="transfusiDarah" placeholder="Transfusi Darah">

                               <span class="help-block">
                                <strong>{{ $errors->first('transfusiDarah') }}</strong>
                            </span>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('sebabKematian') ? 'has-error' : ''}}">
                         <label class="control-label " for="sebabKematian">Sebab Kematian</label>
                            <div class="form-group">
                               <input type="text" class="form-control" name="sebabKematian" value="{{old('sebabKematian')}}" placeholder="Sebab Kematian">
                               <span class="help-block">
                                <strong>{{ $errors->first('sebabKematian') }}</strong>
                            </span>
                                </div>
                            </div>
                    </div>

                                            <div class="col-md-6">  
                                                        <div class="form-group {{ $errors->has('dokterMemulangkan') ? 'has-error' : ''}}">
                                                           <label class="control-label " for="dokterMemulangkan">Dokter yang Memulangkan</label>
                                                           <div class="form-group">
                                                               <select name="dokterMemulangkan" id="dokterMemulangkan" class="form-control">
                                                                 <option value="Ya">dokter 1</option>
                                                                 <option value="Tidak">dokter 2</option>
                                                                 <option value="Tidak">dokter 3</option>
                                                             </select>
                                                             <span class="help-block">
                                                                <strong>{{ $errors->first('dokterMemulangkan') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
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

<script>
  $(function () {

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

   $('#tglMeninggalID').datepicker({
    autoclose : true,
    format : 'yyyy-mm-dd'
   });

    //Date picker
   $('#tanggal_operasiTindakan').datepicker({
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
      $(".valJam").timepicker({
        showInputs: false,
        minuteStep: 1,
        locale: 'id',
        showMeridian :false,
        use24hours: true

    });
     
 });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#noRm').on('keyup', function(e) {
            var cariID = $(this).val();
            if(cariID) {
                $.ajax({
                    url: 'rmk/norm/'+cariID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                         console.log(data);
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
    $(document).ready(function(){
        $('#keadaanKeluar').on('change',function(){
            if (this.value == "Meninggal"){
                $('#tglMeninggal').show();
                $('#jamMeninggal').show();
             
            }else{
                $('#tglMeninggal').hide();
                $('#jamMeninggal').hide();
             
            }
        });
    });

 
</script>
@endsection