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

	require_once "config.php";

	$user = $_SESSION["userName"];
	
	
	
	/////////////////////////////////
	

	$result1 = mysql_query("SELECT SUM($user) AS meal_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE())"); 

	$row1 = mysql_fetch_array($result1);

	$totalMeal = $row1["meal_sum"];

	/////////////////////////////////////////////

	$result8 = mysql_query("SELECT SUM($user) AS deposit_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE())"); 

	$row8 = mysql_fetch_array($result8); 

	$totalDeposit = $row8["deposit_sum"];

		if(isset($_POST['update']))

		{

			$password=$_POST["password"];

			$rePassword=$_POST["rePassword"];

			$user=$_SESSION["userName"];

			

			 if($password == $rePassword ){

			

				require_once "config.php";

				$result = mysql_query("SELECT * FROM user WHERE password='$password'");
				
				if(mysql_num_rows($result)>=1)
				{
					
					echo "<script type='text/javascript'>alert('Try another password')</script>";
					
				}
				else
				{
					
					$result = "update user set password='$password' where userName='$user'";

					$sql = mysql_query($result);
					echo "<script type='text/javascript'>alert('password change successfully')</script>";

					//////////////////////////////////////


					$user=$_SESSION["userName"];

					$date = date('d/m/Y h:i:s a', time());

					$comment = "password Changed";

					
					$log = "insert into  log(date,name,comment) Values('$date','$user','$comment')";

					mysql_query($log);

					
				}

			 }else{

				 $message ="Password does not match !!";

			 }

		}

		else if(isset($_POST['commentUpdate']))

		{
			$userComment=$_POST["comment"];

			require_once "config.php";
			
			$result = "update comment set comment='$userComment' where id=1";

			$sql = mysql_query($result);
			
			echo "<script type='text/javascript'>alert('Comment Update successfully')</script>";
			
			

			/////////////////////////////////////
			
			$user=$_SESSION["userName"];

			$date = date('d/m/Y h:i:s a', time());

			$comment = "Update Comment -- $userComment";

			
			$log = "insert into  log(date,name,comment) Values('$date','$user','$comment')";

			mysql_query($log);

		}



?>



<!Doctype html>

<html>

	<head>

		<title>Profile</title>
		<?php include('import.php');?>
		<link href="css/bootstrap.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">

		<link href="css/custom.css" rel="stylesheet">
		<link rel="shortcut icon" href="icon/favicon.ico">
	</head>

	

	<body class="container" style="background-color:#fdfdfd">

	

		<div class="col-md-12 column">

				<?php include('nav.php') ?>

		</div>

		

	<div class="col-md-6 animated bounceInLeft">

				<h3 style="text-transform: capitalize;">Name : <b><?php echo $_SESSION["userName"];?></b> </h3>

			<table class="table">

			<tbody>

				<tr>

					<td><h4>Total Meal:</h4></td>

					<td><h4><?php echo $totalMeal; ?></h4></td>

				</tr>

				<tr>

					<td><h4>Total Deposit:</h4></td>

					<td><h4><?php echo $totalDeposit; ?></h4></td>

				</tr>

				

			</tbody>

			</table>
			
			<?php
			require_once "config.php";

			
			$cmt = mysql_query("SELECT * FROM comment WHERE id = 1"); 

			$row10 = mysql_fetch_array($cmt);

			$showComment = $row10["comment"];
			
			?>
			
			<div class="col-md-10">
			  <form role="form" method="POST" action="#">
				<div class="form-group">
				  <label for="comment"><font size="3">Comment:</font></label>
				  <textarea class="form-control" maxlength="200" rows="5" id="comment" name="comment" style="resize:none"><?php echo $showComment;?></textarea>
				</div>
				<p>This comment is visible to everyone on home page</p>
				<input type="submit" class="btn  btn-success btn-block" value="Update" name="commentUpdate">

			  </form>
			</div>	

		
	</div>

		

		

		<div class="col-md-6">
		<center>
			<div class ="col-md-12  animated bounce">
				
				<img src="icon/<?php echo $_SESSION["userName"];?>.jpg" class="img-rounded" alt="User Photo" width="160" height="180">
			
			</div>
		</center>
		
			<form role="form" method="POST" action="#" class=" animated bounceInRight">

						<h3>Change Password</h3>

								<fieldset>

									<div class="form-group">

										

										New Password : 

										<input  class="form-control"  name="password" type="text" autocomplete="off" required/>

									</div>

									

									<div class="form-group">

										Re-enter Password:

										<input class="form-control"  name="rePassword" type="text" autocomplete="off" required/>

									</div>

									

									<input type="submit" class="btn  btn-success btn-block" value="Update" name="update">

									

								</fieldset>

							</form>

							<?php if(isset($message)){echo $message;} ?>

		</div>

	

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