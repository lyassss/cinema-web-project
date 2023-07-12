<?php include '../Controller/filmC.php';
 $userC = new filmC();
  $listeUserC = $userC->afficherfilm(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #1c2a48;
            color: #fff;
        }
        .card-header {
            background-color: #1c2a48;
            border-bottom: 0;
            color: #fff;
        }
        .card-body {
            background-color: #2d3b5e;
        }
        .table-bordered {
            border-color: #3f4d7a;
        }
        .table-bordered thead th {
            background-color: #1c2a48;
            color: #fff;
            border-color: #3f4d7a;
        }
        .table-bordered tbody td {
            background-color: #2d3b5e;
            color: #fff;
            border-color: #3f4d7a;
        }
        .table-bordered .text-right {
            text-align: right;
        }
        .btn {
            background-color: #3f4d7a;
            color: #fff;
        }
        
        /* CSS for table alignment */
        table {
            table-layout: fixed;
        }

        th.text-right,
        td.text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-right">id</th>
                            <th class="text-right">titre</th>
                            <th class="text-right">genre</th>
                            <th class="text-right">image</th>
                            <th class="text-right">rating</th>
                            <th class="text-right">action</th>
                            <th class="text-right">action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listeUserC as $film) { ?>
                            <tr>
                                <td></td>
                                <td class="text-right"><?php echo $film['id_film']; ?></td>
                                <td class="text-right"><?php echo $film['titre']; ?></td>
                                <td class="text-right"><?php echo $film['genre']; ?></td>
                                <td class="text-right"><?php echo $film['img']; ?></td>
                                <td class="text-right"><?php echo $film['ratings']; ?></td>
                                <td class="text-right"><a href="suprimerfilm.php?id_film=<?php echo $film['id_film']; ?>" class="btn">Supprimer</a></td>
                                <td class="text-right"><a href="affichermodifier.php?id_film=<?php echo $film['id_film']; ?>" class="btn">Modifier</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                <a href="ajoutfilm.php" class="btn">Ajouter</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
