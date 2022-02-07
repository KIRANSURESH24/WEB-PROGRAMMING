<!DOCTYPE html>
<head>
	<title>Calculate Electricity Bill</title>
</head>
<?php
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Total amount of ' . $units . ' - ' . $result;
    }
}
function calculate_bill($units) {
    $unit_cost_first = 4;
    $unit_cost_second = 5;
    $unit_cost_third = 6;

    if($units <= 100) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 100 && $units <= 200) {
        $temp = 100 * $unit_cost_first;
        $remaining_units = $units - 100;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else {
        $temp = (100 * 4) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
        $remaining_units = $units - 200;
        $bill = $temp + $remaining_units ;
    }
    return number_format((float)$bill, 2, '.', '');
} 
?>
 
<body>
	<div id="page-wrap">
		<h1>Php - Calculate Electricity Bill</h1>
		
		<form action="" method="post" id="quiz-form">            
            	<input type="number" name="units" id="units" placeholder="Please enter no. of Units" />            
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />		
		</form>
 
		<div>
		    <?php echo '<br />' . $result_str; ?>
		</div>	
	</div>
</body>
</html>