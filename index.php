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
            <input type="number" id="total" name="total" step="0.01">
            <input type="submit" class="btn btn-primary" name="find" value="بـحـث" style="display: block;margin-top: 5%;margin-right: auto;margin-left: auto;">
        </form>
    </div>

    <div class="suggestions">

        <div class="container">
            <p style="text-align:center;font-weight: bold;font-size:17px">الجامعات المقترحة</p>
            <div class="row" style="gap: 15px">
                <div class="col-lg-2">
                    <a href="#">
                        <div class="card" style="width: 13.75rem;padding:5px;">
                            <img src="layout/img/logo-alex.webp" class="card-img-top" alt="..." style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                            <div class="card-body">
                                <h5 class="card-title">جامعه الاسكندرية</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">المكان المختصر : شارع سوتر علي البحر - الشاطبي - الاسكندرية</li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="container" style="border-top: 1px solid #dadada;margin-top:3%">
            <p style="text-align:center;font-weight: bold;font-size:17px;margin-top:3%">الكليات المقترحة</p>
            <div class="row" style="gap: 15px">
                <div class="col-lg-2">
                    <a href="#">
                        <div class="card" style="width: 13.75rem;padding:5px;">
                            <img src="layout/img/logo-alex.webp" class="card-img-top" alt="..." style="width: 165px;object-fit: contain;height: 165px;display:block;margin-right:auto;margin-left:auto">
                            <div class="card-body">
                                <h5 class="card-title">كلية التجارة</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">المصاريف الدراسية : 150000 جنيه</li>
                                <li class="list-group-item" style="background:transparent !important;font-size: 14px;width: 13.75rem;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;overflow: hidden;">الحد الادني : 215.2</li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <?php include('./includes/footer.php') ?>
    <?php include('./includes/scripts.php') ?>
</body>

</html>