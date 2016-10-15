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
	if(isset($_POST['addMeal']) && isset($_SESSION["userName"])){
		$date=$_POST["mealdate"];
		$rayhan=$_POST["rayhan"];
		$roxy=$_POST["roxy"];
		$ayon=$_POST["ayon"];
		$tanver=$_POST["tanver"];
		$munna=$_POST["munna"];
		$sarzu=$_POST["sarzu"];
		
		require_once "config.php";
		
		$sql ="SELECT * FROM meal order by date desc limit 1";
		$result = mysql_query($sql);
		$row=mysql_fetch_array($result);
		
		$flag ="";
		
		$date1=date_create($row["date"]);
		$date2=date_create($date);
		(int)$diff = date_diff($date1,$date2)->format("%R%a"); 
		
		if($diff == 1){
			$result = "insert into  meal(date,rayhan,roxy,ayon,tanver,munna, sarzu) Values('$date','$rayhan','$roxy','$ayon','$tanver', '$munna', '$sarzu')";
			$sql= mysql_query($result);
			$flag=1;
				
		}
		else if($diff > 1 ){
			$MealAddMessage = "Add Pervious Meals First";
			$flag =0;
		}
		else if($diff <= 0){
			$MealAddMessage = "Meal was allready added on this date";
			$flag =0;
		}
		
		if($flag ==1){
			$user=$_SESSION["userName"];
			$date1 = date('d/m/Y h:i:s a', time());
			$comment = "Add Meal on ".$date."".'</br>'." (Rayhan:".$rayhan." Roxy:".$roxy." Ayon:".$ayon." Tanver:".$tanver." Munna:".$munna." Sarzu:".$sarzu.")";
			
			$log = "insert into  log(date,name,comment) Values('$date1','$user','$comment')";
			mysql_query($log);
			//echo "<script type='text/javascript'>alert('Meal Add Successfully!')</script>";
			
			$messageForModal = "Meal Add Successfully!"; // this variable use in modal
		}
						
	}
		
	else if(isset($_POST['addBazar']) && isset($_SESSION["userName"]))
	{
		
		$date=$_POST["bazardate"];
		$bazarName=$_POST["bazarName"];
		$taka=$_POST["taka"];
		
		require_once "config.php";
		
		$result = "insert into  bazar(date,name,taka) Values('$date','$bazarName','$taka')";
		$sql= mysql_query($result);
		
			
		//////////////////////////////////////
			
		$user=$_SESSION["userName"];
		$date6 = date('d/m/Y h:i:s a', time());
		$comment = "Add Bazar on ".$date." (".$bazarName.": ".$taka." taka)";
		
		$log = "insert into  log(date,name,comment) Values('$date6','$user','$comment')";
		mysql_query($log);
		
		//////////////////////////////////////
		//echo "<script type='text/javascript'>alert('Bazar Add Successfully !!')</script>";
		$messageForModal = "Bazar Add Successfully!"; // this variable use in modal
				
	}


?>



<!Doctype html>
<html>
	<head>
		<title>Home</title>
		<?php include('import.php');?>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link rel="shortcut icon" href="icon/favicon.ico">
	</head>
	
	<body class="container" style="background-color:#fdfdfd">
	
		<div class="col-md-12 column">
				<?php include('nav.php') ?>
				<?php
						///// For marquee tag
						require_once "config.php";

						
						$cmt = mysql_query("SELECT * FROM comment WHERE id = 1"); 

						$row10 = mysql_fetch_array($cmt);

						$showComment = $row10["comment"];
						
				?>
				
					<?php 
						
						if(!NULL == $showComment){
							echo'<marquee><b><font size="4">'.$showComment.'</font></b></marquee>';
						}else{
							
						}
					?>
					 

				
		</div>
		
		<div class="col-md-4 animated bounceInLeft">
			<div class="col-md-12">
				<form method="POST" action="#" class="form-horizontal">
					
					<h2 style="display:inline;" >Add Meal</h2>
				  <div class="form-group">
					<label for="inputtext3" class="col-sm-2 control-label"><font color="blue">Date</font></label>
					<div class="col-sm-7">
					  <input type="date" class="form-control" name="mealdate" value="<?php echo date('Y-m-d'); ?>" />
					</div>
				  </div>
					
				
				  <div class="form-group">
					<label for="inputtext3" class="col-sm-2 control-label">Rayhan</label>
					<div class="col-sm-4">
					  <input type="number" min="0" max="10" step=".5" class="form-control" name="rayhan" autocomplete="off"/>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="inputtext3" class="col-sm-2 control-label">Roxy</label>
					<div class="col-sm-4">
					  <input type="number" min="0" max="10" step=".5" class="form-control" name="roxy" autocomplete="off"/>
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputtext3" class="col-sm-2 control-label">Ayon</label>
					<div class="col-sm-4">
					  <input type="number" min="0" max="10" step=".5" class="form-control" name="ayon" autocomplete="off"/>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="inputtext3" class="col-sm-2 control-label">Tanver</label>
					<div class="col-sm-4">
					  <input type="number" min="0" max="10" step=".5" class="form-control" name="tanver" autocomplete="off"/>
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputtext3" class="col-sm-2 control-label">Munna</label>
					<div class="col-sm-4">
					  <input type="number" min="0" max="10" step=".5" class="form-control" name="munna" autocomplete="off"/>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="inputtext3" class="col-sm-2 control-label">Sarzu</label>
					<div class="col-sm-4">
					  <input type="number" min="0" max="10" step=".5" class="form-control" name="sarzu" autocomplete="off"/>
					</div>
				  </div>
				  
				  <?php
					if(isset($MealAddMessage)){
						echo '<center><p class="animated shake"><font color="red" size="4"><strong>'.$MealAddMessage.'</strong></font></p></center>';
						
					}else{
						echo '<center><p><font color="blue"><strong>Please check the DATE</strong></font></p></center>';
					}
				  
				  ?>
				  
				  <input type="submit" class="btn btn-success btn-block " value="Add" name="addMeal">
				  
				</form>
			</div>
			<div class="col-md-12">
				<form method="POST" action="#" class="form-horizontal">
					<h2 >Add Bazar</h2>
					
					<div class="form-group">
						<label for="inputtext3" class="col-sm-2 control-label">Date</label>
						<div class="col-sm-7">
							<input type="date"  class="form-control" name="bazardate" value="<?php echo date('Y-m-d'); ?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputtext3" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Enter Name" name="bazarName" >
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputtext3" class="col-sm-2 control-label">Amount</label>
						<div class="col-sm-10 ">
							<input  autocomplete="off" placeholder="Taka"  type="number" min="1" max="10000" class="form-control" name="taka" required/>
							
						</div>	
									
					</div>
				  <input type="submit" class="btn btn-success btn-block " value="Add" name="addBazar">
				</form>
			</div>
			</br>
		</div>
		
		 <?php // check for meal add or not
						
				require_once "config.php";
				
				$sql ="SELECT * FROM meal WHERE MONTH(date) = MONTH(CURDATE()) order by date desc limit 1";
				
				$result = mysql_query($sql);
				
				$row=mysql_fetch_array($result);
				
				
				
				// Check missing day for adding meal
				if($row["date"] != date("Y-m-d")){
					if($row["date"] != date("Y-m-d") && date("Y-m-d H:i:s") > date("Y-m-d 18:00:00")){
						$mealAddOrNot = 1 ;
					}
					if($row["date"] != date("Y-m-d", strtotime('-1 day')) && date("Y-m-d H:i:s") < date("Y-m-d 03:00:00")){
						$mealAddOrNot = 2 ;
					}
					if($row["date"] != date("Y-m-d", strtotime('-1 day')) && date("Y-m-d H:i:s") > date("Y-m-d 03:00:00")){
						$mealAddOrNot = 3;
					}
					if($row["date"] != date("Y-m-d", strtotime('-2 day')) && $row["date"] != date("Y-m-d", strtotime('-1 day'))){
						$mealAddOrNot = 4;
					}
				}
					
		?>
		
		<div class="col-md-8">
			<h2 style="display:inline;" class=" animated fadeInDown">Meal Details </h2><h4 style="display:inline;" class=" animated fadeInDown">(Last 9 days) </h4>
			&nbsp &nbsp
				<h4 style="display:inline; color:red;" class="blink_me">
					<b>
						<?php 
							if(@$mealAddOrNot==1){
								echo "Please Add Today's Meal";
							}else if(@$mealAddOrNot==2){
								echo "Add Today's Meal. Make sure you change the date";
							}else if(@$mealAddOrNot==3){
								echo "Please Add Yesterday's Meal";
							}else if(@$mealAddOrNot==4){
								echo "! ! ! Last Some Days are MISSING ! ! !";
							}
						?>
					</b>
				</h4>
			
			
					<table class="table table-hover table-bordered animated bounceInRight">
						<thead>
							<tr class="active">
								<th width="16%">Date</th>				  
								<th width="14%">Rayhan</th>
								<th width="14%">Roxy</th>
								<th width="14%">Ayon</th>
								<th width="14%">Tanver</th>
								<th width="14%">Munna</th>
								<th width="14%">Sarzu</th>
							</tr>
							 <tbody>



                        <?php 
						
								require_once "config.php";
								
								//$id=$_SESSION['id'];
								$sql ="SELECT * FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) order by date desc limit 9";
								
								//echo"Connection get";
								
								$result = mysql_query($sql);
								
								
								while($row=mysql_fetch_array($result))
								{	
									if($row["rayhan"]==0){
										$row["rayhan"]="-";
									}
									if($row["roxy"]==0){
										$row["roxy"]="-";
									}
									if($row["ayon"]==0){
										$row["ayon"]="-";
									}
									if($row["tanver"]==0){
										$row["tanver"]="-";
									}
									if($row["munna"]==0){
										$row["munna"]="-";
									}
									if($row["sarzu"]==0){
										$row["sarzu"]="-";
									}
									
								
									
									
									echo '<tr >';
									echo '<th class="active">'.$row["date"].'</th>';
									echo '<td>'.$row["rayhan"].'</td>';
									echo '<td>'.$row["roxy"].'</td>'; 
									echo '<td>'.$row["ayon"].'</td>';
									echo '<td>'.$row["tanver"].'</td>'; 
									echo '<td>'.$row["munna"].'</td>'; 
									echo '<td>'.$row["sarzu"].'</td>'; 
									
									echo '</tr>';
									
										
								}
								//mysql_close($db);

									
						?>

                    </tbody>
							
					</thead>
						
				</table>
			
		</div>
		
		
		
		
			
	
		
			<div class="col-md-4">
				<h2 style="display:inline;" class=" animated fadeInDown">Bazar List </h2><h4 style="display:inline;" class=" animated fadeInDown">(Last 5 bazar)</h4>
					<table class="table table-hover table-bordered  animated flipInY">
						<thead>
							<tr class="active">
								<th>Date</th>
								<th width="50%">Name</th>
								<th>Taka</th>
								
							</tr>
							 <tbody>



                        <?php 
						
								require_once "config.php";
								
								//$id=$_SESSION['id'];
								$sql ="SELECT * FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())  order by id desc limit 5";
								
								//echo"Connection get";
								
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result))
								{									
									echo '<tr >';
									echo '<th class="active">'.$row["date"].'</th>';
									echo '<td>'.$row["name"].'</td>';
									echo '<td>'.$row["taka"].'</td>';
									 
									
									echo '</tr>';
									
										
								}
								//mysql_close($db);

									
						?>

                    </tbody>
							
						</thead>
						<tbody>

						</tbody>
						</table>
				</br>
		</div>
		
		
		<div class="col-md-4">
			<h2 style="display:inline;" class=" animated fadeInDown">Deposit List</h2> <h4 style="display:inline;" class=" animated fadeInDown">(<?php echo date('F');?>)</h4>
				<?php
					require_once "config.php";
					
					$result8 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
					$row8 = mysql_fetch_array($result8); 
					$rayhanDeposit = $row8["rayhan_sum"];
					
					$result9 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
					$row9 = mysql_fetch_array($result9);
					$roxyDeposit = $row9["roxy_sum"];
					
					$result10 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
					$row10 = mysql_fetch_array($result10);
					$ayonDeposit = $row10["ayon_sum"];
					
					$result11 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
					$row11 = mysql_fetch_array($result11);
					$tanverDeposit = $row11["tanver_sum"];
					
					$result12 = mysql_query("SELECT SUM(munna) AS munna_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
					$row12 = mysql_fetch_array($result12);
					$munnaDeposit = $row12["munna_sum"];
					
					$result13 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
					$row13 = mysql_fetch_array($result13);
					$sarzuDeposit = $row13["sarzu_sum"];
				?>
			</br>
			<table class="table borderless  animated bounceInRight">
				<tbody>
				  
					<tr>
						<td><font size="4">Rayhan Deposit</font></td>
						<td><font size="4"><?php echo $rayhanDeposit; ?></font></td>
					</tr>
					
					<tr>
						<td><font size="4">Roxy Deposit</font></td>
						<td><font size="4"><?php echo $roxyDeposit; ?></font></td>
					</tr>
					<tr>
						<td><font size="4">Ayon Deposit</font></td>
						<td><font size="4"><?php echo $ayonDeposit; ?></font></td>
					</tr>
					<tr>
						<td><font size="4">Tanver Deposit</font></td>
						<td><font size="4"><?php echo $tanverDeposit; ?></font></td>
					</tr>
					<tr>
						<td><font size="4">Munna Deposit</font></td>
						<td><font size="4"><?php echo $munnaDeposit; ?></font></td>
					</tr>
					<tr>
						<td><font size="4">Sarzu Deposit</font></td>
						<td><font size="4"><?php echo $sarzuDeposit; ?></font></td>
					</tr>
					
					
				</tbody>
			</table>
			
		</div>
		
		<!---------------------- Modal ------------------------>
		 
		<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
						</button>
						 <h4 class="modal-title" id="memberModalLabel">Warning !!</h4>

					</div>
					<div class="modal-body">
						<h2 style="text-transform: capitalize;"><b>hi <?php echo $_SESSION["userName"].'</b>'."... ".'<font size="5">'."it's ".'<font style="font-style: italic; color: #000099 ">'.date("jS \ F, Y").'</font></font>';  ?></h2>
						<h3 style="color: red;"><b>Please add meals.</b></h3>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'GET')
			{
				if(isset($mealAddOrNot))
				{
					echo "<script>
						$(document).ready(function () {

							$('#memberModal').modal('show');

						});
					</script>";
				}
			}
		?>
		
		
		<div class="modal fade" id="successModal" role="dialog">
			<div class="modal-dialog modal-sm">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title">Success !!</h4>
				</div>
				<div class="modal-body">
				  <h3 style="color:green;"><b><?php echo $messageForModal; ?></b></h3>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				</div>
			  </div>
			</div>
		</div>
		<?php
			
			if(isset($messageForModal))
			{
				echo "<script>
					$(document).ready(function () {

						$('#successModal').modal('show');

					});
				</script>";
			}
			
		?>
		
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