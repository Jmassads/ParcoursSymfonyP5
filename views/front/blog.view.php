<?php include 'views/front/header.php';?>

<!--    SECTION DES ARTICLES-->
    <section id="blog" class="px-4 py-4">
        <h2 class="text-4xl text-tart-orange">Mon blog
            <span class="text-black">.</span>
        </h2>
        <div class="row text-center py-2">
            <p class="col-sm-8 mx-auto text-base">Je partage ici des ressources sur le développement web. Les articles que je partage sont des cours et des tutoriels, principalement sur PHP, WordPress et Symfony.
            </p>
        </div>
        <div class="row ">
            <?php foreach ($articles as $article) : ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="border bg-white overflow-hidden h-100 p-3">
                        <div class="post-categories mb-2">
                            <a class="text-tart-orange"
                               href=""><?php echo $article->getCategoryTitle(); ?></a>
                        </div>
                        <div>
                            <h3 class="text-lg mb-4"><?php echo $article->getTitre(); ?></h3>
                            <?php echo $article->getExcerpt(); ?>
                        </div>
                        <div class="mt-3">
                                <div class="text-sm" href="#">
                                    Posté par: <?php echo $article->getuserFirstname() . ' ' . $article->getuserLastname();?>
                                </div>
                                <div class="text-sm">
                                    <?php if (empty($article->getDateModification())) :?>
                                        Le: <?php echo date('d-m-Y', strtotime($article->getDateCreation())); ?>
                                    <?php else :?>
                                        Le: <?php echo date('d-m-Y', strtotime($article->getDateModification())); ?>
                                    <?php endif;?>
                                </div>
                        </div>
                        <div class="cursor-pointer mt-4 d-flex align-items-center">
                            <a href="<?= URL ?>blog/article/<?= $article->getId(); ?>" class="d-block">Lire la suite</a>
                            <ion-icon class="ms-1" name="arrow-forward"></ion-icon>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </section>


<?php include 'views/front/footer.php';?>
