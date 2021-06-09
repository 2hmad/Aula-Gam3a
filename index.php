<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>أولي جامعه - طريقك الافضل لأختيار جامعتك</title>
    <?php include('./includes/links.php') ?>
</head>

<body>
    <?php include('./includes/navbar.php') ?>

    <div class="form">
        <form method="post" action="">
            <label for="total">أدخل مجموعك</label>
            <input type="number" id="total" name="total" step="0.01" required>
            <input type="submit" class="btn btn-primary" name="find" value="بـحـث" style="display: block;margin-top: 5%;margin-right: auto;margin-left: auto;">
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
                <p style="text-align:center;font-weight: bold;font-size:17px">تصفح الجامعات</p>
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
                    $address = $row['short_address'];
                ?>
                    <div class="col-lg-2">
                        <a href="university.php?u=<?php echo "$id" ?>">
                            <div class="card" style="width: 13.75rem;padding:5px;">
                                <img src="<?php echo "$img" ?>" class="card-img-top" alt="<?php echo "$name" ?>" style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo "$name" ?></h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;    display: inline-block;white-space: nowrap;overflow: hidden !important;text-overflow: ellipsis;">العنوان : <?php echo "$address" ?></li>
                                </ul>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="container" style="margin-top:3%">
            <a href="all-fac.php">
                <p style="text-align:center;font-weight: bold;font-size:17px">تصفح الكليات</p>
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
                    <div class="col-lg-2">
                        <a href="faculty.php?f=<?php echo "$id" ?>">
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

    </div>
    <?php include('./includes/footer.php') ?>
    <?php include('./includes/scripts.php') ?>
</body>

</html>