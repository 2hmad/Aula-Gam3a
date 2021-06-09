<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="../layout/img/logo.png" style="max-width: 100px;margin-bottom:5%" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="display: flex;flex-basis: auto;justify-content: flex-end;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="edit-fac.php">تعديل كلية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="edit-univ.php">تعديل جامعه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="add-univ.php">اضافة جامعه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-fac.php">اضافة كلية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">تسجيل الخروج</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
if(!isset($_SESSION['email'])){
  header('Location: index.php');
}
?>