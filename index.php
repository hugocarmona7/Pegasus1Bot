<?php

$botToken = "452064424:AAFWzKkl5O2VwsjPGvtcYqZC53oY6gzwXvk";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents('php://input');

$updateArray = json_decode($update, TRUE);

$chatId = $updateArray["result"][0]["message"]["chat"]["id"];

print_r($chatId)

>