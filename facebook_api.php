<?php 
	require 'vendor/autoload.php';

	$fb = new Facebook\Facebook ([
		'app_id' => '393628681465749',
		'app_secret' => '6e3c4a8710c6019da2dcb3e0486e513d',
		'default_graph_version' => 'v2.7'
	]);

	$helper = $fb->getRedirectLoginHelper();
	$login_url = $helper->getLoginUrl("http://chalisashop.hostingerapp.com/");

	if (isset($_SESSION['access_token'])) {
	 	$fb->setDefaultAccessToken($_SESSION['access_token']);
			$res = $fb->get('/me?fields=name,email');
			$user = $res->getGraphUser();
			$user->getField('name');
	 } 
	 
	$accessToken = $helper->getAccessToken();
	if (isset($accessToken)) {
		$_SESSION['access_token'] = (string)$accessToken;
		echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
	 }
	 
?>