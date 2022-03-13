<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,300;0,400;0,600;1,400;1,900&display=swap"
        rel="stylesheet">
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
        <form action="">
            <h3>تسجيل الدخول</h3>
            <div class="form-group">
                <label for="name">اسم المستخدم</label>
                <input type="text" name="name" class="form-range" id="email">
            </div>
            <div class="form-group">
                <label for="email">البريد الالكتروني</label>
                <input type="email" name="email" class="form-range" id="email">
            </div>

            <div class="form-group">
                <label for="password">كلمة السر</label>
                <input type="password" name="password" class="form-range" id="password">
            </div>
            <button class="btn-custom">تسجيل الدخول</button>
        </form>
    </div>


    <!--Jquery and bootstrap.js-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>