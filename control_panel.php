<?php
session_start();
include 'include/header.php';
include 'include/DBConnection.php';

error_reporting(E_ERROR | E_PARSE);
$tagName = $_POST['categoryName'];
$addNewTag = $_POST['btnAddTag'];
$tagID = $_GET['ID'];

if(!isset($_SESSION['id'])){
  echo "<div class='alert alert-success'style='color:white;font-weight:800;text-align:center;font-size:xx-large; background-color: red;'>" . "غير مسموح لك بالاطلاع علي هذه الصفحة" . "</div>";             
  header('REFRESH:2;URL=login.php');
}
else{

?>
<!-- start dashboard content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="right-area">
                <h3>لوحة التحكم</h3>
                <ul>
                    <li>
                        <a href="">
                            <span> <i class="fa-solid fa-tags"></i></span>
                            <span>الفئات</span>
                        </a>
                    </li>

                    <li data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <a href="#">
                            <span><i class="fa-regular fa-newspaper"></i></i></span>
                            <span>المقالات</span>
                        </a>
                    </li>
                    <!-- collapse -->
                    <ul class="collapse" id="navbarNav">
                        <li>
                            <a href="new_post.php">
                                <span><i class="fa-solid fa-pen-to-square"></i></span>
                                <span>اضافة</span>
                            </a>
                        </li>
                        <li>
                            <a href="posts_list.php">
                                <span><i class="fa-solid fa-earth-americas"></i></span>
                                <span>كل المقالات</span>
                            </a>
                        </li>
                    </ul>
                    <!-- collapse -->
                    <li>
                        <a href="index.php" target="_blank">
                            <span><i class="fa-solid fa-tv"></i></span>
                            <span>عرض الموقع</span>
                        </a>
                    </li>
                    <li>
                        <a href="login.php">
                            <span><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span>تسجيل خروج</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="main-area">

                <div class="add-new-category">
                    <?php
                    if (isset($addNewTag)) {
                        if (empty($tagName)) {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "please fill this is field first" . "</div>";
                        } else if ($tagName > 100) {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "please enter name less than 100 latter" . "</div>";
                        } else {
                            $query = "INSERT INTO categories (CategoryName) VALUES ('$tagName')";
                            mysqli_query($dbConnect, $query);
                            echo "<div class='alert alert-success'style='color:black;font-weight:800;text-align:center;'>" . "تم اضافة فئة جديدة" . "</div>";
                        }
                    }

                    ?>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="categoryName">اسم الفئة</label>
                            <input type="text" name="categoryName" class="form-control">
                        </div>
                        <button name="btnAddTag" class="btn-custom">اضافة</button>
                    </form>
                </div>

                <!-- display categories -->
                <div class="display-cat mt-5">
                    <?php
                    if (isset($tagID)) {
                        $query = "DELETE FROM categories WHERE ID ='$tagID'";
                        $deleteRes = mysqli_query($dbConnect, $query);

                        if (isset($deleteRes)) {
                            echo "<div class='alert alert-success'style='color:black;font-weight:800;text-align:center;'>" . "تم حذف الفئة بنجاح" . "</div>";
                        } else {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "حدث خطأ أثناء حذف الفئة" . "</div>";
                        }
                    }

                    ?>
                    <table class="table table-bordered" style="color: white;">
                        <tr style="background-color: #696969;">
                            <th>تاريخ النشر</th>
                            <th>اسم الفئة</th>
                            <th>رقم الفئة</th>
                            <th>حذف الفئة</th>
                        </tr>
                        <?php
                        $cateOrder = 0;
                        $query = "SELECT * FROM categories ORDER BY CategoryDate DESC";
                        $result = mysqli_query($dbConnect, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cateOrder++;
                        ?>
                        <tr>
                            <td><?php echo $row['CategoryDate']; ?></td>
                            <td><?php echo $row['CategoryName']; ?></td>
                            <td><?php echo $cateOrder; ?></td>
                            <td><a href="control_panel.php?ID=<?php echo $row['ID']; ?>"><button class="btn-custom"
                                        style="margin:0px;background-color:red;">حذف</button></a></td>
                        </tr>
                        <?php
                        }

                        ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end dashboard content -->
<?php 

}
?>

<?php
include 'include/footer.php';
?>