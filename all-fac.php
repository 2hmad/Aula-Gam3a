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
                    ?>
                        <div class="col-lg-2">
                            <a href="faculty.php?f=<?php echo "$id"?>">
                                <div class="card" style="width: 13.75rem;padding:5px;">
                                    <img src="<?php echo "$img"?>" class="card-img-top" alt="<?php echo "$name"?>" style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo "$name"?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
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