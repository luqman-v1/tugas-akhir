<!DOCTYPE html>
<html lang="en">
<head>
  <title>RL 5.3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
  <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{url('/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>

<div class="container">
<hr><width="100" height="75"></hr>
<div class="row">
<div class="col-md-4"></div>
  <div class="col-md-1">
  <img style="height: 80px;width: auto;margin-top: -10px;" src="{{url('/logos.png')}}">
  </div>
  <div class="col-md-4">
    <b><font size="5" face="Courier New">Formulir RL 5.3</font></b><br>
    <b><font size="4" face="Courier New">Daftar 10 Besar Penyakit Rawat Inap</font></b>
  </div>
</div>

<hr><width="100" height="75"></hr>

  <h4>Kode RS : 1234 </h4> 
  <h4>Nama RS : Rumah Sakit Khusus Bedah Ring Road Selatan</h4> 
  <h4>Bulan :  {{$month_name}} </h4> 
  <h4>Tahun :  {{$year}} </h4> 
  
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td style="text-align: center;" rowspan="2"><b>No Urut</b></td>
        <td style="text-align: center;" rowspan="2"><b>Kode ICD 10</b></td>
        <td style="text-align: center;" rowspan="2"><b>Deskripsi</b></td>
        <td style="text-align: center;" colspan="2"><b>Pasien Keluar Hidup Menurut Jenis Kelamin</b></td>
        <td style="text-align: center;" colspan="2"><b>Pasien Keluar Mati Menurut Jenis Kelamin</b></td>
        <td style="text-align: center;" rowspan="2"><b>Total (Hidup & Mati)</td>
      </tr>
      <tr>
        <td style="text-align: center;"><b>Laki-laki</b></td>
        <td style="text-align: center;"><b>Perempuan</b></td>
        <td style="text-align: center;"><b>Laki-laki</b></td>
        <td style="text-align: center;"><b>Perempuan</b></td>
      </tr>
      @php
        $i=1;
      @endphp
      @foreach($extR3 as $data)
      <tr>
        <td style="text-align: center;">{{$i}}</td>
        <td style="text-align: center;">{{$data->kode}}</td>
        <td style="text-align: center;">{{$data->aka}}</td>
        <td style="text-align: center;">{{$data->lakiHidup}}</td>
        <td style="text-align: center;">{{$data->PerempuanHidup}}</td>
        <td style="text-align: center;">{{$data->lakiMati}}</td>
        <td style="text-align: center;">{{$data->PerempuanMati}}</td>
        <td style="text-align: center;">{{$data->total}}</td>
      </tr>
        @php
        $i++;  
        @endphp

      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
