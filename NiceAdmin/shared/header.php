<?php


if(isset($_POST['signout'])){
    session_unset();
    session_destroy();
    header("location:login.php");
}
?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/shop/niceAdmin/index.php" class="logo d-flex align-items-center">
            <img src="/shop/niceAdmin/assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">لوحة التحكم</span>
        </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <i class="bi bi-list toggle-sidebar-btn"></i>

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/shop/niceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['admin-data']['userName'] ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $_SESSION['admin-data']['userName'] ?></h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    
                    <li>
                        <hr class="dropdown-divider">
                    </li>





                    <li>
                        <form action="" method="post">
                            <button name="signout" class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->