<?php



function status($id){
	if($id==1){
		return "<span style='color:green;'>Active</span>";
	}
	else{
		return "<span style='color:red;'>Inactive</span>";
	}
} 

function gender($id){
	if($id==1){
		return "Male";
	}
	else{
		return "Female";
	}
} 

function isStatus($id){
	if($id==0){
		return "No";
	}
	else{
		return "Yes";
	}
} 


//Random Password Generator
function generateRandomPassword($length) {
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$password = '';
	for ($i = 0; $i < $length; $i++) {
		$password .= $characters[rand(0, $charactersLength - 1)];
	}
	return $password;
} 

function Activation($id){
	if($id==1){
		return "Active";
	}
	else{
		return "Inactive";
	}
} 

define('WATER_SALES', 1);
define('NEW_CONNECTION', 2);
define('REVENUE_CONNECTION', 3);
define('LEAKAGE_CONTROL', 4);
define('METER_REPLACEMENT', 5);
define('METER_READINGS', 6);
define('WATER_PRODUCTION', 7);
define('WASTE_WATER', 8);



