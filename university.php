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
    </style>
</head>

<body>
    <?php include('./includes/navbar.php') ?>
    <main style="margin-top:3%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="name-univ-head">
                        <p style="font-size: 18px;font-weight: bold;">جامعه الاسكندرية</p>
                    </div>
                    <div class="university-info">
                        <img src="https://alexu.edu.eg/templates/alexandriauniversity/images/logo-alex-en.webp" style="height: 200px;width: 200px;object-fit: contain;">
                        <h5>جامعه الاسكندرية</h5>
                        <p>جامعه الاسكندرية</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('./includes/scripts.php') ?>
</body>

</html>