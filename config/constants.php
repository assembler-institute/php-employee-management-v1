<?php

define("PROJECT_FOLDER", null);
define("BASE_URL", "http://$_SERVER[HTTP_HOST]" . PROJECT_FOLDER);
define("ROOT", $_SERVER["DOCUMENT_ROOT"] . "/" . PROJECT_FOLDER);
define("CONFIG", ROOT . "/config");
define("ASSETS", ROOT . "/assets");
define("RESOURCES", ROOT . "/resources");
define("SRC", ROOT . "/src");
define("LIBRARY", SRC . "/library");
define("LIFETIME", 600);
