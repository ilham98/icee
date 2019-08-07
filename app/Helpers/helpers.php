<?php

function generateDay($day) {
	switch($day) {
		case '1':
			return 'Monday';
		case '2':
			return 'Tuesday';
		case '3':
			return 'Wednesday';
		case '4':
			return 'Thursday';
		case '5':
			return 'Friday';
		case '6':
			return 'Saturday';
		default: 
			return 'Monday';
	}
}

function timePretty($time) {
	$new_format = date('H:i A', strtotime($time));
	return $new_format;
}

function getClassType($a) {
	if($a === 'A')
		return 'Class';
	else return 'Corner';
}