@extends('layouts.app')

@section('title', 'Add Amount')
@section('MainTitle', 'Add Amount')

@section('content')
  <ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Dashboard</a></li>
    <li><a href="{{ url('/table')}}">Inventory</a></li>
    <li>Add Stocks</li>
  </ul>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="/updateInventory" method="post">
          @csrf
          @foreach($inventory as $key)
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          nama
          <input type="text" name="name" value="{{ $key->name }}">
          kategori
          <select name="category">
            @foreach($category as $key1)
            <option value="{{$key1->id}}">{{$key1->category}}</option>
            @endforeach
          </select>
          harga Unit
          <input type="number" name="harga" value="{{$key->harga_unit}}">
          <input type="submit" name="submit">
          @endforeach
        </form>
      </div>
    </div>
  </div>
@endsection
