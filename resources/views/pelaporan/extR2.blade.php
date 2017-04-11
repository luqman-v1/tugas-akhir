<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
  <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{url('/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>

<div class="container">
<hr><width="100" height="75"></hr>
<h1><center><b><font size="5" face="Courier New">Formulir RL 5.2</font></b></center></h1>
<center><b><font size="4" face="Courier New">KUNJUNGAN RAWAT JALAN</font></b></center><br>

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
        <th style="text-align: center;">JUMLAH</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: center;">1</td>
        <td style="text-align: center;">Bedah Umum</td>
        <td style="text-align: center;">{{$bedahUmum}}</td>
      </tr>
      <tr>
        <td style="text-align: center;">2</td>
        <td style="text-align: center;">Bedah Saluran Cerna (Digestive)</td>
        <td style="text-align: center;">{{$Digestive}}</td>
      </tr>
      <tr>
        <td style="text-align: center;">3</td>
        <td style="text-align: center;">Bedah Throraks</td>
        <td style="text-align: center;">{{$BedahThroraks}}</td>
      </tr>
      <tr>
        <td style="text-align: center;">4</td>
        <td style="text-align: center;">Bedah Tulang dan Sendi (Orthopedi)</td>
        <td style="text-align: center;">{{$Orthopedi}}</td>
      </tr>
      <tr>
        <td style="text-align: center;">5</td>
        <td style="text-align: center;">Bedah Saluran Kencing (Urologi)</td>
        <td style="text-align: center;">{{$Urologi}}</td>
      </tr>
      <tr>
        <td style="text-align: center;">6</td>
        <td style="text-align: center;">Bedah Plastik dan Estetik</td>
        <td style="text-align: center;">{{$BedahPlastik}}</td>
      </tr>
      
    </tbody>
  </table>
</div>

</body>
</html>
