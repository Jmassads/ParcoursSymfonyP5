<?php include 'header.php'; ?>
<?php require_once 'config.php'; ?>
<?php require_once 'article.dao.php'; ?>


<main class="pt-24">

    <?php
    $article = getArticleById($_GET['idArticle']);
    ?>

    <section class="px-4">
        <div class="flex flex-col sm:flex-row flex-wrap items-center">
            <h2 class="text-4xl font-semibold pr-4">
                <?php echo $article['article_title'];?>
            </h2>
            <div class="text-lg font-semibold border-l-4 border-tart-orange pl-4 text-tart-orange">
                <?php echo $article['category_title'];?>
            </div>
        </div>
        <div class="my-10">
           <?php echo $article['article_content'];?>
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
    </section>
    <section class="mt-4">
        <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
            <div class="flex flex-wrap -mx-3 mb-6">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Ajouter un commentaire</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea
                            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                            name="body" placeholder="Écrivez votre commentaire" required=""></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    </div>
                    <div class="-mr-1">
                        <input type="submit"
                               class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                               value="Envoyer">
                    </div>
                </div>

            </div>
        </form>
    </section>
</main>

<?php include 'footer.php'; ?>

