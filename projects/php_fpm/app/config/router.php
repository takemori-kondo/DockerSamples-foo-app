<?php
// PHP8.3
declare(strict_types=1);

$router = $di->getRouter();

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);
