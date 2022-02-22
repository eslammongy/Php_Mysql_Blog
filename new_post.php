<?php
include ('include/header.php');
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
                        <form action="">
                            <div class="form-group">
                                <label for="post_title">Title</label>
                                <input type="text" name="post_title" class="form-control" style="background-color: white;">
                            </div>
                            <div class="form-group">
                                <label for="post_tag">Tag</label>
                                <select name="post_tag" id="post_tag" class="form-control">
                                    <option value="">Android</option>
                                     <option value="">Flutter</option>
                                      <option value="">Front End</option>
                                       <option value="">Back End</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="post_image">
                                   Post Image
                                </label>
                                <input type="file" id="post_image" class="form-control" style="background-color: white;">

                            </div>
                            <div class="form-group">
                                <label for="post_content">Content</label>
                                <textarea cols="30" rows="10" name="post_content" class="form-control">

                                </textarea>
                            </div>
                            <button class="btn-custom">Share</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end dashboard content -->

<?php
include ('include/footer.php');
?>