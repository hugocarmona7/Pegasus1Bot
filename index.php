<?php

$botToken = "452064424:AAFWzKkl5O2VwsjPGvtcYqZC53oY6gzwXvk";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];


switch($message)
{
	case "hola":
		funcionhola($chatId);
		break;
	default:
		bienvenida($chatId);
		break;
}

function enviarmensaje($chatId,$mensaje)
{
	
	$url = "$GLOBALS[website]/sendmessage?chat_id=$chatId&parse_mode=markdown&text=$mensaje";
	file_get_contents($url);
}

function funcionhola($chatId)
{
	$mensaje="Hola soy *PegasusBot*";
	enviarmensaje($chatId,$mensaje);
}

//function bienvenida($chatId)
//{
	//$mensaje = "Bienvenido $GLOBALS[name]";
	//enviarmensaje($chatId,$mensaje);
//} 

?>