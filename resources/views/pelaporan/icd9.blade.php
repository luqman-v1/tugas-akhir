@extends('layouts.index')
@section('title') Daftar Kode ICD 9 @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')

<section class="content-header">
	<h1>
		Kode 
		<small> ICD 9</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{url('/')}}/pegawai/sppd">Pelaporan</a></li>
		<li class="active">list</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">

			<div class="box">
				<div class="box-header">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm1"><span class="glyphicon glyphicon-plus"></span> Tambah Kode</button>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>KODE ICD</th>
								<th>Tindakan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($icd as $data)
							<tr class="item{{$data->id}}">
								<td>{{ $i }}</td>
								<td>{{$data->kode}}</td>
								<td>{{$data->nama}}</td>
								<td>
									<button type="button" data-id="{{$data->id}}" data-nama="{{$data->nama}}" data-kode="{{$data->kode}}" class="edit-modal btn btn-success"  data-toggle="modal" data-target=".bs-example-modal-sm2">Ubah <span class="glyphicon glyphicon-edit"></span></button>

									<button type="button" value="{{$data->id}}" id="delete" data-id="{{$data->id}}" data-nama="{{$data->nama}}" data-kode="{{$data->kode}}" class="delete-modal btn btn-danger">Hapus <span class="glyphicon glyphicon-trash"></span></button>
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
			<div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Tambah Kode</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								{{ csrf_field() }}
							 <label class="control-label " for="penyebab">Kode Tindakan</label>
								<input type="text" name="kode" id="kode" class="form-control" placeholder="Kode">
							</div>
							<div class="form-group">
							 <label class="control-label " for="penyebab">Nama Tindakan</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
							</div>
							<div class="form-group" align="right">
								<button type="button" id="add" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-plus"></span> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Ubah Data</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								{{ csrf_field() }}
								<input type="hidden" name="id" id="id-edit">
							<div class="form-group">
							 <label class="control-label " for="penyebab">Kode Tindakan</label>
								<input type="text" name="kode-edit" id="kode-edit" class="form-control" placeholder="Kode">
							</div>
							<div class="form-group">
							 <label class="control-label " for="penyebab">Nama Tindakan</label>
								<input type="text" name="nama-edit" id="nama-edit" class="form-control" placeholder="Nama">
							</div>
							
							<div class="form-group" align="right">
								<button type="button" id="edit" class="btn btn-success" data-dismiss="modal">Ubah <span class="glyphicon glyphicon-edit"></span></button>
							</div>
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
//ajax delete data
$(document).on('click', '.delete-modal', function(id) {
	var id =  $(this).val();
		console.log(id);
		swal({
			title: "Anda Yakin?",
			text: "Data Akan Dihapus!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Ya, Hapus Data!",
			closeOnConfirm: false
		},
		function(isConfirm){
			if(isConfirm){
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type: 'DELETE',
					url: '{{url('/')}}'+'/pelaporan/kodeicd9/'+id,
					dataType: "json",
					success: function(data){
  		  	// console.log(data);
  		  	$('.item' + data.id).remove();
  		  	swal("Berhasil!", "Data Berhasil Dihapus", "success");

  		  }
  		})	
			}

		});
	});

//ajax tambah data

$("#add").click(function() {
	$.ajax({
		type: 'post',
		url: '{{url('pelaporan/kodeicd9/simpan')}}',
		data: {
			'_token': $('input[name=_token]').val(),
			'nama': $('input[name=nama]').val(),
			'kode': $('input[name=kode]').val()
		},
		success: function(data) {
			console.log(data);

			if ((data.errors)){
				$('.error').removeClass('hidden');
				$('.error').text(data.errors.name);
			}
			else {
				$('.error').remove();
				$('#example1').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nama + "</td><td>" + data.kode + "</td><td><button class='edit-modal btn btn-success' data-id='" + data.id + "' data-nama='" + data.nama + "' data-kode='" + data.kode + "'>Ubah <span class='glyphicon glyphicon-edit'></span></button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.nama + "'>Hapus <span class='glyphicon glyphicon-trash'></span></button></td></tr>");

				swal("Berhasil!", "Data Kode Diagnosis telah di tambahkan", "success")
			}
		},
	});
	$('#nama').val('');
	$('#kode').val('');
});
//ajax edit
	
	$(document).on('click', '.edit-modal', function() {
		$('#id-edit').val($(this).data('id'));
		$('#nama-edit').val($(this).data('nama'));
		$('#kode-edit').val($(this).data('kode'));
		$('.bs-example-modal-sm2').modal('show');
	});

  $("#edit").click(function() {
	$.ajax({
		type: 'post',
		url: '{{url('pelaporan/kodeicd9/ubah')}}',
		data: {
			'_token': $('input[name=_token]').val(),
			'id' : $('input[name=id]').val(),
			'nama': $('input[name=nama-edit]').val(),
			'kode': $('input[name=kode-edit]').val()
		},
		success: function(data) {
			console.log(data);
			$('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.nama + "</td><td>" + data.kode + "</td><td><button class='edit-modal btn btn-success' data-id='" + data.id + "' data-nama='" + data.nama + "' data-kode='" + data.kode + "'>Ubah <span class='glyphicon glyphicon-edit'></span></button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.nama + "'>Hapus <span class='glyphicon glyphicon-trash'></span></button></td></tr>");
			console.log(data.id);
			swal("Berhasil!", "Data Kode Diagnosis telah di Ubah", "success")
		},
	});
});



</script>

<script>
	$(function () {
		$("#example1").DataTable();
		
	});
</script>
@endsection