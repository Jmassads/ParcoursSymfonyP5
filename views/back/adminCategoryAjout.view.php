<?php include 'views/back/headerAdmin.php';?>

<section class="px-4">
    <h1 class="text-lg fw-bold text-center ">Ajout de la catégorie</h1>

    <form class="mt-4 row align-items-center" action="" method="POST" enctype="multipart/form-data">
        <div class="col-6 mb-4">
            <label class="form-label" for="articleTitle">Catégorie:</label>
            <input type="text" class="form-control" name="category" id="category" value="">
        </div>

        <div class="mb-4">
            <input name="submit" type="submit" class="btn btn-tart-orange text-white" value="Ajouter">
        </div>
    </form>

</section>

<?php include 'views/back/footerAdmin.php';?>

