<!DOCTYPE html>
<html lang="en">

<head>
    <?php
session_start();
include('connexion/cn.php');

?>
    <?php
if (!isset($_SESSION['delta_MAILUSER'])) 
{
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="index.php" </SCRIPT>';
	exit;
}
?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>DeltaCOM - Gestion Commerciale</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/1.png">
    <link rel="stylesheet" href="plugins/morris/morris.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
<?php
	$profil = "";
	$req="select * from delta_profil where id=".$_SESSION['delta_PROFIL'];
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query)){
		$profil = $enreg['profil'];
	}
?>
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main" style="background-color: #2054c966">
            <div class="container-fluid">
                <div class="logo">
                    <b style="text-align: center; color: #102677;font-family:seriffont-size: 16.5px;">Gestion
                       Commerciale</b>
                </div>

                <div class="menu-extras topbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">

                        <?php
							if (isset($_SESSION['delta_MAILUSER'])) {
							?>
						<li class="dropdown notification-list d-none d-sm-block" style="margin-top:16px">
							<b style="text-align: center; color: #102677;font-family:seriffont-size: 12px;">
							<?php echo $_SESSION['delta_USER']; ?> | <?php echo $profil; ?> 
							</b>
						</li>							
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light"
                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <img src="assets/512.png" alt="user" class="rounded-circle"
                                        style="width:20px; height:20px">
                                </a>
                                <!--<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
									<a class="dropdown-item text-danger" href="aide/aide.pdf" target="_blank"><i class="ion-document"></i>
									<b style="color:#f16c69">Manuel d'utilisation</b>
									</a>
								</div>     -->
                            </div>
                        </li>
                        <?php
							}?>
                        <!-- NOTIFICATION -->
                        <li id="idListNotifs" class="dropdown notification-list">
                            <?php
							$_GET['li'] = 1;
							//include("page_ajax/ajax_refresh_notification.php");
							?>
                        </li>



                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light"
                                    data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <img src="assets/2.png" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Compte</a>
                                       
                                        <a class="dropdown-item text-danger" href="deconnexion.php"><i class="mdi mdi-power text-danger"></i> Déconnexion</a>											
                                </div>
                            </div>
                        </li>

                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->
        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->

                    <?php
						if (isset($_SESSION['delta_MAILUSER']) and isset($_SESSION['delta_SOC'])) {
						?>

                    <?php if ($_SESSION['delta_PROFIL'] == 1) { ?>
				
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="#" style="font-size: 14px;color: crimson;"><i class="mdi mdi-buffer"></i>Paramètrage</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
										<li><a href="paremtrage.php"><b style="font-size:12px">Paramétrage</a></b></li>
										<li><a href="taxs.php"><b style="font-size:12px">Taxe</a></b></li>
                                        <li><a href="socs.php"><b style="font-size:12px">Société</a></b></li>
										<li><a href="profils.php"><b style="font-size:12px">Profils</a></b></li>
										<li><a href="utilisateurs.php"><b style="font-size:12px">Utilisateurs</a></b></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>					
                        <li class="has-submenu">
                            <a href="dashbord.php" style="font-size: 12px;"><i class="mdi mdi-home"></i>Tableau de
                                bord</a>
                        </li>
	
                        <li class="has-submenu">
                            <a href="#" style="font-size: 12px;"><i class="mdi mdi-buffer"></i>Tables de base</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="clients.php"><b style="font-size:12px">Clients </a></b></li>
										<li><a href="fournisseurs.php"><b style="font-size:12px">Fournisseurs </a></b><li>
                                        <li><a href="produits.php"><b style="font-size:12px">Produits </a></b></li>
                                        <li><a href="tabs.php"><b style="font-size:12px">Autres table des base</a></b></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#" style="font-size: 12px;"><i class="mdi mdi-buffer"></i>Mouvements
                                fournisseurs</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="gest_be.php"><b style="font-size:12px">Entrée Marchandises </a></b>
                                        </li>
                                        <li><a href="gest_bs.php"><b style="font-size:12px">Sorties Marchandises</a></b>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#" style="font-size: 12px;"><i class="mdi mdi-buffer"></i>Mouvements clients</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="gest_devis.php"><b style="font-size:12px">Devis</a></b></li>
                                        <li><a href="gest_bc.php"><b style="font-size:12px">Commandes Clients</a></b>
                                        </li>
                                        <li><a href="gest_bl.php"><b style="font-size:12px">Livraison Clients</a></b>
                                        </li>
                                        <li><a href="gest_fact.php"><b style="font-size:12px">Factures</a></b></li>
                                        <li><a href="gest_avoir.php"><b style="font-size:12px">Avoirs</a></b></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#" style="font-size: 12px;"><i class="mdi mdi-buffer"></i>Paiement</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="gest_paie_cli.php"><b style="font-size:12px">PaiementClient</a></b></li>
                                        <li><a href="gest_paie_frn.php"><b style="font-size:12px">Paiement Fournisseur</a></b></li>
                                        <li><a href="etat_paie_cli.php"><b style="font-size:11px">Etat des paiements client</a></b></li>
                                        <li><a href="etat_paie_frn.php"><b style="font-size:11px">Etat des paiements fournisseur</a></b></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#" style="font-size: 12px;"><i class="mdi mdi-buffer"></i>Listes</a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="journal.php"><b style="font-size:12px">Journal des mouvements</a></b></li>
                                        <li><a href="ca.php"><b style="font-size:12px">Chiffres d'affaires</a></b></li>
                                        <li><a href="cli_frn.php"><b style="font-size:11px">Liste clients/fournisseurs</a></b></li>
                                        <li><a href="stock_prd.php"><b style="font-size:11px">Stock produits</a></b>
                                        </li>
                                        <li><a href="mvt_stock.php"><b style="font-size:11px">Mouvement de stock</a></b>
                                        </li>
                                        <li><a href="val_stock.php"><b style="font-size:11px">Valorisation de stock</a></b></li>
                                        <li><a href="inventaire_stock.php"><b style="font-size:11px">Inventaires de stock</a></b></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>


                    </ul>
                    <?php } ?>


                    <?php } ?>


                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
	<!-- End Navigation Bar-->
	
	<!-- Autorisations -->	
	<?php
	function phpAlert($msg) {
		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}		
		if (isset($_SESSION['delta_MAILUSER']) and isset($_SESSION['delta_SOC'])) {
			$page = basename($_SERVER['PHP_SELF']);
			if($page<>"dashbord.php" && $page<>"login.php" && $page<>"dashbord_soc.php"){

				$req="select * from delta_autorisation_profils where codsoc=".$_SESSION['delta_SOC']." and idprofil=".$_SESSION['delta_PROFIL'];
				$query=mysql_query($req);
				while($enreg=mysql_fetch_array($query)){
						if($enreg[$page]==0){
							$req="select * from delta_autorisation_utilisateur where codsoc=".$_SESSION['delta_SOC']." and idutilisateur=".$_SESSION['delta_IDUSER'];
							$query=mysql_query($req);
							while($enreg=mysql_fetch_array($query)){
								if($enreg[$page]==0){
								 phpAlert("Vous n'êtes pas autorisée pour ouvrier cet écran."); 
								 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="dashbord.php" </SCRIPT>';
								 exit;
								}
							}						
						} else{
							$req="select * from delta_autorisation_utilisateur where codsoc=".$_SESSION['delta_SOC']." and idutilisateur=".$_SESSION['delta_IDUSER'];
							$query=mysql_query($req);
							while($enreg=mysql_fetch_array($query)){
								if($enreg[$page]==0){
								 phpAlert("Vous n'êtes pas autorisée pour ouvrier cet écran."); 
								 echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="dashbord.php" </SCRIPT>';
								 exit;
								}
							}
						}
					}
				}							
		}
	
	?>
	
	<!-- FIN Autorisations -->	
    