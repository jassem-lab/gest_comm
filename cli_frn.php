<?php include('menu_footer/menu.php') ?>


<script>
function SupprimerFournisseur(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/SupprimerFournisseur.php?ID=" + id;
    }
}

function Archiver(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/archiverFournisseur.php?ID=" + id;
    }
}

function Unarchiver(id) {
    if (confirm('Confirmez-vous cette action?')) {
        document.location.href = "page_js/unarchiverFournisseur.php?ID=" + id;
    }
}

function Imprimer(id) {
    if (confirm('Confirmez-vous cette action?')) {
        var myMODELE_A4 = window.open("print/imprimerFournisseur.php?ID=" + id, "_blank",
            "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");
    }
}

function ImprimerListeFournisseurs() {
    if (confirm('Confirmez-vous cette action?')) {
        var myMODELE_A4 = window.open("print/imprimerFournisseurs.php"
            _blank ",
            "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");
    }
}
</script>
<?php
$reqClient="";
$Client="";
if(isset($_POST['client'])){
	if(is_numeric($_POST['client'])){
		$Client		    =	$_POST['client'];
		$reqClient		=	" and  id=".$Client;
	}
}
$reqActivite="";
$activite="";
if(isset($_POST['activite'])){
		$activite		=	$_POST['activite'];
		$reqActivite		=	" and  activite like '%".$activite."%'";
	
}
$reqZone="";
$zone="";
if(isset($_POST['zone'])){
	if(is_numeric($_POST['zone'])){
		$zone		=	$_POST['zone'];
		$reqZone		=	" and  zone=".$zone;
	}
}
$reqRegion="";
$region="";
if(isset($_POST['region'])){
	if(is_numeric($_POST['region'])){
		$region		=	$_POST['region'];
		$reqRegion		=	" and  region=".$region;
	}
}
$reqNature="";
$nature="";
if(isset($_POST['nature'])){
	if(is_numeric($_POST['nature'])){
		$nature		=	$_POST['nature'];
		$reqNature		=	" and  nature=".$nature;
	}
}
?>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Liste des Clients / Fournisseurs</h4>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <!--  Liste des Clients -->
                            <h3>Liste des Clients</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <b>Client</b>
                                            <select class="form-control select2" name="client" id="client">
                                                <option value=""> Sélectionner un client </option>
                                                <?php
                                                $reqc="select * from delta_clients";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($Client==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['raison_social']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Activité</b>
                                            <input name="activite" id="activite" class="form-control" type="text"
                                                placeholder="Activité">
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Nature</b>
                                            <select class="form-control select2" name="nature" id="nature">
                                                <option value=""> Sélectionner une nature </option>
                                                <?php
												 $reqc="select * from delta_natures_client";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($nature==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['nature']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Region</b>
                                            <select class="form-control select2" name="region" id="region">
                                                <option value=""> Sélectionner une region </option>
                                                <?php
												 $reqc="select * from delta_regions";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($region==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-2">
                                            <b>Zone</b>
                                            <select class="form-control select2" name="zone" id="zone">
                                                <option value=""> Sélectionner une zone </option>
                                                <?php
												 $reqc="select * from delta_zones";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($zone==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-2">
                                            <b></b><br>

                                            <a id="btnImprimerC" style="color : white !important"
                                                class="btn btn-sm btn-info waves-effect waves-light">
                                                <span class="glyphicon glyphicon-print"></span>Imprimer
                                            </a>
                                            <a id="btnImprimerContactC" style="color : white !important"
                                                class="btn btn-sm btn-success waves-effect waves-light">
                                                <span class="glyphicon glyphicon-print"></span>Imprimer Contact
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Liste des Clients -->
                            <!--  Liste des Fournisseurs -->
                            <h3>Liste des Fournisseurs</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <b>Fournisseur</b>
                                            <select class="form-control select2" name="client" id="client">
                                                <option value=""> Sélectionner un Fournisseur </option>
                                                <?php
                                                $reqc="select * from delta_fournisseurs";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($Client==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['raison_social']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Activité</b>
                                            <input name="activite" id="activite" class="form-control" type="text"
                                                placeholder="Activité">
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Region</b>
                                            <select class="form-control select2" name="region" id="region">
                                                <option value=""> Sélectionner une region </option>
                                                <?php
												 $reqc="select * from delta_regions";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($region==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Zone</b>
                                            <select class="form-control select2" name="zone" id="zone">
                                                <option value=""> Sélectionner une zone </option>
                                                <?php
												 $reqc="select * from delta_zones";
												$queryc=mysql_query($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($zone==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['designation']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-3">
                                            <b></b><br>

                                            <a id="btnImprimerF" style="color : white !important"
                                                class="btn btn-sm btn-info waves-effect waves-light">
                                                <span class="glyphicon glyphicon-print"></span>Imprimer
                                            </a>
                                            <a id="btnImprimerContactF" style="color : white !important"
                                                class="btn btn-sm btn-success waves-effect waves-light">
                                                <span class="glyphicon glyphicon-print"></span>Imprimer Contact
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Liste des Fournisseurs -->
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container-fluid -->
</div>
<!-- end page content-->


<!-- page wrapper end -->

<?php include("menu_footer/footer.php") ?>


<script>
$("#btnImprimerF").on("click", function() {
    var client = $("#client").val();
    var activite = $("#activite").val();
    var region = $("#region").val();
    var zone = $("#zone").val();
    console.log(activite);

    var myMODELE_A4 = window.open("print/liste_fournisseurs.php?client=" + client + "&activite=" + activite +
        "&region=" +
        region + "&zone=" + zone, "_blank",
        "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

});
$("#btnImprimerContactF").on("click", function() {
    var client = $("#client").val();
    var nature = $("#nature").val();
    var activite = $("#activite").val();
    var region = $("#region").val();
    var zone = $("#zone").val();

    var myMODELE_A4 = window.open("print/imprimer_contact_frn.php?client=" + client + "&activite=" + activite +
        "&region=" +
        region + "&zone=" + zone + "&nature=" + nature, "_blank",
        "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

});
// $("#btnExportF").on("click", function() {
//     var client = $("#client").val();
//     var activite = $("#activite").val();
//     var region = $("#region").val();
//     var zone = $("#zone").val();

//     var myMODELE_A4 = window.open("export/export_fournisseurs.php?client=" + client + "&activite=" + activite +
//         "&region=" +
//         region + "&zone=" + zone, "_blank",
//         "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

// });
$("#btnImprimerC").on("click", function() {
    var client = $("#client").val();
    var nature = $("#nature").val();
    var activite = $("#activite").val();
    var region = $("#region").val();
    var zone = $("#zone").val();

    var myMODELE_A4 = window.open("print/liste_clients.php?client=" + client + "&activite=" + activite +
        "&region=" +
        region + "&zone=" + zone + "&nature=" + nature, "_blank",
        "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

});
$("#btnImprimerContactC").on("click", function() {
    var client = $("#client").val();
    var nature = $("#nature").val();
    var activite = $("#activite").val();
    var region = $("#region").val();
    var zone = $("#zone").val();

    var myMODELE_A4 = window.open("print/imprimer_contact_clients.php?client=" + client + "&activite=" + activite +
        "&region=" +
        region + "&zone=" + zone + "&nature=" + nature, "_blank",
        "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

});
// $("#btnExportC").on("click", function() {
//     var client = $("#client").val();
//     var nature = $("#nature").val();
//     var activite = $("#activite").val();
//     var region = $("#region").val();
//     var zone = $("#zone").val();

//     var myMODELE_A4 = window.open("export/export_clients.php?client=" + client + "&activite=" + activite +
//         "&region=" +
//         region + "&zone=" + zone + "&nature=" + nature, "_blank",
//         "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");

// });
</script>
<script>
$(".btnContact").on("click", function() {
    var id = $(this).attr('id');
    $("#DivContact" + id).show();
    $(".btnContact1").show();
    $(".btnContact").hide();
});
$(".btnContact1").on("click", function() {
    var id = $(this).attr('id');
    $("#DivContact" + id).hide();
    $(".btnContact1").hide();
    $(".btnContact").show();
});
$(".btnBanque").on("click", function() {
    var id = $(this).attr('id');
    $("#DivBanque" + id).show();
    $(".btnBanque1").show();
    $(".btnBanque").hide();
});
$(".btnBanque1").on("click", function() {
    var id = $(this).attr('id');
    $("#DivBanque" + id).hide();
    $(".btnBanque1").hide();
    $(".btnBanque").show();
});

$(".btn").on("click", function() {
    var id = $(this).attr('id');
    if (window.XMLHttpRequest) {
        xmlhttp_liste_contact = new XMLHttpRequest();
    } else {
        xmlhttp_liste_contact = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp_liste_contact.onreadystatechange = function() {

        if (xmlhttp_liste_contact.status == 200 && xmlhttp_liste_contact.readyState == 4) {

            $('#listeCONTACT' + id).html(xmlhttp_liste_contact.responseText);
            $('#email' + id).val('');
            $('#tel' + id).val('');
        }
    }
    xmlhttp_liste_contact.open("POST", "page_json/json_listecontacts_frn.php", true);
    xmlhttp_liste_contact.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp_liste_contact.send("client=" + id);

});
$(".btnmp").on("click", function() {
    var id = $(this).attr('id');
    var nomcontact = $("#nomcontact" + id).val();
    var email = $("#email" + id).val();
    var tel = $("#tel" + id).val();

    var variable = "client=" + id + "&nomcontact=" + nomcontact + "&email=" + email + "&tel=" + tel;
    $.post("page_ajax/ajax_contact_frn.php", variable, function(data, status) {
        if (status == "success") {
            if (window.XMLHttpRequest) {
                xmlhttp_liste_contact = new XMLHttpRequest();
            } else {
                xmlhttp_liste_contact = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_liste_contact.onreadystatechange = function() {

                if (xmlhttp_liste_contact.status == 200 && xmlhttp_liste_contact.readyState == 4) {

                    $('#listeCONTACT' + id).html(xmlhttp_liste_contact.responseText);
                }
            }
            xmlhttp_liste_contact.open("POST", "page_json/json_listecontacts_frn.php", true);
            xmlhttp_liste_contact.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp_liste_contact.send("client=" + id);

            $('#nomcontact' + id).val('');
            $('#email' + id).val('');
            $('#tel' + id).val('');
        }
    }, 'json');
    $('.page-loader-wrapper').removeClass("show");

});

$(".btn-banque").on("click", function() {
    var id = $(this).attr('id');
    if (window.XMLHttpRequest) {
        xmlhttp_liste_banque = new XMLHttpRequest();
    } else {
        xmlhttp_liste_banque = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp_liste_banque.onreadystatechange = function() {

        if (xmlhttp_liste_banque.status == 200 && xmlhttp_liste_banque.readyState == 4) {

            $('#listeBANQUE' + id).html(xmlhttp_liste_banque.responseText);
            $('#banque' + id).val('');
            $('#rib' + id).val('');
            $('#swift' + id).val('');
            $('#iban' + id).val('');
        }
    }
    xmlhttp_liste_banque.open("POST", "page_json/json_listebanques_client.php", true);
    xmlhttp_liste_banque.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp_liste_banque.send("client=" + id);

});
$(".btnmp1").on("click", function() {
    var id = $(this).attr('id');
    var banque = $("#banque" + id).val();
    var swift = $("#swift" + id).val();
    var iban = $("#iban" + id).val();
    var rib = $("#rib" + id).val();

    var variable = "client=" + id + "&banque=" + banque + "&swift=" + swift + "&iban=" + iban + "&rib=" + rib;
    $.post("page_ajax/ajax_banque_client.php", variable, function(data, status) {
        if (status == "success") {
            if (window.XMLHttpRequest) {
                xmlhttp_liste_banque = new XMLHttpRequest();
            } else {
                xmlhttp_liste_banque = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_liste_banque.onreadystatechange = function() {

                if (xmlhttp_liste_banque.status == 200 && xmlhttp_liste_banque
                    .readyState == 4) {

                    $('#listeBANQUE' + id).html(xmlhttp_liste_banque.responseText);
                }
            }
            xmlhttp_liste_banque.open("POST", "page_json/json_listebanques_client.php",
                true);
            xmlhttp_liste_banque.setRequestHeader("Content-type",
                "application/x-www-form-urlencoded");
            xmlhttp_liste_banque.send("client=" + id);

            $('#banque' + id).val('');
            $('#swift' + id).val('');
            $('#iban' + id).val('');
            $('#rib' + id).val('');
        }
    }, 'json');
    $('.page-loader-wrapper').removeClass("show");


});
</script>