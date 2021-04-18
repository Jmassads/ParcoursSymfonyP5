<?php include 'views/front/header.php';?>


    <section id="blog" class="px-4 py-4">
        <h2 class="text-4xl text-tart-orange">Mon blog
            <span class="text-black">.</span>
        </h2>
        <div class="row text-center py-2">
            <p class="col-sm-8 mx-auto text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores delectus dolor maxime possimus quaerat ullam voluptas! Aliquid expedita fugiat nihil omnis pariatur perferendis repellat repellendus similique. Aut quasi ratione saepe?
            </p>
        </div>
        <div class="row ">
            <?php foreach ($articles as $article): ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="border bg-white overflow-hidden h-100 p-3">
                        <div class="post-categories mb-2">
                            <a class="text-tart-orange"
                               href=""><?php echo $article['category_title']; ?></a>
                        </div>
                        <div>
                            <h3 class="text-lg mb-4"><?php echo $article['article_title']; ?></h3>
                            <?php echo $article['article_excerpt']; ?>
                        </div>
                        <div class="mt-3 d-flex items-center">
                            <div class="">
                                <img class="w-10 rounded-circle"
                                     src="src/img/<?php echo $article['url_image'];?>"
                                     alt="">
                            </div>
                            <div class="ms-3">
                                <div class="text-sm" href="#">
                                    <?php echo $article['user_firstname'] . ' ' . $article['user_lastname']; ?></div>
                                <div class="text-sm">
                                    <?php echo date('d-m-Y', strtotime($article['date_creation'])); ?>
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer mt-4 d-flex align-items-center">
                            <a href="<?= URL;?>article&idArticle=<?=$article['article_id'];?>" class="d-block">Lire la suite</a>
                            <ion-icon class="ms-1" name="arrow-forward"></ion-icon>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </section>


<?php include 'views/front/footer.php';?>
