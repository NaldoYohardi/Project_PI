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
        <?php echo Session::get('email'); ?>
        <form action="/tambahData" method="post">
          @csrf
            <?php for ($i=0; $i <$n ; $i++) {?>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Data barang <?php echo $i+1; ?></h3>
                  <input type="hidden" name="user_id" value="<?php echo Session::get('user_id'); ?>">
                  <input type="hidden" name="n" value="<?php echo $n; ?>">
                  Nama <br>
                  <input class="form-control" type="text" name="name<?php echo $i; ?>"><br>
                  stok<br>
                  <input class="form-control" type="number" name="stok<?php echo $i; ?>"><br>
                  category<br>
                  <select name="category<?php echo $i; ?>">
                    @foreach($category as $key)
                    <option value="{{$key->id}}">{{$key->category}}</option>
                    @endforeach
                  </select><br>
                  Harga per Unit<br>
                  <input class="form-control" type="number" name="harga<?php echo $i; ?>"><br>
                  <br>
                </div>
              </div>
            </div>
            <?php  }?>
            <input type="submit" class="btn-sm font-weight-bold btn-primary" value="submit">
          </form>
@endsection
