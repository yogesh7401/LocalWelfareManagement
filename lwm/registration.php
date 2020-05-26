
<script type="text/javascript">
	<!--hide
	var password;
	var pass1="rakesh";
	password=prompt('Enter password to view page','');
	if(password==pass1){
		alert('correct password, click ok to go');
	}
	else{
		window.location="index.html";
	}//-->
</script>
<?php

include('config.php');
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>registration</title>
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
		<div class="row">
			<div class="col-md-3 col-xs-2 col-sm-2"></div>
				<div class="col-md-6 col-xs-8 col-sm-8" id="form" style="padding-top: 10px;padding-bottom: 20px">
					<?php
					if (isset($_POST['submit'])) 
					{ 
						$name = $_POST['name'];
						$district = $_POST['district'];
						$password = $_POST['password'];
						$phone = $_POST['phone'];
						$email = test_input($_POST['email']);
						$gender = $_POST['gender'];
						$age = $_POST['age'];

						$sql="SELECT phone from officers where phone ='$phone'";
						$result1=mysqli_query($con,$sql);
						
						$row=mysqli_fetch_assoc($result1);

						if(!filter_var($email,FILTER_VALIDATE_EMAIL) || $phone==$row['phone'])
						{
							echo "<p style='color:red'>Invalid email formate (or) Phone number already exists</p>";
						}
						else
						{
							$sql2=	"INSERT INTO officers (name,district,password,phone,email,gender,age) VALUES ('$name','$district','$password','$phone','$email','$gender','$age')";
							$result = mysqli_query($con,$sql2);
						echo "<p style='color:red'>registered successfully</p>";
						}
						
					}
						function test_input($data)
						{
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
						}
					?>
					<form method="post" action="registration.php">
						<center><p>Admin register</p></center>
						<table>
							<tr>
								<td><p>Name</p></td>
								<td><input type="text" name="name"  style="width: 200px" required></td>
							</tr>
							<tr>
							<td><p>District</p></td>
							<td>
								<select name="district" type="text"required>
									<option value="ariyalur">Ariyalur</option><option value="chengalpattu">Chengalpattu</option>
									<option value="chennai">Chennai</option><option value="coimbatore">Coimbatore</option>
									<option value="cuddalore">Cuddalore</option><option value="dharmapuri">Dharmapuri</option>
									<option value="dindigul">Dindigul</option><option value="erode">Erode</option>
									<option value="kallakurichi">Kallakurichi</option><option value="kanchipuram">kanchipuram</option>
									<option value="kaniyakumari">Kanniyakumari</option><option value="karur">Karur</option>
									<option value="krishnagiri">Krishnagiri</option><option value="madurai">Madurai</option>
									<option value="nagapattinam">Nagapattinam</option><option value="namakkal">Namakkal</option>
									<option value="nilgiris">Nilgiris</option><option value="perambalur">Perambalur</option>
									<option value="pudukkottai">Pudukkottai</option><option value="ramanathapuram">Ramanathapuram</option>
									<option value="ranipet">Ranipet</option><option value="salem">Salem</option>
									<option value="sivaganaga">Sivaganga</option><option value="tenkasi">Tenkasi</option>
									<option value="thanjavur">Thanjavur</option><option value="theni">Theni</option>
									<option value="thoothukudi">Thoothukudi</option><option value="thiruchi">Thiruchi</option>
									<option value="tirunelveli">Tirunelveli</option><option value="tirupattur">Tirupattur</option>
									<option value="tiruppur">Tiruppur</option><option value="tiruvallur">Tiruvallur</option>
									<option value="tiruvannamalai">Tiruvannamalai</option><option value="tiruvarur">Tiruvarur</option>
									<option value="vellore">Vellore</option><option value="villupuram">Villupuram</option>
									<option value="virudhunagar">Virudhunagar</option>
								</select>
							</td>
							</tr>
							<tr>
								<td><p>Password</p></td>
								<td><input type="password" name="password"  style="width: 200px" required></td>
							</tr>
							<tr>
								<td><p>Phone</p></td>
								<td><input type="number" name="phone" style="width: 200px" required></td>
							</tr>
							<tr>
								<td><p>E-mail</p></td>
								<td><input type="text" name="email" style="width: 200px" required></td>
							</tr>
							<tr>
								<td><p>Gender</p></td>
								<td><select name="gender" type="text"required>
									<option value="male">male</option>
									<option value="female">female</option></td>
							</tr>
							<tr>
								<td><p>Age</p></td>
								<td><input type="number" name="age" style="width: 200px" required></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="submit" style="margin-top:20px; margin-bottom: 10px; width: 60%;float: right" ></td>
							</tr>	
						</table>
					</form>

						</div>

			</div>

	
			
				
		

</body>
</html>