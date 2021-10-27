<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Julia ASSAD</title>
    <link rel="shortcut icon" type="image/ico" href="./favicon.ico">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.10.1/devicon.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL ?>public/custom.css">
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=prdte4ybij6mu30q8a7qo4pf5aj26up92ct59lgswpopxodr">
    </script>


    <script>
        tinymce.init({
            selector: '.textarea',
            height: 400,
            plugins: 'code image emoticons link media lists',
            menubar: 'insert',
            paste_data_images: true,
            toolbar: 'insertfile | formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | undo redo | code image',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            extended_valid_elements: "*[*]",
            link_assume_external_targets: true,
            link_default_protocol: 'https'


        });
    </script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light px-4">
    <a class="navbar-brand text-base fw-bolder" href="<?php echo URL ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-prompt inline" width="24"
             height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="M0 0h24v24H0z" stroke="none"></path>
            <polyline points="5 7 10 12 5 17"></polyline>
            <line x1="13" y1="17" x2="19" y2="17"></line>
        </svg>
        Retour vers le site
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
                <a class="nav-link" href="<?php echo URL ?>admin/categories">Catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL ?>admin/users">Utilisateurs</a>
            </li>
        </ul>

        <form class="ms-2" action="" method="POST">
            <input type='hidden' name='deconnexion' value="true" />
            <input type="submit" href="#" class="btn px-3 py-2 rounded-md text-sm font-medium cursor-pointer" value="Déconnexion">
        </form>
    </div>
</nav>








