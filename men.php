<?php
include 'shared/head.php';
include "shared/header.php";
include "functions/configDB.php";

// select from departments
$select = "SELECT * FROM departments where category = 'رجالي' ORDER by arrangement Asc";
$s = mysqli_query($conn , $select);



?>



<main id="main" class="direction_right">

    <!-- Features Section - man Page -->
    <section id="features " class="features man-category">
        <div class="overlay-2"></div>
        <!--  Section Title -->
        <div class="container section-title text-center p-70" data-aos="fade-up">
            <h2 class="features-text">قسم الرجال</h2>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row features-item">
                <?php foreach($s as $data) : ?>
                <div class="col-lg-4 col-md-6 mt-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="men">
                        <a href="/shop/company.php?shop=<?= $data['id']?>">
                            <div class="card">
                                <div class="img">
                                    <div class="overlay"></div>
                                    <img src="niceAdmin/departments/upload/<?= $data['image']?>" class="card-img-top" alt="not found">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= $data['name'] ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

            </div><!-- Features Item -->


        </div>

    </section><!-- End Features Section -->

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