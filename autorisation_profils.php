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
 
 
  <div class="page-content-wrapper">
		<div class="container-fluid">
   		
			<div class="row">
				<div class="col-lg-12">
					<div class="card m-b-20">
						<div class="card-body">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th><b>Profils</b></th>
											<th><b>Action</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
	$nom				=	"";

	$req="select * from delta_profil ";
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$id					=	$enreg["id"] ;	
		$nom				=	$enreg["profil"] ;

	?>
										<tr>
											 <td><?php echo $nom; ?></td>
											 
											 <td>
												<a href="autorisation_addprofils.php?ID=<?php echo $id; ?>" class="btn btn-warning waves-effect waves-light">
													Autorisation
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
  </div>
 </div>

<?php include ("menu_footer/footer.php"); ?>