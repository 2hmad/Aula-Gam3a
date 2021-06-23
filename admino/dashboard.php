<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>لوحة التحكم | أولي جامعه</title>
    <?php include './includes/links.php' ?>
    <style>
    .col-md-1 {
        width: 9.5%;
    }
    </style>
</head>

<body>
    <?php include './includes/navbar.php' ?>

    <div class="container" style="margin-top: 4%;">
        <div class="row" style="text-align:center">
            <h5 style="font-weight:bold;font-size: 1.1rem;margin-bottom: 2%;text-align:center">اختصارات الروابط
            <a href = "logs.php"> . </a>
            </h5>
            <div class="col-lg">
                <div class="row">
                    <button class="col btn btn-primary m-1 " onclick="window.location.href='./add-univ.php'"><i
                            class="fas fa-plus" style="font-size: 15px;"></i> اضافة جامعه</button>
                    <button class="col btn btn-secondary m-1 " onclick="window.location.href='./add-fac.php'"><i
                            class="fas fa-plus" style="font-size: 15px;"></i> اضافة كلية</button>
                    <button class="col btn btn-warning m-1" onclick="window.location.href='./add-field.php'"><i
                            class="fas fa-plus" style="font-size: 15px;"></i> اضافة مجال دراسة</button>
                </div>
            </div>
            <hr>
            <div class="col-lg">
                <div class="d-grid gap-2">
                 
                    <button class="btn btn-warning" onclick="window.location.href='./edit-field.php'"><i
                            class="fas fa-edit" style="font-size: 15px;"></i> تعديل مجال دراسة</button>
                  
                    <button class="btn btn-primary" onclick="window.location.href='./logs.php'">
                      
                         سجل نشاط الادخال   
                    </button>
                
                    <button class="btn btn-success" onclick="window.location.href='./tasks.php'">
                 
                      المهام 
                    </button>
                
                </div>
            </div>
            
            <div class = "alert alert-warning mt-1">
              <p class="fw-bold d-block">
                ايه الجديد ؟
              </p>
              
              <p class="text-muted">
                
               ☕ تم اضافه حقل وصف الكلية الحمد لله ،لإضافه اي معلومات عن الكليه كتابتاً
                
                 <br><br>
                 تم الحمد لله يشباب عمل صفحتين ، الاولي فيها سجل ايه الي حصل  من ادخال وتعديل من الادمنز ، 
                 <br><br>
                ، 
                اما الصفحة التانية فيها صفحة للمهمات ،زي وسيله تواصل نكتب فيها لبعض اقتراحات كل واحد يعمل ايه، بحيث ننظم الحوار اكتر 
                <br>
                وعظمه إن شاء الله 
              </p>
            </div>
        </div>

        <div class="suggestions">
            <div class="container_fluid">
                <p style="text-align:center;font-weight: bold;font-size:17px">كل الجامعات وكلياتها</p>
                <div class="row" style="gap: 15px">
                    <?php
                    $sql = "SELECT * FROM university ORDER BY id DESC ";
                    $query = $connect->query($sql);
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $img = $row['img'];
                        $address = $row['short_address'];
                        echo '
                        <div class="table-responsive">
                        
                        <p class = "fw-bold bg-muted rounded m-1 p-1" >
                         '
                         . $name . 
                         
                         '</p>
                        <table class="table table-hover" style="width: 100%;table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 130px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><span> ' . $name . ' </span></th>
                                    <th scope="col"> <i class="fas fa-money-bill-wave"></i> </th>
                                    <th scope="col"> % </th>
                                    <th scope="col"><a href="edit-univ.php?u='.$name.'"><i class="fas fa-edit"></i> </a></th>
                                </tr>
                            </thead>
                            <tbody>';

                        $sql_f = "SELECT * FROM faculty WHERE university_id = '$id'";
                        $query_f = $connect->query($sql_f);
                        $query_f->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row_f = $query_f->fetch()) {
                            $id_f = $row_f['id'];
                            $name_f = $row_f['name'];
                            $min_f = $row_f['minimum_total'];
                            $price_f = $row_f['price'];
                            echo '
                                    <tr>
                                        <td>' . $name_f . '</td>
                                        <td>' . $price_f . '</td>
                                        <td>' . $min_f . ' % </td>
                                        <td><a href="edit-fac.php?f_id=' . $id_f . '"><i class="fas fa-edit"></i></a></td>
                                    </tr>
                                    ';
                        }
                        echo '
                            </tbody>
                        </table>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <?php include './includes/scripts.php' ?>
</body>

</html>
