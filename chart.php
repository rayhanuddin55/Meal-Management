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
		
		//// for activity count
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='rayhan' AND date LIKE('%/$month/$year%')"); 
		$rayhanActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='roxy' AND date LIKE('%/$month/$year%')"); 
		$roxyActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='ayon' AND date LIKE('%/$month/$year%')"); 
		$ayonActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='tanver' AND date LIKE('%/$month/$year%')"); 
		$tanverActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='munna' AND date LIKE('%/$month/$year%')"); 
		$munnaActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='sarzu' AND date LIKE('%/$month/$year%')"); 
		$sarzuActivity = mysql_num_rows($activityQurey);
		
		
		/// For per person bazar count
		
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' AND (name LIKE ('%rayhan%') OR name LIKE ('%roy%') OR name LIKE ('%uddin%'))"); 
		$rayhanbazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' AND (name LIKE ('%roxy%') OR name LIKE ('%mama%'))");  
		$roxybazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' AND (name LIKE ('%ayon%') OR name LIKE ('%ayn%'))"); 
		$ayonbazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' AND (name LIKE ('%tanver%') OR name LIKE ('%mutu%') OR name LIKE ('%motu%') OR name LIKE ('%vuttu%') OR name LIKE ('%gandu%') OR name LIKE ('%tanvir%'))"); 
		$tanverbazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' AND (name LIKE ('%munna%') OR name LIKE ('%muna%') OR name LIKE ('%munni%'))"); 
		$munnabazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = '{$month}' AND YEAR(date) = '{$year}' AND (name LIKE ('%sarzu%') OR name LIKE ('%sanzu%') OR name LIKE ('%biskut%') OR name LIKE ('%biskit%') OR name LIKE ('%biscuit%') OR name LIKE ('%samsung%'))"); 
		$sarzubazarCount = mysql_num_rows($bazarCountQurey);
		
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
		
		//// for activity count
		
		@$monthForActivity = date(m);
		@$yearForActivity = date(Y);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='rayhan' AND date LIKE('%/$monthForActivity/$yearForActivity%')"); 
		$rayhanActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='roxy' AND date LIKE('%/$monthForActivity/$yearForActivity%')"); 
		$roxyActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='ayon' AND date LIKE('%/$monthForActivity/$yearForActivity%')"); 
		$ayonActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='tanver' AND date LIKE('%/$monthForActivity/$yearForActivity%')"); 
		$tanverActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='munna' AND date LIKE('%/$monthForActivity/$yearForActivity%')"); 
		$munnaActivity = mysql_num_rows($activityQurey);
		
		$activityQurey = mysql_query("SELECT name FROM log WHERE name='sarzu' AND date LIKE('%/$monthForActivity/$yearForActivity%')"); 
		$sarzuActivity = mysql_num_rows($activityQurey);
		
		/// For per person bazar count
		
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) AND (name LIKE ('%rayhan%') OR name LIKE ('%roy%') OR name LIKE ('%uddin%'))"); 
		$rayhanbazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) AND (name LIKE ('%roxy%') OR name LIKE ('%mama%'))"); 
		$roxybazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) AND (name LIKE ('%ayon%') OR name LIKE ('%ayn%'))"); 
		$ayonbazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) AND (name LIKE ('%tanver%') OR name LIKE ('%mutu%') OR name LIKE ('%motu%') OR name LIKE ('%vuttu%') OR name LIKE ('%gandu%') OR name LIKE ('%tanvir%'))"); 
		$tanverbazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) AND (name LIKE ('%munna%') OR name LIKE ('%muna%') OR name LIKE ('%munni%'))"); 
		$munnabazarCount = mysql_num_rows($bazarCountQurey);
		
		$bazarCountQurey = mysql_query("SELECT name FROM bazar WHERE MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) AND (name LIKE ('%sarzu%') OR name LIKE ('%sanzu%') OR name LIKE ('%biskut%') OR name LIKE ('%biskit%') OR name LIKE ('%biscuit%') OR name LIKE ('%samsung%'))"); 
		$sarzubazarCount = mysql_num_rows($bazarCountQurey);
		
		
		
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
	
	if($totalMeal == 0){
		$rayhanTotalMeal = 0;
		$roxyTotalMeal = 0;
		$ayonTotalMeal = 0;
		$tanverTotalMeal = 0;
		$munnaTotalMeal = 0;
		$sarzuTotalMeal = 0;
	}
	
	/////////////////////////////////////////////////
	//for genarating previous six month information
	$currentMonthNumber = idate('m');
	$currentMonthNumber = $currentMonthNumber - 1;
	
	for($counter = 1; $counter<=6; $counter++){
		
		$resultForPreviousMonthMeal = mysql_query("SELECT SUM(rayhan) AS rayhan_sum FROM meal WHERE MONTH(date) = '$currentMonthNumber'"); 
		$rowforPreviousMonthMeal = mysql_fetch_array($resultForPreviousMonthMeal);
		${"rayhanMeal".$counter} = $rowforPreviousMonthMeal["rayhan_sum"];
		
		$resultForPreviousMonthMeal = mysql_query("SELECT SUM(roxy) AS roxy_sum FROM meal WHERE MONTH(date) = '$currentMonthNumber'"); 
		$rowforPreviousMonthMeal = mysql_fetch_array($resultForPreviousMonthMeal);
		${"roxyMeal".$counter} = $rowforPreviousMonthMeal["roxy_sum"];
		
		$resultForPreviousMonthMeal = mysql_query("SELECT SUM(ayon) AS ayon_sum FROM meal WHERE MONTH(date) = '$currentMonthNumber'"); 
		$rowforPreviousMonthMeal = mysql_fetch_array($resultForPreviousMonthMeal);
		${"ayonMeal".$counter} = $rowforPreviousMonthMeal["ayon_sum"];
		
		$resultForPreviousMonthMeal = mysql_query("SELECT SUM(tanver) AS tanver_sum FROM meal WHERE MONTH(date) = '$currentMonthNumber'"); 
		$rowforPreviousMonthMeal = mysql_fetch_array($resultForPreviousMonthMeal);
		${"tanverMeal".$counter} = $rowforPreviousMonthMeal["tanver_sum"];
		
		$resultForPreviousMonthMeal = mysql_query("SELECT SUM(munna) AS munna_sum FROM meal WHERE MONTH(date) = '$currentMonthNumber'"); 
		$rowforPreviousMonthMeal = mysql_fetch_array($resultForPreviousMonthMeal);
		${"munnaMeal".$counter} = $rowforPreviousMonthMeal["munna_sum"];
		
		$resultForPreviousMonthMeal = mysql_query("SELECT SUM(sarzu) AS sarzu_sum FROM meal WHERE MONTH(date) = '$currentMonthNumber'"); 
		$rowforPreviousMonthMeal = mysql_fetch_array($resultForPreviousMonthMeal);
		${"sarzuMeal".$counter} = $rowforPreviousMonthMeal["sarzu_sum"];
		
		
		
		
		$dateObj   = DateTime::createFromFormat('!m', $currentMonthNumber);
		${"previousMonthName".$counter} = $dateObj->format('F'); 
		
		if($currentMonthNumber == 1){
			$currentMonthNumber = 12;
		}else{
			$currentMonthNumber--;
		}
		
		//echo ${"rayhanMeal".$counter};
		//echo ${"previousMonthName".$counter};
	}
	

?>



<!DOCTYPE html>
<html>
  <head>
	
		<title>Chart</title>
		<?php include('import.php');?>
		<link rel="shortcut icon" href="icon/favicon.ico">
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script> 
		  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

		<script type="text/javascript">
				google.charts.load('current', {packages: ['corechart','bar','line']});		// new package loading system
			  //google.load("visualization", "1", {packages:["bar", "corechart"]}); // old package loading system
			  
			  google.setOnLoadCallback(drawChart1);
			  function drawChart1() {
				var data1 = google.visualization.arrayToDataTable([
				  ['Name', 'Deposit', 'Expenses'],
				  ['Rayhan',	<?php echo $rayhanDeposit;?>	, <?php echo $rayhanExpense;?>],
				  ['Roxy',		<?php echo $roxyDeposit;?>		, <?php echo $roxyExpense;?>],
				  ['Ayon', 		<?php echo $ayonDeposit;?>		, <?php echo $ayonExpense;?>],
				  ['Tanver', 	<?php echo $tanverDeposit;?>	, <?php echo $tanverExpense;?>],
				  ['Munna', 	<?php echo $munnaDeposit;?>		, <?php echo $munnaExpense;?>],
				  ['Sarzu', 	<?php echo $sarzuDeposit;?>		, <?php echo $sarzuExpense;?>]
				]);

				var options1 = {
				  chart: {
					title: 'Deposit vs Expense Chart',
					//subtitle: 'Deposit vs Expenses Chart',
					
				  },
				  bars: 'vertical' // Required for Material Bar Charts.
				};
				
				var chart1 = new google.charts.Bar(document.getElementById('barchart_material'));
				chart1.draw(data1, options1);
				
			  }
			</script>
			
			<script type="text/javascript">
				//google.load("visualization", "1", {packages:["corechart"]});
				google.setOnLoadCallback(drawChart2);
				function drawChart2() {
				  var data2 = google.visualization.arrayToDataTable([
					["Name", "Total Meal", { role: "style" } ],
					["Rayhan",<?php echo $rayhanTotalMeal;?>, "color: #000066"],
					["Roxy", <?php echo $roxyTotalMeal;?>, "color: #9933FF"],
					["Ayon", <?php echo $ayonTotalMeal;?>, "gold"],
					["Tanver", <?php echo $tanverTotalMeal;?>, "color: #333366"],
					["Munna", <?php echo $munnaTotalMeal;?>, "color: #669900"],
					["Sarzu", <?php echo $sarzuTotalMeal;?>, "color: #CCFF33"]
				  ]);

				  var view2 = new google.visualization.DataView(data2);
				  view2.setColumns([0, 1,
								   { calc: "stringify",
									 sourceColumn: 1,
									 type: "string",
									 role: "annotation" },
								   2]);

				  var options2 = {
					title: "Total Meal",
					//width: 900,
					//height: 500,
					bar: {groupWidth: "95%"},
					legend: { position: "none" },
				  };
				  var chart2 = new google.visualization.BarChart(document.getElementById("barchart_values"));
				  chart2.draw(view2, options2);
			  }
			  </script>
			
			
			
			<script>
				     //google.charts.load('current', {'packages':['line']});
				  google.charts.setOnLoadCallback(drawChart3);

				function drawChart3() {

				  var data3 = new google.visualization.DataTable();
				  data3.addColumn('string', 'Month');
				  data3.addColumn('number', 'Rayhan');
				  data3.addColumn('number', 'Roxy');
				  data3.addColumn('number', 'Ayon');
				  data3.addColumn('number', 'Tanver');
				  data3.addColumn('number', 'Munna');
				  data3.addColumn('number', 'Sarzu');
				  

				  data3.addRows([
				  ['<?php echo $previousMonthName1;?>',  <?php echo $rayhanMeal1;?>,<?php echo $roxyMeal1;?>,<?php echo $ayonMeal1;?>,<?php echo $tanverMeal1;?>,<?php echo $munnaMeal1;?>,<?php echo $sarzuMeal1;?>],
				  ['<?php echo $previousMonthName2;?>',  <?php echo $rayhanMeal2;?>,<?php echo $roxyMeal2;?>,<?php echo $ayonMeal2;?>,<?php echo $tanverMeal2;?>,<?php echo $munnaMeal2;?>,<?php echo $sarzuMeal2;?>],
				  ['<?php echo $previousMonthName3;?>',  <?php echo $rayhanMeal3;?>,<?php echo $roxyMeal3;?>,<?php echo $ayonMeal3;?>,<?php echo $tanverMeal3;?>,<?php echo $munnaMeal3;?>,<?php echo $sarzuMeal3;?>],
				  ['<?php echo $previousMonthName4;?>',  <?php echo $rayhanMeal4;?>,<?php echo $roxyMeal4;?>,<?php echo $ayonMeal4;?>,<?php echo $tanverMeal4;?>,<?php echo $munnaMeal4;?>,<?php echo $sarzuMeal4;?>],
				  ['<?php echo $previousMonthName5;?>',  <?php echo $rayhanMeal5;?>,<?php echo $roxyMeal5;?>,<?php echo $ayonMeal5;?>,<?php echo $tanverMeal5;?>,<?php echo $munnaMeal5;?>,<?php echo $sarzuMeal5;?>],
				  ['<?php echo $previousMonthName6;?>',  <?php echo $rayhanMeal6;?>,<?php echo $roxyMeal6;?>,<?php echo $ayonMeal6;?>,<?php echo $tanverMeal6;?>,<?php echo $munnaMeal6;?>,<?php echo $sarzuMeal6;?>]
				  ]);

				  var options3 = {
					chart: {
					  title: 'History of Total Meal',
					  subtitle: 'previous six months information'
					},
					//width: 900,
					//height: 600
				  };

				  var chart3 = new google.charts.Line(document.getElementById('linechart_material'));

				  chart3.draw(data3, options3);
				}
			</script>
			  
			 <script type="text/javascript">
			 // google.charts.load("current", {packages:["corechart"]});
			  google.charts.setOnLoadCallback(drawChart4);
			  function drawChart4() {
				var data4 = google.visualization.arrayToDataTable([
				  ['Name', 'Activities'],
				  ['Rayhan',	<?php echo $rayhanActivity; ?>],
				  ['Roxy',		<?php echo $roxyActivity; ?>],
				  ['Ayon',  	<?php echo $ayonActivity; ?>],
				  ['Tanver', 	<?php echo $tanverActivity; ?>],
				  ['Munna', 	<?php echo $munnaActivity; ?>],
				  ['Sarzu',    	<?php echo $sarzuActivity; ?>]
				]);

				var options4 = {
					legend: 'none',
					pieSliceText: 'label',
				  title: 'Monthly activities on this Site',
				  //pieHole: 0.4,
				};

				var chart4 = new google.visualization.PieChart(document.getElementById('donutchart1'));
				chart4.draw(data4, options4);
			  }
			</script>
			
			<script type="text/javascript">
			 // google.charts.load("current", {packages:["corechart"]});
			  google.charts.setOnLoadCallback(drawChart5);
			  function drawChart5() {
				var data5 = google.visualization.arrayToDataTable([
				  ['Name', 'Activities'],
				  ['Rayhan',	<?php echo $rayhanbazarCount; ?>],
				  ['Roxy',		<?php echo $roxybazarCount; ?>],
				  ['Ayon',  	<?php echo $ayonbazarCount; ?>],
				  ['Tanver', 	<?php echo $tanverbazarCount; ?>],
				  ['Munna', 	<?php echo $munnabazarCount; ?>],
				  ['Sarzu',    	<?php echo $sarzubazarCount; ?>]
				]);

				var options5 = {
					legend: 'none',
					pieSliceText: 'label',
					title: 'Bazar Count',
					//pieStartAngle: 100,
					
				  //title: 'Bazar Count',
				  //pieHole: 0.4,
				};

				var chart5 = new google.visualization.PieChart(document.getElementById('donutchart2'));
				chart5.draw(data5, options5);
			  }
			</script>
			
  </head>
  
  
  <body class="container">
  
	<div class="col-md-12 column">
		<?php include('nav.php'); ?>
	</div>
	
	<div class="col-md-12 form-group animated rubberBand">
				
				<form method="POST" action="#">
				<fieldset>
					<div class="col-md-2">
						
						  <select name="month" class="form-control" id="sel1">                      
							  <option value="00">--Select Month--</option>
							  <option value="01">January</option>
							  <option value="02">February</option>
							  <option value="03">March</option>
							  <option value="04">April</option>
							  <option value="05">May</option>
							  <option value="06">June</option>
							  <option value="07">July</option>
							  <option value="08">August</option>		  
							  <option value="09">September</option>
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
	
	
	<div class="col-md-12">
		
	  <center>
		<div id="barchart_material" style="height: 500px;"></div>
		</center>
	</div>
	
	<div class="col-md-12">

		<div id="barchart_values" style="height: 500px;"></div>
	</div>
	
	<div class="col-md-6">
		 <div id="donutchart1" style="height: 500px;"></div>
	</div>
	
	<div class="col-md-6">
		 <div id="donutchart2" style="height: 500px;"></div>
	</div>
	
	<div style="height: 500px;">
	</div>
	
	<div class="col-md-12">
		<div id="linechart_material" style="height: 600px;"></div>
	</div>
	

	
	
	</br></br>
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
