<?php include 'views/back/headerAdmin.php'; ?>


<section class="px-4 py-4">
    <a class="btn btn-outline-blue" href="<?php echo URL; ?>admin/articles/ajouter">Ajouter un article</a>
</section>


<section class="px-4 py-4">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th style="width:20%"scope="col">Titre</th>
            <th style="width:20%" scope="col">Excerpt</th>
            <th style="width:10%"scope="col">DDC</th>
            <th style="width:10%"scope="col">DDM</th>
            <th style="width:10%"scope="col">Catégorie</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td class="article" scope="row"><?php echo $article->getID(); ?></td>
                <td class="articleTitle"><?php echo $article->getTitre(); ?></td>
                <td><?php echo $article->getExcerpt(); ?></td>
                <td><?php echo date('d-m-Y', strtotime($article->getDateCreation())); ?></td>
                <td> <?php echo date('d-m-Y', strtotime($article->getDateModification())); ?></td>
                <td><?php echo $article->getCategoryTitle(); ?></td>
                <td>
                    <a class="btn btn-outline-info"
                       href="<?= URL ?>admin/articles/modificationArticle/<?= $article->getId(); ?>">Modifier</a>
                    <a href="<?= URL ?>admin/articles/suppressionArticle/<?= $article->getId(); ?>" class="btnSup btn btn-outline-tart-orange" >Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include 'views/back/footerAdmin.php'; ?>
