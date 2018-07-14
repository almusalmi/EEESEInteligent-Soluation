 
<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

//connection
include'admin/connect.php';

$sessinoUser='';
if(isset($_SESSION['user'])){
	$sessinoUser=$_SESSION['user'];
}


//routs
$tpl='include/templet/';  //temlet path
$css='layout/css/'; //css path
$js='layout/js/'; //js path
$lan='include/language/'; //language path
$func='include/function/'; //func path
include $func.'function.php';
include $lan.'english.php';
include $tpl.'heder.php';
 

 

 
