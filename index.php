<?php

$botToken = "452064424:AAFWzKkl5O2VwsjPGvtcYqZC53oY6gzwXvk";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
//$name = $update["message"]["chat"]["first_name"];

switch($message)
{
	case "hola":
		hola($chatId);
		break;
	default:
		bienvenida($chatId);
		break;
}

function enviarmensaje($chatId,$mensaje)
{
	//$url = "$GLOBALS[website]/sendmessage?chat_id=$chatId&parse_mode=HTML&text=".urlenconde($mensaje);
	$url = "$GLOBALS[website]/sendmessage?chat_id=$chatId&text=$message";
	file_get_contents($url);
}

function hola($chatId)
{
	$mensaje="Hola soy PegasusBot";
	enviarmensaje($chatId,$mensaje);
}

//function bienvenida($chatId)
//{
	//$mensaje = "Bienvenido $GLOBALS[name]";
	//enviarmensaje($chatId,$mensaje);
//} 

?>