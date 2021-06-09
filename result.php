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
            <p style="font-size: 18px;font-weight: bold;">النتائج المطابقة</p>
            <div class="row" style="gap:10px">
                <?php
                if (isset($_GET['t'])) {
                    $total = $_GET['t'];
                    $sql = "SELECT * FROM faculty WHERE minimum_total <= $total";
                    $query = $connect->query($sql);
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $img = $row['img'];
                        $price = $row['price'];
                        $min_total = $row['minimum_total'];
                ?>
                        <div class="col-lg-2">
                            <a href="faculty.php?f=<?php echo "$id" ?>">
                                <div class="card" style="width: 13.75rem;padding:5px;">
                                    <img src="<?php echo "$img" ?>" class="card-img-top" alt="<?php echo "$name" ?>" style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo "$name" ?></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">المصاريف الدراسية : <?php echo "$price" ?> جنيه</li>
                                        <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">الحد الادني : <?php echo "$min_total" ?></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <?php include('./includes/scripts.php') ?>
</body>

</html>