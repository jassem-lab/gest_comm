<?php include('menu_footer/menu.php') ?>

<script>
function Imprimer() {
    if (confirm('Confirmez-vous cette action?')) {
        var myMODELE_A4 = window.open("print/imprimer_stock_F.php",
            "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");
    }
}
</script>

<div class="wrapper">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Valorisation de Stock</h4>
                </div>
            </div>
        </div>
    </div>
    <?php

$reference = "" ; 
    
$reqDesignation="";
$designation="";

if(isset($_POST['designation'])){
	if(($_POST['designation'])){
		$designation			=	$_POST['designation'];
		$reqDesignation	    	=	" and  designation=".$designation;
	}
}

$reqFamille="";
$famille="";

if(isset($_POST['famille'])){
	if(($_POST['famille'])){
		$famille			=	$_POST['famille'];
		$reqFamille	    	=	" and  famille=".$famille;
	}
}

$reqUnite="";
$unite="";

if(isset($_POST['unite'])){
	if(($_POST['unite'])){
		$unite			=	$_POST['unite'];
		$reqUnite	    	=	" and  unite=".$unite;
	}
}

?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h3>Valorisation de Stock des Produits</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-2">
                                            <b>Liste des Produits</b>
                                            <select class="form-control select2" name="designation" id="designation">
                                                <option value=""> Sélectionner un produit </option>
                                                <?php
												$req="select * from delta_produits order by reference";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($designation==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-2">
                                            <b>Liste des Familles produit</b>
                                            <select class="form-control select2" name="famille" id="famille">
                                                <option value=""> Sélectionner une famille </option>
                                                <?php
												$req="select * from delta_famille_produit";
												$query=mysql_query($req);
												while($enreg=mysql_fetch_array($query)){
												?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($famille==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-2">
                                            <b>Liste des Unités produit</b>
                                            <select class="form-control select2" name="unite" id="unite">
                                                <option value=""> Sélectionner une unité </option>
                                                <?php
												$req="select * from delta_unite_produit";
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
                                            <a id="btnImprimer" style="color : white"
                                                class="btn btn-sm btn-success waves-effect waves-light">
                                                <i class="ion-printer"></i></span>
                                            </a>
                                        </div>
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

<?php include('menu_footer/footer.php') ?>


<script>
$("#btnImprimer").on("click", function() {
    var designation = $("#designation").val();
    var famille = $("#famille").val();
    var unite = $("#unite").val();

    var myMODELE_A4 = window.open("print/print_val_stock.php?designation=" + designation + "&famille=" +
        famille +
        "&unite=" +
        unite, "_blank",
        "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

});
</script>