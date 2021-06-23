<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>لوحة التحكم | أولي جامعه</title>
    <?php include('./includes/links.php') ?>
    <style>
        .container {
            min-height: 100vh;
            
        }

        .cont-form {
            width: 600px;
            min-height: 300px;
            max-width: 100%;
            background: #f9f9f9;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 5px;
            box-shadow: -1px 2px 13px 0px white;
        }
    </style>
</head>

<body>

    <div class="container mt-5 bg-gray" style = "max-width: 90%">
        <form method="post" class="bg-white">
            <div class="cont-form">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">البريد الالكتروني</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">كلمة المرور</label>
                    <div class="col-sm-9">
                        <input type="password" name="pass" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <input type="submit" name="login" value="تسجيل الدخول" class="btn btn-primary" style="width: 150px;margin-right: auto;margin-left: auto;">
                </div>
            </div>
            <?php
            if (!isset($_SESSION['email'])) {
                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $pass = sha1($_POST['pass']);
                    if ($email !== "" && $pass !== "") {
                        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$pass'";
                        $query = $connect->query($sql);
                        $num = $query->fetchColumn();
                        if ($num > 0) {
                            $_SESSION['email'] = $email;
                            header('Location: dashboard.php');
                        } else {
                            echo '<div class="alert alert-danger">البيانات المدخلة غير صحيحة</div>';
                        }
                    }
                }
            } else {
                header('Location: dashboard.php');
            }
            ?>
        </form>
    </div>

    <?php include('./includes/scripts.php') ?>
</body>

</html>