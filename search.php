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
                <input type="text" class="form-control" name="keyword" style="max-width: 330px;" value="<?php if (isset($_GET['k'])) {
                                                                                                            $k = $_GET['k'];
                                                                                                            echo "$k";
                                                                                                        } ?>">
                <input type="submit" class="btn btn-primary" name="search" value="بـحـث" style="margin-top:1%">
            </form>
            <?php
            if (isset($_POST['search'])) {
                $keyword = $_POST['keyword'];
                header('Location: search.php?k=' . $keyword);
            }
            ?>
            <div style="margin-top:5%">
                <p style="font-size: 18px;font-weight: bold;">النتائج المطابقة</p>
                <div class="row" style="gap:10px">
                    <?php
                    if (isset($_GET['k'])) {
                        $k = $_GET['k'];
                        $sql = "SELECT * FROM university WHERE name LIKE '%$k%' ";
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
                    }
                    ?>
                                        <?php
                    if (isset($_GET['k'])) {
                        $k = $_GET['k'];
                        $sql = "SELECT * FROM faculty WHERE name LIKE '%$k%'";
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
                                        <p class="card-text" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
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