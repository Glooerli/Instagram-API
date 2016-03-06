<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 09.02.2016
 * Time: 23:46
 */

namespace oop_Learn\Routers
{

    use oop_Learn\Controllers\AbstractController;
    use oop_Learn\Controllers\FrontPageController;
    use oop_Learn\ValueObjects\Uri;
    use oop_Learn\Controllers\LoginController;

    class Router
    {
        /**
         * @param Uri $uri
         *
         * @return AbstractController
         */
        public function route(Uri $uri)
        {
            $path = $uri->getPath();

            switch ($path) {
                case '/':
                    return new FrontPageController;
                case '/profile':
                    return new FrontPageController;
                case '/login/instagram':
                    return new LoginController;
            }
        }
    }
}