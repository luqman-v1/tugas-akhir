@extends('layouts.index')
@section('title') Lembar Rawat Jalan @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{url('/plugins/select2/select2.min.css')}}">


@endsection
@section('content')

<section class="content-header">
  <h1>
      Pelayanan Pasien
      <small>Pelayanan Lembar Rawat Jalan</small>
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
                    <h3 class="box-title">Form Pelayanan Lembar Rawat Jalan</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="form_validation" method="post" action="{{url('lrj')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{{ $lrj->id }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis</label>
                                                        <input class="form-control" id="noRm" name="noRm" value="{{ $lrj->noRm }}" readonly="" type="text" placeholder="Nomor Rekam Medis" onkeyup="
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
                                                    <input class="form-control" type="text" readonly="" value="{{ $lrj->nama }}"  id="nama" name="nama" placeholder="Nama Pasien">
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
                                                    <input class="form-control" readonly="" id="provinsi" type="text" value="{{ $lrj->provinsi }}" name="provinsi" placeholder="Provinsi" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kabupaten/Kota :</label>
                                                    <input class="form-control" readonly="" id="kabupaten" type="text" value="{{ $lrj->kabupaten }}" name="kabupaten" placeholder="Kabupaten/Kota" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kecamatan :</label>
                                                    <input class="form-control" readonly="" id="kecamatan" type="text" value="{{ $lrj->kecamatan }}" name="kecamatan" placeholder="Kecamatan" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kelurahan/Desa :</label>
                                                    <input class="form-control" readonly="" id="kelurahan" type="text" value="{{ $lrj->kelurahan }}" name="kelurahan" placeholder="Kelurahan/Desa" style="width:350px">
                                                </div>

                                                <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                    <label for="dukuh">Dukuh</label>
                                                    <input class="form-control" readonly="" id="dukuh" type="text" value="{{ $lrj->dukuh }}" name="dukuh" placeholder="Dukuh">
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
                                                                <input placeholder="RT" readonly="" type='text' value="{{ $lrj->rt }}" name="rt" class="form-control" id="rt" >
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
                                                                <input placeholder="rw" readonly="" type='text' value="{{ $lrj->rw }}" name="rw" class="form-control" id="rw" >
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
                                                                <input placeholder="Tanggal Lahir" readonly="" type='text' value="{{ $lrj->tglLahir }}" name="tglLahir" class="form-control"  >
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
                                                                <input placeholder="tahun" readonly="" type='text' value="{{ $lrj->tahun }}" name="tahun" class="form-control" id='tahun' />
                                                                
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
                                                                <input placeholder="bulan" readonly="" type='text' value="{{ $lrj->bulan }}" name="bulan" class="form-control" id='bulan' />
                                                                
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
                                                                <input placeholder="hari" readonly="" type='text' value="{{ $lrj->hari }}" name="hari" class="form-control" id='hari' />
                                                                
                                                            </div>
                                                            @if ($errors->has('hari'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('hari') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group {{ $errors->has('anamnesa') ? 'has-error' : ''}}">
                                                    <label for="anamnesa">Anamnesa</label>
                                                    <input class="form-control" name="anamnesa" required id="anamnesa" value="{{old('anamnesa')}}" type="text" placeholder="Anamnesa">
                                                    @if ($errors->has('anamnesa'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('anamnesa') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('riwayatAlergi') ? 'has-error' : ''}}">
                                                    <label for="riwayatAlergi">Riwayat Alergi</label>
                                                    <input class="form-control" required name="riwayatAlergi" id="riwayatAlergi" value="{{old('riwayatAlergi')}}" type="text" placeholder="Riwayat Alergi">
                                                    @if ($errors->has('riwayatAlergi'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('riwayatAlergi') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <label for="pemeriksaanFisik">Pemeriksaan Fisik</label>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('tensi') ? 'has-error' : ''}}">
                                                            <label for="tensi">Tensi</label>
                                                            <div class='input-group date'>
                                                                <input class="form-control" required name="tensi" id="tensi" value="{{old('tensi')}}" type="text" placeholder="Tensi">
                                                                <span class="input-group-addon">mmHg</span>
                                                            </div>
                                                            @if ($errors->has('tensi'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tensi') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('rr') ? 'has-error' : ''}}">
                                                            <label for="rr">RR</label>
                                                            <div class='input-group date'>
                                                                <input class="form-control" required name="rr" id="rr" value="{{old('rr')}}" type="text" placeholder="RR">
                                                                <span class="input-group-addon">x/menit</span>
                                                            </div>
                                                            @if ($errors->has('rr'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('rr') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('nadi') ? 'has-error' : ''}}">
                                                            <label for="nadi">Nadi</label>
                                                            <div class='input-group date'>
                                                                <input class="form-control" required name="nadi" id="nadi" value="{{old('nadi')}}" type="text" placeholder="Nadi">
                                                                <span class="input-group-addon">x/menit</span>
                                                            </div>
                                                            @if ($errors->has('nadi'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('nadi') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('bb') ? 'has-error' : ''}}">
                                                            <label for="bb">BB</label>
                                                            <div class='input-group date'>
                                                                <input class="form-control" required name="bb" id="bb" value="{{old('pemeriksaanFisik')}}" type="text" placeholder="BB">
                                                                <span class="input-group-addon">KG</span>
                                                            </div>
                                                            @if ($errors->has('bb'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('bb') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('tb') ? 'has-error' : ''}}">
                                                            <label for="tb">TB</label>
                                                            <div class='input-group date'>
                                                                <input class="form-control" required name="tb" id="tb" value="{{old('tb')}}" type="text" placeholder="TB">
                                                                <span class="input-group-addon">CM</span>
                                                            </div>
                                                            @if ($errors->has('tb'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tb') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group {{ $errors->has('suhu') ? 'has-error' : ''}}">
                                                            <label for="suhu">SUHU</label>
                                                            <div class='input-group date'>
                                                                <input class="form-control" required name="suhu" id="suhu" value="{{old('suhu')}}" type="text" placeholder="SUHU">
                                                                <span class="input-group-addon">&deg;C</span>
                                                            </div>
                                                            @if ($errors->has('suhu'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('suhu') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>    
                                                </div>
                                                <hr>

                                                <div class="row">
                                                   <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('diagnosa') ? 'has-error' : ''}}">
                                                       <label class="control-label " for="diagnosa">Diagnosa</label>
                                                       <div class="input-group date">
                                                        <div class="form-group">
                                                         <input type="text" id="input" required data-role="tagsinput" class="form-control" name="diagnosa" value="{{old('diagnosa')}}" placeholder="Diagnosa">
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('diagnosa') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('tindakan') ? 'has-error' : ''}}">
                                               <label class="control-label " for="tindakan">Tindakan</label>
                                               <div class="input-group date">
                                                <div class="form-group">
                                                 <input type="text" id="input" data-role="tagsinput" required class="form-control" value="{{old('tindakan')}}" name="tindakan" placeholder="Tindakan">

                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('tindakan') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="display:none;" class="col-md-6">
                                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                                       <label class="control-label " for="kodeDiagnosis">Kode Diagnosis</label>     
                                       <div class='input-group date'>
                                           <select name="kodeDiagnosis"  class="form-control select2">
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
    $(document).ready(function() {
        $('#noRm').on('keyup', function(e) {
            var cariID = $(this).val();
            if(cariID) {
                $.ajax({
                    url: '{{url('lrj/norm')}}/'+cariID,
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


@endsection

