@extends('layouts.index')
@section('title') Pendaftaran Rawat Jalan @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
      Pendaftaran Pasien
      <small>Pendaftaran Rawat Jalan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/rawat-jalan')}}">Pendaftaran</a></li>
    <li class="active">Baru</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Pendaftaran Rawat Jalan</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="form_validation" method="post" action="{{url('rawat-jalan')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="noRm">Nomor Rekam Medis</label>
                                                        <input class="form-control" id="noRm" required name="noRm" value="{{old('noRm')}}" type="text" placeholder="Nomor Rekam Medis" onkeyup="
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
                                                    <input class="form-control" type="text" readonly="" required value="{{old('nama')}}"  id="nama" name="nama" placeholder="Nama Pasien">
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
                                                    <input class="form-control" readonly="" id="provinsi" type="text" required value="{{old('provinsi')}}" name="provinsi" placeholder="Provinsi" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kabupaten/Kota :</label>
                                                    <input class="form-control" readonly="" id="kabupaten" required type="text" value="{{old('kabupaten')}}" name="kabupaten" placeholder="Kabupaten/Kota" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kecamatan :</label>
                                                    <input class="form-control" readonly="" id="kecamatan" required type="text" value="{{old('kecamatan')}}" name="kecamatan" placeholder="Kecamatan" style="width:350px">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Kelurahan/Desa :</label>
                                                    <input class="form-control" readonly="" id="kelurahan" required type="text" value="{{old('kelurahan')}}" name="kelurahan" placeholder="Kelurahan/Desa" style="width:350px">
                                                </div>

                                                <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                    <label for="dukuh">Dukuh</label>
                                                    <input class="form-control" readonly="" id="dukuh" required type="text" value="{{old('dukuh')}}" name="dukuh" placeholder="Dukuh">
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
                                                                <input placeholder="RT" readonly="" required type='text' value="{{old('rt')}}" name="rt" class="form-control" id="rt" >
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
                                                                <input placeholder="rw" readonly="" required type='text' value="{{old('rw')}}" name="rw" class="form-control" id="rw" >
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
                                                                <input placeholder="Tanggal Lahir" required readonly="" type='text' value="{{old('tglLahir')}}" name="tglLahir" class="form-control" id="tglLahir" >
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
                                                                <input placeholder="tahun" required readonly="" type='text' value="{{old('tahun')}}" name="tahun" class="form-control" id='tahun' />
                                                                
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
                                                                <input placeholder="bulan" required readonly="" type='text' value="{{old('bulan')}}" name="bulan" class="form-control" id='bulan' />
                                                                
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
                                                                <input placeholder="hari" required readonly="" type='text' value="{{old('hari')}}" name="hari" class="form-control" id='hari' />
                                                                
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
                                                        <div class="form-group{{ $errors->has('tglKunjungan') ? ' has-error' : '' }}">
                                                            <label class="control-label " for="tglKunjungan">Tanggal Kunjungan</label><br>
                                                            <div class='input-group date'>
                                                                <input placeholder="Tanggal Kunjungan" type='text' value="@php echo date("Y-m-d"); @endphp" name="tglKunjungan" required class="form-control" id="tanggal_kunjungan">
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                            @if ($errors->has('tglKunjungan'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('tglKunjungan') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group {{ $errors->has('caraDatang') ? 'has-error' : ''}}">
                                                   <label class="control-label " for="caraDatang">Cara Datang</label>
                                                     <select name="caraDatang" id="caraDatang" required class="form-control" onChange="changetextbox();">
                                                     <option value="">pilih</option>
                                                         <option value="Sendiri">Sendiri</option>
                                                         <option value="Rujukan">Rujukan</option>
                                                     </select>
                                                     <span class="help-block">
                                                        <strong>{{ $errors->first('caraDatang') }}</strong>
                                                    </span>
                                            </div>

                                            <div class="form-group">
                                                <label for="rujukan">Rujukan</label>
                                                <input class="form-control" name="rujukan" disabled="" value="{{old('rujukan')}}" id="rujukan" type="text" placeholder="Rujukan">
                                            </div>
                                            <div class="form-group {{ $errors->has('caraBayar') ? 'has-error' : ''}}">
                                               <label class="control-label " for="caraBayar">Cara Bayar</label>
                                             
                                                 <select name="caraBayar" id="caraBayar" required class="form-control" onChange="changetextbox();">
                                                 <option value="">pilih</option>
                                                     <option value="BPJS">BPJS</option>
                                                     <option value="UMUM">UMUM</option>
                                                 </select>
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('caraBayar') }}</strong>
                                                </span>
                                        </div>    

                                        <div class="row">
                                           <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('klinikTujuan') ? 'has-error' : ''}}">
                                               <label class="control-label " for="tanggal_kembali">Klinik Tujuan</label>
                                               <div class="input-group date">
                                                    <select name="klinikTujuan" required class="form-control">
                                                    <option value="">pilih</option>
                                                        <option value="Digestive">Bedah Saluran Cerna (Digestive)</option>
                                                        <option value="Throraks">Bedah Throraks</option>
                                                        <option value="Orthopedi">Bedah Tulang dan Sendi (Orthopedi)</option>
                                                        <option value="Urologi">Bedah Saluran Kencing (Urologi)</option>
                                                        <option value="Bedah Plastik dan Estetik">Bedah Plastik dan Estetik</option>
                                                    </select>
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('klinikTujuan') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('DokterPJ') ? 'has-error' : ''}}">
                                           <label class="control-label " for="tanggal_kembali">Dokter Penanggung Jawab</label>
                                           <div class="input-group date">
                                                <select name="DokterPJ" required class="form-control">
                                                <option value="">pilih</option>
                                                </select>

                                                <span class="help-block">
                                                    <strong>{{ $errors->first('DokterPJ') }}</strong>
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
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script>
  $(function () {

    //Date picker
    $('#tglLahir').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });
   //Date picker
   $('#tanggal_kunjungan').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
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
function changetextbox()
{
    if (document.getElementById("caraDatang").value == "Sendiri") {
        document.getElementById("rujukan").disabled='true';
    } else {
        document.getElementById("rujukan").disabled='';
    }
}
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="klinikTujuan"]').on('change', function() {
            var klinikTujuan = $(this).val();
            if(klinikTujuan) {
                $.ajax({
                    url: '{{ url('/') }}/rawatJalan/spesialis/'+klinikTujuan,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="DokterPJ"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="DokterPJ"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="DokterPJ"]').empty();
            }
        });
    });
</script>

@endsection