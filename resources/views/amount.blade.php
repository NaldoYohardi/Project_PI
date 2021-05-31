@extends('layouts.app')

@section('title', 'Add Amount')
@section('MainTitle', 'Add Amount')

@section('content')
  <ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Dashboard</a></li>
    <li><a href="{{ url('/table')}}">Inventory</a></li>
    <li>Request Amount</li>
  </ul>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="/addData" method="post">
          @csrf
          <div class="form-group">
            <label for="sel1">Select list (select one):</label>
            <select name="amount" class="form-control" id="sel1">
              <?php for ($i=1; $i <=10 ; $i++) {?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
            </select>
            <br>
            <input type="submit" class="btn-sm font-weight-bold btn-primary" name="submit" value="submit">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
