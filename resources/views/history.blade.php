@extends('layouts.app')

@section('title', 'History')
@section('MainTitle', 'History')

@section('content')
<head>
  <style media="screen">
    img{
      transition: transform .2s;
    }
    img:hover {
      transform: scale(3);
    }
  </style>
</head>
<ul class="breadcrumb">
  <li><a href="{{ url('/home')}}">Dashboard</a></li>
  <li>History</li>
</ul>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">History List</h4>
      <p class="card-description">
        List containing Import and Export History from Database
      </p>
      <?php if(Session::get('level')== 0){ ?>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Requested By</th>
              <th>Item Name</th>
              <th>Stock</th>
              <th>Qr</th>
              <th>Category</th>
              <th>Unit Price</th>
              <th>Details</th>
              <th>Checked By</th>
              <th>Entry Created</th>
              <th>Request Status</th>
            </tr>
          </thead>
          <tbody class="break" align="center">
            <?php
              $number = 0;
              $number1 = 0;
              foreach ($inbox as $key) {
                $keterangan = $key->keterangan;
                $approval_id = $key->approval_id;
                $req_id = $key->req_id;
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
                    unset($approval_ids[$i]);
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
                if(Session::get('user_id') == $req_id){
                ?>
                <tr>
                  <td><?php echo $number1+1; ?></td>
                  <?php $number1+=1; ?>
                  @foreach($user as $key10)
                  @if($key10->user_id == $req_id)
                    @if($key10->level == 0)
                      <td bgcolor="lightgreen"><b>{{$key10->name}}</b></td>
                    @elseif($key10->level == 2)
                      <td bgcolor="lightblue"><b>{{$key10->name}}</b></td>
                    @endif
                  @endif
                  @endforeach
                  <td><?php echo implode("",$names[$i]); ?></td>
                  <td><?php echo implode("",$stoks[$i]); ?></td>
                  <?php foreach($inventory as $inventory1){
                    if($inventory1->name == implode("",$names[$i]) && $keterangan == 2)
                    {?>
                      <td><img src="<?php echo $inventory1->qr; ?>"></td>
                  <?php  }}?>
                  <?php if($keterangan != 2){ ?>
                  <td>-</td>
                  <?php } ?>
                  <?php foreach ($category as $key ) {
                    if ($key->id == implode("",$categorys[$i])){?>
                      <td><?php echo $key->category; ?></td>
                  <?php  }} ?>
                  <td class="fixbreak">Rp.<?php echo implode("",$hargas[$i]); ?></td>
                  @if($keterangan == 0)
                  <td>New Item</td>
                  @elseif($keterangan == 1)
                  <td>Add Stock</td>
                  @elseif($keterangan == 2)
                  <td>Output Stock</td>
                  @endif
                  <?php if(implode("",$approval_ids[$i])=='0'){ ?>
                    <td bgcolor="lightyellow">-</td>
                  <?php } ?>
                  <?php foreach($user as $key10){
                    if(implode("",$approval_ids[$i])==$key10->user_id){
                    if ($key10->level == 0){?>
                      <td bgcolor="red"><h5><?php echo $key10->name; ?></h5></td>
                    <?php } ?>
                    <?php if ($key10->level == 2){ ?>
                      <td bgcolor="lightblue"><h5><?php echo $key10->name; ?></h5></td>
                    <?php } ?>
                    <?php }} ?>
                  <td class="fixbreak"><?php echo substr($date, 0, 10); ?></td>
                  <?php if(implode("", $status1[$i]) == 1){ ?>
                    <td><div class="badge badge-danger p-2 w-100">Declined</div></td>
                  <?php }elseif(implode("", $status1[$i]) == 2){ ?>
                    <td><div class="badge badge-success p-2 w-100">Accepted</div></td>
                  <?php }elseif(implode("", $status1[$i])== 3){?>
                    <td><div class="badge badge-success p-2 w-100">Accepted</div></td>
                  <?php }elseif(implode("", $status1[$i])== 0){?>
                    <td><div class="badge badge-warning p-2 w-100">Pending</div></td>
                  <?php  } ?>
                </tr>
          <?php }}$number+=1;} ?>
          </tbody>
        </table>
      <?php } ?>
      <?php if(Session::get('level')== 2){ ?>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Requested By</th>
              <th>Item Name</th>
              <th>Stock</th>
              <th>Qr</th>
              <th>Category</th>
              <th>Unit Price</th>
              <th>Details</th>
              <th>Checked By</th>
              <th>Entry Created</th>
              <th>Request Status</th>
            </tr>
          </thead>
          <tbody class="break" align="center">
            <?php
              $number = 0;
              $number1 = 0;
              foreach ($inbox as $key) {
                $keterangan = $key->keterangan;
                $approval_id = $key->approval_id;
                $req_id = $key->req_id;
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
                    unset($approval_ids[$i]);
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
                  @foreach($user as $key10)
                  @if($key10->user_id == $req_id)
                    @if($key10->level == 0)
                      <td bgcolor="lightgreen"><b>{{$key10->name}}</b></td>
                    @elseif($key10->level == 2)
                      <td bgcolor="lightblue"><b>{{$key10->name}}</b></td>
                    @endif
                  @endif
                  @endforeach
                  <td><?php echo implode("",$names[$i]); ?></td>
                  <td><?php echo implode("",$stoks[$i]); ?></td>
                  <?php foreach($inventory as $inventory1){
                    if($inventory1->name == implode("",$names[$i]) && $keterangan == 2)
                    {?>
                      <td><img src="<?php echo $inventory1->qr; ?>"></td>
                  <?php  }}?>
                  <?php if($keterangan != 2){ ?>
                  <td>-</td>
                  <?php } ?>
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
                  <?php if(implode("",$approval_ids[$i])=='0'){ ?>
                    <td bgcolor="lightyellow">-</td>
                  <?php } ?>
                  <?php foreach($user as $key10){
                    if(implode("",$approval_ids[$i])==$key10->user_id){
                    if ($key10->level == 0){?>
                      <td bgcolor="red"><h5><?php echo $key10->name; ?></h5></td>
                    <?php } ?>
                    <?php if ($key10->level == 2){ ?>
                      <td bgcolor="lightblue"><h5><?php echo $key10->name; ?></h5></td>
                    <?php } ?>
                    <?php }} ?>
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
      <?php } ?>
    </div>
  </div>
</div>
@endsection
