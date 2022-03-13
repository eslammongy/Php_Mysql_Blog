<?php  
session_start();
include('include/DBConnection.php');
error_reporting(E_ERROR | E_PARSE);

######
$adminName = $_POST['name'];
$adminEmail = $_POST['email'];
$adminPass = $_POST['password'];
$login_btn = $_POST['btn-login'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://kit.fontawesome.com/b4d4888f22.js" crossorigin="anonymous"></script>

    <style>
    .login-form {
        width: 300px;
        margin: 80px auto;
    }

    .login-form h3 {
        color: white;
        margin-bottom: 50px;
        text-align: center;
    }

    .login-form input {
        font-size: medium;
        color: black;
        padding: 10px;
    }

    .login-form button {
        text-align: center;
        margin-top: 30px;
        margin-right: 80px;
    }
    </style>
</head>

<body>

    <div class="login-form">
        <?php  
        if(isset($login_btn)){
            if(empty($adminName) || empty($adminEmail)){
                       echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "الرجاء ادخال كلمة السر و البريد الالكتروني و الاسم الخاص بك" . "</div>";
            }else{
                $query = "SELECT * FROM admins WHERE adminEmail='$adminEmail' AND adminPass='$adminPass'";
                $result = mysqli_query($dbConnect, $query);
                $adminValue = mysqli_fetch_assoc($result);

                if(in_array($adminEmail,$adminValue) && in_array($adminPass,$adminValue)){
                      echo "<div class='alert alert-success'style='color:black;font-weight:800;text-align:center;'>" . "تم تسجيل الدخول بنجاح" . "</div>";
                      $_SESSION['id'] = $adminValue['ID'];
                      header('REFRESH:2;URL=control_panel.php');

                }else{
                          echo "<div class='alert alert-danger'style='color:black;font-weight:800;text-align:center;'>" . "البيانات المستخدمة غير متطابقة الرجاء ادخال البيانات الصحيحة" . "</div>";

                }
            }
        }
        
        ?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3>تسجيل الدخول</h3>
            <div class="form-group">
                <label for="name">اسم المستخدم</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">البريد الالكتروني</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="password">كلمة السر</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button class="btn-custom" name="btn-login">تسجيل الدخول</button>
        </form>
    </div>


    <!--Jquery and bootstrap.js-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>