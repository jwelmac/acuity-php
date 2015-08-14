<?php

require_once(__DIR__.'/../../src/AcuityOAuth.php');
require_once('../utils.php');

// Config:
$config = loadConfig(__DIR__.DIRECTORY_SEPARATOR.'config.json');
$secret = $config['apiKey'];
list($method, $path) = getRouteInfo();

// App:
if ($method === 'GET' && $path === '/') {
  include 'index.html';
} else
if ($method === 'POST' && $path === '/webhook') {
	// Handle webhook after verifying signature:
  try {
		AcuityAPI::verifyMessageSignature($secret);
    error_log("The message is authentic:\n".json_encode($_POST, JSON_PRETTY_PRINT));
  } catch (Exception $e) {
    trigger_error($e->getMessage(), E_USER_WARNING);
  }
} else {
	handle404();
}

