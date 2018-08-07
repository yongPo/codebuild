<h2><?= $post['title']; ?></h2>
	<small class="post-date">Posted on: <?php echo date("M d, Y", strtotime($post['created_at'])); ?></small><br>
	<img class="" src="<?= site_url(); ?>assets/uploads/<?= $post['image']; ?>" alt="">
	<div class="post-body">
		<?= $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
<hr>
<a class="btn btn-info float-left mr-2" href="<?= base_url(); ?>posts/edit/<?= $post['slug']; ?>">Edit</a>
<?= form_open('/posts/delete/'.$post['id']) ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>
<hr>	
<h3>Comments</h3>
<?php if($comments) : ?> 
	<?php foreach($comments as $comment): ?>
		<div class="well">
			<h5><?= $comment['content']; ?> [by <strong><?= $comment['name']; ?></strong>]</h5>
		</div>
	<?php endforeach;?>
	<?php else : ?> 
		<p>No comments to display</p>
		<?php endif; ?> 
<hr>
<h3>Add Comment</h3>
<?= validation_errors(); ?>
<?= form_open('comments/create/'.$post['id']) ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Comment</label>
		<textarea name="content" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?= $post['slug']; ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>
		