
  <div class="mb-3">
    <label for="title" class="form-label">Enter Article Title</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= $title ?? '' ?>" required>
  </div>


<textarea name="content" rows="20">
  <?= $content ?? '' ?>
</textarea>

<div class="mb-3 mt-3">
    <label for="published_date" class="form-label">Enter Publishing Date</label>
    <input type="date" class="form-control" id="published_date" name="published_date" value="<?= $published_date ?? '' ?>">
</div>

<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <button type="reset" class="btn btn-danger">Reset</button>
    <button type="submit" class="btn btn-success">Submit</button>
</div>