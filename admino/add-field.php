<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>اضافة مجال دراسة | أولي جامعه</title>
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
        <h4 style="font-weight: bold;margin-bottom:3%">أضافة مجال دراسة</h4>
            
        <?php
        if (isset($_POST['add-field'])) {
            $name = $_POST['name'];
            $en_name = $_POST['en_name'];
            $description = $_POST['desc'];
            
            $sql = "INSERT INTO science_field (name, en_name, description) VALUES (?,?,?)";
            $stmt = $connect->prepare($sql);
            $connect->prepare($sql)->execute([$name, $en_name, $description]);

            echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>
              تم اضافة مجال الدراسة بفضل الله بنجاح
            </div>";
        }
        ?>
            
        <form method="post" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">
            <label>الأسم</label>
            <input type="text" name="name" required>
            <label>الاسم بالانجليزية</label>
            <input type="text" name="en_name" required>
            <label>الوصف</label>
            <textarea name="desc"></textarea>
            <input type="submit" name="add-field" value="اضافة مجال الدراسة" class="btn btn-primary">
        </form>
    </div>

    <?php include('includes/scripts.php') ?>

</body>

</html>