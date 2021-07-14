<?php include 'views/back/headerLogin.php';?>


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
        <h3 class="text-lg text-center">INSCRIPTION</h3>
        <form class="col-sm-10 mx-auto" action="" method="POST">
            <div class="row mb-2">
                <div class="col-md-6 d-flex flex-column">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="lastname">Nom
                    </label>
                    <input class="block shadow appearance-none border rounded py-2 px-3 text-grey-darker" id="user_lastname" name="user_lastname" type="text" placeholder="Nom" required>
                </div>
                <div class="col-md-6 d-flex flex-column">
                    <label class="block text-grey-darker text-sm font-bold mb-2" for="firstname">Prénom
                    </label>
                    <input class="shadow appearance-none border rounded w-100 py-2 px-3 text-grey-darker" id="user_firstname" name="user_firstname" type="text" placeholder="prénom" required>
                </div>
            </div>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="username">Email
                </label>
                <input class="shadow appearance-none border rounded w-100 py-2 px-3 text-grey-darker" id="user_email" name="user_email" type="email" placeholder="Email" required>
                <?php echo $data['email_err'];?>
            </div>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">Mot de passe
                </label>
                <input class="shadow appearance-none border border-red rounded w-100 py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************" name="user_password" required>

            </div>
            <button class="btn bg-tart-orange text-white font-bold py-2 px-4 rounded" name="submit" type="submit">
                S'inscrire
            </button>
        </form>
    </div>
</div>




