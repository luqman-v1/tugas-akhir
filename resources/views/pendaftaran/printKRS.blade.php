<!DOCTYPE html>
<html>
<head>
  <title></title>
 
</head>
<body>

  <div id="container">
  <div class="row">
<div class="col-md-4"></div>
  <div class="col-md-1">
  <center><img style="height: 80px;width: auto;margin-top: -10px;" src="{{url('/logos.png')}}"></center>
  </div>
  <center><div class="col-md-4">
    <b><p style="font-size: 10px;">Rumah Sakit Khusus Bedah Ring Road Selatan</p></b>
    <p style="font-size: 8px;">Jl. Ringroad Selatan, Panggungharjo, Sewon, Bantul, Daerah Istimewa Yogyakarta</p> 
  </div></center>
</div class="col-md-4">
   <center><p style="font-size: 12px;text-align: center; ">Kartu Identitas Berobat</p></center>
   <center><p style="font-size: 10px;text-align: justify;">No : {{ $pasien->noRm }}</p></center>
   <center><p style="font-size: 10px;text-align: justify;">Nama : {{ $pasien->nama }}</p></center>
   <center><p style="font-size: 10px;text-align: justify;">Alamat : JL {{$pasien->dukuh}} RT.{{$pasien->rt}} RW.{{$pasien->rw}} {{$pasien->kabupaten}}, {{$pasien->provinsi}}</p></center>
</div>

</body>
</html>