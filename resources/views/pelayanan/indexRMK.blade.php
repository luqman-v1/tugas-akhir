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
    <small>Daftar Lembar Keluar Masuk</small>
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
          <h3 style="text-align: center;">Antrian Pasien Pelayanan Rawat Jalan</h3>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
        <table id="example3" class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>No</th>
                <th>No Rekam Medis</th>
                <th>Nama</th>
                <th>No Telp</th>
                <th>Tanggal Kunjungan</th>
                <th>Cara Bayar</th>
                <th>Alamat</th>
                <th>Bangsal</th>
                <th>Kelas</th>
                <th>Kamar</th>
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
              <td>{{$data->noHp}}</td>
              <td>{{$data->tanggal_masuk}}</td>
              <td>{{$data->caraBayar}}</td>
              <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
              <td>{{$data->bangsal}}</td>
              <td>{{$data->kelas}}</td>  
              <td>{{$data->kamar}}</td>
            <td>
              <a href="{{ url('/rmk/form/'.$data->id) }}"><button data-toggle="modal" data-id="{{$data->id}}" id="ubahPassword" value="{{$data->id}}" class="btn-xs btn-success"><span class="glyphicon glyphicon-plus"></span></button></a>
              
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
<!--End Advanced Tables -->
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
           @foreach($rmk as $data)
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
             <a href="{{url('rmk/form/edit/'.$data->idp)}}"><button type="button" class="btn-xsm btn-success"><span class="glyphicon glyphicon-plus"></span> Tambahkan Kode ICD</button></a>
              <button data-toggle="modal"  data-target=".bs-example-modal-sm1" data-id="{{$data->id}}" id="ubah" value="{{$data->id}}" class=" btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
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
  </div>
<!--End Advanced Tables -->
<!-- /.row -->
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 style="text-align: center;">Histori Pelayanan Lembar Rawat Inap</h3>
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
                <th>Tanggal Keluar</th>
                <th>Cara Bayar</th>
                <th>Keadaan Keluar RS</th>
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
              <td>{{$data->namaDokterPj}}</td>
              <td>{{$data->noHp}}</td>
              <td>{{$data->tanggal_masuk}}</td>
              <td>{{$data->tglKeluar}}</td>
              <td>{{$data->caraBayar}}</td>
              <td>{{$data->keadaanKeluar}}</td>
              <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
            <td>
              <button data-toggle="modal"  data-target=".bs-example-modal-sm1" data-id="{{$data->id}}" id="ubah" value="{{$data->id}}" class=" btn-xsm btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
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
          <h4 class="modal-title">Ubah Pelayanan lembar keluar masuk</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" method="post" action="{{url('/rmk/detail')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id">
                <div class="col-lg-6">
                  <div class="form-group {{ $errors->has('diagnosisMasuk') ? 'has-error' : ''}}">
                    <label for="diagnosisMasuk">Diagnosis Masuk</label>
                    <div class="form-group">
                      <input class="form-control" name="diagnosisMasuk" id="diagnosisMasuk" value="{{old('diagnosisMasuk')}}" type="text" placeholder="Diagnosis Masuk">
                    </div>
                    @if ($errors->has('diagnosisMasuk'))
                    <span class="help-block">
                      <strong>{{ $errors->first('diagnosisMasuk') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="row">
                    <div class="col-md-6">  
                      <div class="form-group {{ $errors->has('namaPerawat') ? 'has-error' : ''}}">
                       <label class="control-label " for="namaPerawat">Nama Perawat Ruangan yang Menerima</label>
                       <div class="form-group">
                         <select name="namaPerawat" id="namaPerawat" class="form-control">
                          <option value="">pilih</option>
                          @foreach($perawat as $data)
                          <option value="{{ $data->name }}">{{ $data->name }}</option>
                          @endforeach
                        </select>
                        <span class="help-block">
                          <strong>{{ $errors->first('namaPerawat') }}</strong>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group {{ $errors->has('namaPetugasTpp') ? 'has-error' : ''}}">
                     <label class="control-label " for="namaPetugasTpp">Nama Petugas TPP RI</label>
                     <div class="form-group">
                       <select name="namaPetugasTpp" id="namaPetugasTpp" class="form-control">
                        <option value="">pilih</option>
                        @foreach($rekmed as $data)
                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                        @endforeach
                      </select>
                      <span class="help-block">
                        <strong>{{ $errors->first('namaPetugasTpp') }}</strong>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">  
                  <div class="form-group {{ $errors->has('namaDokterPj') ? 'has-error' : ''}}">
                   <label class="control-label " for="namaDokterPj">Nama Dokter PJ Pelayanan</label>
                   <div class="form-group">
                     <select name="namaDokterPj" id="namaDokterPj" class="form-control">
                      <option value="">pilih</option>
                      @foreach($dokter as $data)
                      <option value="{{ $data->name }}">{{ $data->name }}</option>
                      @endforeach
                    </select>
                    <span class="help-block">
                      <strong>{{ $errors->first('namaDokterPj') }}</strong>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
             <div class="col-md-6">
              <div class="form-group {{ $errors->has('caraKeluar') ? 'has-error' : ''}}">
               <label class="control-label " for="caraKeluar">Cara Keluar RS</label>
               <div class="form-group">
                 <select name="caraKeluar" id="caraKeluar" class="form-control">
                  <option value="">pilih</option>
                  <option value="Diizinkan">Diizinkan</option>
                  <option value="permintaan sendiri">permintaan sendiri</option>
                  <option value="lari">lari</option>
                  <option value="pindah/dirujuk rs lain">pindah/dirujuk rs lain</option>
                </select>
                <span class="help-block">
                  <strong>{{ $errors->first('caraKeluar') }}</strong>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group {{ $errors->has('keadaanKeluar') ? 'has-error' : ''}}">
             <label class="control-label " for="keadaanKeluar">Keadaan Keluar RS</label>
             <div class="form-group">
               <select name="keadaanKeluar" id="keadaanKeluar" class="form-control">
                <option value="">pilih</option>
                <option value="Sembuh">Sembuh</option>
                <option value="Belum Sembuh">Belum Sembuh</option>
                <option value="Meninggal">Meninggal</option>
              </select>
              <span class="help-block">
                <strong>{{ $errors->first('keadaanKeluar') }}</strong>
              </span>
            </div>
          </div>
        </div>
        <div id="tglMeninggal"  class="col-md-6">
          <div class="form-group{{ $errors->has('tglMeninggal') ? ' has-error' : '' }}">
            <label class="control-label " for="tglMeninggal">Tanggal Meninggal</label><br>
            <div class='input-group date'>
              <input  type='text'  name="tglMeninggal" class="form-control" id="tglMeninggalID">
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
    <div class="row">
      <div class="col-md-6">
        <div class="form-group{{ $errors->has('tglKeluar') ? ' has-error' : '' }}">
          <label class="control-label " for="tglKeluar">Tanggal Keluar</label><br>
          <div class='input-group date'>
            <input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="tglKeluar" class="form-control" id="tanggal_keluar">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
          @if ($errors->has('tglKeluar'))
          <span class="help-block">
            <strong>{{ $errors->first('tglKeluar') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="col-md-6">
       <div class="bootstrap-timepicker">
        <div class="form-group{{ $errors->has('jamKeluar') ? ' has-error' : '' }}">
          <label class="control-label " for="jamKeluar">Jam Keluar</label><br>
          <div class="input-group">
            <input type="text" name="jamKeluar" id="jamKeluar" value="{{old('jamKeluar')}}" class="form-control timepicker">
            <div class="input-group-addon">
              <i class="fa fa-clock-o"></i>
            </div>
          </div>
          @if ($errors->has('jamKeluar'))
          <span class="help-block">
            <strong>{{ $errors->first('jamKeluar') }}</strong>
          </span>
          @endif
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
      <div class="form-group {{ $errors->has('golonganOperasiTindakan') ? 'has-error' : ''}}">
       <label class="control-label " for="golonganOperasiTindakan">Golongan Operasi/tindakan</label>
       <div class="form-group">
         <select name="golonganOperasiTindakan" id="golonganOperasiTindakan" class="form-control">
          <option value="">Pilih</option>
          <option value="Kecil">Kecil</option>
          <option value="Sedang">Sedang</option>
          <option value="Khusus">Khusus</option>
        </select>
        <span class="help-block">
          <strong>{{ $errors->first('golonganOperasiTindakan') }}</strong>
        </span>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group {{ $errors->has('tanggal_operasiTindakan') ? 'has-error' : ''}}">
     <label class="control-label " for="tanggal_operasiTindakan">Tanggal Operasi/tindakan</label>
     <div class='input-group date'>
      <input placeholder="Tanggal Kunjungan" type='text' value="<?php echo date("Y-m-d"); ?>" name="tanggal_operasiTindakan" class="form-control" id="tanggal_operasiTindakan">
      <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
</div>
</div>
<div class="col-lg-6">  
  
  <div class="row">
    <div class="col-md-6">
      <div class="form-group {{ $errors->has('penyebabLuarCedera') ? 'has-error' : ''}}">
       <label class="control-label " for="penyebabLuarCedera">Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma</label>
       <div class="form-group">
         <input type="text" class="form-control" id="penyebabLuarCedera" value="{{old('penyebabLuarCedera')}}" name="penyebabLuarCedera" placeholder="Penyebab Luar Cedera/Keracunan/Morfologi Neoplasma">
         <span class="help-block">
          <strong>{{ $errors->first('penyebabLuarCedera') }}</strong>
        </span>
      </div>
    </div>
  </div>
  <div class="col-md-6">  
    <div class="form-group {{ $errors->has('imunisasi') ? 'has-error' : ''}}">
     <label class="control-label " for="imunisasi">Imunisasi yang Pernah Didapat</label>
     <div class="form-group">
       <select name="imunisasi" id="imunisasi" class="form-control">
         <option value="">pilih</option>
         <option value="BCG">BCG</option>
         <option value="DT">DT</option>
         <option value="DPT">DPT</option>
         <option value="POLIO">POLIO</option>
         <option value="TFT">TFT</option>
         <option value="CAMPAK">CAMPAK</option>
         <option value="Lain-lain">Lain-lain</option>
       </select>
       <span class="help-block">
        <strong>{{ $errors->first('imunisasi') }}</strong>
      </span>
    </div>
  </div>
</div>
</div>

<div class="row">
 <div class="col-md-6">
  <div class="form-group {{ $errors->has('infeksiNosokomial') ? 'has-error' : ''}}">
   <label class="control-label " for="infeksiNosokomial">Infeksi Nosokomial</label>
   <div class="form-group">
     <input type="text" class="form-control" name="infeksiNosokomial" id="infeksiNosokomial" value="{{old('infeksiNosokomial')}}" placeholder="Infeksi Nosokomial">
     <span class="help-block">
      <strong>{{ $errors->first('infeksiNosokomial') }}</strong>
    </span>
  </div>
</div>
</div>

<div class="col-md-6">
  <div class="form-group {{ $errors->has('penyebabInfeksiNosokomial') ? 'has-error' : ''}}">
   <label class="control-label " for="penyebabInfeksiNosokomial">Penyebab Infeksi Nosokomial</label>
   <div class="form-group">
     <input type="text" class="form-control" id="penyebabInfeksiNosokomial" value="{{old('penyebabInfeksiNosokomial')}}" name="penyebabInfeksiNosokomial" placeholder="Penyebab Infeksi Nosokomial">
     <span class="help-block">
      <strong>{{ $errors->first('penyebabInfeksiNosokomial') }}</strong>
    </span>
  </div>
</div>
</div>
</div>


<div class="row">
 <div class="col-md-6">
  <div class="form-group {{ $errors->has('pengobatanRadio/nuklir') ? 'has-error' : ''}}">
   <label class="control-label " for="pengobatanRadio">Pengobatan Radioterapi/Nuklir</label>
   <div class="form-group">
     <input type="text" class="form-control" name="pengobatanRadio" id="pengobatanRadio" value="{{old('pengobatanRadio')}}" placeholder="Pengobatan Radioterapi/Nuklir">
     <span class="help-block">
      <strong>{{ $errors->first('pengobatanRadio') }}</strong>
    </span>
  </div>
</div>
</div>

<div class="col-md-6">
  <div class="form-group {{ $errors->has('transfusiDarah') ? 'has-error' : ''}}">
   <label class="control-label " for="transfusiDarah">Transfusi Darah</label>
   <div class="form-group">
     <input type="text" class="form-control" id="transfusiDarah" value="{{old('transfusiDarah')}}" name="transfusiDarah" placeholder="Transfusi Darah">

     <span class="help-block">
      <strong>{{ $errors->first('transfusiDarah') }}</strong>
    </span>
  </div>
</div>
</div>

<div class="col-md-6">
  <div class="form-group {{ $errors->has('sebabKematian') ? 'has-error' : ''}}">
   <label class="control-label " for="sebabKematian">Sebab Kematian</label>
   <div class="form-group">
     <input type="text" class="form-control" id="sebabKematian" name="sebabKematian" value="{{old('sebabKematian')}}" placeholder="Sebab Kematian">
     <span class="help-block">
      <strong>{{ $errors->first('sebabKematian') }}</strong>
    </span>
  </div>
</div>
</div>


</div>

<div class="row">
  <div class="col-md-6">  
    <div class="form-group {{ $errors->has('dokterMemulangkan') ? 'has-error' : ''}}">
     <label class="control-label " for="dokterMemulangkan">Dokter yang Memulangkan</label>
     <div class="form-group">
       <select name="dokterMemulangkan" id="dokterMemulangkan" class="form-control">
        <option value="">pilih</option>
        @foreach($dokter as $data)
        <option value="{{ $data->name }}">{{ $data->name }}</option>
        @endforeach
      </select>
      <span class="help-block">
        <strong>{{ $errors->first('dokterMemulangkan') }}</strong>
      </span>
    </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group {{ $errors->has('diagnosisUtama') ? 'has-error' : ''}}">
   <label class="control-label " for="diagnosisUtama">Diagnosa Utama</label>
   <div class="form-group">
     <input type="text" class="form-control" id="diagnosisUtama" name="diagnosisUtama"  value="{{old('diagnosisUtama')}}" placeholder="Diagnosa Utama">
     <span class="help-block">
      <strong>{{ $errors->first('diagnosisUtama') }}</strong>
    </span>
  </div>
</div>
</div>

<div class="col-md-6">
  <div class="form-group {{ $errors->has('operasiTindakan') ? 'has-error' : ''}}">
   <label class="control-label " for="operasiTindakan">Operasi Tindakan</label>
   <div class="form-group">
    <input type="text" class="form-control" id="operasiTindakan"  value="{{old('operasiTindakan')}}"  name="operasiTindakan" placeholder="Operasi Tindakan">
    <span class="help-block">
      <strong>{{ $errors->first('operasiTindakan') }}</strong>
    </span>
  </div>
</div>
</div>

<div class="col-md-6">
  <div class="form-group {{ $errors->has('komplikasi') ? 'has-error' : ''}}">
   <label class="control-label" for="komplikasi">Komplikasi</label>
   <div class="form-group">
     <input type="text" class="form-control" id="komplikasi" name="komplikasi"  value="{{old('komplikasi')}}" placeholder="Komplikasi">
     <span class="help-block">
      <strong>{{ $errors->first('komplikasi') }}</strong>
    </span>
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
<!-- /.row (nested) -->
</div>
<!--End Advanced Tables -->
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
        url: '{{url('/')}}'+'/rmk/delete/'+id,
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

   $('#tglMeninggalID').datepicker({
    autoclose : true,
    format : 'yyyy-mm-dd'
  });
   $('#tanggal_keluar').datepicker({
    autoclose : true,
    format : 'yyyy-mm-dd'
  });
   

    //Date picker
    $('#tanggal_operasiTindakan').datepicker({
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
    console.log(id)
    $.ajax({
      url: '{{ url('/') }}/rmk/detail/'+id,
      type: "GET",
      dataType: "json",
      success: function(data){
        $('#caraKeluar').val(data.caraKeluar);
        $('#diagnosisMasuk').val(data.diagnosisMasuk);
        $('#diagnosisUtama').val(data.diagnosisUtama);
        $('#dokterMemulangkan').val(data.dokterMemulangkan);
        $('#golonganOperasiTindakan').val(data.golonganOperasiTindakan);
        $('#imunisasi').val(data.imunisasi);
        $('#infeksiNosokomial').val(data.infeksiNosokomial);
        $('#jamKeluar').val(data.jamKeluar);
        $('#jamMeninggal').val(data.jamMeninggal);
        $('#keadaanKeluar').val(data.keadaanKeluar);
        $('#komplikasi').val(data.komplikasi);
        $('#namaDokterPj').val(data.namaDokterPj);
        $('#namaPerawat').val(data.namaPerawat);
        $('#namaPetugasTpp').val(data.namaPetugasTpp);
        $('#operasiTindakan').val(data.operasiTindakan);
        $('#pengobatanRadio').val(data.pengobatanRadio);
        $('#penyebabInfeksiNosokomial').val(data.penyebabInfeksiNosokomial);
        $('#penyebabLuarCedera').val(data.penyebabLuarCedera);
        $('#sebabKematian').val(data.sebabKematian);
        $('#tanggal_operasiTindakan').val(data.tanggal_operasiTindakan);
        $('#tglKeluar').val(data.tglKeluar);
        $('#tglMeninggal').val(data.tglMeninggal);
        $('#transfusiDarah').val(data.transfusiDarah);

        $('#id').val(data.id);
        console.log(data);
      }
    })
  });


</script>
@endsection