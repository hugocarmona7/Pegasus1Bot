<?php

$botToken = "452064424:AAFWzKkl5O2VwsjPGvtcYqZC53oY6gzwXvk";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$firstname = $update["message"]["chat"]["first_name"];

switch($message)
{
	case "hola":
		funcionhola($chatId);
		break;
	case "nombre":
		funcionnombre($chatId);
		break;	
	default:
		noentiendo($chatId);
		break;
}

function enviarmensaje($chatId,$mensaje)
{
	
	$url = "$GLOBALS[website]/sendmessage?chat_id=$chatId&parse_mode=markdown&text=$mensaje";
	file_get_contents($url);
}

function funcionhola($chatId)
{
	$mensaje="Hola soy *PegasusBot* tu ID es:".$chatId;
	enviarmensaje($chatId,$mensaje);
}

function funcionnombre($chatId)
{
	$mensaje = "Bienvenido ".$firstname;
	enviarmensaje($chatId,$mensaje);
}

function noentiendo($chatId)
{
	$mensaje = "No te entiendo, puedes repetirlo?";
	enviarmensaje($chatId,$mensaje);
}

?>