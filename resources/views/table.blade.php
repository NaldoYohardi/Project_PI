@extends('layouts.app')

@section('title', 'Table')
@section('MainTitle', 'Table')

@section('content')
<div class="content" >
<div class="container-fluid">
  <div class="row">
    <?php if(Session::get('level')== 0 || Session::get('level') == 2){ ?>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Inventory List </h4>
            <p class="card-category"> Lists Company Inventory Data</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
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
                    <td class="text-primary">{{ '1' }}</td>
                    <td>{{ 'Dummy' }}</td>
                    <td>{{ '1' }}</td>
                    <td>{{ 'Dummy Text Data' }}</td>
                    <td> <a href="/edit/{{''}}">Edit</a> </td>
                    <td> <a href="/delete/{{''}}">Delete</a> </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php if(Session::get('level')==1){ ?>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Inventory List </h4>
            <p class="card-category"> Lists Company Inventory Data</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
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
                    <td class="text-primary">{{ '' }}</td>
                    <td>{{ '' }}</td>
                    <td>{{ '' }}</td>
                    <td>{{ '' }}</td>
                    <td> <a href="/edit/{{''}}">Edit</a> </td>
                    <td> <a href="/delete/{{''}}">Delete</a> </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</div>
@endsection
