<section class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						<h1>List of Products</h1>
					</div>
				</div>
				<table class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th>Action</th>
							<th>Product Item</th>
							<th>Description</th>
							<th>Product Rating</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $list): ?>
						<tr>
							<td><a class="btn btn-block btn-default" href="<?php echo base_url() . 'index.php/product/' . $list->p_slug?>" title="">Rate Me </a></td>
							<td><?php echo $list->p_item_name ?></td>
							<td><?php echo $list->p_description ?> </td>
							<td><span> <b>
								<?php
								for($i = 1; $i <= 5; $i++){
									if($i <= $list->p_rating){
										echo '<i style="color: green;" class="glyphicon glyphicon-star"></i>';
									} else{
										echo '<i style="color: green;" class="text-warning glyphicon glyphicon-star-empty"></i>';
									}
								} echo ' ' . round($list->p_rating,2);
								?></b></span>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>