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
      <h3 style="text-align: center;">Antrian Pasien Pelayanan Rawat IGD</h3>
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
              <td>{{$data->dokterJaga}}</td>
              <td>{{$data->noHp}}</td>
              <td>{{$data->tanggal_masuk}}</td>
              <td>{{$data->caraBayar}}</td>
              <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
            <td>
              <a href="{{ url('/pelayanan-igd/form/'.$data->id) }}"><button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></button></a>
              
            </td>                                                         
                                                                   
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

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
       <h3 style="text-align: center;">Daftar Pelayanan Yang Belum Memasukan Kode ICD</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
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
             @foreach($igd as $data)
            <tr class="item{{$data->id}}">
                <td>{{ $i }}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->tglLahir}}</td>
                @role(['admin','rekmed']) 
                @if($data->kode == null)
                <td><span class="label label-warning">Harap Masukan Kode ICD</span></td>
                @else
                <td>{{$data->kode}}</td>
                @endif
                @endrole
                <td>
                @role(['admin','rekmed'])
                <a href="{{url('pelayanan-igd/form/edit/'.$data->idp)}}"><button type="button" class="btn-xsm btn-success"><span class="glyphicon glyphicon-plus"></span> Tambahkan Kode ICD</button></a>
                @endrole
                  <button data-toggle="modal" data-id="{{$data->id}}" data-target=".bs-example-modal-sm1" id="ubah" value="{{$data->id}}" class="btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
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
<!-- /.col -->
</div>
<!-- /.row -->
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
      <h3 style="text-align: center;">Histori Pelayanan Lembar Rawat IGD</h3>
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
             @foreach($histori as $data)
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
                  <button data-toggle="modal" data-id="{{$data->id}}" data-target=".bs-example-modal-sm1" id="ubah" value="{{$data->id}}" class="btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
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
<div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ubah Pelayanan IGD</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{url('pelayanan-igd/detail')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" id="id">
                                                <div class="col-lg-6">
                                           <div class="row">
                                                    <div class="col-md-6">  
                                                        <div class="form-group {{ $errors->has('jenisKasus') ? 'has-error' : ''}}">
                                                           <label class="control-label " for="jenisKasus">Jenis Kasus</label>
                                                           <div class="form-group">
                                                               <select name="jenisKasus" id="jenisKasus" class="form-control">
                                                               <option>pilih</option>
                                                                 <option value="Bedah">Bedah</option>
                                                                 <option value="Obsgin">Obsgin</option>
                                                                 <option value="Interna">Interna</option>
                                                             </select>
                                                             <span class="help-block">
                                                                <strong>{{ $errors->first('jenisKasus') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('tindakanResuitasi') ? 'has-error' : ''}}">
                                                       <label class="control-label " for="tindakanResuitasi">Tindakan Resusitasi</label>
                                                       <div class="form-group">
                                                           <select name="tindakanResuitasi" id="tindakanResuitasi" class="form-control">
                                                             <option>pilih</option>
                                                             <option value="Ya">Ya</option>
                                                             <option value="Tidak">Tidak</option>
                                                         </select>
                                                         <span class="help-block">
                                                            <strong>{{ $errors->first('tindakanResuitasi') }}</strong>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">  
                                                <div class="form-group {{ $errors->has('cramsScore') ? 'has-error' : ''}}">
                                                   <label class="control-label " for="cramsScore">Crams Score/ CGS</label>
                                                   <div class="form-group">
                                                       <input placeholder="Crams Score/ CGS" type='text' value="{{old('cramsScore')}}" name="cramsScore" class="form-control" id="cramsScore">
                                                     <span class="help-block">
                                                        <strong>{{ $errors->first('cramsScore') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('anamnesis') ? 'has-error' : ''}}">
                                               <label class="control-label " for="anamnesis">Anamnesis</label>
                                               <div class="form-group">
                                                  <input placeholder="Anamnesis" type='text' value="{{old('anamnesis')}}" name="anamnesis" class="form-control" id="anamnesis">
                                                 <span class="help-block">
                                                    <strong>{{ $errors->first('anamnesis') }}</strong>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('pemeriksaanFisik') ? ' has-error' : '' }}">
                                            <label class="control-label " for="pemeriksaanFisik">Pemeriksaan Fisik</label><br>
                                               <select class="form-control" id="pemeriksaanFisik" name="pemeriksaanFisik">
                                               <option>pilih</option>
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                               </select>
                                            </div>
                                            @if ($errors->has('pemeriksaanFisik'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pemeriksaanFisik') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    <div class="col-md-6">
                                       <div class="bootstrap-timepicker">
                                        <div class="form-group{{ $errors->has('pemeriksaanStatus') ? ' has-error' : '' }}">
                                            <label class="control-label " for="jam_masuk">Pemeriksaan Status Nyeri</label><br>
                                             <input placeholder="Pemeriksaan Status Nyeri" type='text' value="{{old('pemeriksaanStatus')}}" name="pemeriksaanStatus" class="form-control" id="pemeriksaanStatus">
                                          </div>
                                          @if ($errors->has('pemeriksaanStatus'))
                                          <span class="help-block">
                                            <strong>{{ $errors->first('pemeriksaanStatus') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                            </div>
                        </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('pemeriksaanLaboratorium') ? 'has-error' : ''}}">
                                            <label class="control-label " for="pemeriksaanLaboratorium">Pemeriksaan Laboratorium</label>
                                                 <div class="form-group">
                                                       <input type="text" class="form-control" id="pemeriksaanLaboratorium" name="pemeriksaanLaboratorium" value="{{old('pemeriksaanLaboratorium')}}" placeholder="Pemeriksaan Laboratorium">
                                                       <span class="help-block">
                                                        <strong>{{ $errors->first('pemeriksaanLaboratorium') }}</strong>
                                                    </span>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('pemeriksaanRadiologi') ? 'has-error' : ''}}">
                                         <label class="control-label " for="pemeriksaanRadiologi">Pemeriksaan Radiologi</label>
                                            <div class="form-group">
                                               <input type="text" class="form-control" id="pemeriksaanRadiologi" value="{{old('pemeriksaanRadiologi')}}" name="pemeriksaanRadiologi" placeholder="Pemeriksaan Radiologi">

                                               <span class="help-block">
                                                <strong>{{ $errors->first('pemeriksaanRadiologi') }}</strong>
                                            </span>
                                         </div>
                                    </div>
                                </div>
                                    </div>
                                            </div>
                                            <div class="col-lg-6">  
                                                
                                                
                              
                                <div class="row">
                                 

                    <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diagonosisAwal') ? 'has-error' : ''}}">
                                 <label class="control-label " for="diagonosisAwal">Diagnosis Awal</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" id="diagonosisAwal" name="diagonosisAwal" value="{{old('diagonosisAwal')}}" placeholder="Diagnosis ">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('diagonosisAwal') }}</strong>
                                    </span>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                                <div class="form-group {{ $errors->has('diagnosisAkhir') ? 'has-error' : ''}}">
                                 <label class="control-label " for="diagnosisAkhir">Diagnosis Akhir </label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" id="diagnosisAkhir"  name="diagnosisAkhir" value="{{old('diagnosisAkhir')}}" placeholder="Diagnosis ">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('diagnosisAkhir') }}</strong>
                                    </span>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('terapiTindakan') ? 'has-error' : ''}}">
                         <label class="control-label " for="terapiTindakan">Terapi/Tindakan di IGD</label>
                            <div class="form-group">
                               <input type="text" class="form-control"  id="terapiTindakan" value="{{old('terapiTindakan')}}" name="terapiTindakan" placeholder="Terapi/Tindakan di IGD">
                               <span class="help-block">
                                <strong>{{ $errors->first('terapiTindakan') }}</strong>
                            </span>
                            </div>
                         </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tindakanLanjut') ? 'has-error' : ''}}">
                         <label class="control-label" for="tindakanLanjut">Tindak Lanjut</label>
                            <div class="form-group">
                               <select name="tindakanLanjut" id="tindakanLanjut" class="form-control">
                                                             <option value="">pilih</option>
                                                             <option value="Pulang">Pulang</option>
                                                             <option value="Dirujuk">Dirujuk</option>
                                                             <option value="Dirawat">Dirawat</option>
                                                             <option value="Meninggal">Meninggal</option>
                                                             <option value="Menolak Dirawat">Menolak Dirawat</option>
                                                         </select>
                               <span class="help-block">
                                <strong>{{ $errors->first('tindakanLanjut') }}</strong>
                            </span>
                                </div>
                         </div>
                    </div>

                    <div id="dirujuks" class="col-md-6">
                                <div class="form-group {{ $errors->has('dirujuk') ? 'has-error' : ''}}">
                                 <label class="control-label " for="dirujuk">Dirujuk Ke</label>
                                    <div class="form-group">
                                       <input type="text" class="form-control" id="dirujuk"  name="dirujuk" value="{{old('dirujuk')}}" placeholder="Dirujuk Ke">
                                       <span class="help-block">
                                        <strong>{{ $errors->first('dirujuk') }}</strong>
                                    </span>
                                </div>
                            </div>
                    </div>

                     <div id="tglMeninggal" class="col-md-6">
                                        <div class="form-group{{ $errors->has('tglMeninggal') ? ' has-error' : '' }}">
                                            <label class="control-label " for="tglMeninggal">Tanggal Meninggal</label><br>
                                            <div class='input-group date'>
                                                <input placeholder="tglMeninggal" type='text'  name="tglMeninggal" class="form-control" id="tanggal_masuk">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            @if ($errors->has('tglMeninggal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tglMeninggal') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="jamMeninggal" class="col-md-6">
                                       <div class="bootstrap-timepicker">
                                        <div class="form-group{{ $errors->has('jamMeninggal') ? ' has-error' : '' }}">
                                            <label class="control-label " for="jamMeninggal">Jam Meninggal</label><br>
                                            <div class="input-group">
                                                <input type="text" id="jamMeninggal" name="jamMeninggal" value="{{old('jamMeninggal')}}" class="form-control timepicker">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-clock-o"></i>
                                              </div>
                                          </div>
                                          @if ($errors->has('jamMeninggal'))
                                          <span class="help-block">
                                            <strong>{{ $errors->first('jamMeninggal') }}</strong>
                                        </span>
                                        @endif
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

<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{url('/plugins/select2/select2.full.min.js')}}"></script>
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
          url: '{{url('/')}}'+'/pelayanan-igd/delete/'+id,
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
   $(".select2").select2();
     //Date picker
     $('#tglLahir').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });
   //Date picker
   $('#tanggal_masuk').datepicker({
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
  $(document).on('click','#ubah', function(id){
    var id = $(this).val();
    // console.log(id)
    $.ajax({
      url: '{{ url('/') }}/pelayanan-igd/detail/'+id,
      type: "GET",
      dataType: "json",
      success: function(data){
        $('#anamnesis').val(data.anamnesis);
        $('#cramsScore').val(data.cramsScore);
        $('#diagnosisAkhir').val(data.diagnosisAkhir);
        $('#diagonosisAwal').val(data.diagonosisAwal);
        $('#dirujuk').val(data.dirujuk);
        $('#jamMeninggal').val(data.jamMeninggal);
        $('#jenisKasus').val(data.jenisKasus);
        $('#pemeriksaanFisik').val(data.pemeriksaanFisik);
        $('#pemeriksaanLaboratorium').val(data.pemeriksaanLaboratorium);
        $('#pemeriksaanRadiologi').val(data.pemeriksaanRadiologi);
        $('#pemeriksaanStatus').val(data.pemeriksaanStatus);
        $('#terapiTindakan').val(data.terapiTindakan);
        $('#tglMeninggal').val(data.tglMeninggal);
        $('#tindakanLanjut').val(data.tindakanLanjut);
        $('#tindakanResuitasi').val(data.tindakanResuitasi);
        $('#id').val(data.id);
        // console.log(data);
      }
    })
  });


</script>
@endsection