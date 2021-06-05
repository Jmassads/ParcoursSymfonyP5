<?php include 'views/back/headerAdmin.php'; ?>

<section class="px-4 py-4">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Commentaire</th>
            <th scope="col">user_id</th>
            <th scope="col">id de l'article</th>
            <th scope="col">Status du commentaire</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?php echo $comment['commentaire_id'];?></td>
                <td><?php echo $comment['contenu'];?></td>
                <td><?php echo $comment['user_id'];?></td>
                <td><?php echo $comment['article_id'];?></td>
                <td><?php echo $comment['comment_status'];?></td>
                <td>
                    <a  href="<?= URL ?>admin/commentaires/accepterCommentaire/<?= $comment['commentaire_id']; ?>" class="btn btn-outline-info" value="Accepter">Accepter</a>
                    <a href="<?= URL ?>admin/articles/suppressionArticle/<?= $comment['commentaire_id']; ?>" class="btnSup btn btn-outline-tart-orange" >Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include 'views/back/footerAdmin.php'; ?>
