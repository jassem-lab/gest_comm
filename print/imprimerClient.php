<?php
	session_start();
	include('../connexion/cn.php');
	
require('../fpdf181/fpdf.php');
//require('../fpdf181/html_table/html_table.php');
define('EURO', chr(128) );
define('EURO_VAL', 6.55957 );


$nwords = array( "zero", "un", "deux", "trois", "quatre", "cinq", "six", "sept","huit", "neuf", "dix", "onze", "douze", "treize","quatorze", "quinze", "seize", "dix-sept", "dix-huit","dix-neuf", "vingt", 30 => "trente", 40 => "quarante",50 => "cinquante", 60 => "soixante", 70 => "soixante-dix", 80 => "quatre-vingts",90 => "quatre vingt dix");

function int_to_words($x) {
   global $nwords;

   
         $w = '';
      // ... now $x is a non-negative integer.

      if($x < 21)   // 0 to 20
         $w .= $nwords[$x];
      else if($x < 100) {   // 21 to 99
         $w .= $nwords[10 * floor($x/10)];
         $r = fmod($x, 10);
         if($r > 0)
            $w .= '-'. $nwords[$r];
      } else if($x < 1000) {   // 100 to 999
         $w .= $nwords[floor($x/100)] .' cent';
         $r = fmod($x, 100);
         if($r > 0)
            $w .= '  '. int_to_words($r);
      } else if($x < 1000000) {   // 1000 to 999999
         $w .= int_to_words(floor($x/1000)) .' mille';
         $r = fmod($x, 1000);
         if($r > 0) {
            $w .= ' ';
            if($r < 100)
               $w .= ' ';
            $w .= int_to_words($r);
         }
      } else {    //  millions
         $w .= int_to_words(floor($x/1000000)) .' million';
         $r = fmod($x, 1000000);
         if($r > 0) {
            $w .= ',';
            if($r < 100)
               $word .= '  ';
            $w .= int_to_words($r);
			
         }
      }
	   return $w;
   }
  

class PDF extends FPDF
{

// variables privées

var $colonnes;
var $format;
var $angle=0;
//var $withEntete;

/*if(isset($_GET['ent'])){
	$withEntete = $_GET['ent'];
}*/

// fonctions privées
function RoundedRect($x, $y, $w, $h, $r, $style = '')
{
	$k = $this->k;
	$hp = $this->h;
	if($style=='F')
		$op='f';
	elseif($style=='FD' || $style=='DF')
		$op='B';
	else
		$op='S';
	$MyArc = 4/3 * (sqrt(2) - 1);
	$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
	$xc = $x+$w-$r ;
	$yc = $y+$r;
	$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

	$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
	$xc = $x+$w-$r ;
	$yc = $y+$h-$r;
	$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
	$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
	$xc = $x+$r ;
	$yc = $y+$h-$r;
	$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
	$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
	$xc = $x+$r ;
	$yc = $y+$r;
	$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
	$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
	$this->_out($op);
}

function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
{
	$h = $this->h;
	$this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
						$x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
}

function Rotate($angle, $x=-1, $y=-1)
{
	if($x==-1)
		$x=$this->x;
	if($y==-1)
		$y=$this->y;
	if($this->angle!=0)
		$this->_out('Q');
	$this->angle=$angle;
	if($angle!=0)
	{
		$angle*=M_PI/180;
		$c=cos($angle);
		$s=sin($angle);
		$cx=$x*$this->k;
		$cy=($this->h-$y)*$this->k;
		$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
	}
}

function _endpage()
{
	if($this->angle!=0)
	{
		$this->angle=0;
		$this->_out('Q');
	}
	parent::_endpage();
}

// fonctions publiques
function sizeOfText( $texte, $largeur )
{
	$index    = 0;
	$nb_lines = 0;
	$loop     = TRUE;
	while ( $loop )
	{
		$pos = strpos($texte, "\n");
		if (!$pos)
		{
			$loop  = FALSE;
			$ligne = $texte;
		}
		else
		{
			$ligne  = substr( $texte, $index, $pos);
			$texte = substr( $texte, $pos+1 );
		}
		$length = floor( $this->GetStringWidth( $ligne ) );
		$res = 1 + floor( $length / $largeur) ;
		$nb_lines += $res;
	}
	return $nb_lines;
}

// Cette fonction affiche en haut, a gauche,
// le nom de la societe dans la police Arial-12-Bold
// les coordonnees de la societe dans la police Arial-10


// Affiche en haut, a droite le libelle
// (FACTURE, DEVIS, Bon de commande, etc...)
// et son numero
// La taille de la fonte est auto-adaptee au cadre
function fact_dev( $libelle, $num )
{
    $r1  = $this->w - 80;
    $r2  = $r1 + 68;
    $y1  = 6;
    $y2  = $y1 + 2;
    $mid = ($r1 + $r2 ) / 2;
    
    $texte  = $libelle . " N° : " . $num;    
    $szfont = 12;
    $loop   = 0;
    
    while ( $loop == 0 )
    {
       $this->SetFont( "Arial", "B", $szfont );
       $sz = $this->GetStringWidth( $texte );
       if ( ($r1+$sz) > $r2 )
          $szfont --;
       else
          $loop ++;
    }

    $this->SetLineWidth(0.1);
    $this->SetFillColor(192);
    $this->RoundedRect($r1, $y1+30, ($r2 - $r1), $y2, 2.5, 'DF');
    $this->SetXY( $r1+1, $y1+32);
    $this->Cell($r2-$r1 -1,5, $texte, 0, 0, "C" );
}

// Genere automatiquement un numero de devis
function addDevis( $numdev )
{
	$string = sprintf("DEV%04d",$numdev);
	$this->fact_dev( "Devis", $string );
}

// Genere automatiquement un numero de facture
function addFacture( $numfact )
{
	$string = sprintf("FA%04d",$numfact);
	$this->fact_dev( "Facture", $string );
}

// Affiche un cadre avec la date de la facture / devis
// (en haut, a droite)
function addDate( $date )
{
	$r1  = $this->w - 50;
	$r2  = $r1 + 40;
	$y1  = 17;
	$y2  = $y1 ;
	$mid = $y1 + ($y2 / 2);
	$this->RoundedRect($r1, $y1+30, ($r2 - $r1), $y2, 3.5, 'D');
	$this->Line( $r1, $mid+30, $r2, $mid+30);
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1+32 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,5, "DATE", 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1+41 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$date, 0,0, "C");
}

// Affiche un cadre avec les references du client
// (en haut, a droite)
function addClient( $ref )
{
	$r1  = $this->w - 41;
	$r2  = $r1 + 30;
	$y1  = 17;
	$y2  = $y1;
	$mid = $y1 + ($y2 / 2);
	$this->RoundedRect($r1, $y1+30, ($r2 - $r1), $y2, 3.5, 'D');
	$this->Line( $r1, $mid+30, $r2, $mid+30);
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1+32 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,5, "FOURNISSEUR", 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1 + 41 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$ref, 0,0, "C");
}

// Affiche un cadre avec un numero de page
// (en haut, a droite)
function addPageNumber( $page )
{
	$r1  = $this->w - 80;
	$r2  = $r1 + 30;
	$y1  = 17;
	$y2  = $y1;
	$mid = $y1 + ($y2 / 2);
	$this->RoundedRect($r1, $y1+30, ($r2 - $r1), $y2, 3.5, 'D');
	$this->Line( $r1, $mid+30, $r2, $mid+30);
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1+32 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,5, "PAGE", 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1 + 41 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$page, 0,0, "C");
}

// Affiche l'adresse du client
// (en haut, a droite)
function addClientAdresse( $clt,$adr,$tel ,$trim )
{
	$r1     = $this->w - 200;
	$r2     = $r1 + 90;
	$y1     = 31;
	$this->SetXY( $r1, $y1+6);
	$y2  = $y1;
	$mid = $y1 ;
	$this->RoundedRect($r1, $y1+5, ($r2 - $r1)+20, $y2-3, 3.5, '');
	
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(25,5, "Client:", 0, 0, "C");
	$this->SetFont( "Arial", "", 8);
	$this->MultiCell( 100, 5, $clt);
	
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(33,8, "Téléphone:", 0, 0, "C");
	$this->SetFont( "Arial", "", 8);
	$this->MultiCell( 80, 8, $adr);
	
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(30,8, "Adresse:", 0, 0, "C");
	$this->SetFont( "Arial", "", 8);
	$this->MultiCell( 80, 8, utf8_decode($tel));
	
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(32,8, "Trimestre:", 0, 0, "C");
	$this->SetFont( "Arial", "", 8);
	$this->MultiCell( 80, 8, utf8_decode($trim));	
	
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5, $y1 + 41 );
	$this->SetFont( "Arial", "B", 20);


}


// Affiche un cadre avec la date d'echeance
// (en haut, au centre)
function addEcheance( $date )
{
	$r1  = 80;
	$r2  = $r1 + 40;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->RoundedRect($r1, $y1, ($r2 - $r1), ($y2-$y1), 2.5, 'D');
	$this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY( $r1 + ($r2 - $r1)/2 - 5 , $y1+1 );
	$this->SetFont( "Arial", "B", 10);
	$this->Cell(10,4, "DATE D'ECHEANCE", 0, 0, "C");
	$this->SetXY( $r1 + ($r2-$r1)/2 - 5 , $y1 + 5 );
	$this->SetFont( "Arial", "", 10);
	$this->Cell(10,5,$date, 0,0, "C");
}

// Affiche un cadre avec le numero de la TVA
// (en haut, au droite)
function addNumTVA($tva)
{
	$this->SetFont( "Arial", "B", 10);
	$r1  = $this->w - 80;
	$r2  = $r1 + 70;
	$y1  = 80;
	$y2  = $y1+10;
	$mid = $y1 + (($y2-$y1) / 2);
	$this->RoundedRect($r1, $y1, ($r2 - $r1), ($y2-$y1), 2.5, 'D');
	$this->Line( $r1, $mid, $r2, $mid);
	$this->SetXY( $r1 + 16 , $y1+1 );
	$this->Cell(40, 4, "TVA Intracommunautaire", '', '', "C");
	$this->SetFont( "Arial", "", 10);
	$this->SetXY( $r1 + 16 , $y1+5 );
	$this->Cell(40, 5, $tva, '', '', "C");
}

// Affiche une ligne avec des reference
// (en haut, a gauche)
function addReference($ref)
{
	$this->SetFont( "Arial", "", 10);
	$length = $this->GetStringWidth( "Références : " . $ref );
	$r1  = 10;
	$r2  = $r1 + $length;
	$y1  = 92;
	$y2  = $y1+5;
	$this->SetXY( $r1 , $y1 );
	$this->Cell($length,4, "Références : " . $ref);
}

// trace le cadre des colonnes du devis/facture
function addCols( $tab )
{
	global $colonnes;
	
	$r1  = 10;
	$r2  = $this->w - ($r1 * 2) ;
	$y1  = 100;
	$y2  = $this->h - 50 - $y1;
	$this->SetXY( $r1, $y1 );
	$this->Rect( $r1, $y1, $r2, $y2, "D");
	$this->Line( $r1, $y1+6, $r1+$r2, $y1+6);
	$colX = $r1;
	$colonnes = $tab;
	while ( list( $lib, $pos ) = each ($tab) )
	{
		$this->SetXY( $colX, $y1+2 );
		$this->Cell( $pos, 1, $lib, 0, 0, "C");
		$colX += $pos;
		$this->Line( $colX, $y1, $colX, $y1+$y2);
	}
}

// mémorise le format (gauche, centre, droite) d'une colonne
function addLineFormat( $tab )
{
	global $format, $colonnes;
	
	while ( list( $lib, $pos ) = each ($colonnes) )
	{
		if ( isset( $tab["$lib"] ) )
			$format[ $lib ] = $tab["$lib"];
	}
}

function lineVert( $tab )
{
	global $colonnes;

	reset( $colonnes );
	$maxSize=0;
	while ( list( $lib, $pos ) = each ($colonnes) )
	{
		$texte = $tab[ $lib ];
		$longCell  = $pos -2;
		$size = $this->sizeOfText( $texte, $longCell );
		if ($size > $maxSize)
			$maxSize = $size;
	}
	return $maxSize;
}

// Affiche chaque "ligne" d'un devis / facture

function addLine( $ligne, $tab )
{
	global $colonnes, $format;

	$ordonnee     = 10;
	$maxSize      = $ligne;

	reset( $colonnes );
	while ( list( $lib, $pos ) = each ($colonnes) )
	{
		$longCell  = $pos -2;
		$texte     = $tab[ $lib ];
		$length    = $this->GetStringWidth( $texte );
		$tailleTexte = $this->sizeOfText( $texte, $length );
		$formText  = $format[ $lib ];
		$this->SetXY( $ordonnee, $ligne-1);
		$this->MultiCell( $longCell, 4 , $texte, 0, $formText);
		if ( $maxSize < ($this->GetY()  ) )
			$maxSize = $this->GetY() ;
		$ordonnee += $pos;
	}
	return ( $maxSize - $ligne );
}

// Ajoute une remarque (en bas, a gauche)
function addRemarque($remarque)
{
	$this->SetFont( "Arial", "", 10);
	$length = $this->GetStringWidth( "Remarque : " . $remarque );
	$r1  = 10;
	$r2  = $r1 + $length;
	$y1  = $this->h - 45.5;
	$y2  = $y1+5;
	$this->SetXY( $r1 , $y1 );
	$this->Cell($length,4, "Remarque : " . $remarque);
}

// trace le cadre des TVA
function addCadreTVAs()
{
	$this->SetFont( "Arial", "B", 8);
	$r1  = 10;
	$r2  = $r1 + 120;
	$y1  = $this->h - 40;
	$y2  = $y1+20;
	$this->RoundedRect($r1, $y1, ($r2 - $r1), ($y2-$y1), 2.5, 'D');
	$this->Line( $r1, $y1+4, $r2, $y1+4);
	$this->Line( $r1+5,  $y1+4, $r1+5, $y2); // avant BASES HT
	$this->Line( $r1+27, $y1, $r1+27, $y2);  // avant REMISE
	$this->Line( $r1+43, $y1, $r1+43, $y2);  // avant MT TVA
	$this->Line( $r1+63, $y1, $r1+63, $y2);  // avant % TVA
	$this->Line( $r1+75, $y1, $r1+75, $y2);  // avant PORT
	$this->Line( $r1+91, $y1, $r1+91, $y2);  // avant TOTAUX
	$this->SetXY( $r1+9, $y1);
	$this->Cell(10,4, "BASES HT");
	$this->SetX( $r1+29 );
	$this->Cell(10,4, "REMISE");
	$this->SetX( $r1+48 );
	$this->Cell(10,4, "MT TVA");
	$this->SetX( $r1+63 );
	$this->Cell(10,4, "% TVA");
	$this->SetX( $r1+78 );
	$this->Cell(10,4, "PORT");
	$this->SetX( $r1+100 );
	$this->Cell(10,4, "TOTAUX");
	$this->SetFont( "Arial", "B", 6);
	$this->SetXY( $r1+93, $y2 - 8 );
	$this->Cell(6,0, "H.T.   :");
	$this->SetXY( $r1+93, $y2 - 3 );
	$this->Cell(6,0, "T.V.A. :");
}

// trace le cadre des totaux
function addCadreEurosFrancs()
{
	$r1  = $this->w - 70;
	$r2  = $r1 + 60;
	$y1  = $this->h - 40;
	$y2  = $y1+20;
	$this->RoundedRect($r1, $y1, ($r2 - $r1), ($y2-$y1), 2.5, 'D');
	$this->Line( $r1+20,  $y1, $r1+20, $y2); // avant EUROS
	$this->Line( $r1+20, $y1+4, $r2, $y1+4); // Sous Euros & Francs
	$this->Line( $r1+38,  $y1, $r1+38, $y2); // Entre Euros & Francs
	$this->SetFont( "Arial", "B", 8);

	$this->SetXY( $r1+22, $y1 );
	$this->Cell(15,4, "EUROS", 0, 0, "C");
	$this->SetFont( "Arial", "", 8);
	$this->SetXY( $r1+42, $y1 );
	$this->Cell(15,4, "FRANCS", 0, 0, "C");
	$this->SetFont( "Arial", "B", 6);
	$this->SetXY( $r1, $y1+5 );
	$this->Cell(20,4, "TOTAL TTC", 0, 0, "C");
	$this->SetXY( $r1, $y1+10 );
	$this->Cell(20,4, "ACOMPTE", 0, 0, "C");
	$this->SetXY( $r1, $y1+15 );
	$this->Cell(20,4, "NET A PAYER", 0, 0, "C");
}

function addTVAs( $params, $tab_tva, $invoice )
{
	$this->SetFont('Arial','',8);
	
	reset ($invoice);
	$px = array();
	while ( list( $k, $prod) = each( $invoice ) )
	{
		$tva = $prod["tva"];
		@ $px[$tva] += $prod["qte"] * $prod["px_unit"];
	}

	$prix     = array();
	$totalHT  = 0;
	$timbre   = 0;
	$totalTTC = 0;
	$totalTVA = 0;
	$y = 261;
	reset ($px);
	natsort( $px );
	while ( list($code_tva, $articleHT) = each( $px ) )
	{
		$tva = $tab_tva[$code_tva];
		$this->SetXY(17, $y);
		$this->Cell( 19,4, sprintf("%0.2F", $articleHT),'', '','R' );
		if ( $params["RemiseGlobale"]==1 )
		{
			if ( $params["remise_tva"] == $code_tva )
			{
				$this->SetXY( 37.5, $y );
				if ($params["remise"] > 0 )
				{
					if ( is_int( $params["remise"] ) )
						$l_remise = $param["remise"];
					else
						$l_remise = sprintf ("%0.2F", $params["remise"]);
					$this->Cell( 14.5,4, $l_remise, '', '', 'R' );
					$articleHT -= $params["remise"];
				}
				else if ( $params["remise_percent"] > 0 )
				{
					$rp = $params["remise_percent"];
					if ( $rp > 1 )
						$rp /= 100;
					$rabais = $articleHT * $rp;
					$articleHT -= $rabais;
					if ( is_int($rabais) )
						$l_remise = $rabais;
					else
						$l_remise = sprintf ("%0.2F", $rabais);
					$this->Cell( 14.5,4, $l_remise, '', '', 'R' );
				}
				else
					$this->Cell( 14.5,4, "ErrorRem", '', '', 'R' );
			}
		}
		$totalHT += $articleHT;
		$totalTTC += $articleHT * ( 1 + $tva/100 );
		$tmp_tva = $articleHT * $tva/100;
		$a_tva[ $code_tva ] = $tmp_tva;
		$totalTVA += $tmp_tva;
		$this->SetXY(11, $y);
		$this->Cell( 5,4, $code_tva);
		$this->SetXY(53, $y);
		$this->Cell( 19,4, sprintf("%0.2F",$tmp_tva),'', '' ,'R');
		$this->SetXY(74, $y);
		$this->Cell( 10,4, sprintf("%0.2F",$tva) ,'', '', 'R');
		$y+=4;
	}

	if ( $params["FraisPort"] == 1 )
	{
		if ( $params["portTTC"] > 0 )
		{
			$pTTC = sprintf("%0.2F", $params["portTTC"]);
			$pHT  = sprintf("%0.2F", $pTTC / 1.196);
			$pTVA = sprintf("%0.2F", $pHT * 0.196);
			$this->SetFont('Arial','',6);
			$this->SetXY(85, 261 );
			$this->Cell( 6 ,4, "HT : ", '', '', '');
			$this->SetXY(92, 261 );
			$this->Cell( 9 ,4, $pHT, '', '', 'R');
			$this->SetXY(85, 265 );
			$this->Cell( 6 ,4, "TVA : ", '', '', '');
			$this->SetXY(92, 265 );
			$this->Cell( 9 ,4, $pTVA, '', '', 'R');
			$this->SetXY(85, 269 );
			$this->Cell( 6 ,4, "TTC : ", '', '', '');
			$this->SetXY(92, 269 );
			$this->Cell( 9 ,4, $pTTC, '', '', 'R');
			$this->SetFont('Arial','',8);
			$totalHT += $pHT;
			$totalTVA += $pTVA;
			$totalTTC += $pTTC;
		}
		else if ( $params["portHT"] > 0 )
		{
			$pHT  = sprintf("%0.2F", $params["portHT"]);
			$pTVA = sprintf("%0.2F", $params["portTVA"] * $pHT / 100 );
			$pTTC = sprintf("%0.2F", $pHT + $pTVA);
			$this->SetFont('Arial','',6);
			$this->SetXY(85, 261 );
			$this->Cell( 6 ,4, "HT : ", '', '', '');
			$this->SetXY(92, 261 );
			$this->Cell( 9 ,4, $pHT, '', '', 'R');
			$this->SetXY(85, 265 );
			$this->Cell( 6 ,4, "TVA : ", '', '', '');
			$this->SetXY(92, 265 );
			$this->Cell( 9 ,4, $pTVA, '', '', 'R');
			$this->SetXY(85, 269 );
			$this->Cell( 6 ,4, "TTC : ", '', '', '');
			$this->SetXY(92, 269 );
			$this->Cell( 9 ,4, $pTTC, '', '', 'R');
			$this->SetFont('Arial','',8);
			$totalHT += $pHT;
			$totalTVA += $pTVA;
			$totalTTC += $pTTC;
		}
	}

	$this->SetXY(114,266.4);
	$this->Cell(15,4, sprintf("%0.2F", $totalHT), '', '', 'R' );
	$this->SetXY(114,271.4);
	$this->Cell(15,4, sprintf("%0.2F", $totalTVA), '', '', 'R' );

	$params["totalHT"] = $totalHT;
	$params["TVA"] = $totalTVA;
	$accompteTTC=0;
	if ( $params["AccompteExige"] == 1 )
	{
		if ( $params["accompte"] > 0 )
		{
			$accompteTTC=sprintf ("%.2F", $params["accompte"]);
			if ( strlen ($params["Remarque"]) == 0 )
				$this->addRemarque( "Accompte de $accompteTTC Euros exigé à la commande.");
			else
				$this->addRemarque( $params["Remarque"] );
		}
		else if ( $params["accompte_percent"] > 0 )
		{
			$percent = $params["accompte_percent"];
			if ( $percent > 1 )
				$percent /= 100;
			$accompteTTC=sprintf("%.2F", $totalTTC * $percent);
			$percent100 = $percent * 100;
			if ( strlen ($params["Remarque"]) == 0 )
				$this->addRemarque( "Accompte de $percent100 % (soit $accompteTTC Euros) exigé à la commande." );
			else
				$this->addRemarque( $params["Remarque"] );
		}
		else
			$this->addRemarque( "Drôle d'acompte !!! " . $params["Remarque"]);
	}
	else
	{
		if ( strlen ($params["Remarque"]) > 0 )
			$this->addRemarque( $params["Remarque"] );
	}
	$re  = $this->w - 50;
	$rf  = $this->w - 29;
	$y1  = $this->h - 40;
	$this->SetFont( "Arial", "", 8);
	$this->SetXY( $re, $y1+5 );
	$this->Cell( 17,4, sprintf("%0.2F", $totalTTC), '', '', 'R');
	$this->SetXY( $re, $y1+10 );
	$this->Cell( 17,4, sprintf("%0.2F", $accompteTTC), '', '', 'R');
	$this->SetXY( $re, $y1+14.8 );
	$this->Cell( 17,4, sprintf("%0.2F", $totalTTC - $accompteTTC), '', '', 'R');
	$this->SetXY( $rf, $y1+5 );
	$this->Cell( 17,4, sprintf("%0.2F", $totalTTC * EURO_VAL), '', '', 'R');
	$this->SetXY( $rf, $y1+10 );
	$this->Cell( 17,4, sprintf("%0.2F", $accompteTTC * EURO_VAL), '', '', 'R');
	$this->SetXY( $rf, $y1+14.8 );
	$this->Cell( 17,4, sprintf("%0.2F", ($totalTTC - $accompteTTC) * EURO_VAL), '', '', 'R');
}

// Permet de rajouter un commentaire (Devis temporaire, REGLE, DUPLICATA, ...)
// en sous-impression
// ATTENTION: APPELER CETTE FONCTION EN PREMIER
function temporaire( $texte )
{
	$this->SetFont('Arial','B',50);
	$this->SetTextColor(203,203,203);
	$this->Rotate(45,55,190);
	$this->Text(55,190,$texte);
	$this->Rotate(0);
	$this->SetTextColor(0,0,0);
}


//-------------BEGIN--------------- PARAMETRES TABLEAU--------------------------

var $widths;
var $aligns;

function SetWidths($w)
{
	//Tableau des largeurs de colonnes
	$this->widths=$w;
}

function SetAligns($a)
{
	//Tableau des alignements de colonnes
	$this->aligns=$a;
}

function RowHead($data)
{
	//Calcule la hauteur de la ligne
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=12;
	//Effectue un saut de page si nécessaire
	$this->CheckPageBreak($h);
	//Dessine les cellules
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		if($i==0){
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		} else{
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
		}
		
		//Sauve la position courante
		$x=$this->GetX();
		$y=$this->GetY();
		//Dessine le cadre
		//$this->Rect($x,$y,$w,$h);
		$this->Rect($x,$y,$w,0);
		//Imprime le texte
		$this->SetFont('Arial','B',7);
		$this->MultiCell($w,6,$data[$i],0,$a);
		//Repositionne à droite
		$this->SetXY($x+$w,$y);
	}
	//Va à la ligne
	$this->Ln($h);
}

function RowHeadBase($data)
{
	//Calcule la hauteur de la ligne
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Effectue un saut de page si nécessaire
	$this->CheckPageBreak($h);
	//Dessine les cellules
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
		//Sauve la position courante
		$x=$this->GetX();
		$y=$this->GetY();
		//Dessine le cadre
		$this->Rect($x,$y,$w,$h);
		//Imprime le texte
		$this->SetFont('Arial','B',11);
		$this->MultiCell($w,6,$data[$i],0,$a);
		//Repositionne à droite
		$this->SetXY($x+$w,$y);
	}
	//Va à la ligne
	$this->Ln($h);
}


function Row($data)
{
	//Calcule la hauteur de la ligne
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		
		if($nb>4){
			$h=3 * $nb;
		} else{
			$h=10;
		}

	//Effectue un saut de page si nécessaire
	$this->CheckPageBreak($h);
	//Dessine les cellules
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i]; 
		
		if($i==0){
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		}				
		else{
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
		}
		//Sauve la position courante
		$x=$this->GetX();
		$y=$this->GetY();
		//Dessine le cadre
		//$this->Rect($x,$y,$w,$h);
		$this->Rect($x,$y,$w,0);
		//Imprime le texte
		$this->SetFont('Arial','',6);
		$this->MultiCell($w,4,$data[$i],0,$a);
		//Repositionne à droite
		$this->SetXY($x+$w,$y);
	}
	//Va à la ligne
	$this->Ln($h);
}

function Row1($data)
{
	//Calcule la hauteur de la ligne
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		
		if($nb>4){
			$h=3 * $nb;
		} else{
			$h=10;
		}

	//Effectue un saut de page si nécessaire
	$this->CheckPageBreak($h);
	//Dessine les cellules
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i]; 
		
		if($i==0){
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
		}				
		else{
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
		}
		//Sauve la position courante
		$x=$this->GetX();
		$y=$this->GetY();
		//Dessine le cadre
		//$this->Rect($x,$y,$w,$h);
		$this->Rect($x,$y,$w,0);
		//Imprime le texte
		$this->SetFont('Arial','B',6);
		$this->MultiCell($w,4,$data[$i],0,$a);
		//Repositionne à droite
		$this->SetXY($x+$w,$y);
	}
	//Va à la ligne
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//Si la hauteur h provoque un débordement, saut de page manuel
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Calcule le nombre de lignes qu'occupe un MultiCell de largeur w
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{
	global $titre;
	global $withEntete;
}

function Footer()
{
	// Positionnement à 1,5 cm du bas
	$this->SetY(-15);
	// Arial italique 8
	$this->SetFont('Arial','I',8);
	// Couleur du texte en gris
	$this->SetTextColor(128);
	// Numéro de page
	//$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function TitreChapitre($num, $libelle)
{
	// Arial 12
	$this->SetFont('Arial','B',12);
	// Couleur de fond
	$this->SetFillColor(200,220,255);
	// Titre
	$this->Cell(0,6,"Article $num : $libelle",0,1,'L',true);
	// Saut de ligne
	//$this->Ln(4);
}

function CorpsChapitre($fichier)
{
	// Lecture du fichier texte
	//$txt = file_get_contents($fichier);
	// Times 12
	$this->SetFont('Arial','',12);
	// Sortie du texte justifié
	$this->MultiCell(170,5,$fichier);
	// Saut de ligne
	// Mention en italique
	$this->SetFont('','I');
	//$this->Cell(0,5,"(fin du contrat)");
}

function CorpsChapitreBold($fichier)
{
	// Lecture du fichier texte
	//$txt = file_get_contents($fichier);
	// Times 12
	$this->SetFont('Arial','B',12);
	// Sortie du texte justifié
	$this->SetTextColor(0, 0, 0);
	$this->MultiCell(250,5,$fichier);
	// Saut de ligne
	//$this->Ln();
	// Mention en italique
	$this->SetFont('','I');
	//$this->Cell(0,5,"(fin du contrat)");
}

function CorpsChapitreSousTitre($fichier, $resultat)
{
	$this->SetFont('Arial','B',12);
	$this->SetTextColor(0, 0, 0);
	$this->MultiCell(100,0,$fichier);
	
	$this->SetFont('Arial','',9);
	$this->SetTextColor(0, 0, 0);
	$this->MultiCell(190,1, "                                          ".$resultat);
	
	$this->SetFont('','I');
	$this->Ln(5);
}



function CorpsChapitreBoldTailleCouleur($fichier, $taille, $redColor, $greenColor, $blueColor)
{
	// Lecture du fichier texte
	//$txt = file_get_contents($fichier);
	// Times 12
	$this->SetFont('Arial','B',$taille);
	$this->SetTextColor($redColor, $greenColor, $blueColor);
	// Sortie du texte justifié
	$this->MultiCell(110,10,$fichier);
	// Saut de ligne
	$this->Ln();
	// Mention en italique
	$this->SetFont('','I');
}


function CorpsChapitreTitreDOCUMENT($fichier, $taille)
{
	// Lecture du fichier texte
	//$txt = file_get_contents($fichier);
	// Times 12
	$this->SetFont('Arial','B',$taille);
	$this->SetTextColor(0,80,180);
	// Sortie du texte justifié
	$this->Ln();
	$this->MultiCell(200,10,$fichier);
	// Saut de ligne
	$this->Ln();
	// Mention en italique
	$this->SetFont('','I');
	//$this->Cell(0,5,"(fin du contrat)");
}

function CorpsChapitreParametrer($fichier, $taille, $police, $style, $redColor, $greenColor, $blueColor)
{
	// Lecture du fichier texte
	//$txt = file_get_contents($fichier);
	// Times 12
	$this->SetFont($police,$style,$taille);
	$this->SetTextColor($redColor, $greenColor, $blueColor);
	// Sortie du texte justifié
	$this->MultiCell(190,5,$fichier);
	// Mention en italique
	$this->SetFont('','I');
	//$this->Cell(0,5,"(fin du contrat)");
}



function AjouterChapitre($num, $titre, $contenu)
{
	//$this->AddPage();
	$this->TitreChapitre($num,$titre);
	$this->CorpsChapitre($contenu);
}

function AjouterPage()
{
	$this->AddPage();
}


}	
	
if(!isset($_SESSION['delta_MAILUSER'])){
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../index.php" </SCRIPT>';
	exit;
}	
	



$id = $_GET['ID'];
$withEntete = 0;

if(isset($_GET['ent'])){
	if(is_numeric($_GET['ent'])){
		$withEntete = $_GET['ent'];
	}
}


$pdf = new PDF();
$pdf->SetFont('Arial', '', 12);
$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->SetAuthor('POLY COMPOSITE');
$pdf->AddPage();

//$pdf->Image('../assets/entete.png', -2, -3, 220 , 0, 'PNG');
//$pdf->Image('../assets/pied.png', 0, 276, 210 , 0, 'PNG');


$id					=	$_GET['ID'];


$req="select * from delta_clients where id=".$id;	
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
		$id					=	$enreg["id"] ;	
		$date				=	date("d/m/Y" );	
		$raison_social		= 	$enreg["raison_social"] ; 
	
}
	$raison_social = stripslashes($raison_social);
	$raison_social = iconv('UTF-8', 'windows-1252', $raison_social);

	$pdf->fact_dev( "Liste des clients" );
	$pdf->Ln();$pdf->Ln();$pdf->Ln();
		
	// $pdf->addDate( $date );
	// $pdf->addPageNumber("1");
	// if($client<>""){
	// 	$pdf->addClientAdresse($client,$tel,$adresse,$trimestre);
	// }

$total_tt=0;
$total=0;$tot_qte=0;
$pdf->SetWidths(array(60,20,20,30,30,30));
srand(microtime()*1000000);
$pdf->Ln();$pdf->Ln();
$des="";
$pdf->RowHead(array(("R.Social"),("M.Fiscale"),("R. de commerce"),("tel"),("adresse"),("mail")));
	$article="";
	$req="select * from delta_clients where id=".$id;
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		$id				                =	$enreg["id"] ;	
		$raison_social				    =	$enreg["raison_social"] ;
		$matricule_fiscale				=	$enreg["matricule_fiscale"] ;
		$registre_commerce			    =	$enreg["registre_commerce"] ;
		$tel				            =	$enreg["tel"] ;
		$adresse			            =	$enreg["adresse"] ;
		$mail			            	=	$enreg["mail"] ;


		
		
		$pdf->SetFont('Arial','', 10); // Font Name, Font Style (eg. 'B' for Bold), Font Size
		$pdf->Row(array(utf8_decode($raison_social),($matricule_fiscale),($registre_commerce),($tel),($adresse),($mail)));		
		
		
	}
$pdf->SetWidths(array(60,20,20,30,30,30));
srand(microtime()*1000000);
$pdf->Ln();$pdf->Ln();

	$pdf->SetFont('Arial','B', 10); // Font Name, Font Style (eg. 'B' for Bold), Font Size
	// $pdf->RowHead(array(utf8_decode(''),(''),('TOTAL'),number_format($total,'3','.',''),'',number_format($total_tt,'3','.','')));		


$filename=$raison_social."_fiche_client.pdf";
$pdf->Output($filename, 'I');
	

	
	


?>