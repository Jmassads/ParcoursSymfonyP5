<?php include 'views/back/headerAdmin.php'; ?>


<section class="px-4 py-4">
    <h1 class="text-lg fw-bold text-center ">Modification de l'utilisateur</h1>

    <form class="mt-4 row align-items-center" action="" method="POST">
        <div class="col-6 mb-4">
            <label class="form-label" for="firstname">Prénom:</label>
            <input type="text" class="form-control" name="firstname" id="firstname"
                   value="<?php echo $user['user_firstname']; ?>">
        </div>
        <div class="col-6 mb-4">
            <label class="form-label" for="lastname">Nom:</label>
            <input type="text" class="form-control" name="lastname" id="lastname"
                   value="<?php echo $user['user_lastname']; ?>">
        </div>


        <div class="col-6 mb-4">
            <label class="form-label" for="userRole">Role de l'utilisateur:</label>
            <select class="form-select" name="userRole" id="userRole" required>
                <option value="">Role:</option>
                <?php /** @var TYPE_NAME $userRoles */
                foreach ($userRoles as $userRole) : ?>
                    <option value="<?php echo $userRole['id'] ?>"
                        <?php if ($user['user_role'] == $userRole['id']) echo "selected"; ?>>
                    <?php echo $userRole['role']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

            <input name="submit" type="submit" class="btn btn-tart-orange text-white" value="Modifier">
        </div>
    </form>


</section>

<?php include 'views/back/footerAdmin.php'; ?>
