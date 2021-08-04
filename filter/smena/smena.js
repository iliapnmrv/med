let smena = document.getElementById('smena')
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
function dropdown() {
    document.getElementById("dropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        if (event.target.matches('#dropdown')) {
            let dropdowns = document.getElementsByClassName("dropdown-content");
            for (let i = 0; i < dropdowns.length; i++) {
                let openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
}
let smenaSelected = []
$.ajax({
    type: "post",
    url: "filter/smena/smena.php",
    data: {},
    success: function(result) {
        $(smena).append(result);
        $(smena).selectMultiple({
            afterSelect: function(values) {
                val = values[0]
                smenaSelected.push(val)
            },
            afterDeselect: function(values) {
                val = values[0]
                let index = smenaSelected.indexOf(val)
                if (index > -1) {
                    smenaSelected.splice(index, 1);
                }
            }
        })
    }
});