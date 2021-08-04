function sort() {
    showExceptions = document.querySelector('input[name="exception"]')
    if (showExceptions.checked) {
        exceptions = true // если нажат чекбокс "показать исключения"
    } else {
        exceptions = false
    }
    // Сортировка по дате
    let date = document.querySelector('input[name="date-filter"]')
    dateValue = date.value
    $.ajax({
        type: "post",
        url: "filter/date/date.php",
        data: { "date": dateValue },
        success: function(result) {
            $(".workers-data .wrapper").empty().append(result);

            hideElem = document.getElementsByClassName('all-workers') //Все строки таблицы
                // Если выбрана сортировка по смене
            if (smenaSelected.length != 0) {
                smena = document.getElementsByClassName("smena")
                for (let item of smenaSelected) {
                    // Подходящий по смене элемент
                    let smenaNum = document.getElementsByClassName(item)
                    for (let i = 0; i < smenaNum.length; i++) {
                        smenaNum[i].classList.remove('smena-false');
                        smenaNum[i].classList.add('smena-true');
                    }
                }
                // Перебор массива, подстановка нового класса
                for (let i = 0; i < hideElem.length; i += 1) {
                    // по умолчанию идет smena-false
                    if (hideElem.item(i).classList.contains("smena-false") || hideElem.item(i).classList.contains("days-false")) {
                        hideElem.item(i).classList.toggle("none");
                        hideElem.item(i).setAttribute("data-exclude", "true");
                        exceptionElem = document.getElementsByClassName("exception1")
                        if (!exceptions) {
                            for (let x = 0; x < exceptionElem.length; x++) {
                                exceptionElem.item(x).classList.add("none");
                                exceptionElem.item(x).setAttribute("data-exclude", "true");
                            }
                        }
                    }

                }
            } else { //если не применен фильтр по смене
                // Перебор массива, подстановка нового класса
                for (let i = 0; i < hideElem.length; i += 1) {
                    // по умолчанию идет smena-false
                    if (hideElem.item(i).classList.contains("days-false")) {
                        hideElem.item(i).classList.toggle("none");
                        hideElem.item(i).setAttribute("data-exclude", "true");
                    }
                    if (!exceptions) {
                        exceptionElem = document.getElementsByClassName("exception1")
                        for (let x = 0; x < exceptionElem.length; x++) {
                            exceptionElem.item(x).classList.add("none");
                            exceptionElem.item(x).setAttribute("data-exclude", "true");
                        }
                    }
                }
            }
        }
    });

}