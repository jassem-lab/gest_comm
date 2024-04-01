<?php
session_start();
include('../connexion/cn.php');
	$id  								= $_GET["ID"] ;
	$_SESSION['delta_SOC'] 				= $id;
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../dashbord.php"</SCRIPT>';
  
?>