<?php 
function admin_path($go) {
    echo "<script>
    window.location.replace('/shop/niceAdmin/$go')
    </script>";
}


function auth_admin()
{
    if ($_SESSION['admin-data']) {
        if (isset($_SESSION['admin-data'])) {
        } else {
            admin_path("login.php");
        }
    } else {
        admin_path("login.php");
    }
}

?>
