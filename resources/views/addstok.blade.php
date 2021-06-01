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
        <form action="/addData" method="post">
          @csrf
          <div class="form-group">
            <input type="text" name="i" value="<?php echo $i; ?>">
            <input type="text" name="id" value="<?php echo $id; ?>">
            <input type="number" name="amount">
            <br>
            <input type="submit" class="btn-sm font-weight-bold btn-success" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
