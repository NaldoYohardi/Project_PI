@extends('layouts.app')

@section('title', 'Home')
@section('MainTitle', 'Home')

@section('content')

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
              <tbody class="break">
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
                if ($a == 3) { ?>
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
            <i class="icon-user icon-md"><span class="font-weight-bold page-title card-title mx-1">&nbsp Welcome!</span></i>
              <br><br>
              <div class="text-center pb-1" data-tilt>
                <img class="img-lg" src="/images/faces/Usu.jpg">
              </div>
              <div class="text-center">
                <h4 class="my-3">Hello, {{ Session::get('name') }} !</h4>
                <a href="/profile/{{ Session::get('email') }}"  class="btn-sm font-weight-bold btn-primary w-50">View your profile</a>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <i class="icon-folder-alt icon-md"><span class="font-weight-bold page-title card-title mx-1 m">&nbsp Inventory News</span></i>
            <br><br>
            <h4>You have <?php echo $inv_count ?> item low on stock!</h4>
              <table id="example" class="hover table table-bordered table-striped">
                <thead class="thead-dark font-weight-bold text-center">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                  </tr>
                </thead>
                <tbody class="break text-center">
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
    </div>
    <?php } ?>
  </div>
  <?php if(Session::get('level')== 0 || Session::get('level')== 2){ ?>  <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">Inventory History</h4>
              <a href="#" class="text-dark ml-auto mb-3 mb-sm-0">&nbsp;</a>
              <a href="{{ url('/history')}}" class="home-btn home-primary mb-3 mb-sm-0">
                <i class="icon-refresh menu-icon"></i> View history
              </a>
              <a href="#" class="text-dark ml-3 mb-3 mb-sm-0">&nbsp;</a>
              <a href="{{ url('/inventory')}}" class="home-btn home-primary mb-3 mb-sm-0">
                <i class="icon-folder-alt menu-icon"></i> View inventory
              </a>
            </div>
            <div class="table-responsive border rounded p-1">
              <table id="preview" class="hover table table-bordered table-striped">
                <thead class="thead-dark font-weight-bold text-center">
                  <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Harga Unit</th>
                    <th>Details</th>
                    <th>Entry Created</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="break" align="center">
                  <?php
                    $number = 0;
                    $number1 = 0;
                    foreach ($inbox as $key) {
                      $keterangan = $key->keterangan;
                      $approval_id = $key->approval_id;
                      $id = $key->id;
                      $date = $key->date;
                      if($number!=0)
                      {
                        for ($i=0; $i<=$n; $i++) {
                          unset($names[$i]);
                          unset($stoks[$i]);
                          unset($hargas[$i]);
                          unset($categorys[$i]);
                          unset($status1[$i]);
                        }
                      }
                    for ($i=0, $j=0; $i<strlen($key->name) ; $i++) {
                      if($key->name[$i] == ',')
                      {
                        $j+=1;
                      }
                      if ($key->name[$i] >= 'a' && $key->name[$i] <= 'z' || $key->name[$i] >= 'A' && $key->name[$i] <= 'Z' || ord($key->name[$i]) >= 48 && ord($key->name[$i]) <= 57)
                      {
                        $names[$j][$i] = $key->name[$i];
                      }
                    }

                    for ($i=0, $j=0; $i<strlen($key->stok) ; $i++) {
                      if($key->stok[$i] == ',')
                      {
                        $j+=1;
                      }
                      if (ord($key->stok[$i]) >= 48 && ord($key->stok[$i]) <= 57)
                      {
                        $stoks[$j][$i] = $key->stok[$i];
                      }
                    }

                    for ($i=0, $j=0; $i<strlen($key->category_id) ; $i++) {
                      if($key->category_id[$i] == ',')
                      {
                        $j+=1;
                      }
                      if (ord($key->category_id[$i]) >= 48 && ord($key->category_id[$i]) <= 57)
                      {
                        $categorys[$j][$i] = $key->category_id[$i];
                      }
                    }

                    for ($i=0, $j=0; $i<strlen($key->status) ; $i++) {
                      if($key->status[$i] == ',')
                      {
                        $j+=1;
                      }
                      if (ord($key->status[$i]) >= 48 && ord($key->status[$i]) <= 57)
                      {
                        $status1[$j][$i] = $key->status[$i];
                      }
                    }

                    for ($i=0, $j=0; $i<strlen($key->harga_unit) ; $i++) {
                      if($key->harga_unit[$i] == ',')
                      {
                        $j+=1;
                      }
                      if (ord($key->harga_unit[$i]) >= 48 && ord($key->harga_unit[$i]) <= 57)
                      {
                        $hargas[$j][$i] = $key->harga_unit[$i];
                      }
                    }
                    $n = $j;
                    for ($i=0; $i <=$j ; $i++) {
                      ?>
                      <tr>
                        <td><?php echo $number1+1; ?></td>
                        <?php $number1+=1; ?>
                        <td><?php echo implode("",$names[$i]); ?></td>
                        <td><?php echo implode("",$stoks[$i]); ?></td>
                        <?php foreach ($category as $key ) {
                          if ($key->id == implode("",$categorys[$i])){?>
                            <td><?php echo $key->category; ?></td>
                        <?php  }
                        } ?>
                        <td><?php echo implode("",$hargas[$i]); ?></td>
                        @if($keterangan == 0)
                        <td>Tambah Barang Baru</td>
                        @elseif($keterangan == 1)
                        <td>Tambah stok Barang</td>
                        @elseif($keterangan == 2)
                        <td>Pengeluaran barang</td>
                        @endif
                        <td><?php echo substr($date, 0, 10); ?></td>
                        <?php if(implode("", $status1[$i]) == 1){ ?>
                          <td><div class="badge badge-danger p-2">Declined</div></td>
                        <?php }elseif(implode("", $status1[$i]) == 2){ ?>
                          <td><div class="badge badge-success p-2">Accepted</div></td>
                        <?php }elseif(implode("", $status1[$i])== 3){?>
                          <td><div class="badge badge-success p-2">Accepted</div></td>
                        <?php }elseif(implode("", $status1[$i])== 0){?>
                          <td><div class="badge badge-warning p-2">Pending</div></td>
                        <?php  } ?>
                      </tr>
                <?php }$number+=1;} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <script>
    $(document).ready(function() {
      $('#preview').DataTable();
    } );
  </script>
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
