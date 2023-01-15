<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

    <section class="container pt-5" id="todolist">

        <h1 class="mb-4">Todo List</h1>

        <div class="btn-group mb-4" role="group">
            <a href="./" type="button" class="btn btn-outline-primary active" data-filter="all">Toutes</a>
            <a href="index.php?task=getActive" type="button" class="btn btn-outline-primary" data-filter="todo">A faire</a>
            <a href="index.php?task=getInactive" type="button" class="btn btn-outline-primary" data-filter="done">Faites</a>
        </div>

        <main>

            <form class="d-flex pb-4" action="index.php?task=add" method="post">
                <input required class="mr-4 form-control" type="text" placeholder="Acheter des patates..." name="content" data-com.bitwarden.browser.user-edited="yes">
                <button type="submit" class="ms-2 btn btn-primary">Ajouter</button>
            </form>

            <ul class="list-group">
                <?= $pageContent ?>
            </ul>

        </main>

    </section>

</body>
<script>
    function confirme() {
        return window.confirm(`Êtes vous sur de vouloir supprimer cette task ?!`)
    }
</script>

</html>