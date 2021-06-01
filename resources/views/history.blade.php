@extends('layouts.app')

@section('title', 'History')
@section('MainTitle', 'History')

@section('content')
<ul class="breadcrumb">
  <li><a href="{{ url('/home')}}">Dashboard</a></li>
  <li>History</li>
</ul>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">History List</h4>
      <p class="card-description">
        List containing Import and Export History from Database
      </p>
      <?php if(Session::get('level')== 2){ ?>
        Level 2
      <?php } elseif(Session::get('level')== 0){ ?>
        Level 0
      <?php } ?>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
@endsection
