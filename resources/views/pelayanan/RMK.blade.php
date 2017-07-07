@extends('layouts.index')
@section('title') Ringkasan Masuk Keluar @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{url('/plugins/select2/select2.min.css')}}">


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
                                            <form id="form_validation" method="post" action="{{url('rmk')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $rmk->id }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis</label>
                                                        <input class="form-control" id="noRm" name="noRm" readonly="" value="{{$rmk->noRm}}" type="text" placeholder="Nomor Rekam Medis" onkeyup="
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
                                                    <input class="form-control" type="text" readonly="" value="{{$rmk->nama}}"  id="nama" name="nama" placeholder="Nama Pasien">
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
                                                    <input class="form-control" readonly="" id="provinsi" type="text" value="{{$rmk->provinsi}}" name="provinsi" placeholder="Provinsi" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kabupaten/Kota :</label>
                                                    <input class="form-control" readonly="" id="kabupaten" type="text" value="{{$rmk->kabupaten}}" name="kabupaten" placeholder="Kabupaten/Kota" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kecamatan :</label>
                                                    <input class="form-control" readonly="" id="kecamatan" type="text" value="{{$rmk->kecamatan}}" name="kecamatan" placeholder="Kecamatan" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kelurahan/Desa :</label>
                                                    <input class="form-control" readonly="" id="kelurahan" type="text" value="{{$rmk->kelurahan}}" name="kelurahan" placeholder="Kelurahan/Desa" style="width:350px">
                                                </div>

                                                <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                    <label for="dukuh">Dukuh</label>
                                                    <input class="form-control" readonly="" id="dukuh" type="text" value="{{$rmk->dukuh}}" name="dukuh" placeholder="Dukuh">
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
                                                                <input placeholder="RT" readonly="" type='text' value="{{$rmk->rt}}" name="rt" class="form-control" id="rt" >
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
                                                                <input placeholder="rw" readonly="" type='text' value="{{$rmk->rw}}" name="rw" class="form-control" id="rw" >
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
                                                                <input placeholder="Tanggal Lahir" readonly="" type='text' value="{{$rmk->tglLahir}}" name="tglLahir" class="form-control" >
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
                                                                <input placeholder="tahun" readonly="" type='text' value="{{$rmk->tahun}}" name="tahun" class="form-control" id='tahun' />
                                                                
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
                                                                <input placeholder="bulan" readonly="" type='text' value="{{$rmk->bulan}}" name="bulan" class="form-control" id='bulan' />
                                                                
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
                                                                <input placeholder="hari" readonly="" type='text' value="{{$rmk->hari}}" name="hari" class="form-control" id='hari' />
                                                                
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
                                                    <label for="diagnosisMasuk">Diagnosis Masuk*</label><br>
                                                       <small>Note : untuk diagnosis masuk lebih dari 1 batasi dengan koma (,)</small>
                                                    <div class="form-group">
                                                    <input class="form-control" data-role="tagsinput" required name="diagnosisMasuk" id="diagnosisMasuk" value="{{$lastcek == null ? old('diagnosisMasuk') : $lastcek->diagnosisMasuk }}" type="text" placeholder="Diagnosis Masuk">
                                                    </div>
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
                                                           <label class="control-label " for="namaPerawat">Nama Perawat Ruangan yang Menerima*</label>
                                                               <select name="namaPerawat" required id="namaPerawat" class="form-control">
                                                                  
                                                                        <option value="">pilih</option>
                                                                        @foreach($perawat as $data)
                                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                                        @endforeach
                                                                
                                                                  
                                                            </select>
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('namaPerawat') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>

                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('namaPetugasTpp') ? 'has-error' : ''}}">
                                                       <label class="control-label " for="namaPetugasTpp">Nama Petugas TPP RI*</label>
                                                           <select name="namaPetugasTpp" required id="namaPetugasTpp" class="form-control">
                                                            <option value="">pilih</option>
                                                        @foreach($rekmed as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                        </select>
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('namaPetugasTpp') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            <div class="col-md-6">  
                                                <div class="form-group {{ $errors->has('namaDokterPj') ? 'has-error' : ''}}">
                                                   <label class="control-label" for="namaDokterPj">Nama Dokter PJ Pelayanan*</label>
                                                       <select name="namaDokterPj" required id="namaDokterPj" class="form-control">
                                                        <option value="">pilih</option>
                                                        @foreach($dokter as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('namaDokterPj') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    

        <div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('penyebabLuarCedera') ? 'has-error' : ''}}">
         <label class="control-label " for="penyebabLuarCedera">Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma</label>
           <input type="text" class="form-control" value="{{$lastcek == null ? old('penyebabLuarCedera') : $lastcek->penyebabLuarCedera }}" name="penyebabLuarCedera" placeholder="Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma">
           <span class="help-block">
            <strong>{{ $errors->first('penyebabLuarCedera') }}</strong>
        </span>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <div class="form-group {{ $errors->has('golonganOperasiTindakan') ? 'has-error' : ''}}">
     <label class="control-label " for="golonganOperasiTindakan">Golongan Operasi/tindakan*</label>

       <select name="golonganOperasiTindakan" required class="form-control">
       @if($lastcek != null)
             <optio selected hidden value="{{ $lastcek->golonganOperasiTindakan }}">{{ $lastcek->golonganOperasiTindakan }}</option>
            <option value="Kecil">Kecil</option>
            <option value="Sedang">Sedang</option>
            <option value="Khusus">Khusus</option>
        @else    
            <option value="">Pilih</option>
            <option value="Kecil">Kecil</option>
            <option value="Sedang">Sedang</option>
            <option value="Khusus">Khusus</option>
        @endif
        
    </select>
    <span class="help-block">
        <strong>{{ $errors->first('golonganOperasiTindakan') }}</strong>
    </span>
</div>
</div>


<div class="col-md-6">
    <div class="form-group {{ $errors->has('tanggal_operasiTindakan') ? 'has-error' : ''}}">
     <label class="control-label " for="tanggal_operasiTindakan">Tanggal Operasi/tindakan*</label>
     <div class='input-group date'>
        <input placeholder="Tanggal Kunjungan" type='text' required value="<?php echo date("Y-m-d"); ?>" name="tanggal_operasiTindakan" class="form-control" id="tanggal_operasiTindakan">
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
       <input type="text" class="form-control" name="infeksiNosokomial" value="{{$lastcek == null ? old('infeksiNosokomial') : $lastcek->infeksiNosokomial }}" placeholder="Infeksi Nosokomial">
       <span class="help-block">
        <strong>{{ $errors->first('infeksiNosokomial') }}</strong>
    </span>
</div>
</div>


<div class="col-md-6">
    <div class="form-group {{ $errors->has('penyebabInfeksiNosokomial') ? 'has-error' : ''}}">
     <label class="control-label " for="penyebabInfeksiNosokomial">Penyebab Infeksi Nosokomial</label>
       <input type="text" class="form-control" value="{{$lastcek == null ? old('penyebabInfeksiNosokomial') : $lastcek->penyebabInfeksiNosokomial }}" name="penyebabInfeksiNosokomial" placeholder="Penyebab Infeksi Nosokomial">
       <span class="help-block">
        <strong>{{ $errors->first('penyebabInfeksiNosokomial') }}</strong>
    </span>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-6">  
        <div class="form-group {{ $errors->has('imunisasi') ? 'has-error' : ''}}">
           <label class="control-label " for="imunisasi">Imunisasi yang Pernah Didapat*</label>
               <select name="imunisasi" required id="imunisasi" class="form-control">
        @if($lastcek != null)
             <optio selected hidden value="{{ $lastcek->imunisasi }}">{{ $lastcek->imunisasi }}</option>
            <option value="BCG">BCG</option>
                   <option value="DT">DT</option>
                   <option value="DPT">DPT</option>
                   <option value="POLIO">POLIO</option>
                   <option value="TFT">TFT</option>
                   <option value="CAMPAK">CAMPAK</option>
                   <option value="Lain-lain">Lain-lain</option>
        @else    
             <option value="">pilih</option>
                   <option value="BCG">BCG</option>
                   <option value="DT">DT</option>
                   <option value="DPT">DPT</option>
                   <option value="POLIO">POLIO</option>
                   <option value="TFT">TFT</option>
                   <option value="CAMPAK">CAMPAK</option>
                   <option value="Lain-lain">Lain-lain</option>
        @endif
                  
               </select>
               <span class="help-block">
                <strong>{{ $errors->first('imunisasi') }}</strong>
            </span>
        </div>
    </div>
</div>


<div class="row">
 <div class="col-md-6">
    <div class="form-group {{ $errors->has('pengobatanRadio/nuklir') ? 'has-error' : ''}}">
     <label class="control-label " for="pengobatanRadio">Pengobatan Radioterapi/Nuklir</label>
       <input type="text" class="form-control" name="pengobatanRadio" value="{{$lastcek == null ? old('pengobatanRadio') : $lastcek->pengobatanRadio }}" placeholder="Pengobatan Radioterapi/Nuklir">
       <span class="help-block">
        <strong>{{ $errors->first('pengobatanRadio') }}</strong>
    </span>
</div>
</div>


<div class="col-md-6">
    <div class="form-group {{ $errors->has('transfusiDarah') ? 'has-error' : ''}}">
     <label class="control-label " for="transfusiDarah">Transfusi Darah</label>
       <input type="text" class="form-control" value="{{$lastcek == null ? old('transfusiDarah') : $lastcek->transfusiDarah }}" name="transfusiDarah" placeholder="Transfusi Darah">

       <span class="help-block">
        <strong>{{ $errors->first('transfusiDarah') }}</strong>
    </span>
</div>
</div>
</div>
                            <hr>
                            <div class="row">
                                       <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('caraKeluar') ? 'has-error' : ''}}">
                                           <label class="control-label " for="caraKeluar">Cara Keluar RS*</label>
                                               <select name="caraKeluar" required id="caraKeluar" class="form-control">
                                                <option value="">pilih</option>
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

                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('keadaanKeluar') ? 'has-error' : ''}}">
                                       <label class="control-label " for="keadaanKeluar">Keadaan Keluar RS*</label>
                                           <select name="keadaanKeluar" required id="keadaanKeluar" class="form-control">
                                            <option value="">pilih</option>
                                            <option value="Sembuh">Sembuh</option>
                                            <option value="Belum Sembuh">Belum Sembuh</option>
                                            <option value="Meninggal">Meninggal</option>
                                        </select>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('keadaanKeluar') }}</strong>
                                        </span>
                                    </div>
                                </div>

                            <div id="tglMeninggal" style="display:none;" class="col-md-6">
                                <div class="form-group{{ $errors->has('tglMeninggal') ? ' has-error' : '' }}">
                                    <label class="control-label " for="tglMeninggal">Tanggal Meninggal</label><br>
                                    <div class='input-group date'>
                                        <input placeholder="tglMeninggal" required  type='text' value="<?php echo date("Y-m-d"); ?>" name="tglMeninggal" class="form-control" id="tglMeninggalID">
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
                                        <input type="text" id="valJam" required name="jamMeninggal" value="{{old('jamMeninggal')}}" class="form-control timepicker">
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
              
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('tglKeluar') ? ' has-error' : '' }}">
                            <label class="control-label " for="tglKeluar">Tanggal Keluar*</label><br>
                            <div class='input-group date'>
                                <input placeholder="Tanggal Kunjungan" required type='text' value="<?php echo date("Y-m-d"); ?>" name="tglKeluar" class="form-control" id="tanggal_keluar">
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
                            <label class="control-label " for="jamKeluar">Jam Keluar*</label><br>
                            <div class="input-group">
                                <input type="text" name="jamKeluar" required value="{{old('jamKeluar')}}" class="form-control timepicker">
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
        
    
<div class="col-md-6" style="display: none;" id="mati">
    <div class="form-group {{ $errors->has('sebabKematian') ? 'has-error' : ''}}">
     <label class="control-label " for="sebabKematian">Sebab Kematian</label>
       <input type="text" class="form-control"  name="sebabKematian" value="{{old('sebabKematian')}}" placeholder="Sebab Kematian">
       <span class="help-block">
        <strong>{{ $errors->first('sebabKematian') }}</strong>
    </span>
</div>
</div>


<div class="col-md-6">  
    <div class="form-group {{ $errors->has('dokterMemulangkan') ? 'has-error' : ''}}">
       <label class="control-label " for="dokterMemulangkan">Dokter yang Memulangkan*</label>
           <select name="dokterMemulangkan" required id="dokterMemulangkan" class="form-control">
            <option value="">pilih</option>
               @foreach($dokter as $data)
               <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
         </select>
         <span class="help-block">
            <strong>{{ $errors->first('dokterMemulangkan') }}</strong>
        </span>
    </div>
</div>
</div>
<hr>
<div class="row">
 <div class="col-md-6">
    <div class="form-group {{ $errors->has('diagnosisUtama') ? 'has-error' : ''}}">
     <label class="control-label " for="diagnosisUtama">Diagnosa Utama*</label><br>
                                                       <small>Note : untuk diagnosa utama lebih dari 1 batasi dengan koma (,)</small>
        <div class="form-group">
           <input type="text" class="form-control" required name="diagnosisUtama" data-role="tagsinput" value="{{$lastcek == null ? old('diagnosisUtama') : $lastcek->diagnosisUtama }}" placeholder="Diagnosa Utama">
           <span class="help-block">
            <strong>{{ $errors->first('diagnosisUtama') }}</strong>
        </span>
    </div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group {{ $errors->has('operasiTindakan') ? 'has-error' : ''}}">
     <label class="control-label " for="operasiTindakan">Operasi Tindakan*</label><br>
                                                       <small>Note : untuk operasi tindakan lebih dari 1 batasi dengan koma (,)</small>
        <div class="form-group">
        <input type="text" class="form-control" required  value="{{$lastcek == null ? old('operasiTindakan') : $lastcek->operasiTindakan }}" data-role="tagsinput" name="operasiTindakan" placeholder="Operasi Tindakan">
           <span class="help-block">
            <strong>{{ $errors->first('operasiTindakan') }}</strong>
        </span>
    </div>
</div>
</div>

  <div class="col-md-6">
                <div class="form-group {{ $errors->has('komplikasi') ? 'has-error' : ''}}">
                 <label class="control-label " for="komplikasi">Komplikasi</label><br>
                                                       <small>Note : untuk komplikasi lebih dari 1 batasi dengan koma (,)</small>
                 <div class="form-group">
                   <input type="text" class="form-control" name="komplikasi" data-role="tagsinput" value="{{$lastcek == null ? old('komplikasi') : $lastcek->komplikasi }}" placeholder="Komplikasi">
                   <span class="help-block">
                    <strong>{{ $errors->first('komplikasi') }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>
<div style="display:none;" class="row">
<div class="col-md-6">
    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
     <label class="control-label " for="kodeDiagnosis">Kode Diagnosis</label>     
     <div class='input-group date'>
         <select name="kodeDiagnosis[]" class="form-control select2">
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

<div  class="col-md-6">
    <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
     <label class="control-label " for="namaDiagnosis">Nama Diagnosis</label>
     <div class='input-group date'>
       <select name="namaDiagnosis[]" class="form-control select2">
        <option value="">pilih nama diagnosis</option>
        @foreach($icd as $data)
        <option value="{{$data->id}}">{{$data->nama}}</option>
        @endforeach                           
    </select>
    <span class="add_field_button input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
</div><br>
<span class="help-block">
    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
</span>
</div>
</div>

<div class="input_fields_wrap"> </div>

<div style="display:none;" class="col-md-6">
    <div class="form-group {{ $errors->has('kodeKomplikasi') ? 'has-error' : ''}}">
     <label class="control-label " for="kodeKomplikasi">Kode komplikasi</label>     
     <div class='input-group date'>
         <select name="kodeKomplikasi[]" class="form-control select2">
            <option value="">pilih kode komplikasi</option>
            @foreach($icd as $data)
            <option value="{{$data->id}}">{{$data->kode}}</option>
            @endforeach                           
        </select>
        <span class="input-group-addon"></span>
    </div>
    <span class="help-block">
        <strong>{{ $errors->first('kodeKomplikasi') }}</strong>
    </span>
</div>
</div>

<div style="display:none;" class="col-md-6">
    <div class="form-group {{ $errors->has('namaKomplikasi') ? 'has-error' : ''}}">
     <label class="control-label " for="namaKomplikasi">Nama komplikasi</label>
     <div class='input-group date'>
       <select name="namaKomplikasi[]" class="form-control select2">
        <option value="">pilih nama komplikasi</option>
        @foreach($icd as $data)
        <option value="{{$data->id}}">{{$data->nama}}</option>
        @endforeach                           
    </select>
    <span class="add_field_button3 input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
</div><br>
<span class="help-block">
    <strong>{{ $errors->first('namaKomplikasi') }}</strong>
</span>
</div>
</div>

<div class="input_fields_wrap3"> </div>

<div style="display:none;" class="col-md-6">
    <div class="form-group {{ $errors->has('kodeTindakan') ? 'has-error' : ''}}">
     <label class="control-label " for="kodeTindakan">Kode Tindakan</label>
     <div class='input-group date'>
       <select name="kodeTindakan[]" class="form-control select2">
           <option value="">pilih kode tindakan</option>
           @foreach($icd9 as $data)
           <option value="{{$data->id}}">{{$data->kode}}</option>
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

   $('#tglMeninggalID').datepicker({
    autoclose : true,
    format : 'yyyy-mm-dd'
});
   $('#tanggal_keluar').datepicker({
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
                    url: '{{url('/')}}/rmk/norm/'+cariID,
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
    $(document).ready(function(){
        $('#keadaanKeluar').on('change',function(){
            if (this.value == "Meninggal"){
                $('#tglMeninggal').show();
                $('#jamMeninggal').show();
                $('#mati').show();

            }else{
                $('#tglMeninggal').hide();
                $('#jamMeninggal').hide();
                 $('#mati').hide();

            }   
        });
    });


</script>
<script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-6"><div class="form-group"><label class="control-label "for="kodeDiagnosis"></label><div class="input-group date"><select name="kodeDiagnosis[]" class="form-control select2"><option value="">pilih kode diagnosis</option> @foreach($icd as $data) <option value="{{$data->id}}">{{$data->kode}}</option> @endforeach </select><a href="#" class="remove_field">Remove</a></div><span class="help-block"><strong></strong></span></div></div><div class="col-md-6"><div class="form-group"><label class="control-label "for="kodeDiagnosis"></label><div class="input-group date"><select name="namaDiagnosis[]" class="form-control select2"><option value="">pilih nama diagnosis</option> @foreach($icd as $data)<option value="{{$data->id}}">{{$data->nama}}</option> @endforeach </select><a href="#" class="remove_field">Remove</a></div><br><span class="help-block"><strong></strong></span></div></div>'); //add input box
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
    var wrapper         = $(".input_fields_wrap3"); //Fields wrapper
    var add_button      = $(".add_field_button3"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-6"><div class="form-group"><label class="control-label "for="kodeKomplikasi"></label><div class="input-group date"><select name="kodeKomplikasi[]" class="form-control select2"><option value="">pilih kode komplikasi</option> @foreach($icd as $data) <option value="{{$data->id}}">{{$data->kode}}</option> @endforeach </select><a href="#" class="remove_field">Remove</a></div><span class="help-block"><strong></strong></span></div></div><div class="col-md-6"><div class="form-group"><label class="control-label "for="namaKomplikasi"></label><div class="input-group date"><select name="namaKomplikasi[]" class="form-control select2"><option value="">pilih nama komplikasi</option> @foreach($icd as $data)<option value="{{$data->id}}">{{$data->nama}}</option> @endforeach </select><a href="#" class="remove_field">Remove</a></div><br><span class="help-block"><strong></strong></span></div></div>'); //add input box
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
            $(wrapper).append('<div class="col-md-6"><div class="form-group"><label class="control-label " for="kodeTindakan"></label><div class="input-group date"><select name="kodeTindakan[]" class="form-control select2"><option value="">pilih kode tindakan</option> @foreach($icd9 as $data) <option value="{{$data->id}}">{{$data->kode}}</option> @endforeach </select><a href="#" class="remove_field">Remove</a></div><br><span class="help-block"><strong></strong></span></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

@endsection