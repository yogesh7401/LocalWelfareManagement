
	<?php
	include('config.php');

session_start();   
	
	echo $_SESSION['phone'];
	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" href="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css.css">
	<title>Admin</title>
</head>
<body>
		<div class="row">
			<div class="col-md-8 col-xs-11" >
				<p>Local Welfare Management</p>
			</div>
			<div class="col-md-4 col-xs-1">
			<a type="button" class="button" href="index.html"  >Back</a>
			<a type="button" class="button" href="edit.php" style="margin-right: 2px " >Edit</a>
			<a type="button" class="button" href="logout.php" style="margin-right: 2px " >Logout</a>
			
			</div>
		</div>
			<div class="row">
				<div class="col-md-2 col-xs-2 col-sm-2"></div>
				<div class="col-md-8 col-xs-8 col-sm-8" >

				
					<?php
					$sql="SELECT * FROM officers where phone='".$_SESSION['phone']."' " ;
					$result=$con->query($sql);

					if($result->num_rows>0)
					{ 
						$row=$result->fetch_assoc();
						$sql1="SELECT * FROM complaints where district='".$row['district']."' " ;
						$result1=$con->query($sql1);
						
						if($result1->num_rows>0)
						{


						while ($row=$result1->fetch_assoc()) 
							{?>
								<form method="post" action="admin_page.php">
							<table id="form">
								<tr>
									<th>Problem ID</th>
									<td><input type="radio" name="id" value="<?php echo $row['id'];?>" checked>lwm<?php echo $row['id'];?></td>
								</tr>
								<tr>
									<th>Name</th>
									<td><?php echo $row['name'];?></td>
								</tr>
								<tr>
									<th>E-mail</th>
									<td><?php echo $row['email'];?></td>
								</tr>
									<th>Address</th>
									<td><?php echo $row['address'];?></td>
								</tr>
								
								<tr>
									<th>Problem</th>
									<td><?php echo $row['problem'];?></td>
								</tr>
								<tr>
									<th>P.Number</th>
									<td><?php echo $row['phone'];?></td>
								</tr>
								<tr>
									<th>Date</th>
									<td><?php echo $row['at'];?></td>
								</tr>
								<tr>
									<th>Status</th>
									<td>
										<select name="status" type="text">
											<option><?php echo $row['status'];?></option>
											<option value="Pending">Pending</option>
											<option value="on process">On Process</option>
											<option value="Completed">Completed</option>
										</select>
									</td>

								</tr>
							
								<tr>
									<th>Comments</th>
									<td><?php echo $row['status'];?><br>
										<textarea value="comment" name="comment" rows="3" cols="100" type="text"></textarea></td>
								</tr>
									<tr>
									<th></th>
									<td><input type="submit" name="submit" value="Go" ></td>
								</tr>
							</table></form> 
								
								
								
							<?php 
					if (isset($_POST['submit'])) {
						$id=$_POST['id'];
						$status = $_POST['status'];
						$comment = $_POST['comment'];
						$sql=	"UPDATE complaints SET status = '$status' , comment = '$comment' where id='$id'";
						$result = mysqli_query($con,$sql);


					 }}?> <?php
							} 
							else
							{
								"complaints ";
							}}
							else
							{
								echo "<center>zero complaints found</center>";
							}

				
								?>
						</div>
			</div>
			<style type="text/css">
				table,td,tr{
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