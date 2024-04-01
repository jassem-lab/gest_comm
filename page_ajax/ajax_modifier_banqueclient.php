<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $id   				= $_POST['id']; 
	$banque				= $_POST['banque']; 
	$rib				= $_POST['rib']; 
	$swift	    		= $_POST['swift'];
	$iban	    		= $_POST['iban'];
	
	$sql="update delta_banque_client set banque='".$banque."', rib='".$rib."', swift='".$swift."', iban='".$iban."' where id=".$id;	
	$requete = mysql_query($sql) or die( mysql_error()) ;	
	
	$json = '{"client":"'.$id.'"}';
	json_encode($json);
	echo $json;		

?>