<?php
include '../Controller/CategorieC.php';
$userC = new CategorieC();
$listUserC = $userC->afficherservice();
?>
<style>
  .blue-background {
    background-color: #76AFBF;
  }
</style>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie</title>
    <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../Dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../Dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link href="../../Dashboard/assets/css/styleemployee.css" rel="stylesheet">
</head>


<body class="blue-background">
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="../../Dashboard/index.php" class="logo d-flex align-items-center">
    <img src="../assets/img/logo.png" alt="">
   
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

    </div><!-- End Search Bar -->

         

<div class="container p-5">
        <h1>List of Categories</h1>
        <br>
          <!-- End Search Bar -->
        <br>
        <table class="table table-bordered">
        <tr>
            <th>Id Categorie</th>
            <th>Name</th>
            <th>Description</th>
            <th>consulter</th>
           
        </tr>
        <?php
        foreach ($listUserC as $categorie) {
        ?>
            <tr>
                <td><?= $categorie['Idcat']; ?></td>
                <td><?= $categorie['nam']; ?></td>
                <td><?= $categorie['descr']; ?></td>
                <td>
                <td>
                    <a href="Listeevenement.php?Idcat=<?php echo $categorie['Idcat']; ?>">consulter</a>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
    
</div>
</section>
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../Dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../Dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../Dashboard/assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../Dashboard/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../Dashboard/assets/vendor/quill/quill.min.js"></script>
  <script src="../../Dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../Dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../Dashboard/assets/vendor/html-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../Dashboard/assets/js/main.js"></script>

</body>

</html>