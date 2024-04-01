<?php include ("menu_footer/menu.php"); ?>

<div class="wrapper">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des devis clients</h4>
                    <br> Utilisateur : <?php echo $_SESSION['delta_USER']; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerdevisclient.php?ID=" + id;
        }
    }

    function Imprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            var myMODELE_A4 = window.open("print/imprimer_devis.php?ID=" + id, "_blank",
                "toolbar=no, scrollbars=yes, resizable=no, top=500, left=500, width=700, height=600");
        }
    }
    </script>

    <div class="page-content-wrapper">
        <div class="container-fluid">
            <?php
$reqNumero="";
$numero="";
if(isset($_POST['numero'])){
	$numero		=	$_POST['numero'];
	$reqNumero		=	" and  numero like '%".$numero."%'";

}
$reqClient="";
$Client="";
if(isset($_POST['client'])){
	if(is_numeric($_POST['client'])){
		$Client		    =	$_POST['client'];
		$reqClient		=	" and  client=".$Client;
	}
}
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
		$reqDate1			=	" and  date>='".$dat1."'";
	}
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <a href="addedit_devis.php" class="btn btn-primary waves-effect waves-light">Ajouter un
                                devis client</a>
                            <h3>Liste des devis clients</h3>
                            <form name="SubmitContact" class="" method="post" action="" onSubmit="" style=''>
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <b>Client</b>
                                            <select class="form-control select2" name="client" id="client">
                                                <option value=""> Sélectionner un client </option>
                                                <?php
                                                $reqc="select * from delta_clients";
												$queryc=($reqc);
												while($enregc=mysql_fetch_array($queryc)){
												?>
                                                <option value="<?php echo $enregc['id']; ?>"
                                                    <?php if($Client==$enregc['id']) {?> selected <?php } ?>>
                                                    <?php echo $enregc['raison_social']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Numéro</b>
                                            <input name="numero" id="numero" class="form-control" type="number"
                                                placeholder="Numéro">
                                        </div>
                                        <div class="col-xl-3">
                                            <b>Du</b>
                                            <input type="date" class="form-control" id="dat" name="dat"
                                                value="<?php echo $dat; ?>">
                                        </div>
                                        <div class="col-xl-3">
                                            <b>Au</b>
                                            <input type="date" class="form-control" id="dat1" name="dat1"
                                                value="<?php echo $dat1; ?>">
                                        </div>

                                        <div class="col-xl-3">
                                            <b></b><br>
                                            <input name="SubmitContact" type="submit" id="submit"
                                                class="btn btn-primary btn-sm " value="Filtrer">
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <br>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th><b>Numéro</b></th>
                                        <th><b>Client</b></th>
                                        <th><b>Validitié de l'offre</b></th>
                                        <th><b>Date</b></th>
                                        <th><b style="color:red">Montant</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

	$date				=	"";
	$reference			=	"";
	$id					=	0;
	$validite			=	"0";
	$total				=	"0";
	 $req="select * from delta_devisclient where 1=1 ".$reqDate.$reqDate1.$reqClient.$reqNumero." order by date desc "; 
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$id					=	$enreg["id"] ;	
		$reference			=	$enreg["numero"] ;
		$montant			=	$enreg["montant"] ;
		$date				=	date("d/m/Y", strtotime($enreg["date"]) );
		$validite			=	date("d/m/Y", strtotime($enreg["validite"]) );
		$total				=	$total+$montant;
		
		$client 			=	"";
		$reqfrn="select * from delta_clients where id=".$enreg['client'];
		$queryfrn=mysql_query($reqfrn);
		while($enregfrn=mysql_fetch_array($queryfrn)){
			$client 	=	$enregfrn['code'].' - '.$enregfrn['raison_social'];
		}
		

		
?>
                                    <tr>
                                        <td style="padding: 2px 2px;"><?php echo $reference; ?></td>
                                        <td style="padding: 2px 2px;"><?php echo $client; ?></td>
                                        <td style="padding: 2px 2px;"><?php echo $validite; ?></td>
                                        <td style="padding: 2px 2px;"><?php echo $date; ?></td>
                                        <td style="padding: 2px 2px;"><b
                                                style="color:red"><?php echo number_format($montant,'3','.',''); ?></b>
                                        </td>
                                        <td style="padding: 2px 2px;">
                                            <?php if($enreg['etat']==0){?>
                                            <a href="addedit_devis.php?ID=<?php echo $id; ?>"
                                                class="btn btn-warning waves-effect waves-light">
                                                <i class="mdi mdi-tooltip-edit"></i>
                                            </a>
                                            <a href="javascript:Imprimer('<?php echo $id; ?>')"
                                                class="btn btn-warning waves-effect waves-light"
                                                style="background-color: blue;color: white;">
                                                <i class="mdi mdi-printer"></i>
                                            </a>
                                            <a href="Javascript:Supprimer('<?php echo $id; ?>')"
                                                class="btn btn-danger waves-effect waves-light"
                                                style="background-color:brown">
                                                <i class="mdi mdi-delete-forever"></i>
                                            </a>
                                            <?php } else{ ?>
                                            <a href="javascript:Imprimer('<?php echo $id; ?>')"
                                                class="btn btn-warning waves-effect waves-light"
                                                style="background-color: blue;color: white;">
                                                <span class="glyphicon glyphicon-print"></span>
                                            </a>
                                            <b style="color:green">BL Facturée et clôturée</b>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="padding: 2px 2px;"><b
                                                style="color:red"><?php echo number_format($total,'3','.',''); ?></b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

<?php include ("menu_footer/footer.php"); ?>