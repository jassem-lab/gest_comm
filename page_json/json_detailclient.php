<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $client    = $_GET['ID'];
    $nature    ="";
    $natureNom ="";

	$req="select * from delta_clients where id=".$client;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$nature	   = $enreg['nature'];
        $reqN="select * from delta_natures_client where id=".$nature ; 
        $queryN = mysql_query($reqN) ;
        while($enregN = mysql_fetch_array($queryN)){
            $natureNom = $enregN["nature"] ; 
        }
	
	}


	$json = '{"natureNom":"'.$natureNom.'","nature":"'.$nature.'"}';
	json_encode($json);
	echo $json;	
	
?>