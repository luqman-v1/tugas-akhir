  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
    {{-- <img src="{{url('/logo-mini.png')}}" class="logo"> --}}
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">RSKB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">RSKB</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('/foto/'.Auth::user()->foto)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('/foto/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  
                  <small>{{ Auth::user()->roles->first()->display_name }}</small>
                  
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/users/profile/'.Auth::user()->id)}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                   <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                          Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>
  </header>