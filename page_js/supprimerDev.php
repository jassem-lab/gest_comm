<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
     $req="select * from delta_devis  WHERE id=".$id;
    $query=mysql_query($req);
    while($enreg=mysql_fetch_array($query)){
        $code = $enreg['numero'];
    }
     $sql1="delete from `delta_devis` WHERE id=".$id;
    $requete1=mysql_query($sql1);
 
	$sql2 = "delete from `delta_det_devis` WHERE idd=".$id;
	$requete2 = mysql_query($sql2) ;
    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`,`code`) VALUES ('".$dateheure."','".$iduser."','21','3','".$id."','".$code."')";
    $req=mysql_query($sql1);	
     echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../gest_devis.php" </SCRIPT>';
	
?>