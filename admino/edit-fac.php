<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>تعديل بيانات كلية | أولي جامعه</title>
    <?php include('includes/links.php') ?>
    <script src="https://cdn.tiny.cloud/1/lci9jcx8cwzf3c52un3vk7bjcsbc4pvrhvvs01q8zhpe6j33/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
    <div class="container"
        style="display: flex;flex-direction: column;flex-wrap: nowrap;align-items: center;margin-top:5%;margin-bottom:5%">
        <h4 style="font-weight: bold;margin-bottom:3%">تعديل بيانات كلية</h4>
        <form method="POST" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">

            <?php
            if (!isset($_GET['f'])) {
            ?>

            <label>الكلية</label>
            <select name="faculty" id="faculty" placeholder="اختر الكلية">
                <option value="">اختر الكلية</option>
                <?php
                    $sql = "SELECT * FROM faculty";
                    $query = $connect->query($sql);
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $name = $row['name'];
                        echo '<option>' . $name . '</option>';
                    }
                    ?>
            </select>
            <input type="submit" name="next" value="الخطوة التالية" class="btn btn-primary">
            <?php
                if (isset($_POST['next'])) {
                    $name = $_POST['faculty'];
                    header('Location: ' . $_SERVER['REQUEST_URI'] . "?f=" . $name);
                }
            } else {
                $f = $_GET['f'];
                $sql = "SELECT * FROM faculty WHERE name='$f'";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $name = $row['name'];
                    $university_id = $row['university_id'];
                    $science_field_id = $row['science_field_id'];
                    $minimum_total = $row['minimum_total'];
                    $internal_total = $row['internal_total'];
                    $price = $row['price'];
                    $updated_at = $row['updated_at'];
                    $refer = $row['refer'];
                    $img = $row['img'];

                    echo '
                    <label>اسم الكلية</label>
                    <input type="text" name="name" value="' . $name . '">                
                    <label>مجال الدراسة</label>
                    <select name="field">
                    ';
                    $sql_s = $connect->query("SELECT * FROM science_field");
                    $science = $sql_s->fetchAll();
                    foreach ($science as $sciences) {
                        $sql_f = $connect->query("SELECT * FROM science_field WHERE id='$science_field_id'");
                        $science = $sql_f->fetchAll();
                        foreach ($science as $science) {
                            echo '<option value="' . $science['id'] . '" hidden>' . $science['name'] . '</option>';
                            echo '<option value="' . $sciences['id'] . '">' . $sciences['name'] . '</option>';
                        }
                    }
                    echo '
                    </select>
                    <label>الحد الادني للمجموع</label>
                    <input type="number" step="0.01" name="minimum" value="' . $minimum_total . '">
                    <label>التنسيق الداخلي</label>
                    <input type="number" step="0.01" name="min-section" value="' . $internal_total . '">
                    <label>المصاريف</label>
                    <input type="number" step="0.01" name="cost" value="' . $price . '">
                    <label>صورة الكلية</label>
                    <input type="text" style ="direction: ltr;text-align: left" name="img" value="' . $img . '">
                    <label>تاريخ تحديث السعر والحد الادني</label>
                    <input type="date" name="edit-date" value="' . $updated_at . '">
                    <label>المراجع</label>
                    <textarea id="references" name="references">' . $refer . '</textarea>
                    <input type="submit" name="edit-fac" value="تعديل الكلية" class="btn btn-primary">
                    <input type="button" value="حذف الكلية" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">متأكد من عملية الحذف ؟</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            هل انت متأكد ؟
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                            <button type="submit" name="delete-fac" class="btn btn-primary">تأكيد</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    ';
                    if (isset($_POST['edit-fac'])) {
                        $name = $_POST['name'];
                        $field = $_POST['field'];
                        $min = $_POST['minimum'];
                        $min_s = $_POST['min-section'];
                        $price = $_POST['cost'];
                        $date = $_POST['edit-date'];
                        $ref = $_POST['references'];
                        $img = $_POST['img'];

                        $count = $connect->prepare("UPDATE faculty SET
                        name=?,
                        science_field_id=?,
                        minimum_total=?,
                        internal_total=?,
                        price=?,
                        updated_at=?,
                        refer=?,
                        img=?
                        WHERE name='$f'");
                        $count->execute([$name, $field, $min, $min_s, $price, $date, $ref, $img]);

                        echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>تم تعديل بيانات الكلية</div>";
                        header('refresh:2;url=dashboard.php');
                    }
                    if (isset($_POST['delete-fac'])) {
                        $sql = "DELETE FROM faculty WHERE name='$f'";
                        if ($connect->query($sql)) {
                            echo "<script>alert('تم حذف الكلية بنجاح')</script>";
                            header('Location: edit-fac.php');
                        }
                    }
                }
            }
            ?>
        </form>
    </div>

    <?php include('includes/scripts.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script>
    $(document).ready(function() {
        $('#faculty').selectize({
            sortField: 'text'
        });
    });
    </script>
</body>

</html>