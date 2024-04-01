<?php

if(isset($_GET['IDMM'])){
    $id = $_GET['IDMM'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail6'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;

if($id=="0")
    {
		//Vérfication d'existance de code
		$req="select * from delta_magasins where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=6&err=1" </SCRIPT>';
			 exit;
		}
		
        $req="select max(id) as maxID from delta_magasins";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_magasins`(`id`,`codsoc`,`code`,`designation`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','14','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_magasins` SET  `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','14','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=6" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;

$req="select * from delta_magasins where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
}
?>
<script>
function SupprimerMagasin(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerMagasin.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row" id="DivMAG" <?php if(!isset($_GET['add6']) and !isset($_GET['IDMM']) ){?>
        style="display:none" <?php }?>>
        <div class="col-sm-4">
            <b>Code (*)</b>
            <?php if($id==2){ ?>
            <input class="form-control" type="text" placeholder="Famille de produit" value="<?php echo $code; ?>"
                id="example-text-input" name="code" readonly>
            <?php }else{ ?>
            <input class="form-control" type="text" placeholder="Famille de produit" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required> <?php } ?>
        </div>
        <div class="col-sm-4">
            <b>Désignation (*)</b>
            <input class="form-control" type="text" placeholder="designations" value="<?php echo $designation; ?>"
                id="example-text-input" name="designation" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail6">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <div class="col-xl-12 row">
        <div class="col-xl-6">
            <b class="col-lg-12" style="color : red">Liste des magasins</b>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-3">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutMAG"
                <?php if(isset($_GET['add6']) and (isset($_GET['IDMM'])) ){?> style="display:none" <?php }?>>+
                Ajouter</button>
            <button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerMAG"
                <?php if(!isset($_GET['add6']) and !isset($_GET['IDMM'])){?> style="display:none" <?php }?>>-
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
                <th style="  text-decoration: underline; font-size : 18px ; ">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_magasins order by designation"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?>
                </td>
                <td><?php echo $enreg["designation"]?></td>
                <td>
                    <a type="button" href="tabs.php?IDMM=<?php echo $enreg["id"] ?>&suc=6"
                        class="btn btn-warning waves-effect waves-light">Modifier</a>
                    <?php if($enreg["defaut"]==1){ ?>
                    <b style="color:green ; margin-left : 10px ; ">Magasin par défaut</b>
                    <?php } ?>
                    <?php if($enreg["defaut"]==0){ ?>

                    <a href="Javascript:SupprimerMagasin('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>