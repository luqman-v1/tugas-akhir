@extends('layouts.index')
@section('title') Pendaftaran Rawat Inap @endsection
@section('content')

<section class="content-header">
  <h1>
      Pendaftaran Pasien
      <small>{{$nama}}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('/laporan/register')}}">Pelaporan</a></li>
    <li class="active">lihat</li>
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
          <table id="example1" class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
                <tr>
                  <th>No</th>
                  <th>No Rekam Medis</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
              </tr>
          </thead>
          <tbody>
             <?php $i = 1; ?>
             @foreach($register as $data)
             <tr>
                <td>{{ $i }}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->tglLahir}}</td>
                <td>Jl. {{$data->dukuh}} RT{{$data->rt}}/{{$data->rw}},Kelurahan {{$data->kelurahan}}, Kecamatan {{$data->kecamatan}}, {{$data->kabupaten}}, {{$data->provinsi}}</td>
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

@endsection

@section('js')

<script>
 $(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>
@endsection