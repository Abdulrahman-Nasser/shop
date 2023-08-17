<?php
include 'shared/head.php';
include "shared/header.php";
include "functions/configDB.php";

// select from departments

if (isset($_GET['shop'])) {
    $id = $_GET['shop'];
    echo "$id";
    $select = "SELECT * FROM `shops_and_category` where categoryID = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}



?>



<main id="main" class="direction_right">

    <!-- Features Section - man Page -->
    <section id="features " class="features">
        <!--  Section Title -->
        <div class="container section-title text-center mt-3" data-aos="fade-up">
            <?php if (!empty($row)) : ?>
                <h3 class="features-text"> <?= $row['category_name'] ?> </h3>
                <p class="text mt-3">هنا يمكنك رؤية <?= $row['category_name'] ?> من خلال محلاتنا .</p>
            <?php else : ?>
              <div class="alert alert-danger bg-transparent text-danger">
                this will be open soon
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
                        <div class="col-lg-6 col-sm mt-3">
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
                    <div class="alert alert-danger">No data</div>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <!-- End section arrivals -->

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