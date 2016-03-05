<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 09.02.2016
 * Time: 23:38
 */

namespace oop_Learn\Controllers
{
    class FrontPageController extends AbstractController
    {
        public function getBody()
        {
            return $this->loadDom('/var/www/oop_Learn/data/Pages/index.html')->saveXML();
        }
    }
}

