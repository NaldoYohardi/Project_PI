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
        <div class="card" >
          <div class="card-body">
            <i class="icon-people icon-md"></i>
            <span class="card-title">&nbsp User List</span>
            <p class="card-description">
              List containing User accounts from Database
            </p>
            <div class="table-responsive border rounded p-1">
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
                      <td colspan="4" class="break text-center"><a href="{{ url('/table')}}" class="home-link">More...</a></td>
                    <?php break;} ?>
                  @endforeach
                </tbody>
              </table>
            </div>
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
    <?php } elseif(Session::get('level')== 0 || Session::get('level')== 2) { ?>
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
            <div class="table-responsive border rounded p-1">
              <table class="hover table table-bordered table-striped">
                <thead class="thead-dark font-weight-bold text-center">
                  <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Stock</th>
                  </tr>
                </thead>
                <tbody class="break" align="center">
                  <?php if ($inv_count == 0) { ?>
                    <td colspan="4" class="break text-center">No Data</td>
                  <?php } ?>
                  <?php $a = 0; ?>
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
                  <?php $a++;
                  if ($a == 3) { ?>
                    <td colspan="4" class="break text-center"><a href="{{ url('/table')}}" class="home-link">More...</a></td>
                  <?php break;} ?>
                  @endforeach
                </tbody>
              </table>
            </div>
            <br>
            <a href="{{ url('/table')}}" class="btn-sm font-weight-bold btn-primary w-50">Take action</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <?php if(Session::get('level')== 0 || Session::get('level')== 2){ ?>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">Inbox Messages</h4>
            </div>
            <div class="table-responsive border rounded p-1">
              <table class="hover table table-bordered table-striped">
                <?php if(Session::get('level')== 0){ ?>
                  <thead class="thead-dark font-weight-bold text-center">
                    <tr>
                      <th>ID</th>
                      <th>Item Name</th>
                      <th>Stock</th>
                      <th>Category</th>
                      <th>Unit Price</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody class="break" align="center">
                    <?php
                      $number = 0;
                      $number1 = 0;
                      foreach ($inbox as $key) {
                        $approve_id = $key->approval_id;
                        $keterangan = $key->keterangan;
                        $id = $key->id;
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
                        if(implode("",$status1[$i])=="2"){
                        ?>
                        <tr>
                          <td ><?php echo $number1+1; ?></td>
                          <?php $number1+=1; ?>
                          <td ><?php echo implode("",$names[$i]); ?></td>
                          <td ><?php echo implode("",$stoks[$i]); ?></td>
                          <?php foreach ($category as $key ) {
                            if ($key->id == implode("",$categorys[$i])){?>
                              <td ><?php echo $key->category; ?></td>
                          <?php  }
                          } ?>
                          <td >Rp.<?php echo implode("",$hargas[$i]); ?></td>
                          @if($keterangan == 0)
                          <td>Input New Item</td>
                          @elseif($keterangan == 1)
                          <td>Add Current Stock</td>
                          @elseif($keterangan == 2)
                          <td>Output Stock</td>
                          @endif
                          @foreach ($user as $key20)
                          @if($key20->user_id == $approve_id)
                            <td>{{$key20->name}}</td>
                          @endif
                          @endforeach
                        </tr>
                  <?php }}$number+=1;} ?>
                  </tbody>
                <?php } elseif(Session::get('level')== 2) { ?>
                  <thead class="thead-dark font-weight-bold text-center">
                    <tr>
                      <th>ID</th>
                      <th>Requested by</th>
                      <th>Item Name</th>
                      <th>Stock</th>
                      <th>Category</th>
                      <th>Unit Price</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody class="break" align="center">
                    <?php
                      $a = 1;
                      $number = 0;
                      $number1 = 0;
                      foreach ($inbox as $key) {
                        $req_id = $key->req_id;
                        $keterangan = $key->keterangan;
                        $id = $key->id;
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
                        if(implode("",$status1[$i])=="0"){
                        ?>
                        <tr>
                          <td ><?php echo $number1+1; ?></td>
                          <?php $number1+=1; ?>
                          @foreach($user as $key10)
                          @if($key10->user_id == $req_id)
                            @if($key10->level == 0)
                              <td bgcolor="lightgreen"><h5>{{$key10->name}}</h5></td>
                            @elseif($key10->level == 2)
                              <td bgcolor="lightblue"><h5>{{$key10->name}}</h5></td>
                            @endif
                          @endif
                          @endforeach
                          <td ><?php echo implode("",$names[$i]); ?></td>
                          <td ><?php echo implode("",$stoks[$i]); ?></td>
                          <?php foreach ($category as $key ) {
                            if ($key->id == implode("",$categorys[$i])){?>
                              <td ><?php echo $key->category; ?></td>
                          <?php  }
                          } ?>
                          <td class="fixbreak">Rp.<?php echo number_format(implode("",$hargas[$i])); ?></td>
                          @if($keterangan == 0)
                          <td>Input New Item</td>
                          @elseif($keterangan == 1)
                          <td>Add Current Stock</td>
                          @elseif($keterangan == 2)
                          <td>Output Stock</td>
                          @endif
                        </tr>
                  <?php }}$number+=1;} ?>
                  </tbody>
                <?php } ?>
              </table>
            </div>
            <br>
            <a href="{{ url('/inbox')}}" class="btn-sm font-weight-bold btn-primary w-50">View Details</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-sm-flex align-items-center mb-4">
              <h4 class="card-title mb-sm-0">Preview</h4>
              <a href="#" class="text-dark ml-auto mb-3 mb-sm-0">&nbsp;</a>
              <a href="{{ url('/history')}}" class="home-btn home-primary mb-3 mb-sm-0">
                <i class="icon-refresh menu-icon"></i> View history
              </a>
              <a href="#" class="text-dark ml-3 mb-3 mb-sm-0">&nbsp;</a>
              <a href="{{ url('/table')}}" class="home-btn home-primary mb-3 mb-sm-0">
                <i class="icon-folder-alt menu-icon"></i> View inventory
              </a>
            </div>
            <div class="table-responsive border rounded p-1">
              <table id="" class="hover table table-bordered table-striped">
                <thead class="thead-dark font-weight-bold text-center">
                  <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Details</th>
                    <th>Entry Created</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="break" align="center">
                  <?php
                    $number = 0;
                    $number1 = 0;
                    foreach ($inbox1 as $key) {
                      $keterangan = $key->keterangan;
                      $approval_id = $key->approval_id;
                      $id = $key->id;
                      $date = $key->date;
                        for ($i=0; $i<=$n; $i++) {
                          unset($names[$i]);
                          unset($stoks[$i]);
                          unset($hargas[$i]);
                          unset($categorys[$i]);
                          unset($status1[$i]);
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

                    for ($i=0, $j=0; $i<strlen($key->approval_id) ; $i++) {
                      if($key->approval_id[$i] == ',')
                      {
                        $j+=1;
                      }
                      if (ord($key->approval_id[$i]) >= 48 && ord($key->approval_id[$i]) <= 57)
                      {
                        $approval_ids[$j][$i] = $key->approval_id[$i];
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
                        <td class="fixbreak">Rp.<?php echo number_format(implode("",$hargas[$i])); ?></td>
                        @if($keterangan == 0)
                        <td>New Item</td>
                        @elseif($keterangan == 1)
                        <td>Add Stock</td>
                        @elseif($keterangan == 2)
                        <td>Output Stock</td>
                        @endif
                        <td class="fixbreak"><?php echo substr($date, 0, 10); ?></td>
                        <?php if(implode("", $status1[$i]) == 1){ ?>
                          <td><div class="a-badge badge-danger p-2">Declined</div></td>
                        <?php }elseif(implode("", $status1[$i]) == 2){ ?>
                          <td><div class="a-badge badge-success p-2">Accepted</div></td>
                        <?php }elseif(implode("", $status1[$i])== 3){?>
                          <td><div class="a-badge badge-success p-2">Accepted</div></td>
                        <?php }elseif(implode("", $status1[$i])== 0){?>
                          <td><div class="a-badge badge-warning p-2">Pending</div></td>
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
@endsection
