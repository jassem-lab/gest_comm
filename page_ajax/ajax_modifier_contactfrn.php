<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $id   				= $_POST['id']; 
    $nomcontact   				= $_POST['nomcontact']; 
	$email				= $_POST['email']; 
	$tel				= $_POST['tel']; 
	
	$sql="update delta_contacts_fournisseur set nomcontact='".$nomcontact."', email='".$email."', telephone='".$tel."' where id=".$id;	
	$requete = mysql_query($sql) or die( mysql_error()) ;	
	
	$json = '{"client":"'.$id.'"}';
	json_encode($json);
	echo $json;		

?>