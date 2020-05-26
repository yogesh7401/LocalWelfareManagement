<?php
	include('config.php');
	error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Complaint</title>
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
		<div class="col-md-2 col-xs-2 col-sm-2"></div>
			<div class="col-md-8 col-xs-8 col-sm-8" id="form">
			<h3 style="margin-top: 4px"><center>COMPLAINT</center></h3>
				<div class="inputs">
					<form  method="post" action="complaint.php" >
					<table>
						<tr>
							<td><b>NAME*</b></td>
							<td><input type="text" name="name" required/></td>
						</tr>
						<tr>
							<td><b>E-MAIL</b></td>
							<td><input type="text" name="email"/></td>
						</tr>
						<tr>
							<td><b>PH.NUMBER*</b></td>
							<td><input type="NUMBER" name="phone" required/></td>
						</tr>
						<tr>
							<td><b>DISTRICT*</b></td>
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
							<td><b>ADDRESS*</b></td>
							<td><input type="text" name="address" required/></td>
						</tr>
						<tr>
							<td><b>PROBLEM*</b></td>
							<td><textarea value="problem" name="problem" rows="9" cols="50" type="text"required/></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="submit" style="margin-top:10px; margin-bottom: 10px;" /></td>
						</tr>						
					</table>

					</form>
<?php
if(isset($_POST['submit']))
{

	$name = $_POST['name'];
	$email = test_input($_POST['email']);
	$phone = $_POST['phone'];
	$district = $_POST['district'];
	$address = $_POST['address'];
	$problem = $_POST['problem'];
	$time= date("Y-m-d H:i:s");

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "Invalid email formate";
	}
	else{
	$sql="INSERT INTO complaints (name, email, phone,district,address,problem,at) VALUES ('$name','$email','$phone','$district','$address','$problem','$time')";
	$stmt = mysqli_prepare($con,$sql);
	}
	if($con->query($sql))
	{
		header('location:index.html');
	}
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?><br>
					<em style="font-size: 18px;font-weight: normal;">Note : You can check your complaint status by loging in using your name and phone number<a href="login.php">(click here)</a></em>

					
				</div>

			</div>

	</div>


</body>
</html>