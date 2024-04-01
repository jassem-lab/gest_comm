<?php

if(isset($_GET['IDC'])){
    $id = $_GET['IDC'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail16'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;
$nbr_pieces		    =	addslashes($_POST["nbr_pieces"]) ;
$poids_vide	    	=	addslashes($_POST["poids_vide"]) ;

$reqColisage="";
$colisage="";
if(isset($_POST['colisage'])){
	if(is_numeric($_POST['colisage'])){
		$colisage		    =	$_POST['colisage'];
		$reqColisage		=	" and  id=".$colisage;
	}
}

if($id=="0")
    {
		//Vérfication d'existance de code
		$req="select * from delta_colisage where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=16&err=1" </SCRIPT>';
			 exit;
		}		
        $req="select max(id) as maxID from delta_colisage";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_colisage`(`id`,`codsoc`,`code`,`designation`,`nbr_pieces`,`poids_vide`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."', '".$nbr_pieces."', '".$poids_vide."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','15','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_colisage` SET `code`='".$code."' , `designation`='".$designation."' , `nbr_pieces`='".$nbr_pieces."' , `poids_vide`='".$poids_vide."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','15','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

     echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=16" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;
$nbr_pieces         =   0 ;
$poids_vide         =   0 ;
$req="select * from delta_colisage where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
    $nbr_pieces 	=	$enreg["nbr_pieces"] ;
    $poids_vide	    =	$enreg["poids_vide"] ;
}
?>
<script>
function SupprimerColisage(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerColisage.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row" id="DivCOL" <?php if(!isset($_GET['add16']) and !isset($_GET['IDC']) ){?>
        style="display:none" <?php }?>>
        <div class="col-sm-2">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Code" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required>
        </div>
        <div class="col-sm-4">
            <b>Désignation (*)</b>
            <input class="form-control" type="text" placeholder="Désignation" value="<?php echo $designation; ?>"
                id="example-text-input" name="designation" required>
        </div>
        <div class="col-sm-2">
            <b>Nombre de pièce (*)</b>
            <input class="form-control" type="number" placeholder="Nombre de pièce" value="<?php echo $nbr_pieces; ?>"
                id="example-text-input" name="nbr_pieces" required>
        </div>
        <div class="col-sm-2">
            <b>Poids Vide (*)</b>
            <input class="form-control" type="number" placeholder="Poids Vide" value="<?php echo $poids_vide; ?>"
                id="example-text-input" name="poids_vide" required>
        </div>
        <div class="col-sm-2"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail16">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <div class="col-xl-12 row">
        <div class="col-xl-6">
            <b class="col-lg-12" style="color : red">Liste des colisages</b>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-3">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutCOL"
                <?php if(isset($_GET['add16']) and (isset($_GET['IDC'])) ){?> style="display:none" <?php }?>>+
                Ajouter</button>
            <button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerCOL"
                <?php if(!isset($_GET['add16']) and !isset($_GET['IDC'])){?> style="display:none" <?php }?>>-
                Annuler</button>
        </div>
    </div>
    <?php if(isset($_GET['err'])){ ?>
    <?php if($_GET['err']=='1'){ ?>
    <font color="red" style="background-color:#FFFFFF;">
        <center>Attention ! Ce code est déjà existant</center>
    </font><br /><br />
    <?php } }?>
   
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th style="  text-decoration: underline; font-size : 18px ; ">Code</th>
                <th style="  text-decoration: underline; font-size : 18px ; ">Désignation</th>
                <th style="  text-decoration: underline; font-size : 18px ; ">Nombre de pièces</th>
                <th style="  text-decoration: underline; font-size : 18px ; ">Poids vide</th>
                <th style="  text-decoration: underline; font-size : 18px ; ">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_colisage order by nbr_pieces"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["designation"]?></td>
                <td><?php echo $enreg["nbr_pieces"]?></td>
                <td><?php echo $enreg["poids_vide"]?></td>
                <td><a type="button" href="tabs.php?IDC=<?php echo $enreg["id"] ?>&suc=16"
                        class="btn btn-warning waves-effect waves-light">Modifier</a>
                    <a href="Javascript:SupprimerColisage('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>