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
                    ?>
                            <div class="col-lg-2">
                                <a href="university.php?u=<?php echo $id ?>">
                                    <div class="card" style="width: 13.75rem;padding:5px;">
                                        <img src="<?php echo "$img" ?>" class="card-img-top" alt="<?php echo "$name" ?>" style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo "$name" ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
                    ?>
                            <div class="col-lg-2">
                                <a href="faculty.php?f=<?php echo $id ?>">
                                    <div class="card" style="width: 13.75rem;padding:5px;">
                                        <img src="<?php echo "$img" ?>" class="card-img-top" alt="<?php echo "$name" ?>" style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo "$name" ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
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