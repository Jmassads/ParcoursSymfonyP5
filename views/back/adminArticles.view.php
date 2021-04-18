<?php include 'views/back/headerAdmin.php';?>

<?php if($alert !== ""){
    echo afficherAlert($alert,$alertType);
} ?>

<section class="px-4">

    <h1 class="text-lg fw-bold text-center ">Ajouter un article</h1>

    <form class="mt-4 row align-items-center" action="" method="POST" enctype="multipart/form-data">
        <div class="col-6 mb-4">
            <label class="form-label" for="articleTitle">Titre de l'article:</label>
            <input type="text" class="form-control" name="articleTitle" id="articleTitle" required>
        </div>
        <div class="col-6 mb-4">
            <label class="form-label" for="articleCategory">Catégorie de l'article:</label>
            <select class="form-select" name="articleCategory" id="articleCategory">
                <option selected>Catégorie...</option>
                <?php foreach($categoriesArticle as $categorie):?>
                    <option value="<?php echo $categorie['category_id'];?>"><?php echo $categorie['category_title'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-4">
            <label for="articleExcerpt">Excerpt de l'article</label>
            <textarea class="form-control" placeholder="excerpt de l'article" id="articleExcerpt" name="articleExcerpt" style="height: 100px" required></textarea>
        </div>
        <div class="mb-4">
            <label for="articleContent">Contenu de l'article</label>
            <textarea class="form-control" placeholder="Contenu de l'article" id="articleContent" name="articleContent" style="height: 100px" required></textarea>
        </div>
        <div class="mb-4">
            <label for="articleImage" class="form-label">Image de l'article</label>
            <input class="form-control" type="file" name="articleImage" id="articleImage">
        </div>
        <div class="col-6 mb-4">
            <label class="form-label" for="adminUser">Admin:</label>
            <select class="form-select" name="adminUser" id="adminUser">
                <option selected>Admin...</option>
                <?php foreach($adminUsers as $adminuser):?>
                    <option value="<?php echo $adminuser['user_id'];?>"><?php echo $adminuser['user_firstname'] . ' ' . $adminuser['user_lastname'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-4">
            <input type="submit" class="btn btn-tart-orange text-white" value="Valider">
        </div>
    </form>

</section>


<?php include 'views/back/footerAdmin.php';?>
