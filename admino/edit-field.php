<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>تعديل مجال دراسة | أولي جامعه</title>
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
        <h4 style="font-weight: bold;margin-bottom:3%">تعديل مجال الدراسة</h4>
        <form method="POST" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">

            <?php
            if (!isset($_GET['f'])) {
            ?>

                <label>مجال الدراسة</label>
                <select name="field" id="field" placeholder="اختر مجال الدراسة">
                    <option value="">اختر مجال الدراسة</option>
                    <?php
                    $sql = "SELECT * FROM science_field";
                    $query = $connect->query($sql);
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="next" value="الخطوة التالية" class="btn btn-primary">
            <?php
                if (isset($_POST['next'])) {
                    $name = $_POST['field'];
                    header('Location: ' . $_SERVER['REQUEST_URI'] . "?f=" . $name);
                }
            } else {
                $f = $_GET['f'];
                $sql = "SELECT * FROM science_field WHERE id='$f'";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $name = $row['name'];
                    $en_name = $row['en_name'];
                    $description = $row['description'];

                    echo '
                    <label>الأسم</label>
                    <input type="text" name="name" value="' . $name . '" required>
                    <label>الاسم بالانجليزية</label>
                    <input type="text" name="en_name" value="' . $en_name . '" required>
                    <label>الوصف</label>
                    <textarea name="desc" required>' . $description . '</textarea>
                    <input type="submit" name="edit-field" value="تعديل مجال الدراسة" class="btn btn-primary">
                    ';
                    if (isset($_POST['edit-field'])) {
                        $name = $_POST['name'];
                        $en_name = $_POST['en_name'];
                        $desc = $_POST['desc'];

                        $count = $connect->prepare("UPDATE science_field SET
                        name=?,
                        en_name=?,
                        description=?
                        WHERE id='$f'");
                        $count->execute([$name, $en_name, $desc]);

                        echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>تم تعديل مجال الدراسة</div>";
                        header('refresh:2;url=dashboard.php');
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
            $('#faculty').selectize({
                sortField: 'text'
            });
        });
    </script>


</body>

</html>