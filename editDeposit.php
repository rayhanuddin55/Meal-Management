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
		$date="";

	$rayhan="";
	$roxy="";
	$ayon="";
	$tanver="";
	$munna="";
	$sarzu="";


		if(isset($_POST['update']) && isset($_SESSION["userName"]))
		{
			
			@$date=$_POST["date"];
			$rayhan=$_POST["rayhan"];
			$roxy=$_POST["roxy"];
			$ayon=$_POST["ayon"];
			$tanver=$_POST["tanver"];
			$munna=$_POST["munna"];
			$sarzu=$_POST["sarzu"];
			 
			require_once "config.php";
			
			//////////////////// receive previous data for log table
			
			$result = "Select * from deposit where id='$id'";
			$query = mysql_query($result);
			
			while($row=mysql_fetch_array($query))
			{
				
				$date1=$row["date"];
				$rayhan1=$row["rayhan"];
				$roxy1=$row["roxy"];
				$ayon1=$row["ayon"];
				$tanver1=$row["tanver"];
				$munna1=$row["munna"];
				$sarzu1=$row["sarzu"];
				
				
			}
			
			//////////////////////////////
			 
				$result = "update deposit set rayhan='$rayhan' , roxy='$roxy', ayon='$ayon', tanver='$tanver', munna='$munna', sarzu='$sarzu' where id='$id'";
				$sql = mysql_query($result);
				
				
				//////////////////////////////////////
				
				$user=$_SESSION["userName"];
				$date2 = date('d/m/Y h:i:s a', time());
				$comment = '<b>'."Edit Deposit".'</b>'." on ".$date1."".'</br>'."(Rayhan: ".$rayhan1."->".$rayhan." roxy: ".$roxy1."->".$roxy." ayon: ".$ayon1."->".$ayon." tanver: ".$tanver1."->".$tanver." munna: ".$munna1."->".$munna." sarzu: ".$sarzu1."->".$sarzu.")";
				
				$log = "insert into  log(date,name,comment) Values('$date2','$user','$comment')";
				mysql_query($log);
				
				//////////////////////////////////////
				//echo "<script type='text/javascript'>alert('Update ok')</script>";
				header('Location: deposit.php');
		}
		else 
		{
			require_once "config.php";
			
			$result = "Select * from deposit where id='$id'";
			$query = mysql_query($result);
			
			while($row=mysql_fetch_array($query))
			{
				
				$date=$row["date"];
				$rayhan=$row["rayhan"];
				$roxy=$row["roxy"];
				$ayon=$row["ayon"];
				$tanver=$row["tanver"];
				$munna=$row["munna"];
				$sarzu=$row["sarzu"];
				
				
			}
			//mysql_close($db);
		}
		
?>




<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>Edit Deposit</title>
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
							<h3 class="panel-title">Edit Deposit</h3>
						</div>
						<div class="panel-body">
							<form role="form" method="POST" action="#">
								<fieldset>
									<div class="form-group">
										Date : 
										<input disabled class="form-control"  name="date" type="text" value="<?php echo $date; ?>">
									</div>
									
									<div class="form-group">
										Rayhan
										<input class="form-control"  name="rayhan" type="number" min="0" max="1999" value="<?php echo $rayhan; ?>">
									</div>
									
									<div class="form-group">
										
											Roxy 
										<input class="form-control"  name="roxy" type="number" min="0" max="1999"  value="<?php echo $roxy; ?>">
									</div>
									
									
									<div class="form-group">
										Ayon
										<input class="form-control" name="ayon" type="number" min="0" max="1999" value="<?php echo $ayon; ?>">
									</div>
									
									<div class="form-group">
										Tanver
										<input class="form-control"  name="tanver" type="number" min="0" max="1999" value="<?php echo $tanver; ?>">
									</div>
									
									<div class="form-group">
										Munna
										<input class="form-control"  name="munna" type="number" min="0" max="1999" value="<?php echo $munna; ?>">
									</div>
									
									<div class="form-group">
										Sarzu
										<input class="form-control"  name="sarzu" type="number" min="0" max="1999" value="<?php echo $sarzu; ?>">
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