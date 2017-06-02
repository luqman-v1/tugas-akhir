@extends('layouts.index')
@section('title')  Unit Gawat Darurat @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
    Pendaftaran Pasien
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/rawat-jalan')}}">pendfartaran</a></li>
    <li class="active">lihat</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <a href="{{url('/igd/form')}}"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Pasien Rawat IGD</button></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>No Rekam Medis</th>
                <th>Nama</th>
                <th>Nama Dokter</th>
                <th>No Telp</th>
                <th>Tanggal Kunjungan</th>
                <th>Cara Bayar</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php $i = 1; ?>
             @foreach($igd as $data)
             <tr class="item{{$data->id}}">
              <td>{{ $i }}</td>
              <td>{{$data->noRm}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->dokterJaga}}</td>
              <td>{{$data->noHp}}</td>
              <td>{{$data->tanggal_masuk}}</td>
              <td>{{$data->caraBayar}}</td>
              <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
              <td> 
               <button data-toggle="modal" data-target=".bs-example-modal-sm1" data-id="{{$data->id}}" id="ubah" value="{{$data->id}}" class="btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
               <button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="delete-modal btn-xsm btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Rawat IGD</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{ url('igd/detail') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id">
                <div class="col-lg-6">


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
                          <input type="text" name="jam_masuk" id="jam_masuk" value="{{old('jam_masuk')}}" class="form-control timepicker">
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

                <div class="form-group {{ $errors->has('alasan') ? 'has-error' : ''}}">
                  <label for="alasan">Alasan Datang</label>
                  <input class="form-control" name="alasan" id="alasan" value="{{old('alasan')}}" type="text" placeholder="Alasan Datang">
                  @if ($errors->has('alasan'))
                  <span class="help-block">
                    <strong>{{ $errors->first('alasan') }}</strong>
                  </span>
                  @endif
                </div>   

                <div class="row">
                 <div class="col-md-6">
                  <div class="form-group {{ $errors->has('pengantar') ? 'has-error' : ''}}">
                   <label class="control-label " for="pengantar">Nama Pengantar</label>
                   <div class="input-group date">
                    <div class="form-group">
                     <input type="text" class="form-control" id="pengantar" name="pengantar" value="{{old('pengantar')}}" placeholder="Nama Pengantar">
                     <span class="help-block">
                      <strong>{{ $errors->first('pengantar') }}</strong>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group {{ $errors->has('alamatPengantar') ? 'has-error' : ''}}">
               <label class="control-label " for="alamatPengantar">Alamat Pengantar</label>
               <div class="input-group date">
                <div class="form-group">
                 <input type="text" class="form-control"  id="alamatPengantar" value="{{old('alamatPengantar')}}" name="alamatPengantar" placeholder="Alamat Pengantar">

                 <span class="help-block">
                  <strong>{{ $errors->first('alamatPengantar') }}</strong>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group {{ $errors->has('caraDatang') ? 'has-error' : ''}}">
       <label class="control-label " for="caraDatang">Cara Datang</label>
       <div class="form-group">
         <select name="caraDatang" id="caraDatang" class="form-control" onChange="changetextbox();">
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
      <input class="form-control" name="rujukan" value="{{old('rujukan')}}" id="rujukan" type="text" placeholder="Rujukan">
    </div>

  </div>

  <div class="col-lg-6">



    <div class="form-group {{ $errors->has('caraBayar') ? 'has-error' : ''}}">
     <label class="control-label " for="caraBayar">Cara Bayar</label>
     <div class="form-group">
       <select name="caraBayar" id="caraBayar" class="form-control" onChange="changetextbox();">
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
      <div class="form-group {{ $errors->has('kendaraan') ? 'has-error' : ''}}">
       <label class="control-label " for="kendaraan">Kendaraan Saat Datang</label>
       <div class="input-group date">
        <div class="form-group">
          <select name="kendaraan" id="kendaraan" class="form-control">
            <option value="Motor">Motor</option>
            <option value="Mobil">Mobil</option>
          </select>
          <span class="help-block">
            <strong>{{ $errors->first('kendaraan') }}</strong>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
 <div class="col-md-6">
  <div class="form-group {{ $errors->has('penyebab') ? 'has-error' : ''}}">
   <label class="control-label " for="penyebab">Penyebab Cedera/ Kejadian</label>
   <div class="input-group date">
    <div class="form-group">
     <input type="text" class="form-control" id="penyebab" value="{{old('penyebab')}}" name="penyebab" placeholder="Penyebab Cedera/ Kejadian">
     <span class="help-block">
      <strong>{{ $errors->first('penyebab') }}</strong>
    </span>
  </div>
</div>
</div>
</div>
<div class="col-md-6">
  <div class="form-group {{ $errors->has('tempatKejadian') ? 'has-error' : ''}}">
   <label class="control-label" for="tempatKejadian">Tempat Kejadian</label>
   <div class="input-group date">
    <div class="form-group">
     <input type="text" class="form-control" id="tempatKejadian" name="tempatKejadian" value="{{old('tempatKejadian')}}" placeholder="Tempat Kejadian">
     <span class="help-block">
      <strong>{{ $errors->first('tempatKejadian') }}</strong>
    </span>
  </div>
</div>
</div>
</div>

<div class="col-md-6">
  <div class="form-group {{ $errors->has('dokterJaga') ? 'has-error' : ''}}">
   <label class="control-label " for="dokterJaga">Dokter Jaga IGD</label>
   <div class="input-group date">
    <div class="form-group">
      <select name="dokterJaga" id="dokterJaga" class="form-control">
        <option value="">pilih</option>
        @foreach($dokter as $data)
        <option value="{{ $data->name }}">{{ $data->name }}</option>
        @endforeach
      </select>

      <span class="help-block">
        <strong>{{ $errors->first('dokterJaga') }}</strong>
      </span>
    </div>
  </div>
</div>
</div>

<div class="col-md-6">
  <div class="form-group {{ $errors->has('perawat') ? 'has-error' : ''}}">
   <label class="control-label " for="perawat">Perawat IGD</label>
   <div class="input-group date">
    <div class="form-group">
      <select name="perawat" id="perawat" class="form-control">
        <option value="">pilih</option>
        @foreach($perawat as $data)
        <option value="{{ $data->name }}">{{ $data->name }}</option>
        @endforeach
      </select>
      <span class="help-block">
        <strong>{{ $errors->first('perawat') }}</strong>
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
        url: '{{url('/')}}'+'/igd/delete/'+id,
        dataType: "json",
        success: function(data){
          // console.log(data);
          $('.item' + data.id_pasien).remove();
          swal("Berhasil!", "Data Berhasil Dihapus", "success");

        }
      })  
    }

  });
});


$(document).on('click', '.edit-modal', function() {
  $('#id-edit').val($(this).data('id'));
  $('#nama-edit').val($(this).data('nama'));
  $('#kode-edit').val($(this).data('kode'));
  $('.bs-example-modal-sm2').modal('show');
});

</script>
<script>
  $(document).on('click','#ubah', function(id){
    var id = $(this).val();
    console.log(id)
    $.ajax({
      url: '{{ url('/') }}/igd/detail/'+id,
      type: "GET",
      dataType: "json",
      success: function(data){
        $('#alamatPengantar').val(data.alamatPengantar);
        $('#alasan').val(data.alasan);
        $('#caraBayar').val(data.caraBayar);
        $('#caraDatang').val(data.caraDatang);
        $('#dokterJaga').val(data.dokterJaga);
        $('#jam_masuk').val(data.jam_masuk);
        $('#kendaraan').val(data.kendaraan);
        $('#pengantar').val(data.pengantar);
        $('#penyebab').val(data.penyebab);
        $('#perawat').val(data.perawat);
        $('#rujukan').val(data.rujukan);
        $('#tanggal_masuk').val(data.tanggal_masuk);
        $('#tempatKejadian').val(data.tempatKejadian);
        $('#id').val(data.id);
        // console.log(data);
      }
    })
  });


</script>
@endsection