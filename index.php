<?php
include('public/header.php');
include 'include/DBConnection.php';
error_reporting(E_ERROR | E_PARSE);

?>
<!--start content-->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                $query = "SELECT * FROM posts ORDER BY PostDate DESC";
                $result = mysqli_query($dbConnect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <div class="post">
                    <div class="post-image">
                        <img src="uploadImage/postImage/<?php echo$row['PostImage'] ?>" alt="blog-image">
                    </div>
                    <a href="post_info.php?PostID=<?php echo $row['PostID'] ?>">
                        <div class="post-title"><strong><?php echo $row['PostTitle'] ?></strong></div>
                    </a>
                    <div class="post-details">
                        <p class="postContent"><?php
                        if(strlen($row['PostContent']) > 150){
                            $row['PostContent'] = substr($row['PostContent'], 0 , 410). "...";
                        }
                        echo $row['PostContent'];
                        ?>
                        </p>
                        <p class="post-info">
                            <!--    <span>
                                <span><i class="fa-solid fa-user"></i> <?php echo $row['PostAuther'] ?></span>

                            </span> -->
                            <span>
                                <span><i class="fa-solid fa-calendar"></i> <?php echo $row['PostDate'] ?></span>

                            </span>
                            <span>

                                <span><i class="fa-solid fa-tags"></i> <?php echo $row['PostTag'] ?></span>

                            </span>
                        </p>
                        <a href="post_info.php?PostID=<?php echo $row['PostID'] ?>">
                            <button class="btn btn-custom">???????? ????????????</button>
                        </a>

                    </div>
                </div>
                <?php
      } 
    ?>
            </div>
            <div class="col-md-3">
                <!-- start category section -->
                <div class="categories">
                    <h3>????????????</h3>
                    <ul>
                        <?php 
                        $query = "SELECT * FROM categories ORDER BY CategoryDate DESC";
                        $result = mysqli_query($dbConnect, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                        <li>
                            <a href="category.php?CategoryName=<?php echo $row['CategoryName'] ?>">

                                <span><?php echo $row['CategoryName'] ?> <i class="fa-solid fa-tags"></i></span>
                                <span> </span>
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
                    <h3>???????? ????????????????</h3>
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