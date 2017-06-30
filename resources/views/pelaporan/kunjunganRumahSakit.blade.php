@extends('layouts.index')
@section('title') Register Kunjungan Rumah Sakit @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
<link rel="stylesheet" href="{{url('/plugins/timepicker/bootstrap-timepicker.min.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
      Register 
      <small>Kunjungan Rumah Sakit</small>
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
             @foreach($igd as $data)
             <tr>
                <td>{{ $i }}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{ date('d F Y', strtotime($data->tglLahir))}}</td>
                <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
              </tr>
            <?php $i++; ?>
            @endforeach

            <?php $a= $i ?>
            @foreach($inap as $data)
             <tr>
                <td>{{$a}}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{ date('d F Y', strtotime($data->tglLahir))}}</td>
                <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
              </tr>
            <?php $a++; ?>
            @endforeach
            <?php $b = $a; ?>
            @foreach($jalan as $data)
             <tr>
                <td>{{$b}}</td>
                <td>{{$data->noRm}}</td>
                <td>{{$data->nama}}</td>
                <td>{{ date('d F Y', strtotime($data->tglLahir))}}</td>
                <td>JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
              </tr>
            <?php $b++; ?>
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