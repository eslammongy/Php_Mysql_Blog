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
                $query = "SELECT * FROM posts ORDER BY PostID";
                $result = mysqli_query($dbConnect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <div class="post">
                    <div class="post-image">
                        <img src="uploadImage/postImage/<?php echo$row['PostImage'] ?>" alt="blog-image">
                    </div>
                    <div class="post-title"><strong><a href="#"></a><?php echo $row['PostTitle'] ?></strong></div>
                    <div class="post-details">
                        <p class="postContent"><?php
                        if(strlen($row['PostContent']) > 150){
                            $row['PostContent'] = substr($row['PostContent'], 0 , 400). "...";
                        }
                        echo $row['PostContent'];
                        ?>
                        </p>
                        <p class="post-info">
                            <span>
                                <span><i class="fa-solid fa-user"></i> <?php echo $row['PostAuther'] ?></span>

                            </span>
                            <span>
                                <span><i class="fa-solid fa-calendar"></i> <?php echo $row['PostDate'] ?></span>

                            </span>
                            <span>

                                <span><i class="fa-solid fa-tags"></i> <?php echo $row['PostTag'] ?></span>

                            </span>
                        </p>
                        <button class="btn btn-custom">قرأة المزيد</button>
                    </div>
                </div>
                <?php
      } 
    ?>
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
                            <a href="">

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
                    <ul>
                        <li>
                            <a href="">
                                <span>
                                    <img src="images/blog-4.jpg" alt="images">
                                </span>
                                <p>Welcome to our blog website, i will you are happy here.</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>
                                    <img src="images/blog-4.jpg" alt="images">
                                </span>
                                <p>Welcome to our blog website, i will you are happy here.</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span>
                                    <img src="images/blog-4.jpg" alt="images">
                                </span>
                                <p>Welcome to our blog website, i will you are happy here.</p>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- end latest posts -->
            </div>

        </div>
    </div>
</div>
<!--end content-->
<?php include('public/footer.php'); ?>