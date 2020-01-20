$(document).ready(function() {

    var connect = document.getElementById("connexion");
    if (isset($_SESSION[''])) {
        document.connect.style.display = "none";
    } else {
        document.connect.style.display = "block";
    };
});