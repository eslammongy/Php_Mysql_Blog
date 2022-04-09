<?php
include('public/header.php');
include 'include/DBConnection.php';
?>
<!--start content-->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                $id = $_GET['PostID'];
                $query = "SELECT * FROM posts WHERE PostID='$id'";
                $result = mysqli_query($dbConnect, $query);
                $post = mysqli_fetch_assoc($result);
               ?>
                <div class="post">
                    <div class="post-image">
                        <img src="uploadImage/postImage/<?php echo$post['PostImage'] ?>" alt="blog-image">
                    </div>
                    <a href="post_info.php?PostID=<?php echo $post['PostID'] ?>">
                        <div class="post-title"><strong><?php echo $post['PostTitle'] ?></strong></div>
                    </a>
                    <div class="post-details">
                        <p class="postContent"><?php
                        echo $post['PostContent'];
                        ?>
                        </p>
                        <p class="post-info">
                            <!--  <span>
                                <span><i class="fa-solid fa-user"></i> <?php echo $post['PostAuther'] ?></span>

                            </span> -->
                            <span>
                                <span><i class="fa-solid fa-calendar"></i> <?php echo $post['PostDate'] ?></span>

                            </span>
                            <span>

                                <span><i class="fa-solid fa-tags"></i> <?php echo $post['PostTag'] ?></span>

                            </span>
                        </p>

                    </div>
                </div>


            </div>
            <div class="col-md-3">
                <!-- start category section -->
                <div class="categories">
                    <h3>الفئات</h3>
                    <ul>
                        <?php 
                        $query = "SELECT * FROM categories ORDER BY CategoryDate DESC";
                        $result = mysqli_query($dbConnect, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                        <li>
                            <a href="category.php?CategoryName=<?php echo $row['CategoryName'] ?>">

                                <span><?php echo $row['CategoryName'] ?></span>
                                <span> <i class="fa-solid fa-tags"></i></span>
                            </a>
                        </li>
                        <?php
                        }
              ?>

                    </ul>
                </div>
                <!--end category section -->
                <!-- start latest posts -->
                <div class="last-post">

                    <h3>أحدث المقالات</h3>
                    <?php 
                  $query = "SELECT * FROM posts ORDER BY PostID DESC";
                  $result = mysqli_query($dbConnect, $query);
                  while($row = mysqli_fetch_assoc($result)){
                      ?>
                    <div class="grid-row">
                        <div class="box">
                            <a href="post_info.php?PostID=<?php echo $row['PostID'] ?>">
                                <span>
                                    <img src="uploadImage/postImage/<?php echo $row['PostImage']; ?>" alt="images">
                                </span>
                            </a>
                        </div>
                        <div class="box">
                            <a href="post_info.php?PostID=<?php echo $row['PostID'] ?>">

                                <p><?php if(strlen($row['PostTitle']) > 20){
                                $row['PostTitle'] = substr($row['PostTitle'], 0 , 30). "...";
                                }
                                echo $row['PostTitle']; ?></p>

                            </a>
                        </div>

                    </div>

                    <?php
                  }
                    
             ?>

                </div>
                <!-- end latest posts -->
            </div>

        </div>
    </div>
</div>
<!--end content-->
<?php include('public/footer.php'); ?>