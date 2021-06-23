<?php
  if (isset($_POST['find'])) {
  $total = $_POST['total'];
  header('Location: result.php?t=' . $total);
  }
?> 
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>أولي جامعة - قارن بين الكليات - عليك السعي وعلي الله التوفيق</title>
    <?php include('./includes/links.php') ?>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    
    <br>
    
    <div class="form m-2 rounded border" style="background: rgb(34,193,195);background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%); margin-right: auto !important;margin-left: auto !important;">
        <form method="post" action="">
            <label for="total" class="fw-bold my-2"> 
              ابحث عن الكليات المتاحة لك من مجموعك 
            </label>
            <input type="number" id="total" name="total" step="0.01" style="direction : rlt;text-align : right"  placeholder = "اكتب النسبة المئوية لمجوعك" required>
            <input type="submit" class="btn btn-secondary" name="find" value="دووس" style="display: block;margin-top: 5%;margin-right: auto;margin-left: auto;">
        </form>
    </div>
    
    <div class="suggestions">

        <div class="container">
            <a href="all-univ.php">
                <h3 class="heading text-dark fw-bold">
                  تصفح الجامعات
                </h3> 
            </a>
            <div class="row" style="gap: 15px">
                <?php
                $sql = "SELECT * FROM university ORDER BY RAND() LIMIT 5";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $img = $row['img'];
                    $type = $row['type'];
                    $address = $row['short_address'];
                ?>
                  <div class ="col-12">
                    
                    <a class="rounded m-1 mx-0 border-bottom" href="university.php?u=<?php echo "$id" ?>">
                      
                      <div class="row">
                         
                        <img class=" col-3 rounded " src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="min-width:40px;max-width: 60px;max-height: 40px;">
                        
                        <div class="col">
                          <h6 class="pt-2 fw-bold"><?php echo "$name" ?></h6>
                          <p class="text-muted"><i class="fas fa-map-pin" style="color:#ca0000"></i><?php echo "$address - $type" ?></p>
                        </div>
                        
                      </div>
                    </a>
                  </div>
                <?php
                }
                ?>
                
                <a class="fw-bold text-center my-3" href="all-univ.php">
                  عرض كل الجامعات
                </a>
            </div>
        </div>

        <div class="container" style="margin-top:3%">
            <a href="all-fac.php">
                <h3 class="heading text-dark fw-bold">
                  تصفح الكليات
                </h3>
            </a>
            <div class="row" style="gap: 15px">
                <?php
                $sql = "SELECT   faculty.* , university.name as 'university_name'  FROM faculty, university 
                        WHERE
                        university.id = faculty.university_id
                        ORDER BY RAND() LIMIT 7";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $university_name = $row['university_name'];
                    $img = $row['img'];
                    $science_field_id = $row['science_field_id'];
                    $price = $row['price'];
                    $min = $row['minimum_total'];
                ?>

                    <a class="border bg-gray rounded m-1" href="faculty.php?f=<?php echo "$id" ?>">
                        <div class="card mb-3 border-0 px-0">
                            <div class="row px-0">
                                <div class="col px-0">
                                    <div class="card-body p-0">
                                        
                                        <img onerror="this.src='/imgs/<?= $science_field_id ?>.jpg';" src="<?= $img ?>" alt="<?php echo "$name" ?>" class ="d-block m-auto" style="max-width: 100%;max-height: 310px;">
                                        
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
                
                <a class="fw-bold text-center my-3" href="all-fac.php">
                  عرض كل الكليات
                </a>
                
            </div>
        </div>

    </div>
    <?php include('./includes/footer.php') ?>
    <?php include('./includes/scripts.php') ?>
</body>

</html>