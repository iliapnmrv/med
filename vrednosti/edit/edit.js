// let vred = document.getElementsByClassName("vredWrap")

function edit(id, num) {
    // num - строка элемента
    let i = num - 1
        // содержимое элемента
    let vred = document.getElementsByClassName("vred")[i]
        // кнопка редактирования
    let vredEdit = document.getElementsByClassName("vred-edit")[i]
        // выпадающий список
    let options = document.getElementsByClassName('vredSelect')[i]
        // Задержка, чтобы успели определиться элементы vred, vredEdit, options
    setTimeout(func, 300);

    function func() {
        vred.classList.toggle("none")
        vredEdit.classList.toggle("none")
        $.ajax({
            type: "post",
            url: "vrednosti/add/select.php",
            data: {},
            success: function(result) {
                $(options).append(result);
                $(options).select2({
                    allowClear: true,
                    placeholder: "Выберите вредность"
                });
            }
        });
    }

    $.ajax({
        type: "post",
        url: "vrednosti/edit/edit.php",
        data: {
            "id": id,
        },
        success: function(result) {
            $("#user-message").empty().append(result);
        }
    })
}