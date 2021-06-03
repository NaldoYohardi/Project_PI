@extends('layouts.app')

@section('title', 'Add Amount')
@section('MainTitle', 'Add Amount')

@section('content')
  <ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Dashboard</a></li>
    <li><a href="{{ url('/table')}}">Inventory</a></li>
    <li>Out Stocks</li>
  </ul>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="/outstoks" method="post">
          @csrf
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            @foreach ($inventory as $key)
            @if($key->id == $id)
            <input type="number" name="amount" min="1" max="<?php echo $key->stok; ?>" value="<?php echo $key->stok; ?>">
            @endif
            @endforeach
            <br><br>
            <input type="submit" class="btn-sm font-weight-bold btn-success" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
