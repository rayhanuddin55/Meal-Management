<?php
	session_start();
	if(!$_SESSION["userName"]){
		header('location:index.php');
	}	else{
	}
	date_default_timezone_set('Asia/Dhaka');
?>
<?php
	if(isset($_POST['add']) && isset($_SESSION["userName"]))
	{
		$date=$_POST["date"];
		$rayhan=$_POST["rayhan"];
		$roxy=$_POST["roxy"];
		$ayon=$_POST["ayon"];
		$tanver=$_POST["tanver"];
		$munna=$_POST["munna"];
		$sarzu=$_POST["sarzu"];
		
		require_once "config.php";
		
		if($rayhan == null && $roxy == null && $ayon == null && $tanver == null && $munna == null && $sarzu == null ){
			$msg ="All Fields are Empty !!";
		}else{
			$result = "insert into  deposit(date,rayhan,roxy,ayon,tanver,munna, sarzu) Values('$date','$rayhan','$roxy','$ayon','$tanver', '$munna', '$sarzu')";
			$sql= mysql_query($result);
			//////////////////////////////////////
			$user=$_SESSION["userName"];
			$date1 = date('d/m/Y h:i:s a', time());
			$comment = "Add Deposit on ".$date." (Rayhan:".$rayhan." Roxy:".$roxy." Ayon:".$ayon." Tanver:".$tanver." Munna:".$munna." Sarzu:".$sarzu.")";
			
			$log = "insert into  log(date,name,comment) Values('$date1','$user','$comment')";
			mysql_query($log);
			
			//////////////////////////////////////
			//echo "<script type='text/javascript'>alert('taka Deposit Seccessfully !!')</script>";
			$messageForModal = "Deposit Seccessfully!";   // this variable use in modal
		}
	}
?>

<!Doctype html>
<html>
	<head>
		<title>Deposit</title>
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
		
		<form method="POST" action="#" class="form-horizontal col-md-4 animated bounceInLeft">
				
				<h2>New Dposite</h2>
				<div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label">Date</label>
				<div class="col-sm-7">
				  <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" />
				</div>
			  </div>
				
			
			  <div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label">Rayhan</label>
				<div class="col-sm-4">
				  <input type="number" min="1" max="1999" class="form-control" name="rayhan" autocomplete="off"/>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label">Roxy</label>
				<div class="col-sm-4">
				  <input type="number" min="1" max="1999" class="form-control" name="roxy" autocomplete="off"/ >
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label">Ayon</label>
				<div class="col-sm-4">
				  <input type="number" min="1" max="1999" class="form-control" name="ayon" autocomplete="off"/>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label">Tanver</label>
				<div class="col-sm-4">
				  <input type="number" min="1" max="1999" class="form-control" name="tanver" autocomplete="off"/>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label">Munna</label>
				<div class="col-sm-4">
				  <input type="number" min="1" max="1999" class="form-control" name="munna" autocomplete="off"/>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputtext3" class="col-sm-2 control-label">Sarzu</label>
				<div class="col-sm-4">
				  <input type="number" min="1" max="1999" class="form-control" name="sarzu" autocomplete="off"/>
				</div>
			  </div>
			  
			  
			  
			  <input type="submit" class="btn btn-success btn-block " value="Add" name="add">
			  <?php 
				if(isset($msg)){
					echo '<h4 style="color:red"><b>'.$msg.'</b></h4>';
				}
			  ?>
		</form>
		
		<div class="col-md-8">
			<h2 class=" animated fadeInDown">Deposite Details<font size="4"><?php echo " (".date('F').")";?></font></h2>
					<table class="table table-hover table-bordered animated bounceInUp">
						<thead>
							<tr class="active">
								<th width="18%">Date</th>				  
								<th width="12%">Rayhan</th>
								<th width="12%">Roxy</th>
								<th width="12%">Ayon</th>
								<th width="12%">Tanver</th>
								<th width="12%">Munna</th>
								<th width="12%">Sarzu</th>
								<th width="10%">Edit</th>
							</tr>
						</thead>
						<tbody>



                        <?php 
						
								require_once "config.php";
								
								//$id=$_SESSION['id'];
								$sql ="SELECT * FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())  order by id desc";
								
								$result1 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE())  AND YEAR(date) = YEAR(CURDATE()) "); 
								$row1 = mysql_fetch_array($result1);
								$result2 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
								$row2 = mysql_fetch_array($result2);
								$result3 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
								$row3 = mysql_fetch_array($result3);
								$result4 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
								$row4 = mysql_fetch_array($result4);
								$result5 = mysql_query("SELECT SUM(munna) AS munna_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
								$row5 = mysql_fetch_array($result5);
								$result6 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
								$row6 = mysql_fetch_array($result6);
								//echo"Connection get";
								
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result))
								{	
									if($row["rayhan"]==0){
										$row["rayhan"]="-";
									}if($row["roxy"]==0){
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
									echo '<td class="active"><b>'.$row["date"].'</b></br>'.date('l',strtotime($row["date"])).'</td>';
									echo '<td>'.$row["rayhan"].'</td>';
									echo '<td>'.$row["roxy"].'</td>'; 
									echo '<td>'.$row["ayon"].'</td>';
									echo '<td>'.$row["tanver"].'</td>'; 
									echo '<td>'.$row["munna"].'</td>'; 
									echo '<td>'.$row["sarzu"].'</td>';
									$url="editDeposit.php?id=".$row["id"];
		 							echo '<td>'.'<a class="btn btn-danger" href='. $url.'>Edit</a>'.'</td>';
									
									echo '</tr>';
									
										
								}
								echo '</tr>';
									echo '<tr class="success" >';
									echo '<td><b>'."Total".'</b></td>';
									echo '<td><b>'.$row1["rayhan_sum"].'</b></td>';
									echo '<td><b>'.$row2["roxy_sum"].'</b></td>';
									echo '<td><b>'.$row3["ayon_sum"].'</b></td>';
									echo '<td><b>'.$row4["tanver_sum"].'</b></td>';
									echo '<td><b>'.$row5["munna_sum"].'</b></td>';
									echo '<td><b>'.$row6["sarzu_sum"].'</b></td>';
									echo '</tr>';
								//mysql_close($db);

									
						?>

						</tbody>
						
					</table>
		</div>
		
		<!------------ Modal ------------>
		
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