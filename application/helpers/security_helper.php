<?php 

function createTokenPeserta($value){
	return _md5($value.'pdrtechnology');
}

function validationInput(){
	$numargs = func_num_args();
	for ($i=0; $i < $numargs; $i++) { 
		$input = func_get_arg($i);
		if ($input==='' || $input==null ){
			exit(json_encode(array('message'=>'Input is required !')));
		}
	}
	
}


function generateFileName(){
	$string = _randomStr(25).'-'._randomStr(25);
	return $string;
}

function validationToken($value){
	if ($value!=token()){
		exit(json_encode(array('result'=>false,'message'=>'Token is invalid!')));
	}
}

function _md5($string){
	$md5 = md5($string);
	return strlen($md5).$md5.strlen($md5);
}

function _getDate($custom = null)
{
	date_default_timezone_set('Asia/Jakarta');
	($custom == null) ? $d = date('Y/m/d') : $d = date($custom);
	return $d;
}

function _getTime($custom = null)
{
	date_default_timezone_set('Asia/Jakarta');
	$t = ($custom == null) ? date('H:i') : date($custom);
	return $t;
}

function token(){
	return 'A3kf3opk23ln4324n32k4nl34o3i2j4lk';
}

function _randomStr($length = 10)
{
	$c = '0123456789abcdefghijklmnopqrstuvwxyz';
	$cL = strlen($c);
	$rS = '';
	for ($i = 0; $i < $length; $i++) {
		$rS .= $c[rand(0, $cL - 1)];
	}
	return $rS;
}

function _replaceSq($v){
	return str_replace("'","",$v);
}
