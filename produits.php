<?php include('menu_footer/menu.php') ?>
<script>
function SupprimerProduit(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerProduit.php?ID=" + id;
    }
}
</script>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des Produits</h4>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->
    <?php
$reqfamille="";
$famille="";
if(isset($_POST['famille'])){
	if(is_numeric($_POST['famille'])){
		$famille				=	$_POST['famille'];
		$reqfamille				=	" and  famille=".$famille;
	}
}
$reqCode="";
$code="";
if(isset($_POST['code'])){
	if(($_POST['code'])<>""){
		$code				=	$_POST['code'];
		$reqCode			=	" and  designation like '%".$code."%'";
	}
}

$reqUnite="";
$unite="";
if(isset($_POST['unite'])){
	if(is_numeric($_POST['unite'])){
		$unite				=	$_POST['unite'];
		$reqUnite			=	" and  unite=".$unite;
	}
}
$reqNature="";
$nature="";
if(isset($_POST['nature'])){
	if(is_numeric($_POST['nature'])){
		$nature				=	$_POST['nature'];
		$reqNature			=	" and  nature=".$nature;
	}
}
    ?>
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <a href="addedit_produit.php" class="btn btn-primary waves-effect waves-light">Ajouter un
                                Produit</a>
                            <h3>Liste des Produits</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <b>Nature </b>
                                            <select class="form-control select2" name="nature" id="nature">
                                                <option value=""> Sélectionner la nature </option>
                                                <?php
												$req="select * from delta_natures order by nature";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($nature==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['nature']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Désignation </b>
                                            <input class="form-control" name="code" id="code" value="<?php $code; ?>"
                                                style="height:57%">
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Famille </b>
                                            <select class="form-control select2" name="famille" id="famille">
                                                <option value=""> Sélectionner une famille </option>
                                                <?php
												$req="select * from delta_famille_produit order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($famille==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Unité </b>
                                            <select class="form-control select2" name="marque" id="marque">
                                                <option value=""> Sélectionner une unite </option>
                                                <?php
												$req="select * from delta_unite_produit order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($unite==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-xl-3">
                                            <b></b><br>
                                            <input name="SubmitContact" type="submit" id="submit"
                                                class="btn btn-primary btn-sm " value="Filtrer">
                                            <a id="btnImprimer" class="btn btn-sm btn-info waves-effect waves-light">
                                                <span class="glyphicon glyphicon-print"></span>Imprimer
                                            </a>
                                            <a id="btnExport" class="btn btn-sm btn-success waves-effect waves-light">
                                                Exporter Excel
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <br>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th><b>Référence</b></th>
                                        <th><b>Désignation</b></th>
                                        <th><b>Famille</b></th>
                                        <th><b>Unité</b></th>
                                        <th><b>Colisage</b></th>
                                        <th><b>Marque</b></th>
                                        <th><b>Emplacement</b></th>
                                        <th><b style="color:orange">Soumis<br>FODEC</b></th>
                                        <th><b style="color:green">TVA</b></th>
                                        <th><b style="color:brown">Px d'achat HT</b></th>
                                        <th><b style="color:blue">Px d'achat TTC</b></th>
                                        <th><b style="color:brown">Px de vente HT</b></th>
                                        <th><b style="color:blue">Px de vente TTC</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$reference			=	"";
$famille			=	"";
$unite			    =	"";
$emplacement		=	"";
$req = "select * from delta_produits where 1=1 ".$reqCode.$reqfamille.$reqUnite.$reqNature; 
$query =mysql_query($req); 
while($enreg = mysql_fetch_array($query)){
	 $id = $enreg["id"] ; 
	 $famille="";
	 $reqF ="select * from delta_famille_produit where id=".$enreg["famille"] ;
	 $queryF = mysql_query($reqF); 
	 while($enregF = mysql_fetch_array($queryF)){
		 $famille =$enregF['code'].'<br>'.$enregF['designation'];
	 }

	 $unite="";
	 $reqF ="select * from delta_unite_produit where id=".$enreg["famille"] ;
	 $queryF = mysql_query($reqF); 
	 while($enregF = mysql_fetch_array($queryF)){
		 $unite =$enregF['code'];
	 }
	 
	 $colisage="";
	 $reqF ="select * from delta_colisage where id=".$enreg["famille"] ;
	 $queryF = mysql_query($reqF); 
	 while($enregF = mysql_fetch_array($queryF)){
		 $colisage =$enregF['code'].'<br>'.$enregF['designation'];
	 }		 

	 $marque="";
	 $reqF ="select * from 	delta_marques where id=".$enreg["famille"] ;
	 $queryF = mysql_query($reqF); 
	 while($enregF = mysql_fetch_array($queryF)){
		 $marque =$enregF['code'].'<br>'.$enregF['designation'];
	 }		 
	 
	 $emplacement="";
	 $reqF ="select * from delta_emplacements where id=".$enreg["famille"] ;
	 $queryF = mysql_query($reqF); 
	 while($enregF = mysql_fetch_array($queryF)){
		 $emplacement =$enregF['code'].'<br>'.$enregF['designation'];
	 }	

	 $magasin="";
	 $reqF ="select * from delta_magasins where id=".$enreg["magasin"] ;
	 $queryF = mysql_query($reqF); 
	 while($enregF = mysql_fetch_array($queryF)){
		 $magasin =$enregF['code'].'<br>'.$enregF['designation'];
	 }											
                                    ?>
                                    <tr <?php if($enreg['nature']==1){ ?> style="color:blue" <?php } ?>>
                                        <td scope="row" style="padding: 2px 2px;"><?php echo $enreg["reference"];?></td>
                                        <td scope="row" style="padding: 2px 2px;"><?php echo $enreg["designation"];?>
                                        </td>
                                        <td scope="row" style="padding: 2px 2px;"><?php echo $famille;?></td>
                                        <td scope="row" style="padding: 2px 2px;text-align:center;"><?php echo $unite;?>
                                        </td>
                                        <td scope="row" style="padding: 2px 2px;"><?php echo $colisage;?></td>
                                        <td scope="row" style="padding: 2px 2px;"><?php echo $marque;?></td>
                                        <td scope="row" style="padding: 2px 2px;"><?php echo $emplacement;?></td>
                                        <td scope="row" style="padding: 2px 2px;text-align:center; color:orange">
                                            <?php if($enreg["fodec"]==1){ ?>
                                            Oui
                                            <?php } else{ ?>
                                            Non
                                            <?php } ?>
                                        </td>
                                        <td scope="row" style="padding: 2px 2px;text-align:center; color:green">
                                            <?php echo $enreg["tva"] ; ?></td>
                                        <td scope="row" style="padding: 2px 2px;text-align:center; color:brown">
                                            <?php echo $enreg["prix_achat_ht"] ; ?></td>
                                        <td scope="row" style="padding: 2px 2px;text-align:center; color:blue">
                                            <?php echo $enreg["prix_achat_ttc"] ; ?></td>
                                        <td scope="row" style="padding: 2px 2px;text-align:center; color:brown">
                                            <?php echo $enreg["prix_vente_ht"] ; ?></td>
                                        <td scope="row" style="padding: 2px 2px;text-align:center; color:blue">
                                            <?php echo $enreg["prix_vente_ttc"] ; ?></td>
                                        <td>
                                            <a href="addedit_produit.php?ID=<?php echo $id; ?>"
                                                class="btn btn-warning waves-effect waves-light">
                                                <span class="glyphicon glyphicon-pencil"></span>Modifer
                                            </a>
                                            <a href="Javascript:SupprimerProduit('<?php echo $id; ?>')"
                                                class="btn btn-danger waves-effect waves-light"
                                                style="background-color:brown">
                                                <span class="glyphicon glyphicon-trash"></span>Supprimer
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page content-->
</div>
<!-- page wrapper end -->


<?php include("menu_footer/footer.php") ?>
<script>
$("#btnImprimer").on("click", function() {
    var code = $("#code").val();
    var fam = $("#famille").val();
    var uni = $("#unite").val();
    var nat = $("#nature").val();

    var myMODELE_A4 = window.open("print/liste_produits.php?code=" + code + "&famille=" + fam + "&unite=" +
        uni + "&nature=" + nat, "_blank",
        "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

});
$("#btnExport").on("click", function() {
    var code = $("#code").val();
    var fam = $("#famille").val();
    var uni = $("#unite").val();
    var nat = $("#nature").val();

    var myMODELE_A4 = window.open("export/export_produits.php?code=" + code + "&famille=" + fam + "&unite=" +
        uni + "&nature=" + nat, "_blank",
        "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

});
</script>