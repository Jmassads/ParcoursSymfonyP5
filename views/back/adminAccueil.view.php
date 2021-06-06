<?php include 'views/back/headerAdmin.php';?>

<?php //print_r($_SESSION);?>

<section class="px-4">
    <div class="pt-6">
        Vous avez publié <?php echo $numberArticles;?> article(s)
    </div>
    <div class="pt-6">
        Vous avez <?php echo $numberComments;?> commentaire(s)
    </div>
</section>

<?php include 'views/back/footerAdmin.php';?>
