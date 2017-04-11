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
        <li>
          <a href="pages/widgets.html">
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
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pelaporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('pelaporan/kodeicd')}}"><i class="fa fa-circle-o"></i> Kode ICD</a></li>
            <li><a href="{{url('/')}}"><i class="fa fa-circle-o"></i> Indeks</a></li>
            <li><a href="{{url('laporan/register')}}"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="{{url('/laporan/eksternal')}}"><i class="fa fa-circle-o"></i> Laporan Eksternal</a></li>
          </ul>
        </li>
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
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>