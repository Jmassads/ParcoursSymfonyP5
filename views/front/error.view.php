
<div class="error">
    <h1>404</h1>
    <p>Oops! <?php echo $msg;?></p>
    <a class="button" href="<?php echo URL;?>"><i class="icon-home"></i> Retour à la page d'accueil</a>
</div>

<style>
    body {
        background-color: #f7484e;
        color: #fff;
        font-size: 100%;
        line-height: 1.5;
        font-family: "Roboto", sans-serif;
        text-align: center;
    }

    .button {
        font-weight: 300;
        color: #fff;
        font-size: 1.2em;
        text-decoration: none;
        border: 1px solid #efefef;
        padding: 0.5em;
        border-radius: 3px;
        transition: all 0.3s linear;
    }

    .button:hover {
        background-color: #fff;
        color: #000;
    }

    p {
        font-size: 2em;
        text-align: center;
        font-weight: 100;
    }

    h1 {
        text-align: center;
        font-size: 15em;
        font-weight: 100;

</style>