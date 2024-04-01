<?php include ("menu_footer/menu.php"); ?>
<script type="text/JavaScript">
	function MettreEnCours(id,idetab)
	{
		if(confirm('Confirmez-vous cette action?'))
		{
			document.location.href="page_js/mettre_encour.php?ID="+id;
		}
	}
</script>
<div class="wrapper">
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block"></div>
                    <h4 class="page-title" style="">Choix des sociétés -  Utilisateur : <?php echo $_SESSION['delta_USER']; ?></h4>
					 
                </div>
            </div>
        </div>

    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
 			<div class="col-12">
				<div class="card m-b-20">
					<div class="card-body">

						<div class="form-group row">
						<?php
							$email		=	"";
							$mdp		=	"";
							$req="select * from delta_utilisateurs where id=".$_SESSION['delta_IDUSER'];
							$query=mysql_query($req);
							while($enreg=mysql_fetch_array($query)){
								$email		=	$enreg['mail'];
								$mdp		=	$enreg['motdepasse'];							
							}
						
							$entreprise = "";
							$req="select * from delta_societe where exists(select * from delta_utilisateurs where delta_utilisateurs.codsoc=delta_societe.id 
							and mail='".$email."' and motdepasse='".$mdp."')";
							$query=mysql_query($req);
							while($enreg=mysql_fetch_array($query))
							{	
								$logo		=	$enreg["logo"] ;
								$nom		=	$enreg["raisonsocial"] ;
								$mf			=	$enreg["mf"] ;
								$rc			=	$enreg["rc"] ;
								$adresse	=	$enreg["adresse"] ;
								
						?>
								<div class="col-sm-4" style="border:solid ">
										<?php if (file_exists($logo)){ ?>
											<img src="<?php echo $logo;?>" style="width:200px;height: 110px;margin-left: 65px;" > 
										<?php } else{ ?>
											<img src="assets/no_img.png" style="width:    height: 110px;;height: 110px;margin-left: 65px;" > 
										<?php } ?>
										<br>
										<?php 
											echo '<br><b> Raison sociale: '.$nom.'</b><br>';
											echo '<b>Adresse:'.$adresse.'</b><br>';
											echo '<b>MF:'.$mf.'<br>RC: '.$rc.'</b>';
										?>
										<br><br>
										<a href="Javascript:MettreEnCours('<?php echo $enreg['id']; ?>')" class="btn btn-primary waves-effect waves-light" style="border-radius: 52px;margin-bottom: 10px;">Mettre la société en cours</a>
								</div>
						<?php } ?>		
						</div>
						
					</div>
				</div>
			</div> <!-- end col -->
 
			</div>
		</div>
	</div>

<?php include("menu_footer/footer.php") ?>
