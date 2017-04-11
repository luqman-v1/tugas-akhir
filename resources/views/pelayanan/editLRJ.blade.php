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
    <li class="active">Ubah</li>
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
                                            <form role="form" method="post" action="{{url('/lrj/form/edit/'.$edit->idp)}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis</label>
                                                        <input class="form-control" readonly="" id="noRm" name="noRm" value="{{$edit->noRm}}" type="text" placeholder="Nomor Rekam Medis" onkeyup="
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
                                                    <input class="form-control" type="text" readonly="" value="{{$edit->nama}}"  id="nama" name="nama" placeholder="Nama Pasien">
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

                                            </div>

                                            <div class="col-lg-6">
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
                                                                <input placeholder="hari" readonly="" type='text' value="{{$edit->hari}}" name="hari" class="form-control" id='hari' />
                                                                
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
                                                    <input class="form-control" name="anamnesa" id="anamnesa" readonly="" value="{{$edit->anamnesa}}" type="text" placeholder="Anamnesa">
                                                    @if ($errors->has('anamnesa'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('anamnesa') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group {{ $errors->has('pemeriksaanFisik') ? 'has-error' : ''}}">
                                                    <label for="pemeriksaanFisik">Pemeriksaan Fisik</label>
                                                    <input class="form-control" name="pemeriksaanFisik" readonly="" id="pemeriksaanFisik" value="{{$edit->pemeriksaanFisik}}" type="text" placeholder="pemeriksaanFisik">
                                                    @if ($errors->has('pemeriksaanFisik'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('pemeriksaanFisik') }}</strong>
                                                    </span>
                                                    @endif
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group {{ $errors->has('radiologi') ? 'has-error' : ''}}">
                                                         <label class="control-label " for="radiologi">Radiologi</label>
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" readonly="" name="radiologi" value="{{$edit->radiologi}}">
                                                           <span class="help-block">
                                                            <strong>{{ $errors->first('radiologi') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('laboratorium') ? 'has-error' : ''}}">
                                                 <label class="control-label " for="laboratorium">Laboratorium</label>
                                                 <div class="form-group">
                                                     <input type="text" class="form-control" value="{{$edit->laboratorium}}" readonly="" name="laboratorium">
                                                   <span class="help-block">
                                                    <strong>{{ $errors->first('laboratorium') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('diagnosa') ? 'has-error' : ''}}">
                                     <label class="control-label " for="diagnosa">Diagnosa</label>
                                     <div class="input-group date">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="diagnosa" readonly="" value="{{$edit->diagnosa}}" placeholder="Diagnosa">
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
                                   <input type="text" class="form-control" value="{{$edit->tindakan}}" readonly="" name="tindakan" placeholder="Tindakan">

                                   <span class="help-block">
                                    <strong>{{ $errors->first('tindakan') }}</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('kodeDiagnosis') ? 'has-error' : ''}}">
                     <label class="control-label " for="kodeDiagnosis"  style="color: red";>Kode Diagnosis</label>
                          <select name="kodeDiagnosis" class="form-control select2">
                                @foreach($icd as $data)
                              <option value="{{$data->kode}}">{{$data->kode}}</option>
                                @endforeach                           
                            </select>
                           <span class="help-block">
                            <strong>{{ $errors->first('kodeDiagnosis') }}</strong>
                    </div>
                </div>

        <div class="col-md-6">
            <div class="form-group {{ $errors->has('kodeTindakan') ? 'has-error' : ''}}">
             <label class="control-label " for="kodeTindakan"  style="color: red";>Kode Tindakan</label>
                <div class="form-group">
                    <select name="kodeTindakan" class="form-control select2">
                             @foreach($icd as $data)
                              <option value="{{$data->nama}}">{{$data->nama}}</option>
                                @endforeach      
                            </select>

                   <span class="help-block">
                    <strong>{{ $errors->first('kodeTindakan') }}</strong>
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
                    url: 'lrj/norm/'+cariID,
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

@endsection

