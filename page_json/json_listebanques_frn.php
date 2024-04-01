<?php
	session_start(); 
	include('../connexion/cn.php');  
 
    $client   				= $_POST['client']; 
?>

<table class="table mb-0">
    <thead>
        <tr>
            <th><b>Banque</b></th>
            <th><b>RIB</b></th>
            <th><b>SWIFT</b></th>
            <th><b>IBAN</b></th>
            <th><b>Action</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
	$reqnom="select * from delta_banque_fournisseur where client=".$client;
	$querynom=mysql_query($reqnom);
	while($enregnom=mysql_fetch_array($querynom))
	{
?>
        <tr>
            <td>
                <span id="span_banque<?php echo $enregnom['id']; ?>"> <?php echo $enregnom['banque']; ?></span>
                <input style="display:none;width: 100%;" id="banque<?php echo $enregnom['id']; ?>" class="form-control"
                    value="<?php echo $enregnom['banque']; ?>">
            </td>
            <td>
                <span id="span_rib<?php echo $enregnom['id']; ?>"> <?php echo $enregnom['rib']; ?></span>
                <input style="display:none;width: 100%;" id="rib<?php echo $enregnom['id']; ?>" class="form-control"
                    value="<?php echo $enregnom['rib']; ?>">
            </td>
            <td>
                <span id="span_iban<?php echo $enregnom['id']; ?>"> <?php echo $enregnom['iban']; ?></span>
                <input style="display:none;width: 70%;" id="iban<?php echo $enregnom['id']; ?>" class="form-control"
                    value="<?php echo $enregnom['iban']; ?>">
            </td>
            <td>
                <span id="span_swift<?php echo $enregnom['id']; ?>"> <?php echo $enregnom['swift']; ?></span>
                <input style="display:none;width: 70%;" id="swift<?php echo $enregnom['id']; ?>" class="form-control"
                    value="<?php echo $enregnom['swift']; ?>">
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
                <a id="<?php echo $enregnom['id']; ?>" class="btn bt&n-sm btn-danger waves-effect waves-light btnDelete">
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

    $("#span_banque" + id).hide();
    $("#banque" + id).show();

    $("#span_rib" + id).hide();
    $("#rib" + id).show();

    $("#span_iban" + id).hide();
    $("#iban" + id).show();

    $("#span_swift" + id).hide();
    $("#swift" + id).show();

    $("#btnMod" + id).hide();
    $("#btnModif2" + id).show();
});


$(".btnModif1").on("click", function() {
    var id = $(this).data('id');
    var client = <?php echo $_POST['client']; ?>;
    var banque = $("#banque" + id).val();
    var rib = $("#rib" + id).val();
    var iban = $("#iban" + id).val();
    var swift = $("#swift" + id).val();

    if (confirm('Confirmez-vous la modification?')) {
        var variable = "id=" + id + "&banque=" + banque + "&rib=" + rib + "&iban=" + iban + "&swift=" + swift;
        $.post("page_ajax/ajax_modifier_banquefrn.php", variable, function(data, status) {
            if (status == "success") {
                if (window.XMLHttpRequest) {
                    xmlhttp_listemps = new XMLHttpRequest();
                } else {
                    xmlhttp_listemps = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp_listemps.onreadystatechange = function() {

                    if (xmlhttp_listemps.status == 200 && xmlhttp_listemps.readyState == 4) {

                        $('#listeBANQUE' + client).html(xmlhttp_listemps.responseText);
                    }
                }
                xmlhttp_listemps.open("POST", "page_json/json_listebanques_frn.php", true);
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
        $.post("page_ajax/ajax_supprimer_banquefrn.php", variable, function(data, status) {
            if (status == "success") {
                if (window.XMLHttpRequest) {
                    xmlhttp_listemps = new XMLHttpRequest();
                } else {
                    xmlhttp_listemps = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp_listemps.onreadystatechange = function() {

                    if (xmlhttp_listemps.status == 200 && xmlhttp_listemps.readyState == 4) {

                        $('#listeBANQUE' + client).html(xmlhttp_listemps.responseText);
                    }
                }
                xmlhttp_listemps.open("POST", "page_json/json_listebanques_frn.php", true);
                xmlhttp_listemps.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp_listemps.send("client=" + client);
            }
        }, 'json');
        $('.page-loader-wrapper').removeClass("show");
    }
});
</script>