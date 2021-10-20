<?php include 'views/back/headerAdmin.php'; ?>

<?php Helper::flash('category_message');?>

<section class="px-4 py-4">
    <a class="btn btn-outline-blue" href="<?php echo URL; ?>admin/categories/ajouter">Ajouter une categorie</a>
</section>

<section class="px-4 py-4">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Catégorie</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $category) :?>
            <tr>
                <td><?php echo $category['category_id'];?></td>
                <td><?php echo $category['category_title'];?></td>
                <td>
                    <a href="<?= URL ?>admin/categories/modificationCategory/<?= $category['category_id']; ?>" class="btn btn-outline-info" >Modifier</a>
                    <a href="<?= URL ?>admin/categories/suppressionCategory<?= $category['category_id']; ?>" class="btnSupCategory btn btn-outline-tart-orange" >Supprimer</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>

<?php include 'views/back/footerAdmin.php'; ?>
