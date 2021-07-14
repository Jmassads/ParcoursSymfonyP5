<?php include 'views/back/headerAdmin.php'; ?>

<?php flash('comment_message'); ?>

<section class="px-4 py-4">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Utilisateur</th>
                <th scope="col">En réponse à:</th>
                <th scope="col">Envoyé le:</th>
                <th scope="col">Status du commentaire</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php print_r($comments);?>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?php echo $comment['commentaire_id']; ?></td>
                    <td><?php echo $comment['contenu']; ?></td>
                    <td><?php echo $comment['user_firstname'] . ' ' . $comment['user_lastname']; ?></td>
                    <td><?php echo $comment['article_title']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($comment['date_posted'])); ?>
                        à <?php echo date("H:i", strtotime($comment['date_posted'])); ?></td>
                    <td>
                        <?php if ($comment['comment_status'] == 1) : ?>
                            <?php echo "Publié"; ?>
                        <?php else : ?>
                            <?php echo "Non publié"; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= URL ?>admin/commentaires/afficherCommentaire/<?= $comment['commentaire_id']; ?>"
                           class="btn btn-outline-blue">Voir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include 'views/back/footerAdmin.php'; ?>
