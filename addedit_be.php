<?php include ("menu_footer/menu.php"); ?>

<div class="wrapper">

  <div class="page-title-box">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title">Gestion des entrées marchandises</h4>
				<br> Utilisateur : <?php echo $_SESSION['delta_USER']; ?>
			</div>
		</div>
	</div>
  </div>
  <script>
		function Supprimer(id,idd)
	  {
			if(confirm('Confirmez-vous cette action?'))
			{
				document.location.href="page_js/supprimerdet_be.php?IDD="+idd+"&ID="+id ;
			}			    
	  }	
  </script>
 <?php

	if(isset($_GET['ID'])){
		$id 			=   $_GET['ID'];
		$reference		=	"";
	}else{
		$id 			= "0";
		$reference		=	"";
		$exercice		=	0;
		$req="select * from delta_parametres";
		$query=mysql_query($req);
		while($enreg=mysql_fetch_array($query)){
			$exercice	=	$enreg['exercice'];
		}
		
		$reqbe="select * from delta_be where exercice=".$exercice;
		$querybe=mysql_query($reqbe);
		if(mysql_num_rows($querybe)>0){
			while($enregbe=mysql_fetch_array($querybe)){
				$reference	=	$enregbe['numero']+1;
			}
		} else{
				$reference	=	$exercice.'0001';
		}

	}

	if(isset($_GET['IDD'])){
		$idd = $_GET['IDD'];
	}else{
		$idd = "0";
	}

if(isset($_POST['enregistrer_mail'])){	

	$numero		                    = addslashes($_POST["reference"]) ;
	$date		                    = addslashes($_POST["date"]) ;
	$fournisseur                    = addslashes($_POST["fournisseur"]) ;
	$magasin	                    = addslashes($_POST["magasin"]) ;
	$remarque	                    = addslashes($_POST["remarque"]) ;
	$idutilisateur                  = $_SESSION['delta_IDUSER'] ;
	$codsoc			                = $_SESSION['delta_SOC'] ;
	$dateheure						= date("Y-m-d H:i:s");
	
	$produit	                    = addslashes($_POST["produit"]) ;
	$px_ht		                    = addslashes($_POST["px_ht"]) ;
	$tva		                    = addslashes($_POST["tva"]) ;
	$val_tva	                    = addslashes($_POST["val_tva"]) ;
	$px_ttc		                    = addslashes($_POST["px_ttc"]) ;
	$quantite	                    = addslashes($_POST["quantite"]) ;
	$px_ttc_total                   = addslashes($_POST["px_ttc_total"]) ;
	$taux_remise                    = addslashes($_POST["taux_remise"]) ;
	$val_remise	                    = addslashes($_POST["val_remise"]) ;
	$px_ht_total_remise             = addslashes($_POST["px_ht_total_remise"]) ;
	$px_ht_total					= addslashes($_POST["px_ht_total"]) ;
	
	
	if(isset($_POST["colisage"])){
		if ($_POST["colisage"] == '0')
		{
			$colisage			=	'0';	
			$quantite_colis		=	0;
			$qte_colis			=   0 ;
		}else{
			$colisage			=	'1';
			$quantite_colis		=   addslashes($_POST["quantite"]) ;
			$qte_colis			=	addslashes($_POST["qte_colis"]) ;
			$quantite			=   $quantite_colis*$qte_colis;
		}			
	} else{
		$colisage				=	0;
		$quantite_colis			=   0 ;
		$qte_colis				=   0 ;
	}
	
	
	
	
	if($id==0){
			//Vérification de numérotation
			$id 			= "0";
			$reference		= "";
			$exercice		= 0;
			$req="select * from delta_parametres";
			$query=mysql_query($req);
			while($enreg=mysql_fetch_array($query)){
				$exercice	=	$enreg['exercice'];
			}
			$reqbe="select * from delta_be where exercice=".$exercice;
			$querybe=mysql_query($reqbe);
			if(mysql_num_rows($querybe)>0){
				while($enregbe=mysql_fetch_array($querybe)){
					$reference	=	$enregbe['numero']+1;
				}
			} else{
					$reference	=	$exercice.'0001';
			}

			$reqMax="select max(id) as maxID from delta_be";
			$queryMax=mysql_query($reqMax);
			if(mysql_num_rows($queryMax)>0){
				while($enregMax=mysql_fetch_array($queryMax)){
					$id = $enregMax['maxID'] + 1 ;
				}
			} else{
				$id = 1;				
			}
			
			//Insertion de l'entête 
			$sql="INSERT INTO `delta_be`(`id`, `numero`, `date`, `fournisseur`, `observation`, `idutilisateur`, `dateheure`, `exercice`, `magasin`, `codsoc`) VALUES 
			('".$id."','".$reference."','".$date."','".$fournisseur."','".$remarque."','".$idutilisateur."','".$dateheure."','".$exercice."','".$magasin."','".$codsoc."')";
			$requete=mysql_query($sql);
			
			 //Log
			$dateheure=date('Y-m-d H:i:s');
			$iduser=$_SESSION['delta_IDUSER'];
		   
			$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','21','1','".$id."')";
			$req=mysql_query($sql1);

			
			//Insertion détails
			$sql="INSERT INTO `delta_det_be`(`idbe`, `produit`, `px_ht`, `tva`, `val_tva`, `px_ttc`, `quantite`, `quantite_colis`, `taux_remise`, `valeur_remise`, `px_total`, `date_achat`, `colisage`, `quantite_par_colis`, `px_ht_total`, `px_ht_total_remise`)
			VALUES ('".$id."','".$produit."','".$px_ht."','".$tva."','".$val_tva."','".$px_ttc."','".$quantite."','".$quantite_colis."','".$taux_remise."','".$val_remise."','".$px_ttc_total."','".$date."','".$colisage."','".$qte_colis."','".$px_ht_total."','".$px_ht_total_remise."')";
			$requete=mysql_query($sql);

			//Mise à jours stock produit
			$stock = 0;
			$reqprd="select * from delta_produits where id=".$produit;
			$queryprd=mysql_query($reqprd);
			while($enregprd=mysql_fetch_array($queryprd)){
				$stock = $enregprd['stock'] + $quantite;
			}
			$sql="update delta_produits set stock=".$stock." where id=".$produit;
			$requete=mysql_query($sql);
			
			//Stock magasin 
			$reqmag="select * from delta_stock_magasin where magasin=".$magasin." and produit=".$produit;
			$querymag=mysql_query($reqmag);
			if(mysql_num_rows($querymag)>0){
				while($enregmag=mysql_fetch_array($querymag)){
					$stock = $enregmag['stock'] + $quantite;
				}
				$sql="update delta_stock_magasin set stock=".$stock." where magasin=".$magasin." and produit=".$produit;
				$requete=mysql_query($sql);				
			} else{
				$sql="INSERT INTO `delta_stock_magasin`(`magasin`, `produit`, `stock`) VALUES ('".$magasin."','".$produit."','".$quantite."')";
				$requete=mysql_query($sql);	
			}

	} else{
		$idbe=$id;
		if($idd==0){
			//Insertion détails
			$sql="INSERT INTO `delta_det_be`(`idbe`, `produit`, `px_ht`, `tva`, `val_tva`, `px_ttc`, `quantite`, `quantite_colis`, `taux_remise`, `valeur_remise`, `px_total`, `date_achat`, `colisage`, `quantite_par_colis`, `px_ht_total`, `px_ht_total_remise`)
			VALUES ('".$id."','".$produit."','".$px_ht."','".$tva."','".$val_tva."','".$px_ttc."','".$quantite."','".$quantite_colis."','".$taux_remise."','".$val_remise."','".$px_ttc_total."','".$date."','".$colisage."','".$qte_colis."','".$px_ht_total."','".$px_ht_total_remise."')";
			$requete=mysql_query($sql);

			//Mise à jours stock produit
			$stock = 0;
			$reqprd="select * from delta_produits where id=".$produit;
			$queryprd=mysql_query($reqprd);
			while($enregprd=mysql_fetch_array($queryprd)){
				$stock = $enregprd['stock'] + $quantite;
			}
			$sql="update delta_produits set stock=".$stock." where id=".$produit;
			$requete=mysql_query($sql);
			
			//Stock magasin 
			$reqmag="select * from delta_stock_magasin where magasin=".$magasin." and produit=".$produit;
			$querymag=mysql_query($reqmag);
			if(mysql_num_rows($querymag)>0){
				while($enregmag=mysql_fetch_array($querymag)){
					$stock = $enregmag['stock'] + $quantite;
				}
				$sql="update delta_stock_magasin set stock=".$stock." where magasin=".$magasin." and produit=".$produit;
				$requete=mysql_query($sql);				
			} else{
				$sql="INSERT INTO `delta_stock_magasin`(`magasin`, `produit`, `stock`) VALUES ('".$magasin."','".$produit."','".$quantite."')";
				$requete=mysql_query($sql);	
			}			
			
			
		} else{
			
			$ancien_qte		=	0;
			$req="select * from delta_det_be where id=".$idd;
			$query=mysql_query($req);
			while($enreg=mysql_fetch_array($query)){
				$ancien_qte		=	$enreg['quantite'];
			}			
			//Mise à jours table détail
			$sql="update delta_det_be set px_ht='".$px_ht."',tva='".$tva."',val_tva='".$val_tva."',px_ttc='".$px_ttc."',quantite='".$quantite."',
			quantite_colis='".$quantite_colis."',quantite_par_colis='".$qte_colis."',taux_remise='".$taux_remise."',valeur_remise='".$val_remise."',px_total='".$px_ttc_total."',colisage='".$colisage."',date_achat='".$date."'
			,px_ht_total='".$px_ht_total."',px_ht_total_remise='".$px_ht_total_remise."' where id=".$idd;
			$requete=mysql_query($sql);		


			//Mise à jours stock produit
			$stock = 0;
			$reqprd="select * from delta_produits where id=".$produit;
			$queryprd=mysql_query($reqprd);
			while($enregprd=mysql_fetch_array($queryprd)){
				$stock =($enregprd['stock'] - $ancien_qte) + $quantite;
			}
			$sql="update delta_produits set stock=".$stock." where id=".$produit;
			$requete=mysql_query($sql);
			
			//Stock magasin 
			$reqmag="select * from delta_stock_magasin where magasin=".$magasin." and produit=".$produit;
			$querymag=mysql_query($reqmag);
			if(mysql_num_rows($querymag)>0){
				while($enregmag=mysql_fetch_array($querymag)){
					$stock = ($enregmag['stock']-$ancien_qte) + $quantite;
				}
				$sql="update delta_stock_magasin set stock=".$stock." where magasin=".$magasin." and produit=".$produit;
				$requete=mysql_query($sql);				
			} else{
				$sql="INSERT INTO `delta_stock_magasin`(`magasin`, `produit`, `stock`) VALUES ('".$magasin."','".$produit."','".$quantite."')";
				$requete=mysql_query($sql);	
			}

			 //Log
			$dateheure=date('Y-m-d H:i:s');
			$iduser=$_SESSION['delta_IDUSER'];
		   
			$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','21','2','".$id."')";
			$req=mysql_query($sql1);			
		}		
	}
	
		
	//Mise à jours montant de bon
	$total = 0;
	$req="select sum(px_total) as total from delta_det_be where idbe=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$total = $enreg['total'];
	}
			
	$sql="update delta_be set montant=".$total." where id=".$id;
	$requete=mysql_query($sql);				
	

		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="addedit_be.php?ID='.$id.'&suc=1" </SCRIPT>';

}
	$fournisseur		=	"0";
	$remarque			=	"";
	$magasin			=	"0";
	$produit			=	"0";
	
	$date				=	date("Y-m-d");
	$req="select  * from delta_be where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$fournisseur		=	$enreg['fournisseur'];
		$magasin			=	$enreg['magasin'];
		$date				=	$enreg['date'];
		$remarque			=	$enreg['observation'];
		$reference			=	$enreg['numero'];

	}
	
	$px_ht					=	"0";
	$px_ttc					=	"0";
	$tva					=	"0";
	$val_tva				=	"0";
	$colisage				=	"0";	
	$colis				    =	"";
	$qte_colis			    =	"";	
	$produit			    =	"0";	
	$quantite			    =	"0";
	$quantite_colis		    =	"0";
	$quantite_par_colis	    =	"0";
	$taux_remise		    =	"0";
	$valeur_remise		    =	"0";
	$px_total			    =	"0";
	$px_ttc_total			=	"0";
	$px_ht_total			=	"0";
	$px_ht_total_remise		=	"0";
	$req="select  * from delta_det_be where id=".$idd;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$produit			=	$enreg['produit'];
		$px_ht				=	$enreg['px_ht'];
		$px_ttc				=	$enreg['px_ttc'];
		$tva				=	$enreg['tva'];
		$val_tva			=	$enreg['val_tva'];
		$colisage			=	$enreg['colisage'];
		$quantite			=	$enreg['quantite'];
		$quantite_colis		=	$enreg['quantite_colis'];
		$quantite_par_colis	=	$enreg['quantite_par_colis'];
		$taux_remise		=	$enreg['taux_remise'];
		$valeur_remise		=	$enreg['valeur_remise'];
		$px_total			=	$enreg['px_total'];
		$px_ht_total		=	$enreg['px_ht_total'];
		$px_ht_total_remise	=	$enreg['px_ht_total_remise'];
		$px_ttc_total		=	$px_ttc*$quantite;
	}
	
	$colisage1 = 0;
	$reqprd="select * from delta_produits where id=".$produit;
	$queryprd=mysql_query($reqprd);
	while($enregprd=mysql_fetch_array($queryprd)){
		$colisage1			=	$enregprd['colisage'];
	}	
	$colis				   =	"";
	$qte_colis			   =	"";
	$reqcoli="select * from delta_colisage where id=".$colisage1;
	$querycoli=mysql_query($reqcoli);
	while($enregcoli=mysql_fetch_array($querycoli)){
		$colis				=	$enregcoli['code'].' | Quantité par colis: '.$enregcoli['nbr_pieces'];
		$qte_colis			=	$enregcoli['nbr_pieces'];
	}
	if($colisage==1){
		$quantite			=	$quantite_colis;
	}
	
?> 
  <div class="page-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card m-b-20">
						<div class="card-body">
							<a href="gest_be.php" class="btn btn-primary waves-effect waves-light">Retour</a> 
							<?php if(isset($_GET['suc'])){ ?>
								<?php if($_GET['suc']=='1'){ ?>
								<font color="green" style="background-color:#FFFFFF;"><center>Enregistrement effectué avec succès</center></font><br /><br />
							<?php } }?>		
							<form action="" method="POST"   enctype="multipart/form-data">    
								<div class="form-group row">
									<div class="col-sm-2">
									<b>Numéro (*)</b>
										<input class="form-control" type="text" placeholder="Référence" value="<?php echo $reference; ?>"  name="reference" id="reference" readonly required>
									</div>	
									<div class="col-sm-2">
									<b>Date (*)</b>
										<input class="form-control" type="date" placeholder="Date" value="<?php echo $date; ?>" id="example-text-input" name="date" required>
									</div>
									<div class="col-sm-2">
									<b>Liste des magasins (*)</b>
										<select class="form-control select2" name="magasin" required>
											<option value=""> Sélectionner une magasin </option>
											<?php
											if($magasin=="0"){
												$req="select * from delta_magasins order by code";
											} else{
												$req="select * from delta_magasins where id=".$magasin;
											}											
											$query=mysql_query($req);
											while($enreg=mysql_fetch_array($query)){
											?>
											<option value="<?php echo $enreg['id']; ?>" <?php if($magasin==$enreg['id']) {?> selected <?php } ?>>
												<?php echo $enreg['code']; ?>
											</option>
											<?php } ?>
										</select>										
									</div>										
									<div class="col-sm-3">
									<b>Liste des fournisseurs (*)</b>
										<select class="form-control select2" name="fournisseur" required>
											<option value=""> Sélectionner un fournisseur </option>
											<?php
											if($fournisseur=="0"){
												$req="select * from delta_fournisseurs order by code";
											} else{
												$req="select * from delta_fournisseurs where id=".$fournisseur;
											}
											
											$query=mysql_query($req);
											while($enreg=mysql_fetch_array($query)){
											?>
											<option value="<?php echo $enreg['id']; ?>" <?php if($fournisseur==$enreg['id']) {?> selected <?php } ?>>
												<?php echo $enreg['code']."-".$enreg['raison_social']; ?>
											</option>
											<?php } ?>
										</select>										
									</div>	
									<div class="col-sm-3">	
										<b>Observation</b>
										<textarea class="form-control" id="remarque" name="remarque"><?php echo $remarque; ?></textarea>
									</div>
								</div>
								
								
								<div class="form-group row">
									<div class="col-sm-4">
									<b>Liste des produits (*)</b>
										<select class="form-control select2" name="produit" id="produit" required>
											<option value="0"> Sélectionner un produit </option>
											<?php
											if($produit==0){
												$req="select * from delta_produits where nature=0 and not exists(
												select * from delta_det_be where delta_det_be.produit=delta_produits.id and idbe=".$id.") order by reference";
											} else{
												$req="select * from delta_produits where id=".$produit;
											}
											
											$query=mysql_query($req);
											while($enreg=mysql_fetch_array($query)){
											?>
											<option value="<?php echo $enreg['id']; ?>" <?php if($produit==$enreg['id']) {?> selected <?php } ?>>
												<?php echo $enreg['reference']." - ".$enreg['designation']; ?>
											</option>
											<?php } ?>
										</select>										
									</div>
									<?php if($produit==0){ ?>
									<div class="col-sm-4" id="spanProduit">
										<br>
										<span style="color:blue">Sélectionner un produit pour voir les détails</span>
									</div>
									<?php } ?>
								</div>	
								<?php if($produit>0){ ?>
								<div class="form-group row" >
									<div class="col-md-12 row">
									
										<div class="col-md-1">
											<b>Px unitaire HT</b>
											<input class="form-control" type="number" step="0.001" id="px_ht" name="px_ht" value="<?php echo $px_ht; ?>">
										</div>
										<div class="col-md-1">
											<b>Taux TVA</b>
											<input class="form-control" type="number" step="0.001" id="tva" name="tva" value="<?php echo $tva; ?>"  readonly>
										</div>	
										<div class="col-md-1">
											<b>Valeur TVA</b>
											<input class="form-control" type="number" step="0.001" id="val_tva" name="val_tva" value="<?php echo $val_tva; ?>" readonly>
										</div>	
										<div class="col-md-1">
											<b style="color:green">Px TTC</b>
											<input class="form-control" type="number" step="0.001" id="px_ttc" name="px_ttc" value="<?php echo $px_ttc; ?>" readonly>
										</div>			
										<?php if($colisage1>0){ ?>
										<div class="col-md-2">
											<b>Colisage</b><br>
											<input type="radio" id="colisage" name="colisage" value="0" <?php if($colisage==0){ ?> checked <?php } ?> >
											<label for="html">Non</label>
											<input type="radio" id="colisage" name="colisage" value="1" <?php if($colisage==1){ ?> checked <?php } ?>>
											<label for="css">Oui</label>
											<br>
											<span style="color:blue"  id="span"><?php echo $colis; ?></span>
											<input type="hidden" value="<?php echo $qte_colis; ?>" name="qte_colis" id="qte_colis">
											<input type="hidden" value="<?php echo $colisage1; ?>" name="coli" id="coli">
										</div>			
										<?php } ?>
										<div class="col-md-1">
											<b id="b_qte" style="color:red">QTE <?php if($colisage>0){ ?>par colis<?php } ?></b>
											<input class="form-control" type="number" step="" id="quantite" name="quantite" value="<?php echo $quantite; ?>" min="0" oninput="validity.valid||(value='');">
										</div>	
										
											<div class="col-md-1">
												<b style="color:#93eb93">Px HT Total</b>
												<input class="form-control" type="number" step="0.001" id="px_ht_total" name="px_ht_total" value="<?php echo  $px_ht_total; ?>" readonly style="background-color:#e0ffda">
											</div>			
										<div class="col-md-1">
											<b style="color:orange">Taux remise</b>
											<input class="form-control" type="number" step="0.001" id="taux_remise" name="taux_remise" value="<?php echo $taux_remise; ?>"  min="0" oninput="validity.valid||(value='');">
											<br>
											<b style="color:orange">Valeur remise</b>
											<input class="form-control" type="number" step="0.001" id="val_remise" name="val_remise" value="<?php echo $valeur_remise; ?>"  min="0" readonly  style="background-color:orange">
										</div>
										<div class="col-md-2">
											<b style="color:#93eb93">Px HT Total après remise</b>
											<input class="form-control" type="number" step="0.001" id="px_ht_total_remise" name="px_ht_total_remise" value="<?php echo $px_ht_total_remise; ?>" readonly style="background-color:#e0ffda">
										</div>			
										<div class="col-md-2">
											<b style="color:#93eb93">Px TTC Total</b>
											<input class="form-control" type="number" step="0.001" id="px_ttc_total" name="px_ttc_total" value="<?php echo $px_ttc_total; ?>" readonly style="background-color:#e0ffda">
										</div>			
									</div>	
								</div>		
								<?php } ?>
								
								
								<div class="form-group row" id="DetailProduit" style="display:none">
								
								
								</div>

								<div class="col-sm-3"><br>
									<button type="button" class="btn btn-primary waves-effect waves-light btnSend">
										Enregistrer
									</button>								
								
									<button type="submit" id="btnSend" class="btn btn-primary waves-effect waves-light" style="display:none">
										Enregistrer
									</button>
									<input class="form-control" type="hidden" name="enregistrer_mail">
								</div>	

							</form>   
						</div>

					</div>
				 </div> 
			</div> 
<?php
	$total = 0;
	$req="select montant from delta_be where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$total = $enreg['montant'];
	}

?>			
			<div class="row">
				<div class="col-lg-12">
					<div class="card m-b-20">
						<div class="card-body">
							<h3>Détail bon d'entrée</h3>	
							<?php if($total>0){ ?>
							<b style="color:green" > TOTAL TTC de Bon d'entrée : <?php echo  number_format($total,'3','.',''); ?></b><br>
							<?php } ?>
								<br>
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th><b>Produit</b></th>
											<th><b>Px HT</b></th>
											<th><b>TVA</b></th>
											<th><b>Valeur Tva</b></th>
											<th><b>Px TTC</b></th>
											<th><b>Colisage</b></th>
											<th><b>Quantite</b></th>
											<th><b>Px HT Total</b></th>
											<th><b>Taux remise</b></th>
											<th><b>Valeur remise</b></th>
											<th><b>Px HT Total après remise</b></th>
											<th><b>Px TTC Total</b></th>
											<th><b>Action</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
	$req="select * from delta_det_be where idbe=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$produit = "";
		$reqprd="select * from delta_produits where id=".$enreg['produit'];
		$queryprd=mysql_query($reqprd);
		while($enregprd=mysql_fetch_array($queryprd)){
			$produit = $enregprd['reference'];
		}
		$colisage='';
		if($enreg['colisage']==0){
			$colisage='Non';
		} else{
			$colisage='Oui';
			$colisage=$colisage.'<br>Quantité Par colis:'.$enreg['quantite_par_colis'];
		}
?>
                                        <tr>
                                            <td><?php echo $produit; ?></td>
											<td><?php echo $enreg['px_ht']; ?></td>
											<td><?php echo $enreg['tva']; ?></td>
											<td><?php echo $enreg['val_tva']; ?></td>
											<td><?php echo $enreg['px_ttc']; ?></td>
											<td><b style="color:green"><?php echo $colisage; ?></b></td>
											<td><?php echo $enreg['quantite']; ?></td>
											<td><?php echo $enreg['px_ht_total']; ?></td>
											<td><?php echo $enreg['taux_remise']; ?></td>
											<td><b style="color:orange"><?php echo $enreg['valeur_remise']; ?></b></td>
											<td><b style="color:green"><?php echo $enreg['px_ht_total_remise']; ?></b></td>
											<td><b style="color:green"><?php echo $enreg['px_total']; ?></b></td>
											<td>
												<a href="addedit_be.php?ID=<?php echo $id; ?>&IDD=<?php echo $enreg['id']; ?>" class="btn btn-warning waves-effect waves-light">
													<i class="mdi mdi-tooltip-edit"></i>
												</a>
												<a href="Javascript:Supprimer('<?php echo $id; ?>','<?php echo $enreg['id']; ?>')" class="btn btn-danger waves-effect waves-light" style="background-color:brown">
													<i class="mdi mdi-delete-forever"></i>
												</a>												
											</td>
                                        </tr>


<?php } ?>
                                        </tbody>
                                    </table>								
								
						</div> 
					</div> 
					
				</div> 
			</div> 	
			
			
		 </div> 
  </div>
 </div>

<?php include ("menu_footer/footer.php"); ?>
<script>
	$(".btnSend").on("click", function(){
		var produit	 = $("#produit").val();
		var quantite = $("#quantite").val();
		if(quantite==""){
			alert("Vérifier la quantite SVP!");
			return false;
		}
		if(produit==""){
			alert("Vérifier le produit SVP!");
			return false;
		}		
		$("#btnSend").trigger( "click" );

	});
	$("#produit").on("change", function(){
		var produit = $("#produit").val();
		if(produit>0){
			$("#spanProduit").hide();
			if (window.XMLHttpRequest)
			{
			  xmlhttp_selectPrd=new XMLHttpRequest();
			}else{
			  xmlhttp_selectPrd=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp_selectPrd.onreadystatechange=function(){
				
				if(xmlhttp_selectPrd.status==200 && xmlhttp_selectPrd.readyState==4){
					
					$('#DetailProduit').html(xmlhttp_selectPrd.responseText);
				}	
			}
			xmlhttp_selectPrd.open("POST","page_json/json_detail_produit_be.php",true);
			xmlhttp_selectPrd.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp_selectPrd.send("produit="+produit);	
			$("#DetailProduit").show();			
		} else{
			$("#DetailProduit").hide();
			$("#spanProduit").show();
		}
		
	});	
</script>
	<script>
	$("#quantite").on("change", function(){
		var coli	  = $("#coli").val();
		var tva	  	  = $("#tva").val();		
		var quantite  = $("#quantite").val();
		var px_ht     = $("#px_ht").val();
		var qte_colis = $("#qte_colis").val();
		var taux_remise = $("#taux_remise").val();
		if(coli>0){
			var colisage  = $("input[name='colisage']:checked").val();
			if(colisage==0){
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));
			} else{
				quantite = quantite*qte_colis;
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));		
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
			}				
		} else{
			var px_ht_total 		=  px_ht * quantite;
			var px_ht_total_remise 	=  px_ht * quantite;
			$("#px_ht_total").val(px_ht_total.toFixed(3));
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
		}
		if(taux_remise>0){
			var val_remise  = (px_ht_total*taux_remise)/100;
			$("#val_remise").val(val_remise.toFixed(3));
			var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		} else{
			$("#px_ht_total_remise").val(px_ht_total.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		}
	});	
	$("#quantite").on("keyup", function(){
		var coli	  = $("#coli").val();
		var tva	  	  = $("#tva").val();		
		var quantite  = $("#quantite").val();
		var px_ht     = $("#px_ht").val();
		var qte_colis = $("#qte_colis").val();
		var taux_remise = $("#taux_remise").val();
		if(coli>0){
			var colisage  = $("input[name='colisage']:checked").val();
			if(colisage==0){
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));
			} else{
				quantite = quantite*qte_colis;
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));		
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
			}				
		} else{
			var px_ht_total 		=  px_ht * quantite;
			var px_ht_total_remise 	=  px_ht * quantite;
			$("#px_ht_total").val(px_ht_total.toFixed(3));
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
		}
		if(taux_remise>0){
			var val_remise  = (px_ht_total*taux_remise)/100;
			$("#val_remise").val(val_remise.toFixed(3));
			var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		} else{
			$("#px_ht_total_remise").val(px_ht_total.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		}
	});	
	$("#quantite").on("keypress", function(){
		var coli	  = $("#coli").val();
		var tva	  	  = $("#tva").val();		
		var quantite  = $("#quantite").val();
		var px_ht     = $("#px_ht").val();
		var qte_colis = $("#qte_colis").val();
		var taux_remise = $("#taux_remise").val();
		if(coli>0){
			var colisage  = $("input[name='colisage']:checked").val();
			if(colisage==0){
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));
			} else{
				quantite = quantite*qte_colis;
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));		
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
			}				
		} else{
			var px_ht_total 		=  px_ht * quantite;
			var px_ht_total_remise 	=  px_ht * quantite;
			$("#px_ht_total").val(px_ht_total.toFixed(3));
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
		}
		if(taux_remise>0){
			var val_remise  = (px_ht_total*taux_remise)/100;
			$("#val_remise").val(val_remise.toFixed(3));
			var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		} else{
			$("#px_ht_total_remise").val(px_ht_total.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		}
	});		
	
	
	
	$("#taux_remise").on("change", function(){
		var taux_remise = $("#taux_remise").val();	
		var px_ht_total= $("#px_ht_total").val();
		var tva		   = $("#tva").val();
		
		var val_remise  = (px_ht_total*taux_remise)/100;
		$("#val_remise").val(val_remise.toFixed(3));
		var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
		$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
		var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
		$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
	});

	$("#taux_remise").on("keyup", function(){
		var taux_remise = $("#taux_remise").val();	
		var px_ht_total= $("#px_ht_total").val();
		var tva		   = $("#tva").val();
		
		var val_remise  = (px_ht_total*taux_remise)/100;
		$("#val_remise").val(val_remise.toFixed(3));
		var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
		$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
		var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
		$("#px_ttc_total").val(px_ttc_total.toFixed(3));	
	});
	
	$("#taux_remise").on("keypress", function(){
		var taux_remise = $("#taux_remise").val();	
		var px_ht_total= $("#px_ht_total").val();
		var tva		   = $("#tva").val();
		
		var val_remise  = (px_ht_total*taux_remise)/100;
		$("#val_remise").val(val_remise.toFixed(3));
		var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
		$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
		var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
		$("#px_ttc_total").val(px_ttc_total.toFixed(3));	
	});	
	

	$('input[type=radio][name=colisage]').change(function() {
		if (this.value == '0') {
			$("#b_qte").text("QTE");
			$("#span").hide();
		}
		else if (this.value == '1') {
			$("#b_qte").text("QTE par colis");
			$("#span").show();
		}
		$("#quantite").val('');
		$("#px_ht_total").val('');
		$("#px_ht_total_remise").val('');
	});	
	
	$("#px_ht").on("change", function(){
		var px  = $("#px_ht").val();
		var tva = $("#tva").val();
		var px_ttc = ((px*tva)/100);
		px_ttc = parseFloat(px_ttc) + parseFloat(px);
		$("#px_ttc").val(px_ttc.toFixed(3));
		var val_tva = px_ttc-px;
		$("#val_tva").val(val_tva.toFixed(3));
	});
	$("#px_ht").on("keyup", function(){
		var px  = $("#px_ht").val();
		var tva = $("#tva").val();
		var px_ttc = ((px*tva)/100);
		px_ttc = parseFloat(px_ttc) + parseFloat(px);
		$("#px_ttc").val(px_ttc.toFixed(3));
		var val_tva = px_ttc-px;
		$("#val_tva").val(val_tva.toFixed(3));
	});
	$("#px_ht").on("keypress", function(){
		var px  = $("#px_ht").val();
		var tva = $("#tva").val();
		var px_ttc = ((px*tva)/100);
		px_ttc = parseFloat(px_ttc) + parseFloat(px);
		$("#px_ttc").val(px_ttc.toFixed(3));
		var val_tva = px_ttc-px;
		$("#val_tva").val(val_tva.toFixed(3));
	});


	</script>