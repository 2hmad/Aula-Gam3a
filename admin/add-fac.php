<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>اضافة كلية | أولي جامعه</title>
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
                <?php
                $sql = "SELECT * FROM university";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $id_univ = $row['id'];
                    $name = $row['name'];
                    echo '<option>' . $name . '</option>';
                }
                ?>
            </select>
            <label>اسم الكلية</label>
            <input type="text" name="name">
            <label>مجال الدراسة</label>
            <select name="field">
                <option value="">مجال الدراسة</option>
                <?php
                $sql = "SELECT * FROM science_field";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    echo '<option>' . $name . '</option>';
                }
                ?>
            </select>
            <label>الحد الادني للمجموع</label>
            <input type="number" step="0.01" name="minimum">
            <label>التنسيق الداخلي</label>
            <input type="number" step="0.01" name="min-section">
            <label>المصاريف</label>
            <input type="number" step="0.01" name="cost">
            <label>تاريخ تحديث السعر والحد الادني</label>
            <input type="date" name="edit-date">
            <label>صورة للكلية</label>
            <input type="url" name="img">
            <label>المراجع</label>
            <textarea name="references"></textarea>
            <input type="submit" name="add-fac" value="اضافة الكلية" class="btn btn-primary">
        </form>
        <?php
        if (isset($_POST['add-fac'])) {
            $university = $_POST['university'];
            $name_fac = $_POST['name'];
            $field = $_POST['field'];
            $minimum = $_POST['minimum'];
            $min_dep = $_POST['min-section'];
            $cost = $_POST['cost'];
            $edit_date = $_POST['edit-date'];
            $img = $_POST['img'];
            $references = $_POST['references'];

            $sql_check = "SELECT * FROM university WHERE name='$university'";
            $query_check = $connect->query($sql_check);
            $query_check->setFetchMode(PDO::FETCH_ASSOC);
            while ($row_check = $query_check->fetch()) {
                $id_univ = $row_check['id'];
                $name = $row_check['name'];
                $sql_check_two = "SELECT * FROM science_field WHERE name='$field'";
                $query_check_two = $connect->query($sql_check_two);
                $query_check_two->setFetchMode(PDO::FETCH_ASSOC);
                while ($row_check_two = $query_check_two->fetch()) {
                    $id_field = $row_check_two['id'];
                    $sql = "INSERT INTO faculty (name, university_id, science_field_id, minimum_total, internal_total, price, updated_at, refer, img) VALUES (?,?,?,?,?,?,?,?,?)";
                    $stmt = $connect->prepare($sql);
                    $connect->prepare($sql)->execute([$name_fac, $id_univ, $id_field, $minimum, $min_dep, $cost, $edit_date, $references, $img]);
                    echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>تم اضافة الكلية بنجاح</div>";    
                }
            }
        }
        ?>
    </div>

    <?php include('includes/scripts.php') ?>
</body>

</html>