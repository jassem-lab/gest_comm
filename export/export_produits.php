<?php 
error_reporting(E_ALL);
include '../Classes/PHPExcel.php';
include '../Classes/PHPExcel/Writer/Excel2007.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Delta Web IT");
$objPHPExcel->getProperties()->setLastModifiedBy("Delta Web IT");
$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");


$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1', ("Liste des Produits"));
$objPHPExcel->getActiveSheet()->SetCellValue('A2', ("Date"));
$objPHPExcel->getActiveSheet()->SetCellValue('A4', ("Référence"));
$objPHPExcel->getActiveSheet()->SetCellValue('B4', ("Famille"));
$objPHPExcel->getActiveSheet()->SetCellValue('C4', ("Unité"));
$objPHPExcel->getActiveSheet()->SetCellValue('D4', ("Marque"));
$objPHPExcel->getActiveSheet()->SetCellValue('E4', ("Emplacement"));
$objPHPExcel->getActiveSheet()->SetCellValue('F4', ("Prix d'achat HT"));
$objPHPExcel->getActiveSheet()->SetCellValue('G4', ("Prix d'achat TTC"));
$objPHPExcel->getActiveSheet()->SetCellValue('H4', ("Prix de vente HT"));
$objPHPExcel->getActiveSheet()->SetCellValue('I4', ("Prix de vente TTC"));
$objPHPExcel->getActiveSheet()->SetCellValue('J4', ("Colisage"));
$objPHPExcel->getActiveSheet()->SetCellValue('K4', ("Fodec"));
$objPHPExcel->getActiveSheet()->SetCellValue('L4', ("Stock"));
$objPHPExcel->getActiveSheet()->SetCellValue('M4', ("Seuil"));




$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);


$i = 5;

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
	$article="";
	$req = "select * from delta_produits where 1=1 ".$reqCode.$reqfamille.$reqUnite.$reqNature." order by nature"; 

	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$reference			            =	$enreg["reference"] ;
		$designation					=	$enreg["designation"] ;
		$famille				    	=	$enreg["famille"] ;
		$unite				            =	$enreg["unite"] ;
		$marque			            	=	$enreg["marque"] ;
		$prix_achat_ht			        =	$enreg["prix_achat_ht"] ;
		$prix_achat_ttc			    	=	$enreg["prix_achat_ttc"] ;
		$emplacement			    	=	$enreg["emplacement"] ;
        $prix_vente_ht      		    =   $enreg["prix_vente_ht"] ;
        $prix_vente_ttc      		    =   $enreg["prix_vente_ttc"] ;
        $colisage      		            =   $enreg["colisage"] ;
        $fodec      		            =   $enreg["fodec"] ;
        $stock                          =   $enreg["stock"];
        $seuil                          =   $enreg["seuil"];
        $dateheure              = date('d-m-y'); 

			$reqR = "select * from delta_famille_produit where id=".$famille ; 
            $queryR = mysql_query($reqR) ; 
            while($enregR = mysql_fetch_array($queryR)){
                $famille = $enregR["designation"] ; 
            }
			$reqU = "select * from delta_unite_produit where id =".$unite ; 
            $queryU = mysql_query($reqU) ; 
            while($enregU = mysql_fetch_array($queryU)){
                $unite = $enregU["code"] ; 
            }
            $reqM = "select * from delta_marques where id=".$marque ; 
            $queryM = mysql_query($reqM); 
            while($enregM = mysql_fetch_array($queryM)){
                $marque = $enregM["designation"] ; 
            }
            $reqC = "select * from delta_colisage where id =".$colisage ; 
            $queryC = mysql_query($reqC); 
            while($enregC = mysql_fetch_array($queryC)){
                $colisage = $enregC["designation"] ; 
                $nbr_pieces = $enregC["nbr_pieces"] ; 
                $poids_vide = $enregC["poids_vide"] ; 
            }
            $reqE = "select * from delta_emplacements where id =".$emplacement ; 
            $queryE = mysql_query($reqE) ; 
            while($enregE = mysql_fetch_array($queryE)){
                $emplacement = $enregE["designation"] ; 
            }
            if ($fodec == 0 ){
                $fodec = "N'est pas soumis Fodec" ; 
            }else{
                $fodec = "Soumis Fodec";
            }
		
			$objPHPExcel->getActiveSheet()->SetCellValue('B2', ($dateheure));
			$objPHPExcel->getActiveSheet()
			->getStyle('A'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, ($reference));
			$objPHPExcel->getActiveSheet()
			->getStyle('A'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	


			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, ($famille));
			$objPHPExcel->getActiveSheet()
			->getStyle('B'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	

			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, ($unite));
			$objPHPExcel->getActiveSheet()
			->getStyle('C'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	

			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, ($marque));
			$objPHPExcel->getActiveSheet()
			->getStyle('D'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, ($emplacement));
			$objPHPExcel->getActiveSheet()
			->getStyle('D'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, ($prix_achat_ht));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, ($prix_achat_ttc));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, ($prix_vente_ht));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, ($prix_vente_ttc));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, ($colisage));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, ($fodec));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('L'.$i, ($stock));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('M'.$i, ($seuil));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			


		$i ++;
	}
	

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setTitle('Liste des Fournisseurs');


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Liste_Produits"'.$dateheure.'".xls"');
header('Cache-Control: max-age=0');

// Do your stuff here

$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$writer->save('php://output');
// Echo done
//echo date('H:i:s') . " Done writing file.\r\n";

?>