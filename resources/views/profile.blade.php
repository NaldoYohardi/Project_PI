  @extends('layouts.app')

  @section('title', 'Profile')
  @section('MainTitle', 'Profile')

  @section('content')
  <?php if(Session::get('level')== 1){ ?>
  <table>
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Email</td>
      <td>level</td>
      <td>aksi</td>
    </tr>
  <?php } ?>
  <?php if(Session::get('level')== 0 || Session::get('level') == 2){ ?>
  <table>
  <?php } ?>
  <?php if(Session::get('level')== 0 || Session::get('level') == 2){ ?>
    @foreach ($user as $key)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $key->name }}</td>
      <td>{{ $key->email }}</td>
      <td> <a href="/edit/{{$key->user_id}}">edit</a> </td>
    </tr>
    @endforeach
  </table>
  <?php } ?>

  <?php if(Session::get('level')==1){ ?>
    @foreach ($user1 as $key)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $key->name }}</td>
      <td>{{ $key->email }}</td>
      <td>{{ $key->level }}</td>
      <td> <a href="/edit/{{$key->user_id}}">edit</a> </td>
      <td> <a href="/delete/{{$key->user_id}}">delete</a> </td>
    </tr>
    @endforeach
  </table>
  <?php } ?>
  @endsection
