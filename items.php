<?php
include 'shared/head.php';
include "shared/header.php";
include "functions/configDB.php";

// select from departments

if (isset($_GET['main_shop'])) {
    $id = $_GET['main_shop'];
    $select = "SELECT * FROM `shops_and_products` where shopID = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}



?>



<main id="main" class="">

    <!-- Features Section - man Page -->
    <section id="features " class="features">
        <!--  Section Title -->
        <div class="container section-title text-center p-70" data-aos="fade-up">
            <?php if (!empty($row)) : ?>
                <h3 class="features-text"><?= $row['shop_name'] ?></h3>
                <p class="text mt-3">نسعى دائما للافضل </p>
            <?php endif; ?>
        </div><!-- End Section Title -->


    </section><!-- End Features Section -->

    <!-- start seciton items -->
    <section class="items p-20">
        <div class="container">
            <div class="row">
                <?php if (!empty($row)) : ?>
                    <?php foreach ($s as $data) : ?>
                        <div class="col-lg-4 col-md-6 mt-3 animate__animated animate__fadeInTopRight">
                            <div class="card border-0 text-center">
                                <div class="card-img">
                                    <img src="niceAdmin/products/upload/<?= $data['product_img'] ?>" class="card-img-top" alt="not found">
                                </div>
                                <a href="" class="title">
                                    <h3> <?= $data['product_name'] ?></h3>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-danger bg-danger text-center text-light">
                        System Closed , There is no Products
                    </div>
                <?php endif ?>

            </div>
            <div class="items-text items-text2 p-70">
                <a class="btn" href="tel:+20 1154710314">اتصل بنا</a>
                <a class="btn" href="#map">موقعنا</a>

            </div>
        </div>
    </section>
    <!-- ENd section items -->


    <!-- location -->
    <section class="location p-70" id="map">
        <div class="iframe text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54580.28355954311!2d29.966335999999995!3d31.241011200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5db36bcc6dd29%3A0x419a1c7affb9e664!2z2YPZiNio2LHZiiDYp9mE2LnZiNin2YrYrw!5e0!3m2!1sar!2seg!4v1691504834150!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </section>


    <!-- chat content -->
    <section class="chat-content">

        <!-- chat icon -->
        <div class="chat" id="chat_icon">
            <span class="chat-icon"><i class="bi bi-chat-dots"></i></span>
        </div>
        <!-- end chat icon -->

        <!-- chat-content -->

        <div class="chat-container text-center animate__animated " id="chat_box">
            <div id="chat-box">
                <div class="chat-message">
                    <p>اهلا وسهلا بك</p>
                </div>

                <form action="index.html" method="post">
                    <div class="row justify-content-center">

                        <div class="col-lg-7 mt-3">
                            <input type="text" name="" id="" required placeholder="الاسم" class="form-control">
                        </div>
                        <div class="col-lg-7 mt-3">
                            <input type="email" name="" id="" required placeholder="الايميل" class="form-control">
                        </div>
                        <div class="col-lg-7 mt-3">
                            <input type="number" name="" id="" required placeholder="الرقم" class="form-control">
                        </div>
                        <div class="col-lg-7 mt-3">
                            <textarea name="message" id="" class="w-100 message" cols="30" rows="5" placeholder="يمكنك التواصل من خلال هذه المحادثه "></textarea>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- end chat content -->
</main>


<?php
include "shared/script.php";
?>