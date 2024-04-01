<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $produit   				= 	$_POST['produit'];

	$px_ht					=	"0";
	$px_ttc					=	"0";
	$tva					=	"0";
	$val_tva				=	"0";
	$colisage				=	"0";
	
	$reqprd="select * from delta_produits where id=".$produit;
	$queryprd=mysql_query($reqprd);
	while($enregprd=mysql_fetch_array($queryprd)){
		$px_ht				=	$enregprd['prix_achat_ht'];
		$px_ttc				=	$enregprd['prix_achat_ttc'];
		$tva				=	$enregprd['tva'];
		$val_tva			=	$enregprd['prix_achat_ttc']-$enregprd['prix_achat_ht'];	
		$colisage			=	$enregprd['colisage'];
	}

	$colis				   =	"";
	$qte_colis			   =	"";
	$reqcoli="select * from delta_colisage where id=".$colisage;
	$querycoli=mysql_query($reqcoli);
	while($enregcoli=mysql_fetch_array($querycoli)){
		$colis				=	$enregcoli['code'].' | Quantité par colis: '.$enregcoli['nbr_pieces'];
		$qte_colis			=	$enregcoli['nbr_pieces'];
	}
	
?>
	<div class="col-md-12 row">
	
		<div class="col-md-1">
			<b>Px unitaire HT</b>
			<input class="form-control" type="number" step="0.001" id="px_ht" name="px_ht" value="<?php echo $px_ht; ?>">
		</div>
		<div class="col-md-1">
			<b>Taux TVA</b>
			<input class="form-control" type="number" step="0.001" id="tva" name="tva" value="<?php echo $tva; ?>"  readonly>
		</div>	
		<div class="col-md-1">
			<b>Valeur TVA</b>
			<input class="form-control" type="number" step="0.001" id="val_tva" name="val_tva" value="<?php echo $val_tva; ?>" readonly>
		</div>	
		<div class="col-md-1">
			<b style="color:green">Px TTC</b>
			<input class="form-control" type="number" step="0.001" id="px_ttc" name="px_ttc" value="<?php echo $px_ttc; ?>" readonly>
		</div>			
		<?php if($colisage>0){ ?>
		<div class="col-md-2">
			<b>Colisage</b><br>
			<input type="radio" id="colisage" name="colisage" value="0" >
			<label for="html">Non</label>
			<input type="radio" id="colisage" name="colisage" value="1" checked>
			<label for="css">Oui</label>
			<br>
			<span style="color:blue"  id="span"><?php echo $colis; ?></span>
			<input type="hidden" value="<?php echo $qte_colis; ?>" name="qte_colis" id="qte_colis">
			<input type="hidden" value="<?php echo $colisage; ?>" name="coli" id="coli">
		</div>			
		<?php } ?>
		<div class="col-md-1">
			<b id="b_qte" style="color:red">QTE <?php if($colisage>0){ ?>par colis<?php } ?></b>
			<input class="form-control" type="number" step="" id="quantite" name="quantite" value="" min="0" oninput="validity.valid||(value='');">
		</div>		
		<div class="col-md-1">
			<b style="color:#93eb93">Px HT Total</b>
			<input class="form-control" type="number" step="0.001" id="px_ht_total" name="px_ht_total" value="" readonly style="background-color:#e0ffda">
		</div>			
		<div class="col-md-1">
			<b style="color:orange">Taux remise</b>
			<input class="form-control" type="number" step="0.001" id="taux_remise" name="taux_remise" value=""  min="0" oninput="validity.valid||(value='');">
			<br>
			<b style="color:orange">Valeur remise</b>
			<input class="form-control" type="number" step="0.001" id="val_remise" name="val_remise" value=""  min="0" readonly  style="background-color:orange">
		</div>	
		
		<div class="col-md-2">
			<b style="color:#93eb93">Px HT Total après remise</b>
			<input class="form-control" type="number" step="0.001" id="px_ht_total_remise" name="px_ht_total_remise" value="" readonly style="background-color:#e0ffda">
		</div>			
		<div class="col-md-2">
			<b style="color:#93eb93">Px TTC Total</b>
			<input class="form-control" type="number" step="0.001" id="px_ttc_total" name="px_ttc_total" value="" readonly style="background-color:#e0ffda">
		</div>				
	</div>
	
	
	<script>
	$("#quantite").on("change", function(){
		var coli	  = $("#coli").val();
		var tva	  	  = $("#tva").val();		
		var quantite  = $("#quantite").val();
		var px_ht     = $("#px_ht").val();
		var qte_colis = $("#qte_colis").val();
		var taux_remise = $("#taux_remise").val();
		if(coli>0){
			var colisage  = $("input[name='colisage']:checked").val();
			if(colisage==0){
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));
			} else{
				quantite = quantite*qte_colis;
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));		
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
			}				
		} else{
			var px_ht_total 		=  px_ht * quantite;
			var px_ht_total_remise 	=  px_ht * quantite;
			$("#px_ht_total").val(px_ht_total.toFixed(3));
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
		}
		if(taux_remise>0){
			var val_remise  = (px_ht_total*taux_remise)/100;
			$("#val_remise").val(val_remise.toFixed(3));
			var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		} else{
			$("#px_ht_total_remise").val(px_ht_total.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		}
	});	
	$("#quantite").on("keyup", function(){
		var coli	  = $("#coli").val();
		var tva	  	  = $("#tva").val();		
		var quantite  = $("#quantite").val();
		var px_ht     = $("#px_ht").val();
		var qte_colis = $("#qte_colis").val();
		var taux_remise = $("#taux_remise").val();
		if(coli>0){
			var colisage  = $("input[name='colisage']:checked").val();
			if(colisage==0){
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));
			} else{
				quantite = quantite*qte_colis;
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));		
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
			}				
		} else{
			var px_ht_total 		=  px_ht * quantite;
			var px_ht_total_remise 	=  px_ht * quantite;
			$("#px_ht_total").val(px_ht_total.toFixed(3));
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
		}
		if(taux_remise>0){
			var val_remise  = (px_ht_total*taux_remise)/100;
			$("#val_remise").val(val_remise.toFixed(3));
			var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		} else{
			$("#px_ht_total_remise").val(px_ht_total.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		}
	});	
	$("#quantite").on("keypress", function(){
		var coli	  = $("#coli").val();
		var tva	  	  = $("#tva").val();		
		var quantite  = $("#quantite").val();
		var px_ht     = $("#px_ht").val();
		var qte_colis = $("#qte_colis").val();
		var taux_remise = $("#taux_remise").val();
		if(coli>0){
			var colisage  = $("input[name='colisage']:checked").val();
			if(colisage==0){
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));
			} else{
				quantite = quantite*qte_colis;
				var px_ht_total 	    =  px_ht * quantite;
				var px_ht_total_remise  =  px_ht * quantite;
				$("#px_ht_total").val(px_ht_total.toFixed(3));
				$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));		
				var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
				$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
			}				
		} else{
			var px_ht_total 		=  px_ht * quantite;
			var px_ht_total_remise 	=  px_ht * quantite;
			$("#px_ht_total").val(px_ht_total.toFixed(3));
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));				
		}
		if(taux_remise>0){
			var val_remise  = (px_ht_total*taux_remise)/100;
			$("#val_remise").val(val_remise.toFixed(3));
			var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
			$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		} else{
			$("#px_ht_total_remise").val(px_ht_total.toFixed(3));	
			var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
			$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
		}
	});		
	
	
	
	$("#taux_remise").on("change", function(){
		var taux_remise = $("#taux_remise").val();	
		var px_ht_total= $("#px_ht_total").val();
		var tva		   = $("#tva").val();
		
		var val_remise  = (px_ht_total*taux_remise)/100;
		$("#val_remise").val(val_remise.toFixed(3));
		var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
		$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
		var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
		$("#px_ttc_total").val(px_ttc_total.toFixed(3));			
	});

	$("#taux_remise").on("keyup", function(){
		var taux_remise = $("#taux_remise").val();	
		var px_ht_total= $("#px_ht_total").val();
		var tva		   = $("#tva").val();
		
		var val_remise  = (px_ht_total*taux_remise)/100;
		$("#val_remise").val(val_remise.toFixed(3));
		var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
		$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
		var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
		$("#px_ttc_total").val(px_ttc_total.toFixed(3));	
	});
	
	$("#taux_remise").on("keypress", function(){
		var taux_remise = $("#taux_remise").val();	
		var px_ht_total= $("#px_ht_total").val();
		var tva		   = $("#tva").val();
		
		var val_remise  = (px_ht_total*taux_remise)/100;
		$("#val_remise").val(val_remise.toFixed(3));
		var px_ht_total_remise = parseFloat(px_ht_total)-parseFloat(val_remise);
		$("#px_ht_total_remise").val(px_ht_total_remise.toFixed(3));
		var px_ttc_total = ((px_ht_total_remise*tva)/100) + parseFloat(px_ht_total_remise);
		$("#px_ttc_total").val(px_ttc_total.toFixed(3));	
	});	
	

	$('input[type=radio][name=colisage]').change(function() {
		if (this.value == '0') {
			$("#b_qte").text("QTE");
			$("#span").hide();
		}
		else if (this.value == '1') {
			$("#b_qte").text("QTE par colis");
			$("#span").show();
		}
		$("#quantite").val('');
		$("#px_ht_total").val('');
		$("#px_ht_total_remise").val('');
	});	
	
	$("#px_ht").on("change", function(){
		var px  = $("#px_ht").val();
		var tva = $("#tva").val();
		var px_ttc = ((px*tva)/100);
		px_ttc = parseFloat(px_ttc) + parseFloat(px);
		$("#px_ttc").val(px_ttc.toFixed(3));
		var val_tva = px_ttc-px;
		$("#val_tva").val(val_tva.toFixed(3));
	});
	$("#px_ht").on("keyup", function(){
		var px  = $("#px_ht").val();
		var tva = $("#tva").val();
		var px_ttc = ((px*tva)/100);
		px_ttc = parseFloat(px_ttc) + parseFloat(px);
		$("#px_ttc").val(px_ttc.toFixed(3));
		var val_tva = px_ttc-px;
		$("#val_tva").val(val_tva.toFixed(3));
	});
	$("#px_ht").on("keypress", function(){
		var px  = $("#px_ht").val();
		var tva = $("#tva").val();
		var px_ttc = ((px*tva)/100);
		px_ttc = parseFloat(px_ttc) + parseFloat(px);
		$("#px_ttc").val(px_ttc.toFixed(3));
		var val_tva = px_ttc-px;
		$("#val_tva").val(val_tva.toFixed(3));
	});


	</script>