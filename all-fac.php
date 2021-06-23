<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>جميع الكليات | أولي جامعه</title>
    <?php include('./includes/links.php') ?>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    <main style="margin-top:3%;">
        <div class="container">
            <p style="font-size: 18px;font-weight: bold;">الكليات المتاحة</p>
            <div class="row" style="gap:10px">
                <div class="row" style="gap:10px">
                 <?php
                  $sql = "SELECT   faculty.* , university.name as 'university_name'  FROM faculty, university 
                          WHERE
                          university.id = faculty.university_id
                          ORDER BY id DESC";
                  $query = $connect->query($sql);
                  $query->setFetchMode(PDO::FETCH_ASSOC);
                  while ($row = $query->fetch()) {
                      $id = $row['id'];
                      $name = $row['name'];
                      $university_name = $row['university_name'];
                      $img = $row['img'];
                      $price = $row['price'];
                      $min = $row['minimum_total'];
                  ?>
  
                      <a class="border bg-gray rounded m-1" href="faculty.php?f=<?php echo "$id" ?>">
                          <div class="card mb-3 border-0 px-0">
                              <div class="row px-0">
                                  <div class="col px-0">
                                      <div class="card-body p-0">
                                          <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" class ="d-block m-auto" style="max-width: 100%;max-height: 310px;">
                                          <h6 class="card-title fw-bold p-1"><?= $name . ' - ' . $university_name ?></h5>
                                          <span class="card-text text-muted p-1" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i>
                                          المصاريف  : 
                                          <?= price_format($price); ?>
                                          </span>
                                          <p class="card-text text-muted p-1" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
                                          if($min == "") {
                                              echo "غير محدد";
                                          } else {
                                              echo "$min%";
                                          }
                                          ?></p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>
                  <?php
                  }
                  ?>
                    
                </div>

            </div>
        </div>
    </main>
    <?php include('./includes/footer.php') ?>
    <?php include('./includes/scripts.php') ?>
</body>

</html>