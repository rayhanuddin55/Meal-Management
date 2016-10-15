<?php
	session_start();
	if(!$_SESSION["userName"]){
		header('location:index.php');
	}
	else{
		
	}
	date_default_timezone_set('Asia/Dhaka');

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<?php include('import.php');?>
		<link rel="shortcut icon" href="icon/favicon.ico">
	</head>
	
<body class="container" style="background-color:#fdfdfd">
	<div class="col-md-12 column">
		<?php include('nav.php'); ?>
	</div>
	
	<center>
	<div class="">
	
		<h2 class=" animated fadeInDown">Activity Details</h2>
				<table class="table table-hover animated fadeIn" style="margin: 0 auto;width:70%">
					
					<thead>
						<tr class="active">
							
							<th width="22%">Execution time</th>				  
							<th>User</th>
							<th>Activities</th>
							
						</tr>
					</thead>	 
					<tbody >


						<?php 
						
							require_once "config.php";
							
							//$id=$_SESSION['id'];
							
							if(isset($_POST["showAllLog"])){
								$sql ="SELECT * FROM log order by id desc";
							}
							else{
								$sql ="SELECT * FROM log order by id desc limit 100";
							}
							
							$result = mysql_query($sql);
							
							//$x = mysql_num_rows($result);
							
							while($row=mysql_fetch_array($result))
							{									
								echo '<tr >';
								//echo '<td>'.$x--.'</td>';
								echo '<td>'.$row["date"].'</td>';
								echo '<td style="text-transform: capitalize;">'.$row["name"].'</td>';
								echo '<td>'.$row["comment"].'</td>'; 
								
								echo '</tr>';
							}
							
							if(!isset($_POST["showAllLog"])){
								echo '<tr >';
									echo '<td></td>';
									echo '<td></td>';
									echo '<form action="#" method="POST">
												<td><button type="submit" name="showAllLog" class="btn btn-link">Show All Activity</button></td>
											</form>';
								echo '</tr>';
							}
								
						?>

					</tbody>
							
				</table>
		
</div>
</br>
	</center>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-68840603-1', 'auto');
	  ga('send', 'pageview');

	</script>
</body>

</html>