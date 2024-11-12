<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CRUD AJAX</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center h2 my-3">PHP CRUD AJAX</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-112">
                <button type="submit" class="btn btn-primary rounded-0 btn-add" data-bs-toggle="modal" data-bs-target="#addCity">Add city</button>
            </div>

            <div class="table-responsive my-3">
                <?php require_once VIEWS . '/incs/content/home-content.tpl.php' ?>
            </div>
        </div>
    </div>

    <!-- Модальные окна -->
<?php require_once VIEWS . '/incs/modals/add-city-modal.tpl.php' ?>
    <?php require_once VIEWS . '/incs/modals/edit-city-modal.tpl.php' ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/app.js"></script>
</body>
</html>