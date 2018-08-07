<h2><?= $title; ?></h2>

<?= validation_errors(); ?>

<?= form_open_multipart('posts/create'); ?>
  <fieldset>
    <div class="form-group">
      <label>Post Title</label>
      <input type="text" class="form-control" placeholder="" name="title">
    </div>
    <div class="form-group">
      <label>Content</label>
      <textarea id="content-editor" class="form-control" name="body" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category):?>
          <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach;?>
      </select>
    </div>
    <div class="form-group">
      <label>Upload Image</label><br>
      <input type="file" name="userfile">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>