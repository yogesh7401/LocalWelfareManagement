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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Edit</title>
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
					<form method="post" action="edit.php">
						<center><p>Edit profile</p></center>
						<?php
							$sql="SELECT * FROM officers where password='".$_SESSION['password']."' AND phone='".$_SESSION['phone']."'" ;
							$result=$con->query($sql);

							if($result->num_rows>0)
							{
								while ($row=$result->fetch_assoc())
								 {$id= $row['id'];
						?>
							<table id="form">
								<tr>
									<th>Name</th>
									<td><?php echo $row['name'];?><br>
										<div id="demo1"></div></td>
									<th><a type="button" onclick="myFunction1()" style="margin-left: 20px"> <i class="fa fa-edit">edit</i></a></th>
								</tr>
								<tr>
									<th>Phone</th>
									<td><?php echo $row['phone'];?><br>
										<div id="demo2"></div></td>
									<th><a type="button" onclick="myFunction2()" style="margin-left: 20px"> <i class="fa fa-edit">edit</i></a></th>
								</tr>
								<tr>
									<th>E-mail</th>
									<td><?php echo $row['email'];?><br>
										<div id="demo3"></div></td>
									<th><a type="button" onclick="myFunction3()" style="margin-left: 20px"> <i class="fa fa-edit">edit</i></a></th>
								</tr>
								<tr>
									<th>Gender</th>
									<td><?php echo $row['gender'];?><br>
										<div id="demo4"></div></td>
									<th><a type="button" onclick="myFunction4()" style="margin-left: 20px"> <i class="fa fa-edit">edit</i></a></th>
								</tr>
								<tr>
									<th>Age</th>
									<td><?php echo $row['age'];?><br>
										<div id="demo5"></div></td>
									<th><a type="button" onclick="myFunction5()" style="margin-left: 20px"> <i class="fa fa-edit">edit</i></a></th>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" name="submit" value="submit" ></td>
									<td></td>
								</tr>	
								
							
						<?php } ?> </table> <?php } ?>
						<?php
							if(isset($_POST['submit'])){
								if($_POST['name']!=''){
										$name=$_POST['name'];
										$sql="UPDATE officers SET name = '$name' where id='$id'";
									$update = $mysqli->prepare($con,$sql);

								}
								if($_POST['phone']!=''){
										$phone=$_POST['phone'];
									$update_profile1 = $mysqli->query($con,"UPDATE officers SET phone = '$phone' where password='".$_SESSION['password']."' AND phone='".$_SESSION['phone']."'");

								}
								if($_POST['email']!=''){
										$email=$_POST['email'];
									$update_profile2 = $mysqli->query("UPDATE officers SET email = '$email' where password='".$_SESSION['password']."' AND phone='".$_SESSION['phone']."'");

								}
								if($_POST['age']!=''){
										$age=$_POST['age'];
									$update_profile3 = $mysqli->query("UPDATE officers SET age = '$age' where password='".$_SESSION['password']."' AND phone='".$_SESSION['phone']."'");

								}
							
							
							
							
								
								
	    if ($update_profile || $update_profile1 || $update_profile2 || $update_profile3) {
		   header("Location: admin_page.php?user=$user");
	    } else {
		  echo $mysqli->error;
	    }
	}
							?>
						</div>

			</div>
			<style type="text/css">
				table,td,th{
					
					border: 1px solid white; 
					margin-bottom: 20px;
				}
				td{
					height: 50px;
					width: 500vh;
				}
			</style>
			<script>
				function myFunction1() 
				{
				  document.getElementById("demo1").innerHTML = "<input type='text' name='name' >";
				}
				function myFunction2() 
				{
				  document.getElementById("demo2").innerHTML = "<input type='phone' name='phone' >";
				}
				function myFunction3() 
				{
				  document.getElementById("demo3").innerHTML = "<input type='text' name='email' >";
				}
				function myFunction4() 
				{
				  document.getElementById("demo4").innerHTML = "<input type='text' name='gender' >";
				}
				function myFunction5() 
				{
				  document.getElementById("demo5").innerHTML = "<input type='text' name='age' >";
				}
				
			</script>


</body>
</html>
