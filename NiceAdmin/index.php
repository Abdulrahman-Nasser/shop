<?php
include "shared/head.php";
include "shared/header.php";
include "shared/asside.php";
include "../functions/configDB.php";
include "admin_functions/functions.php";

auth_admin();

$select_departments = "SELECT count(*) as total_departments FROM departments";
$s = mysqli_query($conn, $select_departments);
$row = mysqli_fetch_assoc($s);

$select_products = "SELECT count(*) as total_products FROM products";
$s_product = mysqli_query($conn, $select_products);
$row_product = mysqli_fetch_assoc($s_product);

$select_shops = "SELECT count(*) as total_shops FROM shops";
$s_shop = mysqli_query($conn, $select_shops);
$row_shop = mysqli_fetch_assoc($s_shop);

$select_main_slider = "SELECT count(*) as total_main_slider FROM `main-slider`";
$s_slider = mysqli_query($conn, $select_main_slider);
$row_slider = mysqli_fetch_assoc($s_slider);

$selec_main_icon = "SELECT count(*) as total_main_icon FROM `main_icon`";
$s_icon = mysqli_query($conn, $selec_main_icon);
$row_icon = mysqli_fetch_assoc($s_icon);

?>





<main id="main" class="main">

  <div class="pagetitle text-center">
    <h1>لوحة التحكم</h1>

  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row justify-content-center">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row ">

          <!-- Sales Card -->
          <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">



              <div class="card-body">
                <h5 class="card-title">الاقسام الداخلية</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-archive"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row['total_departments'] ?></h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-lg-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">المنتجات</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row_product['total_products'] ?></h6>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-lg-4 col-md-6">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">المحلات</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bag-check-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row_shop['total_shops'] ?></h6>
                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- End Customers Card -->

          <!-- Sales Card -->
          <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">



              <div class="card-body">
                <h5 class="card-title">السلايد</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-sliders"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row_slider['total_main_slider'] ?></h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Sales Card -->
          <div class="col-lg-4 col-md-6">
            <div class="card info-card sales-card">



              <div class="card-body">
                <h5 class="card-title">الاقسام الرئيسية</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-sliders"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row_icon['total_main_icon'] ?></h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->



        </div>
      </div><!-- End Left side columns -->


    </div>
  </section>

</main><!-- End #main -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<?php
include "shared/footer.php";
include "shared/script.php";
?>