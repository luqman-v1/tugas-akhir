@extends('layouts.index')
@section('title') Pendaftaran Rawat Inap @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
      Pendaftaran Pasien
      <small>Pendaftaran Rawat Inap</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/rawat-inap')}}">Pendaftaran</a></li>
    <li class="active">Baru</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Pendaftaran Rawat Inap</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form" method="post" action="{{url('rawat-inap')}}">
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
                                                        <div class="form-group{{ $errors->has('tanggal_masuk') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="tanggal_masuk">Tanggal Masuk</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                            @if ($errors->has('tanggal_masuk'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tanggal_masuk') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                     <div class="bootstrap-timepicker">
                                                        <div class="form-group{{ $errors->has('jam_masuk') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="jam_masuk">Jam Masuk</label><br>
                                                            <div class="input-group">
                                                                <input type="text" name="jam_masuk" value="{{old('jam_masuk')}}" class="form-control timepicker">

                                                                <div class="input-group-addon">
                                                                  <i class="fa fa-clock-o"></i>
                                                              </div>
                                                          </div>
                                                          @if ($errors->has('jam_masuk'))
                                                          <span class="help-block">
                                                            <strong>{{ $errors->first('jam_masuk') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('caraDatang') ? 'has-error' : ''}}">
                                         <label class="control-label " for="caraDatang">Cara Datang</label>
                                         <div class="form-group">
                                           <select name="caraDatang" id="caraDatang" class="form-control" onChange="changetextbox();">
                                               <option>pilih</option>
                                               <option value="Sendiri">Sendiri</option>
                                               <option value="Rujukan">Rujukan</option>
                                           </select>
                                           <span class="help-block">
                                            <strong>{{ $errors->first('caraDatang') }}</strong>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="rujukan">Rujukan</label>
                                    <input class="form-control" name="rujukan" disabled="" value="{{old('rujukan')}}" id="rujukan" type="text" placeholder="Rujukan">
                                </div>

                                <div class="form-group {{ $errors->has('caraBayar') ? 'has-error' : ''}}">
                                 <label class="control-label " for="caraBayar">Cara Bayar</label>
                                 <div class="form-group">
                                   <select name="caraBayar" id="caraBayar" class="form-control" onChange="changetextbox();">
                                       <option>pilih</option>
                                       <option value="BPJS">BPJS</option>
                                       <option value="UMUM">UMUM</option>
                                   </select>
                                   <span class="help-block">
                                    <strong>{{ $errors->first('caraBayar') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                            <div class="form-group {{ $errors->has('caraMasuk') ? 'has-error' : ''}}">
                               <label class="control-label " for="caraMasuk">Cara Masuk RS</label>
                               <div class="input-group date">
                                <div class="form-group">
                                    <select name="caraMasuk" class="form-control">
                                        <option>pilih</option>
                                        <option value="IGD">IGD</option>
                                        <option value="Rawat Jalan">Rawat Jalan</option>
                                    </select>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('caraMasuk') }}</strong>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('bangsal') ? 'has-error' : ''}}">
                           <label class="control-label " for="tanggal_kembali">Bangsal</label>
                           <div class="input-group date">
                            <div class="form-group">
                                <select name="bangsal" class="form-control">
                                   <option value="">--- Pilih Bangsal ---</option>
                                   @foreach($bangsal as $key => $value)
                                   <option value="{{$key}}">{{$value}}</option>
                                   @endforeach 
                               </select>

                               <span class="help-block">
                                <strong>{{ $errors->first('bangsal') }}</strong>
                            </span>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group {{ $errors->has('kelas') ? 'has-error' : ''}}">
                   <label class="control-label " for="tanggal_kembali">Kelas</label>
                   <div class="input-group date">
                    <div class="form-group">
                        <select name="kelas" class="form-control">
                            <option>pilih</option>
                        </select>

                        <span class="help-block">
                            <strong>{{ $errors->first('kelas') }}</strong>
                        </span>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{ $errors->has('kamar') ? 'has-error' : ''}}">
               <label class="control-label " for="tanggal_kembali">Nomor Kamar</label>
               <div class="input-group date">
                <div class="form-group">
                    <select name="kamar" class="form-control">
                        <option>pilih</option>
                    </select>

                    <span class="help-block">
                        <strong>{{ $errors->first('kamar') }}</strong>
                    </span>

                </div>
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
                    url: '{{url('/')}}/pasien/norm/'+cariID,
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
        $('select[name="bangsal"]').on('change', function() {
            var bangsalID = $(this).val();
            if(bangsalID) {
                $.ajax({
                    url: '{{url('/')}}/rawat-inap/kelas/'+bangsalID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                        

                        $('select[name="kelas"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kelas"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kelas"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kelas"]').on('change', function() {
            var kamarID = $(this).val();
            if(kamarID) {
                $.ajax({
                    url: '{{url('/')}}/rawat-inap/kamar/'+kamarID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                        

                        $('select[name="kamar"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kamar"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kamar"]').empty();
            }
        });
    });
</script>
<script type="text/javascript">
    function changetextbox()
    {
        if (document.getElementById("caraDatang").value == "Sendiri") {
            document.getElementById("rujukan").disabled='true';
        } else {
            document.getElementById("rujukan").disabled='';
        }
    }
</script>
@endsection