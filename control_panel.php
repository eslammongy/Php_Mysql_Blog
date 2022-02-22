
<?php
include 'include/header.php';
include 'include/DBConnection.php';

$cateName = $_POST['category'];
$addingCate = $_POST['btnAdd'];

if(isset($addingCate)){
    if(empty($cateName)){
        echo "please fill this is field first";
    }else if($cateName > 100){
        echo "please enter name less than 100 latter";
    }else{
        $query = "INSERT INTO categories (CategoryName) VALUES ('$cateName')";
        mysqli_query($dbConnect, $query);
        echo "New Category Added Successfully";
        $dbConnect->close();
    }
}
?>
 <!-- start dashboard content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" id="right-area">
                    <h3>Control Panel</h3>
                    <ul>
                        <li>
                            <a href="">
                                <span> <i class="fa-solid fa-tags"></i></span>
                                <span>Category</span>
                            </a>
                        </li>

                        <li data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <a href="#">
                                <span><i class="fa-regular fa-newspaper"></i></i></span>
                                <span>Articles</span>
                            </a>
                        </li>
                        <!-- collapse -->
                        <ul class="collapse" id="navbarNav">
                            <li>
                                <a href="new_post.php">
                                    <span><i class="fa-solid fa-pen-to-square"></i></span>
                                    <span>New</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span><i class="fa-solid fa-earth-americas"></i></span>
                                    <span>All</span>
                                </a>
                            </li>
                        </ul>
                        <!-- collapse -->
                        <li>
                            <a href="index.php">
                                <span><i class="fa-solid fa-tv"></i></span>
                                <span>Website</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span><i class="fa-solid fa-right-from-bracket"></i></span>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10" id="main-area">
                    <div class="add-new-category">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label for="category">New Category</label>
                                <input type="text" name="category" class="form-control">
                            </div>
                            <button name="btnAdd" class="btn-custom">Add</button>
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