
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <!-- InstanceBeginEditable name="doctitle" -->
        <title>Gestion commerciale</title>
        <!-- InstanceEndEditable -->
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">


        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- InstanceBeginEditable name="head" -->
        <!-- InstanceEndEditable -->
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<body  style="background-color:#fff">
<?php
	session_start();
	include('../connexion/cn.php');

	$reqfamille="";
	$famille="";
	if(isset($_GET['famille'])){
		if(is_numeric($_GET['famille'])){
			$famille				=	$_GET['famille'];
			$reqfamille				=	" and  famille=".$famille;
		}
	}
	$reqCode="";
	$code="";
	if(isset($_GET['code'])){
		if(($_GET['code'])<>""){
			$code				=	$_GET['code'];
			$reqCode			=	" and  designation like '%".$code."%'";
		}
	}

	$reqUnite="";
	$unite="";
	if(isset($_GET['unite'])){
		if(is_numeric($_GET['unite'])){
			$unite				=	$_GET['unite'];
			$reqUnite			=	" and  unite=".$unite;
		}
	}

	$reqNature="";
	$nature="";
	if(isset($_GET['nature'])){
		if(is_numeric($_GET['nature'])){
			$nature				=	$_GET['nature'];
			$reqNature			=	" and  nature=".$nature;
		}
	}
?>
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>

<div class="table-responsive" id="div">
		<h1>Liste des produits</h1>
<table class="table mb-0" border="1" width="100%">
			<tr>
				<th><b>Référence</b></th>
				<th><b>Désignation</b></th>
				<th><b>Famille</b></th>
				<th><b>Unité</b></th>
				<th><b>Colisage</b></th>
				<th><b>Marque</b></th>
				<th><b>Emplacement</b></th>
				<th><b style="color:orange">Soumis<br>FODEC</b></th>
				<th><b style="color:green">TVA</b></th>
				<th><b style="color:brown">Px d'achat HT</b></th>
				<th><b style="color:blue">Px d'achat TTC</b></th>
				<th><b style="color:brown">Px de vente HT</b></th>
				<th><b style="color:blue">Px de vente TTC</b></th>				
			</tr>
	<tbody>						

<?php
	$req = "select * from delta_produits where 1=1 ".$reqCode.$reqfamille.$reqUnite.$reqNature." order by nature"; 
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		 $famille="";
		 $reqF ="select * from delta_famille_produit where id=".$enreg["famille"] ;
		 $queryF = mysql_query($reqF); 
		 while($enregF = mysql_fetch_array($queryF)){
			 $famille =$enregF['code'].'-'.$enregF['designation'];
		 }

		 $unite="";
		 $reqF ="select * from delta_unite_produit where id=".$enreg["famille"] ;
		 $queryF = mysql_query($reqF); 
		 while($enregF = mysql_fetch_array($queryF)){
			 $unite =$enregF['code'];
		 }
		 
		 $colisage="";
		 $reqF ="select * from delta_colisage where id=".$enreg["famille"] ;
		 $queryF = mysql_query($reqF); 
		 while($enregF = mysql_fetch_array($queryF)){
			 $colisage =$enregF['code'].'-'.$enregF['designation'];
		 }		 

		 $marque="";
		 $reqF ="select * from 	delta_marques where id=".$enreg["famille"] ;
		 $queryF = mysql_query($reqF); 
		 while($enregF = mysql_fetch_array($queryF)){
			 $marque =$enregF['code'].'-'.$enregF['designation'];
		 }		 
		 
		 $emplacement="";
		 $reqF ="select * from delta_emplacements where id=".$enreg["famille"] ;
		 $queryF = mysql_query($reqF); 
		 while($enregF = mysql_fetch_array($queryF)){
			 $emplacement =$enregF['code'].'-'.$enregF['designation'];
		 }	

		 $magasin="";
		 $reqF ="select * from delta_magasins where id=".$enreg["magasin"] ;
		 $queryF = mysql_query($reqF); 
		 while($enregF = mysql_fetch_array($queryF)){
			 $magasin =$enregF['code'].'-'.$enregF['designation'];
		 }			 
?>
	
		<tr <?php if($enreg['nature']==1){ ?> style="color:blue" <?php } ?>>	
			<td scope="row" style=""><?php echo $enreg["reference"];?></td>
			<td scope="row" style=""><?php echo $enreg["designation"];?></td>
			<td scope="row" style=""><?php echo $famille;?></td>
			<td scope="row" style="text-align:center;"><?php echo $unite;?></td>
			<td scope="row" style=""><?php echo $colisage;?></td>
			<td scope="row" style=""><?php echo $marque;?></td>
			<td scope="row" style=""><?php echo $emplacement;?></td>
			<td scope="row" style="text-align:center; color:orange">
				<?php if($enreg["fodec"]==1){ ?>
					Oui
				<?php } else{ ?>
					Non
				<?php } ?>			
			</td>
			<td scope="row" style="text-align:center; color:green"><?php echo $enreg["tva"] ; ?></td>
			<td scope="row" style="text-align:center; color:brown"><?php echo $enreg["prix_achat_ht"] ; ?></td>
			<td scope="row" style="text-align:center; color:blue"><?php echo $enreg["prix_achat_ttc"] ; ?></td>
			<td scope="row" style="text-align:center; color:brown"><?php echo $enreg["prix_vente_ht"] ; ?></td>
			<td scope="row" style="text-align:center; color:blue"><?php echo $enreg["prix_vente_ttc"] ; ?></td>
		</tr>
		<?php }  ?>

	</tbody>	
</table>
</div><br>
<a id="print" href=""  onclick="printdiv('div');" style="background-color:blue;color:white;border-radius: 50px; padding: 15px 32px;">Imprimer</a>
</body>