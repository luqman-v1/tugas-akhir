<!DOCTYPE html>
<html lang="en">
<head>
  <title>RL 5.1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
  <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{url('/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body >

<div class="container">
<hr><width="100" height="75"></hr>
<div class="row">
<div class="col-md-4"></div>
  <div class="col-md-1">
  <img style="height: 80px;width: auto;margin-top: -10px;" src="{{url('/logos.png')}}">
  </div>
  <div class="col-md-4">
    <b><font size="5" face="Courier New">Formulir RL 5.1</font></b><br>
    <b><font size="4" face="Courier New">PENGUNJUNG RUMAH SAKIT</font></b>
  </div>
</div>
<hr><width="100" height="75"></hr>

  <h4>Kode RS : 1234 </h4> 
  <h4>Nama RS : Rumah Sakit Khusus Bedah Ring Road Selatan</h4> 
  <h4>Bulan :  {{$month_name}} </h4> 
  <h4>Tahun :  {{$year}} </h4> 
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align: center;">NO</th>
        <th style="text-align: center;">JENIS KEGIATAN</th>
        <th style="text-align: center;">JUMLAH  </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: center;">1</td>
        <td style="text-align: center;">Pengunjung Baru</td>
        <td style="text-align: center;">{{$getPasienBaru}}</td>
      </tr>
      <tr>
        <td style="text-align: center;">2</td>
        <td style="text-align: center;">Pengunjung Lama</td>
        <td style="text-align: center;">{{$jumlah}}</td>
      </tr>
      
    </tbody>
  </table>

</div>
</body>
</html>
