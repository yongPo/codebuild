<h2><?= $title; ?></h2>

<?= validation_errors(); ?>

<?= form_open('posts/update'); ?>
	<input type="hidden" name="id" value="<?= $post['id']; ?>">
  <fieldset>
    <div class="form-group">
      <label>Post Title</label>
      <input type="text" class="form-control" placeholder="" name="title" value="<?= $post['title'] ?>">
    </div>
    <div class="form-group">
      <label>Content</label>
      <textarea id="content-editor" class="form-control" name="body" rows="3"><?= $post['body'] ?></textarea>
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category):?>
          <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach;?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>