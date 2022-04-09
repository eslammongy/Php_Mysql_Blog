<?php
include 'include/header.php';
include 'include/DBConnection.php';

error_reporting(E_ERROR | E_PARSE);
$postTitle = $_POST['PostTitle'];
$postTag = $_POST['PostTag'];
$postContent = $_POST['PostContent'];
$postDate = $_POST['PostDate'];
$postAuther = "Eslam Mongy";
$addPost = $_POST['btnAdd'];

$imageName = $_FILES['PostImage']['name'];
$imageTmp = $_FILES['PostImage']['tmp_name'];

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
                    if (isset($addPost)) {
                        if (empty($postTitle) || empty($postContent)) {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "please don't forget type the post title and content" . "</div>";
                        } else if ($postContent > 1000) {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "big content !!" . "</div>";
                        } else {
                            $postImage = rand(0, 1000) . "_" . $imageName;
                            move_uploaded_file($imageTmp, "uploadImage\postImage\\" . $postImage);
                            $query = "INSERT INTO posts(PostTitle,PostContent,PostImage,PostTag,PostAuther)
        VALUES('$postTitle','$postContent','$postImage','$postTag','$postAuther')";
                            $result =  mysqli_query($dbConnect, $query);
                            if (isset($result)) {
                                echo "<div class='alert alert-success'style='color:black;font-weight:800;text-align:center;'>" . "Sharing Article Successfully" . "</div>";
                            } else {
                                echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "Error Occurred When Uploading Article" . "</div>";
                            }
                        }
                    }
                    ?>
                    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="PostTitle">Title</label>
                            <input type="text" name="PostTitle" class="form-control" style="background-color: white;">
                        </div>
                        <div class="form-group">
                            <label for="PostTag">Tag</label>
                            <select name="PostTag" id="PostTag" class="form-control">
                                <?php

$query = "SELECT * FROM categories";
$result = mysqli_query($dbConnect, $query);

while ($tag = mysqli_fetch_assoc($result)) {
    ?>
                                <option name="PostTag"> <?php echo $tag['CategoryName']; ?></option>
                                <?php
}
?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="PostImage">
                                Post Image
                            </label>
                            <input type="file" name="PostImage" id="post_image" class="form-control"
                                style="background-color: white;">

                        </div>
                        <div class="form-group">
                            <label for="PostContent">Content</label>
                            <textarea cols="30" rows="10" name="PostContent" class="form-control">

                                </textarea>
                        </div>
                        <button class="btn-custom" name="btnAdd">Share</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end dashboard content -->

<?php
include 'include/footer.php';
?>