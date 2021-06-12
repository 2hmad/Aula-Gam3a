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
            <div class="row" style="gap:10px">
                <?php
                if (isset($_GET['t'])) {
                    $total = $_GET['t'];
                    $sql = "SELECT * FROM faculty WHERE minimum_total <= $total AND minimum_total != '' AND minimum_total != 0";
                    $query = $connect->query($sql);
                    if($query-> rowCount() > 0) {
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $img = $row['img'];
                        $price = $row['price'];
                        $min_total = $row['minimum_total'];
                ?>
                <a class="rounded border m-2" href="faculty.php?f=<?php echo "$id" ?>">
                  <div class="card border-0">
                      <div class="row g-0">
                          <div class="col-2 col-md-4" style="display: flex;">
                              <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="width:100%;object-fit:contain">
                          </div>
                          <div class="col">
                              <div class="card-body">
                                  <h6 class="card-title"><?php echo "$name" ?></h6>
                                  <span class="card-text text-dark" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> المصاريف  : <?php
                                    if($price == "") {
                                        echo "غير محدد";
                                    } else {
                                        echo number_format($price) . " جنية /سنة";
                                    }?></span>
                                    <p class="card-text text-dark" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
                                      if($min == "") {
                                          echo "غير محدد";
                                      } else {
                                          echo "$min%";
                                      }
                                      ?>
                                    </p> 
                              </div>
                          </div>
                      </div>
                  </div>
              </a>
                    
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