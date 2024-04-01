<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $id   				= $_POST['id']; 
	$email				= $_POST['email']; 
	$tel				= $_POST['tel']; 
	$nomcontact			= $_POST['nomcontact'];
	
	$sql="update delta_contacts_client set email='".$email."', telephone='".$tel."', nomcontact='".$nomcontact."' where id=".$id;	
	$requete = mysql_query($sql) or die( mysql_error()) ;	
	
	$json = '{"client":"'.$id.'"}';
	json_encode($json);
	echo $json;		

?>