<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>اضافة كلية | أولي جامعه</title>
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
        <h4 style="font-weight: bold;margin-bottom:3%">أضافة كلية جديدة. </h4>
        
        <?php
        if (isset($_POST['add-fac'])) {
            $id_univ = $_POST['university'];
            $name_fac = $_POST['name'];
            $id_field = $_POST['field'];
            $minimum = $_POST['minimum'];
            $min_dep = $_POST['min-section'];
            $cost = $_POST['cost'];
            
            $price_details = $_POST['price_details'];
            
            $edit_date = $_POST['edit-date'];
            $description = $_POST['description'];
           
            $sql = "INSERT INTO faculty (name, university_id, science_field_id, minimum_total, internal_total, price,price_details, updated_at, description, img) VALUES (?,? ,?,?,?,?,?,?,?,?)";
            $stmt = $connect->prepare($sql);
            $connect->prepare($sql)->execute([$name_fac, $id_univ, $id_field, $minimum, $min_dep, $cost, $price_details, $edit_date, $description, '']);
            
            $last_id = $connect->lastInsertId();
            $sql = "INSERT INTO log (admin_email, type, f_or_univ, target_id, description ) VALUES (?,?,?,?,?)";
            $stmt = $connect->prepare($sql);
            $connect->prepare($sql)->execute([ $_SESSION['email'] , 'add', 'f', $last_id ,
            $_SESSION['email'] . ' add fuculty  ' . $name_fac 
            ]);
            
            echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>
           تم اضافة الكلية بفضل الله بنجاح
            </div>";    
                
            
        }
        ?>
        <form method="post" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">
            <label>الجامعة</label>
            <select name="university" required>
                <option value="">اختر الجامعه</option>
                <?php
                $sql = "SELECT * FROM university";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $id_univ = $row['id'];
                    $name = $row['name'];
                    echo '<option value =' . $id_univ . '>' . $name . '</option>';
                }
                ?>
            </select>
            <label>اسم الكلية</label>
            <input type="text" name="name" placeholder="مثلا : طب بشري  ">
            <label>مجال الدراسة</label>
            <select name="field" required>
                <option value="">مجال الدراسة</option>
                <?php
                $sql = "SELECT * FROM science_field";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $field_id = $row['id'];
                    $name = $row['name'];
                    echo '<option value =' . $field_id . '>' . $name . '</option>';
                }
                ?>
            </select>
            <label>الحد الادني للمجموع</label>
            <input type="number" step="0.01" name="minimum">
            <label>التنسيق الداخلي</label>
            <input type="number" step="0.01" name="min-section">
           
            <label>المصاريف في السنه (وليس الترم) </label>
            <input type="text" name="cost" style = "text-align: left">
            <small class="text-muted">
              بنكتب السعر او بنكتب "حسب المجموع" اذا كان السعر مُعتمد ع المجموع او نظام فئات (المهم بنكتب كلمه مناسبة يعني) 
            </small>
            <br>
            
            <label> 
              تفاصيل السعر 
              <small>
                (في حاله كان مُعتمد ع المجموع مثلا)
              </small>
            </label>
            <textarea name="price_details"></textarea>
            
            <br>
            
            <label>وصف الكلية </label>
            <textarea name="description" placeholder="اي معلومات اضافيه عنها"></textarea>
           
            <label>تاريخ تحديث السعر والحد الادني</label>
            <input type="date" name="edit-date" required>
            
            <input type="submit" name="add-fac" value="اضافة الكلية" class="btn btn-primary">
        
        </form>
    </div>

    <?php include('includes/scripts.php') ?>
    
</body>

</html>