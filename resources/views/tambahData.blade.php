@extends('layouts.app')

@section('title', 'Add Item')
@section('MainTitle', 'Add Item')

@section('content')
  <ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Dashboard</a></li>
    <li><a href="{{ url('/table')}}">Inventory</a></li>
    <li><a href="{{ url('/add')}}">Request Amount</a></li>
    <li>Add Item</li>
  </ul>
  &nbsp; <?php echo Session::get('email'); ?>
  <br><br>
  <form action="/tambahData" method="post">
    @csrf
      <?php for ($i=0; $i <$n ; $i++) {?>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3>Data barang <?php echo $i+1; ?></h3>
            <input type="hidden" name="user_id" value="<?php echo Session::get('user_id'); ?>">
            <input type="hidden" name="n" value="<?php echo $n; ?>">
            <br>
            <ul>
              <p style="font-size:140%; font-family:Helvetica;">Nama</p>
              <input class="form-control" type="text" name="name<?php echo $i; ?>"><br>
              <p style="font-size:140%; font-family:Helvetica;">Stock</p>
              <input class="form-control" type="number" min="1" value="1" name="stok<?php echo $i; ?>"><br>
              <p style="font-size:140%; font-family:Helvetica;">Category</p>
              <select style="font-size:130%; font-family:Helvetica;" name="category<?php echo $i; ?>">
                @foreach($category as $key)
                <option value="{{$key->id}}">{{$key->category}}</option>
                @endforeach
              </select><br><br>
              <p style="font-size:140%; font-family:Helvetica;">Harga per Unit</p>
              <input class="form-control" type="number" min="0" step="1000" name="harga<?php echo $i; ?>">
            </ul>
          </div>
        </div>
      </div>
      <?php  }?>
      <div class="ripple-container">&nbsp; &nbsp; &nbsp;<input type="submit" class="btn-sm font-weight-bold btn-success" value="Submit"></div>
      <br>
  </form>
@endsection
