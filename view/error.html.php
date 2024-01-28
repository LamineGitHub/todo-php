<?php $pageTitle = "Error" ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
</head>

<body>

<main class="container pt-4">
    <h1 class="mb-4">Todo List</h1>
    <h5>Erreur : <i> <?= $errorMessage ?> </i></h5>
</main>

</body>
</html>