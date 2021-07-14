<?php include 'views/back/headerAdmin.php'; ?>

<?php flash('comment_message');?>

<section class="px-4 py-4">
    <span class="visually-hidden comment_id"><?php echo $comment['commentaire_id'];?></span>
    <h2 class="text-lg">En réponse à <strong><?php echo $comment['article_title'];?></strong></h2>
    <span class="d-block mb-2">Envoyé le <?php echo date('d-m-Y', strtotime($comment['date_posted'])); ?></span>
    <span class="d-block mb-2">
        Auteur: <?php echo $comment['user_firstname'] . ' ' . $comment['user_lastname'];?>
    </span>

    <div class="py-4">
        <?php echo $comment['contenu'];?>
    </div>
</section>

<div class="px-4 py-4">
    <div class="d-flex justify-content-end">
        <a href="<?= URL ?>admin/commentaires/accepterCommentaire/<?= $comment['commentaire_id']; ?>" class="btn btn-outline-info me-2" value="Accepter">Accepter</a>
        <a href="" class="btnSupComment btn btn-outline-tart-orange" >Supprimer</a>
    </div>
</div>

<?php include 'views/back/footerAdmin.php'; ?>
