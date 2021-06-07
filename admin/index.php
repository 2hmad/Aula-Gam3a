<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>لوحة التحكم | أولي جامعه</title>
    <?php include('../includes/links.php') ?>
    <style>
        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
            box-shadow: -1px 2px 13px 0px #e6e6e6;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="cont-form">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-3 col-form-label">البريد الالكتروني</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-3 col-form-label">كلمة المرور</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword">
                </div>
            </div>
            <div class="mb-3 row">
                <input type="submit" name="login" value="تسجيل الدخول" class="btn btn-primary" style="width: 150px;margin-right: auto;margin-left: auto;">
            </div>
        </div>
    </div>

    <?php include('../includes/scripts.php') ?>
</body>

</html>