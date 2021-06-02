<form action="/updateInventory" method="post">
  @csrf
@foreach($inventory as $key)
<input type="hidden" name="id" value="<?php echo $id; ?>">
nama
<input type="text" name="name" value="{{ $key->name }}">
kategori
<select name="category">
  @foreach($category as $key1)
  <option value="{{$key1->id}}">{{$key1->category}}</option>
  @endforeach
</select>
harga Unit
<input type="number" name="harga" value="{{$key->harga_unit}}">
<input type="submit" name="submit">
@endforeach
</form>
