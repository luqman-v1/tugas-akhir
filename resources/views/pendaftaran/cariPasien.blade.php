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
      <small>Cari Pasien</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Pendaftaran</a></li>
    <li class="active">Baru</li>
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
                  <th>No Rekam Medis</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
             <?php $i = 1; ?>
             @foreach($pasien as $data)
              <tr class="item{{$data->id}}">
                <td>{{ $i }}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{ date('d F Y', strtotime($data->tglLahir))}}</td>
                <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
                <td>
               <button type="button" class="btn-xs btn-info"  data-toggle="modal" value="{{$data->noRm}}" id="noRm{{ $i }}" name="noRm" data-target="#myModal">Lihat Detail </button> 
                <a href="{{url('/rawat-jalan/input/'.$data->id)}}"><button type="button" class="btn-xs btn-success">Rawat Jalan</button></a>
                <a href="{{url('/rawat-inap/input/'.$data->id)}}"><button type="button" class="btn-xs btn-primary">Rawat Inap</button></a>
                <a href="{{url('/igd/input/'.$data->id)}}"><button type="button" class="btn-xs btn-default">IGD</button></a>
                <a href="{{url('/cetak-krs/'.$data->id)}}"><button type="button" class="btn-xs">Cetak KIB</button></a>
                <a href="{{ url('pendaftaran-pasien/ubah/'.$data->id) }}"><button data-toggle="modal" data-id="{{$data->id}}" id="ubah" value="{{$data->id}}" class="btn-xs btn-warning"> Ubah</button></a>
                <button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="delete-modal btn-xs btn-danger"> Hapus</button>                                              
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
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Pasien</h4>
      </div>
      <div class="modal-body">
        <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form role="form" method="post" action="{{url('pendaftaran-pasien')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-lg-6">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="nama_q">Nomor Rekam Medis</label>
                                                        <input class="form-control" value="" readonly="" name="noRm" id="noRm" type="text" placeholder="Nomor Rekam Medis">
                                                        @if ($errors->has('noRm'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('noRm') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
                                                        <label for="nama">Nama Pasien</label>
                                                        <input class="form-control" type="text" value="{{old('nama')}}" id="nama" readonly="" name="nama" placeholder="Nama Pasien">
                                                        @if ($errors->has('nama'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('nama') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <hr>
                                                    <center><label for="title">Alamat Lengkap :</label></center>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Provinsi :</label>
                                                         <input type="text" id="provinsi" readonly="" class="form-control" name="">
                                                       
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kabupaten/Kota :</label>
                                                        <input type="text" id="kabupaten" readonly="" class="form-control" name="">
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kecamatan :</label>
                                                        <input type="text" id="kecamatan" readonly="" class="form-control" name="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Pilih Kelurahan/Desa :</label>
                                                         <input type="text" id="kelurahan" readonly="" class="form-control" name="">
                                                    </div>

                                                    <div class="form-group {{ $errors->has('dukuh') ? 'has-error' : ''}}">
                                                        <label for="dukuh">Dukuh</label>
                                                        <input class="form-control" id="dukuh" readonly="" type="text" value="{{old('dukuh')}}" name="dukuh" placeholder="Dukuh">
                                                        @if ($errors->has('dukuh'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('dukuh') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group{{ $errors->has('rt') ? ' has-error' : '' }}">
                                                                <label class="control-label " for="RT">RT</label><br>
                                                                <div class='input-group date'>
                                                                    <input placeholder="RT" type='number' readonly="" value="{{old('rt')}}" name="rt" class="form-control" id="rt" >
                                                                </div>
                                                                @if ($errors->has('RT'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('RT') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                       <div class="col-md-6">
                                                            <div class="form-group{{ $errors->has('rw') ? ' has-error' : '' }}">
                                                                <label class="control-label " for="rw">RW</label><br>
                                                                <div class='input-group date'>
                                                                    <input placeholder="rw" type='number' readonly="" value="{{old('rw')}}" name="rw" class="form-control" id="rw" >
                                                                </div>
                                                                @if ($errors->has('rw'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('rw') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>                                                          
                                                   </div>
                                                    
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group{{ $errors->has('tglLahir') ? ' has-error' : '' }}">
                                                                <label class="control-label " for="tglLahir"> Tanggal Lahir</label><br>
                                                                <div class='input-group date'>
                                                                    <input placeholder="Tanggal Lahir" type='text' value="{{old('tglLahir')}}" name="tglLahir" class="form-control" readonly="" id="tglLahir" >
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                                @if ($errors->has('tglLahir'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('tglLahir') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="tmptLahir">Tempat Lahir</label>
                                                            <div class="form-group">
                                                               <input class="form-control" readonly="" name="tmptLahir" value="{{old('tmptLahir')}}" id="tmptLahir" type="text" placeholder="Tempat Lahir">
                                                           </div>
                                                       </div>                                                             
                                                   </div>

                                                  

                                        
                        </div>
                        <div class="col-lg-6">
                         <div class="row">
                                                     <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('jenisKelamin') ? 'has-error' : ''}}">
                                                         <label class="control-label " for="jenisKelamin">Jenis Kelamin</label>
                                                         <div class="input-group date">
                                                            <div class="form-group">
                                                                 <input class="form-control" readonly="" name="tmptLahir" value="{{old('tmptLahir')}}" id="jenisKelamin" type="text" placeholder="Tempat Lahir">
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('jenisKelamin') }}</strong>
                                                                </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group {{ $errors->has('agama') ? 'has-error' : ''}}">
                                                     <label class="control-label " for="agama">Agama</label>
                                                     <div class="input-group date">
                                                        <div class="form-group">
                                                             <input class="form-control" readonly="" name="tmptLahir" value="{{old('tmptLahir')}}" id="agama" type="text" placeholder="Tempat Lahir">
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('agama') }}</strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('statusPerkawinan') ? 'has-error' : ''}}">
                                             <label class="control-label " for="statusPerkawinan">Status Perkawinan</label>
                                             <div class="input-group date">
                                                <div class="form-group">
                                                    <input class="form-control" readonly="" name="tmptLahir" value="{{old('tmptLahir')}}" id="statusPerkawinan" type="text" placeholder="Tempat Lahir">
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('statusPerkawinan') }}</strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('pendidikanPasien') ? 'has-error' : ''}}">
                                         <label class="control-label " for="pendidikanPasien">Pendidikan Pasien</label>
                                         <div class="input-group date">
                                            <div class="form-group">
                                                <input placeholder="Pendidikan Pasien" type='text' value="{{old('pendidikanPasien')}}" name="pendidikanPasien" class="form-control"  readonly="" id='pendidikanPasien' />

                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pendidikanPasien') }}</strong>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group {{ $errors->has('pekerjaanPasien') ? 'has-error' : ''}}">
                                    <label for="pekerjaanPasien">Pekerjaan Pasien</label>
                                    <input class="form-control" id="pekerjaanPasien" readonly="" value="{{old('pekerjaanPasien')}}" name="pekerjaanPasien" placeholder="Pekerjaan Pasien"  >
                                    @if ($errors->has('pekerjaanPasien'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaanPasien') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group {{ $errors->has('kewarganegaraan') ? 'has-error' : ''}}">
                                 <label class="control-label " for="kewarganegaraan">kewarganegaraan</label>
                                 <div class="form-group">
                                  <input class="form-control" id="kewarganegaraan" readonly="" value="{{old('pekerjaanPasien')}}" name="pekerjaanPasien" placeholder="Pekerjaan Pasien"  >
                                   <span class="help-block">
                                    <strong>{{ $errors->first('kewarganegaraan') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="namaOrtu">Nama Orang Tua</label>
                            <input class="form-control" id="namaOrtu" readonly="" name="namaOrtu" value="{{old('namaOrtu')}}" type="text" placeholder="Nama Orang Tua">
                        </div>
                        <label for="namaSuami-istri">Nama Suami/Istri</label>
                        <input class="form-control" name="namaSuami_istri" readonly=""  value="{{old('namaSuami_istri')}}" id="namaSuami_istri" type="text" placeholder="Nama Suami/Istri"> 
                    </div>

                    <div class="form-group">
                        <label for="noHp">Nomor Telepon yang Bisa Dihubungi</label>
                        <input class="form-control" id="noHp" readonly="" name="noHp" value="{{old('noHp')}}" type="text" placeholder="Nomor Telepon yang Bisa Dihubungi">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('tglMasuk') ? ' has-error' : '' }}">
                                <label class="control-label " for="tglMasuk">Tanggal Masuk</label><br>
                                <div class='input-group date'>
                                <input placeholder="Tanggal Masuk" type='text' readonly=""  value="@php echo date("Y-m-d"); @endphp" name="tglMasuk" class="form-control" id="tglMasuk">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('tglMasuk'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tglMasuk') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="noPesertaJKN">Nomor Peserta JKN</label>
                        <input class="form-control" name="noPesertaJKN" value="{{old('noPesertaJKN')}}" readonly="" id="noPesertaJKN" type="text" placeholder="Nomor Peserta JKN">
                    </div>
                    <div class="form-group">
                        <label for="noAsuransiLain">Nomor Asuransi Lain</label>
                        <input class="form-control" name="noAsuransiLain" value="{{old('noAsuransiLain')}}" readonly="" id="noAsuransiLain" type="text">
                    </div>

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
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

<script type="text/javascript">
<?php $i = 1; ?>
    @foreach($pasien as $data)

    $(document).ready(function() {
        $('#noRm{{ $i }}').on('click', function(e) {
            var cariID = $(this).val();
            if(cariID) {
                $.ajax({
                    url: '{{url('/')}}/pasien/norm/'+cariID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        var pasien = jQuery.parseJSON(JSON.stringify(data));
                        var noRm = document.getElementById("noRm").value =pasien['noRm'];
                        var nama = document.getElementById("nama").value =pasien['nama'];
                        var provinsi = document.getElementById("provinsi").value =pasien['provinsi'];
                        var kabupaten = document.getElementById("kabupaten").value =pasien['kabupaten'];
                        var kecamatan = document.getElementById("kecamatan").value =pasien['kecamatan'];
                        var kelurahan = document.getElementById("kelurahan").value =pasien['kelurahan'];
                        var dukuh = document.getElementById("dukuh").value =pasien['dukuh'];
                        var rt = document.getElementById("rt").value =pasien['rt'];
                        var rw = document.getElementById("rw").value =pasien['rw'];
                        var tglLahir = document.getElementById("tglLahir").value =pasien['tglLahir'];
                        var tmptLahir = document.getElementById("tmptLahir").value =pasien['tmptLahir'];
                        var jenisKelamin = document.getElementById("jenisKelamin").value =pasien['jenisKelamin'];
                        var agama = document.getElementById("agama").value =pasien['agama'];
                        var statusPerkawinan = document.getElementById("statusPerkawinan").value =pasien['statusPerkawinan'];
                        var pendidikanPasien = document.getElementById("pendidikanPasien").value =pasien['pendidikanPasien'];
                        var pekerjaanPasien = document.getElementById("pekerjaanPasien").value =pasien['pekerjaanPasien'];
                        var kewarganegaraan = document.getElementById("kewarganegaraan").value =pasien['kewarganegaraan'];
                        var namaOrtu = document.getElementById("namaOrtu").value =pasien['namaOrtu'];
                        var namaSuami_istri = document.getElementById("namaSuami_istri").value =pasien['namaSuami_istri'];
                        var noHp = document.getElementById("noHp").value =pasien['noHp'];
                        var tglMasuk = document.getElementById("tglMasuk").value =pasien['tglMasuk'];
                        var tglMasuk = document.getElementById("caraDatang").value =pasien['caraDatang'];
                        var rujukan = document.getElementById("rujukan").value =pasien['rujukan'];
                        var noPesertaJKN = document.getElementById("noPesertaJKN").value =pasien['noPesertaJKN'];
                        var noAsuransiLain = document.getElementById("noAsuransiLain").value =pasien['noAsuransiLain'];



                    }
                });
            }
        });
    });
    <?php $i++; ?>
    @endforeach
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
          url: '{{url('/')}}'+'/pendaftaran-pasien/delete/'+id,
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
@endsection