<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDEX PENYAKIT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap.min.css')}}">
  <script src="{{url('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{url('/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>

<div class="container">


        @php
        $kode = App\ICD::find($penyakit);
        $nama = App\tbl_icd10nama::where('id_tblicd10',$kode->id)->first();
        @endphp
 
  <b><h4>INDEX PENYAKIT</h4></b> 
  <center><h4>DIAGNOSA : {{ $nama->nama }}</h4></center> 
  
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td style="text-align: center; font-size: 12px;" rowspan="2"><b>No Urut</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="2"><b>No RM</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="2"><b>Nama</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="2" ="2"><b>Alamat</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="2"><b>Tgl MRS - KRS</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>0-6hr</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>7-28hr</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>28-1th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>1-4th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>5-14th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>15-24th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>25-44th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b>45-64th</b></td>
        <td style="text-align: center; font-size: 10px;" colspan="2"><b> >65th</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="2"><b>Ruangan</b></td>
        <td style="text-align: center; font-size: 12px;" rowspan="2"><b>Diagnosis Utama/Nama Operasi</b></td>
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
      </tr>
        @forelse($ri as $key=> $data)
         @php
                $biday = new DateTime($data->tglLahir);
                $today = new DateTime();
                $diff = $today->diff($biday);
                  //bikin array baru
                  $jam = ($tahun = $diff->days * 24) + $diff->d; 
                  $tahun = $diff->y;
                
          @endphp
      <tr>
        <td style="text-align: center; font-size: 10px;">{{ $key+1 }}</td>
        <td style="text-align: center; font-size: 10px;">{{$data->noRm}}</td>
        <td style="text-align: center; font-size: 10px;">{{$data->namaPasien}}</td>
        <td style="text-align: center; font-size: 10px;">JL {{$data->dukuh}} RT.{{$data->rt}} RW.{{$data->rw}} {{$data->kabupaten}}, {{$data->provinsi}}</td>
        <td style="text-align: center; font-size: 10px;">{{ date('d F Y', strtotime($data->tanggal_masuk))}} - {{ date('d F Y', strtotime($data->tglKeluar))}}</td>
        
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
       
        <td style="text-align: center; font-size: 10px;">{{App\Ruangan\Kelas::find($data->kelas)->nama}}</td>
        <td style="text-align: center; font-size: 10px;">{{ $data->diagnosisUtama  }}/ {{ $data->operasiTindakan }}</td>
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
