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
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Pilih Tanggal</div>
				<div class="panel-body">
                 <div class="col-md-12">
                   <form action="{{url('laporan/register')}}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group{{ $errors->has('dariTanggal') ? ' has-error' : '' }}">
					<label class="control-label " for="dariTanggal">Dari Tanggal</label><br>
						<div class='input-group date'>
							<input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="dariTanggal" class="form-control" id="dariTanggal">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>

						@if ($errors->has('dariTanggal'))
						<span class="help-block">
							<strong>{{ $errors->first('dariTanggal') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group{{ $errors->has('sampaiTanggal') ? ' has-error' : '' }}">
					<label class="control-label " for="sampaiTanggal">Sampai Tanggal</label><br>
						<div class='input-group date'>
							<input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="sampaiTanggal" class="form-control" id="sampaiTanggal">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
						@if ($errors->has('sampaiTanggal'))
						<span class="help-block">
							<strong>{{ $errors->first('sampaiTanggal') }}</strong>
						</span>
						@endif
					</div>
						 <div class="col-md-12">
        					<button type="submit" class="btn btn-primary btn-block btn-lg">Lihat</button>
    				</div>
					</form>
				</div>
				</div>
				<div class="panel-footer">
				</div>
			</div>
		</div>
	</div>
</div>

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
     $('#dariTanggal').datepicker({
     	autoclose: true,
     	format: 'yyyy-mm-dd'
     });
   //Date picker
   $('#sampaiTanggal').datepicker({
   	autoclose: true,
   	format: 'yyyy-mm-dd'
   });

     
 });
</script>

@endsection