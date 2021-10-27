<?php include 'views/back/headerAdmin.php';?>

<section class="px-4">

    <h1 class="text-lg fw-bold text-center ">Modification de l'article</h1>

    <form class="mt-4 row align-items-center" action="" method="POST" enctype="multipart/form-data">
        <div class="col-6 mb-4">
            <label class="form-label" for="articleTitle">Titre de l'article:</label>
            <input type="text" class="form-control" name="articleTitle" id="articleTitle"
                   value="<?php echo $article->getTitre(); ?>">
        </div>
        <div class="col-6 mb-4">
            <label class="form-label" for="categoryArticle">Catégorie de l'article:</label>
            <select class="form-select" name="categoryArticle" id="categoryArticle" required>
                <option value="">Catégories:</option>
                <?php foreach ($categoriesArticle as $categorie) : ?>
                    <option value="<?php echo $categorie['category_id'] ?>"
                        <?php if ($article->getCategory() == $categorie['category_id']) echo "selected"; ?>>
                        <?php echo $categorie['category_title']; ?>
                    </option>

                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="articleExcerpt">Excerpt de l'article</label>
            <textarea class="form-control textarea" id="articleExcerpt" name="articleExcerpt"
                      style="height: 100px"><?php echo $article->getExcerpt(); ?></textarea>
        </div>
        <div class="mb-4">
            <label for="articleContent">Contenu de l'article</label>
            <textarea class="form-control textarea" id="articleContent" name="articleContent"
                      style="height: 100px"><?php echo $article->getContent(); ?></textarea>
        </div>
        <div class="mb-4">
            <input name="submit" type="submit" class="btn btn-tart-orange text-white" value="Modifier">
        </div>
    </form>

</section>

<?php include 'views/back/footerAdmin.php';?>

