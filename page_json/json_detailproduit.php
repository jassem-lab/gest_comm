<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $produit   = $_GET['ID'];

	$prix_vente_ht	   = "";
	$prix_vente_ttc  = "";
	$tva  = 0;
	$fodec  = 0;
	$type 	= 0;
	$nature = 0; 
	$tauxFodec = 0 ; 

	$req="select * from delta_produits where id=".$produit;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$prix_vente_ht	   = $enreg['prix_vente_ht'];
		$prix_vente_ttc	   = $enreg['prix_vente_ttc'];
		$tva	           = $enreg['tva'];
		$fodec	           = $enreg['fodec'];
		$type	           = $enreg['type'];
		$nature	           = $enreg['nature'];
		$reqFodec = "select * from delta_parametres" ; 
		$queryFodec = mysql_query($reqFodec) ; 
		while($enregFodec = mysql_fetch_array($queryFodec)){
			$tauxFodec = $enregFodec["fodec"] ; 
		}
	}


	$json = '{"prix_vente_ht":"'.$prix_vente_ht.'","prix_vente_ttc":"'.$prix_vente_ttc.'","tva":"'.$tva.'","fodec":"'.$fodec.'","type":"'.$type.'","nature":"'.$nature.'","tauxFodec":"'.$tauxFodec.'"}';
	json_encode($json);
	echo $json;	
	
?>