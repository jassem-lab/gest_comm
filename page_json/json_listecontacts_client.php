<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $client   				= $_POST['client']; 
?>

<table class="table mb-0">
    <thead>
        <tr>
            <th><b>contact</b></th>
            <th><b>Email</b></th>
            <th><b>Téléphone</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
	$reqnom="select * from delta_contacts_client where client=".$client;
	$querynom=mysql_query($reqnom);
	while($enregnom=mysql_fetch_array($querynom))
	{
?>
        <tr>
            <td>
                <span id="span_nom<?php echo $enregnom['id']; ?>"> <?php echo $enregnom['nomcontact']; ?></span>
                <input style="display:none;width: 100%;" id="nomcontact<?php echo $enregnom['id']; ?>"
                    class="form-control" value="<?php echo $enregnom['nomcontact']; ?>">
            </td>
            <td>
                <span id="span_email<?php echo $enregnom['id']; ?>"> <?php echo $enregnom['email']; ?></span>
                <input style="display:none;width: 100%;" id="email<?php echo $enregnom['id']; ?>" class="form-control"
                    value="<?php echo $enregnom['email']; ?>">
            </td>
            <td>
                <span id="span_tel<?php echo $enregnom['id']; ?>"> <?php echo $enregnom['telephone']; ?></span>
                <input style="display:none;width: 70%;" id="tel<?php echo $enregnom['id']; ?>" class="form-control"
                    value="<?php echo $enregnom['telephone']; ?>">
            </td>
            <td>
                <a id="btnMod<?php echo $enregnom['id']; ?>" data-id="<?php echo $enregnom['id']; ?>"
                    class="btn btn-sm btn-warning waves-effect waves-light btnModif">
                    <span class="far fa-edit"></span>
                </a>
                <a style="display:none" id="btnModif2<?php echo $enregnom['id']; ?>"
                    data-id="<?php echo $enregnom['id']; ?>"
                    class="btn btn-sm btn-warning waves-effect waves-light btnModif1">
                    Enregistrer
                </a>
                <a id="<?php echo $enregnom['id']; ?>" class="btn btn-sm btn-danger waves-effect waves-light btnDelete">
                    <span class="far fa-trash-alt"></span>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
$(".btnModif").on("click", function() {
    var id = $(this).data('id');
    $("#span_email" + id).hide();
    $("#email" + id).show();

    $("#span_nom" + id).hide();
    $("#nomcontact" + id).show();

    $("#span_tel" + id).hide();
    $("#tel" + id).show();

    $("#btnMod" + id).hide();
    $("#btnModif2" + id).show();
});


$(".btnModif1").on("click", function() {
    var id = $(this).data('id');
    var client = <?php echo $_POST['client']; ?>;
    var email = $("#email" + id).val();
    var tel = $("#tel" + id).val();
    var nomcontact = $("#nomcontact" + id).val();

    if (confirm('Confirmez-vous la modification?')) {
        var variable = "id=" + id + "&email=" + email + "&tel=" + tel + "&nomcontact=" + nomcontact;
        $.post("page_ajax/ajax_modifier_contactclient.php", variable, function(data, status) {
            if (status == "success") {
                if (window.XMLHttpRequest) {
                    xmlhttp_listemps = new XMLHttpRequest();
                } else {
                    xmlhttp_listemps = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp_listemps.onreadystatechange = function() {

                    if (xmlhttp_listemps.status == 200 && xmlhttp_listemps.readyState == 4) {

                        $('#listeCONTACT' + client).html(xmlhttp_listemps.responseText);
                    }
                }
                xmlhttp_listemps.open("POST", "page_json/json_listecontacts_client.php", true);
                xmlhttp_listemps.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp_listemps.send("client=" + client);
            }
        }, 'json');
        $('.page-loader-wrapper').removeClass("show");
    }

});

$(".btnDelete").on("click", function() {
    var id = $(this).attr('id');
    var client = <?php echo $_POST['client']; ?>;

    if (confirm('Confirmez-vous la suppression?')) {
        var variable = "id=" + id;
        $.post("page_ajax/ajax_supprimer_contactclient.php", variable, function(data, status) {
            if (status == "success") {
                if (window.XMLHttpRequest) {
                    xmlhttp_listemps = new XMLHttpRequest();
                } else {
                    xmlhttp_listemps = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp_listemps.onreadystatechange = function() {

                    if (xmlhttp_listemps.status == 200 && xmlhttp_listemps.readyState == 4) {

                        $('#listeCONTACT' + client).html(xmlhttp_listemps.responseText);
                    }
                }
                xmlhttp_listemps.open("POST", "page_json/json_listecontacts_client.php", true);
                xmlhttp_listemps.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp_listemps.send("client=" + client);
            }
        }, 'json');
        $('.page-loader-wrapper').removeClass("show");
    }
});
</script>