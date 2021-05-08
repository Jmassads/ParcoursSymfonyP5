<section class="px-4">
    <h1 class="text-lg fw-bold text-center ">Modifier un article</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="etape" value="2">
        <label for="categoryArticle">Catégorie : </label>
        <select name="categoryArticle" id="categoryArticle" class="form-control" onchange="submit()">
            <option selected>Catégorie...</option>
            <?php foreach ($categoriesArticle as $categorie): ?>
                <option value="<?php echo $categorie['category_id']; ?>"
                    <?php if (isset($_POST['categoryArticle']) && $_POST['categoryArticle'] === $categorie['category_id']) echo "selected"; ?>>
                    <?php echo $categorie['category_title']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php if (isset($_POST['etape']) && (int)$_POST['etape'] >= 2) { ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="etape" value="3">
            <input type="hidden" name="categoryArticle" value="<?php echo $_POST['categoryArticle'] ?>">
            <label for="article">Articles : </label>

            <select name="article" id="article" class="form-control" onchange="submit()">
                <option selected>Article...</option>
                <?php foreach ($data['articles'] as $article) : ?>
                    <option value="<?= $article['article_id'] ?>"
                        <?php if (isset($_POST['article']) && $_POST['article'] === $article['article_id']) echo "selected"; ?>>
                        <?= $article['article_id'] . " - " . $article['article_title'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    <?php } ?>

    <?php if (isset($_POST['etape']) && (int)$_POST['etape'] >= 3) { ?>
        <form class="mt-4 row align-items-center" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="etape" value="4">
            <input type="hidden" name="categoryArticle" value="<?= $_POST['categoryArticle'] ?>">
            <input type="hidden" name="article" value="<?= $_POST['article'] ?>">
            <div class="col-6 mb-4">
                <label class="form-label" for="articleTitle">Titre de l'article:</label>
                <input type="text" class="form-control" name="articleTitle" id="articleTitle"
                       value="<?php echo $data['article']['article_title']; ?>">
            </div>
            <div class="col-6 mb-4">
                <label class="form-label" for="categoryArticle">Catégorie de l'article:</label>
                <select class="form-select" name="categoryArticle" id="categoryArticle">
                    <option selected>Catégorie...</option>
                    <?php foreach ($categoriesArticle as $categorie): ?>

                        <option value="<?php echo $categorie['category_id'] ?>"
                            <?php if ($data['article']['category_title'] === $categorie['category_title']) echo "selected"; ?>>
                            <?php echo $categorie['category_title']; ?>
                        </option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="articleExcerpt">Excerpt de l'article</label>
                <textarea class="form-control" id="articleExcerpt" name="articleExcerpt"
                          style="height: 100px"><?php echo $data['article']['article_excerpt']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="articleContent">Contenu de l'article</label>
                <textarea class="form-control" id="articleContent" name="articleContent"
                          style="height: 100px"><?php echo $data['article']['article_content']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="articleImage" class="form-label">Image de l'article</label>
                <input class="form-control" type="file" name="articleImage" id="articleImage">
            </div>
            <div class="col-6 mb-4">
                <label class="form-label" for="adminUser">Admin:</label>
                <select class="form-select" name="adminUser" id="adminUser">
                    <option selected>Admin...</option>
                    <?php foreach ($adminUsers as $adminuser): ?>
                        <option value="<?php echo $adminuser['user_id']; ?>"
                            <?php if ($data['article']['user_id'] === $adminuser['user_id']) echo "selected"; ?>>
                            <?php echo $adminuser['user_firstname'] . ' ' . $adminuser['user_lastname']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <input type="submit" class="btn btn-tart-orange text-white" value="Valider">
                <button id="btnSup" class="btn btn-tart-orange text-white" href="">Supprimer</button>
            </div>
        </form>
    <?php } ?>

</section>

