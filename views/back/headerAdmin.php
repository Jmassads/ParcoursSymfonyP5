<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>starter-2020</title>
    <link rel="shortcut icon" type="image/ico" href="./favicon.ico">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.10.1/devicon.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL ?>dist/custom.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light px-4">
    <a class="navbar-brand" href="<?php echo URL ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-prompt inline" width="24"
             height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="M0 0h24v24H0z" stroke="none"></path>
            <polyline points="5 7 10 12 5 17"></polyline>
            <line x1="13" y1="17" x2="19" y2="17"></line>
        </svg>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URL ?>admin">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo URL ?>admin/articles">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL ?>admin/commentaires">Commentaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL ?>admin/users">Utilisateurs</a>
            </li>
        </ul>
        <img class="w-10 rounded-circle"
             src="https://avatars0.githubusercontent.com/u/22447803?s=400&u=453226f708a7c2242a639882fde1ec32ffa78918&v=4 "
             alt="">
        <form class="ms-2" action="" method="POST">
            <input type='hidden' name='deconnexion' value="true" />
            <input type="submit" href="#" class="btn px-3 py-2 rounded-md text-sm font-medium cursor-pointer" value="Déconnexion">
        </form>
    </div>
</nav>








