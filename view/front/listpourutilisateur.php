<?php
include '../Controller/StationC.php';
$stationC = new StationC();
$listeStations = $stationC->listStations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style100.css">
    <title>Liste des stations</title>
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
</head>
<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste des stations</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID Station</th>
                            <th>Nom</th>
                            <th>Emplacement</th>
                            <th>Nombre de bornes</th>
                            <th>Disponibilité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($listeStations as $station) { ?>
    <tr>
        <td>
            <div class="form-check form-check-muted m-0">
            </div>
        </td>
        <td><?php echo $station['id_station']; ?></td>
        <td><?php echo $station['nom']; ?></td>
        <td><?php echo $station['emplacement']; ?></td>
        <td><?php echo $station['nb_bornes']; ?></td>
        <td><?php echo $station['availability']; ?></td>
        <td><a href="https://www.google.com/maps/search/<?php echo urlencode($station['nom'] . ' ' . $station['emplacement']); ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fas fa-map-marker-alt"></i> Voir sur Google Maps</a></td>
<td><a href="addfeedbacku.php?id_s=<?php echo $station['id_station']; ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Ajouter un feedback</a></td>
<td><a href="listfeedbackutilisateur.php?id_s=<?php echo $station['id_station']; ?>" class="btn btn-info btn-sm"><i class="fas fa-comments"></i> Voir les feedbacks</a></td>

    </tr>
<?php } ?>

                    </tbody>
                </table>
                <br />
    <form method="post" action="export1.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
   

</body>
</html>
