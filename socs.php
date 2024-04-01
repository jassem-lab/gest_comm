<?php include ("menu_footer/menu.php"); ?>

<div class="wrapper">

  <div class="page-title-box">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title">Gestion de société</h4>
				 <br> Utilisateur : <?php echo $_SESSION['delta_USER']; ?>
			</div>
		</div>
	</div>
  </div>
  <script>
		function Supprimer(id)
	  {
			if(confirm('Confirmez-vous cette action?'))
			{
				document.location.href="page_js/supprimersoc.php?ID="+id ;
			}			    
	  }	
	function Archiver(id)
	  {
			if(confirm('Confirmez-vous cette action?'))
			{
				document.location.href="page_js/archiversoc.php?ID="+id ;
			}			    
	  }		  
	function Unarchiver(id)
	  {
			if(confirm('Confirmez-vous cette action?'))
			{
				document.location.href="page_js/unarchiversoc.php?ID="+id ;
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


	$raisonsocial		=	addslashes($_POST["raisonsocial"]) ;
	$mf					=	addslashes($_POST["mf"]) ;	
	$rc					=	addslashes($_POST["rc"]) ;	
	$telephone			=	addslashes($_POST["telephone"]) ;	
	$mail				=	addslashes($_POST["mail"]) ;	
	$adresse			=	addslashes($_POST["adresse"]) ;	
	
			$sql="UPDATE `delta_societe` SET `raisonsocial`='".$raisonsocial."',`mf`='".$mf."',`rc`='".$rc."',`telephone`='".$telephone."',
			`adresse`='".$adresse."',`mail`='".$mail."' WHERE id=".$_SESSION['delta_SOC'];
			$req=mysql_query($sql);
		
		
		//Upload 
		$type1=pathinfo(basename($_FILES["logo"]["name"]), PATHINFO_EXTENSION);
		$file1=md5($_FILES["logo"]["name"].time()).".".$type1;		
		if($type1<>""){
			$path = "assets/".$file1; 
			$pathcomplete = "assets/".$file1;
			move_uploaded_file($_FILES['logo']['tmp_name'], $pathcomplete);

			$sql="UPDATE delta_societe set logo='".$pathcomplete."' where id=".$_SESSION['delta_SOC'];
			$req=mysql_query($sql);							
		}		
		$type1=pathinfo(basename($_FILES["entete"]["name"]), PATHINFO_EXTENSION);
		$file1=md5($_FILES["entete"]["name"].time()).".".$type1;		
		if($type1<>""){
			$path = "assets/".$file1; 
			$pathcomplete = "assets/".$file1;
			move_uploaded_file($_FILES['entete']['tmp_name'], $pathcomplete);

			$sql="UPDATE delta_societe set entete='".$pathcomplete."' where id=".$_SESSION['delta_SOC'];
			$req=mysql_query($sql);							
		}
		$type1=pathinfo(basename($_FILES["pied"]["name"]), PATHINFO_EXTENSION);
		$file1=md5($_FILES["pied"]["name"].time()).".".$type1;		
		if($type1<>""){
			$path = "assets/".$file1; 
			$pathcomplete = "assets/".$file1;
			move_uploaded_file($_FILES['pied']['tmp_name'], $pathcomplete);

			$sql="UPDATE delta_societe set pied='".$pathcomplete."' where id=".$_SESSION['delta_SOC'];
			$req=mysql_query($sql);							
		}			

		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
	$raisonsocial		=	"";
	$mf					=	"";
	$rc					=	"";
	$telephone			=	"";
	$mail				=	"";
	$adresse			=	"";
	
	$req="select * from delta_societe where id=".$_SESSION['delta_SOC'];
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$raisonsocial		=	$enreg["raisonsocial"] ;
		$mf					=	$enreg["mf"] ;
		$rc					=	$enreg["rc"] ;
		$telephone			=	$enreg["telephone"] ;
		$mail				=	$enreg["mail"] ;
		$adresse			=	$enreg["adresse"] ;
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
								<font color="green" style="background-color:#FFFFFF;"><center>Enregistrement effectué avec succès</center></font><br /><br />
							<?php } }?>							
							<form action="" method="POST" enctype="multipart/form-data">    
								<div class="form-group row">								
									<div class="col-sm-2">
									<b>Raison sociale (*)</b>
										<input class="form-control" type="text"  placeholder="Raison sociale" value="<?php echo $raisonsocial; ?>" id="example-text-input" name="raisonsocial" required>
									</div>
									<div class="col-sm-2">
									<b>Matricule fiscale (*)</b>
										<input class="form-control"  type="text"  placeholder="MF" value="<?php echo $mf; ?>" id="example-text-input" name="mf" required>
									</div>
									<div class="col-sm-2">
									<b>Regisre de commerce</b>
										<input class="form-control"  data-parsley-type="text" type="text"  placeholder="RC" value="<?php echo $rc; ?>" id="example-text-input" name="rc" required>
									</div>										
									<div class="col-sm-3">
									<b>Mail (*)</b>
										<input class="form-control"  data-parsley-type="text" type="text"  placeholder="E-mail" value="<?php echo $mail; ?>" id="example-text-input" name="mail" required>
									</div>		
									<div class="col-sm-2">
									<b>Téléphone (*)</b>
										<input class="form-control"  data-parsley-type="text" type="number"  placeholder="Téléphone" value="<?php echo $telephone; ?>" id="example-text-input" name="telephone" required>
									</div>		
									<div class="col-sm-4">
									<b>Adresse (*)</b>
										<textarea class="form-control" name="adresse" id="adresse"><?php echo $adresse;?></textarea>
									</div>	
									<div class="col-sm-2">
									<b>Logo (*)</b>
										<input class="form-control"  type="file"  id="logo" name="logo">
									</div>										
									<div class="col-sm-2">
									<b>Entête (*)</b>
										<input class="form-control" type="file"  id="entete" name="entete">
									</div>	
									<div class="col-sm-2">
									<b>Pied (*)</b>
										<input class="form-control"  type="file"  id="pied" name="pied">
									</div>										
								</div>
								
								<div class="form-group row">
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
							<h3>Les Informations de la société</h3>			
								<br>
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th><b>Raison sociale</b></th>
                                            <th><b>MF</b></th>
											<th><b>RC</b></th>
											<th><b>Mail</b></th>
											<th><b>Téléphone</b></th>
											<th><b>Logo</b></th>
											<th><b>Entête</b></th>
											<th><b>Pied</b></th>
											<th><b>Action</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
	$id					=	0;
	$nom				=	"";
	$raisonsocial		=	"";
	$mf					=	"";
	$rc					=	"";
	$telephone			=	"";
	$mail				=	"";
	$adresse			=	"";
	
	$req="select * from delta_societe where id=".$_SESSION['delta_SOC']." order by raisonsocial ";
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$id					=	$enreg["id"] ;
		$raisonsocial		=	$enreg["raisonsocial"] ;
		$mf					=	$enreg["mf"] ;
		$rc					=	$enreg["rc"] ;
		$telephone			=	$enreg["telephone"] ;
		$mail				=	$enreg["mail"] ;
		$adresse			=	$enreg["adresse"] ;

	?>
										<tr>
											 <td><?php echo $raisonsocial; ?></td>
											 <td><?php echo $mf; ?></td>
											 <td><?php echo $rc; ?></td>
											 <td><?php echo $mail; ?></td>
											 <td><?php echo $telephone; ?></td>
											 <td>
												<?php if($enreg['logo']<>""){ ?>
													<a href="<?php echo $enreg['logo']; ?>" target="_blank"><img src="<?php echo $enreg['logo']; ?>" style="width:30%"></a>
												<?php } ?>
											 </td>
											 <td>
												<?php if($enreg['entete']<>""){ ?>
													<a href="<?php echo $enreg['entete']; ?>"><img src="<?php echo $enreg['entete']; ?>" style="width:30%"></a>
												<?php } ?>
											 </td>
											 <td>
												<?php if($enreg['pied']<>""){ ?>
													<a href="<?php echo $enreg['pied']; ?>"><img src="<?php echo $enreg['pied']; ?>" style="width:30%"></a>
												<?php } ?>
											 </td>											 
											 <td>
												<a href="socs.php?ID=<?php echo $id; ?>" class="btn btn-warning waves-effect waves-light">Modifier</a>
												<?php 
												/*$reqc='select * from telec_requete where idutilisateur='.$id;
												$queryc=mysql_query($reqc);
												$numc=mysql_num_rows($queryc);
												if($numc=='0'){ ?>
												<a href="Javascript:Supprimer('<?php echo $id; ?>')" class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
												<?php }*/ ?>
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