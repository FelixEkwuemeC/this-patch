
	<?php
		
	if ($_POST["submit"]){

		if (!$_POST['subject']){
			
			$error="<br />Please enter Subject";
		}
		
		if (!$_POST['name']){
			
			$error.="<br />Please enter your name";
		}
		
		if (!$_POST['email']){
			
			$error.="<br /> Please enter your email";
		}
		
		if (!$_POST['comment']){
			
			$error.="<br /> Please enter a comment";
		}
		
		if ($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			
			$error.="<br /> Please enter your email";
			
		} 
		
		
		if ($error){
			
			$result='<div class="alert alert-danger"><strong>There are error(s):</strong>'.$error.'</div>';
		}
		
	 else {
		
		if (mail("fcekwueme@gmail.com", "Comment from This-Patch Contact Page!", 
		
		"Name: ".$_POST['name']."
		Subject: ".$_POST['subject']."
		Email: ".$_POST['email']."
		Comment: ".$_POST['comment'])
		) {
			
			$result='<div class="alert alert-success"><strong>Sent!!</strong> I\'will be in touch.</div>';
		} else {
			$result='<div class="alert alert-danger"><strong>Error!!</strong> Please try again later.</div>';
			
		}
	}
	}
	
	?>


<!doctype html>
<html>
<head>
    <title>PHP Contact Forms</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
<style>
	body{
		
		background-image:url("images/bg.jpg");
		background-size:cover;
	}
	.emailForm{
		
		border:1px solid grey;
		border-radius:10px;
		margin-top:20px;
		
	}
	
	form{
			padding-bottom:20px;
		
		
	}
	.inputColor{
		
		color:#FFFFFF;
	}

	
</style>


</head>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 emailForm">
		
			<h1 class="inputColor"> Contact Form</h1>
			
			<?php
				echo $result;
			
			?>
			
				<p class="lead inputColor"> Please get in touch. I will get back to you within 24 hours </p>
			
				<form method="post">
				
					<div class="form-group">
					
						<Label for="subject" class="inputColor">Subject: </label>
						<input type="text" placeholder="Your name" name="subject" class="form-control" value="<?php echo $_POST['subject']; ?>">
						<br /><br />
					
						<Label for="name" class="inputColor">Name: </label>
						<input type="text" placeholder="Your name" name="name" class="form-control" value="<?php echo $_POST['name']; ?>">
						<br /><br />
						
						<Label for="email" class="inputColor">Email: </label>
						<input type="email" placeholder="Your Email" name="email" class="form-control" value="<?php echo $_POST['email']; ?>">
						<br /><br />
						
						<Label for="comment" class="inputColor">Your Comment: </label>
						<textarea class="form-control"  name="comment" <?php echo $_POST['comment']; ?>></textarea>
						<br /><br />
						
						<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit"/>
						
					</div>
				
				</form>
			</div>
	</div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
	