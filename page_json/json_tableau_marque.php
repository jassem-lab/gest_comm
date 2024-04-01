<?php
    session_start();
    include('../connexion/cn.php'); 
    $marque    =  $_POST['marque'];

?>
<table class="table mb-0">
    <thead class="thead-default">
        <tr>
            <th>Code</th>
            <th>Designation</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php 
            $reqFP ="select * from delta_marques where 1=1 and designation like '".$marque."%' order by designation" ; 
            $queryFP = mysql_query($reqFP); 
            while($enreg=mysql_fetch_array($queryFP)){
            ?>
        <tr>
            <td><?php echo $enreg["code"] ?></td>
            <td><?php echo $enreg["designation"]?></td>
            <td><a type="button" href="tabs.php?ID=<?php echo $enreg["id"] ?>"
                    class="btn btn-warning waves-effect waves-light">Modifier</a> <a
                    href="Javascript:SupprimerFP('<?php echo $enreg["id"]; ?>')"
                    class="btn btn-danger waves-effect waves-light" style="background-color:brown">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>