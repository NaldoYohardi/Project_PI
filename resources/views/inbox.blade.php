@extends('layouts.app')

@section('title', 'Table')
@section('MainTitle', 'Table')

@section('content')
<ul class="breadcrumb">
  <li><a href="{{ url('/home')}}">Dashboard</a></li>
  <li>Table</li>
</ul>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Inbox List</h4>
      <p class="card-description">
        Message inbox
      </p>
      <?php if(Session::get('level')== 2){ ?>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Stok</th>
              <th>Category</th>
              <th>Harga_unit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $number = 0;
              $number1 = 0;
              foreach ($inbox as $key) {
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
                  <td align="center"><?php echo $number1+1; ?></td>
                  <?php $number1+=1; ?>
                  <td align="center"><?php echo implode("",$names[$i]); ?></td>
                  <td align="center"><?php echo implode("",$stoks[$i]); ?></td>
                  <?php foreach ($category as $key ) {
                    if ($key->id == implode("",$categorys[$i])){?>
                      <td align="center"><?php echo $key->category; ?></td>
                  <?php  }
                  } ?>
                  <td align="center"><?php echo implode("",$hargas[$i]); ?></td>
                  <td><center>
                    <a onclick="return confirm('Are you sure?');" href="/accpt/<?php echo $id ?>,<?php echo $i; ?>" class="btn btn-success">&#10003;</a>
                    <a onclick="return confirm('Are you sure?');" href="/decline/<?php echo $id ?>,<?php echo $i; ?>" class="btn btn-danger">&#10006;</a>
                  </center></td>
                </tr>
          <?php }}$number+=1;} ?>
          </tbody>
        </table>
      <?php } ?>

      <?php if(Session::get('level')== 0){ ?>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Stok</th>
              <th>Category</th>
              <th>Harga_unit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $number = 0;
              $number1 = 0;
              foreach ($inbox as $key) {
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
                  <td align="center"><?php echo $number1+1; ?></td>
                  <?php $number1+=1; ?>
                  <td align="center"><?php echo implode("",$names[$i]); ?></td>
                  <td align="center"><?php echo implode("",$stoks[$i]); ?></td>
                  <?php foreach ($category as $key ) {
                    if ($key->id == implode("",$categorys[$i])){?>
                      <td align="center"><?php echo $key->category; ?></td>
                  <?php  }
                  } ?>
                  <td align="center"><?php echo implode("",$hargas[$i]); ?></td>
                  <td><center><a onclick="return confirm('Are you sure?');" href="/done/<?php echo $id ?>,<?php echo $i; ?>" class="btn btn-success">&#10003;</a></center></td>
                </tr>
          <?php }}$number+=1;} ?>
          </tbody>
        </table>
      <?php } ?>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
@endsection
