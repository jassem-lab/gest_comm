<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $client   				= $_POST['client']; 
	$rib					= $_POST['rib']; 
	$banque				   	= $_POST['banque']; 
	$iban			       	= $_POST['iban']; 
	$swift			      	= $_POST['swift']; 
	
	$sql="INSERT INTO `delta_banque_client`(`client`, `banque`, `rib`, `iban`, `swift`) VALUES";
	$sql=$sql." ('".$client."','".$banque."','".$rib."','".$iban."','".$swift."')";
	
	$requete = mysql_query($sql) or die( mysql_error()) ;	
	
	$json = '{"client":"'.$client.'"}';
	json_encode($json);
	echo $json;		

?>