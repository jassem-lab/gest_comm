<?php

if(isset($_GET['IDT'])){
    $id = $_GET['IDT'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail9'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$taux		        =	addslashes($_POST["taux"]) ;

if($id=="0")
    {
		//Vérfication d'existance de code
		$req="select * from delta_TVAs where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=9&err=1" </SCRIPT>';
			 exit;
		}			
		
        $req="select max(id) as maxID from delta_TVAs";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_TVAs`(`id`,`codsoc`,`code`,`taux`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$taux."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','9','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_TVAs` SET `code`='".$code."' , `taux`='".$taux."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','9','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=9" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;

$req="select * from delta_TVAs where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
}
?>
<script>
function SupprimerTVA(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerTVA.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row" id="DivTVA" <?php if(!isset($_GET['add9']) and !isset($_GET['IDT']) ){?>
        style="display:none" <?php }?>>

        <div class="col-sm-4">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Exemple :13" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required>
        </div>
        <div class="col-sm-4">
            <b>Taux (*)</b>
            <input class="form-control" type="text" placeholder="designations" value="<?php echo $designation; ?>"
                id="example-text-input" name="designation" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail9">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <div class="col-xl-12 row">
        <div class="col-xl-6">
            <b class="col-lg-12" style="color : red">Liste des TVA</b>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-3">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutTVA"
                <?php if(isset($_GET['add9']) and (isset($_GET['IDT'])) ){?> style="display:none" <?php }?>>+
                Ajouter</button>
            <button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerTVA"
                <?php if(!isset($_GET['add9']) and !isset($_GET['IDT'])){?> style="display:none" <?php }?>>-
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
                <th style="  text-decoration: underline; font-size : 18px ; ">Taux</th>
                <th style="  text-decoration: underline; font-size : 18px ; ">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_TVAs order by taux"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["code"] ?></td>
                <td><?php echo $enreg["taux"]?></td>
                <td><a type="button" href="tabs.php?IDT=<?php echo $enreg["id"] ?>&suc=9"
                        class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                        href="Javascript:SupprimerTVA('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>