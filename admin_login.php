<?php
	include('config.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Login</title>
</head>
<body>
	
		<div class="row">
			<div class="col-md-10 col-xs-11" >
				<p>Local Welfare Management</p>
			</div>
			<div class="col-md-2 col-xs-1">
			<a type="button" class="button" href="index.html"  >Back</a>
			
			</div>
		</div>
		<div class="row" style="margin-top: 10%" >
			<div class="col-md-3 col-xs-2 col-sm-2"></div>
				<div class="col-md-6 col-xs-8 col-sm-8" id="form" style="padding-top: 10px;padding-bottom: 20px">
					<form method="post" action="admin_login.php">
						<center><p>Admin login</p></center>
						<table>
							<tr>
								<td><b>Phone Number</b></td>
								<td><input type="text" name="phone"  style="width: 200px" /></td>
							</tr>
							<tr>
								<td><b>Password</b></td>
								<td><input type="password" name="password"  style="width: 200px"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Go" style="margin-top:20px; margin-bottom: 10px; width: 60%;float: right" /></td>
							</tr>	
						</table>
					</form>
					<?php
					if (isset($_POST['submit'])) {
						$phone = $_POST['phone'];
						$password = $_POST['password'];
						

						if ($password!="" &&  $phone!="") 
	{
		
	$sql="SELECT * FROM officers WHERE password='$password' AND phone='$phone'";
	$result=$con->query($sql);
	

		if($result->num_rows==1 )
		{	$_SESSION['password']=$password;
			$_SESSION['phone']=$phone;
			header('location:admin_page.php');
		}
		else
		{
			echo "No user found";
		}
	}
						
					}


					?>
				</div>
			</div>
				
		

</body>
</html>