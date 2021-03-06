<?php include 'views/back/headerAdmin.php';?>
<section class="px-4">

    <h1 class="text-lg fw-bold text-center ">Ajouter un article</h1>

    <form class="mt-4 row align-items-center" action="" method="POST" enctype="multipart/form-data">
        <div class="col-6 mb-4">
            <label class="form-label" for="articleTitle">Titre de l'article:</label>
            <input type="text" class="form-control" name="articleTitle" id="articleTitle" required>
        </div>
        <div class="col-6 mb-4">
            <label class="form-label" for="articleCategory">Catégorie de l'article:</label>
            <select class="form-select" name="articleCategory" id="articleCategory" required>
                <option value="">Catégories:</option>
                <?php foreach ($categoriesArticle as $categorie) :?>
                    <option value="<?php echo $categorie['category_id'];?>"><?php echo $categorie['category_title'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-4">
            <label for="articleExcerpt">Excerpt de l'article</label>
            <textarea class="textarea form-control" placeholder="excerpt de l'article" id="articleExcerpt" name="articleExcerpt" style="height: 100px"></textarea>
        </div>
        <div class="mb-4">
            <label for="articleContent">Contenu de l'article</label>
            <textarea class="textarea form-control" placeholder="Contenu de l'article" id="articleContent" name="articleContent" style="height: 100px"></textarea>

        </div>
        <div class="mb-4">
            <input name="submit" type="submit" class="btn btn-tart-orange text-white" value="Valider">
        </div>
    </form>

</section>
<?php include 'views/back/footerAdmin.php';?>

