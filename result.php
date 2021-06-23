<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>نتائج البحث | أولي جامعه</title>
    <?php include('./includes/links.php') ?>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    <main style="margin-top:3%;">
        <div class="container">
            <div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> بعض الجامعات لا تظر في البحث لانه لم يتم تحديد الحد الادني للمجموع الخاص بها حتي الان</div>
            <p style="font-size: 18px;font-weight: bold;">النتائج المطابقة</p>
            <div class="row p-1" style="gap:10px">
                <?php
                if (isset($_GET['t'])) {
                    $total = filter_var($_GET['t'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ) ;
                    $sql = "SELECT  faculty.* , university.name as 'university_name', university.short_address as 'university_short_address' FROM faculty, university
                            WHERE 
                            minimum_total <= $total AND minimum_total != '' AND minimum_total != 0 
                            AND 
                            university.id = faculty.university_id
                            ORDER BY minimum_total DESC ";
                    $query = $connect->query($sql);
                    if($query-> rowCount() > 0) {
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $id               = $row['id'];
                        $name             = $row['name'];
                        $university_name  = $row['university_name'];
                        $university_short_address  = $row['university_short_address'];
                        $img              = $row['img'];
                        $price            = $row['price'];
                        $science_field_id = $row['science_field_id'];
                        $min              = $row['minimum_total'];
                ?>
                  <div class = "col-12">
                    <a class="" href="faculty.php?f=<?php echo "$id" ?>">
                        <div class="row border bg-gray rounded m-1">
                            <div class="col px-0">
                                <div class=" p-0">
                                    <img onerror="this.src='/imgs/<?= $science_field_id ?>.jpg';" src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" class ="d-block m-auto" style="max-width: 100%;max-height: 310px;">
                                    
                                    <p class="fw-bold p-1"><?= $name . ' - ' . $university_name ?></p>
                                    <span class="text-muted p-1" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i>
                                    المصاريف  : 
                                    <?= price_format($price); ?>
                                    </span>
                                    <p class=" text-muted p-1" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
                                      if($min == "") {
                                          echo "غير محدد";
                                      } else {
                                          echo "$min%";
                                      }
                                      ?>
                                    </p>
                                    <p class="text-muted">
                                      <i class="fas fa-map-pin" style="color:#ca0000"> </i>
                                      <?= $university_short_address ?>
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    </a>
                  </div>
                <?php
                    }
                } else {
                    echo "<p>نأسف! لا توجد بيانات مناسبة لعرضها</p>";
                }
                }
                ?>
            </div>
        </div>
    </main>
    <?php include('./includes/scripts.php') ?>
</body>

</html>