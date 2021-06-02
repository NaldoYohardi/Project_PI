  @extends('layouts.app')

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
                        <?php if(Session::get('level')== 1){ ?>
                          <p class="designation">Administrator</p>
                        <?php } elseif(Session::get('level')== 0){ ?>
                          <p class="designation">Employee</p>
                        <?php } elseif(Session::get('level')== 2){ ?>
                          <p class="designation">Manager</p>
                        <?php } ?>
                        <center>
                        <br>
                        <a href="/edit/{{$key->user_id}}" class="btn btn-primary btn-round w-100"><div class="ripple-container">Update Data</div></a>
                        <br></br>
                        <a href="/logOUT" onclick="return confirm('Are you sure you want to Sign Out?');" class="btn btn-danger btn-round w-100"><div class="ripple-container">Logout</div></a>
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
            <a href="/register" class="btn-sm font-weight-bold btn-success w-50">Register New User</a>
            <br></br>
            <table id="example" class="hover table table-bordered table-striped">
              <thead class="thead-dark font-weight-bold text-center">
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Account Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="break" align="center">
                @foreach ($user1 as $key)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->email }}</td>
                    <td>{{ $key->level }}</td>
                    <td><center>
                      <a href="/edit/{{$key->user_id}}" class="btn-sm font-weight-bold btn-warning w-50">Edit</a>
                      &nbsp; &nbsp;
                      <a href="/delete/{{$key->user_id}}" class="btn-sm font-weight-bold btn-danger w-50">Delete</a>
                    </center></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- <table class="hover" id="datatables">
              <thead class="thead-dark font-weight-bold text-center">
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th class="w-10">Account Level</th>
                  <th colspan="2" class="w-10">Action</th>
                </tr>
              </thead>
              <tbody class="table-borderless text-center">
                @foreach ($user1 as $key)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->email }}</td>
                    <td>{{ $key->level }}</td>
                    <td> <a href="/edit/{{$key->user_id}}" class="btn-sm font-weight-bold btn-warning w-50">Edit</a> </td>
                    <td> <a href="/delete/{{$key->user_id}}" class="btn-sm font-weight-bold btn-danger w-50">Delete</a> </td>
                  </tr>
                @endforeach
              </tbody>
            </table> -->
          </div>
        </div>
      </div>
    <?php } ?>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
  @endsection
