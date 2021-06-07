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
        <h4 style="font-weight: bold;margin-bottom:3%">أضافة كلية جديدة</h4>
        <form method="post" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">
            <label>الجامعة</label>
            <select name="university">
                <option value="">اختر الجامعه</option>
                <option>جامعه الاسكندرية</option>
                <option>جامعه القاهرة</option>
            </select>
            <label>مجال الدراسة</label>
            <select name="field">
                <option value="">مجال الدراسة</option>
                <option>المحاسبة</option>
                <option>ريادة الاعمال</option>
            </select>
            <label>الحد الادني للمجموع</label>
            <input type="number" step="0.01" name="minimum">
            <label>التنسيق الداخلي</label>
            <input type="number" step="0.01" name="min-section">
            <label>المصاريف</label>
            <input type="number" step="0.01" name="cost">
            <label>تاريخ تحديث السعر والحد الادني</label>
            <input type="date" name="edit-date">
            <label>المراجع</label>
            <textarea name="references"></textarea>
            <input type="submit" name="add-fac" value="اضافة الكلية" class="btn btn-primary">
        </form>
    </div>

    <?php include('includes/scripts.php') ?>
</body>

</html>