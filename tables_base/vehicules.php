<?php

if(isset($_GET['IDV'])){
    $id = $_GET['IDV'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail14'])){	

$codsoc	            	=	$_SESSION['delta_SOC'] ;
$matricule	        	=	addslashes($_POST["matricule"]) ;
$model		            =	addslashes($_POST["model"]) ;
$marque		            =	addslashes($_POST["marque"]) ;
$tare		            =	addslashes($_POST["tare"]) ;
$charge		            =	addslashes($_POST["charge"]) ;

if($id=="0")
    {
		//Vérfication d'existance de code
		$req="select * from delta_vehicules where matricule='".$matricule."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=14&err=1" </SCRIPT>';
			 exit;
		}	
		
        $req="select max(id) as maxID from delta_vehicules";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        $sql="INSERT INTO `delta_vehicules`(`id`,`codsoc`,`matricule`,`model`,`marque`,`tare`,`charge`) VALUES
        ('".$id."','".$codsoc."','".$matricule."' , '".$model."', '".$marque."', '".$tare."', '".$charge."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','17','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_vehicules` SET  `model`='".$model."', `marque`='".$marque."', `tare`='".$tare."', `charge`='".$charge."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','17','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=14" </SCRIPT>';
}

$matricule		        =	"" ;
$model	            	=	"" ;
$marque	            	=	"" ;
$tare	            	=	"" ;
$charge	            	=	"" ;
$req="select * from delta_vehicules where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $matricule	        =	$enreg["matricule"] ;
    $model	            =	$enreg["model"] ;
	$marque	            =	$enreg["marque"] ;
	$tare	            =	$enreg["tare"] ;
	$charge	            =	$enreg["charge"] ;
}
?>
<script>
function SupprimerVehicule(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerVehicule.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
   <div class="form-group row" id="DivV" <?php if(!isset($_GET['add14']) and !isset($_GET['IDV']) ){?> style="display:none" <?php }?>>
        <div class="col-sm-3">
            <b>Matricule (*)</b>
            <input class="form-control" type="text" placeholder="Matricule" value="<?php echo $matricule; ?>"
                id="example-text-input" name="matricule" required>
        </div>
        <div class="col-sm-3">
            <b>Marque (*)</b>
            <input class="form-control" type="text" placeholder="Marque" value="<?php echo $marque; ?>"
                id="example-text-input" name="marque" required>
        </div>		
        <div class="col-sm-3">
            <b>Model</b>
            <input class="form-control" type="text" placeholder="Model" value="<?php echo $model; ?>"
                id="example-text-input" name="model">
        </div>
        <div class="col-sm-2">
            <b>Tare</b>
            <input class="form-control" type="text" placeholder="Tare" value="<?php echo $tare; ?>"
                id="example-text-input" name="tare">
        </div>	
        <div class="col-sm-2">
            <b>Charge utile</b>
            <input class="form-control" type="text" placeholder="Charge utile" value="<?php echo $charge; ?>"
                id="example-text-input" name="charge">
        </div>		
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail14">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <div class="col-xl-12 row">
		<div class="col-xl-6">
			 <b class="col-lg-12" style="color : red">Liste des Véhicules</b>
		</div>
		<div class="col-xl-3"></div>
		<div class="col-xl-3">
			<button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutV"  <?php if(isset($_GET['add14']) and (isset($_GET['IDV'])) ){?> style="display:none" <?php }?>>+ Ajouter</button>
			<button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerV"  <?php if(!isset($_GET['add14']) and !isset($_GET['IDV'])){?> style="display:none" <?php }?>>- Annuler</button>
		</div>			
	</div>
	<?php if(isset($_GET['err'])){ ?>
		<?php if($_GET['err']=='1'){ ?>
		 <font color="red" style="background-color:#FFFFFF;"><center>Attention ! Cette matricule est déjà existante</center></font><br /><br />
	<?php } }?>	
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th style="  text-decoration: underline; font-size : 18px ; ">Matricule</th>
				<th style="  text-decoration: underline; font-size : 18px ; ">Marque</th>
                <th style="  text-decoration: underline; font-size : 18px ; ">Model</th>
				<th style="  text-decoration: underline; font-size : 18px ; ">Tare</th>
				<th style="  text-decoration: underline; font-size : 18px ; ">Charge utile</th>
                <th style="  text-decoration: underline; font-size : 18px ; ">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_vehicules order by marque"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["matricule"] ?></td>
                <td><?php echo $enreg["marque"]?></td>
				<td><?php echo $enreg["model"]?></td>
				<td><?php echo $enreg["tare"]?></td>
				<td><?php echo $enreg["charge"]?></td>
                <td><a type="button" href="tabs.php?IDV=<?php echo $enreg["id"] ?>&suc=14"
                        class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                        href="Javascript:SupprimerVehicule('<?php echo $enreg["id"]; ?>')"
                        class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>