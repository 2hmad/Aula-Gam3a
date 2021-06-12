<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>أولي جامعة - قارن بين الكليات - عليك السعي وعلي الله التوفيق</title>
    <?php include('./includes/links.php') ?>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    
    <br>
    
    <div class="form m-2 rounded border" style="margin-right: auto !important;margin-left: auto !important;">
        <form method="post" action="">
            <label for="total" class="fw-bold my-2"> 
              ابحث عن الكليات المتاحة لك من مجموعك 
            </label>
            <input type="number" id="total" name="total" step="0.01" style="direction : rlt;text-align : right"  placeholder = "اكتب النسبة المئوية لمجوعك" required>
            <input type="submit" class="btn btn-secondary" name="find" value="دووس" style="display: block;margin-top: 5%;margin-right: auto;margin-left: auto;">
        </form>
        <?php
        if (isset($_POST['find'])) {
            $total = $_POST['total'];
            header('Location: result.php?t=' . $total);
        }
        ?>
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
                    <a class="rounded m-1 mx-0" href="university.php?u=<?php echo "$id" ?>">
                          
                      <div class="row border mx-0">
                        
                          <div class="col-9 bg-gray">
                            <h5 class="pt-2 w-100"><?php echo "$name" ?></h5>
                            <p class="text-dark"><i class="fas fa-map-pin" style="color:#ca0000"></i><?php echo "$address - $type" ?></p>
                          </div>
                          
                          <div class ="col m-0 p-0">
                            <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="min-width: 100%;max-width: 100%;max-height: 150px;">
                          </div> 
                          
                      </div>
                      
                    </a>
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
                $sql = "SELECT * FROM faculty ORDER BY RAND() LIMIT 5";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $id = $row['id'];
                    $name = $row['name'];
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
                                        <h5 class="card-title p-1"><?php echo "$name" ?></h5>
                                        <span class="card-text text-dark p-1" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> المصاريف  : <?php
                                        if($price == "") {
                                            echo "غير محدد";
                                        } else {
                                            echo number_format($price) . " جنية /سنة";
                                        }?></span>
                                        <p class="card-text text-dark p-1" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
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