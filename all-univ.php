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
                    <div class="col-lg-2">
                        <a href="university.php?u=<?php echo "$id" ?>">
                            <div class="card" style="width: 13.75rem;padding:5px;min-height: 250px;">
                                <img src="<?php echo "$img" ?>" class="card-img-top" alt="<?php echo "$name" ?>" style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo "$name" ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
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