@extends('layouts.app')

@section('title', 'Edit Stock Data')
@section('MainTitle', 'Edit Stock Data')

@section('content')
  <ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Dashboard</a></li>
    <li><a href="{{ url('/table')}}">Inventory</a></li>
    <li>Edit Stock Data</li>
  </ul>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h3>Data Item</h3>
        <form action="/updateInventory" method="post">
          @csrf
          @foreach($inventory as $key)
          <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>"><br>
          <p style="font-size:120%;">Item Name</p>
          <input class="form-control" type="text" name="name" value="{{ $key->name }}" required><br>
          &nbsp;
          <p style="font-size:120%;">Category</p>
          <select class="form-control" style="font-size:120%;" name="category">
            @foreach($category as $key1)
            <option value="{{$key1->id}}">{{$key1->category}}</option>
            @endforeach
          </select><br><br>
          &nbsp;
          <p style="font-size:120%;">Harga per Unit</p>
          <input class="form-control" type="number" name="harga" min="0" step="1000" value="{{$key->harga_unit}}" required><br>
          &nbsp;
          <div class="ripple-container">&nbsp; &nbsp; &nbsp;<input type="submit" class="btn-sm font-weight-bold btn-success" value="Submit"></div>
          @endforeach
        </form>
      </div>
    </div>
  </div>
@endsection
