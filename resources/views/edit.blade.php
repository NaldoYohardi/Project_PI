  @extends('layouts.app')

  @section('title', 'Edit Profile')
  @section('MainTitle', 'Edit Profile')

  @section('content')
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card card-profile">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
              <?php if(Session::get('level')==0 || (Session::get('level')== 2)){ ?>
              <form action="/update/{{ $user->user_id }}" method="post">
                    @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" name="name"class="form-control" value="{{ $user->name }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                          </div>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
              </form>
              <?php } ?>
              <?php if(Session::get('level')==1){ ?>
              <form action="/update/{{ $user->user_id }}" method="post">
                    @csrf
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" name="name"class="form-control" value="{{ $user->name }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Email address</label>
                            <input type="number" name="level" class="form-control" value="{{ $user->level }}">
                          </div>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
              </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  @endsection
