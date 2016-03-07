<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 06.03.2016
 * Time: 13:46
 */

namespace oop_Learn\Controllers {

    use oop_Learn\Configuration;
    use oop_Learn\Queries\FetchAccessTokenFromInstagramQuery;
    use oop_Learn\ValueObjects\Uri;
    use oop_Learn\Wrappers\Curl;

    class LoginController extends AbstractController
    {
        protected function doRun()
        {
            $config = new Configuration(__DIR__ . '/../../configs/system.ini');
            $fetchAccessTokenQuery = new FetchAccessTokenFromInstagramQuery(new Curl, new Uri($config->get('accessTokenURL')), $config->get('clientID'), $config->get('clientSecret'), $config->get('redirectUri'));
            var_dump($fetchAccessTokenQuery->execute($this->getUri()->getParameter('code')));
            echo 'should work';
        }

        protected function getBody()
        {
            return '';
        }
    }
}