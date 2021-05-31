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
      <h4 class="card-title">Inventory List</h4>
      <p class="card-description">
        List containing Inventories from Database
      </p>
      <?php if(Session::get('level')== 0){ ?>
        <a href="/add">Request Tambah data</a>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Stok</th>
              <th>Qr Code</th>
              <th>Category</th>
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
      <?php } elseif(Session::get('level')==2){ ?>
        <a href="/add">Tambah data</a>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Stok</th>
              <th>Qr Code</th>
              <th>Category</th>
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
