<section class="container">
	<div class="row">
		<div class="col-md-12">
			<?php foreach($product as $product):?>
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						<h1><?php echo $product->p_item_name ?></h1>
						<hr/>
					</div>
				</div>
				<div class="panel-body">
					<p><?php echo $product->p_description ?> </p>

					<?php
					for($i = 1; $i <= 5; $i++){
						echo '<a href="' . base_url() . 'index.php/addRating/' . $product->p_slug . '/' . $i . '" ><i class="glyphicon glyphicon-star-empty"></i></a>';
					}
					?>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</section>