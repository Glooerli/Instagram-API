<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 26.02.2016
 * Time: 09:25
 */

namespace oop_Learn\Wrappers
{


    use oop_Learn\ValueObjects\Uri;

    class Curl
    {

        /**
         * @param Uri $url
         * @param array $parameters
         * @param array $curlOptions
         *
         * @return string
         */
        public function post(Uri $url, $parameters = [], $curlOptions = [])
        {
            $curl = $this->getCurl();
            curl_setopt_array($curl, $curlOptions);
            curl_setopt($curl, CURLOPT_URL, (string) $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS,$parameters);

            $results = curl_exec($curl);
            curl_close($curl);
            return $results;
        }

        private function getCurl()
        {
            return curl_init();
        }
    }
}