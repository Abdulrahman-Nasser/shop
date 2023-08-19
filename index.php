<?php
include 'shared/head.php';
include "shared/header.php";
include 'functions/configDB.php';

$select = "SELECT * FROM `main-slider`";
$s = mysqli_query($conn, $select);

$selectTwo = "SELECT * FROM `main_icon`";
$s2 = mysqli_query($conn, $selectTwo);





?>


<main id="main">

    <!-- Features Section - Home Page -->
    <section id="features" class="features mt-5">

        <!--  Section Title -->
        <div class="container section-title text-center" data-aos="fade-up">
            <h2 class="features-text">المتجر</h2>
            <p> .اهلا بك في موقعنا ، يمكنك شراء منجاتك بكل ارياحية</p>
        </div><!-- End Section Title -->


        <div class="owl-carousel owl-theme item">
            <?php foreach ($s as $data) : ?>
                <img src="niceAdmin/slider/upload/<?= $data['image'] ?>" alt="">
            <?php endforeach; ?>
        </div>

        <div class="container direction_right mt-2">

            <div class="row  align-items-center justify-content-center features-item">
                <div class="col-lg-8 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="row justify-content-between">
                        <?php foreach ($s2 as $data) : ?>
                            <div class="col-lg-6">
                                <div class="men">
                                    <a href="men.php?name=<?= $data['name'] ?>">
                                        <div class="card">
                                            <div class="img">
                                                <div class="overlay"></div>
                                                <img src="niceAdmin/main_icon/upload/<?= $data['image']?>" class="card-img-top" alt="...">
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title"><?= $data['name'] ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div><!-- Features Item -->


        </div>

    </section><!-- End Features Section -->


  
</main>



<?php
include "shared/chat.php";
include "shared/script.php";
?>