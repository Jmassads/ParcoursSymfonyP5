<?php include 'views/back/headerAdmin.php'; ?>


<section class="px-4 py-4">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) :?>
            <tr>
                <td><?php echo $user['user_id'];?></td>
                <td><?php echo $user['user_firstname'];?></td>
                <td><?php echo $user['user_lastname'];?></td>
                <td><?php echo $user['user_email'];?></td>
                <td>
                    <a href="<?= URL ?>admin/users/suppressionUser/<?= $user['user_id']; ?>" class="btnSupUser btn btn-outline-tart-orange" >Supprimer</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>

<?php include 'views/back/footerAdmin.php'; ?>
