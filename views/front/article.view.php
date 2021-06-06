<?php include 'views/front/header.php'; ?>

<?php flash('comment_message'); ?>

    <main class="pt-4">

        <section class="px-4">
            <div class="d-flex flex-column sm:flex-row flex-wrap items-center">
                <h2 class="text-4xl pr-4">
                    <?php echo $article->getTitre(); ?>
                </h2>
                <div class="text-lg border-l-4 border-tart-orange pl-4 text-tart-orange">
                    <?php echo $article->getCategoryTitle(); ?>
                </div>
            </div>
            <div class="my-10">
                <?php echo $article->getContent(); ?>
            </div>
            <div class="mt-3 d-flex items-center">
                <div class="">
                    <img class="w-10 rounded-circle"
                         src="<?php echo URL ?>src/img/avatar.png"
                         alt="">
                </div>
                <div class="ms-3">
                    <div class="text-sm" href="#">
                        Julia Assad
                    </div>
                    <div class="text-sm">
                        <?php if (empty($article->getDateModification())): ?>
                            <?php echo date('d-m-Y', strtotime($article->getDateCreation())); ?>
                        <?php else: ?>
                            <?php echo date('d-m-Y', strtotime($article->getDateModification())); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-4">
            <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" action="" method="POST">
                <input type="hidden" name="article_id" value="<?php echo $article->getId(); ?>">
                <div class="d-flex flex-column -mx-3 mb-6">
                    <h2 class="pt-3 pb-2 text-lg">Ajouter un commentaire</h2>
                    <div class="mb-2 mt-2">
                    <textarea rows="6" class="w-100 p-2"
                              class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                              name="comment" placeholder="Écrivez votre commentaire"></textarea>
                    </div>


                    <?php
                    if (isset($_SESSION['acces'])) { ?>
                        <div class="d-flex justify-content-end md:w-full">

                            <input type="submit"
                                   class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide me-2 hover:bg-gray-100"
                                   value="Ajouter votre commentaire" name="sendcomment">
                            <input type="submit" name="deconnexion"
                                   class="btn btn-outline-info font-medium py-1 px-4 rounded-lg tracking-wide hover:bg-gray-100"
                                   value="Se deconnecter">

                        </div>

                    <?php } else { ?>
                        <div class="d-flex justify-content-end md:w-full">
                            <a class="btn" href="<?php echo URL; ?>login">Identifiez vous</a>
                            <a class="btn" href="<?php echo URL; ?>inscription">Pas de compte? Inscrivez vous</a>
                        </div>
                    <?php }
                    ?>
                </div>
            </form>
        </section>
        <section class="px-4">
            <h2 class="pb-4">Commentaires</h2>
            <?php foreach ($commentaires as $commentaire): ?>
                <div class="be-comment">

                    <div class="be-comment-content">
			<span class="be-comment-name">
				<a href="blog-detail-2.html">
                    <?php echo $commentaire['user_lastname'] . ' ' . $commentaire['user_firstname']; ?>
                </a>
			</span>
                        <span class="be-comment-time">
				<i class="fa fa-clock-o"></i>
				<?php echo date('d-m-Y', strtotime($commentaire['date_posted'])); ?>
			</span>
                        <p class="be-comment-text">
                            <?php echo $commentaire['contenu']; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>


        </section>

    </main>

<?php //print_r($_SESSION); ?>

<?php include 'views/front/footer.php'; ?>