<?php

include 'Telegram.php';

$telegram = new Telegram('5516988832:AAGFKzAY-Y2Q8arkPi18PSC2zGfwMPS0JnI');

$chat_id = $telegram->ChatID();  // foydalanuvchi ID si
$chat_name = $telegram->FirstName();  // foydalanuvchi nomi
$text = $telegram->Text(); // foydalanuvchi yuborgan text

if ($text == 'salom'){
    $content = array('chat_id' => $chat_id, 'text' => 'Va Alaykum Assalom' );
    $telegram->sendMessage($content);
}

$content = array('chat_id' => $chat_id, 'text' => $text );
$telegram->sendMessage($content);