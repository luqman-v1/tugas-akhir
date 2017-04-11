@extends('layouts.index')
@section('title') Pendaftaran Rawat Inap @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
      Pelayanan Pasien
      <small>Daftar Lembar Rawat Jalan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/')}}/pegawai/sppd">Pelayanan</a></li>
    <li class="active">daftar</li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
       <a href="{{url('lrj/form')}}"> <button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Tambah Pasien Rawat Jalan</button></a>
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
                  <th>Kode Diagnosis</th>
                  <th>Kode Tindakan</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
             <?php $i = 1; ?>
             @foreach($lrj as $data)
             <tr>
                <td>{{ $i }}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->tglLahir}}</td>
                
                @if( $data->kodeDiagnosis == null)
                <td><span class="label label-warning">Harap Masukan Kode Diagnosis</span></td>
                @else
                <td>{{$data->kodeDiagnosis}}</td>
                @endif
                @if($data->kodeTindakan == null)
                <td><span class="label label-warning">Harap Masukan Kode Tindakan</span></td>
                @else
                <td>{{$data->kodeTindakan}}</td>
                @endif
                <td>
                <a href="{{url('lrj/form/edit/'.$data->idp)}}"><button type="button" class="btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Tambahkan Kode Diagnosa</button></a>
                                                                       
                                                                   
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
    <div class="modal-dialog">

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

<script>
  $(function () {
    $("#example1").DataTable();

});
</script>
@endsection