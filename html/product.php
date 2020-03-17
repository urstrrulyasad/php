<?php
$pageTitle = 'Add Product';
include 'includes/header.php';
?>

<div class="container ">
	<form class="form" id="form-signup" enctype="multipart/form-data" action="controller/requestController.php" method="post">
<div class="card">
	<div class="card-header">
		<h6 class="card-title text-center text-success">Add Product</h6>
	</div>
	<div class="card-body">
		
		<input type="hidden" name="pageRequest" value="addproduct">
		<div class="form-group">
			<input type="text" name="product_name" placeholder="Enter First Name" class="form-control" required>
		</div>

	<div class="form-group">
				<input type="file" name="product_image"  class="form-control" required>
		</div>
	
	<div class="form-group">
				<input type="text" name="product_price" placeholder="Enter Mobile" class="form-control" required>
		</div>

		

		<div class="form-group">
				<button class="form-control" type="submit">Add Product</button>
		</div>
	</div>
</div>
</form>


</div>
<?php

$script = '';
include 'includes/footer.php';
?>