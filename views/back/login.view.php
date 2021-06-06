<?php include 'views/back/headerLogin.php';?>

<?php //print_r($_SESSION);?>

<div class="bg-white px-4 py-4">
    <div class="text-center mb-4">
        <a href="<?php echo URL ?>"
           class="text-4xl no-underline font-bold"
           rel="me">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-prompt inline" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M0 0h24v24H0z" stroke="none"></path>
                <polyline points="5 7 10 12 5 17"></polyline>
                <line x1="13" y1="17" x2="19" y2="17"></line>
            </svg>
            Julia Assad
        </a>
    </div>
    <div class="row">
        <form class="col-sm-6 mx-auto" action="" method="POST">
        <div class="mb-2">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">Email
            </label>
            <input class="shadow appearance-none border rounded w-100 py-2 px-3 text-grey-darker" id="user_email" name="user_email" type="email" placeholder="Email" required>
            <span><?php echo $data['email_err']; ?></span>
        </div>
        <div class="mb-2">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Mot de passe
            </label>
            <input class="shadow appearance-none border border-red rounded w-100 py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************" name="password" required>
            <span><?php echo $data['password_err']; ?></span>
        </div>
        <button class="btn bg-tart-orange text-white font-bold py-2 px-4 rounded" type="submit">
            Se connecter
        </button>
        </form>
    </div>
</div>




