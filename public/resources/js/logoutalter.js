 // JavaScript para mostrar e esconder o menu de logout
 document.getElementById("adm-ico").addEventListener("click", function() {
    var logoutMenu = document.getElementById("logout-menu");
    if (logoutMenu.style.display === "none") {
        logoutMenu.style.display = "block";
    } else {
        logoutMenu.style.display = "none";
    }
});
function logout() {
    window.location.href = "../../logout.php";
};