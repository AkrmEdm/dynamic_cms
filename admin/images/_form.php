
  <div class="mb-3">
    <label for="name" class="form-label">Enter Image Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= $name ?? '' ?>" required>
  </div>

<div class="mb-3 mt-3">
    <label for="file" class="form-label">Please Select Images to Upload</label>
    <input type="file" class="form-control" id="file" name="file">
</div>

<?php if(isset($url)): ?>
  <img src="<?= $url ?>" alt="<?= $name ?>">
<?php endif ?>

<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <button type="reset" class="btn btn-danger">Reset</button>
    <button type="submit" class="btn btn-success">Submit</button>
</div>