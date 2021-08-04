// вывод всех сотрудников
$.ajax({
    type: "POST",
    url: "main/all-workers/all-workers.php",
    success: function(result) {
        $(".workers-data .wrapper").append(result);
    }
});
$('.medical-workers').remove();