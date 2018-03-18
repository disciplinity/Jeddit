<?php

	function calculateTime($time) {
		$hoursElapsed = strval(round(abs(time() - strtotime($time)) / 3600));
		$minutesElapsed = strval(round(abs(time() - strtotime($time)) / 60));
		if ($hoursElapsed < 1) {
			$timeElapsed = $minutesElapsed.' minutes ago'; 
		} elseif ($hoursElapsed == 1) {
			$timeElapsed = $hoursElapsed.' hour ago';
		} elseif ($minutesElapsed == 1) {
			$timeElapsed = $minutesElapsed.' minute ago';
		} else {
			$timeElapsed = $hoursElapsed.' hours ago';
		}
		return $timeElapsed;
	}

	function getHourPassed($time) {
	$hoursElapsed = strval(round(abs(time() - strtotime($time)) / 3600));
	$minutesElapsed = strval(round(abs(time() - strtotime($time)) / 60));
	if ($hoursElapsed < 1) {
		$timeElapsed = $minutesElapsed.' minutes ago'; 
	} elseif ($hoursElapsed == 1) {
		$timeElapsed = $hoursElapsed.' hour ago';
	} elseif ($minutesElapsed == 1) {
		$timeElapsed = $minutesElapsed.' minute ago';
	} else {
		$timeElapsed = $hoursElapsed.' hours ago';
	}
	return $hoursElapsed;
	}
		