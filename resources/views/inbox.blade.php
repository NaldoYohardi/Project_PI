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
      <?php if(Session::get('level')== 0){ ?>
        <a href="/add">Request Tambah data</a>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Stok</th>
              <th>Category</th>
              <th>Harga_unit</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if($inbox1 != NULL)
            <?php
              foreach ($inbox1 as $key) {
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

              }
              for ($i=0; $i <=$j ; $i++) {
                echo implode("",$names[$i]);
                echo implode("",$stoks[$i]);
                echo implode("",$categorys[$i]);
                echo implode("",$hargas[$i]);?>
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $names[$i] }}</td>
                  <td>{{ $stoks[$i] }}</td>
                  @foreach ($category as $key)
                  @if ($key->id == $categorys[$i])
                  <td>{{ $key->category }}</td>
                  @endif
                  @endforeach
                  <td>{{ $hargas[$i] }}</td>
                  <td> <a href="#" class="btn-sm font-weight-bold btn-warning w-50">Edit</a> </td>
                  <td> <a href="#" class="btn-sm font-weight-bold btn-danger w-50">Delete</a> </td>
                </tr>
            <?php }    ?>
            @endforeach
            @endif
          </tbody>
        </table>
      <?php } elseif(Session::get('level')==2){ ?>
        <a href="/add">Tambah data</a>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Stok</th>
              <th>Qr Code</th>
              <th>Harga_unit</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @if($inventory != NULL)
            @foreach($inventory as $key)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $key->name }}</td>
              <td>{{ $key->stok }}</td>
              <td>{{ $key->qr_code }}</td>
              <td>{{ $key->harga_unit }}</td>
              <td> <a href="#" class="btn-sm font-weight-bold btn-warning w-50">Edit</a> </td>
              <td> <a href="#" class="btn-sm font-weight-bold btn-danger w-50">Delete</a> </td>
            </tr>
            @endforeach
            @endif
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
