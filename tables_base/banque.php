<?php

if(isset($_GET['IDB'])){
    $id = $_GET['IDB'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail8'])){	

$codsoc	        	=	$_SESSION['delta_SOC'] ;
$code	        	=	addslashes($_POST["code"]) ;
$designation		=	addslashes($_POST["designation"]) ;

if($id=="0")
    {
		//Vérfication d'existance de code
		$req="select * from delta_banques where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=8&err=1" </SCRIPT>';
			 exit;
		}			
        $req="select max(id) as maxID from delta_banques";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_banques`(`id`,`codsoc`,`code`,`designation`) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$designation."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','7','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_banques` SET `code`='".$code."' , `designation`='".$designation."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','7','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=8" </SCRIPT>';
}

$code		        =	"" ;
$designation		=	"" ;

$reqBanque="";
$banque="";
if(isset($_POST['banque'])){
	if(is_numeric($_POST['banque'])){
		$banque		    =	$_POST['banque'];
		$reqBanque		=	" and  id=".$banque;
	}
}

$req="select * from delta_banques where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	        =	$enreg["code"] ;
    $designation	=	$enreg["designation"] ;
}
?>
<script>
function SupprimerBanque(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/supprimerBanque.php?ID=" + id;
    }
}
</script>

<form action="" method="POST">

    <div class="form-group row" id="DivBNK" <?php if(!isset($_GET['add8']) and !isset($_GET['IDB']) ){?>
        style="display:none" <?php }?>>

        <div class="col-sm-4">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Famille de produit" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required>
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
            <input class="form-control" type="hidden" name="enregistrer_mail8">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <div class="col-xl-6 row">
        <div class="col-xl-6">
            <b class="col-lg-12" style="color : red">Liste des banques</b>
        </div>
        <div class="col-xl-3"></div>

        <div class="col-xl-3">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutBNK"
                <?php if(isset($_GET['add8']) and (isset($_GET['IDB'])) ){?> style="display:none" <?php }?>>+
                Ajouter</button>
            <button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerBNK"
                <?php if(!isset($_GET['add8']) and !isset($_GET['IDB'])){?> style="display:none" <?php }?>>-
                Annuler</button>
        </div>
    </div>
    <?php if(isset($_GET['err'])){ ?>
    <?php if($_GET['err']=='1'){ ?>
    <font color="red" style="background-color:#FFFFFF;">
        <center>Attention ! Ce code est déjà existant</center>
    </font><br /><br />
    <?php } }?>
    
    <div class="form-group row">
        <div class="col-xl-2">
            <b>Désignation</b>
            <input name="code_banque" id="code_banque" class="form-control" type="text">
            <p>( % : caractère générique ! )</p>
        </div>
        <div class="col-sm-3">
            <input type="submit" id="submit_banque" class="btn btn-primary btn-sm mt-4" value="Filtrer">
        </div>
    </div>
    <div class="col-xl-12" id="tabBanque">
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
            $reqFP ="select * from delta_banques where 1=1 order by designation ";
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
                <tr>
                    <td><?php echo $enreg["code"] ?></td>
                    <td><?php echo $enreg["designation"]?></td>
                    <td><a type="button" href="tabs.php?IDB=<?php echo $enreg["id"] ?>&suc=8"
                            class="btn btn-warning waves-effect waves-light">Modifier</a>
                        <a href="Javascript:SupprimerBanque('<?php echo $enreg["id"]; ?>')"
                            class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-xl-12" id="tabBanque1" style="display:none">

    </div>
</div>