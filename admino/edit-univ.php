<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>تعديل بيانات جامعه | أولي جامعه</title>
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
    <div class="container" style="display: flex;flex-direction: column;flex-wrap: nowrap;align-items: center;margin-top:5%;margin-bottom:5%">
        <h4 style="font-weight: bold;margin-bottom:3%">تعديل بيانات جامعه</h4>
        <form method="POST" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">
            <?php
            if (!isset($_GET['u'])) {
            ?>
                <label>الجامعه</label>
                <select name="university" id="university" placeholder="اختر الجامعة">
                    <option value="">اختر الجامعه</option>
                    <?php
                    $sql = "SELECT * FROM university";
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
                    $name = $_POST['university'];
                    header('Location: ' . $_SERVER['REQUEST_URI'] . "?u=" . $name);
                }
            } else {
                $u = $_GET['u'];
                $sql = "SELECT * FROM university WHERE name='$u'";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $name = $row['name'];
                    $short_name = $row['short_name'];
                    $site_url = $row['site_url'];
                    $img = $row['img'];
                    $description = $row['description'];
                    $type = $row['type'];
                    $short_address = $row['short_address'];
                    $long_address = $row['long_address'];
                    $hotel_price = $row['hotel_price'];

                    echo '
                    <label>الأسم</label>
                    <input type="text" name="name" value="' . $name . '">
                    <label>الاسم المختصر</label>
                    <input type="text" name="short-name" id="short-name" value="' . $short_name . '">
                    <label>رابط موقع الجامعه</label>
                    <input type="url" name="url" value=' . $site_url . '>
                    <label>رابط صورة للجامعه</label>
                    <input type="text" style ="direction: ltr;text-align: left" name="univ-image" value=' . $img . '>
                    <label>الوصف</label>
                    <textarea id="desc" name="desc">' . $description . '</textarea>
                    <label>نوع الجامعه</label>
                    <select name="kind">
                        <option value="' . $type . '" hidden>' . $type . '</option>
                        <option>خاصة</option>
                        <option>أهلية</option>
                    </select>
                    <label>العنوان القصير</label>
                    <input type="text" name="short-title" value="' . $short_address . '">
                    <label>العنوان الطويل</label>
                    <input type="text" name="long-title" value="' . $long_address . '">
                    <label>تفاصيل السكن الداخلي</label>
                    <textarea name="hotel">' . $hotel_price . '</textarea>
                    <input type="submit" name="edit-univ" value="حفظ التعديلات" class="btn btn-primary">
                    <input type="button" value="حذف الجامعه" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">

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
                            <button type="submit" name="delete-univ" class="btn btn-primary">تأكيد</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    ';

                    if (isset($_POST['edit-univ'])) {
                        $name = $_POST['name'];
                        $short_name = $_POST['short-name'];
                        $url = $_POST['url'];
                        $univ_image = $_POST['univ-image'];
                        $desc = $_POST['desc'];
                        $kind = $_POST['kind'];
                        $short_address = $_POST['short-title'];
                        $long_address = $_POST['long-title'];
                        $hotel = $_POST['hotel'];

                        $sql = "UPDATE university SET 
                        name='$name',
                        short_name='$short_name',
                        site_url='$url',
                        img='$univ_image',
                        description='$desc',
                        type='$kind',
                        short_address='$short_address',
                        long_address='$long_address',
                        hotel_price='$hotel'
                        WHERE name='$u'";
                        $query = $connect->query($sql);
                        if ($query) {
                            echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>تم تعديل بيانات الكلية</div>";
                            header('refresh:2;url=dashboard.php');
                        }

                    }
                    if (isset($_POST['delete-univ'])) {
                        $u = $_GET['u'];
                        $sql_delete = "DELETE FROM university WHERE name='$u'";
                        $query_delete = $connect->query($sql_delete);
                        if ($query_delete) {
                            echo "<script>alert('تم حذف الكلية بنجاح')</script>";
                            header('Location: edit-univ.php');
                        }
                    }
                }
            }
            ?>
        </form>

    </div>
    <?php include('includes/scripts.php') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script>
        $(document).ready(function() {
            $('#university').selectize({
                sortField: 'text'
            });
        });
    </script>

</body>

</html>