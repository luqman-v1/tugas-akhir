@extends('layouts.index')
@section('title') Jadwal Pelayanan @endsection
@section('content')
<section class="content-header">
  <h1>
      Jadwal 
      <small>Pelayanan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Profile Pelayanan</a></li>
    <li class="active">Lihat</li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Jadwal Pelayanan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>Nama Dokter</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                  <th>Sabtu</th>
              </tr>
          </thead>
          <tbody>
           <tr>
           	<td>s</td>
           	<td>s</td>
           	<td>s</td>
           	<td>s</td>
           	<td>s</td>
           	<td>s</td>
           	<td>s</td>
           </tr>
        </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>

</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
@endsection