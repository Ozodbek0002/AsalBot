<?php

include 'Telegram.php';

$telegram = new Telegram('5516988832:AAGFKzAY-Y2Q8arkPi18PSC2zGfwMPS0JnI');

$chat_id = $telegram->ChatID();  // foydalanuvchi ID si
$chat_name = $telegram->FirstName();  // foydalanuvchi nomi
$text = $telegram->Text(); // foydalanuvchi yuborgan text
$starText = " Assalomu Alaykum bu botimiz shunchaki tajriba asosina ishlayapti yana notog'ri hayollarga borib yurmang birodar 😉 ";
