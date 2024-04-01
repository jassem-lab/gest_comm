<?php
    session_start();
    include('../connexion/cn.php'); 
    $commercial    =  $_POST['commercial'];

?>
<table class="table mb-0">
    <thead class="thead-default">
        <tr>
            <th style="  text-decoration: underline; font-size : 18px ; ">Code</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">Nom & Prénom</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">Téléphone</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">Email</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">Adresse</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">Permis</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">CIN</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">RIB</th>
            <th style="  text-decoration: underline; font-size : 18px ; ">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $reqFP ="select * from delta_commerciaux where concat(nom, ' ' , prenom) like '%".$commercial."%' order by nom, prenom" ; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){

            ?>
        <tr>
            <td><?php echo $enreg["code"] ?></td>
            <td><?php echo $enreg["nom"]?> <?php echo $enreg["prenom"] ?></td>
            <td><?php echo $enreg["tel"]?> </td>
            <td><?php echo $enreg["email"]?> </td>
            <td><?php echo $enreg["adresse"]?> </td>
            <td><?php echo $enreg["permis"]?> </td>
            <td><?php echo $enreg["CIN"]?> </td>
            <td><?php echo $enreg["RIB"]?> </td>
            <td><a type="button" href="tabs.php?IDCC=<?php echo $enreg["id"] ?>&suc=15"
                    class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                    href="Javascript:SupprimerCommerciaux('<?php echo $enreg["id"]; ?>')"
                    class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>