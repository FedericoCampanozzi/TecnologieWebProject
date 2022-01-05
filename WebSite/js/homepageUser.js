$(document).ready(function() {
    $(".add-product").click(function() {
        const id_parts = $(this).attr("id").split("_");
        $.post("utils/insert.php", {
            obj_to_insert: "rc_usr_hp",
            product_id: document.getElementById("IdProdtto_" + id_parts[1]).value
        }, function(response) {
            console.log("Response: " + response);
        });
    });
});