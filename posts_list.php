<?php 
include 'include/header.php';
include 'include/DBConnection.php';
error_reporting(E_ERROR | E_PARSE);
$postID = $_GET['PostID'];
?>

<!-- start dashboard content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="right-area">
                <h3>لوحة التحكم</h3>
                <ul>
                    <li>
                        <a href="control_panel.php">
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
                            <span>عرض الوقع</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span>تسجيل خروج</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- display posts list -->
            <div class="col-md-10" id="main-area">
                <?php
                 if (isset($postID)) {
                        $query = "DELETE FROM posts WHERE PostID ='$postID'";
                        $deleteRes = mysqli_query($dbConnect, $query);

                        if (isset($deleteRes)) {
                            echo "<div class='alert alert-success'style='color:black;font-weight:800;text-align:center;'>" . "Delete Selected Article Successfully" . "</div>";
                        } else {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "Error Occurred when Deleting Selected Article" . "</div>";
                        }
                    }

                    ?>
                <table class="table table-bordered" style="color: white;">
                    <tr style="background-color: #696969;">
                        <th>رقم المقال</th>
                        <th>عنوان المقال</th>
                        <th>فئة المقال</th>
                        <th>تاريخ النشر</th>
                        <th>صورة المقال</th>
                        <th>حذف المقال</th>

                    </tr>
                    <?php 
                $query = "SELECT * FROM posts ORDER BY PostDate DESC";
                $result =mysqli_query($dbConnect, $query);
               
                while($row = mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <th><?php echo $row['PostID']; ?></th>
                        <th><?php echo $row['PostTitle']; ?></th>
                        <th><?php echo $row['PostTag']; ?></th>
                        <th><?php echo $row['PostDate']; ?></th>
                        <th><img src="uploadImage/postImage/<?php echo $row['PostImage']; ?>" alt="" width="60px"
                                height="60px"></th>
                        <td><a href="posts_list.php?PostID=<?php echo $row['PostID']; ?>"><button class="btn-custom"
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

<!-- end dashboard content -->

<?php 
include 'include/footer.php';
?>