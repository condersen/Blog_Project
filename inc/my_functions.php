<?php 

function format_time_since($starttime){
	$time_output = '';
	
	$current_time = time();
	$time_dif = $current_time - $starttime;
	if($time_dif >= 86400){
		$days = floor($time_dif/86400);
		$time_output = $time_output . $days . ' day(s) ';
		$time_dif = $time_dif - ($days * 86400);
	}
	
	if($time_dif >= 3600){
		$hours = floor($time_dif/3600);
		$time_output = $time_output . $hours . ' hour(s) ';
		$time_dif = $time_dif - ($hours * 3600);
	}
	
	if($time_dif >= 60){
		$minutes = floor($time_dif/60);
		$time_output = $time_output . $minutes . ' minute(s) ';
		$time_dif = $time_dif - ($minutes * 60);
	}
	
	$time_output = $time_output . $time_dif . ' second(s) ';
	
	return $time_output;
}

?>