<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <?php include('./includes/links.php') ?>
    <?php
    if (isset($_GET['f'])) {
        $f = $_GET['f'];
        $sql = "SELECT * FROM faculty WHERE id=$f";
        $query = $connect->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $query->fetch()) {
            $id = $row['id'];
            $name = $row['name'];
            $univ_id = $row['university_id'];
            $field_id = $row['science_field_id'];
            $min = $row['minimum_total'];
            $int_total = $row['internal_total'];
            $price = $row['price'];
            $update = $row['updated_at'];
            $refer = $row['refer'];
            $img = $row['img'];
        }
    } else {
        header('Location: all-fac.php');
    }
    ?>

    <title><?php echo "$name" ?> | أولي جامعه</title>
    <meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI'] ?>" />
    <meta property="og:title" content="<?php echo "$name" ?>" />
    <meta property="og:image" content="<?php echo "$img" ?>" />


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

        .faculty-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .faculty-desc {
            margin-top: 5%;
        }

        .faculty-field {
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    <main style="margin-top:3%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="name-univ-head">
                        <p style="font-size: 18px;font-weight: bold;"><?php echo "$name" ?></p>
                    </div>
                    <div class="faculty-info">
                        <img src="<?php echo "$img" ?>" alt="<?php echo "$name" ?>" style="height: 200px;width: 200px;object-fit: contain;">
                        <div style="line-height: 1em;">
                            <h5 style="font-weight: bold"><?php echo "$name" ?></h5>
                            <?php
                            $sql_unv = "SELECT * FROM university WHERE id=$univ_id";
                            $query_unv = $connect->query($sql_unv);
                            $query_unv->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row_unv = $query_unv->fetch()) {
                                $id_unv = $row_unv['id'];
                                $name_unv = $row_unv['name'];
                                $address = $row_unv['long_address'];
                            }
                            ?>
                            <p><i class="fas fa-university"></i> <a href="university.php?u=<?php echo "$id_unv" ?>"><?php echo "$name_unv" ?></a></p>
                            <p>الحد الادني : <?php echo "$min" ?></p>
                            <p>المصاريف : <?php echo "$price" ?> جنيه</p>
                        </div>
                    </div>
                    <div class="faculty-desc">
                        <span style="font-weight: bold;display:block">معلومات عن الكلية</span>
                        <br>
                        <p>العنوان بالكامل : <?php echo "$address" ?></p>
                        <p>سعر السكن الجامعي : <?php echo "$price" ?> جنيه</p>
                        <p class="text-muted"></p>
                    </div>
                    <div class="faculty-field">
                        <span style="font-weight: bold;display:block">مجال الدراسة</span>
                        <br>
                        <?php
                        $sql_unv = "SELECT * FROM science_field WHERE id=$field_id";
                        $query_unv = $connect->query($sql_unv);
                        $query_unv->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row_unv = $query_unv->fetch()) {
                            $name_field = $row_unv['name'];
                            $description_field = $row_unv['description'];
                        }
                        ?>
                        <p>مجال الدراسة : <?php echo "$name_field" ?></p>
                        <p style="text-decoration:underline">الوصف :</p>
                        <p class="text-muted"><?php echo "$description_field" ?></p>
                    </div>

                    <p></p>
                </div>

                <div class="col-lg">
                    <div class="card" style="border:none">
                        <div class="name-univ-head">
                            <p style="font-size: 18px;font-weight: bold;">الكليات الاخري</p>
                        </div>
                        <?php
                        $sql = "SELECT * FROM faculty ORDER BY RAND() LIMIT 3";
                        $query = $connect->query($sql);
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $img = $row['img'];
                        ?>
                            <a href="faculty.php?f=<?php echo "$id" ?>">
                                <div class="card mb-3 border-0">
                                    <div class="row g-0">
                                        <div class="col-md-4" style="display: flex;">
                                            <img src="<?php echo "$img" ?>" alt="<?php echo "$name" ?>" style="width:100%;object-fit:contain">
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo "$name" ?></h5>
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
        </div>
    </main>
    <?php include('./includes/scripts.php') ?>
</body>

</html>