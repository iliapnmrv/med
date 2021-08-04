function dateChange(date, id) {
    let elem = document.getElementById(id)
    $.ajax({
        type: "post",
        url: "main/reset-date/reset-date.php",
        data: {
            "dateValue": date,
            "id": id
        },
        success: function(res) {
            elem.parentNode.nextElementSibling.innerHTML = res
        }
    });

}