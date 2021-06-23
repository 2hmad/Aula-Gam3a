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
            
              $f_id = $_GET['f_id'];
              $sql = "SELECT * FROM faculty WHERE id='$f_id'";
              $query = $connect->query($sql);
              $query->setFetchMode(PDO::FETCH_ASSOC);
              while ($row = $query->fetch()) {
                  $name = $row['name'];
                  $university_id = $row['university_id'];
                  $science_field_id = $row['science_field_id'];
                  $minimum_total = $row['minimum_total'];
                  $internal_total = $row['internal_total'];
                  $price = $row['price'];
                  $price_details = $row['price_details'];
                  $updated_at = $row['updated_at'];
                  $description = $row['description'];
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
                  
                  <label>المصاريف في السنه (وليس الترم) </label>
                  <input type="text" name="cost" value="' . $price . '">
                  
                  <br>
                  <label> 
                    تفاصيل السعر 
                    <small>
                      (في حاله كان مُعتمد ع المجموع مثلا)
                    </small>
                  </label>
                  <textarea name="price_details">' . $price_details . '</textarea>
                  
                  <label>صورة الكلية</label>
                  <input type="text" style ="direction: ltr;text-align: left" name="img" value="' . $img . '">
                  <label>تاريخ تحديث السعر والحد الادني</label>
                  <input type="date" name="edit-date" value="' . $updated_at . '">
                  <label> وصف الكلية <label>
                  <textarea id="description" name="description" placeholder = " اي معلومات اضافيه عنها " >' . $description . '</textarea>
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
                      
                      $price_details = $_POST['price_details'];
                      
                      $date = $_POST['edit-date'];
                      $description = $_POST['description'];
                      $img = $_POST['img'];

                      $count = $connect->prepare("UPDATE faculty SET
                      name=?,
                      science_field_id=?,
                      minimum_total=?,
                      internal_total=?,
                      price=?,
                      price_details=?, 
                      updated_at=?,
                      description=?,
                      img=?
                      WHERE id='$f_id'");
                      $count->execute([$name, $field, $min, $min_s, $price,$price_details, $date, $description , $img]);
                      
                      $sql = "INSERT INTO log (admin_email, type, f_or_univ, target_id, description ) VALUES (?,?,?,?,?)";
                      $stmt = $connect->prepare($sql);
                      $connect->prepare($sql)->execute([ $_SESSION['email'] , 'edit', 'f', $f_id ,
                      $_SESSION['email'] . ' edit fuculty  ' . $name 
                      ]);
                      
                      
                      echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>تم تعديل بيانات الكلية</div>";
                      header('Location: edit-fac.php?f_id='. $f_id );
                  }
                  if (isset($_POST['delete-fac'])) {
                      $sql = "DELETE FROM faculty WHERE id='$f_id'";
                      if ($connect->query($sql)) {
                          echo "<script>alert('تم حذف الكلية بنجاح')</script>";
                          header('Location: edit-fac.php');
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