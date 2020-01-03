<?php
if(isset($_REQUEST['dns']))
	$dns = $_REQUEST['dns'];

if(isset($_REQUEST['name']))
	$dns = $_REQUEST['name'];

if(empty($dns)){
    header('HTTP/1.0 404 Not Found');
    die('DNS Not found');
}
$result = gethostbynamel($dns);
//print_r($result);
$data = array();
$data['Status'] = 0;
$data['Question'] = ['name'=>$dns,'type'=>1];
foreach($result as $ip){
	$data['Answer'][] = ['name'=>$dns,'type'=>1,'TTL'=>300,'data'=>$ip];
}
echo json_encode($data);