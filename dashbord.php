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
	 
	
	if (isset($_POST['search'])){
		$month = $_POST['month'];
		$year = $_POST['year'];
		
		$result1 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row1 = mysql_fetch_array($result1);
		$rayhanTotalMeal = $row1["rayhan_sum"];
		
		$result2 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row2 = mysql_fetch_array($result2);
		$roxyTotalMeal = $row2["roxy_sum"];

		$result3 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row3 = mysql_fetch_array($result3);
		$ayonTotalMeal = $row3["ayon_sum"];

		$result4 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row4 = mysql_fetch_array($result4);
		$tanverTotalMeal = $row4["tanver_sum"];
		
		$result5 = mysql_query("SELECT SUM(munna) AS munna_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row5 = mysql_fetch_array($result5);
		$munnaTotalMeal = $row5["munna_sum"];
		
		$result6 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row6 = mysql_fetch_array($result6);
		$sarzuTotalMeal = $row6["sarzu_sum"];
		
		//////////////////////////////////////////////
		
		$totalMeal = $rayhanTotalMeal +$roxyTotalMeal + $ayonTotalMeal +$tanverTotalMeal +$munnaTotalMeal +$sarzuTotalMeal;
		
		
		
		//////////////////////////////////////////////
		
									
		$result7 = mysql_query("SELECT SUM(taka) AS taka_sum FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row7 = mysql_fetch_array($result7);
		$totalBazar = $row7["taka_sum"];
		
		/////////////////////////////////////////////
		
									
		$result8 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row8 = mysql_fetch_array($result8); 
		$rayhanDeposit = $row8["rayhan_sum"];
		
		$result9 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row9 = mysql_fetch_array($result9);
		$roxyDeposit = $row9["roxy_sum"];
		
		$result10 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row10 = mysql_fetch_array($result10);
		$ayonDeposit = $row10["ayon_sum"];
		
		$result11 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row11 = mysql_fetch_array($result11);
		$tanverDeposit = $row11["tanver_sum"];
		
		$result12 = mysql_query("SELECT SUM(munna) AS munna_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row12 = mysql_fetch_array($result12);
		$munnaDeposit = $row12["munna_sum"];
		
		$result13 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
		$row13 = mysql_fetch_array($result13);
		$sarzuDeposit = $row13["sarzu_sum"];
		
	}
	else{
		$result1 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
		$row1 = mysql_fetch_array($result1);
		$rayhanTotalMeal = $row1["rayhan_sum"];
		
		$result2 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
		$row2 = mysql_fetch_array($result2);
		$roxyTotalMeal = $row2["roxy_sum"];

		$result3 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
		$row3 = mysql_fetch_array($result3);
		$ayonTotalMeal = $row3["ayon_sum"];

		$result4 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
		$row4 = mysql_fetch_array($result4);
		$tanverTotalMeal = $row4["tanver_sum"];
		
		$result5 = mysql_query("SELECT SUM(munna) AS munna_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
		$row5 = mysql_fetch_array($result5);
		$munnaTotalMeal = $row5["munna_sum"];
		
		$result6 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
		$row6 = mysql_fetch_array($result6);
		$sarzuTotalMeal = $row6["sarzu_sum"];
		
		//////////////////////////////////////////////
		
		$totalMeal = $rayhanTotalMeal +$roxyTotalMeal + $ayonTotalMeal +$tanverTotalMeal +$munnaTotalMeal +$sarzuTotalMeal;
		
		
		
		//////////////////////////////////////////////
		
									
		$result7 = mysql_query("SELECT SUM(taka) AS taka_sum FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
		$row7 = mysql_fetch_array($result7);
		$totalBazar = $row7["taka_sum"];
		
		/////////////////////////////////////////////
		
									
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
	}
	
	//////////////////////////////////////////////////
	
	$totalDeposit = $rayhanDeposit +$roxyDeposit + $ayonDeposit +$tanverDeposit +$munnaDeposit +$sarzuDeposit;
	
	//////////////////////////////////////////////////
	
	@$mealRate = $totalBazar / $totalMeal;
	
	//////////////////////////////////////////////////
	
	$rayhanExpense = $mealRate * $rayhanTotalMeal;
	$roxyExpense = $mealRate * $roxyTotalMeal;
	$ayonExpense = $mealRate * $ayonTotalMeal;
	$tanverExpense = $mealRate * $tanverTotalMeal;
	$munnaExpense = $mealRate * $munnaTotalMeal;
	$sarzuExpense = $mealRate * $sarzuTotalMeal;
	
	/////////////////////////////////////////////////
	
	$rayhan = $rayhanDeposit - $rayhanExpense;
	$roxy = $roxyDeposit - $roxyExpense;
	$ayon = $ayonDeposit - $ayonExpense;
	$tanver = $tanverDeposit - $tanverExpense;
	$munna = $munnaDeposit - $munnaExpense;
	$sarzu = $sarzuDeposit - $sarzuExpense;
	
	/////////////////////////////////////////////////
	
	$accountHas = $totalDeposit - $totalBazar;
	
	
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
	
	<div class="col-md-12 form-group animated rubberBand">
				
				<form method="POST" action="#">
				<fieldset>
					<div class="col-md-2">
						
						  <select name="month" class="form-control" id="sel1">                      
							  <option value="0">--Select Month--</option>
							  <option value="1">January</option>
							  <option value="2">February</option>
							  <option value="3">March</option>
							  <option value="4">April</option>
							  <option value="5">May</option>
							  <option value="6">June</option>
							  <option value="7">July</option>
							  <option value="8">August</option>		  
							  <option value="9">September</option>
							  <option value="10">October</option>
							  <option value="11">November</option>
							  <option value="12">December</option>
							
							</select>
							
						
					
					
				</div>
				<div class="col-md-2">
					<select name="year" class="form-control" id="sel1">
					 <option value="0">--Select Year--</option>
					  <option value="2015">2015</option>
					  <option value="2016">2016</option>
					  <option value="2017">2017</option>
					  <option value="2018">2018</option>
					  <option value="2019">2019</option>
					  <option value="2020">2020</option>
					
					</select>
				</div>
					<input type="submit" class="btn btn-primary"  value="Search" name="search" >
					
				&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
				<b>
					<font size="4" color="#191987">
						<?php
							if(isset($_POST['search'])){
								$monthNum = $_POST['month'];
								$yearName = $_POST['year'];
								if($monthNum==0 || $yearName == 0){
									echo '<font color="red"><b>'."Please Select MONTH and YEAR both.".'</b></font>';
								}
								else{
									$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
									echo $monthName.', '.$yearName; 
								}
							}else{
								echo date('F');
							}
						?>
					</font>
				</b>
				
				</fieldset>
				
				</form>
			</div>
	
	
	
	<div class="col-md-4">
		<h3 class=" animated fadeInDown"><b>Total Deposit</b></h3>
		<table class="table">
		<tbody>
			<tr>
				<td><h4>Rayhan Deposit:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $rayhanDeposit; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Roxy Deposit:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $roxyDeposit; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Ayon Deposit:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $ayonDeposit; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Tanver Deposit:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $tanverDeposit; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Munna Deposit:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $munnaDeposit; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Sarzu Deposit:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $sarzuDeposit; ?></h4></td>
			</tr>
		</tbody>
		</table>
	
	</div>
	
	<div class="col-md-4">
		<h3  class=" animated fadeInDown"><b>Total Expense </b>
			
			<button type="button" class="btn btn-default btn-xs" data-toggle="popover" data-trigger="hover" title="Formula" data-content="Expense = Total meal (per person) * Meal rate">?</button>
			
		</h3>
		<table class="table">
		<tbody>
			<tr>
				<td><h4>Rayhan Expense:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo round($rayhanExpense); ?></h4></td>
			</tr>
			<tr>
				<td><h4>Roxy Expense:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo round($roxyExpense); ?></h4></td>
			</tr>
			<tr>
				<td><h4>Ayon Expense:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo round($ayonExpense); ?></h4></td>
			</tr>
			<tr>
				<td><h4>Tanver Expense:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo round($tanverExpense); ?></h4></td>
			</tr>
			<tr>
				<td><h4>Munna Expense:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo round($munnaExpense); ?></h4></td>
			</tr>
			<tr>
				<td><h4>Sarzu Expense:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo round($sarzuExpense); ?></h4></td>
			</tr>
		</tbody>
		</table>
	</div>
	
	<div class="col-md-4">
		<h3 class=" animated fadeInDown"><b>Debit/Credit</b>
		
			<button type="button" class="btn btn-default btn-xs" data-toggle="popover" data-trigger="hover" title="Formula" data-content="Debit/Credit = total deposit - total expense">?</button>
			
		</h3>
		<table class="table">
		<tbody>
			<tr>
				<td><h4>Rayhan :</h4></td>
				<?php 
					if($rayhan < 0){
						echo'<td><h4 class="animated bounceInRight"><font color="red"><b>'.round($rayhan).'</b></font></h4></td>';
					}else{
						echo'<td><h4 class="animated bounceInLeft"><font color="blue"><b>'.round($rayhan).'</b></font></h4></td>';
					}
				?>
			</tr>
			
			<tr>
				<td><h4>Roxy :</h4></td>
				<?php 
					if($roxy < 0){
						echo'<td><h4 class="animated bounceInRight"><font color="red"><b>'.round($roxy).'</b></font></h4></td>';
					}else{
						echo'<td><h4 class="animated bounceInLeft"><font color="blue"><b>'.round($roxy).'</b></font></h4></td>';
					}
				?>
			</tr>
			<tr>
				<td><h4>Ayon :</h4></td>
				<?php 
					if($ayon < 0){
						echo'<td><h4 class="animated bounceInRight"><font color="red"><b>'.round($ayon).'</b></font></h4></td>';
					}else{
						echo'<td><h4 class="animated bounceInLeft"><font color="blue"><b>'.round($ayon).'</b></font></h4></td>';
					}
				?>
			</tr>
			<tr>
				<td><h4>Tanver :</h4></td>
				<?php 
					if($tanver < 0){
						echo'<td><h4 class="animated bounceInRight"><font color="red"><b>'.round($tanver).'</b></font></h4></td>';
					}else{
						echo'<td><h4 class="animated bounceInLeft"><font color="blue"><b>'.round($tanver).'</b></font></h4></td>';
					}
				?>
			</tr>
			<tr>
				<td><h4>Munna :</h4></td>
				<?php 
					if($munna < 0){
						echo'<td><h4 class="animated bounceInRight"><font color="red"><b>'.round($munna).'</b></font></h4></td>';
					}else{
						echo'<td><h4 class="animated bounceInLeft"><font color="blue"><b>'.round($munna).'</b></font></h4></td>';
					}
				?>
			</tr>
			<tr>
				<td><h4>Sarzu :</h4></td>
				<?php 
					if($sarzu < 0){
						echo'<td><h4 class="animated bounceInRight"><font color="red"><b>'.round($sarzu).'</b></font></h4></td>';
					}else{
						echo'<td><h4 class="animated bounceInLeft"><font color="blue"><b>'.round($sarzu).'</b></font></h4></td>';
					}
				?>
			</tr>
		</tbody>
		</table>
	</div>
	
	<div class="col-md-4">
		<h3 class=" animated fadeInDown"><b>Total Meal</b></h3>
		<table class="table">
			<tbody>
			<tr>
				<td><h4>Rayhan total Meal:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $rayhanTotalMeal; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Roxy total Meal:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $roxyTotalMeal; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Ayon total Meal:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $ayonTotalMeal; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Tanver total Meal:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $tanverTotalMeal; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Munna total Meal:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $munnaTotalMeal; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Sarzu total Meal:</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $sarzuTotalMeal; ?></h4></td>
			</tr>
			</tbody>
		</table>

	</div>
	
	<div class="col-md-4">
		<h3 class=" animated fadeInDown"><b>In Total</b></h3>
		<table class="table">
		<tbody>
			<tr>
				<td><h4>Total Deposit :</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $totalDeposit; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Total Bazar :</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $totalBazar; ?></h4></td>
			</tr>
			<tr>
				<td><h4>Total meal :</h4></td>
				<td><h4 class="animated bounceInLeft"><?php echo $totalMeal; ?></h4></td>
			</tr>
			<tr>
				<td><h4><font color="">Meal Rate :</font>
					<button type="button" class="btn btn-default btn-xs" data-toggle="popover" data-placement="top" data-trigger="hover" title="Formula" data-content="Meal rate = total Bazar / total Meal">?</button>
				</h4></td>
				<td><h4 class="animated bounceInLeft"><b><font color=""><?php echo round($mealRate,3); ?></font></b></h4></td>
			</tr>
			<tr>
				<td><h4><font color="#191987" size="5">Account has :</font>
					
					<button type="button" class="btn btn-default btn-xs" data-toggle="popover" data-placement="top" data-trigger="hover" title="Formula" data-content="Account has = total Deposit - total Bazar">?</button>
					
				</h4></td>
				<?php
					if($accountHas < 0){
						echo '<td><h4 class="animated bounceInLeft"><b><font color="red" size="6">'.$accountHas.'</font></b></h4></td>';
					}else{
						echo '<td><h4 class="animated bounceInLeft"><b><font color="#191987" size="6">'.$accountHas.'</font></b></h4></td>';
					}
				?>
				
			</tr>
			
		</tbody>
		</table>
	
	</div>
	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover(); 
		});
	</script>
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