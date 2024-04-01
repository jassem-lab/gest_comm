<?php
session_start();
include('../connexion/cn.php');
	
	$id    = $_GET["ID"] ; //Id entête
	
	$magasin		=	0;
	$numero			=	0;
	$req="select * from delta_be where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$magasin		=	$enreg['magasin'];
		$numero			=	$enreg['numero'];
	}	

	$ancien_qte		=	0;
	$produit		=	0;
	$req="select * from delta_det_be where idbe=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$ancien_qte		=	$enreg['quantite'];
		$produit		=	$enreg['produit'];
		
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
		
		
		
	}	
	
    $sql="DELETE FROM `delta_det_be` WHERE idbe=".$id;
    $query=mysql_query($sql);
   
	$sql="delete from delta_be where id=".$id;
	$requete = mysql_query($sql) ;
	
	 //Log
	$dateheure=date('Y-m-d H:i:s');
	$iduser=$_SESSION['delta_IDUSER'];
   
	$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `code`) VALUES ('".$dateheure."','".$iduser."','21','3','".$numero."')";
	$req=mysql_query($sql1);	
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../gest_be.php" </SCRIPT>';
?>