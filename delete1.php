<?php 
include_once('config1.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
    $db->delete('catApplication',array('id'=>$_REQUEST['delId']));
    header('location: browse-user.php?msg=rds');
    exit;
}
?>