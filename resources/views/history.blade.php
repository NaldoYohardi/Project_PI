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
      <?php if(Session::get('level')== 0 || Session::get('level')== 2){ ?>
        <table id="example" class="hover table table-bordered table-striped">
          <thead class="thead-dark font-weight-bold text-center">
            <tr>
              <th>ID</th>
              <th>Req By</th>
              <th>Item Name</th>
              <th>Stock</th>
              <th>Category</th>
              <th>Harga Unit</th>
              <th>Details</th>
              <th>Approve By</th>
              <th>Entry Created</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody class="break" align="center">
            <?php
              $number = 0;
              $number1 = 0;
              foreach ($inbox as $key) {
                $keterangan = $key->keterangan;
                $approval_id = $key->approval_id;
                $req_id = $key->req_id;
                $id = $key->id;
                $date = $key->date;
                if($number!=0)
                {
                  for ($i=0; $i<=$n; $i++) {
                    unset($names[$i]);
                    unset($stoks[$i]);
                    unset($hargas[$i]);
                    unset($categorys[$i]);
                    unset($status1[$i]);
                  }
                }
              for ($i=0, $j=0; $i<strlen($key->name) ; $i++) {
                if($key->name[$i] == ',')
                {
                  $j+=1;
                }
                if ($key->name[$i] >= 'a' && $key->name[$i] <= 'z' || $key->name[$i] >= 'A' && $key->name[$i] <= 'Z' || ord($key->name[$i]) >= 48 && ord($key->name[$i]) <= 57)
                {
                  $names[$j][$i] = $key->name[$i];
                }
              }

              for ($i=0, $j=0; $i<strlen($key->stok) ; $i++) {
                if($key->stok[$i] == ',')
                {
                  $j+=1;
                }
                if (ord($key->stok[$i]) >= 48 && ord($key->stok[$i]) <= 57)
                {
                  $stoks[$j][$i] = $key->stok[$i];
                }
              }

              for ($i=0, $j=0; $i<strlen($key->category_id) ; $i++) {
                if($key->category_id[$i] == ',')
                {
                  $j+=1;
                }
                if (ord($key->category_id[$i]) >= 48 && ord($key->category_id[$i]) <= 57)
                {
                  $categorys[$j][$i] = $key->category_id[$i];
                }
              }

              for ($i=0, $j=0; $i<strlen($key->status) ; $i++) {
                if($key->status[$i] == ',')
                {
                  $j+=1;
                }
                if (ord($key->status[$i]) >= 48 && ord($key->status[$i]) <= 57)
                {
                  $status1[$j][$i] = $key->status[$i];
                }
              }

              for ($i=0, $j=0; $i<strlen($key->harga_unit) ; $i++) {
                if($key->harga_unit[$i] == ',')
                {
                  $j+=1;
                }
                if (ord($key->harga_unit[$i]) >= 48 && ord($key->harga_unit[$i]) <= 57)
                {
                  $hargas[$j][$i] = $key->harga_unit[$i];
                }
              }
              $n = $j;
              for ($i=0; $i <=$j ; $i++) {
                ?>
                <tr>
                  <td><?php echo $number1+1; ?></td>
                  <?php $number1+=1; ?>
                  @foreach($user as $key10)
                  @if($key10->user_id == $req_id)
                  <td>{{$key10->name}}</td>
                  @endif
                  @endforeach
                  <td><?php echo implode("",$names[$i]); ?></td>
                  <td><?php echo implode("",$stoks[$i]); ?></td>
                  <?php foreach ($category as $key ) {
                    if ($key->id == implode("",$categorys[$i])){?>
                      <td><?php echo $key->category; ?></td>
                  <?php  }
                  } ?>
                  <td><?php echo implode("",$hargas[$i]); ?></td>
                  @if($keterangan == 0)
                  <td>Tambah Barang Baru</td>
                  @elseif($keterangan == 1)
                  <td>Tambah stok Barang</td>
                  @elseif($keterangan == 2)
                  <td>Pengeluaran barang</td>
                  @endif
                  @if($approval_id==NULL)
                  <td>Requesting Manager</td>
                  @endif
                  @foreach($user as $key10)
                  @if($key10->user_id == $approval_id)
                  <td>{{$key10->name}}</td>
                  @endif
                  @endforeach
                  <td><?php echo substr($date, 0, 10); ?></td>
                  <?php if(implode("", $status1[$i]) == 1){ ?>
                    <td><div class="badge badge-danger p-2">Declined</div></td>
                  <?php }elseif(implode("", $status1[$i]) == 2){ ?>
                    <td><div class="badge badge-success p-2">Accepted</div></td>
                  <?php }elseif(implode("", $status1[$i])== 3){?>
                    <td><div class="badge badge-success p-2">Accepted</div></td>
                  <?php }elseif(implode("", $status1[$i])== 0){?>
                    <td><div class="badge badge-warning p-2">Pending</div></td>
                  <?php  } ?>
                </tr>
          <?php }$number+=1;} ?>
          </tbody>
        </table>
      <?php } ?>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
  } );
</script>
@endsection
