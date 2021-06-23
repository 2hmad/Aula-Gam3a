<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <?php include('./includes/links.php') ?>
    <?php
    if (isset($_GET['f'])) {
        $f = filter_var($_GET['f'], FILTER_SANITIZE_NUMBER_INT ) ;
        $sql = "SELECT faculty.* , university.name as 'university_name' FROM faculty, university
                WHERE 
                university.id = faculty.university_id
                AND faculty.id = $f";
        $query = $connect->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $query->fetch()) {
            $id = $row['id'];
            $name = $row['name'];
            $university_name = $row['university_name'];
            $univ_id = $row['university_id'];
            $field_id = $row['science_field_id'];
            $min = $row['minimum_total'];
            $int_total = $row['internal_total'];
            $price = $row['price'];
            $price_details = $row['price_details'];
            $update = $row['updated_at'];
            $refer = $row['refer'];
            $fac_description = $row['description'];
            $img = $row['img'];
        }
    } else {
        header('Location: all-fac.php');
    }
    ?>

    <title> 
    
        <?= $name . ' ' . $university_name?> | أولي جامعه
   
    </title>
    
    <meta name="description" content="
    
    <?php 
    
        price_format($price);
        
        if($min !== "") {
          echo  " - الحد الادني : $min %";
        } 
        
        echo " | " . $university_name;
      ?> 
    ">
    
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

        .name-univ-head h1, h3{
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
                <div class="col-12">
                    <div class="name-univ-head">
                        <h1 style="font-size: 18px;font-weight: bold;"><?= $name  .   ' - ' . $university_name ?></h1>
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
                            <p class="p-1 m-1 bg-muted rounded"><i class="fas fa-money-bill-wave"></i> <?= price_format($price); ?></p>
                       
                        </div>
                    </div>
                    
                    <?php 
                      if (!empty($price_details)) {
                        echo "<div><br>";
                        echo "<h2 style='color: #C97D60 ;font-weight: bold;display:block' ><i class='fas fa-money-bill-wave'></i> تفاصيل مصاريف الكلية </h2>" ;
                        echo "<div class = 'ps-2 ms-2 border-start' > $price_details </div>";
                        echo "</div>";
                      }
                    ?>
                    
                    <?php 
                      if (!empty($fac_description)) {
                        echo "<div><br>";
                        echo "<h2 style='color: #C97D60 ;font-weight: bold;display:block' ><i class='fas fa-info-circle'></i> معلومات عن الكلية  </h2>" ;
                        echo "<div class = 'ps-2 ms-2 border-start' > $fac_description </div>";
                        echo "</div>";
                      }
                    ?>
                    <div class="faculty-desc">
                        <h2  style="color: #C97D60 ;font-weight: bold;display:block">
                          <i class="fas fa-info-circle"></i> 
                          معلومات عن الجامعة
                        </h3>
                        
                        <div class="university-desc ps-2 ms-2 border-start">
                          <p>
                            <i class="fas fa-map-pin" style="color:#ca0000"></i> 
                            <?php echo "$address" ?>
                          </p> 
                          <span class ="fw-bold" ><i class="fas fa-info-circle"></i> الوصف </span>
                          <div class="text-muted content hideContent"><?= $description ?></div>
                          <div class="show-more p-1" style="background: var(--light);text-decoration: underline"><a href="#">رؤية المزيد</a></div>
                          
                          <br>
                          
                          <span style="font-weight: bold;display:block"><i class="fas fa-house-user"></i> معلومات عن السكن الجامعي</span>
                          <p><?php echo $hotel_price ?></p>
                        </div> 
                    
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
                        <div class="ps-2 ms-2 border-start"><?php echo "$description_field" ?></div>
                                
                    </div>
                    
                </div>

                <div class="col-12">
                    <div>
                        <div class="name-univ-head">
                            <h3 style="font-size: 18px;font-weight: bold;">الكليات الاخري</h3>
                        </div>
                        <?php
                        $sql = "SELECT   faculty.* , university.name as 'university_name' , university.short_address as 'university_short_address' FROM faculty, university 
                                WHERE
                                university.id = faculty.university_id
                                ORDER BY RAND() LIMIT 10";
                        $query = $connect->query($sql);
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $query->fetch()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $university_name = $row['university_name'];
                            $img = $row['img'];
                            $price = $row['price'];
                            $university_short_address  = $row['university_short_address'];
                            $science_field_id = $row['science_field_id'];
                            $min = $row['minimum_total'];
                        ?>
                        <div>
                          <a class="" href="faculty.php?f=<?php echo "$id" ?>">
                              <div class="row border bg-gray rounded m-1">
                                  <div class="col px-0">
                                      <div class="p-0">
                                          <img onerror="this.src='/imgs/<?= $science_field_id ?>.jpg';" src="<?= $img ?>" alt="<?php echo "$name" ?>" class ="d-block m-auto" style="max-width: 100%;max-height: 310px;">
                                          
                                          <p class="fw-bold p-1"><?= $name . ' - ' . $university_name ?></p>
                                          <span class="text-muted p-1" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i>
                                          المصاريف  : 
                                          <?= price_format($price); ?>
                                          </span>
                                          <p class=" text-muted p-1" style="font-size: 15px;"><i class="fas fa-percent"></i> الحد الادني : <?php 
                                            if($min == "") {
                                                echo "غير محدد";
                                            } else {
                                                echo "$min%";
                                            }
                                            ?>
                                          </p>
                                          <p class="text-muted p-1" style="font-size: 15px;">
                                            <i class="fas fa-map-pin" style="color:#ca0000"> </i>
                                            <?= $university_short_address ?>
                                          </p>
                                      </div>
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