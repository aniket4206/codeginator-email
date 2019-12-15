<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Sending Email</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">CodeIgniter Sending Email</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<?php
	         	if($this->session->flashdata('message')){
	         	?>
	         	<div class="alert alert-info text-center">
	            	<?php echo $this->session->flashdata('message'); ?>
	          	</div>
	          	<?php
	        }
	        ?>
			<form method="POST" action="<?php echo base_url(); ?>email/sendemail">
				<div class="form-group">
					<label>Subject:</label>
					<input type="text" class="form-control" name="subject">
				</div>
				<div class="form-group">
					<label>Message:</label>
					<textarea class="form-control" name="message"></textarea>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" class="form-control" name="email">
				</div>
				<button type="submit" class="btn btn-primary">Send</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>