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
      <small>Cari Pasien</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Pendaftaran</a></li>
    <li class="active">Baru</li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Daftar Pasien</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>No Rekam Medis</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
             <?php $i = 1; ?>
             @foreach($pasien as $data)
             <tr>
                <td>{{ $i }}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->tglLahir}}</td>
                <td>Jl. {{$data->dukuh}} RT{{$data->rt}}/{{$data->rw}},Kelurahan {{$data->kelurahan}}, Kecamatan {{$data->kecamatan}}, {{$data->kabupaten}}, {{$data->provinsi}}</td>
                <td>
               <button type="button" class="btn-xs btn-info"  data-toggle="modal" value="{{$data->noRm}}" id="noRm{{ $i }}" name="noRm" data-target="#myModal">Lihat Detail </button> 
                <a href="{{url('/rawat-jalan/input/'.$data->id)}}"><button type="button" class="btn-xs btn-success">Rawat Jalan</button></a>
                <a href="{{url('/rawat-inap/input/'.$data->id)}}"><button type="button" class="btn-xs btn-primary">Rawat Inap</button></a>
                <a href="{{url('/igd/input/'.$data->id)}}"><button type="button" class="btn-xs btn-warning">IGD</button></a>
                                                                       
                                                                   
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Pasien</h4>
      </div>
      <div class="modal-body">
        <label for="namaOrtu">No Rekam Medis</label>
        <input class="form-control" type="text"  readonly="" id="noRm">
        <label for="namaOrtu">Nama</label>
        <input class="form-control" type="text"  readonly="" id="nama">
         <label for="namaOrtu">Provinsi</label>
        <input class="form-control" type="text"  readonly="" id="provinsi">  
         <label for="namaOrtu">Kabupaten</label>
        <input class="form-control" type="text"  readonly="" id="kabupaten">  
        <label for="namaOrtu">Kecamatan</label>
        <input class="form-control" type="text"  readonly="" id="kecamatan">          
        <label for="namaOrtu">Kelurahan</label>
        <input class="form-control" type="text"  readonly="" id="kelurahan">
        <label for="namaOrtu">Dukuh</label>
        <input class="form-control" type="text"  readonly="" id="dukuh">  
        <label for="namaOrtu">RT</label>
        <input class="form-control" type="text"  readonly="" id="rt">    
        <label for="namaOrtu">RW</label>
        <input class="form-control" type="text"  readonly="" id="rw">  
        <label for="namaOrtu">Tanggal Lahir</label>
        <input class="form-control" type="text"  readonly="" id="tglLahir">  
        <label for="namaOrtu">Tempat Lahir</label>
        <input class="form-control" type="text"  readonly="" id="tmptLahir">
        <label for="namaOrtu">Jenis Kelamin</label>
        <input class="form-control" type="text"  readonly="" id="jenisKelamin">
        <label for="namaOrtu">Agama</label>
        <input class="form-control" type="text"  readonly="" id="agama">
         <label for="namaOrtu">Status Perkawinan</label>
        <input class="form-control" type="text"  readonly="" id="statusPerkawinan">  
         <label for="namaOrtu">Pendidikan Pasien</label>
        <input class="form-control" type="text"  readonly="" id="pendidikanPasien">  
        <label for="namaOrtu">Pekerjaan Pasien</label>
        <input class="form-control" type="text"  readonly="" id="pekerjaanPasien">          
        <label for="namaOrtu">Kewarganegaraan</label>
        <input class="form-control" type="text"  readonly="" id="kewarganegaraan">
        <label for="namaOrtu">Nama Orang Tua</label>
        <input class="form-control" type="text"  readonly="" id="namaOrtu">  
        <label for="namaOrtu">Nama Suami/Istri</label>
        <input class="form-control" type="text"  readonly="" id="namaSuami_istri">    
        <label for="namaOrtu">No Handphone</label>
        <input class="form-control" type="text"  readonly="" id="noHp">  
        <label for="namaOrtu">Tanggal Masuk</label>
        <input class="form-control" type="text"  readonly="" id="tglMasuk">  
        <label for="namaOrtu">Rujukan</label>
        <input class="form-control" type="text"  readonly="" id="rujukan">
        <label for="namaOrtu">No Pesert JKN</label>
        <input class="form-control" type="text"  readonly="" id="noPesertaJKN">  
        <label for="namaOrtu">No Asuransi Lain</label>
        <input class="form-control" type="text"  readonly="" id="noAsuransiLain">     
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>

</div>
</div>
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>

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
   $('#tanggal_kunjungan').datepicker({
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
<?php $i = 1; ?>
    @foreach($pasien as $data)

    $(document).ready(function() {
        $('#noRm{{ $i }}').on('click', function(e) {
            var cariID = $(this).val();
            if(cariID) {
                $.ajax({
                    url: 'rawat-jalan/norm/'+cariID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        var pasien = jQuery.parseJSON(JSON.stringify(data));
                        var noRm = document.getElementById("noRm").value =pasien['noRm'];
                        var nama = document.getElementById("nama").value =pasien['nama'];
                        var provinsi = document.getElementById("provinsi").value =pasien['provinsi'];
                        var kabupaten = document.getElementById("kabupaten").value =pasien['kabupaten'];
                        var kecamatan = document.getElementById("kecamatan").value =pasien['kecamatan'];
                        var kelurahan = document.getElementById("kelurahan").value =pasien['kelurahan'];
                        var dukuh = document.getElementById("dukuh").value =pasien['dukuh'];
                        var rt = document.getElementById("rt").value =pasien['rt'];
                        var rw = document.getElementById("rw").value =pasien['rw'];
                        var tglLahir = document.getElementById("tglLahir").value =pasien['tglLahir'];
                        var tmptLahir = document.getElementById("tmptLahir").value =pasien['tmptLahir'];
                        var jenisKelamin = document.getElementById("jenisKelamin").value =pasien['jenisKelamin'];
                        var agama = document.getElementById("agama").value =pasien['agama'];
                        var statusPerkawinan = document.getElementById("statusPerkawinan").value =pasien['statusPerkawinan'];
                        var pendidikanPasien = document.getElementById("pendidikanPasien").value =pasien['pendidikanPasien'];
                        var pekerjaanPasien = document.getElementById("pekerjaanPasien").value =pasien['pekerjaanPasien'];
                        var kewarganegaraan = document.getElementById("kewarganegaraan").value =pasien['kewarganegaraan'];
                        var namaOrtu = document.getElementById("namaOrtu").value =pasien['namaOrtu'];
                        var namaSuami_istri = document.getElementById("namaSuami_istri").value =pasien['namaSuami_istri'];
                        var noHp = document.getElementById("noHp").value =pasien['noHp'];
                        var tglMasuk = document.getElementById("tglMasuk").value =pasien['tglMasuk'];
                        var rujukan = document.getElementById("rujukan").value =pasien['rujukan'];
                        var noPesertaJKN = document.getElementById("noPesertaJKN").value =pasien['noPesertaJKN'];
                        var noAsuransiLain = document.getElementById("noAsuransiLain").value =pasien['noAsuransiLain'];



                    }
                });
            }
        });
    });
    <?php $i++; ?>
    @endforeach
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
  });
});
</script>
@endsection