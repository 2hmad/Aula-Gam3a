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
                    $img = $row['img'];
                    $address = $row['short_address'];
                ?>
                    <a href="university.php?u=<?php echo "$id" ?>">
                        <div class="card mb-3 border-0">
                            <div class="row g-0">
                                <div class="col-md-1">
                                    <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="width: 110px;height: 110px;object-fit: contain;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo "$name" ?></h5>
                                        <p class="card-text"><i class="fas fa-map-pin" style="color:#ca0000"></i> العنوان : <?php echo "$address" ?></p>
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
    </main>
    <?php include('./includes/footer.php') ?>
    <?php include('./includes/scripts.php') ?>
</body>

</html>