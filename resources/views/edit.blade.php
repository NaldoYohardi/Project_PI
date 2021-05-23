<?php
if(Session::get('LoggIN')==0)
{?>
  <script>
    window.location.href='{{url('')}}';
  </script>
<?php } ?>
<?php if(Session::get('level')==0 || (Session::get('level')== 2)){ ?>
<form action="/update/{{ $user->user_id }}" method="post">
      @csrf
      Name
      <input type="text" name="name" value="{{ $user->name }}">
      Email
      <input type="text" name="email" value="{{ $user->email }}">
      <button type="submit">submit</button>
</form>
<?php } ?>

<?php if(Session::get('level')==1){ ?>
<form action="/update/{{ $user->user_id }}" method="post">
      @csrf
      Name
      <input type="text" name="name" value="{{ $user->name }}">
      Email
      <input type="text" name="email" value="{{ $user->email }}">
      Level
      <input type="number" name="level" value="{{ $user->level }}">
      <button type="submit">submit</button>
</form>
<?php } ?>
