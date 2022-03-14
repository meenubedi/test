<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<?php
			include 'dbcon.php';
				if (isset($_POST['submit'])) {
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$email = mysqli_real_escape_string($con,$_POST['email']);
				$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
				$password = mysqli_real_escape_string($con,$_POST['password']);
				$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
				$pass =password_hash($password, PASSWORD_BCRYPT);
				$cpass = password_hash($cpassword, PASSWORD_BCRYPT);
				$emailquery = "select * from registration where email='$email' ";
				$query = mysqli_query($con, $emailquery);
				$emailcount = mysqli_num_rows($query);
				if($emailquery>0){
				echo("Email already Exist");
					}
					else{
							if($password === $cpassword){
								$insertquery = "INSERT INTO registration(`username`, `email`, `mobile`, `password`, `cpassword`,) values('$username', '$email', '$mobile', '$pass', '$cpass') ";
								$iquery = mysqli_query($con, $insertquery);
									if ($iquery) {
		?>
		<script>
		alert("Insert Successful");
		</script>
		<?php
		}
		else{
		?>
		<script>
		alert("No Inserted");
		</script>
		<?php
		}
		
		}
		else{
		echo("Password are not matching");
		}
		}
		}
		?>
		<form action="" method="POST">
			<div class="container my-5 ">
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="validationDefault01">full Name</label>
						<input type="text" class="form-control" name="username" id="validationDefault01" value="" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="validationDefault02">Email address</label>
						<input type="text" class="form-control" name="email" id="validationDefault02" value="" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="validationDefault03">Phone number</label>
						<input type="number" class="form-control" name="mobile" id="validationDefault03" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="validationDefault04">Create Password</label></label>
						<input type="number" class="form-control" name="password" id="validationDefault03" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="validationDefault05">Repeat Password</label>
						<input type="text" class="form-control" name="cpassword" id="validationDefault05" required>
					</div>
				</div>
				<button class="btn btn-primary" name="submit" type="submit">Submit form</button>
			</div>
		</form>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	</body>
</html>