<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <br>
      
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/foto/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::User()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <br>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{url('/')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Profil Pelayanan</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/jadwal-pelayanan')}}"><i class="fa fa-circle-o"></i> Jadwal Pelayanan</a></li>
            <li><a href="{{url('/dokter-spesialis')}}"><i class="fa fa-circle-o"></i> Daftar Dokter Spesialis</a></li>
            <li><a href="{{url('dokter-jaga')}}"><i class="fa fa-circle-o"></i> Daftar Dokter Jaga</a></li>
            <li><a href="{{url('jaminan-kesehatan')}}"><i class="fa fa-circle-o"></i> Daftar Jaminan Kesehatan</a></li>
            <li><a href="{{url('stok-formulir')}}"><i class="fa fa-circle-o"></i> Stok Formulir Rekam medis</a></li>
          </ul>
        </li>
         @role(['admin','rekmed'])
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pendaftaran Pasien</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/pendaftaran-pasien')}}"><i class="fa fa-circle-o"></i> Pendaftaran Pasien Baru</a></li>
            <li><a href="{{url('/rawat-jalan')}}"><i class="fa fa-circle-o"></i> Pendaftaran Rawat Jalan</a></li>
            <li><a href="{{url('rawat-inap')}}"><i class="fa fa-circle-o"></i> Rawat Inap</a></li>
            <li><a href="{{url('igd')}}"><i class="fa fa-circle-o"></i> IGD</a></li>
            <li><a href="{{url('cari-pasien')}}"><i class="fa fa-circle-o"></i> Cari Pasien</a></li>
          </ul>
        </li>
        @endrole

        @role(['admin','dokter','rekmed','perawat'])
        <li>
          <a href="">
            <i class="fa fa-files-o"></i> <span>Pelayanan</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/lrj')}}"><i class="fa fa-circle-o"></i> Lembar Rawat Jalan</a></li>
            <li><a href="{{url('/rmk')}}"><i class="fa fa-circle-o"></i> Ringkasan Masuk Keluar</a></li>
            <li><a href="{{url('/pelayanan-igd')}}"><i class="fa fa-circle-o"></i> Lembar Gawat Darurat</a></li>
          </ul>
        </li>
        @endrole
{{--         @role(['admin','rekmed','perawat'])
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Informasi Bangsal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> Data Bangsal</a></li>
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> Cari Kamar Kosong</a></li>
          </ul>
        </li>
        @endrole --}}

        @role(['admin','rekmed'])
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pelaporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/laporan/eksternal')}}"><i class="fa fa-circle-o"></i> Laporan Eksternal</a></li>
            <li><a href="{{url('laporan/register')}}"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="{{url('pelaporan/kodeicd9')}}"><i class="fa fa-circle-o"></i> Kode ICD 9</a></li>
            <li><a href="{{url('pelaporan/kodeicd10')}}"><i class="fa fa-circle-o"></i> Kode ICD 10</a></li>
          </ul>
        </li>
        @endrole

        @role(['admin','rekmed'])
        <li class="treeview">
          <a href="{{url('/index')}}">
            <i class="fa fa-files-o"></i>
            <span>Index</span>
          </a>
        </li>
        @endrole
{{-- 
        @role(['admin','farmasi','rekmed'])
        <li class="treeview">
          <a href="#">
             <i class="fa fa-files-o"></i> <span>Farmasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> unknown</a></li>
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> unknown</a></li>
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> unknown</a></li>
          </ul>
        </li>
        @endrole

        @role(['admin','kasir','rekmed'])
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i><span>Kasir</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> unknown</a></li>
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> unknown</a></li>
          </ul>
        </li>
        @endrole --}}

        @role(['admin'])
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i><span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/user/list')}}"><i class="fa fa-circle-o"></i> Daftar User</a></li>
          </ul>
        </li>
        @endrole
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>