<?php

const HOST_NAME = "localhost";
const DATABASE_NAME = "mon_site";
const USER_NAME = "root";
const PASSWORD = "root";

define("URL",str_replace("index.php","", (isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));