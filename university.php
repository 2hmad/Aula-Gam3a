<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <?php include('./includes/links.php') ?>

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
            $short_address = $row['short_address'];
            $url = $row['site_url'];
            $description = $row['description'];
            $img = $row['img'];
            $type = $row['type'];
        }
    } else {
        header('Location: all-univ.php');
    }
    ?>

    <title><?php echo "$name" ?> | أولي جامعه</title>
    <meta name="description" content="<?php echo "$description" ?>">
    <meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI'] ?>" />
    <meta property="og:title" content="<?php echo "$name" ?>" />
    <meta property="og:description" content="<?php echo "$description" ?>" />
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
        .hideContent {
            overflow: hidden;
            line-height: 1.5em;
            height: 3em;
        }
        .showContent {
            line-height: 1.5em;
            height: auto;
        }
        .showContent{
            height: auto;
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
                    <div class="university-info">
                        <img src="<?php echo "$img" ?>" style="height: 200px;width: 200px;object-fit: contain;">
                        <div>
                            <p class = "bg-muted p-1 rounded"><i class="fas fa-map-pin" style="color:#ca0000"></i><?php echo "$short_address" ?></p>
                            <p class = "bg-muted p-1 rounded"><i class="fas fa-university"></i> النوع : <?php echo "$type" ?></p>
                            <a href="<?php echo "$url" ?>" style="text-decoration: underline !important" target="_blank"><i class="fas fa-globe"></i> موقع الجامعه</a>
                        </div>
                    </div>

                    <div class="university-desc">
                        <span style="font-weight: bold;"><i class="fas fa-info-circle"></i>  الوصف</span>
                        <div class="text-muted content hideContent"><?php echo "$description" ?></div>
                        <div class="show-more" style="text-decoration: underline"><a href="#">رؤية المزيد</a></div>
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
                            <a href="faculty.php?f=<?php echo "$id" ?>">
                                <div class="card mb-3 border bg-gray">
                                    <div class="row g-0">
                                        <div class="col-md-1">
                                            <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="width: 100%;height: 100%;object-fit: contain;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo "$name" ?></h5>
                                                <span class="card-text text-dark" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> المصاريف الدراسية : <?php
                                                if($price == "") {
                                                    echo "غير محدد";
                                                } else {
                                                    echo number_format($price) . " جنيه";
                                                }?></span>
                                                <p class="card-text text-dark" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
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
                        $sql = "SELECT * FROM university ORDER BY RAND() LIMIT 3";
                        $query = $connect->query($sql);
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $img = $row['img'];
                            $type = $row['type'];
                        ?>
                            <a href="university.php?u=<?php echo "$id" ?>">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4" style="display: flex;">
                                            <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="width:100%;max-height:300px;object-fit:contain">
                                        </div>
                                        <div class="col">
                                            <div class="card-body bg-gray">
                                                <h6 class="card-title"><?php echo "$name - $type"  ?></h6>
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
    <?php include('./includes/footer.php') ?>
   
    <script>
    $(".show-more a").on("click", function() {
    var $this = $(this); 
    var $content = $this.parent().prev("div.content");
    var linkText = $this.text().toUpperCase();    
    
    if(linkText === "رؤية المزيد"){
        linkText = "رؤية اقل";
        $content.addClass('showContent').removeClass('hideContent');
    } else {
        linkText = "رؤية المزيد";
        $content.addClass('hideContent').removeClass('showContent');
    };

    $this.text(linkText);
    });
    </script>
</body>

</html>