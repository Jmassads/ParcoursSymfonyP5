<?php

const HOST_NAME = "localhost";
const DATABASE_NAME = "mon_site";
const USER_NAME = "root";
const PASSWORD = "root";

const COOKIE_PROTECT = "timer";

define("URL",str_replace("index.php","", (isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));