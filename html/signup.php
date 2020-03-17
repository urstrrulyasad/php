<?php
$pageTitle = 'User Registration';
include 'includes/header.php';
?>

<div class="container ">
	<form class="form" id="form-signup" action="controller/requestController.php" method="post">
<div class="card">
	<div class="card-header">
		<h6 class="card-title text-center text-success">Registration Form</h6>
	</div>
	<div class="card-body">
		
		<input type="hidden" name="pageRequest" value="signup">
		<div class="form-group">
			<input type="text" name="firstname" placeholder="Enter First Name" class="form-control" required>
		</div>

	<div class="form-group">
				<input type="text" name="lastname" placeholder="Enter Last Name" class="form-control" required>
		</div>
	
	<div class="form-group">
				<input type="tel" name="mobile" placeholder="Enter Mobile" class="form-control" required>
		</div>

		<div class="form-group">
				<input type="text" name="username" placeholder="Enter User Name" class="form-control" required>
		</div>

		<div class="form-group">
				<button class="form-control" type="submit"> Sign Up</button>
		</div>
	</div>
</div>
</form>


</div>
<?php

$script = '';
include 'includes/footer.php';
?>