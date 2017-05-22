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
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/rawat-inap')}}">pendfartaran</a></li>
    <li class="active">lihat</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <a href="{{url('/rawat-inap/form')}}"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Pasien Rawat Inap</button></a>
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
             @foreach($inap as $data)
             <tr class="item{{$data->id}}">
              <td>{{ $i }}</td>
              <td>{{$data->noRm}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->tglLahir}}</td>
              <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
              <td> 
               <button data-toggle="modal" data-target=".bs-example-modal-sm1" data-id="{{$data->id}}" id="ubah" value="{{$data->id}}" class="btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span> Ubah</button>
               <button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="delete-modal btn-xsm btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
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
          <h4 class="modal-title">Ubah Rawat Inap</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{url('rawat-inap/detail')}}">
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
              <div class="form-group {{ $errors->has('caraDatang') ? 'has-error' : ''}}">
               <label class="control-label " for="caraDatang">Cara Datang</label>
               <div class="form-group">
                 <select name="caraDatang" id="caraDatang" class="form-control">
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
              <input class="form-control" name="rujukan"  value="{{old('rujukan')}}" id="rujukan" type="text" placeholder="Rujukan">
            </div>



          </div>

          <div class="col-lg-6">


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
                <select name="caraMasuk" id="caraMasuk" class="form-control">
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
              <select name="bangsal" id="bangsal" class="form-control">
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
          <select name="kelas" id="kelas" class="form-control">
            <option value="">pilih</option>
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
        <select name="kamar" id="kamar" class="form-control">
          <option value="">pilih</option>
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
        url: '{{url('/')}}'+'/rawat-inap/delete/'+id,
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
      url: '{{ url('/') }}/rawat-inap/detail/'+id,
      type: "GET",
      dataType: "json",
      success: function(data){
        $('#tanggal_masuk').val(data.tanggal_masuk);
        $('#rujukan').val(data.rujukan);
        // $('#kelas').val(data.kelas);
        // $('#kamar').val(data.kamar);
        $('#jam_masuk').val(data.jam_masuk);
        $('#caraMasuk').val(data.caraMasuk);
        $('#caraDatang').val(data.caraDatang);
        $('#caraBayar').val(data.caraBayar);
        // $('#bangsal').val(data.bangsal);
        $('#id').val(data.id);
        // console.log(data);
      }
    })
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