<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/asside.php";
include "../admin_functions/configDB.php";
include "../admin_functions/functions.php";

// admin authorization
auth_admin();


// select for update
$select3 = "SELECT * FROM `departments`";
$s3 = mysqli_query($conn, $select3);


// edit main icon 
$image_error = [];
if (isset($_GET['update'])) {
    $id = $_GET['update'];

    // validation select for arrangement
    $selectOne = "SELECT * FROM `shops_and_category` where id != $id";
    $s1 = mysqli_query($conn, $selectOne);

    // select for get data into inputs
    $select = "SELECT * From `shops` where id = $id ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);

    $oldImg = $row['image'];
    if (isset($_POST['edit'])) {
        $insert_msg = [];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryID = $_POST['department'];
        $arrangement = $_POST['arrangement'];
        $phone = $_POST['phone'];
        $shop_location = $_POST['shop_location'];

        // Check if a new file was uploaded
        if (!empty($_FILES['file']['name'])) {
            unlink('upload/' . $oldImg);
            $file_name = time() . $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            $location = 'upload/' . $file_name;
            $image_type = strtolower(pathinfo($location, PATHINFO_EXTENSION));
            move_uploaded_file($tmp_name, $location);
        } else {
            $file_name = $oldImg;
        }

        // for image type validation
        $new_location = 'upload/' . $file_name;
        $image_type_new = strtolower(pathinfo($new_location, PATHINFO_EXTENSION));

        if ($image_type_new != 'jpg' && $image_type_new != 'png' && $image_type_new != 'jpeg' && $image_type_new != 'webp') {
            $image_error[] = 'برجاء رفع صور من نوع jpg , png';
        }

        // validation for arrangements
        foreach ($s1 as $data) {
            if ($arrangement == $data['arrangement'] && $categoryID == $data['categoryID'] ) {
                $image_error[] = 'هذا الرقم مرتب من قبل برجاء تغير الرقم';
            }
        }

        if (empty($image_error)) {
            $update = "UPDATE `shops` SET `id`=$id,`name`='$name',`description`='$description',`image`='$file_name',`arrangement`=$arrangement,`phone`=$phone,`shop_location`='$shop_location',`categoryID`='$categoryID' WHERE id = $id";
            $u = mysqli_query($conn, $update);
            $insert_msg[] = 'تم تعديل البيانات بنجاح';
            admin_path('shops/listShop.php');
        }
    }
}


?>

<div class="main" id="main" style="direction: rtl;">
    <div class="container col-md-6 text-cneter">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center"><b>تعديل المحلات</b></h5>
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
                <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> <b>اسم المحل</b></label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" value="<?= $row['name'] ?>" required placeholder="برجاء ادخال اللغة العربية فقط">
                        <div class="valid-feedback">
                            الاسم مناسب ، احسنت
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"><b>وصف المحل</b></label>
                        <input type="text" class="form-control" name="description" id="validationCustom01" value="<?= $row['description'] ?>" required placeholder="برجاء ادخال اللغة العربية فقط">
                        <div class="valid-feedback">
                            الاسم مناسب ، احسنت
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"><b> رقم الموبايل</b></label>
                        <input type="number" class="form-control" name="phone" id="validationCustom01" value="<?= $phone ?>" required placeholder="برجاء ادخال رقم الهاتف ، فقط 11 رقم  ">
                        <div class="valid-feedback">
                            جيد
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"><b> العنوان </b></label>
                        <input type="text" class="form-control" name="shop_location" id="validationCustom01" value="" required placeholder="www.example.com">
                        <div class="valid-feedback">
                            جيد
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> <b>نوع المحل او القسم الخاص به</b></label>
                        <select name="department" id="validationcustom01" class="form-control">
                            <?php foreach ($s3 as $data) : ?>
                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?> - <?= $data['category'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback">
                            تم اختيار القسم
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> <b>ترتيب المحل </b></label>
                        <input type="number" class="form-control" name="arrangement" id="validationCustom01" value="<?= $row['arrangement'] ?>" required placeholder="برجاء ادخال رقم للترتيب">
                        <div class="valid-feedback">
                            الرقم متاح ، رائع جدا
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label"> الصورة الحالية :</label>
                        <img src="upload/<?= $row['image'] ?>" width="60px" alt="">
                        <input type="file" class="form-control mt-2" name="file" id="validationCustom01" value="<?= $row['image'] ?>">
                        <div class="valid-feedback">
                            الصورة جيدة يمكنك الاضافة الان
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button class="btn btn-warning" name="edit" type="submit"><strong>تعديل</strong></button>
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