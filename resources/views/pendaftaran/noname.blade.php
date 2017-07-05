@extends('layouts.index')
@section('title') Pendaftaran Pasien Baru @endsection
@section('css')
<link rel="stylesheet" href="{{url('/plugins/datepicker/datepicker3.css')}}">
@endsection
@section('content')

<section class="content-header">
  <h1>
      Pendaftaran Pasien
      <small>Pendaftaran Pasien Baru</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Pendaftaran</a></li>
    <li class="active">Baru</li>
</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Pendaftaran NONAME</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="">
                                            <form id="form_validation" method="post" action="{{url('noname')}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="col-md-5 col-md-offset-3 ">
                                                    <div class="form-group {{ $errors->has('noRm') ? 'has-error' : ''}}">
                                                        <label for="nama_q">Nomor Rekam Medis</label>
                                                        <input class="form-control" value="{{$noRM}}" readonly="" name="noRm" id="noRm" type="text" placeholder="Nomor Rekam Medis">
                                                        @if ($errors->has('noRm'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('noRm') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                    <label>Mr/Mrs</label>
                                                    <div class="form-group">
                                             
                                                        <input type="radio" name="noname" value="mr">
                                                        Mr
                                                 
                                                
                                                        <input type="radio" name="noname" value="mrs">
                                                        Mrs
                                                
                                                    </div>
                                                </div>
                                                   
                                                 </div>
                                            <div class="col-lg-6">
                                                
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
<!-- /.box -->


</div>
</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->

@endsection

@section('js')
<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script>
  $(function () {

    //Date picker
    $('#tanggal_lahir').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });
   //Date picker
   $('#tanggal_kunjungan').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
  });

});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="provinsi"]').on('change', function() {
            var propinsiID = $(this).val();
            if(propinsiID) {
                $.ajax({
                    url: 'pendaftaran-pasien/kota/'+propinsiID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);
                        $('select[name="kota"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kota"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kota"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kota"]').on('change', function() {
            var kotaID = $(this).val();
            if(kotaID) {
                $.ajax({
                    url: 'pendaftaran-pasien/kecamatan/'+kotaID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="kecamatan"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kecamatan"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kecamatan"]').on('change', function() {
            var kecamatanID = $(this).val();
            if(kecamatanID) {
                $.ajax({
                    url: 'pendaftaran-pasien/kelurahan/'+kecamatanID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // console.log(data);
                        

                        $('select[name="kelurahan"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kelurahan"]').empty();
            }
        });
    });
</script>



@endsection