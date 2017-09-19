<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
  <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{url('/bootstrap/js/bootstrap.min.js')}}"></script>
<style>
  th{
    text-align: center;
  }
  tr{
    font-size: 10px;
  }

</style>
</head>
<body>

<div class="container">
<hr><width="100" height="75"></hr>
<h1><center><b><font size="5" face="Courier New">Formulir RL 5.1</font></b></center></h1>
<center><b><font size="4" face="Courier New">PENGUNJUNG RUMAH SAKIT</font></b></center><br>

<hr><width="100" height="75"></hr>

  <h4>Kode RS : 1234 </h4> 
  <h4>Nama RS : Rumah Sakit Khusus Bedah Ring Road </h4> 
  <h4>Bulan :  April </h4> 
  <h4>Tahun :  2017 </h4> 
  
  <table class="table table-bordered">


    <tbody>
      <tr>
        <th rowspan="5">Kecamatan</th>
      </tr>

      <tr>
        @for($i=$a;$i<=$b;$i++)
        <th rowspan ="2" colspan="4">tanggal {{ $i }}</th>
        @endfor
      </tr>


     <tr></tr>
      
      <tr>
     @for($i=$a;$i<=$b;$i++)
          <th colspan ="2">BARU</th>
          <th colspan ="2">LAMA</th> 
       @endfor
      </tr>

      <tr>
       @for($i=$a;$i<=$b;$i++)
          <th style="color: red;" >L</th>
          <th style="color: blue;" >P</th>
          <th style="color: red;" >L</th>
          <th style="color: blue;" >P</th>
      @endfor
      </tr>

      @php
       $pasienBaru = $getPasienBaru; 
       $PasienRJ = $getPasienRJ; 
       $PasienRI = $getPasienRI; 
       $PasienIGD = $getPasienIGD;
       $hitungPBL = 0; 
       $hitungPBP = 0; 

       $hitungPLLJ = 0; 
       $hitungPLPJ = 0;


       $hitungPLLI = 0; 
       $hitungPLPI = 0;


       $hitungPLLG = 0; 
       $hitungPLPG = 0;

       $jmlL=0;
       $jmlP=0;

      @endphp


      {{-- isi data --}}
       @foreach($getKecamatan as $data)
      <tr>
        <th>{{ $data->name }}</th>
           @for($i=$a;$i<=$b;$i++)
           @php
               $dateValue = strtotime($getPasienBaru[$i]['tglMasuk']);                     
 
            $x = date("d", $dateValue); 
           $q= str_replace("0","",$x); 
           @endphp
          {{-- baru lk --}}
          @if($q == $i)
          
          @if($getPasienBaru[$i]['kecamatan'] == $data->name && $getPasienBaru[$i]['jenisKelamin'] == "Laki-Laki" )
          <th style="color: red;">{{ $hitungPBL+=1 }} {{ $i }} {{ $x }} {{ $getPasienBaru[$i]['tglMasuk'] }}</th>
          @else
          <th>0</th>
          @endif
          @else 
          <th>{{ $q }} {{ $i }}</th>
          
          @endif
          
          {{-- baru pr --}}
          @if($q==$i)
          @if($getPasienBaru[$i]['kecamatan'] == $data->name && $getPasienBaru[$i]['jenisKelamin'] == "Perempuan" && $q == $i)
          <th style="color: red;">{{ $hitungPBP+=1 }} {{ $i }}</th>
          @else
          <th>0</th>
          @endif
          @else 
          <th>0</th>
          
          @endif
          {{-- lama lk --}}
          
          <th></th>
          {{-- lama pr --}}
          <th></th>
          @endfor
      </tr>
    @endforeach

    </tbody>
   
  </table>
</div>

</body>
</html>
