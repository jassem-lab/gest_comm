<?php
$nature		        =	"" ;

$req="select * from delta_nature_prd where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $nature	        =	$enreg["nature"] ;
}
?>


<div class="col-xl-12">
    <div class="col-xl-12 row">
        <div class="col-xl-6">
            <b class="col-lg-12 m-3" style="color : red">Liste des Natures Produits</b>
        </div>
        <div class="col-xl-3"></div>

    </div>
    <table class="table mb-0">
        <thead class="thead-default">
            <tr>
                <th style="  text-decoration: underline; font-size : 18px ; ">Désignation</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $reqFP ="select * from delta_nature_prd"; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
            <tr>
                <td><?php echo $enreg["nature"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>