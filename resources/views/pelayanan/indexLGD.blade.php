@extends('layouts.index')
@section('title') Pendaftaran Rawat IGD @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<link rel="stylesheet" href="{{url('/plugins/select2/select2.min.css')}}">

@endsection
@section('content')

<section class="content-header">
  <h1>
      Pelayanan Pasien
      <small>Daftar Lembar Rawat IGD</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/')}}">Pelayanan</a></li>
    <li class="active">daftar</li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
       <a href="{{url('pelayanan-igd/form')}}"> <button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Tambah Pasien IGD</button></a>
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
                  <th>Kode ICD</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
             <?php $i = 1; ?>
             @foreach($igd as $data)
             <tr>
                <td>{{ $i }}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->tglLahir}}</td>
                 @if($data->kode == null)
                <td><span class="label label-warning">Harap Masukan Kode ICD</span></td>
                @else
                <td>{{$data->kode}}</td>
                @endif
                <td>
                <a href="{{url('pelayanan-igd/form/edit/'.$data->idp)}}"><button type="button" class="btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span> Tambahkan Kode ICD</button></a>
                                                                       
                                                                   
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