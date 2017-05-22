@extends('layouts.index')
@section('title') Daftar Users @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
   Daftar Users
   <small></small>
 </h1>
 <ol class="breadcrumb">
  <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{url('/laporan/register')}}">Daftar Users</a></li>
  <li class="active">lihat</li>
</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm1"><span class="glyphicon glyphicon-plus"></span> Tambah User</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Hp</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php $i = 1; ?>
             @foreach($user as $data)
             <tr class="item{{$data->id}}">
              <td>{{ $i }}</td>
              <td>{{$data->username}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->noHp}}</td>
              <td>{{App\Role::find($data->role_id)->display_name}}</td>
              <td>
              <button data-toggle="modal" id="ubahPassword" value="{{$data->id}}" data-target=".modal-edit" class="btn-xsm btn-warning">Ubah Password</button> 
              <button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="delete-modal btn-xsm btn-danger">Hapus User</button>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah User</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('/user/register')}}" method="post">
              <div class="form-group">
                {{ csrf_field() }}
                <label class="control-label " for="penyebab">Username</label>
                <input type="text" name="username" id="kode" class="form-control" value="{{old('Username')}}" placeholder="Username">
              </div>
              <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">Nama</label>
                   <input type="text" class="form-control" name="name" {{old('name')}} placeholder="Nama">
                 </div>
               </section>
             </div>
             <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">Email</label>
                   <input type="email" class="form-control" name="email" {{old('email')}} placeholder="Email">
                 </div>
               </section>
             </div>
             <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">No HP</label>
                   <input type="text" class="form-control" name="noHp" {{old('noHp')}} placeholder="No Hp">
                 </div>
               </section>
             </div>
             <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">Jabatan</label>
                   <select class="form-control" name="jabatan">
                  <option>pilih</option>
                   @foreach($role as $data)
                     <option value="{{$data->id}}">{{$data->display_name}}</option>
                    @endforeach
                   </select>
                 </div>
               </section>
             </div>
             <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">Password</label>
                   <input type="password" class="form-control" name="password" placeholder="password">
                 </div>
               </section>
             </div>
             <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">Confirm Password</label>
                   <input type="password" class="form-control" name="password_confirmation" placeholder="password confirmation">
                 </div>
               </section>
             </div>
             <div class="form-group" align="right">
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 

    <div class="modal fade modal-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ubah Password User</h4>
          </div>
          <div class="modal-body">
            <form action="{{url('/user/register/ubahPassword')}}" method="post">
              <div class="form-group">
                {{ csrf_field() }}
              <input type="hidden" name="id" id="id-edit">
             <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">Password</label>
                   <input type="password" class="form-control" name="password" placeholder="password">
                 </div>
               </section>
             </div>
             <div class="form-group">
                <section>
                  <div id="initRow">
                   <label class="control-label " for="penyebab">Confirm Password</label>
                   <input type="password" class="form-control" name="password_confirmation" placeholder="password confirmation">
                 </div>
               </section>
             </div>
             <div class="form-group" align="right">
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Simpan</button>
            </div>
          </form>
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

  $(document).on('click', '#ubahPassword', function() {
   var val = $('#id-edit').val($(this).val());
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
          url: '{{url('/')}}'+'/user/list/delete/'+id,
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