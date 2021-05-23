  @extends('layouts.app')

  @section('title', 'Profile')
  @section('MainTitle', 'Profile')

  @section('content')
  <?php if(Session::get('level')== 0 || Session::get('level') == 2){ ?>
    <div class="content" >
    <div class="container-fluid">
      <div class="row">
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
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if(Session::get('level')==1){ ?>
    @foreach ($user1 as $key)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $key->name }}</td>
      <td>{{ $key->email }}</td>
      <td>{{ $key->level }}</td>
      <td> <a href="/edit/{{$key->user_id}}">edit</a> </td>
      <td> <a href="/delete/{{$key->user_id}}">delete</a> </td>
    </tr>
    @endforeach
  </table>
  <?php } ?>
  @endsection

  @section('test')
  <?php if(Session::get('level')== 1){ ?>
  <table>
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Email</td>
      <td>level</td>
      <td>aksi</td>
    </tr>
  <?php } ?>
  <?php if(Session::get('level')== 0 || Session::get('level') == 2){ ?>
  <table>
    @foreach ($user as $key)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $key->name }}</td>
      <td>{{ $key->email }}</td>
      <td> <a href="/edit/{{$key->user_id}}">edit</a> </td>
    </tr>
    @endforeach
  </table>
  <?php } ?>

  <?php if(Session::get('level')==1){ ?>
    @foreach ($user1 as $key)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $key->name }}</td>
      <td>{{ $key->email }}</td>
      <td>{{ $key->level }}</td>
      <td> <a href="/edit/{{$key->user_id}}">edit</a> </td>
      <td> <a href="/delete/{{$key->user_id}}">delete</a> </td>
    </tr>
    @endforeach
  </table>
  <?php } ?>
  @endsection

  @section('Edit')
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Profile</h4>
        <p class="card-category">Complete your profile</p>
      </div>
      <div class="card-body">
        <form>
          <div class="row">
            <div class="col-md-5">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Company (disabled)</label>
                <input type="text" class="form-control" disabled="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Username</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Email address</label>
                <input type="email" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Fist Name</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Last Name</label>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Adress</label>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">City</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Country</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Postal Code</label>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>About Me</label>
                <div class="form-group bmd-form-group">
                  <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                  <textarea class="form-control" rows="5"></textarea>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
  @endsection
