<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDEX KEMATIAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
  <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{url('/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>

<div class="container">


<h4>DATA KEADAAN MORBIDITAS PASIEN RAWAT INAP</h4>
<h5 style="text-align: right;">Tanggal : {{ $dari }} s.d {{ $sampai }}</h5> 
  
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td style="text-align: center; font-size: 12px;" rowspan="3"><b>No</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="3"><b>No. Daftar Terperinci</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="3"><b>Golongan Sebab Penyakit</b></td>
        <td style="text-align: center; font-size: 12px;" colspan="18" ="2"><b>Jumlah Pasien Hidup dan Mati menurut Golongan Umur dan Jenis Kelamin</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="2" colspan="2"><b>Pasien Keluar (Hidup&Mati) Menurut Jenis Kelamin </b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="3"><b>Jumlah Pasien Keluar (Hidup&Mati)</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="3"><b>Jumlah Pasien Keluar Mati</b></td>
        
      </tr>
      <tr>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>0-6hr</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>7-28hr</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>28-1th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>1-4th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>5-14th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>15-24th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>25-44th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>45-64th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b> >65th</b></td>
      </tr>
      <tr>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>L</b></td>
        <td style="text-align: center; font-size: 12px;"><b>P</b></td>
        <td style="text-align: center; font-size: 12px;"><b>LK</b></td>
        <td style="text-align: center; font-size: 12px;"><b>PR</b></td>
      </tr>
        @forelse($kematian as $key=> $data)
         @php
                $biday = new DateTime($data->tglLahir);
                $today = new DateTime();
                $diff = $today->diff($biday);
                  //bikin array baru
                  $jam = ($tahun = $diff->days * 24) + $diff->h; 
                  $tahun = $diff->y;
                
          @endphp
       @php
        $kode =App\ICD::where('kode',$data->kode)->first();
        $nama = App\tbl_icd10nama::where('id_tblicd10',$kode->id)->first();
      @endphp
      <tr>
        <td style="text-align: center; font-size: 10px;">{{ $key+1 }}</td>
        <td style="text-align: center; font-size: 10px;">{{$data->kode}}</td>
        <td style="text-align: center; font-size: 10px;">{{$nama->nama}}</td>
        <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        
        @if($data->jenisKelamin == "Laki-Laki" and $jam >=0 and $jam <=6)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
        @elseif($data->jenisKelamin == "Perempuan" and $jam >=0 and $jam <=6)
        <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        @else
        <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif
        
        @if($data->jenisKelamin == "Laki-Laki" and $jam >=7 and $jam <=28)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
        @elseif($data->jenisKelamin == "Perempuan" and $jam >=7 and $jam <=28)
        <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif

        @if($data->jenisKelamin == "Laki-Laki" and $jam >=28 and $tahun <=1)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
         @elseif($data->jenisKelamin == "Perempuan" and $jam >=28 and $tahun <=1)
         <td style="text-align: center; font-size: 10px;"></td>
         <td style="text-align: center; font-size: 10px;">&#10004;</td>
        @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif

          @if($data->jenisKelamin == "Laki-Laki" and $tahun >=1 and $tahun <=4)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
         @elseif($data->jenisKelamin == "Perempuan" and $tahun >=1 and $tahun <=4)
         <td style="text-align: center; font-size: 10px;"></td>
         <td style="text-align: center; font-size: 10px;">&#10004;</td>
        @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif
        
        @if($data->jenisKelamin == "Laki-Laki" and $tahun >=5 and $tahun <=14)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
        @elseif($data->jenisKelamin == "Perempuan" and $tahun >=5 and $tahun <=14)
       <td style="text-align: center; font-size: 10px;"></td>
         <td style="text-align: center; font-size: 10px;">&#10004;</td>
         @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif
        
         @if($data->jenisKelamin == "Laki-Laki" and $tahun >=15 and $tahun <=24)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
        @elseif($data->jenisKelamin == "Perempuan" and $tahun >=15 and $tahun <=24)
       <td style="text-align: center; font-size: 10px;"></td>
         <td style="text-align: center; font-size: 10px;">&#10004;</td>
         @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif

         @if($data->jenisKelamin == "Laki-Laki" and $tahun >=25 and $tahun <=44)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
        @elseif($data->jenisKelamin == "Perempuan" and $tahun >=25 and $tahun <=44)
      <td style="text-align: center; font-size: 10px;"></td>
         <td style="text-align: center; font-size: 10px;">&#10004;</td>
         @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif

         @if($data->jenisKelamin == "Laki-Laki" and $tahun >=45 and $tahun <=64)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
        @elseif($data->jenisKelamin == "Perempuan" and $tahun >=5 and $tahun <=14)
       <td style="text-align: center; font-size: 10px;"></td>
         <td style="text-align: center; font-size: 10px;">&#10004;</td>
         @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif

         @if($data->jenisKelamin == "Laki-Laki" and $tahun >= 64)
        <td style="text-align: center; font-size: 10px;">&#10004;</td>
        <td style="text-align: center; font-size: 10px;"></td>
        @elseif($data->jenisKelamin == "Perempuan" and $tahun >= 64)
       <td style="text-align: center; font-size: 10px;"></td>
         <td style="text-align: center; font-size: 10px;">&#10004;</td>
         @else
         <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
        @endif
       
        <td style="text-align: center; font-size: 10px;"></td>
        <td style="text-align: center; font-size: 10px;"></td>
      </tr>
      @empty
      <tr>
       <td colspan="25" style="text-align: center;">Tidak Ada Data yang di tampilkan</td>
      </tr>
    @endforelse
    </tbody>
  </table>
</div>

</body>
</html>
