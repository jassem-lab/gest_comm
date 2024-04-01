<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $client   				= $_POST['client']; 
	$email					= $_POST['email']; 
	$tel				   	= $_POST['tel']; 
	$nomcontact			   	= $_POST['nomcontact']; 
	
	$sql="INSERT INTO `delta_contacts_client`(`client`, `email`, `telephone`, `nomcontact`) VALUES";
	$sql=$sql." ('".$client."','".$email."','".$tel."','".$nomcontact."')";
	
	$requete = mysql_query($sql) or die( mysql_error()) ;	
	
	$json = '{"client":"'.$client.'"}';
	json_encode($json);
	echo $json;		

?>