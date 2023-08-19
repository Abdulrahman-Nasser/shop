<?php
include "shared/head.php";
include "shared/header.php";
include "shared/asside.php";
include "../functions/configDB.php";
include "admin_functions/functions.php";


?>


<main>
  <div class="container">

    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <h1>404</h1>
      <h2>The page you are looking for doesn't exist.</h2>
      <a class="btn" href="/shop/niceAdmin/index.php">Back to home</a>
      <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
    </section>

  </div>
</main><!-- End #main -->


<?php
include "shared/footer.php";
include "shared/script.php";
?>