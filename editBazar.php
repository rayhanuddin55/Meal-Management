<?php
	session_start();
	if(!$_SESSION["userName"]){
		header('location:index.php');
	}
	else{
		
	}
	date_default_timezone_set('Asia/Dhaka');

?>

<?php
	$id=$_GET['id'];
	require_once "config.php";
	$taka="";
	


		if(isset($_POST['update']) && isset($_SESSION["userName"]))
		{
			
			$id=$id;
			@$date=$_POST["date"];
			$taka=$_POST["taka"];
		
			 
			require_once "config.php";
			
			///////////////////////// receive previous data for log table
			
			$result = "Select * from bazar where id='$id'";
			$query = mysql_query($result);
			
			while($row=mysql_fetch_array($query))
			{
				
				$date2=$row["date"];
				$taka1=$row["taka"];
				$name1=$row["name"];
				
			}
			////////////////////////////////
			
			 
				$result = "update bazar set taka='$taka'  where id='$id'";
				$sql = mysql_query($result);
			
				//////////////////////////////////////
				
				$user=$_SESSION["userName"];
				$date1 = date('d/m/Y h:i:s a', time());
				$comment = '<b>'."Edit Bazar ".'</b>'."on ".$date2." (".$name1.": ".$taka1."->".$taka.")";
				
				$log = "insert into  log(date,name,comment) Values('$date1','$user','$comment')";
				mysql_query($log);
				
				//////////////////////////////////////
				//echo "<script type='text/javascript'>alert('Update ok')</script>";
				header('Location: fullMonth.php');
		}
		else 
		{
			require_once "config.php";
			
			$result = "Select * from bazar where id='$id'";
			$query = mysql_query($result);
			
			while($row=mysql_fetch_array($query))
			{
				
				$date=$row["date"];
				$taka=$row["taka"];
				
				
				
			}
			//mysql_close($db);
		}

?>




<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>Edit Bazar</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="icon/favicon.ico">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body class="container">

<div class="container">

		<div class="container">
		
			<div class="col-md-12 column">
				<?php include('nav.php') ?>
			</div>


			<div class="row margint2">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Edit Bazar</h3>
						</div>
						<div class="panel-body">
							<form role="form" method="POST" action="#">
								<fieldset>
									<div class="form-group">
										
											Date : 
										<input disabled class="form-control"  name="date" type="text" value="<?php echo $date; ?>">
									</div>
									
									<div class="form-group">
										Taka
										<input class="form-control"  name="taka" type="number" min="0" max="10000" value="<?php echo $taka; ?>">
									</div>
									
									
									
									
									<!-- Change this to a button or input when using this as a form -->
									
									<input type="submit" class="btn  btn-success btn-block" value="Update" name="update">
									
									
									
									
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

     <?php  //echo $Message; ?>

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