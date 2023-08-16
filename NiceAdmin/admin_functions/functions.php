<?php 
function admin_path($go) {
    echo "<script>
    window.location.replace('/shop/niceAdmin/$go')
    </script>";
}
?>