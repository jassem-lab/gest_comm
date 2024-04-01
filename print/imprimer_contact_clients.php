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
			$reqActivite		=	" and  activite like '%".$activite."%'";
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
    $reqNature="";
    $nature="";
    if(isset($_GET['nature'])){
        if(is_numeric($_GET['nature'])){
            $nature		=	$_GET['nature'];
            $reqNature		=	" and  nature=".$nature;
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
        <h1>Liste des Contacts Clients</h1>
        <table class="table mb-0" width="100%">
            <tr>
                <th><b>Nom de contact</b></th>
                <th><b>Téléphone</b></th>
                <th><b>Email</b></th>
            </tr>
            <tbody>

                <?php
	 $req = "select * from delta_clients where 1=1 ".$reqNature.$reqClient.$reqActivite.$reqZone.$reqRegion; 
	$query=mysql_query($req);
	while($enreg=mysql_fetch_array($query))
	{
		
           $reqC ="select * from delta_contacts_client where client =".$enreg["id"]; 
           $queryC = mysql_query($reqC) ; 
           while($enregC = mysql_fetch_array($queryC)){
            $nomcontact      = $enregC["nomcontact"] ; 
            $telephone       = $enregC["telephone"] ; 
            $email           = $enregC["email"] ; 
        

?>

                <tr >
                    <td scope="row" style=""><?php echo $nomcontact?></td>
                    <td scope="row" style=""><?php echo $telephone?></td>
                    <td scope="row" style=""><?php echo $email?></td>


                </tr>
                <?php   } }  ?>

            </tbody>
        </table>
    </div><br>
    <a id="print" href="" onclick="printdiv('div');" class="btn btn-info m-5" style="">Imprimer</a>
</body>