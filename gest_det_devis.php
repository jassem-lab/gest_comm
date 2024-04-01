<?php include('menu_footer/menu.php') ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
if(isset($_GET['IDP'])){
    $idp = $_GET['IDP'];
   
}else{
    $idp = "0";
}

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
   
}else{
    $id = "0";
}
if(isset($_GET['Succ'])){
    $Succ = $_GET['Succ'];
}


$client                  = "" ; 
$produit                 = "" ;
$tva                     = "" ;
$numero                  = "" ;
$date                    = "" ; 
$validite                = "" ; 
$quantite                = "" ; 
$date_expiration         = "" ; 
$prix_vente_ht           = "" ;
$prix_vente_ttc          = "" ;
$prix_total              = "" ;
$taux_remise             = "" ;
$prix_remise             = "" ;
$exercice                = "" ; 


$reqEx   = "select * from delta_parametres" ; 
$queryEx = mysql_query($reqEx) ; 
while($enregEx = mysql_fetch_array($queryEx)){
    $exercice     =   $enregEx["exercice"] ;
  
}


 $reqE = "select * from delta_devis where exercice=".$exercice ;
    $queryE = mysql_query($reqE);
    if(mysql_num_rows($queryE)>0){
        while($enregE = mysql_fetch_array($queryE)){
        $numero = $enregE['numero'] + 1 ; 
        }
    } else{
        $numero = $exercice.'000' + 1 ; 
    }


if(isset($_POST['enregistrer_mail'])){	

    $codsoc	              =	$_SESSION['delta_SOC'] ;
    $client	        	  =	addslashes($_POST["client"]) ;
    $produit		      =	addslashes($_POST["produit"]) ;
    $tva		          =	addslashes($_POST["tva"]) ;
    $numero		          =	addslashes($_POST["numero"]) ;
    $date		          =	addslashes($_POST["date"]) ;
    $validite		      =	addslashes($_POST["validite"]) ;
    $quantite		      =	addslashes($_POST["quantite"]) ;
    $prix_vente_ht		  =	addslashes($_POST["prix_vente_ht"]) ;
    $prix_vente_ttc		  =	addslashes($_POST["prix_vente_ttc"]) ;
    $prix_total		      =	addslashes($_POST["prix_total"]) ;
    $taux_remise		  =	addslashes($_POST["taux_remise"]) ;
    $prix_remise		  =	addslashes($_POST["prix_remise"]) ;
    
    if($id=="0")
        {
            $req="select max(id) as maxID from delta_devis";
            $query=mysql_query($req);
            if(mysql_num_rows($query)>0){
                while($enreg=mysql_fetch_array($query)){
                    $id = $enreg['maxID'] + 1;
                }
            } else{
                $id = 1;
            }


            $sql="INSERT INTO `delta_devis`(`id`,`codsoc`,`numero`,`date`,`client`,`validite`,`exercice`) VALUES
            ('".$id."','".$codsoc."','".$numero."' , '".$date."',  '".$client."' , '".$validite."', '".$exercice."')";
            $sql2="INSERT INTO `delta_det_devis`(`idd`,`produit` , `tva`, `prix_vente_ht`, `prix_vente_ttc` , `taux_remise` , `prix_remise` , `quantite` , `prix_total`)VALUES('".$id."','".$produit."','".$tva."','".$prix_vente_ht."','".$prix_vente_ttc."','".$taux_remise."','".$prix_remise."','".$quantite."','".$prix_total."')" ; 
            	
            //Log
            $dateheure=date('Y-m-d H:i:s');
            $iduser=$_SESSION['delta_IDUSER'];
           
            $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','21','1','".$id."')";
            $req=mysql_query($sql1);			
        }
    else{
            $sql="UPDATE `delta_devis` SET `date`='".$date."' , `validite`='".$validite."' WHERE idd=".$id;
            $sql2="INSERT INTO `delta_det_devis`(`idd`,`produit` , `tva`, `prix_vente_ht`, `prix_vente_ttc` , `taux_remise` , `prix_remise` , `quantite` , `prix_total`)VALUES('".$id."','".$produit."','".$tva."','".$prix_vente_ht."','".$prix_vente_ttc."','".$taux_remise."','".$prix_remise."','".$quantite."','".$prix_total."')" ; 
            	
            //Log
            $dateheure=date('Y-m-d H:i:s');
            $iduser=$_SESSION['delta_IDUSER'];
            
            $sql1="INSERT INTO `delta_log`(`dateheure`, `idutilisateur`, `document`, `action`, `iddocument`) VALUES ('".$dateheure."','".$iduser."','21','2','".$id."')";
            $req=mysql_query($sql1);				
        }
        $req=mysql_query($sql);
        $req=mysql_query($sql2);
    
        // echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';
    }


    $reqe = "select * from delta_devis where id=".$id ; 
    $querye = mysql_query($reqe);
    while($enrege = mysql_fetch_array($querye)){
        $numero      = $enrege["numero"] ;
        $client      = $enrege["client"] ; 
        $date        = $enrege["date"].strtotime('m-d-Y') ; 
        $validite    = $enrege["validite"] ;  
    }
     $req = "select * from delta_det_devis where id=".$idp ; 
    $que0ry = mysql_query($req) ; 
    while($enreg = mysql_fetch_array($query)){
        $produit            = $enreg["produit"] ; 
        $tva                = $enreg["tva"] ; 
        $prix_vente_ht      = $enreg["prix_vente_ht"] ; 
        $prix_vente_ttc     = $enreg["prix_vente_ttc"] ; 
        $quantite           = $enreg["quantite"] ; 
        $prix_total         = $enreg["prix_total"] ; 
        $taux_remise        = $enreg["taux_remise"] ; 
        $prix_remise        = $enreg["prix_remise"] ; 
    }


?>

<!-- page wrapper start -->
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des Devis</h4>
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
                            <?php if(isset($_GET['suc'])){ ?>
                            <?php if($_GET['suc']=='1'){ ?>
                            <font color="green" style="background-color:#FFFFFF;">
                                <center>Enregistrement effectué avec succès</center>
                            </font><br /><br />
                            <?php } }?>
                            <?php if(isset($_GET['err'])){ ?>
                            <?php if($_GET['err']=='1'){ ?>
                            <font color="red" style="background-color:#FFFFFF;">
                                <center>Enregistrement n'est pas effectué car le Code a barre existe déja dans la
                                    matiere premiere : <?php echo $_GET["Emp"] ; ?></center>
                            </font><br /><br />
                            <?php } }?>
                            <a href="gest_devis.php" class="btn btn-primary waves-effect waves-light">Retour</a>
                            <form action="" method="post" class="mt-5">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-xl-2">
                                        <b style="color : red ; ">Numéro (*)</b>
                                        <input class="form-control" type="text" parsley-type="reference" placeholder=""
                                            value="<?php echo $numero ?>" id="numero" name="numero" readonly>
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b style="color : red ; ">Client (*)</b>
                                        <select class="form-control select2" name="client" id="client">
                                            <option value=""> Sélectionner un Client </option>
                                            <?php
                                                        $req="select * from delta_clients";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($client==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['raison_social']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-xl-2" style="display: none;">
                                        <b>Nature Client </b>
                                        <input class="form-control" type="text" parsley-type="validite" placeholder=""
                                            value=" " id="nature_client" name="nature_client" readonly>


                                    </div>
                                    <div class="col-sm-3 col-xl-2" style="display: none;">
                                        <b>Nature</b>
                                        <input class="form-control" type="text" parsley-type="validite" placeholder=""
                                            value="" id="nature" name="nature">
                                    </div>
                                    <div class="col-sm-3 col-xl-2" style="display: none;">
                                        <b>Fodec</b>
                                        <input class="form-control" type="number" parsley-type="fodec" placeholder=""
                                            value="" id="fodec" name="fodec">
                                    </div>
                                    <div class="col-sm-3 col-xl-2" style="display: none;">
                                        <b>Taux Fodec</b>
                                        <input class="form-control" type="text" parsley-type="fodec" placeholder=""
                                            value="" id="tauxFodec" name="tauxFodec">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>Date </b>
                                        <input class="form-control" type="date" parsley-type="date" placeholder="Date"
                                            value="<?php echo $date.strtotime('m,d,y') ?>" id="example-text-input"
                                            name="date">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>Validité </b>
                                        <input class="form-control" type="text" parsley-type="validite"
                                            placeholder="validite" value="<?php echo $validite ?>"
                                            id="example-text-input" name="validite">
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <div class="col-sm-3 col-xl-2">
                                        <b style="color : red ; ">Produit (*)</b>
                                        <select class="form-control select2" name="produit" id="produit">
                                            <option value="<?php echo $produit ?>"> Sélectionner un Produit </option>
                                            <?php
                                                        $req="select * from delta_produits";
                                                        $query=mysql_query($req);
                                                        while($enreg=mysql_fetch_array($query)){
                                                        ?>
                                            <option value="<?php echo $enreg['id']; ?>"
                                                <?php if($produit==$enreg['id']) {?> selected <?php } ?>>
                                                <?php echo $enreg['reference']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-3 col-xl-2">
                                        <b>TVA</b>
                                        <input class="form-control" type="number" parsley-type="tva" placeholder=""
                                            value="<?php echo $tva ?>" id="tva" name="tva" readonly>
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>Prix de vente HT</b>
                                        <input class="form-control" type="number" parsley-type="prix_vente_ht"
                                            placeholder="" value="<?php echo $prix_vente_ht ?>" id="prix_vente_ht"
                                            step="0.01" name="prix_vente_ht" readonly>
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b>Prix de vente TTC</b>
                                        <input class="form-control" type="number" parsley-type="prix_vente_ttc"
                                            placeholder="" value="<?php echo $prix_vente_ttc ?>" id="prix_vente_ttc"
                                            step="0.01" name="prix_vente_ttc" readonly>
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b style="color : red ; ">Quantité (*)</b>
                                        <input class="form-control" type="number" parsley-type="quantite"
                                            placeholder="Quantité" value="<?php echo $quantite ?>" id="quantite"
                                            name="quantite">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b style="color : red ; ">Prix Total</b>
                                        <input class="form-control" type="number" parsley-type="prix_total"
                                            placeholder="" value="<?php echo $prix_total ?>" id="prix_total"
                                            name="prix_total" step="0.01" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mt-5">
                                    <div class="col-sm-3 col-xl-2">
                                        <b style="color : green ; ">Taux de remise %</b>
                                        <input class="form-control" type="number" parsley-type="taux_remise"
                                            placeholder="" value="<?php echo $taux_remise ?>" id="taux_remise"
                                            name="taux_remise">
                                    </div>
                                    <div class="col-sm-3 col-xl-2">
                                        <b style="color : green ; ">Prix total dans le cas de remise</b>
                                        <input class="form-control" type="number" parsley-type="prix_remise"
                                            placeholder="" value="<?php echo $prix_remise ?> " id="prix_remise"
                                            name="prix_remise" step="0.01" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-3"><br>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Enregistrer
                                    </button>
                                    <input class="form-control" type="hidden" name="enregistrer_mail">
                                </div>
                            </form>
                            <h4 style="color : red ; font-weight : bold" class="mt-5">Detail Devis :
                                <?php echo $numero ?></h4>
                            <table class="table mb-0 mt-5">
                                <thead>
                                    <tr>
                                        <th><b>Produit</b></th>
                                        <th><b>Quantité</b></th>
                                        <th><b>Prix de vente HT</b></th>
                                        <th><b>Prix de vente TTC</b></th>
                                        <th><b>Taux de Remise</b></th>
                                        <th><b>Prix Total</b></th>
                                        <th><b>Prix après Remise</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $reqDevis ="select * from delta_det_devis where idd =".$id ; 
                                $queryDevis = mysql_query($reqDevis) ; 
                                while($enregDevis = mysql_fetch_array($queryDevis)){
                                    $idp                 = $enregDevis["id"]; 
                                    $produit             = $enregDevis["produit"] ; 
                                    $tva                 = $enregDevis["tva"] ; 
                                    $prix_vente_ht       = $enregDevis["prix_vente_ht"] ; 
                                    $prix_vente_ttc      = $enregDevis["prix_vente_ttc"] ; 
                                    $taux_remise         = $enregDevis["taux_remise"] ; 
                                    $prix_remise         = $enregDevis["prix_remise"] ; 
                                    $quantite            = $enregDevis["quantite"] ; 
                                    $prix_total          = $enregDevis["prix_total"] ; 
                                    
                                    $reqP = "select * from delta_produits where id=".$produit ; 
                                    $queryP = mysql_query($reqP) ; 
                                     while($enregP = mysql_fetch_array($queryP)){
                                        $produit = $enregP["reference"] ; 
                                    }
                                ?>
                                    <tr>


                                        <td> <?php echo $produit  ?> </td>
                                        <td> <?php echo $quantite ?> </td>
                                        <td> <?php echo $prix_vente_ht ?> </td>
                                        <td> <?php echo $prix_vente_ttc ?> </td>
                                        <td> <?php echo $taux_remise ?> % </td>
                                        <td> <?php echo $prix_total ?> </td>
                                        <td> <?php echo $prix_remise ?> </td>

                                        <td>
                                            <a href="gest_det_devis.php?ID=<?php echo $id ?>&IDP=<?php echo $idp ; ?>"
                                                class="btn btn-sm btn-warning waves-effect waves-light">Modifier</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page content-->
    </div>
</div>
</div>
<!-- page wrapper end -->




<?php include("menu_footer/footer.php") ?>
<script>
$("#produit").on("change", function() {
    var iddet = $("#produit").val();
    $("#prix_vente_ht").val(0);
    $("#prix_vente_ttc").val(0);
    $("#tva").val(0);
    $("#fodec").val(0);
    $("#tauxFodec").val(0);
    $.getJSON("page_json/json_detailproduit.php?ID=" + iddet, function(data, status) {
        if (status == "success") {
            prix_vente_ht = data.prix_vente_ht;
            prix_vente_ttc = data.prix_vente_ttc;
            tva = data.tva;
            fodec = data.fodec;
            type = data.type;
            nature = data.nature;
            tauxFodec = data.tauxFodec;
        }
        $("#prix_vente_ht").val(prix_vente_ht);
        $("#prix_vente_ttc").val(prix_vente_ttc);
        $("#tva").val(tva);
        $("#fodec").val(fodec);
        $("#tauxFodec").val(tauxFodec);
        $("#type").val(type);
    });
});
$("#client").on("change", function() {
    
    let client = $("#client").val();
    console.log(client)
    
    
    $.getJSON("page_json/json_detailclient.php?ID=" + client, function(data, status) {
        if (status == "success") {

            natureNom = data.natureNom;
            nature = data.nature;
        }
        $("#nature_client").val(natureNom);
        $("#nature").val(nature);
    });
});

function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() {
            callback.apply(context, args);
        }, ms || 0);
    };
}

$('#quantite').keyup(delay(function(e) {

    let quantite = this.value
    let Nature = $("#nature").val();
    if (Nature == 1) {
        let prix_total = $("#prix_total").val();
        let quantite = $("#quantite").val();
        let prix_vente_ht = $("#prix_vente_ht").val();
        let tauxFodec = $("#tauxFodec").val();
        let tva = $("#tva").val();
        if (quantite == "" || quantite == 0) {
            prix_total = 0;
        } else {
            prix_total = prix_vente_ht * quantite + (prix_vente_ht * tva) / 100 + (tauxFodec *
                prix_vente_ht) / 100;
        }
        $("#prix_total").val(prix_total);
    }
   
    if (Nature == 2) {
        let prix_total = $("#prix_total").val();
        let quantite = $("#quantite").val();
        let prix_vente_ht = $("#prix_vente_ht").val();

        console.log($("#quantite").val())
        let tauxFodec = $("#tauxFodec").val();
        prix_total = prix_vente_ht * quantite + (tauxFodec * prix_vente_ht / 100);
        console.log(prix_total);
        $("#prix_total").val(prix_total);
    }
    if (Nature == 4) {
        let prix_vente_ht = $("#prix_vente_ht").val()
        console.log($("#quantite").val())
        let prix_total = $("#prix_total").val();
        let tva = $("#tva").val();

        prix_total = prix_vente_ht * quantite + ((prix_vente_ht * tva) / 100);

        $("#prix_total").val(prix_total);
    }
    if (Nature == 5) {
        let prix_vente_ht = $("#prix_vente_ht").val()
        console.log($("#quantite").val())
        let prix_total = $("#prix_total").val();

        prix_total = prix_vente_ht * quantite;
        $("#prix_total").val(prix_total);
    }

}, 500));

$('#taux_remise').keyup(delay(function(e) {
    let taux_remise = this.value;
    let prix_total = $("#prix_total").val();
    let prix_remise = 0;
    prix_remise = prix_total - ((prix_total * taux_remise) / 100);
    console.log(prix_remise);
    $("#prix_remise").val(prix_remise);
}, 500));
</script>