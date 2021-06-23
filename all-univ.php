<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>جميع الجامعات | أولي جامعه</title>
    <?php include('./includes/links.php') ?>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    <main style="margin-top:3%;">
        <div class="container">
            <p style="font-size: 18px;font-weight: bold;">الجامعات المتاحة</p>
            <div class="row" style="gap:10px">
                <?php
                $sql = "SELECT * FROM university ORDER BY id DESC";
                $query = $connect->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $query->fetch()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $type= $row['type'];
                    $img = $row['img'];
                    $address = $row['short_address'];
                ?>
                  <a class="rounded m-1 mx-0 border-bottom" href="university.php?u=<?php echo "$id" ?>">
                      
                      <div class="row">
                        
                        <div class "col-3" >
                          <img class=" rounded " src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="min-width:40px;max-width: 60px;max-height: 40px;">
                        </div>
                        <div class="col">
                          <h6 class="pt-2 fw-bold"><?php echo "$name" ?></h6>
                          <p class="text-muted"><i class="fas fa-map-pin" style="color:#ca0000"></i><?php echo "$address - $type" ?></p>
                        </div>
                        
                      </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
    <?php include('./includes/footer.php') ?>
    <?php include('./includes/scripts.php') ?>
</body>

</html>