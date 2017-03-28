<?php 
session_start();
$pdo = new PDO('mysql:host = localhost;dbname = bookstore', "root", "papa2657");


$total = 60 *60* 48; //time in seconds
$hours_round = floor($total/(60*60));
$minutes_left = ($total - $hours_round*3600)/60;
$minutes_round = floor($minutes_left);
$seconds_left = $total - $minutes_round*60 - $hours_round*3600;
echo "Time until next update: $hours_round hours $minutes_round minutes $seconds_left seconds";  






$timestamp = time();
$diff = 3600 * 48; //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if(isset($_SESSION['ts'])) {
	$slice = ($timestamp - $_SESSION['ts']);	
	$diff = $diff - $slice;
}

if(!isset($_SESSION['ts']) || $diff > $hld_diff || $diff < 0) {
	$diff = $hld_diff;
	$_SESSION['ts'] = $timestamp;
}

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;


?>
<div id="strclock"></div>
<script type="text/javascript">
 var hour = <?php echo floor($hours); ?>;
 var min = <?php echo floor($minutes); ?>;
 var sec = <?php echo floor($seconds); ?>

function countdown() {
 if(sec <= 0 && min > 0) {
  sec = 59;
  min -= 1;
 }
 else if(min <= 0 && sec <= 0) {
  min = 0;
  sec = 0;
 }
 else {
  sec -= 1;
 }
 
 if(min <= 0 && hour > 0) {
  min = 59;
  hour -= 1;
 }
 
 var pat = /^[0-9]{1}$/;
 sec = (pat.test(sec) == true) ? '0'+sec : sec;
 min = (pat.test(min) == true) ? '0'+min : min;
 hour = (pat.test(hour) == true) ? '0'+hour : hour;
 
 document.getElementById('strclock').innerHTML = hour+":"+min+":"+sec;
 setTimeout("countdown()",1000);
 }
 countdown();
</script>




<? /*
   declare target date; source: http://us.imdb.com/ReleaseDates?0121766 ; 
  */
  $day   = 31;     // Day of the countdown
  $month = 12;      // Month of the countdown
  $year  = 2017;   // Year of the countdown
  $hour  = 23;     // Hour of the day (east coast time)
  $event = "New Year's Eve, 2017"; //event

  $calculation = ((mktime ($hour,0,0,$month,$day,$year) - time(void))/3600);
  $hours = (int)$calculation;
  $days  = (int)($hours/24);

  echo $days;
/*
  mktime() http://www.php.net/manual/en/function.mktime.php
  time()   http://www.php.net/manual/en/function.time.php
  (int)    http://www.php.net/manual/en/language.types.integer.php
*/
?>
<ul>
<li>The date is <?=(date ("l, jS \of F Y g:i:s A"));?>.</li>
<li>It is <?=$days?> days until <?=$event?>.</li>
<li>It is <?=$hours?> hours until <?=$event?>.</li>
</ul>



