<?php include 'views/back/headerAdmin.php';?>

<section class="px-4">
    <div class="card my-4">
        <div class="card-body">
            <h5 class="card-title">Articles</h5>
            Vous avez publié <?php echo $numberArticles;?> article(s)
        </div>
    </div>

    <div class="card card my-4">
        <div class="card-body">
            <h5 class="card-title">Commentaires</h5>
            Vous avez <?php echo $numberComments;?> commentaire(s)
        </div>
    </div>

</section>

<?php include 'views/back/footerAdmin.php';?>
