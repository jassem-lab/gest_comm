<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Gestion commerciale</title>
<!-- InstanceEndEditable -->
<meta content="Admin Dashboard" name="description" />
<meta content="Themesbrand" name="author" />
<link rel="shortcut icon" href="assets/images/favicon.ico">

<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<style>

</style>

<body style="background-color:#fff">
    <?php
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
            $reqActivite	    	=	" and  activite like '%".$activite."%'";
		}
	}

	$reqRegion="";
	$region="";
	if(isset($_GET['region'])){
		if(is_numeric($_GET['region'])){
			$region				=	$_GET['region'];
			$reqRegion			=	" and  zone=".$region;
		}
	}

	$reqZone="";
	$zone="";
	if(isset($_GET['zone'])){
		if(is_numeric($_GET['zone'])){
			$zone				=	$_GET['zone'];
			$reqZone			=	" and  region=".$zone;
		}
	}
?>
    <script language="javascript">
    function printdiv(printpage) {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
    </script>

    <div class="table-responsive" id="div">
        <h1>Liste des Fournisseurs</h1>
        <table class="table mb-0" width="100%">
            <tr>
                <th><b>Code</b></th>
                <th><b>Raison Sociale</b></th>
                <th><b style="color:red">MF</b></th>
                <th><b style="color:green">RC</b></th>
                <th><b>Activité</b></th>
                <th><b>Email</b></th>
                <th><b>Telephone</b></th>
                <th><b>Pays</b></th>
                <th><b>Region</b></th>
                <th><b>Zone</b></th>
                <th><b style="color:brown">banque</b></th>
                <th><b style="color:blue">RIB</b></th>

            </tr>
            <tbody>

                <?php
                $req = "select * from delta_fournisseurs where 1=1 ".$reqClient.$reqActivite.$reqZone.$reqRegion; 
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
         
            $reqP = "select * from delta_pays where id=".$enreg["pays"] ; 
            $queryP = mysql_query($reqP) ; 
            while($enregP = mysql_fetch_array($queryP)){
                $pays = $enregP["designation"] ; 
            }
            $reqR = "select * from delta_zones where id=".$enreg["zone"] ; 
            $queryR = mysql_query($reqR) ; 
            while($enregR = mysql_fetch_array($queryR)){
                $zone = $enregR["designation"] ; 
            }
            $reqZ = "select * from delta_regions where id=".$enreg["region"] ; 
            $queryZ = mysql_query($reqZ) ; 
            while($enregZ = mysql_fetch_array($queryZ)){
                $region = $enregZ["designation"] ; 
            }
           

?>

                <tr>
                    <td scope="row" style=""><?php echo $enreg["code"];?></td>
                    <td scope="row" style=""><?php echo $enreg["raison_social"];?></td>
                    <td scope="row" style=" color:red"><?php echo $enreg["matricule_fiscale"];?></td>
                    <td scope="row" style=" color:green"><?php echo $enreg["registre_commerce"];?></td>
                    <td scope="row" style=""><?php echo $enreg["activite"];?></td>
                    <td scope="row" style=""><?php echo $enreg["mail"];?></td>
                    <td scope="row" style=""><?php echo $enreg["tel"];?></td>
                    <td scope="row" style=""><?php echo $pays;?></td>
                    <td scope="row" style=""><?php echo $region;?></td>
                    <td scope="row" style=""><?php echo $zone;?></td>
                    <td scope="row" style=" color:brown"><?php  $reqB = "select * from delta_banques where id=".$enreg["banque"] ; 
            $queryB = mysql_query($reqB) ; 
            while($enregB = mysql_fetch_array($queryB)){
                echo $enregB["designation"] ; 
            } ;?></td>
                    <td scope="row" style=" color:blue"><?php echo $enreg["rib"];?></td>
                    <!-- <td scope="row" style="text-align:center; color:orange">
                        <?php if($enreg["fodec"]==1){ ?>
                        Oui
                        <?php } else{ ?>
                        Non
                        <?php } ?>
                    </td> -->

                </tr>
                <?php }  ?>

            </tbody>
        </table>
    </div><br>
    <a id="print" href="" onclick="printdiv('div');" class="btn btn-info m-5" style="">Imprimer</a>
</body>