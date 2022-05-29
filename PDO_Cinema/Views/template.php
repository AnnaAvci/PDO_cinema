
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/style.css">
   
    <title><?= $title ?></title>
</head>
<body>
    <h1>PDO Cinema</h1>

    <!-- NAVBAR -->
<nav>
        <a href="index.php?action=listActeurs">Liste des acteurs</a>
        <a href="index.php?action=listFilms">Liste des films</a>
        <a href="index.php?action=ajouterActeur">Ajouter un acteur</a>
        <a href="index.php?action=ajouterFilm">Ajouter un film</a>
</nav>
    <?= $content ?>
</body>
</html>