<?php
define('ROOT_DIR', realpath(__DIR__ . '/..'));
define(
  "HTTP",
  ($_SERVER["SERVER_NAME"] == "localhost")
    ? "http://localhost/php-employee-management-v1"
    : "http://your_site_name.com"
);
