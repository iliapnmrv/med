// $('#upload').on('click', function() {
//     var file_data = $('#file').prop('files')[0];
//     var form_data = new FormData();
//     form_data.append('file', file_data);
//     alert(form_data);
//     $.ajax({
//         url: 'vrednosti-tab/upload/upload.php',
//         data: form_data,
//         type: 'post',
//         success: function() {

//         }
//     });
// });

function submitForm() {
    var file = new FormData(document.getElementById("ajaxfileup"));
    $.ajax({
        url: "vrednosti-tab/upload/upload.php",
        type: "POST",
        data: file,
    }).done(function(data) {
        alert(data);
        console.log("upload выполнен")

    });
    return false;
}
// $.ajax({
//     type: "POST",
//     url: "vrednosti-tab/import/import.php",
//     data: {},
//     success: function(result) {
//         console.log(result)
//     }
// });