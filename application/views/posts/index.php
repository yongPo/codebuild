<h2><?= $title ?></h2>
	<?php 
if(empty($posts)){
			echo '<h3>No records found</h3>';
		}
	foreach($posts as $post) : ?>
		<h3><?= $post['title']; ?></h3>
		<div class="row">
			<div class="col-md-4">
				<img class="post-thumb" src="<?= site_url(); ?>assets/uploads/<?= $post['image']; ?>" alt="">
			</div>
			<div class="col-md-8">
				<small class="post-date">Posted on: <?php echo date("M d, Y", strtotime($post['created_at'])); ?> in <strong><?= $post['name']; ?></strong></small><br>
				<?= word_limiter($post['body'], 60); ?>
				<p class="mt-3"><a class="btn btn-primary" href="<?= site_url('/posts/view/'.$post['slug']);?>">Read More</a></p>	
			</div>
		</div>
		<hr class="mt-4">
	<?php endforeach; ?>
	<div class="pagination-link">
		<?= $this->pagination->create_links(); ?>
	</div>