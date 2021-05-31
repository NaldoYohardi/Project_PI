@extends('layouts.app')

@section('title', 'Add Item')
@section('MainTitle', 'Add Item')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <?php echo Session::get('email'); ?>
      <form action="/tambahData" method="post">
        @csrf
        <?php for ($i=0; $i <$n ; $i++) {?>
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
        <?php  }?>
        <input type="submit" value="submit">
      </form>
    </div>
  </div>
</div>
@endsection
