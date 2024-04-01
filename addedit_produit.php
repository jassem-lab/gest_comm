<?php include('menu_footer/menu.php') ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.nav-link.active {
    background: rgba(0, 0, 255, 0.6) !important;
    color: white !important;
    font-weight: 800;

}
</style>
<style>
.accordion {


    cursor: pointer;

    border: none;
    text-align: left;
    outline: none;
    font-weight: bold;
    font-size: 15px;
    transition: 0.4s;
}

.active,
.accordion:hover {}

.panel {
    width: 100%;
    padding: 40px 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>
<?php

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}else{
    $id = "0";
}
if(isset($_GET['Succ'])){
    $Succ = $_GET['Succ'];
}else{
    $id = "0";
}


if(isset($_POST['enregistrer_mail'])){	

$codsoc	                  	=	$_SESSION['delta_SOC'] ;
$reference	            	=	addslashes($_POST["reference"]) ;
$designation	        	=	addslashes($_POST["designation"]) ;
$tva      	            	=	addslashes($_POST["tva"]) ;
$stock           	    	=	addslashes($_POST["stock"]) ;
$seuil      		        =	addslashes($_POST["seuil"]) ;
$famille            	    =	addslashes($_POST["famille"]) ;
$unite      	        	=	addslashes($_POST["unite"]) ;
$marque      	        	=	addslashes($_POST["marque"]) ;
$emplacement      	      	=	addslashes($_POST["emplacement"]) ;
$colisage      	        	=	addslashes($_POST["colisage"]) ;
$code_ngp      	            =	addslashes($_POST["code_ngp"]) ;
$numero_serie      	        =	addslashes($_POST["numero_serie"]) ;
$prix_achat_ht              =   addslashes($_POST["prix_achat_ht"]);
$prix_achat_ttc             =   addslashes($_POST["prix_achat_ttc"]);
$prix_vente_ttc             =   addslashes($_POST["prix_vente_ttc"]);
$prix_vente_ht              =   addslashes($_POST["prix_vente_ht"]);
if(isset($_POST["fodec"])){
	$fodec                  =   1;
} else{
	$fodec                  =   0;
}

	if($id=="0")
	{
		$req="select max(id) as maxID from delta_produits";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			while($enreg=mysql_fetch_array($query)){
				$id = $enreg['maxID'] + 1;
			}
		} else{
			$id = 1;
		}
		
		$sql="INSERT INTO `delta_produits`(`id`,`codsoc`,`reference`,`designation`,`tva`,`stock`,`seuil`,`famille`,`unite`,`colisage`,`fodec`, `prix_achat_ht`, `prix_achat_ttc`,`prix_vente_ht`, `prix_vente_ttc`) VALUES
		('".$id."','".$codsoc."','".$reference."' , '".$designation."', '".$tva."', '".$stock."', '".$seuil."', '".$famille."', '".$unite."','".$colisage."','".$fodec."', '".$prix_achat_ht."' , '".$prix_achat_ttc."' , '".$prix_vente_ht."' , '".$prix_vente_ttc."' )";
		 $req=mysql_query($sql);
		 
		 //Log
		$dateheure=date('Y-m-d H:i:s');
		$iduser=$_SESSION['delta_IDUSER'];
	   
		$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','5','1','".$id."')";
		$req=mysql_query($sql1);
		
		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="produits.php" </SCRIPT>';
		
	}
	else{
		$sql="UPDATE `delta_produits` SET `reference`='".$reference."' , `designation`='".$designation."', `tva`='".$tva."', `stock`='".$stock."', `seuil`='".$seuil."', `famille`='".$famille."', `unite`='".$unite."', `marque`='".$marque."', `magasin`='".$magasin."', `emplacement`='".$emplacement."',  `numero_serie`='".$numero_serie."', `code_ngp`='".$code_ngp."',`produit_compose`='".$produit_compose."' , `fodec`='".$fodec."',`type`='".$type."',`nature`='".$nature."',`colisage`='".$colisage."' WHERE id=".$id;
		$req=mysql_query($sql);
		
		$dateheure=date('Y-m-d H:i:s');
		$iduser=$_SESSION['delta_IDUSER'];
		
		$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','5','2','".$id."')";
		$req=mysql_query($sql1);	
		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="produits.php" </SCRIPT>';	
	}


		
}



if(isset($_POST['enregistrer_mail1'])){	

	$id	            	=	$_GET['ID'] ;
	$marque      	    =	addslashes($_POST["marque"]) ;
	$fournisseur   	    =	addslashes($_POST["fournisseur"]) ;
	$marque      	    =	addslashes($_POST["marque"]) ;
	$code_ngp      	    =	addslashes($_POST["code_ngp"]) ;
	$emplacement   	    =	addslashes($_POST["emplacement"]) ;
	$type	      	    =	addslashes($_POST["type"]) ;

    $sql="UPDATE `delta_produits` SET `marque`='".$marque."' , `fournisseur`='".$fournisseur."', `code_ngp`='".$code_ngp."', `emplacement`='".$emplacement."', `type`='".$type."' WHERE id=".$id;
    $req=mysql_query($sql);
	
    //Log
    $dateheure=date('Y-m-d H:i:s');
    $iduser=$_SESSION['delta_IDUSER'];
    $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','5','2','".$id."')";
    $req=mysql_query($sql1);				
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="produits.php" </SCRIPT>';

}

	if(isset($_GET['ID'])){
		$id = $_GET['ID'];
	}else{
		$id = "0";
	}
	$reference                   = "" ; 
	$designation                 = "" ; 
	$tva                         = "" ; 
	$stock                       = 0  ; 
	$seuil                       = 0  ; 
	$famille                     = "" ; 
	$unite                       = "" ; 
	$marque                      = "" ; 
	$magasin                     = "" ; 
	$emplacement                 = "" ; 
	$date_achat                  = "" ; 
	$fournisseur                 = "" ; 
	$numero_serie                = "" ; 
	$code_ngp                    = "" ; 
	$prix_achat_ht               = 0  ; 
	$prix_achat_ttc              = 0  ;
	$prix_vente_ttc              = 0  ;
	$prix_vente_ht               = 0  ;
	$colisage                    = "" ;
	$type                        = "1" ; 
	$nature                      = "1" ; 
	$fodec	                     = "0" ; 

	$req="select * from delta_produits where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		
		$reference                   = $enreg['reference'] ; 
		$designation                 = $enreg['designation'] ; 
		$tva                         = $enreg['tva'] ; 
		$stock                       = $enreg['stock'] ; 
		$seuil                       = $enreg['seuil'] ; 
		$famille                     = $enreg['famille'] ; 
		$unite                       = $enreg['unite'] ; 
		$marque                      = $enreg['marque'] ; 
		$magasin                     = $enreg['magasin'] ; 
		$emplacement                 = $enreg['emplacement'] ; 
		$date_achat                  = $enreg['date_achat'] ; 
		$fournisseur                 = $enreg['fournisseur'] ; 
		$numero_serie                = $enreg['numero_serie'] ;  
		$code_ngp                    = $enreg['code_ngp'] ;  
		$prix_achat_ht               = $enreg['prix_achat_ht'] ; 
		$prix_achat_ttc              = $enreg['prix_achat_ttc'] ; 
		$prix_vente_ttc              = $enreg['prix_vente_ttc'] ; 
		$prix_vente_ht               = $enreg['prix_vente_ht'] ; 
		$colisage                    = $enreg['colisage'] ; 
		$type                        = $enreg['type'] ; 
		$nature                      = $enreg['nature'] ; 	
		$fodec						 = $enreg['fodec'] ;
		
	}


?>

<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des produits</h4>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <?php if(isset($_GET['suc'])){ ?>
                            <?php if($_GET['suc']=='1'){ ?>
                            <font color="green" style="background-color:#FFFFFF;">
                                <center>Enregistrement effectué avec succès</center>
                            </font><br /><br />
                            <?php } }?>
                            <?php if(isset($_GET['err'])){ ?>
                            <?php if($_GET['err']=='1'){ ?>
                            <font color="red" style="background-color:#FFFFFF;">
                                <center>Enregistrement n'est pas effectué car le Code a barre existe déja dans la
                                    matiere premiere : <?php echo $_GET["Emp"] ; ?></center>
                            </font><br /><br />
                            <?php } }?>
                            <a href="produits.php" class="btn btn-primary waves-effect waves-light mb-2">Retour</a>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link   <?php if(isset($_GET['suc'])){ if($_GET['suc']==1){ ?> active show <?php } } ?>" style="background: #ffc107  " data-toggle="tab" href="#famille" role="tab">Information Général</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==2){ ?> active <?php } } ?>" style="background: #ffc107  " data-toggle="tab" href="#details"role="tab">Autres détails</a>
                                </li>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==4){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#stock"
                                        role="tab">Stock par magasin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==5){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#messages"
                                        role="tab">Numéro série</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if(isset($_GET['suc'])){ if($_GET['suc']==6){ ?> active <?php } } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#compose"
                                        role="tab">Nomenclaure</a>
                                </li>
                            </ul>
                            
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane <?php if(isset($_GET['suc'])){ if($_GET['suc']==1){ ?> active <?php } } ?>  <?php if (!(isset($_GET['suc']))){  ?> active <?php } ?> p-3 mt-5"
                                        id="famille" role="tabpanel">
										<form method="POST">
                                        <div class="form-group  row">
											<div class="col-sm-12 row">
												<div class="col-xl-2">
													<b>Nature (*)</b>
													<select class="form-control select2" name="nature" id="nature">
														<option value=""> Sélectionner une Nature </option>
														<?php
														$req="select * from delta_natures";
														$query=mysql_query($req);
														while($enreg=mysql_fetch_array($query)){
														?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($nature==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['nature']; ?></option>
														<?php } ?>
													</select>
												</div>											
												<div class="col-sm-2">
													<b>Référence (*)</b>
													<input class="form-control" type="text" placeholder="Référence" value="<?php echo $reference; ?>" name="reference" id="code" required>
												</div>										
												<div class="col-sm-2">
													<b>Désignation (*)</b>
													<input class="form-control" type="text" placeholder="Désignation" value="<?php echo $designation; ?>" name="designation" id="designation" required>
												</div>
												<div class="col-xl-2">
													<b>Famille de produit (*)</b>
													<select class="form-control select2" name="famille" id="famille">
														<option value=""> Sélectionner une famille </option>
														<option value="0"> Ajouter une famille </option>
														<?php
															$req="select * from delta_famille_produit where codsoc=".$_SESSION['delta_SOC'];
															$query=mysql_query($req);
															while($enreg=mysql_fetch_array($query)){
															?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($famille==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['designation']; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="col-xl-2">
													<b>Unité de produit </b>
													<select class="form-control select2" name="unite" id="unite">
														<option value=""> Sélectionner une Unité </option>
														<option value="0"> Ajouter une Unité </option>
														<?php
															$req="select * from delta_unite_produit where codsoc=".$_SESSION['delta_SOC']." order by code";
															$query=mysql_query($req);
															while($enreg=mysql_fetch_array($query)){
														?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($unite==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['designation']; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="col-xl-2">
													<b style="">Colisage </b>
													<select class="form-control select2" name="colisage" id="colisage">
														<option value=""> Sélectionner le type de colisage </option>
														<option value="0">Ajouter un Colisage</option>
														<?php
																$req="select * from delta_colisage where codsoc=".$_SESSION['delta_SOC'];
																$query=mysql_query($req);
																while($enreg=mysql_fetch_array($query)){
																?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($colisage==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['code']." (".$enreg['nbr_pieces'].")"; ?></option>
														<?php } ?>
													</select>
												</div>


												
											</div>
                                        </div>
                                        <div class="form-group  row" style="margin-top:30px">
											<div class="col-sm-12 row">		
												<div class="col-md-2"></div>
												<div class="col-sm-4 row"   style="border: ridge; margin-left:15px; margin-bottom:15px">		
												
													<div class="col-xl-6" >
														<b style="">TVA (*)</b>
														<select class="form-control select2" name="tva" id="tva">
															<option value="">TVA</option>
															<option value="1">Ajouter un tva</option>
															<?php
																	$req="select * from delta_TVAs where codsoc=".$_SESSION['delta_SOC']."  order by code";
																	$query=mysql_query($req);
																	while($enreg=mysql_fetch_array($query)){
																	?>
															<option value="<?php echo $enreg['code']; ?>"
																<?php if($tva==$enreg['code']) {?> selected <?php } ?>>
																<?php echo $enreg['code']; ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="col-xl-6">
														<br>
														<label class="form-check-label" for="fodec" style="font-weight : bold"> <i style="color:mediumblue">SOUMIS FODEC</i></label>
														<input style="width : 90px" name="fodec" class="form-check-input" type="checkbox" value="1" id="fodec" <?php if($fodec==1){ ?> checked <?php } ?> >													
													</div>
													<div class="col-xl-6" style="margin-top:20px">
														<b style="color:green">STOCK</b>
														<input type="number" value="<?php echo $stock; ?>" name="stock"  readonly class="form-control">
													</div>	
													<div class="col-xl-6" style="margin-top:20px">
														<b style="color:red">SEUIL</b>
														<input type="number" value="<?php echo $seuil; ?>"  name="seuil" class="form-control">
													</div>	
													
												</div>
												
												<div class="col-sm-4 row"   style="border: ridge; margin-left:15px; margin-bottom:15px">		
												
													<div class="col-xl-6" >
														 <b>Prix d'achat HT</b>
														  <input class="form-control" type="number" step='0.001' placeholder="Prix d'achat HT" value="<?php echo $prix_achat_ht ?>" name="prix_achat_ht" id="prix_achat_ht">
													</div>
													<div class="col-xl-6">
														<b>Prix d'achat TTC</b>
														<input class="form-control" type="number" step='0.001' placeholder="Prix d'achat TTC" value="<?php echo $prix_achat_ttc ?>" name="prix_achat_ttc" id="prix_achat_ttc">
													</div>
													<div class="col-xl-6" style="margin-top:20px">
														<b style="">Prix de vente HT</b>
														 <input class="form-control" type="number"  step='0.001' placeholder="Prix de vente HT" value="<?php echo $prix_vente_ht ?>" name="prix_vente_ht" id="prix_vente_ht">
													</div>	
													<div class="col-xl-6" style="margin-top:20px">
														 <b>Prix de vente TTC </b>
														<input class="form-control" type="number" step='0.001'  placeholder="Prix de vente TTC" value="<?php echo $prix_vente_ht ?>" name="prix_vente_ttc" id="prix_vente_ttc">
													</div>	
													<br>	
												</div>												
												<div class="col-md-2"></div>
												
												
											</div>
										</div>

                                       
											<div class="col-sm-3"><br>
												<button type="submit" class="btn btn-primary waves-effect waves-light">
													Enregistrer
												</button>
												<input class="form-control" type="hidden" name="enregistrer_mail">
											</div>
										 </form>
                                    </div>
                                    <div class="tab-pane p-3 mt-5 <?php if(isset($_GET['suc'])){ if($_GET['suc']==2){ ?> active <?php } } ?>"
                                        id="details" role="tabpanel">
										<form method="POST">
                                        <div class="form-group  row">
										 <h4 style=" font-weight : bold ; color : green ">Détails Produit :</h4><br>
										 <div class="col-xl-12 row">
                                            <div class="col-xl-3">
                                                <b>Fournisseur par défault </b>
                                                <select class="form-control select2" name="fournisseur" id="fournisseur">
                                                    <option value=""> Sélectionner un Fournisseur
                                                    </option>
                                                    <option value="0">Ajouter un fournisseur</option>
                                                    <?php
														$req="select * from delta_fournisseurs where codsoc=".$_SESSION['delta_SOC']."  order by code";
														$query=mysql_query($req);
														while($enreg=mysql_fetch_array($query)){
													?>
                                                    <option value="<?php echo $enreg['id']; ?>"
                                                        <?php if($fournisseur==$enreg['id']) {?> selected <?php } ?>>
                                                        <?php echo $enreg['raison_social']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <br>
											</div>	
                                            <div class="col-xl-3">
                                                <b>Marque </b>
                                                <select class="form-control select2" name="marque" id="marque">
                                                    <option value=""> Sélectionner une Marque </option>
                                                    <option value="0"> Ajouter une Marque </option>
                                                    <?php
												$req="select * from delta_marques  where codsoc=".$_SESSION['delta_SOC']." order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                    <option value="<?php echo $enreg['id']; ?>"
                                                        <?php if($marque==$enreg['id']) {?> selected <?php } ?>>
                                                        <?php echo $enreg['designation']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>	
											<div class="col-xl-2">
												<b style="color : red ; ">Emplacement</b>
												<select class="form-control select2" name="emplacement"
													id="emplacement">
													<option value=""> Sélectionner un Emplacement </option>
													<option value="0"> Ajouter un Emplacement </option>
													<?php
												$req="select * from delta_emplacements  where codsoc=".$_SESSION['delta_SOC']." order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
													<option value="<?php echo $enreg['id']; ?>"
														<?php if($emplacement==$enreg['id']) {?> selected <?php } ?>>
														<?php echo $enreg['designation']; ?></option>
													<?php } ?>
												</select>
											</div>	
											<div class="col-xl-2 ">
												<b>Code NGP </b>
												<input class="form-control" type="text" placeholder="Code NGP" value="<?php echo $code_ngp; ?>" name="code_ngp" id="code_ngp">
											</div>
											<div class="col-xl-2">
												<b>Type </b>
												<select class="form-control select2" name="type" id="type">
													<option value=""> Sélectionner un type </option>
													<?php
													$req="select * from delta_types";
													$query=mysql_query($req);
													while($enreg=mysql_fetch_array($query)){
													?>
													<option value="<?php echo $enreg['id']; ?>"
														<?php if($type==$enreg['id']) {?> selected <?php } ?>>
														<?php echo $enreg['type']; ?></option>
													<?php } ?>
												</select>
											</div>											
										 </div>
                                        </div>
                                        <?php if(isset($_GET['ID'])){ ?>
                                        <div class="col-sm-3"><br>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Enregistrer
                                            </button>
                                            <input class="form-control" type="hidden" name="enregistrer_mail1">
                                        </div>
                                        <?php } ?>
									</form>
                                    </div>
                                    <div class="tab-pane p-3 mt-5 <?php if(isset($_GET['suc'])){ if($_GET['suc']==4){ ?> active <?php } } ?>" id="stock" role="tabpanel">
                                    </div>

                                    <div class="tab-pane p-3 mt-5 <?php if(isset($_GET['suc'])){ if($_GET['suc']==5){ ?> active <?php } } ?>" id="magasin" role="tabpanel">
                                        <h4 style="color:green;margin-left:15px ;font-weight : bold">Autres informations:</h4>
                                    </div>
                                    <div class="tab-pane p-3 mt-5 <?php if(isset($_GET['suc'])){ if($_GET['suc']==3){ ?> active <?php } } ?>" id="messages" role="tabpanel">
                                        <div class="form-group  row">
                                            <div class="col-lg-2">
                                                <b>Numéro Série</b>
                                                <input class="form-control" type="text" placeholder="Numéro Série"
                                                    value="" name="numero_serie" id="numero_serie">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th>Numéro série</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
										<?php if(isset($_GET['ID'])){ ?>
											<div class="col-sm-3"><br>
												<button type="submit" class="btn btn-primary waves-effect waves-light">
													Enregistrer
												</button>
												<input class="form-control" type="hidden" name="enregistrer_mail">
											</div>
										 <?php } ?>	
                                    </div>
									
									
                                    <div class="tab-pane p-3 mt-5 <?php if(isset($_GET['suc'])){ if($_GET['suc']==6){ ?> active <?php } } ?>" id="compose" role="tabpanel">
										<?php if(isset($_GET['ID'])){ ?>
											<div class="col-sm-3"><br>
												<button type="submit" class="btn btn-primary waves-effect waves-light">
													Enregistrer
												</button>
												<input class="form-control" type="hidden" name="enregistrer_mail">
											</div>
										 <?php } ?>	
                                    </div>									
									
									
                                </div>

                           

                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page content-->
    </div>
</div>
<!-- page wrapper end -->

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>


<?php include("menu_footer/footer.php") ?>
<script>
$("#prix_achat_ht").on("change", function(){
	var tva = $("#tva").val();
	if(tva==''){
		alert("Vérifier le TVA SVP!");
		$("#prix_achat_ht").val(0);		
		return false;
	}
	var px  = $("#prix_achat_ht").val();
	var px_ttc = ((px*tva)/100);
	px_ttc = parseFloat(px_ttc) + parseFloat(px);
	$("#prix_achat_ttc").val(px_ttc.toFixed(3));
});
$("#prix_achat_ht").on("keyup", function(){
	var tva = $("#tva").val();
	if(tva==''){
		alert("Vérifier le TVA SVP!");
		$("#prix_achat_ht").val(0);		
		return false;
	}
	var px  = $("#prix_achat_ht").val();
	var px_ttc = ((px*tva)/100);
	px_ttc = parseFloat(px_ttc) + parseFloat(px);
	$("#prix_achat_ttc").val(px_ttc.toFixed(3));
});
$("#prix_achat_ht").on("keypress", function(){
	var tva = $("#tva").val();
	if(tva==''){
		alert("Vérifier le TVA SVP!");
		$("#prix_achat_ht").val(0);		
		return false;
	}
	var px  = $("#prix_achat_ht").val();
	var px_ttc = ((px*tva)/100);
	px_ttc = parseFloat(px_ttc) + parseFloat(px);
	$("#prix_achat_ttc").val(px_ttc.toFixed(3));
});


$("#prix_vente_ht").on("change", function(){
	var tva = $("#tva").val();
	if(tva==''){
		alert("Vérifier le TVA SVP!");
		$("#prix_achat_ht").val(0);		
		return false;
	}
	var px  = $("#prix_vente_ht").val();
	var px_ttc = ((px*tva)/100);
	px_ttc = parseFloat(px_ttc) + parseFloat(px);
	$("#prix_vente_ttc").val(px_ttc.toFixed(3));
});
$("#prix_vente_ht").on("keyup", function(){
	var tva = $("#tva").val();
	if(tva==''){
		alert("Vérifier le TVA SVP!");
		$("#prix_achat_ht").val(0);		
		return false;
	}
	var px  = $("#prix_vente_ht").val();
	var px_ttc = ((px*tva)/100);
	px_ttc = parseFloat(px_ttc) + parseFloat(px);
	$("#prix_vente_ttc").val(px_ttc.toFixed(3));
});
$("#prix_vente_ht").on("keypress", function(){
	var tva = $("#tva").val();
	if(tva==''){
		alert("Vérifier le TVA SVP!");
		$("#prix_achat_ht").val(0);		
		return false;
	}
	var px  = $("#prix_vente_ht").val();
	var px_ttc = ((px*tva)/100);
	px_ttc = parseFloat(px_ttc) + parseFloat(px);
	$("#prix_vente_ttc").val(px_ttc.toFixed(3));
});
</script>
