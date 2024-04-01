<?php
session_start();
include('../connexion/cn.php');
	
	$id    = $_GET["ID"] ; //Id entête
	$idd   = $_GET["IDD"] ; //Id Détail
	
	$magasin		=	0;
	$req="select * from delta_be where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$magasin		=	$enreg['magasin'];
	}		
	$ancien_qte		=	0;
	$produit		=	0;
	$req="select * from delta_det_be where id=".$idd;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$ancien_qte		=	$enreg['quantite'];
		$produit		=	$enreg['produit'];
	}	
	
   $sql="DELETE FROM `delta_det_be` WHERE id=".$idd;
   $query=mysql_query($sql);
   
   
	//Mise à jours stock produit
	$stock = 0;
	$reqprd="select * from delta_produits where id=".$produit;
	$queryprd=mysql_query($reqprd);
	while($enregprd=mysql_fetch_array($queryprd)){
		$stock =($enregprd['stock'] - $ancien_qte);
	}
	$sql="update delta_produits set stock=".$stock." where id=".$produit;
	$requete=mysql_query($sql);  
	
	//Stock magasin 
	$stock = 0;
	$reqmag="select * from delta_stock_magasin where magasin=".$magasin." and produit=".$produit;
	$querymag=mysql_query($reqmag);
	while($enregmag=mysql_fetch_array($querymag)){
		$stock = ($enregmag['stock']-$ancien_qte);
	}
	$sql="update delta_stock_magasin set stock=".$stock." where magasin=".$magasin." and produit=".$produit;
	$requete=mysql_query($sql);				
	

	//Mise à jours montant de bon
	$total = 0;
	$req="select sum(px_total) as total from delta_det_be where idbe=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$total = $enreg['total'];
	}
			
	$sql="update delta_be set montant=".$total." where id=".$id;
	$requete=mysql_query($sql);

	
	
	$req="select * from delta_det_be where idbe=".$id;
	$query=mysql_query($req);
	if(mysql_num_rows($query)<1){
		$sql="delete from delta_be where id=".$id;
		$requete = mysql_query($sql) ;

		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../gest_be.php" </SCRIPT>';
	} else{
		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../addedit_be.php?ID='.$id.'" </SCRIPT>';
	}
?>