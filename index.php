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
	
	if($userName != null){
		
		$result = mysql_query("SELECT * FROM user WHERE userName='$_POST[userName]' AND password='$_POST[password]'");
		
	}else{
		$result = mysql_query("SELECT * FROM user WHERE password='$_POST[password]'");
	}
	
	
	
	if(mysql_num_rows($result)==1)
	{
		
		session_start();
		
		$rows = mysql_fetch_array($result);
		
		$_SESSION["userName"] = $rows["userName"];

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
<html lang="en">
  <head>
  <title>Log in</title>
    <?php include('import.php');?>
	<link href="css/forLoginPage.css" rel="stylesheet">
	<link rel="shortcut icon" href="icon/favicon.ico">
  </head>
	
  <body style="overflow: hidden;">

    <div class="container" >

      <form class="form-signin" action="#" method="POST">
        <h2 class="form-signin-heading animated bounceInDown">Log In</h2>
        <label for="inputEmail" class="sr-only">User name</label>
        <input id="inputEmail" class="form-control animated bounceInLeft" placeholder="Username" name="userName" style="text-transform: lowercase;" autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control animated bounceInRight" placeholder="Password" name="password" required>
        
        <button class="btn btn-lg btn-primary btn-block animated fadeInDown" type="submit" name="save">Enter</button>
		</br>
		<?php 
			if(isset($Message)){
				echo '<h4 style="color:red" class="animated shake"><b>'.$Message.'</b></h4>';
			}
		?>
		<p class=" animated rubberBand">Copyright  &copy; <?php echo date("Y"); ?> <a href="https://bd.linkedin.com/in/rayhanuddin55" target="_blank">Md. Rayhan Uddin</a></p>

      </form>
	  
    </div> <!-- /container -->
	
	
	<img class="animated flipInX" src="icon/village.jpg" height="300px" width="100%" alt="village-pic"> 
	  
	
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
