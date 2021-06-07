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
            <input type="text" name="name">
            <label>الاسم المختصر</label>
            <input type="text" name="short-name">
            <label>رابط موقع الجامعه</label>
            <input type="url" name="url">
            <label>رابط صورة للجامعه</label>
            <input type="url" name="univ-image">
            <label>الوصف</label>
            <textarea name="desc"></textarea>
            <label>نوع الجامعه</label>
            <select name="kind">
                <option value="">اختر نوع الجامعه</option>
                <option>خاصة</option>
                <option>أهلية</option>
            </select>
            <label>العنوان القصير</label>
            <input type="text" name="short-title">
            <label>العنوان الطويل</label>
            <input type="url" name="univ-image">
            <label>تفاصيل السكن الداخلي</label>
            <textarea name="hotel"></textarea>
            <input type="submit" name="add-univ" value="اضافة الجامعه" class="btn btn-primary">
        </form>
    </div>

    <?php include('includes/scripts.php') ?>
</body>

</html>