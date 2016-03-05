<?php

namespace roobique\PHP {

	use roobique\Routers\Router;
	require('./roobiqueConfig.php');
	require('./pdoConnect.php');

	class logged
	{
		private function logged()
		{
			session_start();


			if (isset($_GET['code'])) {
				$code = $_GET['code'];

				$instaURL = 'https://api.instagram.com/oauth/access_token';
				$access_token_settings = array('client_id' => clientID,
					'client_secret' => clientSecret,
					'grant_type' => 'authorization_code',
					'redirect_uri' => redirectURI,
					'code' => $code);

				$curl = curl_init($instaURL);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

				$results = curl_exec($curl);
				curl_close($curl);
				$results = json_decode($results, true);

				$InstaID = $results['user']['id'];

				$selectStatement = $config->query("SELECT InstaID FROM Users WHERE InstaID='$InstaID' ");

				$row = $selectStatement->fetch();

				if (!$row) {
					$insertStatement = $config->prepare('INSERT INTO Users (InstaID, username, bio, website, profile_picture, full_name) VALUES (:InstaID, :username, :bio, :website, :profile_picture, :full_name)');
					$insertStatement->execute(array(
						'InstaID' => $results['user']['id'],
						'username' => $results['user']['username'],
						'bio' => $results['user']['bio'],
						'website' => $results['user']['website'],
						'profile_picture' => $results['user']['profile_picture'],
						'full_name' => $results['user']['full_name']
					));
				} else {
					$updateStatement = $config->prepare("UPDATE Users SET username=:username, bio=:bio, website=:website, profile_picture=:profile_picture, full_name=:full_name WHERE InstaID='$InstaID'");
					$updateStatement->execute(array(
						'username' => $results['user']['username'],
						'bio' => $results['user']['bio'],
						'website' => $results['user']['website'],
						'profile_picture' => $results['user']['profile_picture'],
						'full_name' => $results['user']['full_name']
					));
				}

				$_SESSION['access_token'] = $results['access_token'];

				echo 'login succeeded!';
				echo '<br />';
				echo 'waiting for redirect...';

			} else {
				echo 'There was a problem.';
				echo '<br />';
				echo 'Try again in a little while';
			}
		}
	}
}