<?php
include '../Controller/reservationC.php';
$userC = new reservationC();
$id_res = $_GET["id_res"];
$user = $userC->recupererreservations($id_res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Sign-Up</title>
    <style>
        body {
            background-color: #1c2a48;
            color: #fff;
        }
        .main-panel {
            margin: 20px;
        }
        .content-wrapper {
            padding: 20px;
            background-color: #2d3b5e;
        }
        .card {
            background-color: #fff;
            border: none;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            color: #1c2a48;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            color: #1c2a48;
            font-weight: bold;
        }
        .form-control {
            border-color: #3f4d7a;
            color: #3f4d7a;
        }
        .btn-primary {
            background-color: #3f4d7a;
            border-color: #3f4d7a;
        }
        .btn-primary:hover {
            background-color: #1c2a48;
            border-color: #1c2a48;
        }
        .btn {
            background-color: #3f4d7a;
            color: #fff;
        }
        .btn:hover {
            background-color: #1c2a48;
        }
    </style>
</head>
<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update</h4>
                            <form action="modifierreservation.php?id_res=<?php echo $id_res ?>" method="POST">
                                <table class="form-style" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nom_acc">Nombres de places</label>
                                        <input type="number" class="form-control" name="nbr_places" value="<?php echo $user['nbr_places'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="modele">Numero salle</label>
                                        <input type="number" class="form-control" name="num_salles" value="<?php echo $user['num_salles'];?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                                    <a href="affreservation.php" class="btn">Afficher</a> 
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
