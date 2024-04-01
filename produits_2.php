<?php include('menu_footer/menu.php') ?>
<script>
function SupprimerProduit(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerProduit.php?ID=" + id;
    }
}

// function Imprimer() {
//     if (confirm('Confirmez-vous cette action?')) {
//         var myMODELE_A4 = window.open("print/imprimerProduits.php"
//             "_blank",
//             "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

//     }
// }
</script>
<?php
$reqDate="";
$dat="";
if(isset($_POST['dat'])){
	if(($_POST['dat'])<>""){
		$dat				=	$_POST['dat'];
		$reqDate			=	" and  date<='".$dat."'";
	}
}
$reqDate1="";
$dat1="";
if(isset($_POST['dat1'])){
	if(($_POST['dat1'])<>""){
		$dat1				=	$_POST['dat1'];
		$reqDate1			=	" and  date1>='".$dat1."'";
	}
}
?>
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


    ?>
    <?php
$reqCode="";
$code="";
if(isset($_POST['code'])){
	if(($_POST['code'])<>""){
		$code				=	$_POST['code'];
		$reqCode			=	" and  reference like '%".$code."%'";
	}
}
    ?>
    <?php
$reqMarque="";
$marque="";
if(isset($_POST['marque'])){
	if(is_numeric($_POST['marque'])){
		$marque				=	$_POST['marque'];
		$reqMarque			=	" and  marque=".$marque;
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
                                        <div class="col-sm-3">
                                            <b>Référence </b>
                                            <input class="form-control" name="code" value="<?php $code; ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <b>Famille </b>
                                            <select class="form-control select2" name="famille">
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
                                        <div class="col-sm-3">
                                            <b>Marque </b>
                                            <select class="form-control select2" name="marque">
                                                <option value=""> Sélectionner une marque </option>
                                                <?php
												$req="select * from delta_marques order by code";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($marque==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-xl-3">
                                            <b></b><br>
                                            <input name="SubmitContact" type="submit" id="submit"
                                                class="btn btn-primary btn-sm " value="Filtrer">
                                            <a href="print/imprimerProduits.php" target="_blank"
                                                class="btn btn-sm btn-info waves-effect waves-light">
                                                <i class="ion-printer"></i>
                                            </a>
                                            <a href="export/export_produits.php" target="_blank"
                                                class="btn btn-sm btn-success waves-effect waves-light">
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
                                        <th><b>Famille</b></th>
                                        <th><b>Unité</b></th>
                                        <th><b>Marque</b></th>
                                        <th><b>Emplacement</b></th>
                                        <th><b>Prix d'achat TTC</b></th>
                                        <th><b>Prix de vente TTC</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $reference			=	"";
                                        $famille			=	"";
                                        $unite			    =	"";
                                        $emplacement		=	"";
                                        $req = "select * from delta_produits where 1=1 ".$reqCode.$reqfamille.$reqMarque; 
                                        $query =mysql_query($req); 
                                        while($enreg = mysql_fetch_array($query)){
                                            $id = $enreg["id"] ; 
                                    ?>
                                    <tr>
                                        <td><?php echo $enreg["reference"]; ?></td>

                                        <td><?php 
                                             $reqF ="select * from delta_famille_produit where id=".$enreg["famille"] ;
                                             $queryF = mysql_query($reqF); 
                                             while($enregF = mysql_fetch_array($queryF)){
                                             echo $enregF["code"] ; 
                                           }
                                        ?></td>
                                        <td><?php 
                                             $reqU ="select * from delta_unite_produit where id=".$enreg["unite"] ;
                                             $queryU = mysql_query($reqU); 
                                             while($enregF = mysql_fetch_array($queryU)){
                                             echo $enregF["code"] ; 
                                           }
                                        ?></td>
                                        <td><?php if($enreg["fodec"]==1){
                                            echo 'Soumis au notion Fodec' ; 
                                        }else{
                                            echo "N'est pas soumis au notion Fodec " ; 
                                            };
                                            ?>
                                        </td>
                                        <td><?php 
                                        $reqE = "select * from delta_emplacements where id".$emplacement ; 
                                        $queryE = mysql_query($reqE) ; 
                                        while($enregE = mysql_fetch_array($queryE)){
                                            echo $enregE["code"] ; 
                                        }
                                        ?></td>
                                        <td><?php 
                                        echo $enreg["prix_achat_ttc"] ; 
                                        ?></td>
                                        <td><?php 
                                       echo $enreg["prix_vente_ttc"] ; 
                                        ?></td>
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