  @extends('layouts.app')

  @section('title', 'Profile')
  @section('MainTitle', 'Profile')

  @section('content')
  <div class="content" >
  <div class="container-fluid">
    <div class="row">
      <?php if(Session::get('level')== 0 || Session::get('level') == 2){ ?>
          <div class="col-md-6">
            <div class="card card-profile">
              <div class="card-avatar">
                <a href="javascript:;">
                  <img class="img" src="/laravel.PNG">
                </a>
              </div>
              <div class="card-body">
                @foreach ($user as $key)
                <h6 class="card-category text-gray">{{ $key->name }}</h6>
                <h4 class="card-title">{{ $key->email }}</h4>
                <a href="/edit/{{$key->user_id}}" class="btn btn-primary btn-round">Update Data<div class="ripple-container"></div></a>
                @endforeach
              </div>
            </div>
          </div>
      <?php } ?>

      <?php if(Session::get('level')==1){ ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">User Data</h4>
              <p class="card-category"> List of User data Table</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
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
                      <td class="text-primary">{{ $loop->iteration }}</td>
                      <td>{{ $key->name }}</td>
                      <td>{{ $key->email }}</td>
                      <td>{{ $key->level }}</td>
                      <td> <a href="/edit/{{$key->user_id}}">Edit</a> </td>
                      <td> <a href="/delete/{{$key->user_id}}">Delete</a> </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  </div>
  @endsection
