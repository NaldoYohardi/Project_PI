@extends('layouts.app')

@section('title', 'Table')
@section('MainTitle', 'Table')

@section('content')
<ul class="breadcrumb">
  <li><a href="{{ url('/home')}}">Dashboard</a></li>
  <li>Table</li>
</ul>
<div class="col-lg-20 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Inventory List</h4>
      <p class="card-description">
        List containing Inventories from Database
      </p>
      <?php if(Session::get('level')== 2){ ?>
        <a href="/add" class="btn-sm font-weight-bold btn-success w-50">Tambah data</a>
        <br></br>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>User Request</th>
              <th>Name</th>
              <th>Stock</th>
              <th>Category</th>
              <th>Qr Code</th>
              <th>Harga unit</th>
              <th>User Approve</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($inbox as $key)
            <tr>
              <td align="center">{{ $loop->iteration }}</td>
              @foreach($user as $key1)
              @if($key1->user_id == $key->req_id)
              <td align="center">{{ $key1->email }}</td>
              @endif
              @endforeach
              <td align="center">{{ $key->name }}</td>
              <td align="center">{{ $key->stok }}</td>
              @foreach ($category as $key1)
              @if ($key1->id == $key->category_id)
              <td align="center">{{ $key1->category }}</td>
              @endif
              @endforeach
              <td align="center"><?php $a = $key->name; ?><center>
                <img src="data:image/png;base64,
                        {!! base64_encode(
                            QrCode::format('png')
                            ->merge(public_path('laravel.PNG'), 0.3, true)
                            ->size(100)
                            ->generate($a)
                            )
                            !!}
                            ">
                          </center></td>
              <td align="center">{{ $key->harga_unit }}</td>
              @if ($key->approval_id == NULL)
              <td align="center">enditywasita@gmail.com</td>
              @else
                @foreach($user as $key1)
                @if($key1->user_id == $key->approval_id)
                <td align="center">{{ $key1->email }}</td>
                @endif
                @endforeach
              @endif
              <td><center>
                <a href="/addstok/<?php echo $key->id; ?>" class="btn btn-success">Add</a><br>
                <a href="/outstok/<?php echo $key->id; ?>" class="btn btn-info">Out</a><br>
                <a href="/editInventory/<?php echo $key->id; ?>" class="btn btn-primary">edit</a><br>
                <a href="/deleteInventory/<?php echo $key->id; ?>" class="btn btn-danger" style="width:110px;">delete</a>
              </center></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      <?php } ?>
      <?php if(Session::get('level')== 0){ ?>
        <a href="/add" class="btn-sm font-weight-bold btn-success w-50">Tambah Request data</a>
        <br></br>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>User Request</th>
              <th>Name</th>
              <th>Stock</th>
              <th>Category</th>
              <th>Qr Code</th>
              <th>Harga unit</th>
              <th>User Approve</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($inbox as $key)
            <tr>
              <td align="center">{{ $loop->iteration }}</td>
              @foreach($user as $key1)
              @if($key1->user_id == $key->req_id)
              <td align="center">{{ $key1->email }}</td>
              @endif
              @endforeach
              <td align="center">{{ $key->name }}</td>
              <td align="center">{{ $key->stok }}</td>
              @foreach ($category as $key1)
              @if ($key1->id == $key->category_id)
              <td align="center">{{ $key1->category }}</td>
              @endif
              @endforeach
              <td align="center"><?php $a = $key->name; ?><center>
                <img src="data:image/png;base64,
                        {!! base64_encode(
                            QrCode::format('png')
                            ->merge(public_path('laravel.PNG'), 0.3, true)
                            ->size(100)
                            ->generate($a)
                            )
                            !!}
                            ">
                          </center></td>
              <td align="center">{{ $key->harga_unit }}</td>
              @if ($key->approval_id == NULL)
              <td align="center">-</td>
              @else
              <td align="center">{{ $key-> approval_id }}</td>
              @endif
              <td><center>
                <a href="/addstok/<?php echo $key->id; ?>" class="btn btn-success">Add</a><br>
                <a href="/outstok/<?php echo $key->id; ?>" class="btn btn-info">Out</a>
              </center></td>
            </tr>
            @endforeach
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
