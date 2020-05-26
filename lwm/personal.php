<?php
	include('config.php');
	session_start();

	$name=$_SESSION['name'];
	$phone=$_SESSION['phone'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Your complaint</title>
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
				<div class="col-md-8 col-xs-8 col-sm-8" >
					<h3 style="margin-top: 4px"><center style="color: white">Your complaint</center></h3>
					
					<?php
					$sql="SELECT * FROM complaints where name='$name' AND phone='$phone'" ;
					$result=$con->query($sql);
					

					if($result->num_rows>0){
						while ($row=$result->fetch_assoc()) {
							?>
							<table id="form">
								<tr>
									<th>Name</th>
									<td><?php echo $row['name'];?></td>
								</tr>
								<tr>
									<th>Phone</th>
									<td><?php echo $row['phone'];?></td>
								</tr>
								<tr>
									<th>E-mail</th>
									<td><?php echo $row['email'];?></td>
								</tr>
								<tr>
									<th>Address</th>
									<td><?php echo $row['address'];?></td>
								</tr>
								<tr>
									<th>Problem</th>
									<td><?php echo $row['problem'];?></td>
								</tr>
								<tr>
									<th>Status</th>
									<td><?php echo $row['status'];?></td>
								</tr>
								<tr>
									<th>comment</th>
									<td><?php echo $row['comment'];?></td>
								</tr>
								
							
						<?php } ?> </table> <?php } ?>
					


					
					
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
		

</body>
</html>