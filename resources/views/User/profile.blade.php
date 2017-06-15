@extends('layouts.index')
@section('title') Profile @endsection
@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{url('foto/'.auth::user()->foto)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$detailProf->name}}</h3>
              	
                  
              <p class="text-muted text-center">{{ Auth::user()->roles->first()->display_name }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username : </b> {{auth::user()->username}} 
                </li>
                <li class="list-group-item">
                  <b>Nama : </b> {{auth::user()->name}}
                </li>
                <li class="list-group-item">
                  <b>Email : </b> {{auth::user()->email}}
                </li>
                <li class="list-group-item">
                  <b>No HP : </b> {{auth::user()->noHp}}
                </li>
              </ul>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

     
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#settings" data-toggle="tab">Ubah Profil</a></li>
               <li><a href="#timeline" data-toggle="tab">Ubah Password</a></li>
            </ul>
            <div class="tab-content">
            
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <form class="form-horizontal" method="post" action="{{url('/users/profile/'.auth::user()->id.'/password')}}" enctype="multipart/form-data" files="true">
                 {{ csrf_field() }}
             

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">password</label>

                    <div class="col-sm-10">
                      <input type="password" value="" name="password" class="form-control" id="inputEmail" placeholder="password">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Confirm Password</label>

                    <div class="col-sm-10">
                      <input class="form-control" type="password" name="password_confirmation" id="inputExperience" placeholder="Confirm Password">
                    </div>
                  </div>

              
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="settings">
           <form class="form-horizontal" method="post" action="{{url('/users/profile/'.auth::user()->id)}}" enctype="multipart/form-data" files="true">
                 {{ csrf_field() }}
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{auth::user()->username}}" readonly="" name="username" class="form-control" id="inputName" placeholder="Username">
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" value="{{auth::user()->name}}" name="name" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" value="{{auth::user()->email}}" name="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">No Hp</label>

                    <div class="col-sm-10">
                      <input class="form-control" value="{{auth::user()->noHp}}" type="number" name="noHp" id="inputExperience" placeholder="noHp">
                    </div>
                  </div>

                   <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 control-label">Upload foto</label>
                    <div class="col-sm-10">
                  <input type="file" name="foto" id="exampleInputFile">
                   <p class="help-block">pilih poto</p>
                  </div>
                 
                </div>
              
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection