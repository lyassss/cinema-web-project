<?php
include '../Controller/FeedbackC.php';
$id_s = $_GET["id_s"];
$feedbackC = new feedbackC();
$listfeedbackC = $feedbackC->joinstation($id_s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style100.css">
    <title>Liste des feedbacks</title>
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
            <h6 class="m-0 font-weight-bold text-primary">Liste des feedbacks</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID Feedback</th>
                            <th>Nom et prenom</th>
                            <th>Email</th>
                            <th>Rating</th>
                            <th>Commentaire</th>
                            <th>id de station</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listfeedbackC as $feedback) { ?>
                            <tr>
                                <td>
                                    <div class="form-check form-check-muted m-0">
                                    </div>
                                </td>
                                <td><?php echo $feedback['id_feedback']; ?></td>
                                <td><?php echo $feedback['nom_et_prenom']; ?></td>
                                <td><?php echo $feedback['email']; ?></td>
                                <td><?php echo $feedback['rating']; ?></td>
                                <td><?php echo $feedback['commentaire']; ?></td>
                                <td><?php echo $feedback['id_s']; ?></td>
                                 
              
 
                        <?php } ?>
                    </tbody>
                </table>
                <br />

                <b>


    
<a href="addfeedbacku.php?id_s=<?php echo $id_s; ?>" class="btn">Ajouter un feedback</a>
<br />

<br />





    
                <a href="average_rating.php?id_s=<?php echo $id_s; ?>" class="btn">Calculate station average rating</a>
                <br />
    <form method="post" action="export2.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
            </div>
        </div>
    </div>
</body>
</html>
