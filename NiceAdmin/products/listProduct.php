<?php
include "../shared/head.php";
include "../shared/header.php";
include "../shared/asside.php";
include "../admin_functions/configDB.php";
include "../admin_functions/functions.php";

// admin authorization
auth_admin();

// select from main_icon 
$select = "SELECT * from `shops_and_products`";
$s = mysqli_query($conn, $select);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // select for delete image icon
    $selectTwo = "SELECT * From `products` where id = $id";
    $s2 = mysqli_query($conn, $selectTwo);
    $row = mysqli_fetch_assoc($s2);

    // delete row from main_icon
    $delete = "DELETE From `products` where id = $id";
    $d = mysqli_query($conn, $delete);

    // delete the image from folder upload
    unlink('upload/' . $row['image']);
    admin_path('products/listProduct.php');
}
?>


<div class="main" id="main">
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><strong>قائمة المنتجات</strong></h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image Name</th>
                                    <th scope="col">image</th>
                                    <th scope="col">shop</th>
                                    <th scope="col">shop Description</th>

                                    <th scope="col" colspan="4" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($s as $data) : ?>
                                    <tr>
                                        <td><?= $data['productID'] ?></td>
                                        <td><?= $data['product_name'] ?></td>
                                        <td><?= $data['product_img'] ?></td>
                                        <td><img src="upload/<?= $data['product_img'] ?>" width="70px" alt=""> </td>
                                        <td><?= $data['shop_name'] ?></td>
                                        <td><?= $data['shop_description'] ?></td>


                                        <td>
                                            <a href="listProduct.php?delete=<?= $data['productID'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <a href="editProduct.php?update=<?= $data['productID'] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>



<?php
include "../shared/footer.php";
include "../shared/script.php";
?>