<?php

$botToken = "452064424:AAFWzKkl5O2VwsjPGvtcYqZC53oY6gzwXvk";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
$firstname = $update["message"]["from"]["last_name"];

switch($message)
{
	case "ID":
		funcionid($chatId);
		break;
	case "Soporte":
		funcionsoporte($chatId);
		break;	
	default:
		menuprincipal($chatId);
		break;
}

function enviarmensaje($chatId,$mensaje)
{
	
	$url = "$GLOBALS[website]/sendmessage?chat_id=$chatId&parse_mode=markdown&text=$mensaje";
	file_get_contents($url);
}

function funcionid($chatId)
{
	$mensaje="Hola tu *ID* es: ".$chatId;
	enviarmensaje($chatId,$mensaje);
}

function funcionsoporte($chatId)
{
	$mensaje = "Bienvenido Mr. $GLOBALS[firstname]";
	enviarmensaje($chatId,$mensaje);
}

function noentiendo($chatId)
{
	$mensaje = "No te entiendo, puedes repetirlo?";
	enviarmensaje($chatId,$mensaje);
}

function menuprincipal($chatId)
{
	$message = "Hola soy Pegasus1Bot y te puedo indicar tu ID";
	$tecladoprincipal = "reply_markup={"keyboard":[["ID"],["Soporte"]],"resize_keyboard":true}";
	$url = $GLOBALS[website].'/sendmessage?chat_id='.$chatId.'&parse_mode=HTML&text='.$message.$tecladoprincipal;
	file_get_contents($url);
}

?>