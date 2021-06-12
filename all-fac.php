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
                    $sql = "SELECT * FROM faculty ORDER BY id DESC";
                    $query = $connect->query($sql);
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $img = $row['img'];
                        $price = $row['price'];
                        $min = $row['minimum_total'];
                    ?>
                        <a href="faculty.php?f=<?php echo "$id" ?>">
                            <div class="card mb-3 border-0">
                                <div class="row g-0">
                                    <div class="col-md-1">
                                        <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="width: 110px;height: 110px;object-fit: contain;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo "$name" ?></h5>
                                            <span class="card-text" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> المصاريف الدراسية : <?php
                                        if($price == "") {
                                            echo "غير محدد";
                                        } else {
                                            echo number_format($price) . " جنيه";
                                        }?></span>
                                            <p class="card-text" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php if ($min == "") { echo "غير محدد"; } else { echo "$min%"; }?></p>
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