<?php include 'views/back/header.php';?>


<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
    <div class="text-center mb-6">
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
    <form action="" method="POST">
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="user_email" name="user_email" type="email" placeholder="Email" required>
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Mot de passe
            </label>
            <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************" name="password" required>
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <button class="bg-tart-orange text-white font-bold py-2 px-4 rounded" type="submit">
            Sign In
        </button>
    </form>
</div>




<?php include 'views/back/footer.php';?>