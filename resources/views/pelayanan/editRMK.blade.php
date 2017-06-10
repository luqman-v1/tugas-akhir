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
                                            <form role="form" method="post" action="{{url('/rmk/form/edit/'.$edit->idp)}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis</label>
                                                        <input class="form-control" id="noRm" readonly="" name="noRm" value="{{$edit->noRm}}" type="text" placeholder="Nomor Rekam Medis" onkeyup="
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
                                                    <input class="form-control" type="text" readonly="" value="{{$edit->nama}}"  readonly="" id="nama" name="nama" placeholder="Nama Pasien">
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
                                                    <input class="form-control" readonly="" id="provinsi" type="text" value="{{$edit->provinsi}}" name="provinsi" placeholder="Provinsi" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kabupaten/Kota :</label>
                                                    <input class="form-control" readonly="" id="kabupaten" type="text" value="{{$edit->kabupaten}}" name="kabupaten" placeholder="Kabupaten/Kota" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kecamatan :</label>
                                                    <input class="form-control" readonly="" id="kecamatan" type="text" value="{{$edit->kecamatan}}" name="kecamatan" placeholder="Kecamatan" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kelurahan/Desa :</label>
                                                    <input class="form-control" readonly="" id="kelurahan" type="text" value="{{$edit->kelurahan}}" name="kelurahan" placeholder="Kelurahan/Desa" style="width:350px">
                                                </div>

                                                <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                    <label for="dukuh">Dukuh</label>
                                                    <input class="form-control" readonly="" id="dukuh" type="text" value="{{$edit->dukuh}}" name="dukuh" placeholder="Dukuh">
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
                                                                <input placeholder="RT" readonly="" type='text' value="{{$edit->rt}}" name="rt" class="form-control" id="rt" >
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
                                                                <input placeholder="rw" readonly="" type='text' value="{{$edit->rw}}" name="rw" class="form-control" id="rw" >
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
                                                                <input placeholder="Tanggal Lahir" readonly="" type='text' value="{{$edit->tglLahir}}" name="tglLahir" class="form-control" id="tglLahir" >
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
                                                                <input placeholder="tahun" readonly="" type='text' value="{{$edit->tahun}}" name="tahun" class="form-control" id='tahun' />
                                                                
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
                                                                <input placeholder="bulan" readonly="" type='text' value="{{$edit->bulan}}" name="bulan" class="form-control" id='bulan' />
                                                                
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
                                                                <input placeholder="hari"  readonly="" type='text' value="{{$edit->hari}}" name="hari" class="form-control" id='hari' />
                                                                
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
                                                    <div class="form-group">
                                                    <input class="form-control"  data-role="tagsinput" name="diagnosisMasuk" id="diagnosisMasuk" disabled="" value="{{$edit->diagnosisMasuk}}" type="text" >
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
                                                           <label class="control-label " for="namaPerawat">Nama Perawat Ruangan yang Menerima</label>
                                                           <div class="form-group">
                                                               <input type="text" value="{{$edit->namaPerawat}}" readonly="" class="form-control" name="namaPerawat">
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
                                                       <input type="text" value="{{$edit->namaPetugasTpp}}" readonly="" class="form-control" name="namaPetugasTpp">
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
                                                    <input type="text" value="{{$edit->namaDokterPj}}" readonly="" class="form-control" name="namaDokterPj">
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
                                           <input type="text" value="{{$edit->caraKeluar}}" readonly="" class="form-control" name="caraKeluar">
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
                                       <input type="text" value="{{$edit->keadaanKeluar}}" readonly="" id="keadaanKeluar" class="form-control" name="caraKeluar">
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
                                        <input placeholder="tglMeninggal" readonly="" type='text' value="{{$edit->tglMeninggal}}" name="tglMeninggal" class="form-control" id="tglMeninggalID">
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
                                        <input type="text" id="valJam" name="jamMeninggal" readonly="" value="{{$edit->jamMeninggal}}" class="form-control timepicker">
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
                                <input placeholder="Tanggal Kunjungan" type='text' readonly="" value="{{$edit->tglKeluar}}" name="tglKeluar" class="form-control" id="tanggal_keluar">
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
                                <input type="text" name="jamKeluar" value="{{$edit->jamKeluar}}" readonly="" class="form-control timepicker">
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
        <div class="form-group {{ $errors->has('penyebabLuarCedera') ? 'has-error' : ''}}">
         <label class="control-label " for="penyebabLuarCedera">Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma</label>
         <div class="form-group">
           <input type="text" class="form-control" value="{{$edit->penyebabLuarCedera}}" readonly="" name="penyebabLuarCedera" placeholder="Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma">
           <span class="help-block">
            <strong>{{ $errors->first('penyebabLuarCedera') }}</strong>
        </span>
    </div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
    <div class="form-group {{ $errors->has('golonganOperasiTindakan') ? 'has-error' : ''}}">
     <label class="control-label " for="golonganOperasiTindakan">Golongan Operasi/tindakan</label>
     <div class="form-group">
     <input type="text" value="{{$edit->golonganOperasiTindakan}}" readonly="" class="form-control" name="caraKeluar">
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
        <input placeholder="Tanggal Kunjungan" type='text' readonly="" value="{{$edit->tanggal_operasiTindakan}}" name="tanggal_operasiTindakan" class="form-control" id="tanggal_operasiTindakan">
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
       <input type="text" class="form-control" readonly="" name="infeksiNosokomial" value="{{$edit->golonganOperasiTindakan}}" placeholder="Infeksi Nosokomial">
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
       <input type="text" class="form-control" readonly="" value="{{$edit->penyebabInfeksiNosokomial}}" name="penyebabInfeksiNosokomial" placeholder="Penyebab Infeksi Nosokomial">
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
           <input type="text" value="{{$edit->imunisasi}}" readonly="" class="form-control" name="imunisasi">
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
       <input type="text" class="form-control" name="pengobatanRadio" readonly="" value="{{$edit->pengobatanRadio}}" placeholder="Pengobatan Radioterapi/Nuklir">
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
       <input type="text" class="form-control" value="{{$edit->transfusiDarah}}" readonly="" name="transfusiDarah" placeholder="Transfusi Darah">
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
       <input type="text" class="form-control" name="sebabKematian" readonly="" value="{{$edit->sebabKematian}}" placeholder="Sebab Kematian">
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
       <input type="text" class="form-control" value="{{$edit->dokterMemulangkan}}" readonly="" name="transfusiDarah" placeholder="Transfusi Darah">
         <span class="help-block">
            <strong>{{ $errors->first('dokterMemulangkan') }}</strong>
        </span>
    </div>
</div>
</div>
</div>
<div class="row">
 <div class="col-md-6">
    <div class="form-group {{ $errors->has('diagnosisUtama') ? 'has-error' : ''}}">
     <label class="control-label " for="diagnosisUtama">Diagnosa Utama</label>
        <div class="form-group">
           <input type="text" class="form-control" name="diagnosisUtama" data-role="tagsinput" disabled="" value="{{$edit->diagnosisUtama}}">
           <span class="help-block">
            <strong>{{ $errors->first('diagnosisUtama') }}</strong>
        </span>
    </div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group {{ $errors->has('operasiTindakan') ? 'has-error' : ''}}">
     <label class="control-label " for="operasiTindakan">Operasi Tindakan</label>
        <div class="form-group">
        <input type="text" class="form-control" data-role="tagsinput"  value="{{$edit->operasiTindakan}}" disabled="" name="operasiTindakan" >
           <span class="help-block">
            <strong>{{ $errors->first('operasiTindakan') }}</strong>
        </span>
    </div>
</div>
</div>

  <div class="col-md-6">
                <div class="form-group {{ $errors->has('komplikasi') ? 'has-error' : ''}}">
                 <label class="control-label " for="komplikasi">Komplikasi</label>
                 <div class="form-group">
                   <input type="text" class="form-control" disabled="" data-role="tagsinput" name="komplikasi" value="{{$edit->komplikasi}}">
                   <span class="help-block">
                    <strong>{{ $errors->first('komplikasi') }}</strong>
                </span>
            </div>
        </div>
    </div>
</div>
                                    <div class="row">
                                    <div class="col-md-6">
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

                            <div class="col-md-6">
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
                                       <label class="control-label " for="kodeDiagnosis1">Kode Diagnosis</label>     
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

                        {{-- komplikasi --}}

                        <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Komplikasi</label>     
                                       <div class='input-group date'>
                                           <select name="kodeKomplikasi" class="form-control select2">
                                            <option value="">pilih kode Komplikasi</option>
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

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Komplikasi</label>
                                   <div class='input-group date'>
                                     <select name="namaKomplikasi" class="form-control">
                                        <option value="">pilih nama Komplikasi</option>                           
                                    </select>
                                    <span class="add_field_button3 input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                                </div><br>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        
                        <div id="kodeKom" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Komplikasi</label>     
                                       <div class='input-group date'>
                                           <select name="kodeKomplikasi1" class="form-control select2">
                                            <option value="">pilih kode Komplikasi</option>
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

                            <div id="namaKom" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Komplikasi</label>
                                   <div class='input-group date'>
                                     <select name="namaKomplikasi1" class="form-control">
                                        <option value="">pilih nama Komplikasi</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div id="kodeKom1" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Komplikasi</label>     
                                       <div class='input-group date'>
                                           <select name="kodeKomplikasi2" class="form-control select2">
                                            <option value="">pilih kode Komplikasi</option>
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

                            <div id="namaKom1" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Komplikasi</label>
                                   <div class='input-group date'>
                                     <select name="namaKomplikasi2" class="form-control">
                                        <option value="">pilih nama Komplikasi</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div id="kodeKom2" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Komplikasi</label>     
                                       <div class='input-group date'>
                                           <select name="kodeKomplikasi3" class="form-control select2">
                                            <option value="">pilih kode Komplikasi</option>
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

                            <div id="namaKom2" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Komplikasi</label>
                                   <div class='input-group date'>
                                     <select name="namaKomplikasi3" class="form-control">
                                        <option value="">pilih nama Komplikasi</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div id="kodeKom3" style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Komplikasi</label>     
                                       <div class='input-group date'>
                                           <select name="kodeKomplikasi4" class="form-control select2">
                                            <option value="">pilih kode Komplikasi</option>
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

                            <div id="namaKom3" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('namaDiagnosis') ? 'has-error' : ''}}">
                                   <label class="control-label " for="namaDiagnosis">Nama Komplikasi</label>
                                   <div class='input-group date'>
                                     <select name="namaKomplikasi4" class="form-control">
                                        <option value="">pilih nama Komplikasi</option>                           
                                    </select>
                                </div>
                                <span class="help-block">
                                    <strong>{{ $errors->first('namaDiagnosis') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('kodeTindakan') ? 'has-error' : ''}}">
                               <label class="control-label " for="kodeTindakan">Kode Tindakan</label>
                               <div class='input-group date'>
                                 <select name="kodeTindakan[]" class="form-control select2">
                                     <option value="">pilih kode tindakan</option>
                                     @foreach($icd9 as $data)
                                     <option value="{{$data->id}}">{{$data->nama}}</option>
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
        var keadaanKeluar = $('#keadaanKeluar').val();
        // console.log(keadaanKeluar);
            if (keadaanKeluar == "Meninggal"){
                $('#tglMeninggal').show();
                $('#jamMeninggal').show();

            }else{
                $('#tglMeninggal').hide();
                $('#jamMeninggal').hide();

            }
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
           console.log(x);

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
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button3"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
           console.log(x);

            if (x == 1){
                $('#kodeKom').show();
                $('#namaKom').show();

            }else if(x==2){
                $('#kodeKom1').show();
                $('#namaKom1').show();
            }else if(x==3){
                $('#kodeKom2').show();
                $('#namaKom2').show();
            }else if(x==4){
                $('#kodeKom3').show();
                $('#namaKom3').show();
            }else{
                $('#kodeKom4').show();
                $('#namaKom4').show();
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
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap2"); //Fields wrapper
    var add_button      = $(".add_field_button2"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            
            $(wrapper).append('<div class="col-md-6"><div class="form-group"><label class="control-label " for="kodeTindakan"></label><div class="input-group date"><select name="kodeTindakan[]" class="form-control select2"><option value="">pilih kode tindakan</option> @foreach($icd9 as $data) <option value="{{$data->id}}">{{$data->nama}}</option> @endforeach </select><a href="#" class="remove_field">Remove</a></div><br><span class="help-block"><strong></strong></span></div></div>'); //add input box
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
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaDiagnosis"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis"]').append('<option value="'+ key +'">'+ value +'</option>');
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
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaDiagnosis1"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis1"]').append('<option value="'+ key +'">'+ value +'</option>');
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
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaDiagnosis2"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis2"]').append('<option value="'+ key +'">'+ value +'</option>');
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
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaDiagnosis3"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis3"]').append('<option value="'+ key +'">'+ value +'</option>');
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
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaDiagnosis4"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaDiagnosis4"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaDiagnosis4"]').empty();
            }
        });
    });


</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kodeKomplikasi"]').on('change', function() {
            var diagnosisID = $(this).val();
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaKomplikasi"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaKomplikasi"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaKomplikasi"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('select[name="kodeKomplikasi1"]').on('change', function() {
            var diagnosisID = $(this).val();
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaKomplikasi1"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaKomplikasi1"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaKomplikasi1"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('select[name="kodeKomplikasi2"]').on('change', function() {
            var diagnosisID = $(this).val();
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaKomplikasi2"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaKomplikasi2"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaKomplikasi2"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('select[name="kodeKomplikasi3"]').on('change', function() {
            var diagnosisID = $(this).val();
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaKomplikasi3"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaKomplikasi3"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaKomplikasi3"]').empty();
            }
        });
    });

    $(document).ready(function() {
        $('select[name="kodeKomplikasi4"]').on('change', function() {
            var diagnosisID = $(this).val();
            console.log(diagnosisID);
            if(diagnosisID) {
                $.ajax({
                    url: '{{url('/')}}/lrj/diagnosa/'+diagnosisID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="namaKomplikasi4"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="namaKomplikasi4"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="namaKomplikasi4"]').empty();
            }
        });
    });


</script>
@endsection