<h2><?= $title ?></h2>

<?= validation_errors(); ?>

<?= form_open_multipart(); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" placeholder="Enter Name">
	</div>
	<button type="submit" class="btn btn-primary submit_category">Submit</button>
</form>

<ul class="list-group">
	<?= form_open('categories/delete/', array('class' => 'cat-delete')); ?>
	<?php foreach($categories as $category) : ?>
		<li class="list-group-item"><a href="<?= site_url('/categories/posts/'.$category['id']); ?>"><?= $category['name']; ?></a>
		<?php if($this->session->userdata('user_id') == $category['user_id']) : ?>
				
				<input type="submit" class="btn btn-link text-danger" value="[X]">
		<?php endif;?>
		</li>
	<?php endforeach; ?>
	<?= form_close(); ?>
</ul>

<script>
        $( ".submit_category" ).click(function(event)
        {
            event.preventDefault();
            var name = $("input[name='name']").val();
            var data = {
		      name : name
		    };
            $.ajax(
                {
                    type:"post",
                    url: "<?php echo base_url(); ?>categories/create",
                    dataType: "json",
                    data: data,
                    success:function(response)
                    {
                        console.log(response.data);
                        var obj = response.data;
                        Object.keys(obj).forEach(function(key){
            				console.log(obj[key]);
            			});
            			$('.list-group').prepend(`
							<li class="list-group-item"><a href=` + document.URL + '/posts/' + obj + `>`+ name +`</a>
									<input type="submit" class="btn btn-link text-danger" value="[X]">
							</li>
            				`);
            			$("input[name='name']").val('');
                    },error: function(){
                    	console.log('false');
                    	$("input[name='name']").addClass('is-invalid');
                    }
                }
            );
        });
</script>