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
}



if(isset($_POST['enregistrer_mail'])){	
$code		                    = addslashes($_POST["code"]) ;
$raisonsocial                   = addslashes($_POST["raisonsocial"]) ; 
$mail                           = addslashes($_POST["mail"]) ; 
$tel                            = addslashes($_POST["tel"]) ; 
$pays                           = addslashes($_POST["pays"]) ; 
$adresse                        = addslashes($_POST["adresse"]) ; 
$region                         = addslashes($_POST["region"]) ; 
$matricule_fiscale              = addslashes($_POST["matriculeFiscale"]) ; 
$registre_commerce              = addslashes($_POST["registre_commerce"]) ; 
$RIB                            = addslashes($_POST["RIB"]) ; 
$banque                         = addslashes($_POST["banque"]) ; 
$zone							= addslashes($_POST["zone"]) ; 
$nature                         = addslashes($_POST["nature"]) ; 
$activite                       = addslashes($_POST["activite"]) ; 
$SWIFT                          = addslashes($_POST["SWIFT"]) ; 
$IBAN                           = addslashes($_POST["IBAN"]) ;
$num_exoneration                = addslashes($_POST["num_exoneration"]) ; 
$date_debut                     = addslashes($_POST["date_debut"]) ; 
$date_fin                       = addslashes($_POST["date_fin"]) ;  

    
	if($id=="0")
	{
		$req="select max(id) as maxID from delta_clients";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			while($enreg=mysql_fetch_array($query)){
				$id = $enreg['maxID'] + 1;
			}
		} else{
			$id = 1;
		}
		
		$req="select * from delta_clients where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?err=1" </SCRIPT>';
			exit;
		}
		
		
	    $sql="INSERT INTO `delta_clients`(`id`,`code`,`raison_social`,`mail`,`tel`,`pays`,`adresse`,`region`,`zone`,`matricule_fiscale`,`registre_commerce`,`rib`,`banque`
		,`nature`,`activite`,`swift`,`iban`,`num_exoneration`,`date_debut`,`date_fin`) VALUES
		('".$id."','".$code."','".$raisonsocial."','".$mail."','".$tel."','".$pays."','".$adresse."','".$region."','".$zone."','".$matricule_fiscale."','".$registre_commerce."'
		,'".$RIB."','".$banque."','".$nature."','".$activite."','".$SWIFT."','".$IBAN."','".$num_exoneration."','".$date_debut."','".$date_fin."')";
			//Log
		$req=mysql_query($sql);
		
		$dateheure=date('Y-m-d H:i:s');
		$iduser=$_SESSION['delta_IDUSER'];
	   
		$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','19','1','".$id."')";
		$req=mysql_query($sql1);
		
		
		
	}
	else{
		$sql="UPDATE `delta_clients` SET `code`='".$code."' ,`raison_social`='".$raisonsocial."' , `mail`='".$mail."' , `tel`='".$tel."' , `zone`='".$zone."' , 
		`pays`='".$pays."' , `adresse`='".$adresse."' , `region`='".$region."' , `matricule_fiscale`='".$matricule_fiscale."' , `registre_commerce`='".$registre_commerce."'
		, `rib`='".$rib."', `banque`='".$banque."', `nature`='".$nature."', `activite`='".$activite."', `swift`='".$SWIFT."'
		, `iban`='".$IBAN."', `num_exoneration`='".$num_exoneration."', `date_debut`='".$date_debut."', `date_fin`='".$date_fin."' WHERE id=".$id;
		$req=mysql_query($sql);
		  //Log

		$dateheure=date('Y-m-d H:i:s');
		$iduser=$_SESSION['delta_IDUSER'];
		
		$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','19','2','".$id."')";
		$req=mysql_query($sql1);				
	}
		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="clients.php" </SCRIPT>';
}
$raisonsocial            = "" ; 
$mail                    = "" ; 
$tel                     = "" ; 
$matriculeFiscale        = "" ;
$adresse                 = "" ; 
$pays                    = "" ; 
$region                  = "" ; 
$zone   	             = "" ; 
$registre_commerce       = "" ; 
$mail2                   = "" ;
$gsm2                    = "" ;
$RIB                     = "" ;
$banque                  = "" ;
$nature                  = "1" ;
$activite                = "" ;
$SWIFT                   = "" ; 
$IBAN                    = "" ; 
$code					 = "" ; 
$num_exoneration		 = "" ; 
$date_debut				 = "" ; 
$date_fin				 = "" ; 

$req = "select * from delta_clients where id=".$id ;
$query = mysql_query($req) ; 
while($enreg = mysql_fetch_array($query)){
	$code           		 = $enreg["code"] ; 
    $raisonsocial            = $enreg["raison_social"] ; 
    $mail                    = $enreg["mail"] ; 
    $tel                     = $enreg["tel"] ; 
    $matriculeFiscale        = $enreg["matricule_fiscale"] ;
    $adresse                 = $enreg["adresse"] ; 
    $pays                    = $enreg["pays"] ; 
    $region                  = $enreg["region"] ; 
    $zone                    = $enreg["zone"] ; 
    $registre_commerce       = $enreg["registre_commerce"] ; 
    $mail2                   = $enreg["mail2"] ;
    $gsm2                    = $enreg["gsm2"] ;
    $RIB                     = $enreg["rib"] ;
    $banque                  = $enreg["banque"] ;
    $nature                  = $enreg["nature"] ;
    $SWIFT                   = $enreg["swift"] ;
    $IBAN                    = $enreg["iban"] ;
	$activite                = $enreg["activite"] ;
	$num_exoneration         = $enreg["num_exoneration"] ;
	$date_debut              = $enreg["date_debut"] ;
	$date_fin                = $enreg["date_fin"] ;
} 


?>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des Clients</h4>
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
                                <center>Le code client est déja existant</center>
                            </font><br /><br />
                            <?php } }?>
                            <a href="clients.php" class="btn btn-primary waves-effect waves-light">Retour</a>
                            <form method="POST">

                                <div class="form-group row" style="margin-top:30px">
									<div class="col-md-12 row">
										
										<div class="col-md-2">
											 <b>Code (*)</b>
											  <input class="form-control" type="text" placeholder="Code Client" value="<?php echo $code; ?>" id="code" name="code" required>
										</div>
										<div class="col-md-3">
											<b>Raison sociale (*)</b>
											<input class="form-control" type="text" placeholder="Raison sociale" value="<?php echo $raisonsocial; ?>" id="raisonsocial" name="raisonsocial" required>
										</div>	
										<div class="col-md-2">
											<b>Matricule Fiscale (*)</b>
											<input class="form-control" type="text" placeholder="MF" value="<?php echo $matriculeFiscale; ?>" id="matriculeFiscale" name="matriculeFiscale" required>
										</div>											
										<div class="col-md-2">
											<b>Registre de Commerce (*)</b>
											<input class="form-control" type="text" placeholder="RC" value="<?php echo $registre_commerce; ?>" id="registre_commerce" name="registre_commerce" required>
										</div>
										<div class="col-md-3">
											<b>Activité (*)</b>
											<input class="form-control" type="text" placeholder="Activité" value="<?php echo $activite; ?>" id="activite" name="activite" required>
										</div>
										
									</div>
								</div>
								
								<div class="form-group  row" style="margin-top:30px">
									<div class="col-sm-12 row">	
											<div class="col-sm-4 row"   style="border: ridge; margin-left:15px; margin-bottom:15px">		
												<div class="col-xl-12">
													<b>Nature de client (*)</b>
													<select class="form-control select2" name="nature" id="nature">
														<option value=""> Sélectionner une Nature </option>
														<?php
														$req="select * from delta_natures_client";
														$query=mysql_query($req);
														while($enreg=mysql_fetch_array($query)){
														?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($nature==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['nature']; ?></option>
														<?php } ?>
													</select>													
												</div>
												
												<div class="col-xl-12" style="margin-top:15px; display:none" id="DivExo1"> 
													<b style="color:green">N° Exoneration (*)</b>
													<input type="number" class="form-control" name="num_exoneration" value="<?php echo $num_exoneration; ?>" >
												</div>
												<div class="col-xl-6" style="margin-top:15px; display:none" id="DivExo2"> 
													 <b style="color:green">Date début (*)</b>
													 <input class="form-control" type="date"  value="<?php echo $date_debut; ?>" id="date_debut" name="date_debut">
												</div>
												<div class="col-xl-6" style="margin-top:15px; display:none" id="DivExo3">
													<b style="color:green">Date fin (*)</b>
													<input class="form-control"  type="date"  value="<?php echo $date_fin; ?>" id="date_fin" name="date_fin">
												</div>	
												
												<div class="col-xl-6" style="margin-top:15px"> 
													 <bstyle="color:green">Email (*)</b>
													 <input class="form-control" type="email" parsley-type="email" placeholder="Email de client" value="<?php echo $mail; ?>" id="mail" name="mail" required>
												</div>
												<div class="col-xl-6" style="margin-top:15px">
													<b>Téléphone (*)</b>
													<input class="form-control" data-parsley-type="number" type="number" placeholder="Téléphone de client" value="<?php echo $tel; ?>" id="tel" name="tel">
												</div>													
											</div>
											<div class="col-sm-4 row"   style="border: ridge; margin-left:15px; margin-bottom:15px">		
												<div class="col-xl-4">
													<b>Pays</b>
													<select class="form-control select2" name="pays" id="pays">
														<option value="0">Pays </option>
														<?php
														$req="select * from delta_pays";
														$query=mysql_query($req);
														while($enreg=mysql_fetch_array($query)){
																	?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($pays==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['designation']; ?></option>
														<?php } ?>
													</select>												
												</div>	
												<div class="col-xl-4">
													<b>Zone </b>
													<select class="form-control select2" name="zone" id="region">
														<option value="0">Zone </option>
														<?php
														$req="select * from delta_zones";
														$query=mysql_query($req);
														while($enreg=mysql_fetch_array($query)){
														?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($zone==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['designation']; ?></option>
														<?php } ?>
													</select>												
												</div>	
												<div class="col-xl-4">
													<b>Région</b>
													<select class="form-control select2" name="region" id="gouvernorat">
														<option value="0">Région </option>
														<?php
																	$req="select * from delta_regions";
																	$query=mysql_query($req);
																	while($enreg=mysql_fetch_array($query)){
																	?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($region==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['designation']; ?></option>
														<?php } ?>
													</select>												
												</div>	
												<div class="col-xl-12" style="margin-top:15px"> 
													 <b>Adresse</b>
													 <textarea class="form-control" id="adresse" name="adresse"><?php echo $adresse; ?></textarea>
												</div>												
											</div>	
											<div class="col-sm-4 row"   style="border: ridge; margin-left:15px; margin-bottom:15px">		
												<div class="col-xl-6">
													 <b>Banque</b>
													<select class="form-control select2" name="banque" id="banque">
														<option value="0"> Sélectionner </option>
														<?php
																	$req="select * from delta_banques";
																	$query=mysql_query($req);
																	while($enreg=mysql_fetch_array($query)){
																	?>
														<option value="<?php echo $enreg['id']; ?>"
															<?php if($banque==$enreg['id']) {?> selected <?php } ?>>
															<?php echo $enreg['designation']; ?></option>
														<?php } ?>
													</select>											
												</div>	
												<div class="col-xl-6"> 
													 <b>RIB</b>
													 <input class="form-control" type="text" parsley-type="RIB" placeholder="RIB" value="<?php echo $RIB; ?>" id="example-text-input" name="RIB">
												</div>
												<div class="col-xl-6" style="margin-top:15px">
													<b>SWIFT</b>
													<input class="form-control" type="text" parsley-type="SWIFT" placeholder="SWIFT" value="<?php echo $SWIFT; ?>" id="example-text-input" name="SWIFT">
												</div>	
												<div class="col-xl-6" style="margin-top:15px">
													<b>IBAN</b>
													<input class="form-control" type="text" parsley-type="IBAN" placeholder="IBAN" value="<?php echo $IBAN; ?>" id="example-text-input" name="IBAN">
												</div>													
											</div>
											
										</div>
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
<script>
	$(document).ready(function () {
		var nature = $("#nature").val();
		
		if(nature>1){
			$('#DivExo1').show();
			$('#DivExo2').show();
			$('#DivExo3').show();
		} else{
			$('#DivExo1').hide();
			$('#DivExo2').hide();
			$('#DivExo3').hide();
		}		
	});
	
	$("#nature").on("change", function(){
		var nature = $(this).val();
		if(nature>1){
			$('#DivExo1').show();
			$('#DivExo2').show();
			$('#DivExo3').show();
		} else{
			$('#DivExo1').hide();
			$('#DivExo2').hide();
			$('#DivExo3').hide();
		}
	});
</script>