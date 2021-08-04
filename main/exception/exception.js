function exception(id, exception) {
    //передается таб.номер который нужно изменить и его наличие в исключениях
    // когда нажимается на checkbox, дается значение по умолчанию
    if (exception == 1) {
        act = "delete" //в случае true удаляет пользователя
    } else {
        act = "add" //в случае false добавляет пользователя
    }
    let elem = document.getElementsByName(id)
    i = elem[0]
    $.ajax({
        type: "post",
        url: "main/exception/exception.php",
        data: {
            id: id,
            checked: act
        },
        success: function(result) {
            $("#user-message").empty().append(result);
            i.setAttribute("onclick", 'exception(' + '"' + id + '"' + ', ' + !exception + ')')
        }
    });
}