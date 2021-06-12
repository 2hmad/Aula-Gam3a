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

    <title> 
    <?php 
      if($price !== "") {
        echo "$price / سنه ";
      } 
    ?> 
    - 
    <?php 
      if($min !== "") {
        echo  "$min%";
      } 
      ?>
      - 
      <?= $name ?> | أولي جامعه</title>
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
            gap: 15px;
        }

        .faculty-desc {
            margin-top: 5%;
        }

        .faculty-field {
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
                    <div class="faculty-info">
                        <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="height: 200px;width: 180px;object-fit: contain;">
                        <div style="line-height: 1em;">
                            <?php
                            $sql_unv = "SELECT * FROM university WHERE id=$univ_id";
                            $query_unv = $connect->query($sql_unv);
                            $query_unv->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row_unv = $query_unv->fetch()) {
                                $id_unv        = $row_unv['id'];
                                $name_unv      = $row_unv['name'];
                                $description   = $row_unv['description'];
                                $type          = $row_unv['type']; 
                                $hotel_price   = $row_unv['hotel_price'];
                                $short_address = $row_unv['short_address'];
                                $address       = $row_unv['long_address'];
                            }
                            ?>
                            <p class="p-1 m-1 bg-muted rounded" ><i class="fas fa-university"></i> <a class="text-primary" href="university.php?u=<?php echo "$id_unv" ?>"><?php echo "$name_unv" ?></a></p>
                            <p class="p-1 m-1 bg-muted rounded fw-bold"><?= $type ?></p>
                            <p class="p-1 m-1 bg-muted rounded"><i class="fas fa-map-pin"></i> <?= $short_address ?></p>
                            <p class="p-1 m-1 bg-muted rounded"> الحد الادني : <?php if($min == "") { echo "غير محدد"; } else { echo "$min%"; } ?></p>
                            <p class="p-1 m-1 bg-muted rounded"><i class="fas fa-money-bill-wave"></i> <?php if($price == "") { echo "غير محدد"; } else { echo "$price / سنه "; } ?></p>
                        </div>
                    </div>
                    <div class="faculty-desc">
                        <h2  style="color: #C97D60 ;font-weight: bold;display:block"><i class="fas fa-info-circle"></i> معلومات عن الجامعة</h3>
                        <br>
                        <p>
                          <i class="fas fa-map-pin" style="color:#ca0000"></i> 
                          <?php echo "$address" ?>
                        </p>
                        <div class="university-desc">
                          </span class ="fw-bold" ><i class="fas fa-info-circle"></i> الوصف </span>
                          <div class="text-muted content hideContent"><?php echo "$description" ?></div>
                          <div class="show-more p-1" style="background: var(--light);text-decoration: underline"><a href="#">رؤية المزيد</a></div>
                        </div>
                    </div>
                    <div class="faculty-desc">
                        <span style="font-weight: bold;display:block"><i class="fas fa-house-user"></i> معلومات عن السكن الجامعي</span>
                        <br>
                        <p><?php echo $hotel_price ?></p>
                    </div>
                    <div class="faculty-field">
                        <?php
                        $sql_unv = "SELECT * FROM science_field WHERE id=$field_id";
                        $query_unv = $connect->query($sql_unv);
                        $query_unv->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row_unv = $query_unv->fetch()) {
                            $name_field = $row_unv['name'];
                            $description_field = $row_unv['description'];
                        }
                        ?>
                        <h2 style="color: #C97D60 ;font-weight: bold;display:block">
                          <i class="fas fa-atom"></i> اية هي 
                          <?php echo "$name_field" ?>
                          ؟ 
                        </h2> 
                                             
                    </div>
                    <div class="faculty-desc">
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
                            $price = $row['price'];
                            $min = $row['minimum_total'];
                        ?>
                            <a class="rounded border m-2" href="faculty.php?f=<?php echo "$id" ?>">
                                <div class="card border-0">
                                    <div class="row g-0">
                                        <div class="col-2 col-md-4" style="display: flex;">
                                            <img src="<?php if($img == ""){ echo "layout/img/university_placeholder.jpg"; }else{ echo "$img"; }  ?>" alt="<?php echo "$name" ?>" style="width:100%;object-fit:contain">
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h6 class="card-title"><?php echo "$name" ?></h6>
                                                <span class="card-text text-dark" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> المصاريف  : <?php
                                                  if($price == "") {
                                                      echo "غير محدد";
                                                  } else {
                                                      echo number_format($price) . " جنية /سنة";
                                                  }?></span>
                                                  <p class="card-text text-dark" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
                                                    if($min == "") {
                                                        echo "غير محدد";
                                                    } else {
                                                        echo "$min%";
                                                    }
                                                    ?>
                                                  </p> 
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