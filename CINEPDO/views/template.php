<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body>
    <div class="wrapper">
        <div id="top">
                <div id="cinema"><h1>Cinema</h1></div>
                 <nav class="menu">
                    <ul>
                        <li><a class="link_menu" href="index.php?action=homePage">HOME</a></li>
                        <li><a class="link_menu" href="index.php?action=listFilms">FILMS</a></li>
                        <li><a class="link_menu" href="index.php?action=listActors">ACTEURS</a></li>
                        <li><a class="link_menu" href="index.php?action=listDirectors">REALISATEURS</a></li>
                        <li><a class="link_menu" href="index.php?action=listGenres"> GENRES</a></li>
                        <li><a class="link_menu" href="index.php?action=listRoles"> ROLES</a></li>
                    </ul>
                </nav>
        </div> 
    <main>
            <div class="container">
            
                <?= $content?>
            </div>
    </main>
    
        <footer>
            <span> Ceci est un footer </span>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>  
</body>  
</html>