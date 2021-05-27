@extends('layouts.app')

@section('title', 'Table')
@section('MainTitle', 'Table')

@section('content')
<ul class="breadcrumb">
  <li><a href="{{ url('/home')}}">Dashboard</a></li>
  <li>Inbox</li>
</ul>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Ini Inbox</h4>
      <p class="card-description">
        Berisi message
      </p>
      <?php if(Session::get('level')== 0){ ?>
        <table class="table table-bordered table-striped">
          <thead align="center">
            <tr>
              <th>No.</th>
              <th>Item</th>
              <th>Amount</th>
              <th>Comment</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ '1' }}</td>
              <td>{{ 'Dummy' }}</td>
              <td>{{ '1' }}</td>
              <td>{{ 'Dummy Text Data' }}</td>
              <td> <a href="/edit/{{''}}" class="btn-sm btn-warning">Edit</a> </td>
              <td> <a href="/delete/{{''}}" class="btn-sm btn-danger">Delete</a> </td>
            </tr>
          </tbody>
        </table>
      <?php } elseif(Session::get('level')==1){ ?>
        <table class="table table-bordered table-striped">
          <thead align="center">
            <tr>
              <th>No.</th>
              <th>Item</th>
              <th>Amount</th>
              <th>Comment</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ '1' }}</td>
              <td>{{ 'Message 1' }}</td>
              <td>{{ '3' }}</td>
              <td>{{ 'Dummy Text Data' }}</td>
              <td> <a href="/edit/{{''}}" class="btn-sm btn-warning">Edit</a> </td>
              <td> <a href="/delete/{{''}}" class="btn-sm btn-danger">Delete</a> </td>
            </tr>
          </tbody>
        </table>
      <?php } elseif(Session::get('level')==2){ ?>
        <table class="table table-bordered table-striped">
          <thead align="center">
            <tr>
              <th>No.</th>
              <th>Item</th>
              <th>Amount</th>
              <th>Comment</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ '1' }}</td>
              <td>{{ 'Dummy' }}</td>
              <td>{{ '1' }}</td>
              <td>{{ 'Dummy Text Data' }}</td>
              <td> <a href="/edit/{{''}}" class="btn-sm btn-warning">Edit</a> </td>
              <td> <a href="/delete/{{''}}" class="btn-sm btn-danger">Delete</a> </td>
            </tr>
          </tbody>
        </table>
      <?php } ?>
    </div>
  </div>
</div>
@endsection