  @extends('layouts.appProfile')

  @section('title', 'Profile')
  @section('MainTitle', 'Profile')

  @section('content')
  <ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Dashboard</a></li>
    <li>Profiles</li>
  </ul>
    <?php if(Session::get('level')== 0 || Session::get('level') == 2){ ?>
      <div class="container-scroller">
        <div class="container-fluid full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                  <div class="brand-logo js-tilt" align="center" data-tilt>
                    <img src="/laravel.PNG">
                  </div>
                  <div class="form-group">
                    <div class="pt-3">
                      @foreach ($user as $key)
                        <h6 class="font-weight-light">{{ $key->name }}</h6>
                        <h4>{{ $key->email }}</h4>
                        <center>
                        <a href="/edit/{{$key->user_id}}" class="btn btn-primary btn-round">Update Data<div class="ripple-container"></div></a>
                        <br></br>
                        <a href="/logOUT" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-round">Logout<div class="ripple-container"></div></a>
                        </center>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } elseif(Session::get('level')==1){ ?>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">User List</h4>
            <p class="card-description">
              List containing User accounts from Database
            </p>
            <table class="table table-bordered table-striped">
              <thead align="center">
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Account Level</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user1 as $key)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->email }}</td>
                    <td>{{ $key->level }}</td>
                    <td align="center"> <a href="/edit/{{$key->user_id}}" class="btn-sm font-weight-bold btn-warning">Edit</a> </td>
                    <td align="center"> <a href="/delete/{{$key->user_id}}" class="btn-sm font-weight-bold btn-danger">Delete</a> </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php } ?>
  @endsection
