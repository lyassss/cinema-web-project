<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.jpg" type="image/x-icon">
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
                            <h4 class="card-title">Add Reservation</h4>
                            <form action="ar.php" id="myForm" method="post">
                                <div class="form-group">
                                    <label for="nom_acc">Nombres de places</label>
                                    <input type="number" class="form-control" id="nom_acc" placeholder="Nombres de places" name="register-nbr_places">
                                    <span id="errorMarque"></span>
                                </div>
                                <div class="form-group">
                                    <label for="modele">Numéro de salle</label>
                                    <input type="number" class="form-control" id="prix" placeholder="Numéro de salle" name="register-num_salles">
                                    <span id="errorvitesse"></span>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                                <a href="affreservation.php" class="btn">Afficher</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
