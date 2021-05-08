<?php include 'views/back/headerAdmin.php';?>


<section class="px-4 py-4">
    <a class="btn btn-outline-blue" href="genererArticlesAdminAjout">Ajouter un article</a>
    <a class="btn btn-outline-info" href="genererArticlesAdminModif">modifier un article</a>
</section>


<?php if($alert !== ""){
    echo afficherAlert($alert,$alertType);
} ?>


<?php include 'views/back/footerAdmin.php';?>
