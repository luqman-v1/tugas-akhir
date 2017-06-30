<!DOCTYPE html>
<html lang="en">
<head>
  <title>RL 5.4</title>
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
  
  <p style="text-align: center;"><img style="height: 80px;width: auto;margin-top: -10px;" src="{{url('/logos.png')}}"></p>
    <p  style="text-align: center;"><b><font size="5" face="Courier New">Formulir RL 5.4</font></b></p>
    <p  style="text-align: center;"><b><font size="4" face="Courier New">Daftar 10 Besar Penyakit Rawat Jalan</font></b></p>
  
</div>
<hr><width="100" height="75"></hr>

  <h4>Kode RS : 1234 </h4> 
  <h4>Nama RS : Rumah Sakit Khusus Bedah Ring Road </h4> 
  <h4>Bulan :  April </h4> 
  <h4>Tahun :  2017 </h4> 
  
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td style="text-align: center;" rowspan="2"><b>No Urut</b></td>
        <td style="text-align: center;" rowspan="2"><b>Kode ICD 10</b></td>
        <td style="text-align: center;" rowspan="2"><b>Deskripsi</b></td>
        {{-- <td style="text-align: center;" colspan="2"><b>Kasus Baru Menurut Jenis Kelamin</b></td> --}}
        {{-- <td style="text-align: center;" rowspan="2"><b>Jumlah Kasus Baru</b></td> --}}
        <td style="text-align: center;" rowspan="2"><b>Jumlah</td>
      </tr>
      <tr>
        {{-- <td style="text-align: center;"><b>Laki-laki</b></td> --}}
        {{-- <td style="text-align: center;"><b>Perempuan</b></td> --}}
      </tr>
      <tr>
      @forelse($extR4 as $key => $data)
       @php
        $kode =App\ICD::where('kode',$data->kode)->first();
        $nama = App\tbl_icd10nama::where('id_tblicd10',$kode->id)->first();
      @endphp
        <td style="text-align: center;">{{ $key+1 }}</td>
        <td style="text-align: center;">{{ $data->kode }}</td>
        <td style="text-align: center;">{{$nama->nama}}</td>
        {{-- <td style="text-align: center;">4</td> --}}
        {{-- <td style="text-align: center;">5</td> --}}
        {{-- <td style="text-align: center;">6</td> --}}
        <td style="text-align: center;">{{ $data->kunjungan }}</td>
      </tr>
      @empty
      <td style="text-align: center;" colspan="4">Data Tidak ditemukan</td>
      @endforelse
    </tbody>
  </table>
</div>

</body>
</html>
