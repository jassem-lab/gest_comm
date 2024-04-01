<?php include ("menu_footer/menu.php"); ?>

<div class="wrapper">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des taxes</h4>
                    <br> Utilisateur : <?php echo $_SESSION['delta_USER']; ?>
                </div>
            </div>
        </div>
    </div>
    <?php

if(isset($_POST['enregistrer_mail'])){	


	$timbre	        	=	addslashes($_POST["timbre"]) ;
	$fodec      		=	addslashes($_POST["fodec"]) ;
	$exercice      		=	addslashes($_POST["exercice"]) ;
	$assujetti      	=	addslashes($_POST["assujetti"]) ;
	$codsoc			=	$_SESSION['delta_SOC'];
	
	
	$sql="UPDATE `delta_parametres` SET `timbre`='".$timbre."' , `fodec`='".$fodec."', `assujetti`='".$assujetti."' WHERE id=1";
    $req=mysql_query($sql);

	//Log
	$dateheure=date('Y-m-d H:i:s');
	$iduser=$_SESSION['delta_IDUSER'];
	
	$sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','25','2','1')";
	$req=mysql_query($sql1);		
	
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$timbre	    =	"" ;
$fodec	    =	"";
$assujetti	=	"";
$exercice	=	"" ;

$req="select * from delta_parametres where id=1 ";
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $timbre	    =	$enreg["timbre"] ;
    $fodec	    =	$enreg["fodec"] ;
    $assujetti	=	$enreg["assujetti"] ;
    $exercice	=	$enreg["exercice"] ;
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
									<div class="col-sm-3">
										<b>Timbre (*)</b>
										<input class="form-control" type="text" placeholder="Timbre .. " value="<?php echo $timbre; ?>"
											id="example-text-input" name="timbre" required>
									</div>
									<div class="col-sm-3">
										<b>Taux Fodec (*)</b>
										<input class="form-control" type="text" placeholder="Taux Fodec" value="<?php echo $fodec; ?>"
											id="example-text-input" name="fodec" required>
									</div>
									<div class="col-sm-3">
										<b>Taux retenu client exonéré d'assujetti TVA(*)</b>
										<input class="form-control" type="text" value="<?php echo $assujetti; ?>" id="example-text-input"
											name="assujetti" required>
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