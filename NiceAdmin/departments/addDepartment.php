<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/asside.php";
include "../admin_functions/configDB.php";
include "../admin_functions/functions.php";


// admin authorization
auth_admin();

$select = "SELECT * FROM departments";
$s = mysqli_query($conn, $select);

// empty inputs
$name = '';
$category = '';
$arrangement = '';

// upload slide img code
$image_error = [];
if (isset($_POST['send'])) {
    // inputs data
    $insert_msg = [];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $arrangement = $_POST['arrangement'];

    // image code
    $file_name = time() . $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $location = 'upload/' . $file_name;
    $image_type = strtolower(pathinfo($location, PATHINFO_EXTENSION));

    // validation for image type
    if ($image_type != 'jpg' && $image_type != 'png' && $image_type != 'jpeg' && $image_type != 'webp') {
        $image_error[] = 'برجاء رفع صور من نوع jpg , png';
    }

    // validation for arrangements
    foreach ($s as $data) {
        if ($arrangement == $data['arrangement']) {
            $image_error[] = 'هذا الرقم مرتب من قبل برجاء تغير الرقم';
        }
    }

    if (empty($image_error)) {
        move_uploaded_file($tmp_name, $location);
        $insert = "INSERT INTO `departments`(`id`,`name`,`image`,`category`,`arrangement`) VALUES (null,'$name','$file_name','$category',$arrangement)";
        $i = mysqli_query($conn, $insert);
        $insert_msg[] = 'تم ادخال البيانات ';
    }
}
?>

<div class="main" id="main" style="direction: rtl;">
    <div class="container col-md-6 text-cneter">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">اضافة قسم</h5>
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
                        <label for="validationCustom01" class="form-label"> اسم القسم</label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" value="<?= $name ?>" required placeholder="برجاء ادخال اللغة العربية فقط">
                        <div class="valid-feedback">
                            الاسم مناسب ، احسنت
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> نوع القسم</label>
                        <input type="text" class="form-control" name="category" id="validationCustom01" value="<?= $category ?>" required placeholder="رجالي - سيدات ... الخ">
                        <div class="valid-feedback">
                            الاسم مناسب ، احسنت
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> ترتيب القسم</label>
                        <input type="number" class="form-control" name="arrangement" id="validationCustom01" value="<?= $category?>" required placeholder="برجاء ادخال رقم  للترتيب ">
                        <div class="valid-feedback">
                            الاسم مناسب ، احسنت
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">اضافة صورة للقسم</label>
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