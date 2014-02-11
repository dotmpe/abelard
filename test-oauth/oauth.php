<?php

require_once 'testconfig.php';


if(isset($_GET['code'])) {
	// try to get an access token
	$code = urldecode($_GET['code']);
	$url = 'https://start.exactonline.nl/api/oauth2/token';
	$params = array(
		"code" => $code,
		"client_id" => $config['properties']['oauth_consumer_key'],
		"client_secret" => $config['properties']['oauth_consumer_secret'],
		"redirect_uri" => "https://$domain/oauth.php",
		"grant_type" => "authorization_code"
	);
	var_dump($params);
}


$curl = curl_init( $url );

curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_response = curl_exec($curl);
curl_close($curl);

$result = json_decode($json_response);

var_dump($result);
/*
$token = $result->access_token;

$curl = curl_init( $url );

curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$json_response = curl_exec($curl);
curl_close($curl);
 */

