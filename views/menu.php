<!--nav-->
<nav class="py-4 px-4 flex flex-wrap items-center justify-between">
    <div>
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
    <div class="nav-down text-right md:inline-flex hidden">
        <a href="<?php echo URL ?>"
           class="block lg:inline-block lg:mt-0 font-bold no-underline text-xs uppercase pl-4">À
            propos</a>
        <a href="<?php echo URL ?>#projects"
           class="block lg:inline-block lg:mt-0 font-bold no-underline text-xs uppercase pl-4">Projets</a>
        <a href="<?php echo URL ?>blog"
           class="block lg:inline-block lg:mt-0 font-bold no-underline text-xs uppercase pl-4 pr-4">Blog</a>
        <a href="<?php echo URL ?>#contact"
           class="block lg:inline-block lg:mt-0 font-bold no-underline text-xs uppercase pl-4 border-l">Contact</a>
    </div>
</nav>