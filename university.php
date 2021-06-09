<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>جامعه الاسكندرية | أولي جامعه</title>
    <?php include('./includes/links.php') ?>
    <style>
        .name-univ-head {
            background-color: #4a4a4a;
            color: white;
            border-radius: 10px;
            margin-bottom: 2%;
        }

        .name-univ-head p {
            border-right: 15px solid #e83c32;
            border-top-right-radius: 10px;
            margin: 0;
            padding: 5px 10px 5px 0;
        }

        .university-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .university-desc {
            margin-top: 5%;
        }

        .releated {
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    <main style="margin-top:3%;">
        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['u'])) {
                    $u = $_GET['u'];
                    $sql = "SELECT * FROM university WHERE id=$u";
                    $query = $connect->query($sql);
                    $query->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $query->fetch()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $address = $row['long_address'];
                        $url = $row['site_url'];
                        $description = $row['description'];
                        $img = $row['img'];
                    }
                } else {
                    header('Location: all-univ.php');
                }
                ?>
                <div class="col-lg-10">
                    <div class="name-univ-head">
                        <p style="font-size: 18px;font-weight: bold;"><?php echo "$name" ?></p>
                    </div>
                    <div class="university-info">
                        <img src="<?php echo "$img" ?>" style="height: 200px;width: 200px;object-fit: contain;">
                        <div>
                            <h5 style="font-weight: bold"><?php echo "$name" ?></h5>
                            <p>العنوان بالكامل : <?php echo "$address" ?></p>
                            <a href="<?php echo "$url" ?>" style="text-decoration: underline !important" target="_blank">موقع الجامعه</a>
                        </div>
                    </div>
                    <div class="university-desc">
                        <span style="font-weight: bold;">الوصف</span>
                        <p class="text-muted"><?php echo "$description" ?></p>
                    </div>
                    <div class="releated">
                        <span style="font-weight: bold;">الكليات المتاحة</span>
                        <div class="row" style="gap: 15px">
                            <?php
                            $sql = "SELECT * FROM faculty WHERE university_id=$u";
                            $query = $connect->query($sql);
                            $query->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row = $query->fetch()) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $price = $row['price'];
                                $min = $row['minimum_total'];
                                $img = $row['img'];
                            ?>
                                <div class="col-lg-3">
                                    <a href="#">
                                        <div class="card" style="width: 13.75rem;padding:5px;">
                                            <img src="<?php echo "$img" ?>" class="card-img-top" alt="<?php echo "$name" ?>" style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo "$name" ?></h5>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">المصاريف الدراسية : <?php echo "$price" ?></li>
                                                <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">الحد الادني : <?php echo "$min" ?></li>
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>

                        </div>

                    </div>
                    <p></p>
                </div>

                <div class="col-lg">
                    <div class="card" style="border:none">
                        <div class="name-univ-head">
                            <p style="font-size: 18px;font-weight: bold;">الجامعات الاخري</p>
                        </div>
                        <?php
                            $sql = "SELECT * FROM faculty WHERE university_id=$u";
                            $query = $connect->query($sql);
                            $query->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row = $query->fetch()) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $price = $row['price'];
                                $min = $row['minimum_total'];
                                $img = $row['img'];
                            }
                        ?>

                        <a href="#">
                            <div class="card mb-3 border-0">
                                <div class="row g-0">
                                    <div class="col-md-4" style="display: flex;">
                                        <img src="https://alexu.edu.eg/templates/alexandriauniversity/images/logo-alex-en.webp" alt="..." style="width:100%;object-fit:contain">
                                    </div>
                                    <div class="col">
                                        <div class="card-body">
                                            <h5 class="card-title">جامعه الاسكندرية</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('./includes/scripts.php') ?>
</body>

</html>