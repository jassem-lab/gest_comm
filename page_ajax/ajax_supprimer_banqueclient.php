<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $id   				= $_POST['id']; 
	
	$sql="delete from delta_banque_client where id=".$id;	
	$requete = mysql_query($sql) or die( mysql_error()) ;	
	
	$json = '{"client":"'.$id.'"}';
	json_encode($json);
	echo $json;		

?>