<?php 
include 'include/header.php';
include 'include/DBConnection.php';
?>

<!-- start dashboard content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="right-area">
                <h3>Control Panel</h3>
                <ul>
                    <li>
                        <a href="control_panel.php">
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
            <!-- display posts list -->
            <div class="col-md-10" id="main-area">
                <table class="table table-bordered" style="color: white;">
                    <tr style="background-color: #696969;">
                        <th>Post Date</th>
                        <th>Post Image</th>
                        <th>Post Tag</th>
                        <th>Post Title</th>
                        <th>Post ID</th>
                    </tr>
                    <?php 
                $query = "SELECT * FROM posts ORDER BY DESC";
                $result =mysqli_query($dbConnect, $query);
               
                while($row = mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <th><?php echo $row['PostDate']; ?></th>
                        <th><?php echo $row['PostImage']; ?></th>
                        <th><?php echo $row['PostTag']; ?></th>
                        <th><?php echo $row['PostTitle']; ?></th>
                        <th><?php echo $row['PostID']; ?></th>
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