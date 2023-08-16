<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/asside.php";
include "../admin_functions/configDB.php";
include "../admin_functions/functions.php";

// edit main icon 
$image_error = [];
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $select = "SELECT * From `main_icon` where id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $oldImg = $row['image'];
    if (isset($_POST['edit'])) {
        $insert_msg = [];
        $name = $_POST['name'];
        
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

        if ($image_type_new != 'jpg' && $image_type_new != 'png' && $image_type_new != 'jpeg') {
            $image_error[] = 'برجاء رفع صور من نوع jpg , png';
        } else {

            $update = "UPDATE `main_icon` SET `id`=$id,`name`='$name',`image`='$file_name' WHERE id = $id";
            $u = mysqli_query($conn, $update);
            $insert_msg[] = 'تم تعديل البيانات بنجاح';
        }
    }
}


?>

<div class="main" id="main" style="direction: rtl;">
    <div class="container col-md-6 text-cneter">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">تعديل بيانات الايقونات الرئيسية</h5>
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
                        <label for="validationCustom01" class="form-label"> اسم الأيقونة</label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" value="<?= $row['name'] ?>" required placeholder="برجاء ادخال اللغة العربية فقط">
                        <div class="valid-feedback">
                            الاسم مناسب ، احسنت
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