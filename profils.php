<?php include ("menu_footer/menu.php"); ?>

<div class="wrapper">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Gestion des profils</h4>
                    <br> Utilisateur : <?php echo $_SESSION['delta_USER']; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerprofils.php?ID=" + id;
        }
    }

    function Archiver(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/archiverprofils.php?ID=" + id;
        }
    }

    function Unarchiver(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/unarchiverprofils.php?ID=" + id;
        }
    }
    </script>
    <?php

	if(isset($_GET['ID'])){
		$id = $_GET['ID'];
	}else{
		$id = "0";
	}


if(isset($_POST['enregistrer_mail'])){	


	$profil			=	addslashes($_POST["profil"]) ;
	$codsoc			=	$_SESSION['delta_SOC'];
	
	if($id=="0")
		{
			$sql="INSERT INTO `delta_profil`(`profil`, `codsoc`) VALUES  ('".$profil."','".$codsoc."' )";
		}
	else{
			$sql="UPDATE `delta_profil` SET `profil`='".$profil."',`codsoc`='".$codsoc."' WHERE id=".$id;
		}
		$req=mysql_query($sql);

		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
	$profil				=	"";	
	$req="select * from delta_profil where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$profil				=	$enreg["profil"] ;
	}
	
	?>
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
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <b>Profil (*)</b>
                                        <input class="form-control" type="text" placeholder="Profil d'utilisateur"
                                            value="<?php echo $profil; ?>" id="example-text-input" name="profil" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <br>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Enregistrer
                                        </button>
                                        <input class="form-control" type="hidden" name="enregistrer_mail">
                                    </div>									
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">
                            <h3>Liste des profils</h3>
                            <br>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th><b>Profil</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
	$id					=	0;
	$profil				=	"";
	
	$req="select * from delta_profil where codsoc=".$_SESSION['delta_SOC']." order by profil ";
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$id					=	$enreg["id"] ;	
		$profil				=	$enreg["profil"] ;
	?>
                                    <tr>
                                        <td><?php echo $profil; ?></td>
                                        <td>
                                            <?php if($enreg['archive']==0){ ?>
                                            <b style="color:green"> Actif </b>
                                            <?php } else{ ?>
                                            <b style="color:red"> Inactif </b>
                                            <?php } ?>

                                        </td>
                                        <td>
                                            <a href="profils.php?ID=<?php echo $id; ?>"
                                                class="btn btn-warning waves-effect waves-light">
                                                <span class="far fa-edit"></span>
                                            </a>
                                            <a href="autorisation_addprofils.php?ID=<?php echo $id; ?>"
                                                class="btn btn-warning waves-effect waves-light">
                                                Autorisation
                                            </a>
                                            <?php if ($enreg["archive"]=="0"){ ?>
                                            <a href="Javascript:Archiver('<?php echo $id; ?>')"
                                                class="btn btn-danger waves-effect waves-light">Archiver</a>
                                            <?php } else {?>
                                            <a href="Javascript:Unarchiver('<?php echo $id; ?>')"
                                                class="btn btn-dark waves-effect waves-light">Unarchiver</a>
                                            <?php }?>

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
    </div>
</div>

<?php include ("menu_footer/footer.php"); ?>