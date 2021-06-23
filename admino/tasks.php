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
        <h4 style="font-weight: bold;margin-bottom:3%"> 
          Tasks 
        </h4>
        <form method="POST" style="width: 550px;max-width:100%;display: flex;flex-direction: column;gap:10px">
           
           <?php 
            $sql = "SELECT * FROM tasks WHERE id= 1 ";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                
                  $mohamed = $row['mohamed'];
                  $salma = $row['salma'];
                  $elnajar = $row['elnajar'];
                    
           ?>
            <label>
              الي محمود مجدي 
            </label>
            <textarea name = "mohamed" placeholder=" هنا بتكتب اي رساله او اقتراح للمحمود مجدي ، مثلا 'من محمود النجار : ياريت نعمل كذا' ">
              <?= $mohamed ?>
            </textarea>
            
            <br>
            
            <label>
              الي سلمي 
            </label>
            <textarea name = "salma" placeholder="هنا مثلا بما ان محمد ادخل اغلب الجامعات وعارف ايه الجامعات الي ناقصه والي محتاجه تعديل، فمككن يقترح هنا لسلمي تولي جامعه كذا وكذا بينما هو ماسك جامعه كذا.... وهكذا ">
              <?= $salma ?>
            </textarea>
            
            <br>
            
            <label>
                          الي محمود النجار 
            </label>
            <textarea name = "elnajar" placeholder="هنا بتقرحوا عليا اي تعديلات برمجية ،مثال : 'من محمود مجدي :  ياريت تعدل اللون في صفحة كذا' ">
              <?= $elnajar ?>
            </textarea>
            
            <?php } ?>
            <input type="submit" name="edit-tasks" value="تعديل  " class="btn btn-primary">
                   
            <?php
            if (isset($_POST['edit-tasks'])) {
                $mohamed = $_POST['mohamed'];
                $salma = $_POST['salma'];
                $elnajar = $_POST['elnajar'];
                
                $sql = "UPDATE tasks SET 
                
                        mohamed='$mohamed',
                        salma='$salma',
                        elnajar='$elnajar'
                        
                        WHERE id= 1 ";
                        
                        $query = $connect->query($sql);
                        if ($query) {
                            
                            $sql = "INSERT INTO log (admin_email, type, f_or_univ, target_id, description ) VALUES (?,?,?,?,?)";
                            $stmt = $connect->prepare($sql);
                            $connect->prepare($sql)->execute([ $_SESSION['email'] , 'edit', 'task', 1 ,
                            $_SESSION['email'] . ' edit tasks  '  
                            ]);
                      
                            echo "<div class='alert alert-success' style='width:100%;margin-top:3%'>تم  التعديل   </div>";
                            header('location: tasks.php' );
                        
                          
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
