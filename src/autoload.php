<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'oop_learn\\configuration' => '/Configuration.php',
                'oop_learn\\controllers\\abstractcontroller' => '/Controllers/AbstractController.php',
                'oop_learn\\controllers\\frontpagecontroller' => '/Controllers/FrontPageController.php',
                'oop_learn\\controllers\\logincontroller' => '/Controllers/LoginController.php',
                'oop_learn\\loaders\\loader' => '/Loaders/Loader.php',
                'oop_learn\\queries\\fetchaccesstokenfrominstagramquery' => '/Queries/FetchAccessTokenFromInstagramQuery.php',
                'oop_learn\\responses\\response' => '/Responses/Response.php',
                'oop_learn\\routers\\router' => '/Routers/Router.php',
                'oop_learn\\valueobjects\\uri' => '/ValueObjects/Uri.php',
                'oop_learn\\wrappers\\curl' => '/Wrappers/Curl.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd
