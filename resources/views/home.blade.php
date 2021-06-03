@extends('layouts.app')

@section('title', 'Home')
@section('MainTitle', 'Home')

@section('content')

<?php $category = DB::select("SELECT * FROM category"); ?>
<?php $inv_view = DB::table('inventory')->WHERE('stok', '<', '5')->get(); ?>
<?php $inv_count = DB::table('inventory')->WHERE('stok', '<', '5')->count(); ?>
<?php $emp_count = DB::table('users')->WHERE('level', '0')->count(); ?>
<?php $adm_count = DB::table('users')->WHERE('level', '1')->count(); ?>
<?php $mngr_count = DB::table('users')->WHERE('level', '2')->count(); ?>

<ul class="breadcrumb">
  <li>Dashboard</li>
</ul>
  <div class="row">
    <?php if(Session::get('level')== 1){ ?>
      <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <i class="icon-people icon-md"></i>
            <span class="card-title">&nbsp User List</span>
            <p class="card-description">
              List containing User accounts from Database
            </p>
            <table class="hover table table-bordered table-striped">
              <thead class="thead-dark font-weight-bold text-center">
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Account Level</th>
                </tr>
              </thead>
              <tbody class="break" align="center">
                <?php $a = 0; ?>
                @foreach ($user as $key)
                  <tr>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->email }}</td>
                    <td>
                      <?php if ($key->level == 0) { ?>Employee
                      <?php } elseif($key->level == 1){ ?>Administrator
                      <?php } elseif($key->level == 2){ ?>Manager
                      <?php } else { ?>-<?php } ?>
                    </td>
                  </tr>
                <?php $a++;
                if ($a == 4) { ?>
                  <td>...</td>
                  <td>...</td>
                  <td>...</td>
                <?php break;} ?>
                @endforeach
              </tbody>
            </table>
            <br>
            <a href="/register" class="btn-sm font-weight-bold btn-primary w-50">Take Action</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <i class="icon-user icon-md"></i>
            <span class="card-title">&nbsp Total Account in Site</span>
            <br><br>
            <h4>Missing anyone?</h4>
              <ul>
                <li>There are <?php echo $mngr_count ?> Manager</li>
                <li>There are <?php echo $adm_count ?> Administrator</li>
                <li>There are <?php echo $emp_count ?> Employee</li>
              </ul>
            <br>
            <a href="/profile/{{ Session::get('email') }}"  class="btn-sm font-weight-bold btn-primary w-50">View details</a>
          </div>
        </div>
      </div>
    <?php } elseif(Session::get('level')== 0 || Session::get('level')== 2){ ?>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <i class="icon-user icon-md">&nbsp;Welcome!</i>
              <br><br>
              <div class="dash-logo" align="center" data-tilt>
                <img src="/images/faces/Usu.jpg">
              </div>
              <h4>Hello, {{ Session::get('name') }}</h4>
              <a href="/profile/{{ Session::get('email') }}"  class="btn-sm font-weight-bold btn-primary w-50">View your profile</a>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <i class="icon-folder-alt icon-md">&nbsp;Inventory News</i>
            <br><br>
            <h4>There are now <?php echo $inv_count ?> items running low in stocks!</h4>
              <table id="example" class="hover table table-bordered table-striped">
                <thead class="thead-dark font-weight-bold text-center">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                  </tr>
                </thead>
                <tbody class="break" align="center">
                  @foreach ($inv_view as $key)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $key->name }}</td>
                    @foreach ($category as $key1)
                    @if ($key1->id == $key->category_id)
                    <td>{{ $key1->category }}</td>
                    @endif
                    @endforeach
                    <td>{{ $key->stok }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>
            <a href="{{ url('/table')}}" class="btn-sm font-weight-bold btn-primary w-50">Take action</a>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <h4 class="card-title mb-sm-0">Products Inventory</h4>
            <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
          </div>
          <div class="table-responsive border rounded p-1">
            <table class="table">
              <thead>
                <tr>
                  <th class="font-weight-bold">Store ID</th>
                  <th class="font-weight-bold">Amount</th>
                  <th class="font-weight-bold">Gateway</th>
                  <th class="font-weight-bold">Created at</th>
                  <th class="font-weight-bold">Paid at</th>
                  <th class="font-weight-bold">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face1.jpg" alt="profile image"> Katie Holmes
                  </td>
                  <td>$3621</td>
                  <td><img src="images/dashboard/alipay.png" alt="alipay" class="gateway-icon mr-2"> alipay</td>
                  <td>04 Jun 2019</td>
                  <td>18 Jul 2019</td>
                  <td>
                    <div class="badge badge-success p-2">Paid</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face2.jpg" alt="profile image"> Minnie Copeland
                  </td>
                  <td>$6245</td>
                  <td><img src="images/dashboard/paypal.png" alt="alipay" class="gateway-icon mr-2"> Paypal</td>
                  <td>25 Sep 2019</td>
                  <td>07 Oct 2019</td>
                  <td>
                    <div class="badge badge-danger p-2">Pending</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face3.jpg" alt="profile image"> Rodney Sims
                  </td>
                  <td>$9265</td>
                  <td><img src="images/dashboard/alipay.png" alt="alipay" class="gateway-icon mr-2"> alipay</td>
                  <td>12 dec 2019</td>
                  <td>26 Aug 2019</td>
                  <td>
                    <div class="badge badge-warning p-2">Failed</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img class="img-sm rounded-circle" src="images/faces/face4.jpg" alt="profile image"> Carolyn Barker
                  </td>
                  <td>$2263</td>
                  <td><img src="images/dashboard/alipay.png" alt="alipay" class="gateway-icon mr-2"> alipay</td>
                  <td>30 Sep 2019</td>
                  <td>20 Oct 2019</td>
                  <td>
                    <div class="badge badge-success p-2">Paid</div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex mt-4 flex-wrap">
            <p class="text-muted">Showing 1 to 10 of 57 entries</p>
            <nav class="ml-auto">
              <ul class="pagination separated pagination-info">
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content_data')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
        </div>
    </div>
</div>
@endsection
