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

@role(['dokter','perawat','admin']) 
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
        <h3 style="text-align: center;">Antrian Pelayanan Rawat Jalan</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
        <table id="example3" class="table table-bordered table-striped">
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
           @foreach($antrian as $data)
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
              <a href="{{ url('/lrj/form/'.$data->id) }}"><button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="btn-xs btn-success" title="tambah"><span class="glyphicon glyphicon-plus"></span></button></a>
              
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
@endrole
@role(['admin','rekmed']) 
<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
        {{--  <a href="{{url('lrj/form')}}"> <button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Tambah Pasien Rawat Jalan</button></a> --}}
      <h3 style="text-align: center;">Daftar Pelayanan Yang Belum Memasukan Kode ICD</h3>
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
               <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
           <?php $i = 1; ?>
           @foreach($lrj as $data)
           <tr class="item{{$data->id}}">
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
              <a href="{{url('lrj/form/edit/'.$data->idp)}}"><button title="tambah" type="button" class="btn-xsm btn-success"><span class="glyphicon glyphicon-plus"></span> Tambahkan Kode ICD</button></a>
              <button data-toggle="modal" data-target=".bs-example-modal-sm1" data-id="{{$data->id}}" id="ubah" title="Edit" value="{{$data->id}}" class="btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
              <button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" title="Hapus" value="{{$data->id}}" class="delete-modal btn-xsm btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
              
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
@endrole

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
        <h3 style="text-align: center;">Histori Pelayanan Lembar Rawat Jalan</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
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
           @foreach($histori as $data)
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
              <button data-toggle="modal" title="Ubah" data-target=".bs-example-modal-sm1" data-id="{{$data->id}}" id="ubah" value="{{$data->id}}" class="btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
              <button data-toggle="modal" title="Hapus" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="delete-modal btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
              
            </td>
          </tr>
          <?php $i++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Pelayanan Rawat Jalan</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{url('lrj/detail')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" >
                <div class="col-lg-6">
                 
                 <div class="form-group {{ $errors->has('anamnesa') ? 'has-error' : ''}}">
                  <label for="anamnesa">Anamnesa</label>
                  <input class="form-control" name="anamnesa" id="anamnesa" value="{{old('anamnesa')}}" type="text" placeholder="Anamnesa">
                  @if ($errors->has('anamnesa'))
                  <span class="help-block">
                    <strong>{{ $errors->first('anamnesa') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('riwayatAlergi') ? 'has-error' : ''}}">
                  <label for="riwayatAlergi">Riwayat Alergi</label>
                  <input class="form-control" name="riwayatAlergi" id="riwayatAlergi" value="{{old('riwayatAlergi')}}" type="text" placeholder="Riwayat Alergi">
                  @if ($errors->has('riwayatAlergi'))
                  <span class="help-block">
                    <strong>{{ $errors->first('riwayatAlergi') }}</strong>
                  </span>
                  @endif
                </div>

              </div>

              <div class="col-lg-6">
                
               
                <label for="pemeriksaanFisik">Pemeriksaan Fisik</label>
                <hr>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group {{ $errors->has('tensi') ? 'has-error' : ''}}">
                      <label for="tensi">Tensi</label>
                      <div class='input-group date'>
                        <input class="form-control" name="tensi" id="tensi" value="{{old('tensi')}}" type="text" placeholder="Tensi">
                        <span class="input-group-addon">mmHg</span>
                      </div>
                      @if ($errors->has('tensi'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tensi') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group {{ $errors->has('rr') ? 'has-error' : ''}}">
                      <label for="rr">RR</label>
                      <div class='input-group date'>
                        <input class="form-control" name="rr" id="rr" value="{{old('rr')}}" type="text" placeholder="RR">
                        <span class="input-group-addon">x/menit</span>
                      </div>
                      @if ($errors->has('rr'))
                      <span class="help-block">
                        <strong>{{ $errors->first('rr') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group {{ $errors->has('nadi') ? 'has-error' : ''}}">
                      <label for="nadi">Nadi</label>
                      <div class='input-group date'>
                        <input class="form-control" name="nadi" id="nadi" value="{{old('nadi')}}" type="text" placeholder="Nadi">
                        <span class="input-group-addon">x/menit</span>
                      </div>
                      @if ($errors->has('nadi'))
                      <span class="help-block">
                        <strong>{{ $errors->first('nadi') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group {{ $errors->has('bb') ? 'has-error' : ''}}">
                      <label for="bb">BB</label>
                      <div class='input-group date'>
                        <input class="form-control" name="bb" id="bb" value="{{old('pemeriksaanFisik')}}" type="text" placeholder="BB">
                        <span class="input-group-addon">KG</span>
                      </div>
                      @if ($errors->has('bb'))
                      <span class="help-block">
                        <strong>{{ $errors->first('bb') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group {{ $errors->has('tb') ? 'has-error' : ''}}">
                      <label for="tb">TB</label>
                      <div class='input-group date'>
                        <input class="form-control" name="tb" id="tb" value="{{old('tb')}}" type="text" placeholder="TB">
                        <span class="input-group-addon">CM</span>
                      </div>
                      @if ($errors->has('tb'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tb') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group {{ $errors->has('suhu') ? 'has-error' : ''}}">
                      <label for="suhu">SUHU</label>
                      <div class='input-group date'>
                        <input class="form-control" name="suhu" id="suhu" value="{{old('suhu')}}" type="text" placeholder="SUHU">
                        <span class="input-group-addon">&deg;C</span>
                      </div>
                      @if ($errors->has('suhu'))
                      <span class="help-block">
                        <strong>{{ $errors->first('suhu') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>    
                </div>
                <hr>
                <div class="row">
                 <div class="col-md-6">
                  <div class="form-group {{ $errors->has('diagnosa') ? 'has-error' : ''}}">
                   <label class="control-label " for="diagnosa">Diagnosa</label>
                   <div class="input-group date">
                    <div class="form-group">
                      <textarea id="diagnosa" class="form-control" name="diagnosa" value="{{old('diagnosa')}}" placeholder="Diagnosa""></textarea>
                     <span class="help-block">
                      <strong>{{ $errors->first('diagnosa') }}</strong>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group {{ $errors->has('tindakan') ? 'has-error' : ''}}">
               <label class="control-label " for="tindakan">Tindakan</label>
               <div class="input-group date">
                <div class="form-group">
                <textarea id="tindakan" class="form-control" value="{{old('tindakan')}}" name="tindakan" placeholder="Tindakan"></textarea>
                 <span class="help-block">
                  <strong>{{ $errors->first('tindakan') }}</strong>
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
    $("#example2").DataTable();
    $("#example3").DataTable();

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
        url: '{{url('/')}}'+'/lrj/delete/'+id,
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
    // console.log(id)
    $.ajax({
      url: '{{ url('/') }}/lrj/detail/'+id,
      type: "GET",
      dataType: "json",
      success: function(data){
        $('#anamnesa').val(data.anamnesa);
        $('#bb').val(data.bb);
        $('#diagnosa').val(data.diagnosa);
        $('#nadi').val(data.nadi);
        $('#riwayatAlergi').val(data.riwayatAlergi);
        $('#rr').val(data.rr);
        $('#suhu').val(data.suhu);
        $('#tb').val(data.tb);
        $('#tensi').val(data.tensi);
        $('#tindakan').val(data.tindakan);
        $('#id').val(data.id);
        // console.log(data);
      }
    })
  });


</script>
@endsection