<?php

if(isset($_GET['IDCC'])){
    $id = $_GET['IDCC'];
}else{
    $id = "0";
}

if(isset($_POST['enregistrer_mail18'])){	

$codsoc	            	=	$_SESSION['delta_SOC'] ;
$code	            	=	addslashes($_POST["code"]) ;
$nom		            =	addslashes($_POST["nom"]) ;
$prenom		            =	addslashes($_POST["prenom"]) ;
$tel		            =	addslashes($_POST["tel"]) ;
$email		            =	addslashes($_POST["email"]) ;
$adresse		        =	addslashes($_POST["adresse"]) ;
$CIN		            =	addslashes($_POST["CIN"]) ;
$permis		            =	addslashes($_POST["permis"]) ;
$RIB		            =	addslashes($_POST["RIB"]) ;

if($id=="0")
    {
		
		//Vérfication d'existance de code
		$req="select * from delta_commerciaux where code='".$code."'";
		$query=mysql_query($req);
		if(mysql_num_rows($query)>0){
			 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=15&err=1" </SCRIPT>';
			 exit;
		}	
				
		
        $req="select max(id) as maxID from delta_commerciaux";
        $query=mysql_query($req);
        if(mysql_num_rows($query)>0){
            while($enreg=mysql_fetch_array($query)){
                $id = $enreg['maxID'] + 1;
            }
        } else{
            $id = 1;
        }

        echo $sql="INSERT INTO `delta_commerciaux`(`id`,`codsoc`,`code`,`nom`,`prenom`,`tel`,`email`,`adresse`,`CIN`,`permis`,RIB) VALUES
        ('".$id."','".$codsoc."','".$code."' , '".$nom."', '".$prenom."', '".$tel."', '".$email."', '".$adresse."', '".$CIN."', '".$permis."', '".$permis."' )";
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
       
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','16','1','".$id."')";
        $req=mysql_query($sql1);			
    }
else{
        $sql="UPDATE `delta_commerciaux` SET `code`='".$code."' , `nom`='".$nom."', `prenom`='".$prenom."', `tel`='".$tel."', `email`='".$email."', `adresse`='".$adresse."', `CIN`='".$CIN."', `permis`='".$permis."', `RIB`='".$RIB."' WHERE id=".$id;
        
        //Log
        $dateheure=date('Y-m-d H:i:s');
        $iduser=$_SESSION['delta_IDUSER'];
        
        $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','16','2','".$id."')";
        $req=mysql_query($sql1);				
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=15" </SCRIPT>';
}

$code		              =	"" ;
$nom	            	=	"" ;
$prenom	            	=	"" ;
$email	            	=	"" ;
$tel	            	=	"" ;
$adresse	            =	"" ;
$CIN	            	=	"" ;
$permis	            	=	"" ;	            	
$RIB	            	=	"" ;	            	

$reqCommerciaux="";
$commerciaux="";
if(isset($_POST['commerciaux'])){
	if(is_numeric($_POST['commerciaux'])){
		$commerciaux		    =	$_POST['commerciaux'];
		$reqCommerciaux		=	" and  id=".$commerciaux;
	}
}

$req="select * from delta_commerciaux where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{

    $code	            =	$enreg["code"] ;
    $nom	            =	$enreg["nom"] ;
    $prenom	            =	$enreg["prenom"] ;
    $email	            =	$enreg["email"] ;
    $tel	            =	$enreg["tel"] ;
    $adresse	        =	$enreg["adresse"] ;
    $CIN	            =	$enreg["CIN"] ;
    $permis	            =	$enreg["permis"] ;
    $RIB	            =	$enreg["RIB"] ;
    
}
?>
<script>
function SupprimerCommerciaux(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerCommerciaux.php?ID=" + id;
    }
}
</script>
<form action="" method="POST">
    <div class="form-group row" id="DivC" <?php if(!isset($_GET['add15']) and !isset($_GET['IDCC']) ){?>
        style="display:none" <?php }?>>
        <div class="col-sm-2">
            <b>Code (*)</b>
            <input class="form-control" type="text" placeholder="Code" value="<?php echo $code; ?>"
                id="example-text-input" name="code" required>
        </div>
        <div class="col-sm-3">
            <b>Nom (*)</b>
            <input class="form-control" type="text" placeholder="Nom" value="<?php echo $nom; ?>"
                id="example-text-input" name="nom" required>
        </div>
        <div class="col-sm-3">
            <b>Prenom (*)</b>
            <input class="form-control" type="text" placeholder="Prenom" value="<?php echo $prenom; ?>"
                id="example-text-input" name="prenom" required>
        </div>
        <div class="col-sm-3">
            <b>Email (*)</b>
            <input class="form-control" type="email" placeholder="email" value="<?php echo $email; ?>"
                id="example-text-input" name="email" required>
        </div>
        <div class="col-sm-3">
            <b>Tel (*)</b>
            <input class="form-control" type="number" placeholder="Téléphone" value="<?php echo $tel; ?>"
                id="example-text-input" name="tel" required>
        </div>
        <div class="col-sm-3">
            <b>Adresse (*)</b>
            <input class="form-control" type="text" placeholder="Adresse" value="<?php echo $adresse; ?>"
                id="example-text-input" name="adresse" required>
        </div>
        <div class="col-sm-3">
            <b>CIN (*)</b>
            <input class="form-control" type="text" placeholder="CIN" value="<?php echo $CIN; ?>"
                id="example-text-input" name="CIN" required>
        </div>
        <div class="col-sm-3">
            <b>Permis (*)</b>
            <input class="form-control" type="text" placeholder="Permis" value="<?php echo $permis; ?>"
                id="example-text-input" name="permis" required>
        </div>
        <div class="col-sm-3">
            <b>RIB (*)</b>
            <input class="form-control" type="text" placeholder="RIB" value="<?php echo $RIB; ?>"
                id="example-text-input" name="RIB" required>
        </div>
        <div class="col-sm-3"><br>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                Enregistrer
            </button>
            <input class="form-control" type="hidden" name="enregistrer_mail18">
        </div>
    </div>

</form>
<div class="col-xl-12">
    <div class="col-xl-12 row">
        <div class="col-xl-6">
            <b class="col-lg-12" style="color : red">Liste des commerciaux</b>
        </div>
        <div class="col-xl-3"></div>
        <div class="col-xl-3">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btnAjoutC"
                <?php if(isset($_GET['add15']) and (isset($_GET['IDCC'])) ){?> style="display:none" <?php }?>>+
                Ajouter</button>
            <button type="button" class="btn btn-danger waves-effect waves-light" id="btnAnnulerC"
                <?php if(!isset($_GET['add15']) and !isset($_GET['IDCC'])){?> style="display:none" <?php }?>>-
                Annuler</button>
        </div>
    </div>
    <?php if(isset($_GET['err'])){ ?>
    <?php if($_GET['err']=='1'){ ?>
    <font color="red" style="background-color:#FFFFFF;">
        <center>Attention ! Ce Code est déjà existante</center>
    </font><br /><br />
    <?php } }?>

    <div class="form-group row">
        <div class="col-xl-2">
            <b>Désignation</b>
            <input name="code_comm" id="code_comm" class="form-control" type="text">
            <p>( % : caractère générique ! )</p>
        </div>
        <div class="col-sm-3">
            <input type="submit" id="submit_comm" class="btn btn-primary btn-sm mt-4" value="Filtrer">
        </div>
    </div>
    <div class="col-xl-12" id="tabComm">
        <table class="table mb-0">
            <thead class="thead-default">
                <tr>
                    <th style="  text-decoration: underline; font-size : 18px ; ">Code</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">Nom & Prénom</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">Téléphone</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">Email</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">Adresse</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">Permis</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">CIN</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">RIB</th>
                    <th style="  text-decoration: underline; font-size : 18px ; ">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $reqFP ="select * from delta_commerciaux order by nom, prenom" ; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
                <tr>
                    <td><?php echo $enreg["code"] ?></td>
                    <td><?php echo $enreg["nom"]?> <?php echo $enreg["prenom"] ?></td>
                    <td><?php echo $enreg["tel"]?> </td>
                    <td><?php echo $enreg["email"]?> </td>
                    <td><?php echo $enreg["adresse"]?> </td>
                    <td><?php echo $enreg["permis"]?> </td>
                    <td><?php echo $enreg["CIN"]?> </td>
                    <td><?php echo $enreg["RIB"]?> </td>
                    <td><a type="button" href="tabs.php?IDCC=<?php echo $enreg["id"] ?>&suc=15"
                            class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                            href="Javascript:SupprimerCommerciaux('<?php echo $enreg["id"]; ?>')"
                            class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-xl-12" id="tabComm1" style="display:none">

    </div>
</div>