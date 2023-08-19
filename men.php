<?php
include 'shared/head.php';
include "shared/header.php";
include "functions/configDB.php";

// get icon name
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

// select from departments
$select = "SELECT * FROM departments where category = '$name' ORDER by arrangement Asc";
$s = mysqli_query($conn, $select);



?>



<main id="main" class="direction_right man-page">
  
    <!-- Features Section - man Page -->
    <section id="features " class="features man-category">
        <!--  Section Title -->
        <div class="container section-title text-center p-70" data-aos="fade-up">
            <div class="text">
                <h2 class="features-text">قسم <?= $name ?></h2>
            </div>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row features-item">
                <?php foreach ($s as $data) : ?>
                    <div class="col-lg-4 col-md-6 mt-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="men">
                            <a href="/shop/company.php?shop=<?= $data['id'] ?>">
                                <div class="card">
                                    <div class="img">
                                        <div class="overlay"></div>
                                        <img src="niceAdmin/departments/upload/<?= $data['image'] ?>" class="card-img-top" alt="not found">
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
            <!-- Features Item -->


        </div>

    </section>
    <!-- End Features Section -->



</main>



<?php
include "shared/chat.php";
include "shared/script.php";
?>