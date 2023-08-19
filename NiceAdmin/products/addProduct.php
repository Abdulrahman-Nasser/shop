<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/asside.php";
include "../admin_functions/configDB.php";
include "../admin_functions/functions.php";


// admin authorization
auth_admin();

// select for validation
$select  = "SELECT * FROM `products`";
$s = mysqli_query($conn, $select);

// select fo validation arrangement
$selectOne = "SELECT * FROM `shops_and_category`";
$s1 = mysqli_query($conn, $selectOne);


// upload slide img code
$image_error = [];
$arrange_error = [];
$name = '';
$insert_msg = [];
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $shopID = $_POST['department'];
    $arrangement = $_POST['arrangement'];

    // upload img code
    $file_name = time() . $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $location = 'upload/' . $file_name;
    $image_type = strtolower(pathinfo($location, PATHINFO_EXTENSION));

    if ($image_type != 'jpg' && $image_type != 'png' && $image_type != 'jpeg' && $image_type != 'webp') {
        $image_error[] = 'برجاء رفع صور من نوع jpg , png';
    }

    //arrangement validation 
    foreach ($s as $data) {
        if ($arrangement == $data['arrangement'] && $shopID == $data['shopID']) {
            $arrange_error[] = 'هذا الرقم مرتب من قبل برجاء تغير الرقم';
        }
    }

    // ready for insert
    if (empty($image_error) && empty($arrange_error)) {
        move_uploaded_file($tmp_name, $location);
        $insert = "INSERT INTO `products`(`id`,`name`,`image`,`arrangement`,`shopID`) VALUES (null,'$name','$file_name',$arrangement,$shopID)";
        $i = mysqli_query($conn, $insert);
        $insert_msg[] = 'تم ادخال البيانات ';
    }
}
?>

<div class="main" id="main" style="direction: rtl;">
    <div class="container col-md-6 text-cneter">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center"><strong>اضافة المنتجات</strong></h5>
                <?php if (!empty($insert_msg)) : ?>
                    <div class="alert alert-success text-success text-center">
                        <?php foreach ($insert_msg as $item) : ?>
                            <?= $item ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($image_error)) : ?>
                    <div class="alert alert-danger bg-transparent text-danger text-center">
                        <?php foreach ($image_error as $item) : ?>
                            <?= $item ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <!-- Custom Styled Validation -->
                <form class="row g-3 needs-validation" novalidate method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> <b>اسم المنتج</b></label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" value="<?= $name ?>" required placeholder="برجاء ادخال اللغة العربية فقط">
                        <div class="valid-feedback">
                            الاسم مناسب ، احسنت
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> <b>اسم المحل</b></label>
                        <select name="department" id="validationcustom01" class="form-control">
                            <?php foreach ($s1 as $data) : ?>
                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?> - <?= $data['category'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback">
                            تم اختيار القسم
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> <b>ترتيب المنتج</b></label>
                        <input type="number" class="form-control" name="arrangement" id="validationCustom01" value="" required placeholder="برجاء ادخال اللغة العربية فقط">
                        <div class="valid-feedback">
                            رائع
                        </div>
                        <?php if (!empty($arrange_error)) : ?>
                            <div class="alert alert-danger bg-transparent border-0 text-danger text-center">
                                <?php foreach ($arrange_error as $item) : ?>
                                    <b><?= $item ?></b>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">اضافة الصورة</label>
                        <input type="file" class="form-control" name="file" id="validationCustom01" value="" required>
                        <div class="valid-feedback">
                            الصورة جيدة يمكنك الاضافة الان
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button class="btn btn-primary" name="send" type="submit">اضافة</button>
                    </div>
                </form><!-- End Custom Styled Validation -->

            </div>
        </div>
    </div>
</div>

<?php
include "../shared/footer.php";
include "../shared/script.php";
?>