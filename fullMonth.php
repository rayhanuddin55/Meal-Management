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
			
			
<div class="col-md-6 ">		
	
			<h2 class=" animated fadeInDown">Meal Details</h2>
					<table class="table table-hover table-bordered animated bounceInLeft">
						
						<thead>
							<tr class="active">
								<th>Date</th>				  
								<th>Rayhan</th>
								<th>Roxy</th>
								<th>Ayon</th>
								<th>Tanver</th>
								<th>Munna</th>
								<th>Sarzu</th>
								<th width="10%">Edit</th>
							</tr>
						</thead>
						<tbody >	 

						<?php 
						
								require_once "config.php";
								
								//$id=$_SESSION['id'];
								
								if (isset($_POST['search'])){
									$month = $_POST['month'];
									$year = $_POST['year'];
									
									$sql ="SELECT * FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' order by date desc";

									$result1 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row1 = mysql_fetch_array($result1); 
									$result2 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row2 = mysql_fetch_array($result2);
									$result3 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row3 = mysql_fetch_array($result3);
									$result4 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row4 = mysql_fetch_array($result4);
									$result5 = mysql_query("SELECT SUM(munna) AS munna_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row5 = mysql_fetch_array($result5);
									$result6 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM meal WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row6 = mysql_fetch_array($result6);
								}
								else{
									$sql ="SELECT * FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) order by date desc";
								
									$result1 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
									$row1 = mysql_fetch_array($result1); 
									$result2 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
									$row2 = mysql_fetch_array($result2);
									$result3 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
									$row3 = mysql_fetch_array($result3);
									$result4 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
									$row4 = mysql_fetch_array($result4);
									$result5 = mysql_query("SELECT SUM(munna) AS munna_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
									$row5 = mysql_fetch_array($result5);
									$result6 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM meal WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
									$row6 = mysql_fetch_array($result6);
								}
								
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
									
									echo '<tr>';
									echo '<td class="active"><b>'.$row["date"].'</b></br>'.date('l',strtotime($row["date"])).'</td>';
									echo '<td>'.$row["rayhan"].'</td>';
									echo '<td>'.$row["roxy"].'</td>'; 
									echo '<td>'.$row["ayon"].'</td>';
									echo '<td>'.$row["tanver"].'</td>'; 
									echo '<td>'.$row["munna"].'</td>'; 
									echo '<td>'.$row["sarzu"].'</td>'; 
									
									$url="editMeal.php?id=".$row["date"];
									echo '<td>'.'<a class="btn btn-danger" href='. $url.'>Edit</a>'.'</td>';
									
								}
									echo '</tr>';
									echo '<tr  class="success">';
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
	
	
			<h2 class=" animated fadeInDown">Deposit List</h2>
					<table class="table table-hover table-bordered  animated bounceInLeft">
						<thead>
							<tr class="active">
								<th>Date</th>				  
								<th>Rayhan</th>
								<th>Roxy</th>
								<th>Ayon</th>
								<th>Tanver</th>
								<th>Munna</th>
								<th>Sarzu</th>
								<th width="10%">Edit</th>
							</tr>
						</thead>
						<tbody>



						<?php 
						
								require_once "config.php";
								
								//$id=$_SESSION['id'];
								
								
								if (isset($_POST['search'])){
									$month = $_POST['month'];
									$year = $_POST['year'];
									$sql ="SELECT * FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}'  order by id desc";

									$result1 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row1 = mysql_fetch_array($result1); 
									$result2 = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row2 = mysql_fetch_array($result2);
									$result3 = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row3 = mysql_fetch_array($result3);
									$result4 = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row4 = mysql_fetch_array($result4);
									$result5 = mysql_query("SELECT SUM(munna) AS munna_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row5 = mysql_fetch_array($result5);
									$result6 = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM deposit WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row6 = mysql_fetch_array($result6);
								}
								else{
									$sql ="SELECT * FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())  order by id desc";
								
									$result1 = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM deposit WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
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
								}
								
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
									echo '<tr class="success">';
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



<div class="col-md-6 ">
		<h2 class=" animated fadeInDown">Bazar List</h2>
					<table class="table table-hover table-bordered animated bounceInRight">
						<thead>
							<tr class="active">
								<th >No.</th>
								<th width="20%">Date</th>	
								<th width="45%">Name</th>
								<th>Taka</th>
								<th width="10%">Edit</th>
								
							</tr>
						</thead>
						<tbody>



                        <?php 
						
								require_once "config.php";
								
								//$id=$_SESSION['id'];
								
								
								if (isset($_POST['search'])){
									$month = $_POST['month'];
									$year = $_POST['year'];
									$sql ="SELECT * FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}'  order by id desc";

									$result1 = mysql_query("SELECT SUM(taka) AS taka_sum FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' "); 
									$row1 = mysql_fetch_array($result1); 
									
								}
								else{
									$sql ="SELECT * FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())  order by id desc";
								
									$result1 = mysql_query("SELECT SUM(taka) AS taka_sum FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) "); 
									$row1 = mysql_fetch_array($result1); 
								}
								
								
								$result = mysql_query($sql);
								
								$x = mysql_num_rows($result);
								
								while($row=mysql_fetch_array($result))
								{	
									
									
									echo '<tr >';
									
									echo '<td>'.$x--.'</td>';
									echo '<td class="active"><b>'.$row["date"].'</b></br>'.date('l',strtotime($row["date"])).'</td>';
									echo '<td>'.$row["name"].'</td>';
									echo '<td>'.$row["taka"].'</td>';
									
									$url="editBazar.php?id=".$row["id"];
		 							echo '<td>'.'<a class="btn btn-danger" href='. $url.'>Edit</a>'.'</td>';
									
									echo '</tr>';
								}
								
									echo '<tr class="success">';
									
									echo '<td></td>';
									echo '<td><b>'."Total".'</b></td>';
									echo '<td></td>';
									echo '<td><b>'.$row1["taka_sum"].'</b></td>';
									
									echo '</tr>';
								//mysql_close($db);

									
						?>

						</tbody>
						
					</table>
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