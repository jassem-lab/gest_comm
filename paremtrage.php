<?php include ("menu_footer/menu.php"); ?>

<div class="wrapper">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des exercices</h4>
                    <br> Utilisateur : <?php echo $_SESSION['delta_USER']; ?>
                </div>
            </div>
        </div>
    </div>
    <?php

if(isset($_POST['enregistrer_mail'])){	


	$exercice      	=	addslashes($_POST["exercice"]) ;
	$codsoc			=	$_SESSION['delta_SOC'];
	
	
	$sql="UPDATE `delta_parametres` SET `exercice`='".$exercice."',`codsoc`='".$codsoc."' WHERE id=1";
    $req=mysql_query($sql);

	//Log
	$dateheure=date('Y-m-d H:i:s');
	$iduser=$_SESSION['delta_IDUSER'];
	
	$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','24','2','1')";
	$req=mysql_query($sql1);		
	
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
	$exercice				=	"";	
	$req="select * from delta_parametres where id=1";
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$exercice				=	$enreg["exercice"] ;
	}
	
	?>
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
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <b>Exercice (*)</b>
                                        <input class="form-control" type="text" placeholder=""
                                            value="<?php echo $exercice; ?>" id="example-text-input" name="exercice" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <br>
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
        </div>
    </div>
</div>

<?php include ("menu_footer/footer.php"); ?>