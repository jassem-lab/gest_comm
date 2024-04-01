<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
    $req="select * from delta_unite_produit  WHERE id=".$id;
    $query=mysql_query($req);
    while($enreg=mysql_fetch_array($query)){
        $code = $enreg['code'];
    }
	$sql = "delete from `delta_unite_produit` WHERE id=".$id;
	$requete = mysql_query($sql) ;
	$dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`,`code`) VALUES ('".$dateheure."','".$iduser."','4','3','".$id."','".$code."')";
    $req=mysql_query($sql1);	
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../tabs.php?suc=2" </SCRIPT>';
	
  
?>