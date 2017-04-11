@extends('layouts.index')
@section('title') Pelaporan Register @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')
<section class="content-header">
	<h1>
		Pelaporan
		<small>Register</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{url('/')}}/pegawai/sppd">Pelaporan</a></li>
		<li class="active">Pilih Tanggal</li>
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
                  <th>Tanggal Kunjungan</th>
                  <th>Cara Datang</th>
                  <th>Rujukan</th>
                  
              </tr>
          </thead>
          <tbody>
             <?php $i = 1; ?>
             @foreach($rj as $data)
             <tr>
                <td>{{ $i }}</td>
                <td>{{$data->tglKunjungan}}</td>
                <td>{{$data->caraDatang}}</td>
                <td>{{$data->rujukan}}</td>
                
            
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
<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>



@endsection