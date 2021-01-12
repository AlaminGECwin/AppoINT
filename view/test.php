<?php
$slot_schedule="12345678";
echo $slot_schedule[5];
echo "<br>";



final class Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }

    public function sayHi()
    {
        echo 'Hi I am Singleton Design pattern. <br>';
    }
}

$singleton = Singleton::getInstance();


$singleton->sayHi();
echo "<br>";
?>

<?php
date_default_timezone_set('Asia/Dhaka');

$script_tz = date_default_timezone_get();

if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}
?>
<?php
function get_time($time) {
    $duration = $time / 1000;
    $hours = floor($duration / 3600);
    $minutes = floor(($duration / 60) % 60);
    $seconds = $duration % 60;
    if ($hours != 0)
        echo "$hours:$minutes:$seconds";
    else
        echo "$minutes:$seconds";
}
echo "<br>";
get_time('1593073061');

echo "<br>";
echo "<br>";
echo date("h-i-s");

echo "<br>";
echo date("h");
echo "<br>";
?>


<?php
$cookie_name = "MyCookie";
$cookie_value = "Alamin";
setcookie($cookie_name, $cookie_value, time() + (5 * 1), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
echo "<br>";
echo time();
?>


<?php
echo "<br>";
$d=cal_days_in_month(CAL_GREGORIAN,3,2020);
echo "There are $d days in March 2020";



echo "<br>";
$jd=gregoriantojd(3,1,2020);//1 march 2020


echo jddayofweek($jd,1);//1 for full name of that day

echo "<br>";
echo jdmonthname($jd,1);

echo "<br>";
echo "Today's day is " . date("l");
echo "<br>";
echo "Today's Year is " . date("Y");
echo "<br>";
echo "Today's Month is " . date("M");
echo "<br>";
echo "Today's date is " . date("D");
echo "<br>";
echo "Today's Month is " . date("m");
echo "<br>";
echo "Today's date is " . date("d");
echo "<br>";
echo "Today's time is " . date("h:i:sa");

echo "<br>";
$d=mktime(12, 39, 17, 3, 20, 2020);
echo "Created date is " . date("Y-m-d h:i:sa", $d);

echo "<br>";

function numtomonth($nmonth)
{
	if($nmonth==1){
		return "January";
	}elseif ($nmonth==2) {
		return "February";
	}elseif ($nmonth==3) {
		return "March";
	}elseif ($nmonth==4) {
		return "April";
	}elseif ($nmonth==5) {
		return "May";
	}elseif ($nmonth==6) {
		return "Jun";
	}elseif ($nmonth==7) {
		return "July";
	}elseif ($nmonth==8) {
		return "August";
	}elseif ($nmonth==9) {
		return "September";
	}elseif ($nmonth==10) {
		return "October";
	}elseif ($nmonth==11) {
		return "November";
	}elseif ($nmonth==12) {
		return "December";
	}else
	{
		$nmonth=$nmonth-12;
		return numtomonth($nmonth);
	}
}



if(isset($_GET['done']))
          {
          	$year=$_GET['year'];
          	$month=$_GET['month'];

          	$day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			
			$jd=gregoriantojd($month,1,$year);//1 march 2020



          }else
          {
          	$year=date("Y");
          	$month=date("m");
          	$day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			
			$jd=gregoriantojd($month,1,$year);//1 march 2020
          }
?>

<div class="container mb-3">
	<a class="btn btn-info" href="index.php?function=client_dashboard" >
      <i class="" text-info" style="font-size:36px;">Client Dashboard</i>
    </a>
        
</div>
<div class="container">
	<a class="btn btn-info" href="index.php?function=counselor_dashboard" >
      <i class="" text-info" style="font-size:36px;">Counselor Dashboard</i>
    </a>
        
</div>



<div class="container cont">
		<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	  Launch demo modal
	</button>

	<div>
		  <i class="fab fa-facebook"></i>
	</div>
	<div>
		<form action="index.php" method="get">
			 <div class="form-group">
			    <label for="exampleFormControlSelect1">Select Year</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="year">
			      <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
			      
			      
			    </select>
			 </div>
			 <input type="hidden" name="function" value="test">
			 <div class="form-group">
			    <label for="exampleFormControlSelect1">Select Month</label>
			    <select class="form-control" id="exampleFormControlSelect1" name="month">
			      <option value="<?php echo date("m");?>"  <?php if(date("m")==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m"));?></option>
			      <option value="<?php echo date("m")+1;?>"  <?php if(date("m")+1==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m")+1);?></option>
			      <option value="<?php echo date("m")+2;?>"  <?php if(date("m")+2==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m")+2);?></option>
			    </select>
			 </div>
			 <div>
			 	<input type="submit" class="btn btn-success  active" name="done" value="Search" />
			 </div>
		</form>
	</div>
	<table class="table table-bordered ">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Date</th>
	      <th scope="col">Day</th>
	      <th scope="col">8:00 am to 9:00 am</th>
	      <th scope="col">9:00 am to 10:00 am</th>
	      <th scope="col">10:00 am to 11:00 am</th>
	    </tr>
	  </thead>
	  <tbody >
	  	<?php

	  	
	  	for ($i=1; $i <=$day ; $i++) { 
		?>
		  	<tr <?php if($i==date('d')&&$month==date("m")&&$year==date("Y")){echo "class='table-warning'"; }  ?>>
		      <th class="text-dark" scope="row "><?php echo $i; ?></th>
		      <td class="text-primary font-weight-bold"><?php echo jddayofweek(gregoriantojd($month,$i,$year),1); ?></td>
		      <td class="m-0 p-0 "><button type="button" class="btn btn-success w-100 h-100 ">Available</button></td>
		      <td class="m-0 p-0 "><button type="button" class="btn btn-light btn-outline-dark w-100 h-100">Not Available</button></td>
		      <td class="m-0 p-0 "><button type="button" class="btn  btn btn-danger w-100 h-100">Booked</button></td>
		    </tr>
		<?php
		$jd++;
	  		
	  	}
	  	?>
	    
	   
	  </tbody>
	</table>
</div>

<div class="container mb-3 pb-3">
<?php

	$table_name="profile";
	$columns = $this->obj->table_columns($table_name);
	$information=$this->obj->table_data($table_name);

	table($columns,$information);
?>
</div>

<div class="container">
	<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSehV9hhQ_AvhC8DYtOxBFDbuCl8HhWg6UyDCbqTiGwIPiZATw/viewform?embedded=true" width="640" height="760" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
</div>
