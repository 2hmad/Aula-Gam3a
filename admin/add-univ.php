<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>اضافة جامعه | أولي جامعه</title>
    <?php include('includes/links.php') ?>
    <style>
        label {
            display: block
        }

        input,
        textarea,
        select {
            padding: 5px;
            outline: none;
            border-radius: 5px;
            border: 1px solid #CCC;
        }
    </style>
</head>

<body style="min-height:100vh">
    <?php include('includes/navbar.php') ?>
    <div class="container" style="display: flex;flex-direction: column;flex-wrap: nowrap;align-items: center;margin-top:5%;margin-bottom:5%">
        <h4 style="font-weight: bold;margin-bottom:3%">أضافة جامعة جديدة</h4>
        <form method="post" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">
            <label>الأسم</label>
            <input type="text" name="name" required>
            <label>الاسم المختصر</label>
            <input type="text" name="short-name" required>
            <label>رابط موقع الجامعه</label>
            <input type="url" name="url" required>
            <label>رابط صورة للجامعه</label>
            <input type="url" name="univ-image" required>
            <label>الوصف</label>
            <textarea name="desc" required></textarea>
            <label>نوع الجامعه</label>
            <select name="kind" required>
                <option value="">اختر نوع الجامعه</option>
                <option>خاصة</option>
                <option>أهلية</option>
            </select>
            <label>العنوان القصير</label>
            <input type="text" name="short-title" required>
            <label>العنوان الطويل</label>
            <input type="text" name="long-title" required>
            <label>تفاصيل السكن الداخلي</label>
            <textarea name="hotel" required></textarea>
            <input type="submit" name="add-univ" value="اضافة الجامعه" class="btn btn-primary">
            <?php
            if (isset($_POST['add-univ'])) {
                $name = $_POST['name'];
                $short_name = $_POST['short-name'];
                $url = $_POST['url'];
                $univ_image = $_POST['univ-image'];
                $desc = $_POST['desc'];
                $kind = $_POST['kind'];
                $short_title = $_POST['short-title'];
                $long_title = $_POST['long-title'];
                $hotel = $_POST['hotel'];
                
                $sql = "INSERT INTO university (name, short_name, site_url, img, description, type, short_address, long_address, hotel_price) VALUES (?,?,?,?,?,?,?,?,?)";
                $stmt = $connect->prepare($sql);
                $connect->prepare($sql)->execute([$name, $short_name, $url, $univ_image, $desc, $kind, $short_title, $long_title, $hotel]);

                echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>تم اضافة الجامعه بنجاح</div>";
            }
            ?>
        </form>
    </div>

    <?php include('includes/scripts.php') ?>
</body>

</html>