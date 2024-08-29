<?php 
// Start the session (if not already started)
error_reporting(1);
date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
$list = $_GET['lista'];

$rand = rand(1,10);
if($rand >= 5){
    echo '#LIVE '.$lista.' [AUTH APPROVED]';
}else{
    echo 'DEAD '.$lista.' [AUTH DECLINED]';
}

?>