function val(val, id) {
    $.ajax({
        type: "post",
        url: "vrednosti/add/add.php",
        data: {
            "vred": val,
            "id": id
        },
        success: function(result) {
            $("#user-message").empty().append(result);
        }
    });
}