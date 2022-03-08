<?php
include 'include/header.php';
include 'include/DBConnection.php';

error_reporting(E_ERROR | E_PARSE);
$tagName = $_POST['categoryName'];
$addNewTag = $_POST['btnAddTag'];
$tagID = $_GET['ID'];

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

                    <li data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                            <a href="posts_list.php">
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
                    <?php
                    if (isset($addNewTag)) {
                        if (empty($tagName)) {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "please fill this is field first" . "</div>";
                        } else if ($tagName > 100) {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "please enter name less than 100 latter" . "</div>";
                        } else {
                            $query = "INSERT INTO categories (CategoryName) VALUES ('$tagName')";
                            mysqli_query($dbConnect, $query);
                            echo "<div class='alert alert-success'style='color:black;font-weight:800;text-align:center;'>" . "New Category Added Successfully" . "</div>";
                        }
                    }

                    ?>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="categoryName">New Category</label>
                            <input type="text" name="categoryName" class="form-control">
                        </div>
                        <button name="btnAddTag" class="btn-custom">Add</button>
                    </form>
                </div>

                <!-- display categories -->
                <div class="display-cat mt-5">
                    <?php
                    if (isset($tagID)) {
                        $query = "DELETE FROM categories WHERE ID ='$tagID'";
                        $deleteRes = mysqli_query($dbConnect, $query);

                        if (isset($deleteRes)) {
                            echo "<div class='alert alert-success'style='color:black;font-weight:800;text-align:center;'>" . "Delete Selected Tag Successfully" . "</div>";
                        } else {
                            echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "Error Occurred when Deleting Selected Tag" . "</div>";
                        }
                    }

                    ?>
                    <table class="table table-bordered" style="color: white;">
                        <tr style="background-color: #696969;">
                            <th>Inserting Date</th>
                            <th>Category Name</th>
                            <th>Category ID</th>
                            <th>Delete Category</th>
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
                                        style="margin:0px;background-color:red;">Delete</button></a></td>
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
include 'include/footer.php';
?>