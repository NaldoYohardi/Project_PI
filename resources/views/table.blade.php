@extends('layouts.app')

@section('title', 'Table')
@section('MainTitle', 'Table')

@section('content')
<ul class="breadcrumb">
  <li><a href="{{ url('/home')}}">Dashboard</a></li>
  <li>Table</li>
</ul>
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Inventory List</h4>
      <p class="card-description">
        List containing Inventories from Database
      </p>
      <?php if(Session::get('level')== 0){ ?>
        <table id="example" class="hover">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Fakultas</th>
              <th>Prodi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>a</td>
              <td>v</td>
              <td>c</td>
              <td>d</td>
              <td>e</td>
            </tr>
          </tbody>
        </table>
      <?php } elseif(Session::get('level')==1){ ?>
        <table id="example" class="hover">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Fakultas</th>
              <th>Prodi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>a</td>
              <td>v</td>
              <td>c</td>
              <td>d</td>
              <td>e</td>
            </tr>
          </tbody>
        </table>
      <?php } elseif(Session::get('level')==2){ ?>
        <table id="example" class="hover">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Fakultas</th>
              <th>Prodi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>a</td>
              <td>v</td>
              <td>c</td>
              <td>d</td>
              <td>e</td>
            </tr>
          </tbody>
        </table>
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
