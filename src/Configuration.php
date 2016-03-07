<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 07.03.2016
 * Time: 09:54
 */

namespace oop_Learn {


    class Configuration
    {
        /**
         * @var string
         */
        private $file;

        /**
         * @var bool
         */
        private $isLoaded;

        /**
         * @param string $file
         */
        public function __construct($file)
        {
            $this->file = $file;
        }

        /**
         * @param string $key
         *
         * @return string
         * @throws \Exception
         */
        public function get($key)
        {
            $this->load();
            if (!isset($this->file[$key])) {
                throw new \Exception('Configuration key "' . $key . '" does not exist');
            }
            return $this->file[$key];
        }

        /**
         * @return bool
         * @throws \Exception
         */
        public function isDevelopmentMode()
        {
            return $this->get('isDevelopmentMode') == 'true';
        }

        /**
         * @throws \Exception
         */
        private function load()
        {
            if ($this->isLoaded) {
                return;
            }
            if (!is_readable($this->file)) {
                throw new \Exception('Configuration file "' . $this->file . '" is not readable');
            }
            $this->isLoaded = true;
            $this->file = parse_ini_file($this->file);
        }
    }
}