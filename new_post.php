<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,300;0,400;0,600;1,400;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/b4d4888f22.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- start dashboard content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" id="right-area">
                    <h3>Control Panel</h3>
                    <ul>
                        <li>
                            <a href="control_panel.html">
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
                                <a href="new_post.html">
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
                            <a href="index.html">
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


    <!--Jquery and bootstrap.js-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>