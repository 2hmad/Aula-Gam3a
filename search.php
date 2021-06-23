<?php
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    header('Location: search.php?k=' . $keyword);
}
?> 
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>صفحة البحث | أولي جامعه</title>
    <?php include('./includes/links.php') ?>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    <main style="margin-top:3%;">
        <div class="container">
            <form method="post">
                <label>اسم الجامعه / الكلية</label>
                <input type="text" class="form-control" name="keyword" style="max-width: 330px;" value="<?= filter_var($_GET['k'], FILTER_SANITIZE_STRING ) ?>">
                <input type="submit" class="btn btn-primary" name="search" value="بـحـث" style="margin-top:1%">
            </form>
            <div style="margin-top:5%">
                <p style="font-size: 18px;font-weight: bold;">النتائج المطابقة</p>
                <div class="row" style="gap:10px">
                    <?php
                    if (isset($_GET['k'])) {
                        $k = filter_var($_GET['k'], FILTER_SANITIZE_STRING ) ;
                        $sql = "SELECT * FROM university WHERE name LIKE '%$k%' ";
                        $query = $connect->query($sql);
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $img = $row['img'];
                            $type = $row['type'];
                            $address = $row['short_address'];
                    ?>
                      <a class="rounded m-1 mx-0 border-bottom" href="university.php?u=<?php echo "$id" ?>">
                            
                        <div class="row mx-0">
                          
                            <div class ="col m-0 p-0 m-auto">
                              <img class="rounded d-block" src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="min-width: 100%;max-width: 150px;max-height: 150px;">
                            </div>  
                            
                            <div class="col-9 w-100">
                              <h6 class="pt-2 fw-bold"><?php echo "$name" ?></h6>
                              <p class="text-muted"><i class="fas fa-map-pin" style="color:#ca0000"></i><?php echo "$address - $type" ?></p>
                            </div>
                            
                        </div>
                        
                      </a>
                   
                    <?php }} ?>
                  
                    <?php
                    if (isset($_GET['k'])) {
                        $k = filter_var($_GET['k'], FILTER_SANITIZE_STRING ) ;
                        $sql = "SELECT faculty.* , university.name as 'university_name', university.short_address as 'university_short_address' 
                        FROM faculty, university 
                        WHERE 
                        university.id = faculty.university_id 
                        AND faculty.name LIKE '%$k%'";
                        $query = $connect->query($sql);
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $university_name = $row['university_name'];
                            $university_short_address  = $row['university_short_address'];
                            $img = $row['img'];
                            $science_field_id = $row['science_field_id'];
                            $price = $row['price'];
                            $min = $row['minimum_total'];        
                     ?>
                      
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
                                        <i class="fas fa-map-pin" style="color:#ca0000"></i> 
                                        <?= $university_short_address ?>
                                      </p>
                                      
                                  </div>
                              </div>
                              
                          </div>
                      </a>
                    
                    <?php
                        }
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