<?php

if(isset($_GET['IDPR'])){
    $id = $_GET['IDPR'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail13'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$timbre	        	=	addslashes($_POST["timbre"]) ;
$fodec      		=	addslashes($_POST["fodec"]) ;
$exercice      		=	addslashes($_POST["exercice"]) ;
$assujetti      	=	addslashes($_POST["assujetti"]) ;


    
        $sql="UPDATE `delta_parametres` SET `timbre`='".$timbre."' , `fodec`='".$fodec."', `exercice`='".$exercice."', `assujetti`='".$assujetti."' WHERE id=1";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','13','2','".$id."')";
        $req=mysql_query($sql1);				
   

     echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=13" </SCRIPT>';
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

<form action="" method="POST">
    <div class="form-group row">
        <h3 class="col-lg-12 m-5">Paramètres (*)</h3>

        <div class="col-sm-2">
            <b>Timbre (*)</b>
            <input class="form-control" type="text" placeholder="Timbre .. " value="<?php echo $timbre; ?>"
                id="example-text-input" name="timbre" required>
        </div>
        <div class="col-sm-2">
            <b>Taux Fodec (*)</b>
            <input class="form-control" type="text" placeholder="Taux Fodec" value="<?php echo $fodec; ?>"
                id="example-text-input" name="fodec" required>
        </div>
        <div class="col-sm-3">
            <b>Taux retenu client exonéré d'assujetti TVA(*)</b>
            <input class="form-control" type="text" value="<?php echo $assujetti; ?>" id="example-text-input"
                name="assujetti" required>
        </div>

        <div class="col-sm-3">
            <b>Exercice (*)</b>
            <input class="form-control" type="text" placeholder="Taux Fodec" value="<?php echo $exercice; ?>"
                id="example-text-input" name="exercice" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-success waves-effect waves-light">
                Modifier
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail13">
        </div>
    </div>

</form>

</div>