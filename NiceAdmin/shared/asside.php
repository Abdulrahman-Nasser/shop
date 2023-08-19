
<?php
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("location:logine.php");
}
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar" style="direction: rtl;">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>لوحة التحكم</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>السلايد</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/shop/niceAdmin/slider/addSlide.php">
                        <i class="bi bi-circle"></i><span>اضافة</span>
                    </a>
                </li>
                <li>
                    <a href="/shop/niceAdmin/slider/listSlide.php">
                        <i class="bi bi-circle"></i><span>عرض</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-icon" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>الأيقونات الاساسية</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-icon" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/shop/niceAdmin/main_icon/addIcon.php">
                        <i class="bi bi-circle"></i><span><strong>اضافة</strong></span>
                    </a>
                </li>
                <li>
                    <a href="/shop/niceAdmin/main_icon/listIcon.php">
                        <i class="bi bi-circle"></i><span><strong>عرض</strong></span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-department" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> الاقسام</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-department" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/shop/niceAdmin/departments/addDepartment.php">
                        <i class="bi bi-circle"></i><span><strong>اضافة</strong></span>
                    </a>
                </li>
                <li>
                    <a href="/shop/niceAdmin/departments/listDepartment.php">
                        <i class="bi bi-circle"></i><span><strong>عرض</strong></span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-shop" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> المحلات</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-shop" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/shop/niceAdmin/shops/addShop.php">
                        <i class="bi bi-circle"></i><span><strong>اضافة</strong></span>
                    </a>
                </li>
                <li>
                    <a href="/shop/niceAdmin/shops/listShop.php">
                        <i class="bi bi-circle"></i><span><strong>عرض</strong></span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-products" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span> ألمنتجات</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-products" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/shop/niceAdmin/products/addProduct.php">
                        <i class="bi bi-circle"></i><span><strong>اضافة</strong></span>
                    </a>
                </li>
                <li>
                    <a href="/shop/niceAdmin/products/listProduct.php">
                        <i class="bi bi-circle"></i><span><strong>عرض</strong></span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->



        <?php if (isset($_SESSION['admin-data'])) : ?>
            <li class="nav-item">
                <form action="" method="post">
                    <button class="nav-link collapsed" name="logout">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>logout</span>
                    </button>
                </form>
            </li>
        <?php endif; ?>



    </ul>

</aside><!-- End Sidebar-->