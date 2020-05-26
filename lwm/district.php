<?php
	include('config.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Problem</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	
		<div class="row">
			<div class="col-md-10 col-xs-10" >
				<p>Local Welfare Management</p>
			</div>
			<div class="col-md-2 col-xs-2">
			<a type="button" class="button" href="index.html"  >Back</a>
			<a type="button" class="button" href="login.php" style="margin-right: 2px " >Login</a>
			</div>
		</div>
		<div class="row" style="margin-top: 15%" >
			<div class="col-md-2 col-xs-2 col-sm-2"></div>
				<div class="col-md-8 col-xs-8 col-sm-8" id="form" style="padding-top: 10px;padding-bottom: 20px">
					<form method="post" action="district.php">
					<center><p>Select District </p></center>
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
					<input type="submit" name="submit" value="Go" style="margin-top:20px;width: 100px;float: right" />
					</form>
					<?php
					if(isset($_POST['submit'])){
						$district=$_POST['district'];
						$_SESSION['district']=$district;
						header('location:problem.php');

					}
					

					?>
				</div>
			</div>
		</div>


</body>
</html>