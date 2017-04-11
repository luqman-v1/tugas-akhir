@extends('layouts.index')
@section('title') Lembar Gawat Darurat @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">

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
                                            <form role="form" method="post" action="{{url('pelayanan-igd')}}">
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
                                                
                                            </div>
                                            <div class="col-lg-6">  
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
                                                <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group {{ $errors->has('jenisKasus') ? 'has-error' : ''}}">
                                                           <label class="control-label " for="jenisKasus">Jenis Kasus</label>
                                                           <div class="form-group">
                                                               <select name="jenisKasus" id="jenisKasus" class="form-control">
                                                                 <option value="Bedah">Bedah</option>
                                                                 <option value="Obsgin">Obsgin</option>
                                                                 <option value="Interna">Interna</option>
                                                             </select>
                                                             <span class="help-block">
                                                                <strong>{{ $errors->first('jenisKasus') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('tindakanResuitasi') ? 'has-error' : ''}}">
                                                       <label class="control-label " for="tindakanResuitasi">Tindakan Resusitasi</label>
                                                       <div class="form-group">
                                                           <select name="tindakanResuitasi" id="tindakanResuitasi" class="form-control">
                                                             <option value="Ya">Ya</option>
                                                             <option value="Tidak">Tidak</option>
                                                         </select>
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('tindakanResuitasi') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">  
                                                <div class="form-group {{ $errors->has('cramsScore') ? 'has-error' : ''}}">
                                                   <label class="control-label " for="cramsScore">Crams Score/ CGS</label>
                                                   <div class="form-group">
                                                       <input placeholder="Crams Score/ CGS" type='text' value="{{old('cramsScore')}}" name="cramsScore" class="form-control" id="cramsScore">
                                                     <span class="help-block">
                                                        <strong>{{ $errors->first('cramsScore') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('anamnesis') ? 'has-error' : ''}}">
                                               <label class="control-label " for="anamnesis">Anamnesis</label>
                                               <div class="form-group">
                                                  <input placeholder="Anamnesis" type='text' value="{{old('anamnesis')}}" name="anamnesis" class="form-control" id="anamnesis">
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('anamnesis') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('pemeriksaanFisik') ? ' has-error' : '' }}">
                                            <label class="control-label " for="pemeriksaanFisik">Pemeriksaan Fisik</label><br>
                                               <input placeholder="Pemeriksaan Fisik" type='text' value="{{old('pemeriksaanFisik')}}" name="pemeriksaanFisik" class="form-control" id="pemeriksaanFisik">
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
                                            <label class="control-label " for="jam_masuk">Pemeriksaan Status Nyeri</label><br>
                                             <input placeholder="Pemeriksaan Status Nyeri" type='text' value="{{old('pemeriksaanStatus')}}" name="pemeriksaanStatus" class="form-control" id="pemeriksaanStatus">
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
                                                 <div class="form-group">
                                                       <input type="text" class="form-control" name="pemeriksaanLaboratorium" value="{{old('pemeriksaanLaboratorium')}}" placeholder="Pemeriksaan Laboratorium">
                                                       <span class="help-block">
                                                        <strong>{{ $errors->first('pemeriksaanLaboratorium') }}</strong>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('pemeriksaanRadiologi') ? 'has-error' : ''}}">
                                         <label class="control-label " for="pemeriksaanRadiologi">Pemeriksaan Radiologi</label>
                                            <div class="form-group">
                                               <input type="text" class="form-control" value="{{old('pemeriksaanRadiologi')}}" name="pemeriksaanRadiologi" placeholder="Pemeriksaan Radiologi">

                                               <span class="help-block">
                                                <strong>{{ $errors->first('pemeriksaanRadiologi') }}</strong>
                                            </span>
                                         </div>
                                    </div>
                                </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diagonosisAwal') ? 'has-error' : ''}}">
                                 <label class="control-label " for="diagonosisAwal">Diagnosis Awal</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="diagonosisAwal" value="{{old('diagonosisAwal')}}" placeholder="Diagnosis Awal">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('diagonosisAwal') }}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('terapiTindakan') ? 'has-error' : ''}}">
                         <label class="control-label " for="terapiTindakan">Terapi/Tindakan di IGD</label>
                            <div class="form-group">
                               <input type="text" class="form-control" value="{{old('terapiTindakan')}}" name="terapiTindakan" placeholder="Terapi/Tindakan di IGD">
                               <span class="help-block">
                                <strong>{{ $errors->first('terapiTindakan') }}</strong>
                            </span>
                            </div>
                         </div>
                    </div>
                    <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diagnosisAkhir') ? 'has-error' : ''}}">
                                 <label class="control-label " for="diagnosisAkhir">Diagnosis Akhir</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="diagnosisAkhir" value="{{old('diagnosisAkhir')}}" placeholder="Diagnosis Akhir">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('diagnosisAkhir') }}</strong>
                                    </span>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tindakanLanjut') ? 'has-error' : ''}}">
                         <label class="control-label" for="tindakanLanjut">Tindak Lanjut</label>
                            <div class="form-group">
                               <select name="tindakanLanjut" id="tindakanLanjut" class="form-control">
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
                    </div>

                    <div id="dirujuk" style="display:none;" class="col-md-6">
                                <div class="form-group {{ $errors->has('dirujuk') ? 'has-error' : ''}}">
                                 <label class="control-label " for="dirujuk">Dirujuk Ke</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="dirujuk" value="{{old('dirujuk')}}" placeholder="Dirujuk Ke">
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
                    url: 'pelayanan-igd/norm/'+cariID,
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
        $('#tindakanLanjut').on('change',function(){
            if(this.value == "Dirujuk"){
                $('#dirujuk').show();
                $('#tglMeninggal').hide();
                $('#jamMeninggal').hide();
            }else if (this.value == "Meninggal"){
                $('#tglMeninggal').show();
                $('#jamMeninggal').show();
                $('#dirujuk').hide();

            }else{
                $('#tglMeninggal').hide();
                $('#jamMeninggal').hide();
                $('#dirujuk').hide();
            }
        });
    });

 
</script>
@endsection