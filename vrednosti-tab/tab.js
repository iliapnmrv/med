let tab = document.getElementById("vrednosti-tab")
$.ajax({
    type: "method",
    url: "vrednosti-tab/tab.php",
    data: "data",
    success: function(res) {
        $("#vrednosti-tab").append(res);
    }
});