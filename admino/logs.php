<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>logs | أولي جامعه</title>
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
    <div class="container" >
        <h4 class="p-2 text-center" style="font-weight: bold;margin-bottom:3%"> التقارير  | بسم الله</h4>
        <?php
          $sql = "SELECT * FROM log ORDER BY id DESC ";
          $query = $connect->query($sql);
          $query->setFetchMode(PDO::FETCH_ASSOC);
          while ($row = $query->fetch()) {
              $target_id   = $row['target_id'];
              $description = $row['description'];
              echo  '<p style = "direction: ltr;text-align: left" class = "border-bottom" > ' . $target_id  . ' | ' . $description . ' </p>';
          }
          ?>

    </div>

    <?php include('includes/scripts.php') ?>

</body>

</html>