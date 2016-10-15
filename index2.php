
<?php
	session_start();
	if(isset($_SESSION["userName"])){
		header('location:home.php');
	}
	else{
		
	}
	date_default_timezone_set('Asia/Dhaka');

?>

<?php 

if(isset($_POST['save']))
{
		$userName=$_POST['userName'];
		$password=$_POST['password'];
		
		require_once "config.php";	
		
		$result = mysql_query("SELECT * FROM user WHERE userName='$_POST[userName]' AND password='$_POST[password]'");
		
		
		
		if(mysql_num_rows($result)==1)
		{
			
			session_start();
			$_SESSION["userName"] = $userName;

			header('Location: home.php');
			
		}
		else
		{
			
			$Message="Invalid Username or Password !!";
		}
			//mysql_close($db);
		
	}

?>







<!DOCTYPE html>


<html>

	<head>
	
		<title>Log in</title>
		<meta name="keywords" content="meal, management, meal management, rayhan, byethost meal management, byethost meal">
		
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="shortcut icon" href="icon/favicon.ico">
		
	</head>




	<body class="bg" style="background-color:#fdfdfd">
		<div class="container imagebg">
			<div class="row margint">
				<div class="col-md-5 col-md-offset-4">
				
					<div class="">
						<div class="">
						
						
					
							<form action="#" method="POST" role="form">
								

								<fieldset>		
									<h1>Log In</h1></br>
									<div class="form-group fonts">
										User Name
										<input class="form-control" type="text" name="userName" style="text-transform: lowercase;" required autofocus/>
									</div>
									<div class="form-group fonts">
										Password
										<input class="form-control" type="password" name="password" required/>
									</div>
									
									<input type="submit" name="save" value="Log In" class="form-control btn  btn-primary btn-block"/>
								</fieldset>
						

								

						
							</form>
						</div>
					</div>
                    <?php 
						if(isset($Message)){
							echo '<h4 style="color:red"><b>'.$Message.'</b></h4>';
						}
					?>
                    
				</div>
				
			</div>
            <div class="container row col-mod-4 col-md-offset-4 footer margint">
				
					<p>Copyright  &copy; <?php echo date("Y"); ?> <a href="https://bd.linkedin.com/in/rayhanuddin55" target="_blank">Md. Rayhan Uddin</a></p>
				
				</div>
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