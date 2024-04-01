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

$objPHPExcel->getActiveSheet()->SetCellValue('A1', ("Liste des Fournisseurs"));
$objPHPExcel->getActiveSheet()->SetCellValue('A2', ("Date"));
$objPHPExcel->getActiveSheet()->SetCellValue('A4', ("Code"));
$objPHPExcel->getActiveSheet()->SetCellValue('B4', ("Raison Sociale"));
$objPHPExcel->getActiveSheet()->SetCellValue('C4', ("Matricule Fiscale"));
$objPHPExcel->getActiveSheet()->SetCellValue('D4', ("R. de commerce"));
$objPHPExcel->getActiveSheet()->SetCellValue('E4', ("Email"));
$objPHPExcel->getActiveSheet()->SetCellValue('F4', ("Téléphone"));
$objPHPExcel->getActiveSheet()->SetCellValue('G4', ("Region"));
$objPHPExcel->getActiveSheet()->SetCellValue('H4', ("Zone"));
$objPHPExcel->getActiveSheet()->SetCellValue('I4', ("Activité"));
$objPHPExcel->getActiveSheet()->SetCellValue('J4', ("Banque"));
$objPHPExcel->getActiveSheet()->SetCellValue('K4', ("RIB"));



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


$i = 5;

	session_start();
	include('../connexion/cn.php');
	$reqClient="";
	$client="";
	if(isset($_GET['client'])){
		if(is_numeric($_GET['client'])){
			$client			    	=	$_GET['client'];
			$reqClient				=	" and  id=".$client;
		}
	}
	$reqActivite="";
	$activite="";
	if(isset($_GET['activite'])){
		if($_GET['activite']){
			$activite				=	$_GET['activite'];
			$reqActivite		=	" and  activite like '%".$activite."%'";
		}
	}

	$reqRegion="";
	$region="";
	if(isset($_GET['region'])){
		if(is_numeric($_GET['region'])){
			$region				=	$_GET['region'];
			$reqRegion			=	" and  region=".$region;
		}
	}

	$reqZone="";
	$zone="";
	if(isset($_GET['zone'])){
		if(is_numeric($_GET['zone'])){
			$zone				=	$_GET['zone'];
			$reqZone			=	" and  zone=".$zone;
		}
	}
	$article="";
	$req = "select * from delta_fournisseurs where 1=1 ".$reqClient.$reqActivite.$reqZone.$reqRegion; 
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$code					=	$enreg["code"] ;	
		$raison_social			=	$enreg["raison_social"] ;
		$mail					=	$enreg["mail"] ;
		$tel					=	$enreg["tel"] ;
		$adresse				=	$enreg["adresse"] ;
		$mf			        	=	$enreg["matricule_fiscale"] ;
		$rc				        =	$enreg["registre_commerce"] ;
		$pays			    	=	$enreg["pays"] ;
		$region				=	$enreg["region"] ;
        $zone      		    =   $enreg["zone"] ;
        $banque      		    =   $enreg["banque"] ;
        $activite      		    =   $enreg["activite"] ;
        $rib      		        =   $enreg["rib"] ;
        $dateheure              = date('d-m-y'); 
			 $reqR = "select * from delta_regions where id=".$enreg["region"] ; 
            $queryR = mysql_query($reqR) ; 
            while($enregR = mysql_fetch_array($queryR)){
                $region = $enregR["designation"] ; 
            }
			$reqZ = "select * from delta_zones where id=".$enreg["zone"] ; 
            $queryZ = mysql_query($reqZ) ; 
            while($enregZ = mysql_fetch_array($queryZ)){
                $zone = $enregZ["designation"] ; 
            }
	
			$reqB = "select * from delta_banques where id=".$banque ; 
            $queryB = mysql_query($reqB) ; 
            while($enregB = mysql_fetch_array($queryB)){
                $banque = $enregB["designation"] ; 
            }

		
			$objPHPExcel->getActiveSheet()->SetCellValue('B2', ($dateheure));
			$objPHPExcel->getActiveSheet()
			->getStyle('A'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$i, ($code));
			$objPHPExcel->getActiveSheet()
			->getStyle('A'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	


			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$i, ($raison_social));
			$objPHPExcel->getActiveSheet()
			->getStyle('B'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	

			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$i, ($mf));
			$objPHPExcel->getActiveSheet()
			->getStyle('C'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);	

			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$i, ($rc));
			$objPHPExcel->getActiveSheet()
			->getStyle('D'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$i, ($mail));
			$objPHPExcel->getActiveSheet()
			->getStyle('D'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$i, ($tel));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);

			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$i, ($region));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$i, ($zone));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, ($activite));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, ($banque));
			$objPHPExcel->getActiveSheet()
			->getStyle('F'.$i)
			->getNumberFormat()
			->setFormatCode(
				PHPExcel_Style_NumberFormat::FORMAT_TEXT
			);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$i, ($rib));
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
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->setTitle('Liste des Fournisseurs');


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Liste_fournisseurs"'.$dateheure.'".xls"');
header('Cache-Control: max-age=0');

// Do your stuff here

$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

$writer->save('php://output');
// Echo done
//echo date('H:i:s') . " Done writing file.\r\n";

?>