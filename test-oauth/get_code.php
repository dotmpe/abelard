<?php

require_once 'testconfig.php';


$url = "https://start.exactonline.nl/api/oauth2/auth";

$params = array(
	"response_type" => "code",
	"client_id" => $config['properties']['oauth_consumer_key'],
	"redirect_uri" => "https://$domain/oauth.php",
);

$request_to = $url . '?' . http_build_query($params);

header("Location: " . $request_to);

?>
