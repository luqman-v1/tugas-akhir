@extends('layouts.index')
@section('title') Pendaftaran Rawat Jalan @endsection
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
          <a href="{{url('/rawat-jalan/form')}}"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Pasien Rawat Jalan</button></a>
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
             @foreach($rj as $data)
             <tr class="item{{$data->id}}">
              <td>{{ $i }}</td>
              <td>{{$data->noRm}}</td>
              <td>{{$data->nama}}</td>
              <td>{{$data->DokterPJ}}</td>
              <td>{{$data->noHp}}</td>
              <td>{{$data->tglKunjungan}}</td>
              <td>{{$data->caraBayar}}</td>
              <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
              <td> 
               <button data-toggle="modal" title="Edit" data-target=".bs-example-modal-sm1" data-id="{{$data->id}}" id="ubah" value="{{$data->id}}" class="btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
               <button data-toggle="modal" title="Hapus" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="delete-modal btn-xsm btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
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
          <h4 class="modal-title">Ubah Rawat Jalan</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{url('rawat-jalan/detail')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id">
                <div class="col-lg-6">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group{{ $errors->has('tglKunjungan') ? ' has-error' : '' }}">
                        <label class="control-label " for="tglKunjungan">Tanggal Kunjungan</label><br>
                        <div class='input-group date'>
                          <input placeholder="Tanggal Kunjungan" type='text' value="" name="tglKunjungan" class="form-control" id="tanggal_kunjungan">
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
                   <div class="form-group">
                     <select name="caraDatang" id="caraDatang" class="form-control">
                       <option value="">pilih</option>
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
                     <option value="">pilih</option>
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
                <div class="form-group {{ $errors->has('klinikTujuan') ? 'has-error' : ''}}">
                 <label class="control-label " for="tanggal_kembali">Klinik Tujuan</label>
                 <div class="input-group date">
                  <div class="form-group">
                    <select name="klinikTujuan" id="klinikTujuan" class="form-control">
                      <option value="">pilih</option>
                      <option value="Bedah Umum">Bedah Umum</option>
                      <option value="Bedah Saluran Cerna (Digestive)">Bedah Saluran Cerna (Digestive)</option>
                      <option value="Bedah Throraks">Bedah Throraks</option>
                      <option value="Bedah Tulang dan Sendi (Orthopedi)">Bedah Tulang dan Sendi (Orthopedi)</option>
                      <option value="Bedah Saluran Kencing (Urologi)">Bedah Saluran Kencing (Urologi)</option>
                      <option value="Bedah Plastik dan Estetik">Bedah Plastik dan Estetik</option>
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('klinikTujuan') }}</strong>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group {{ $errors->has('DokterPJ') ? 'has-error' : ''}}">
               <label class="control-label " for="tanggal_kembali">Dokter Penanggung Jawab</label>
               <div class="input-group date">
                <div class="form-group">
                  <select name="DokterPJ" id="DokterPJ" class="form-control">
                    <option value="">pilih</option>
                    @foreach($dokter as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                  </select>

                  <span class="help-block">
                    <strong>{{ $errors->first('DokterPJ') }}</strong>
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
    // console.log(id);
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
          url: '{{url('/')}}'+'/rawat-jalan/delete/'+id,
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
      url: '{{ url('/') }}/rawat-jalan/detail/'+id,
      type: "GET",
      dataType: "json",
      success: function(data){
        $('#caraBayar').val(data.caraBayar);
        $('#tanggal_kunjungan').val(data.tglKunjungan);
        $('#caraDatang').val(data.caraDatang);
        $('#rujukan').val(data.rujukan);
        $('#klinikTujuan').val(data.klinikTujuan);
        $('#DokterPJ').val(data.DokterPJ);
        $('#id').val(data.id);
          // console.log(data);
        }
      })
  });


</script>

@endsection