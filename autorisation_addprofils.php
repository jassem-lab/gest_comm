<?php include('menu_footer/menu.php') ?>

<?php
	$id 				= 	$_GET['ID'];
	$nom				=	"";
	$prenom				=	"";	
	$req="select * from delta_profil where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$nom				=	$enreg["profil"] ;
	}
?>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Autorisation des accès pour le profil : <?php echo $nom;?></h4>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
	
<?php
	if(isset($_POST['enregistrer_mail'])){	
	
		$req="select * from delta_autorisation_profils where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
		$query=mysql_query($req);
		if(mysql_num_rows($query)<1){
			$sql="INSERT INTO delta_autorisation_profils (idprofil,codsoc) values ('".$id."','".$_SESSION['delta_SOC']."')";
			$requete=mysql_query($sql);
		}	

	
		if(isset($_POST["utilisateurs"])){
			$sql="UPDATE delta_autorisation_profils SET `utilisateurs.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `utilisateurs.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}

		if(isset($_POST["socs"])){
			$sql="UPDATE delta_autorisation_profils SET `socs.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `socs.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}
		
		if(isset($_POST["tabs"])){
			$sql="UPDATE delta_autorisation_profils SET `tabs.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `tabs.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}		
		
		if(isset($_POST["produits"])){
			$sql="UPDATE delta_autorisation_profils SET `produits.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `produits.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}			
		
		
		if(isset($_POST["addedit_produit"])){
			$sql="UPDATE delta_autorisation_profils SET `addedit_produit.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `addedit_produit.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	

		
		if(isset($_POST["clients"])){
			$sql="UPDATE delta_autorisation_profils SET `clients.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `clients.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	

		
		if(isset($_POST["addedit_client"])){
			$sql="UPDATE delta_autorisation_profils SET `addedit_client.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `addedit_client.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	

		
		if(isset($_POST["fournisseurs"])){
			$sql="UPDATE delta_autorisation_profils SET `fournisseurs.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `fournisseurs.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	

		
		if(isset($_POST["addedit_fournisseur"])){
			$sql="UPDATE delta_autorisation_profils SET `addedit_fournisseur.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `addedit_fournisseur.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}			
		
		if(isset($_POST["gest_be"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_be.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_be.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}			
		
		
		if(isset($_POST["gest_bs"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_bs.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_bs.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}			
		
		if(isset($_POST["gest_devis"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_devis.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_devis.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}			
		
		
		if(isset($_POST["gest_bc"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_bc.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_bc.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
		
		if(isset($_POST["gest_bl"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_bl.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_bl.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["gest_fact"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_fact.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_fact.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["gest_avoir"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_avoir.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_avoir.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["gest_paie_cli"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_paie_cli.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_paie_cli.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["gest_paie_frn"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_paie_frn.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_paie_frn.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["journal"])){
			$sql="UPDATE delta_autorisation_profils SET `journal.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `journal.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["ca"])){
			$sql="UPDATE delta_autorisation_profils SET `ca.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `ca.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["cli_frn"])){
			$sql="UPDATE delta_autorisation_profils SET `cli_frn.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `cli_frn.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["stock_prd"])){
			$sql="UPDATE delta_autorisation_profils SET `stock_prd.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `stock_prd.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
				
		if(isset($_POST["mvt_stock"])){
			$sql="UPDATE delta_autorisation_profils SET `mvt_stock.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `mvt_stock.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}

		if(isset($_POST["val_stock"])){
			$sql="UPDATE delta_autorisation_profils SET `val_stock.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `val_stock.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}
		if(isset($_POST["inventaire_stock"])){
			$sql="UPDATE delta_autorisation_profils SET `inventaire_stock.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `inventaire_stock.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}
		if(isset($_POST["autorisation_profils"])){
			$sql="UPDATE delta_autorisation_profils SET `autorisation_profils.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `autorisation_profils.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
		if(isset($_POST["autorisation_users"])){
			$sql="UPDATE delta_autorisation_profils SET `autorisation_users.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `autorisation_users.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	

		if(isset($_POST["autorisation_addprofils"])){
			$sql="UPDATE delta_autorisation_profils SET `autorisation_addprofils.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `autorisation_addprofils.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
		
		if(isset($_POST["gest_det_devis"])){
			$sql="UPDATE delta_autorisation_profils SET `gest_det_devis.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `gest_det_devis.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}
		if(isset($_POST["profils"])){
			$sql="UPDATE delta_autorisation_profils SET `profils.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `profils.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}	
		if(isset($_POST["paremtrage"])){
			$sql="UPDATE delta_autorisation_profils SET `paremtrage.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `paremtrage.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}
		if(isset($_POST["taxs"])){
			$sql="UPDATE delta_autorisation_profils SET `taxs.php`=1 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		} else{
			$sql="UPDATE delta_autorisation_profils SET `taxs.php`=0 where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
			$requete=mysql_query($sql);
		}		
	}
?>
	
<?php
	$utilisateurs						=		0;
	$socs								=		0;
	$tabs								=		0;
	$produits							=		0;
	$addedit_produit					=		0;
	$clients							=		0;
	$addedit_client						=		0;
	$fournisseurs						=		0;
	$addedit_fournisseur				=		0;
	$gest_be							=		0;
	$gest_bs							=		0;
	$gest_devis							=		0;
	$gest_bc							=		0;
	$gest_bl							=		0;
	$gest_fact							=		0;
	$gest_avoir							=		0;
	$gest_paie_cli						=		0;
	$gest_paie_frn						=		0;
	$etat_paie_cli						=		0;
	$etat_paie_frn						=		0;
	$journal							=		0;
	$ca									=		0;
	$cli_frn							=		0;
	$stock_prd							=		0;
	$mvt_stock							=		0;
	$val_stock							=		0;
	$inventaire_stock					=		0;
	$autorisation_profils				=		0;
	$autorisation_users					=		0;
	$autorisation_addprofils			=		0;
	$gest_det_devis						=		0;
	$profils							=		0;
	$paremtrage							=		0;
	$taxs								=		0;
	
	$req="select * from delta_autorisation_profils where idprofil=".$id." and codsoc=".$_SESSION['delta_SOC'];
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$utilisateurs						=		$enreg['utilisateurs.php'];
		$socs								=		$enreg['socs.php'];
		$tabs								=		$enreg['tabs.php'];
		$produits							=		$enreg['produits.php'];
		$addedit_produit					=		$enreg['addedit_produit.php'];
		$clients							=		$enreg['clients.php'];
		$addedit_client						=		$enreg['addedit_client.php'];
		$fournisseurs						=		$enreg['fournisseurs.php'];
		$addedit_fournisseur				=		$enreg['addedit_fournisseur.php'];
		$gest_be							=		$enreg['gest_be.php'];
		$gest_bs							=		$enreg['gest_bs.php'];
		$gest_devis							=		$enreg['gest_devis.php'];
		$gest_bc							=		$enreg['gest_bc.php'];
		$gest_bl							=		$enreg['gest_bl.php'];
		$gest_fact							=		$enreg['gest_fact.php'];
		$gest_avoir							=		$enreg['gest_avoir.php'];
		$gest_paie_cli						=		$enreg['gest_paie_cli.php'];
		$gest_paie_frn						=		$enreg['gest_paie_frn.php'];
		$etat_paie_cli						=		$enreg['etat_paie_cli.php'];
		$etat_paie_frn						=		$enreg['etat_paie_frn.php'];
		$journal							=		$enreg['journal.php'];
		$ca									=		$enreg['ca.php'];
		$cli_frn							=		$enreg['cli_frn.php'];
		$stock_prd							=		$enreg['stock_prd.php'];
		$mvt_stock							=		$enreg['mvt_stock.php'];
		$val_stock							=		$enreg['val_stock.php'];
		$inventaire_stock					=		$enreg['inventaire_stock.php'];
		$autorisation_profils				=		$enreg['autorisation_profils.php'];
		$autorisation_users					=		$enreg['autorisation_users.php'];
		$autorisation_addprofils			=		$enreg['autorisation_addprofils.php'];
		$gest_det_devis						=		$enreg['gest_det_devis.php'];
		$profils							=		$enreg['profils.php'];
	}
?>
    <!-- page-title-box -->
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <a href="autorisation_profils.php" class="btn btn-primary waves-effect waves-light">Retour</a>
                            <form method="POST">

                                <div class="form-group" style="margin-top:30px">
									 <div class="col-md-12 row">
									  <input type="checkbox" id="profils" name="profils" value="1" <?php if($profils==1){ ?> checked <?php } ?>>
									  <label for="profils" style="margin-left: 5px;"> Gestion des profils</label><br>									  
									 </div>  
									 <div class="col-md-12 row">
									  <input type="checkbox" id="taxs" name="taxs" value="1" <?php if($taxs==1){ ?> checked <?php } ?>>
									  <label for="taxs" style="margin-left: 5px;"> Paramétrage des taxs</label><br>									  
									 </div>										 
									<div class="col-md-12 row">
									  <input type="checkbox" id="utilisateurs" name="utilisateurs" value="1" <?php if($utilisateurs==1){ ?> checked <?php } ?>>
									  <label for="utilisateurs" style="margin-left: 5px;"> Gestion des utilisateurs</label><br>
									 </div> 
									 
									 <div class="col-md-12 row">
									  <input type="checkbox" id="socs" name="socs" value="1" <?php if($socs==1){ ?> checked <?php } ?>>
									  <label for="socs" style="margin-left: 5px;"> Gestion des sociétés</label><br>									  
									 </div>   
									 
									 <div class="col-md-12 row">
									  <input type="checkbox" id="tabs" name="tabs" value="1" <?php if($tabs==1){ ?> checked <?php } ?>>
									  <label for="tabs" style="margin-left: 5px;"> Gestion des tables de base</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="produits" name="produits" value="1" <?php if($produits==1){ ?> checked <?php } ?>>
									  <label for="produits" style="margin-left: 5px;"> Gestion des produits</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="addedit_produit" name="addedit_produit" value="1"  <?php if($addedit_produit==1){ ?> checked <?php } ?>>
									  <label for="addedit_produit" style="margin-left: 5px;"> Ajout/Modification des produits</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="clients" name="clients" value="1" <?php if($clients==1){ ?> checked <?php } ?>>
									  <label for="clients" style="margin-left: 5px;"> Gestion des clients</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="addedit_client" name="addedit_client" value="1" <?php if($addedit_client==1){ ?> checked <?php } ?>>
									  <label for="addedit_client" style="margin-left: 5px;"> Ajout/Modification des clients</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="fournisseurs" name="fournisseurs" value="1" <?php if($fournisseurs==1){ ?> checked <?php } ?>>
									  <label for="fournisseurs" style="margin-left: 5px;"> Gestion des fournisseurs</label><br>									  
									 </div>   									 

									 <div class="col-md-12 row">
									  <input type="checkbox" id="addedit_fournisseur" name="addedit_fournisseur" value="1" <?php if($addedit_fournisseur==1){ ?> checked <?php } ?>>
									  <label for="addedit_fournisseur" style="margin-left: 5px;"> Ajout/Modification des fournisseurs</label><br>									  
									 </div> 

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_be" name="gest_be" value="1" <?php if($gest_be==1){ ?> checked <?php } ?>>
									  <label for="gest_be" style="margin-left: 5px;"> Gestion des entrées marchandises</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_bs" name="gest_bs" value="1" <?php if($gest_bs==1){ ?> checked <?php } ?>>
									  <label for="gest_bs" style="margin-left: 5px;"> Gestion des sorties marchandises</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_devis" name="gest_devis" value="1" <?php if($gest_devis==1){ ?> checked <?php } ?>>
									  <label for="gest_devis" style="margin-left: 5px;"> Gestion des devis</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_bc" name="gest_bc" value="1" <?php if($gest_bc==1){ ?> checked <?php } ?>>
									  <label for="gest_bc" style="margin-left: 5px;"> Gestion des commandes clients</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_bl" name="gest_bl" value="1" <?php if($gest_bl==1){ ?> checked <?php } ?>>
									  <label for="gest_bl" style="margin-left: 5px;"> Gestion des livraisons clients</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_fact" name="gest_fact" value="1" <?php if($gest_fact==1){ ?> checked <?php } ?>>
									  <label for="gest_fact" style="margin-left: 5px;"> Gestion des factures clients</label><br>									  
									 </div>   

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_avoir" name="gest_avoir" value="1" <?php if($gest_avoir==1){ ?> checked <?php } ?>>
									  <label for="gest_avoir" style="margin-left: 5px;"> Gestion des avoirs</label><br>									  
									 </div>   									 

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_paie_cli" name="gest_paie_cli" value="1" <?php if($gest_paie_cli==1){ ?> checked <?php } ?>>
									  <label for="gest_paie_cli" style="margin-left: 5px;"> Paiement clients</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_paie_frn" name="gest_paie_frn" value="1" <?php if($gest_paie_frn==1){ ?> checked <?php } ?>>
									  <label for="gest_paie_frn" style="margin-left: 5px;"> Paiement fournisseurs</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="etat_paie_cli" name="etat_paie_cli" value="1" <?php if($etat_paie_cli==1){ ?> checked <?php } ?>>
									  <label for="etat_paie_cli" style="margin-left: 5px;"> Etats paiements clients</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="etat_paie_frn" name="etat_paie_frn" value="1"<?php if($etat_paie_frn==1){ ?> checked <?php } ?>>
									  <label for="etat_paie_frn" style="margin-left: 5px;"> Etats paiements fournisseurs</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="journal" name="journal" value="1" <?php if($journal==1){ ?> checked <?php } ?>>
									  <label for="journal" style="margin-left: 5px;"> Journal des mouvements</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="ca" name="ca" value="1" <?php if($ca==1){ ?> checked <?php } ?>>
									  <label for="ca" style="margin-left: 5px;"> Chiffre d'affaires</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="cli_frn" name="cli_frn" value="1" <?php if($cli_frn==1){ ?> checked <?php } ?>> 
									  <label for="cli_frn" style="margin-left: 5px;"> Liste des clients et fournisseurs</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="stock_prd" name="stock_prd" value="1" <?php if($stock_prd==1){ ?> checked <?php } ?>>
									  <label for="stock_prd" style="margin-left: 5px;"> Stock produits</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="mvt_stock" name="mvt_stock" value="1" <?php if($mvt_stock==1){ ?> checked <?php } ?>>
									  <label for="mvt_stock" style="margin-left: 5px;"> Mouvement de stock</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="stock_prd" name="val_stock" value="1" <?php if($val_stock==1){ ?> checked <?php } ?>>
									  <label for="val_stock" style="margin-left: 5px;"> Valorisation de stock</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="inventaire_stock" name="inventaire_stock" value="1" <?php if($inventaire_stock==1){ ?> checked <?php } ?>>
									  <label for="inventaire_stock" style="margin-left: 5px;"> Inventaire de stock</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="autorisation_profils" name="autorisation_profils" value="1" <?php if($autorisation_profils==1){ ?> checked <?php } ?>>
									  <label for="autorisation_profils" style="margin-left: 5px;"> Autoisation par profil</label><br>									  
									 </div>  
									 
									 <div class="col-md-12 row">
									  <input type="checkbox" id="autorisation_addprofils" name="autorisation_addprofils" value="1" <?php if($autorisation_addprofils==1){ ?> checked <?php } ?>>
									  <label for="autorisation_addprofils" style="margin-left: 5px;"> Gestion autoisation par profil</label><br>									  
									 </div>
									 
									 <div class="col-md-12 row">
									  <input type="checkbox" id="autorisation_users" name="autorisation_users" value="1" <?php if($autorisation_users==1){ ?> checked <?php } ?>>
									  <label for="autorisation_users" style="margin-left: 5px;"> Autoisation par utilisateur</label><br>									  
									 </div>  

									 <div class="col-md-12 row">
									  <input type="checkbox" id="gest_det_devis" name="gest_det_devis" value="1" <?php if($autorisation_users==1){ ?> checked <?php } ?>>
									  <label for="gest_det_devis" style="margin-left: 5px;"> Ajout/Modification Devis</label><br>									  
									 </div>  	

									 
								</div>

                                <div class="form-group m-b-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Enregistrer
                                        </button>
                                        <input class="form-control" type="hidden" name="enregistrer_mail">

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page content-->
    </div>
</div>
</div>
<!-- page wrapper end -->




<?php include("menu_footer/footer.php") ?>