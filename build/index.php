<?php
session_start();
require_once 'core/configs/main.php';
require_once 'core/library/main.php';
require_once 'core/library/validator.php';
require_once 'core/library/db.php';
$url = strtolower($_GET['url']);
$urlSegments = explode('/', $url);
$cntrName = (empty($urlSegments[0]))? 'main' : $urlSegments[0];
$actionName = (empty($urlSegments[1]))? 'action_index' : 'action_'.$urlSegments[1];

if(file_exists('core/controllers/'.$cntrName.'.php')){
    require_once 'core/controllers/'.$cntrName.'.php';
    if(function_exists($actionName)){
        $actionName();
    }else{
        show404page();
    }
}else{
    show404page();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <link rel="shortcut icon" href="<?php echo BASEURL;?>img/icons/favicon.png" type="image/png">
	<title></title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo BASEURL;?>css/materialize.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?php echo BASEURL;?>css/basestyle.css"  media="screen,projection"/>
</head>
<body>
<div id="main_wrapper">


	
	
</div>	
	<script type="text/javascript" src="<?php echo BASEURL;?>js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL;?>js/materialize.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL;?>js/swiper.jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL;?>js/functions.js"></script>	
</body>
</html>