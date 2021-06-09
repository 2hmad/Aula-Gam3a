<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>كلية التجارة جامعه الاسكندرية | أولي جامعه</title>
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
                        <p style="font-size: 18px;font-weight: bold;">كلية التجارة</p>
                    </div>
                    <div class="faculty-info">
                        <img src="https://alexu.edu.eg/templates/alexandriauniversity/images/logo-alex-en.webp" style="height: 200px;width: 200px;object-fit: contain;">
                        <div style="line-height: 1em;">
                            <h5 style="font-weight: bold">كلية التجارة</h5>
                            <p><i class="fas fa-university"></i> <a href="#">جامعه الاسكندرية</a></p>
                            <p>الحد الادني : 256.5</p>
                            <p>النوع : أهلية</p>
                            <p>المصاريف : 5000 جنيه</p>
                        </div>
                    </div>
                    <div class="faculty-desc">
                        <span style="font-weight: bold;display:block">معلومات عن الجامعه</span>
                        <br>
                        <p>العنوان بالكامل : شارع سوتر علي البحر في الاسكندرية مصر</p>
                        <p>سعر السكن الجامعي : 2000 جنيه شهرياً</p>
                        <p class="text-muted"></p>
                    </div>
                    <div class="faculty-field">
                        <span style="font-weight: bold;display:block">مجال الدراسة</span>
                        <br>
                        <p>مجال الدراسة : ريادة الاعمال ، الجمارك ، حاسبات</p>
                        <p style="text-decoration:underline">الوصف :</p>
                        <p class="text-muted"></p>
                    </div>

                    <p></p>
                </div>

                <div class="col-lg">
                    <div class="card" style="border:none">
                        <div class="name-univ-head">
                            <p style="font-size: 18px;font-weight: bold;">الكليات الاخري</p>
                        </div>

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