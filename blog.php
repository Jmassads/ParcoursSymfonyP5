<?php include 'header.php'; ?>
<?php require_once 'config.php'; ?>
<?php require_once 'pdo.php'; ?>


<main class="pt-24">

    <?php
    $bdd = connexionPDO();
    $stmt = $bdd->prepare("
       SELECT * FROM articles
       INNER JOIN categories on articles.category_id = categories.category_id
       INNER JOIN users on articles.user_id = users.user_id 
       INNER JOIN Image on articles.id_image = Image.id_image;
       ");
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();


    ?>
    <section id="blog" class="items-center justify-between mx-auto px-4 py-12 lg:py-16 xl:py-24 2xl:py-32">
        <h2 class="text-4xl font-semibold text-tart-orange">Mon blog<span
                    class="text-black">.</span></h2>
        <div class="block text-center py-6">
            <p class="w-full md:w-2/3 mr-auto ml-auto text-grey-darker text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores delectus dolor maxime possimus
                quaerat ullam voluptas! Aliquid expedita fugiat nihil omnis pariatur perferendis repellat repellendus
                similique. Aut quasi ratione saepe?
            </p>
        </div>
        <pre>
    </pre>
        <div class="flex flex-wrap -mx-4">
            <?php foreach ($articles as $article): ?>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-12">
                    <div class="bg-white overflow-hidden min-h-full p-4">
                        <div class="post-categories mb-2">
                            <a class="font-semibold text-tart-orange"
                               href=""><?php echo $article['category_title']; ?></a>
                        </div>
                        <div>
                            <h3 class="text-lg mb-4"><?php echo $article['article_title']; ?></h3>
                            <?php echo $article['article_excerpt']; ?>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                     src="src/img/<?php echo $article['url_image'];?>"
                                     alt="">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm leading-5 font-medium text-gray-900" href="">
                                    <?php echo $article['user_firstname'] . ' ' . $article['user_lastname']; ?></p>
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    <?php echo date('d-m-Y', strtotime($article['date_creation'])); ?>
                                </div>
                            </div>
                        </div>
                        <div class="cursor-pointer mt-10 font-semibold flex items-center hover:text-tart-orange">
                            <a href="article.php?idArticle=<?php echo $article['article_id'] ?>" class="mr-2 ">Lire la suite</a>
                            <ion-icon name="arrow-forward"></ion-icon>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </section>
</main>

<?php include 'footer.php'; ?>

