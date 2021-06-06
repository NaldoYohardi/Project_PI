@extends('layouts.app')

@section('title', 'Inventory')
@section('MainTitle', 'Inventory')

@section('content')
<ul class="breadcrumb">
  <li><a href="{{ url('/home')}}">Dashboard</a></li>
  <li>Inventory</li>
</ul>
<div class="col-lg-20 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Inventory List</h4>
      <p class="card-description">
        List containing Inventories from Database
      </p>
      <?php if(Session::get('level')== 2){ ?>
        <a href="/add" class="btn-sm font-weight-bold btn-success w-50">Add Data</a>
        <br></br>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Item Name</th>
              <th>Stock</th>
              <th>Category</th>
              <th>QR</th>
              <th>Unit Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="break" align="center">
            @foreach ($inbox as $key)
            <tr>
              <td>{{ $loop->iteration }}</td>
              @foreach($user as $key1)
              @endforeach
              <td>{{ $key->name }}</td>
              <td>{{ $key->stok }}</td>
              @foreach ($category as $key1)
              @if ($key1->id == $key->category_id)
              <td>{{ $key1->category }}</td>
              @endif
              @endforeach
              <td><?php $a = $key->name; ?>
                <a href="data:image/png;base64, {!!
                            base64_encode(QrCode::format('png')
                            ->merge(public_path('laravel.PNG'), 0.3, true)
                            ->size(100)
                            ->generate($a))
                            !!}
                            ">
                <img src="data:image/png;base64, {!!
                            base64_encode(QrCode::format('png')
                            ->merge(public_path('laravel.PNG'), 0.3, true)
                            ->size(100)
                            ->generate($a))
                            !!}
                            "></a></td>
              <td class="fixbreak">Rp.{{ number_format($key->harga_unit) }}</td>
              <td class="fixbreak"><center>
                <a href="/addstok/<?php echo $key->id; ?>" class="inv-btn inv-success">Input</a><br>
                <a href="/outstok/<?php echo $key->id; ?>" class="inv-btn inv-info">Output</a><br>
                <a href="/editInventory/<?php echo $key->id; ?>" class="inv-btn inv-primary">Edit</a><br>
                <a href="/deleteInventory/<?php echo $key->id; ?>" class="inv-btn inv-danger" onclick="return confirm('Confirm Item Deletion?');">Delete</a>
              </center></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      <?php } ?>
      <?php if(Session::get('level')== 0){ ?>
        <a href="/add" class="btn-sm font-weight-bold btn-success w-50">Add Request</a>
        <br></br>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Item Name</th>
              <th>Stock</th>
              <th>Category</th>
              <th>QR</th>
              <th>Unit Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="break" align="center">
            @foreach ($inbox as $key)
            <tr>
              <td>{{ $loop->iteration }}</td>
              @foreach($user as $key1)
              @endforeach
              <td>{{ $key->name }}</td>
              <td>{{ $key->stok }}</td>
              @foreach ($category as $key1)
              @if ($key1->id == $key->category_id)
              <td>{{ $key1->category }}</td>
              @endif
              @endforeach
              <td><?php $a = $key->name; ?>
                <a href="data:image/png;base64, {!!
                            base64_encode(QrCode::format('png')
                            ->merge(public_path('laravel.PNG'), 0.3, true)
                            ->size(100)
                            ->generate($a))
                            !!}
                            ">
                <img src="data:image/png;base64, {!!
                            base64_encode(QrCode::format('png')
                            ->merge(public_path('laravel.PNG'), 0.3, true)
                            ->size(100)
                            ->generate($a))
                            !!}
                            "></a></td>
              <td class="fixbreak">Rp.{{ number_format($key->harga_unit) }}</td>
              <td class="fixbreak"><center>
                <a href="/addstok/<?php echo $key->id; ?>" class="inv-btn inv-success">Input</a><br>
                <a href="/outstok/<?php echo $key->id; ?>" class="inv-btn inv-info">Output</a>
              </center></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      <?php } ?>
    </div>
  </div>
</div>
@endsection
