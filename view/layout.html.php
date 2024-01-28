<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "" ?></title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
</head>

<body>
<section class="container pt-5">

    <h1 class="mb-4">Todo List</h1>

    <form class="d-flex pb-4" action="index.php?task=add" method="post">
        <input required class="mr-4 form-control" type="text" placeholder="Ajouter une tâche..." name="content"
               data-com.bitwarden.browser.user-edited="yes">
        <button type="submit" class="ms-2 btn btn-primary">Ajouter</button>
    </form>

    <main class="mb-4">
        <?= $pageContent ?? "" ?>
    </main>

</section>
</body>
</html>
