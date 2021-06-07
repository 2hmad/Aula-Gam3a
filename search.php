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
                <input type="text" class="form-control" name="keyword" style="max-width: 330px;">
                <input type="submit" class="btn btn-primary" name="search" value="بـحـث" style="margin-top:1%">
            </form>

            <div style="margin-top:5%">
            <p style="font-size: 18px;font-weight: bold;">النتائج المطابقة</p>
            <div class="row" style="gap:10px">
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
    </main>
    <?php include('./includes/footer.php') ?>
    <?php include('./includes/scripts.php') ?>
</body>

</html>