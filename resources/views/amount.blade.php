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
      <input type="submit" name="submit" value="submit">
    </div>
  </form>
