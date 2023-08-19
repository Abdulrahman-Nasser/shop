<?php
include 'shared/head.php';
include "shared/header.php";
include "functions/configDB.php";

// select from departments

if (isset($_GET['shop'])) {
    $id = $_GET['shop'];
    $select = "SELECT * FROM `shops_and_category` where categoryID = $id ORDER by arrangement asc";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}



?>



<main id="main" class="direction_right">

    <!-- Features Section - man Page -->
    <section id="features " class="features">
        <!--  Section Title -->
        <div class="container section-title text-center mt-5" data-aos="fade-up">
            <?php if (!empty($row)) : ?>
                <h3 class="features-text"> <?= $row['category_name'] ?> </h3>
                <p class="text mt-3">هنا يمكنك رؤية <?= $row['category_name'] ?> من خلال محلاتنا .</p>
            <?php else : ?>
              <div class="alert alert-danger bg-transparent text-danger p-5 mt-5">
                سوف يكون متاح قريبا

            </div>
            <?php endif ?>
        </div><!-- End Section Title -->


    </section>
    <!-- End Features Section -->

    <!-- start section arrivals -->
    <section class="company">
        <div class="container">
            <div class="arrivals-text animate__animated animate__bounceIn" data-wow-delay=".5s">
                <?php if(!empty($row)): ?>
                <h2><?= $row['category_name'] ?></h2>
                <?php endif ;?>
            </div>
            <div class="row center mt-3">
                <?php if (!empty($s)) : ?>
                    <?php foreach ($s as $data) : ?>
                        <div class="col-lg-6 col-sm mt-3 animate__animated animate__fadeInLeftBig">
                            <a href="/shop/items.php?main_shop=<?= $data['id'] ?>">
                                <div class="card">
                                    <div class="row g-0 justify-content-center align-items-center">
                                        <div class="col-md-4 ">
                                            <img src="niceAdmin/shops/upload/<?=$data['image']?>" class="img-fluid img-radius" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"> <?= $data['name'] ?></h5>
                                                <p class="card-text"><?= $data['description'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-danger">لا يوجد ملفات</div>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <!-- End section arrivals -->


</main>


<?php
include "shared/chat.php";
include "shared/script.php";
?>