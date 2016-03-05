<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 10.02.2016
 * Time: 15:17
 */

namespace oop_Learn\Loaders
{
    use DOMDocument;

    class Loader
    {
        /**
         * @param string $path
         * @return DOMDocument
         */
        public function load($path)
        {
            $dom = new DOMDocument();
            $dom->loadXML(file_get_contents($path));
            return $dom;
        }

    }
}