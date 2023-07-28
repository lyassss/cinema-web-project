<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="dd" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style99.css">
    <title>Add Station</title>
</head>
<body>

<div class="container">
    <form id="form" class="form" autocomplete="off" method="POST" action="addstation.php">
        <h3 id="formName">Add Station</h3>
        <div class="form-control">
            <input type="text" name="nom" id="nom" placeholder="Nom" 
            <small class="error-message"></small>
            <input type="text" name="emplacement" id="emplacement" placeholder="emplacement" 
            <small class="error-message"></small>
            <input type="number" name="nb_bornes" id="nb_bornes" placeholder="nb_bornes" 
            <small class="error-message"></small>
            <input type="number" name="availability" id="availability" placeholder="availability" 
            <small class="error-message"></small>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
    </form>
</div>

<script>
    const form = document.getElementById('form');
    const nomInput = document.getElementById('nom');
    const emplacementInput = document.getElementById('emplacement');
    const nbBornesInput = document.getElementById('nb_bornes');
    const availabilityInput = document.getElementById('availability');

    form.addEventListener('submit', (event) => {
        let errors = [];

        if (nomInput.value.trim() === '') {
            errors.push('Please enter a name.');
        }

        if (emplacementInput.value.trim() === '') {
            errors.push('Please enter a location.');
        }

        if (nbBornesInput.value.trim() === '' || isNaN(nbBornesInput.value)) {
            errors.push('Please enter a valid number of charging stations.');
        }

        if (availabilityInput.value.trim() === '' || isNaN(availabilityInput.value)) {
            errors.push('Please enter a valid availability number.');
        }

        if (errors.length > 0) {
            event.preventDefault();
            const errorMessage = errors.join('\n');
            alert(errorMessage);
        }
    });
</script>

</body>
</html>
