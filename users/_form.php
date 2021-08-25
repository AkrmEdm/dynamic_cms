
<div class="mb-3">
  <label for="name" class="form-label">User Name</label>
  <input type="text" class="form-control" id="name" name="name" value="<?= $name ?? '' ?>" required>
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control" id="email" name="email" value="<?= $email ?? '' ?>" required>
</div>

<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input type="passwor" class="form-control" id="password" name="password" value="<?= $password ?? '' ?>" required>
</div>


<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <button type="reset" class="btn btn-danger">Reset</button>
    <button type="submit" class="btn btn-success">Submit</button>
</div>