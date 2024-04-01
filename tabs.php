<?php include('menu_footer/menu.php') ?>

<style>
    .nav-link.active {
        color: red !important;
        font-weight: bold;
        text-decoration: underline;

    }
</style>
<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Autre Table de Base</h4>
                </div>
            </div>
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- page-title-box -->

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link <?php if ((isset($_GET['suc']))) {
                                            if ($_GET['suc'] == 1) { ?>
                                        active show <?php }
                                        } ?> <?php if ((!isset($_GET['suc']))) { ?> active show <?php } ?>"
                                            style="background: #ffc107" data-toggle="tab" href="#famille"
                                            role="tab">Famille</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 18) { ?> active <?php }
                                    } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#nature"
                                        role="nature">Natures
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 2) { ?> active <?php }
                                    } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#unite" role="tab">Unité
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 3) { ?> active <?php }
                                    } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#messages"
                                        role="tab">Marque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 6) { ?> active <?php }
                                    } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#magasin"
                                        role="tab">Magasin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 4) { ?> active <?php }
                                    } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#emplacement"
                                        role="tab">Emplacement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 16) { ?> active <?php }
                                    } ?>"
                                        style="background: #ffc107  " data-toggle="tab" href="#colisage"
                                        role="tab">Colisage</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 5) { ?> active <?php }
                                    } ?>"
                                        style="background: pink  " data-toggle="tab" href="#devis" role="tab">Devise</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 7) { ?> active <?php }
                                    } ?>"
                                        style="background: pink " data-toggle="tab" href="#mode_paiement"
                                        role="tab">Mode de
                                        paiement</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 8) { ?> active <?php }
                                    } ?>
                                    <?php if (isset($_POST['banque'])) { ?> active <?php } ?> " style="background: pink "
                                        data-toggle="tab" href="#banque" role="tab">Banque</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 9) { ?> active <?php }
                                    } ?>"
                                        style="background: pink " data-toggle="tab" href="#tva" role="tab">TVA</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 17) { ?> active <?php }
                                    } ?>"
                                        style="background: pink " data-toggle="tab" href="#retenue_source"
                                        role="tab">Retenue à la
                                        source</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 11) { ?> active <?php }
                                    } ?>"
                                        style="background: #89c4a9 " data-toggle="tab" href="#zone" role="tab">Zone</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 10) { ?> active <?php }
                                    } ?>"
                                        style="background: #89c4a9 " data-toggle="tab" href="#region"
                                        role="tab">Région</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 12) { ?> active <?php }
                                    } ?>"
                                        style="background: #89c4a9 " data-toggle="tab" href="#pays" role="tab">Pays</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 14) { ?> active <?php }
                                    } ?>"
                                        style="background: #cd5d  " data-toggle="tab" href="#vehicules"
                                        role="tab">Véhicule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if (isset($_GET['suc'])) {
                                        if ($_GET['suc'] == 15) { ?> active <?php }
                                    } ?>"
                                        style="background: #cd5d " data-toggle="tab" href="#commerciaux"
                                        role="tab">Commerciaux</a>
                                </li>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 1) { ?> active <?php }
                                } ?>  <?php if (!(isset($_GET['suc']))) { ?> active <?php } ?> p-3"
                                    id="famille" role="tabpanel">
                                    <?php include("tables_base/famille_produit.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 18) { ?> active <?php }
                                } ?>"
                                    id="nature" role="tabpanel">
                                    <?php include("tables_base/nature_produits.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 2) { ?> active <?php }
                                } ?>"
                                    id="unite" role="tabpanel">
                                    <?php include("tables_base/unite_produit.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 3) { ?> active <?php }
                                } ?>"
                                    id="messages" role="tabpanel">
                                    <?php include("tables_base/marque.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 4) { ?> active <?php }
                                } ?>"
                                    id="emplacement" role="tabpanel">
                                    <?php include("tables_base/emplacement.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 5) { ?> active <?php }
                                } ?>"
                                    id="devis" role="tabpanel">
                                    <?php include("tables_base/devis.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 6) { ?> active <?php }
                                } ?>"
                                    id="magasin" role="tabpanel">
                                    <?php include("tables_base/magasin.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 7) { ?> active <?php }
                                } ?>"
                                    id="mode_paiement" role="tabpanel">
                                    <?php include("tables_base/mode_paiement.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 8) { ?> active <?php }
                                } ?>
                                <?php if (isset($_POST['banque'])) { ?> active <?php } ?> " id="banque" role="tabpanel">
                                    <?php include("tables_base/banque.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 16) { ?> active <?php }
                                } ?>"
                                    id="colisage" role="tabpanel">
                                    <?php include("tables_base/colisage.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 17) { ?> active <?php }
                                } ?>"
                                    id="retenue_source" role="tabpanel">
                                    <?php include("tables_base/retenue_source.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 9) { ?> active <?php }
                                } ?>"
                                    id="tva" role="tabpanel">
                                    <?php include("tables_base/TVA.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 10) { ?> active <?php }
                                } ?>"
                                    id="region" role="tabpanel">
                                    <?php include("tables_base/region.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 11) { ?> active <?php }
                                } ?>"
                                    id="zone" role="tabpanel">
                                    <?php include("tables_base/zone.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 12) { ?> active <?php }
                                } ?>"
                                    id="pays" role="tabpanel">
                                    <?php include("tables_base/pays.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 14) { ?> active <?php }
                                } ?>"
                                    id="vehicules" role="tabpanel">
                                    <?php include("tables_base/vehicules.php"); ?>
                                </div>
                                <div class="tab-pane p-3 <?php if (isset($_GET['suc'])) {
                                    if ($_GET['suc'] == 15) { ?> active <?php }
                                } ?>"
                                    id="commerciaux" role="tabpanel">
                                    <?php include("tables_base/commerciaux.php"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end page content-->
</div>
<!-- page wrapper end -->
<?php include("menu_footer/footer.php") ?>
<script>
    $("#btnAjoutRET").on("click", function () {
        $("#DivRET").show();
        $("#btnAjoutRET").hide();
        $("#btnAnnulerRET").show();
        document.location.href = "?suc=17&add17";
    });
    $("#btnAnnulerRET").on("click", function () {
        $("#DivRET").hide();
        $("#btnAjoutRET").show();
        $("#btnAnnulerRET").hide();
    });
    $("#btnAjoutCOL").on("click", function () {
        $("#DivCOL").show();
        $("#btnAjoutCOL").hide();
        $("#btnAnnulerCOL").show();
        document.location.href = "?suc=16&add16";
    });
    $("#btnAnnulerCOL").on("click", function () {
        $("#DivCOL").hide();
        $("#btnAjoutCOL").show();
        $("#btnAnnulerCOL").hide();
    });

    $("#btnAjoutC").on("click", function () {
        $("#DivC").show();
        $("#btnAjoutCOL").hide();
        $("#btnAnnulerC").show();
        document.location.href = "?suc=15&add15";
    });
    $("#btnAnnulerC").on("click", function () {
        $("#DivC").hide();
        $("#btnAjoutC").show();
        $("#btnAnnulerC").hide();
    });




    $("#btnAjoutV").on("click", function () {
        $("#DivV").show();
        $("#btnAjoutV").hide();
        $("#btnAnnulerV").show();
        document.location.href = "?suc=14&add14";
    });
    $("#btnAnnulerV").on("click", function () {
        $("#DivV").hide();
        $("#btnAjoutV").show();
        $("#btnAnnulerV").hide();
    });



    $("#btnAjoutPAYS").on("click", function () {
        $("#DivPAYS").show();
        $("#btnAjoutPAYS").hide();
        $("#btnAnnulerPAYS").show();
        document.location.href = "?suc=12&add12";
    });
    $("#btnAnnulerPAYS").on("click", function () {
        $("#DivPAYS").hide();
        $("#btnAjoutPAYS").show();
        $("#btnAnnulerPAYS").hide();
    });
    $("#btnAjoutREG").on("click", function () {
        $("#DivREG").show();
        $("#btnAjoutREG").hide();
        $("#btnAnnulerREG").show();
        document.location.href = "?suc=11&add11";
    });
    $("#btnAnnulerREG").on("click", function () {
        $("#DivREG").hide();
        $("#btnAjoutREG").show();
        $("#btnAnnulerREG").hide();
    });
    $("#btnAjoutGV").on("click", function () {
        $("#DivGV").show();
        $("#btnAjoutBNK").hide();
        $("#btnAnnulerGV").show();
        document.location.href = "?suc=10&add10";
    });
    $("#btnAnnulerGV").on("click", function () {
        $("#DivGV").hide();
        $("#btnAjoutGV").show();
        $("#btnAnnulerGV").hide();
    });
    $("#btnAjoutTVA").on("click", function () {
        $("#DivTVA").show();
        $("#btnAjoutBNK").hide();
        $("#btnAnnulerTVA").show();
        document.location.href = "?suc=9&add9";
    });
    $("#btnAnnulerTVA").on("click", function () {
        $("#DivTVA").hide();
        $("#btnAjoutTVA").show();
        $("#btnAnnulerTVA").hide();
    });
    $("#btnAjoutBNK").on("click", function () {
        $("#DivBNK").show();
        $("#btnAjoutBNK").hide();
        $("#btnAnnulerBNK").show();
        document.location.href = "?suc=8&add8";
    });
    $("#btnAnnulerBNK").on("click", function () {
        $("#DivBNK").hide();
        $("#btnAjoutBNK").show();
        $("#btnAnnulerBNK").hide();
    });
    $("#btnAjoutMOD").on("click", function () {
        $("#DivMOD").show();
        $("#btnAjoutCOL").hide();
        $("#btnAnnulerMOD").show();
        document.location.href = "?suc=7&add7";
    });
    $("#btnAnnulerMOD").on("click", function () {
        $("#DivMOD").hide();
        $("#btnAjoutMOD").show();
        $("#btnAnnulerMOD").hide();
    });
    $("#btnAjoutMAG").on("click", function () {
        $("#DivMAG").show();
        $("#btnAjoutMAG").hide();
        $("#btnAnnulerMAG").show();
        document.location.href = "?suc=6&add6";
    });
    $("#btnAnnulerMAG").on("click", function () {
        $("#DivMAG").hide();
        $("#btnAjoutMAG").show();
        $("#btnAnnulerMAG").hide();
    });
    $("#btnAjoutDEV").on("click", function () {
        $("#DivDEV").show();
        $("#btnAjoutMAG").hide();
        $("#btnAnnulerDEV").show();
        document.location.href = "?suc=5&add5";
    });
    $("#btnAnnulerDEV").on("click", function () {
        $("#DivDEV").hide();
        $("#btnAjoutDEV").show();
        $("#btnAnnulerDEV").hide();
    });
    $("#btnAjoutEMP").on("click", function () {
        $("#DivEMP").show();
        $("#btnAjoutEMP").hide();
        $("#btnAnnulerEMP").show();
        document.location.href = "?suc=4&add4";
    });
    $("#btnAnnulerEMP").on("click", function () {
        $("#DivEMP").hide();
        $("#btnAjoutEMP").show();
        $("#btnAnnulerEMP").hide();
    });
    $("#btnAjoutMRQ").on("click", function () {
        $("#DivMRQ").show();
        $("#btnAjoutMRQ").hide();
        $("#btnAnnulerMRQ").show();
        document.location.href = "?suc=3&add3";
    });
    $("#btnAnnulerMRQ").on("click", function () {
        $("#DivMRQ").hide();
        $("#btnAjoutMRQ").show();
        $("#btnAnnulerMRQ").hide();
    });
    $("#btnAjoutUN").on("click", function () {
        $("#DivUnite").show();
        $("#btnAjoutUN").hide();
        $("#btnAnnulerUN").show();
        document.location.href = "?suc=2&add2";
    });
    $("#btnAnnulerUN").on("click", function () {
        $("#DivUnite").hide();
        $("#btnAjoutUN").show();
        $("#btnAnnulerUN").hide();
    });
    $("#btnAjoutFAM").on("click", function () {
        $("#DivFamille").show();
        $("#btnAjoutFAM").hide();
        $("#btnAnnulerFAM").show();
        document.location.href = "?add=1";
    });
    $("#btnAnnulerFAM").on("click", function () {
        $("#DivFamille").hide();
        $("#btnAjoutFAM").show();
        $("#btnAnnulerFAM").hide();
    });
</script>

<script>
    $("#submit_famille").on("click", function () {
        var famille = $("#code_fam").val();

        if (famille != "") {
            $("#tabFamille").hide();
            if (window.XMLHttpRequest) {
                xmlhttp_selectFAM = new XMLHttpRequest();
            } else {
                xmlhttp_selectFAM = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_selectFAM.onreadystatechange = function () {
                if (xmlhttp_selectFAM.status == 200 && xmlhttp_selectFAM.readyState == 4) {
                    $('#tabFamille1').html(xmlhttp_selectFAM.responseText);
                }
            }
            xmlhttp_selectFAM.open("POST", "page_json/json_tableau_famille.php", true);
            xmlhttp_selectFAM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp_selectFAM.send("famille=" + famille);
            $("#tabFamille1").show();
        } else {
            $("#tabFamille1").hide();
            $("#tabFamille").show();
        }
    });

    $("#submit_unite").on("click", function () {
        var unite = $("#code_unite").val();
        if (unite != "") {
            $("#tabUnite").hide();
            if (window.XMLHttpRequest) {
                xmlhttp_selectUN = new XMLHttpRequest();
            } else {
                xmlhttp_selectUN = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_selectUN.onreadystatechange = function () {
                if (xmlhttp_selectUN.status == 200 && xmlhttp_selectUN.readyState == 4) {
                    $('#tabUnite1').html(xmlhttp_selectUN.responseText);
                }
            }
            xmlhttp_selectUN.open("POST", "page_json/json_tableau_unite.php", true);
            xmlhttp_selectUN.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp_selectUN.send("unite=" + unite);
            $("#tabUnite1").show();
        } else {
            $("#tabUnite1").hide();
            $("#tabUnite").show();
        }
    });
    $("#submit_marque").on("click", function () {
        var marque = $("#code_marque").val();
        if (marque != "") {
            $("#tabMarque").hide();
            if (window.XMLHttpRequest) {
                xmlhttp_selectMA = new XMLHttpRequest();
            } else {
                xmlhttp_selectMA = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_selectMA.onreadystatechange = function () {
                if (xmlhttp_selectMA.status == 200 && xmlhttp_selectMA.readyState == 4) {
                    $('#tabMarque1').html(xmlhttp_selectMA.responseText);
                }
            }
            xmlhttp_selectMA.open("POST", "page_json/json_tableau_marque.php", true);
            xmlhttp_selectMA.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp_selectMA.send("marque=" + marque);
            $("#tabMarque1").show();
        } else {
            $("#tabMarque1").hide();
            $("#tabMarque").show();
        }
    });
    $("#submit_emplacement").on("click", function () {
        var emplacement = $("#code_emplacement").val();
        if (emplacement != "") {
            $("#tabEmplacement").hide();
            if (window.XMLHttpRequest) {
                xmlhttp_selectEMP = new XMLHttpRequest();
            } else {
                xmlhttp_selectEMP = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_selectEMP.onreadystatechange = function () {
                if (xmlhttp_selectEMP.status == 200 && xmlhttp_selectEMP.readyState == 4) {
                    $('#tabEmplacement1').html(xmlhttp_selectEMP.responseText);
                }
            }
            xmlhttp_selectEMP.open("POST", "page_json/json_tableau_emplacement.php", true);
            xmlhttp_selectEMP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp_selectEMP.send("emplacement=" + emplacement);
            $("#tabEmplacement1").show();
        } else {
            $("#tabEmplacement1").hide();
            $("#tabEmplacement").show();
        }
    });
    $("#submit_banque").on("click", function () {
        var banque = $("#code_banque").val();
        if (banque != "") {
            $("#tabBanque").hide();
            if (window.XMLHttpRequest) {
                xmlhttp_selectBA = new XMLHttpRequest();
            } else {
                xmlhttp_selectBA = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_selectBA.onreadystatechange = function () {
                if (xmlhttp_selectBA.status == 200 && xmlhttp_selectBA.readyState == 4) {
                    $('#tabBanque1').html(xmlhttp_selectBA.responseText);
                }
            }
            xmlhttp_selectBA.open("POST", "page_json/json_tableau_banque.php", true);
            xmlhttp_selectBA.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp_selectBA.send("banque=" + banque);
            $("#tabBanque1").show();
        } else {
            $("#tabBanque1").hide();
            $("#tabBanque").show();
        }
    });
    $("#submit_comm").on("click", function () {
        var commercial = $("#code_comm").val();
        if (commercial != "") {
            $("#tabComm").hide();
            if (window.XMLHttpRequest) {
                xmlhttp_selectCOM = new XMLHttpRequest();
            } else {
                xmlhttp_selectCOM = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp_selectCOM.onreadystatechange = function () {
                if (xmlhttp_selectCOM.status == 200 && xmlhttp_selectCOM.readyState == 4) {
                    $('#tabComm1').html(xmlhttp_selectCOM.responseText);
                }
            }
            xmlhttp_selectCOM.open("POST", "page_json/json_tableau_comm.php", true);
            xmlhttp_selectCOM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp_selectCOM.send("commercial=" + commercial);
            $("#tabComm1").show();
        } else {
            $("#tabComm1").hide();
            $("#tabComm").show();
        }
    });
</script>